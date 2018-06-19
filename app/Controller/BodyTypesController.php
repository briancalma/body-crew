<?php
App::uses('AppController', 'Controller');
/**
 * BodyTypes Controller
 *
 * @property BodyType $BodyType
 * @property PaginatorComponent $Paginator
 */
class BodyTypesController extends AppController {

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
		$this->BodyType->recursive = 0;
		$this->set('bodyTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BodyType->exists($id)) {
			throw new NotFoundException(__('Invalid body type'));
		}
		$options = array('conditions' => array('BodyType.' . $this->BodyType->primaryKey => $id));
		$this->set('bodyType', $this->BodyType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BodyType->create();
			if ($this->BodyType->save($this->request->data)) {
				$this->Flash->success(__('The body type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The body type could not be saved. Please, try again.'));
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
		if (!$this->BodyType->exists($id)) {
			throw new NotFoundException(__('Invalid body type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BodyType->save($this->request->data)) {
				$this->Flash->success(__('The body type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The body type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BodyType.' . $this->BodyType->primaryKey => $id));
			$this->request->data = $this->BodyType->find('first', $options);
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
		$this->BodyType->id = $id;
		if (!$this->BodyType->exists()) {
			throw new NotFoundException(__('Invalid body type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BodyType->delete()) {
			$this->Flash->success(__('The body type has been deleted.'));
		} else {
			$this->Flash->error(__('The body type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
