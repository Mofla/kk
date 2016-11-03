<?php
namespace App\Controller\Dashboard;

use App\Controller\AppController;
use Cake\Event\EventManager;
use Cake\Event\Event;
use Cake\Event\EventList;
use Cake\ORM\TableRegistry;
use App\Event\TasksListener;
use Cake\I18n\Time;
Time::setToStringFormat('yyyy/MM/dd HH:mm');

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController
{


    public function editation($id = null)
    {

        $this->autoRender = false;

        $this->Tasks->eventManager()->on(new TasksListener,$this);

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




    public function viewforum($id = null)
    {
        $sub = $this->Tasks->Threads->Subscriptions;
        $user = $this->Auth->user('id');
        $subscription = $sub->find()
            ->select('id')
            ->where(['user_id'=> $user , 'thread_id'=> $id])
            ->first();

        $thread = $this->Tasks->Threads->get($id, [
            'contain' => ['Files','Posts.Users','Posts.Files','Users', 'Forums', 'Posts' => function($q) {
                return $q->order(['Posts.id' => 'ASC']);
            }]
        ]);


        $query = $this->Tasks->Threads->query();
        $query->update()
            ->set($query->newExpr('countview = countview + 1'))
            ->where(['id' => $id])
            ->execute();
        $this->set(compact('thread','subscription'));
    }

    public function addpost($id = null)
    {
        $time = Time::now();
        $user = $this->Auth->user('id');


        $forumid = $this->Tasks->Threads->find()
            ->select(['forum_id','subject'])
            ->where(['id' => $id])
            ->first();
        $post = $this->Tasks->Threads->Posts->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $user;
            $this->request->data['thread_id'] = $id;
            $post = $this->Tasks->Threads->Posts->patchEntity($post, $this->request->data);
            if ($this->Tasks->Threads->Posts->save($post)) {

                $this->Flash->success(__('The post has been saved.'));
                $query = $this->Tasks->Threads->Forums->query();
                $query->update()
                    ->set([$query->newExpr('countpost = countpost + 1'),'lastuser' => $user ,
                        'lasttopic' => $post->id ])
                    ->where(['id' => $forumid->forum_id])
                    ->execute();

                $threadlast = $this->Tasks->Threads->query();
                $threadlast->update()
                    ->set(['lastuser' => $user ,
                        'lastpost' => $time ])
                    ->where(['id' => $id])
                    ->execute();

            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('post','forumid','pastquote','add','sub'));
        $this->set('_serialize', ['post']);
    }

    public function edittask($id = null)
    {
        $this->Tasks->eventManager()->on(new TasksListener,$this);
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

                    return $this->redirect($this->referer() . '#tab_1');
                } else {
                    $this->Flash->error(__('The task could not be saved. Please, try again.'));
                }

                return $this->redirect($this->referer() . '#tab_1');
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
            $this->Tasks->Threads->delete($thread);


        }

    }
}
