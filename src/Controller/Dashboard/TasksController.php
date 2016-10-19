<?php
namespace App\Controller\Dashboard;

use App\Controller\AppController;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['States', 'Projects', 'Users']
        ];
        $tasks = $this->paginate($this->Tasks);

        $this->set(compact('tasks'));
        $this->set('_serialize', ['tasks']);
    }

    public function editation($id = null) {
        $this->autoRender = false;


        $task = $this->Tasks->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $task = $this->Tasks->patchEntity($task, $this->request->data);

            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => ['States', 'Projects', 'Users']
        ]);

        $this->set('task', $task);
        $this->set('_serialize', ['task']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        $states = $this->Tasks->States->find('list', ['limit' => 200]);
        $projects = $this->Tasks->Projects->find('list', ['limit' => 200]);
        $users = $this->Tasks->Users->find('list', ['limit' => 200]);
        $this->set(compact('task', 'states', 'projects', 'users'));
        $this->set('_serialize', ['task']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        $states = $this->Tasks->States->find('list', ['limit' => 200]);
        $projects = $this->Tasks->Projects->find('list', ['limit' => 200]);
        $users = $this->Tasks->Users->find('list', ['limit' => 200]);
        $this->set(compact('task', 'states', 'projects', 'users'));
        $this->set('_serialize', ['task']);
    }

    public function edittask($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['controller' => 'projects', 'action' => 'view', $id]);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }

        $users = $this->Tasks->Users->find('list', [
            'keyField' => 'id',
            'valueField' => function($q){
                return $q['firstname'].' '.$q['lastname'];
            }
        ]);
        $this->set(compact('task', 'users'));
        $this->set('_serialize', ['task']);
    }

    public function addtask($id = null) {


        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            $task->project_id = $id;
            $task->state_id = 1;
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['controller' => 'projects', 'action' => 'view', $id]);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        $states = $this->Tasks->States->find('list', ['limit' => 200]);
        $users = $this->Tasks->Users->find('list', [
            'keyField' => 'id',
            'valueField' => function($q){
                return $q['firstname'].' '.$q['lastname'];
            }
        ]);
        $this->set(compact('task', 'states', 'projects', 'users'));
        $this->set('_serialize', ['task']);


    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
}
