<?php
App::uses('AppController', 'Controller');
/**
 * BillsProducts Controller
 *
 * @property BillsProduct $BillsProduct
 * @property PaginatorComponent $Paginator
 */
class BillsProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BillsProduct->recursive = 0;
		$this->set('billsProducts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BillsProduct->exists($id)) {
			throw new NotFoundException(__('Invalid bills product'));
		}
		$options = array('conditions' => array('BillsProduct.' . $this->BillsProduct->primaryKey => $id));
		$this->set('billsProduct', $this->BillsProduct->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BillsProduct->create();
			if ($this->BillsProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The bills product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bills product could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BillsProduct->exists($id)) {
			throw new NotFoundException(__('Invalid bills product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BillsProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The bills product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bills product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BillsProduct.' . $this->BillsProduct->primaryKey => $id));
			$this->request->data = $this->BillsProduct->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BillsProduct->id = $id;
		if (!$this->BillsProduct->exists()) {
			throw new NotFoundException(__('Invalid bills product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BillsProduct->delete()) {
			$this->Session->setFlash(__('The bills product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The bills product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
