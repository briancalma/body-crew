<?php
App::uses('AppController', 'Controller');
/**
 * BloodTypes Controller
 *
 * @property BloodType $BloodType
 * @property PaginatorComponent $Paginator
 */
class BloodTypesController extends AppController {

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
		$this->BloodType->recursive = 0;
		$this->set('bloodTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BloodType->exists($id)) {
			throw new NotFoundException(__('Invalid blood type'));
		}
		$options = array('conditions' => array('BloodType.' . $this->BloodType->primaryKey => $id));
		$this->set('bloodType', $this->BloodType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BloodType->create();
			if ($this->BloodType->save($this->request->data)) {
				$this->Flash->success(__('The blood type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The blood type could not be saved. Please, try again.'));
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
		if (!$this->BloodType->exists($id)) {
			throw new NotFoundException(__('Invalid blood type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BloodType->save($this->request->data)) {
				$this->Flash->success(__('The blood type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The blood type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BloodType.' . $this->BloodType->primaryKey => $id));
			$this->request->data = $this->BloodType->find('first', $options);
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
		$this->BloodType->id = $id;
		if (!$this->BloodType->exists()) {
			throw new NotFoundException(__('Invalid blood type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BloodType->delete()) {
			$this->Flash->success(__('The blood type has been deleted.'));
		} else {
			$this->Flash->error(__('The blood type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
