<?php
App::uses('AppController', 'Controller');
/**
 * Prefectures Controller
 *
 * @property Prefecture $Prefecture
 * @property PaginatorComponent $Paginator
 */
class PrefecturesController extends AppController {

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
		$this->Prefecture->recursive = 0;
		$this->set('prefectures', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Prefecture->exists($id)) {
			throw new NotFoundException(__('Invalid prefecture'));
		}
		$options = array('conditions' => array('Prefecture.' . $this->Prefecture->primaryKey => $id));
		$this->set('prefecture', $this->Prefecture->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Prefecture->create();
			if ($this->Prefecture->save($this->request->data)) {
				$this->Flash->success(__('The prefecture has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The prefecture could not be saved. Please, try again.'));
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
		if (!$this->Prefecture->exists($id)) {
			throw new NotFoundException(__('Invalid prefecture'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Prefecture->save($this->request->data)) {
				$this->Flash->success(__('The prefecture has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The prefecture could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Prefecture.' . $this->Prefecture->primaryKey => $id));
			$this->request->data = $this->Prefecture->find('first', $options);
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
		$this->Prefecture->id = $id;
		if (!$this->Prefecture->exists()) {
			throw new NotFoundException(__('Invalid prefecture'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Prefecture->delete()) {
			$this->Flash->success(__('The prefecture has been deleted.'));
		} else {
			$this->Flash->error(__('The prefecture could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
