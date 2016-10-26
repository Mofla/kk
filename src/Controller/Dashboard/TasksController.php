<?php
namespace App\Controller\Dashboard;

use App\Controller\AppController;
use Cake\Event\EventManager;
use Cake\Event\Event;
use Cake\Event\EventList;
use Cake\ORM\TableRegistry;
use App\Event\TasksListener;

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

    public function editation($id = null)
    {
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

    public function viewajax($id = null)
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
//        new task listener
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
        $this->Tasks->eventManager()->on(new TasksListener());
        $task = $this->Tasks->get($id, [
            'contain' => ['Users']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }


        $project = $task->project_id;
        $users = $this->Tasks->Users->find('list', [
            'keyField' => 'id',
            'valueField' => function ($q) {
                return $q['firstname'] . ' ' . $q['lastname'];
            }
        ])->matching('Projects',
            function ($q) use ($project) {
                return $q->where(['project_id' => $project]);
            });

        $this->set(compact('task', 'users'));
        $this->set('_serialize', ['task']);
    }

    public function addtask($id = null)
    {
        $this->Tasks->eventManager()->on(new TasksListener());
        $thread = $this->Tasks->Threads->newEntity();

        $uid = $this->Auth->user('id');

        $name = $this->request->data('name');


        $project = $this->Tasks->Projects->get($id);


        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $thread = $this->Tasks->Threads->patchEntity($thread, $this->request->data);
            $thread->forum_id = $project->forum_id;
            $thread->user_id = $uid;
            $thread->subject = $name;
            $thread->text = 'Fil de discussion de la tâche : ' . $name . 'du projet : ' . $project->name;
            if ($this->Tasks->Threads->save($thread)) {
                $this->Flash->success(__('The task has been saved.'));

                $task = $this->Tasks->patchEntity($task, $this->request->data);
                $task->thread_id = $thread->id;
                $task->project_id = $id;
                $task->state_id = 1;
                if ($this->Tasks->save($task)) {
                    $this->Flash->success(__('The task has been saved.'));

                    return $this->redirect($this->referer());
                } else {
                    $this->Flash->error(__('The task could not be saved. Please, try again.'));
                }

                return $this->redirect(['controller' => 'projects', 'action' => 'gestion', $id]);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        $states = $this->Tasks->States->find('list', ['limit' => 200]);

        $users = $this->Tasks->Users->find('list', [
            'keyField' => 'id',
            'valueField' => function ($q) {
                return $q['firstname'] . ' ' . $q['lastname'];
            }
        ])->matching('Projects',
            function ($q) use ($project) {
                return $q->where(['project_id' => $project->id]);
            });

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

        $thread = $this->Tasks->Threads->get($task->thread_id);

        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The task has been deleted.'));
            $this->Tasks->Threads->delete($thread);
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
}
