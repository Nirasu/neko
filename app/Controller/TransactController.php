<?php

App::uses('AppController', 'Controller'); 
App::uses('Paypal', 'Paypal.Lib');

class TransactController extends AppController 
{

	public function index()
	{
		// Load model
		$this->loadModel('Product');
		
		// Facultatif, pour les 'Autorisation',moins lourd
		// $this->Product->recursive = -1;
		
		// Get the data
		$results = $this->Product->find('all');
		
		// Send the data to the view
		$this->set(compact('results'));
	}

	public function product($id)
	{
		// Load model
		$this->loadModel('Product');
		
		// Get the data
		$product = $this->Product->find('all',array('conditions' => array('Product.id' => $id)));
		
		$product = $product[0];
		
		// Send the data to the view
		$this->set(compact('product'));
	}
	
	public function action_add_to_cart()
	{
		if ($this->request->is('post'))
		{
			if (is_null($this->Session->read('order_id')))
			{
				// Je DOIT creer une facture
				
				//Load model
				$this->loadModel('Bill');
				
				$bill = array();
				$bill['Bill'] = array();
				
				$bill['Bill']['user_id'] = 1;
				
				if (!$this->Bill->save($bill))
				{
					$this->Session->setFlash('Impossible d\'ajouter' . $this->Bill->lastQuery . ' is the last query');
					return $this->redirect(array('controller' => 'transact', 'action' => 'index'));
				}
				else
				{
					$id = $this->Bill->getInsertID();
					$this->Session->write('order_id', $id);
				}
			}
		
			$this->loadModel('BillsProduct');
			
			$data = $this->request->data;
			
			$data['BillsProduct']['bill_id'] = $this->Session->read('order_id');
			
			if ($this->BillsProduct->save($data))
			{
			// fine
				return $this->redirect(array('controller' => 'transact', 'action' => 'cart'));
			}
			else
			{
			// oups
				$this->Session->setFlash('Impossible d\'ajouter');
				return $this->redirect(array('controller' => 'transact', 'action' => 'index'));
			}
		}
		else
		{
			// Si pas data, retour a l'index
			$this->Session->setFlash('Aucune Donnee recu');
			return $this->redirect(array('controlleur' => 'transact', 'action' => 'index'));
		}
	}

	public function cart()
	{
		// Je load le model
		$this->loadModel('Bill');
		
		//Recursive facultatif
		$this->Bill->recursive = 2;
		
		// Va chercher mes donnes
		$bill = $this->Bill->find('first',
		array('conditions' => array ('Bill.id' => $this->Session->read('order_id'))));
		
		//Les set comme resultat
		$this->set(compact('bill'));
	}
	
	public function testPaypal()
	{
		$message = array();
		
		$this->Paypal = new Paypal(array
		('sandboxMode' => true ,
		'nvpUsername' => 'dragoncdj_api1.hotmail.com',
		'nvpPassword' => '1400074904',
		'nvpSignature' => 'ALLFosoE618hzDLPV4-fLfspcYVLAYs6vpcM63gMyfLj8MYVFBPDh7XL',
		'oAuthClientId' => 'AaB6DhDwaQYjThZhT57fERWXzAZx_ZXVykC0R2CSltcAEwe1fUy38NMZS49_',
		'oAuthSecret' => 'EHxXZhAfN6dMvkBcJz6WBYakjkmYA2H2vd1InWN7ykabcIdjxqqlIyn7NYX-'));
		
		$creditCard = array(
			'payer_id' => 1,
			'type' => 'visa',
			'card' => '4008 0687 0641 8697',
			'cvv2' => 232,
			'expiry' => array(
				'M'=>'2',
				'Y'=>'2018'
			),
			'first_name' => 'Joe',
			'last_name' => 'Shopper'
			);
		
		$message = $this->Paypal;
		
		try 
		{
			$message=$this->Paypal->storeCreditCard($creditCard);
			
			$cardPayment = array(
				'intent' => 'sale',
				'payer' => array(
					'payment_method' => 'credit_card',
					'funding_instruments' => array(
						0 => array(
							'credit_card_token' => array(
								'credit_card_id' => $message['id'],
								'payer_id' => '1'
							)
						)
					)
				),
				'transactions' => array(
					0 => array(
						'amount' => array(
							'total' => '0.60',
							'currency' => 'CAD',
							'details' => array(
								'subtotal' => '0.50',
								'tax' => '0.10',
								'shipping' => '0.00'
							)
						),
						'description' => 'This is a test payment'
					)
				)
			);
			
			$message = $this->Paypal->chargeStoredCard($cardPayment);
		}
		catch(Exception $ex)
		{
			die('DOH!!!'.$ex->getMessage()); 
		}
		
		$this->set(compact('message'));
	}
}	