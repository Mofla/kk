<?php
namespace App\Controller\Forums;

use App\Controller\AppController;

/**
 * Threads Controller
 *
 * @property \App\Model\Table\ThreadsTable $Threads
 */
class ThreadsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Forums']
        ];
        $threads = $this->paginate($this->Threads);

        $this->set(compact('threads'));
        $this->set('_serialize', ['threads']);
    }

    /**
     * View method
     *
     * @param string|null $id Thread id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {


        $thread = $this->Threads->get($id, [
            'contain' => ['Posts.Users','Users', 'Forums', 'Posts' => function($q) {
                return $q->order(['Posts.id' => 'ASC']);
            }]
        ]);


        $query = $this->Threads->query();
        $query->update()
            ->set($query->newExpr('countview = countview + 1'))
            ->where(['id' => $id])
            ->execute();
        $this->set(compact('thread'));
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $user = $this->Auth->user('id');

        $thread = $this->Threads->newEntity();

        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $user;
            $this->request->data['forum_id'] = $id;
            $thread = $this->Threads->patchEntity($thread, $this->request->data);
            if ($this->Threads->save($thread)) {

                $query = $this->Threads->Forums->query();
                $query->update()
                    ->set($query->newExpr('countthread = countthread + 1'))
                    ->where(['id' => $id])
                    ->execute();

                $this->Flash->success(__('The thread has been saved.'));
                return $this->redirect(['action' => 'view', $thread->id ]);
            } else {
                $this->Flash->error(__('The thread could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('thread', 'user', 'forums'));
        $this->set('_serialize', ['thread']);
    }



    public function edit($id = null)
    {
        $thread = $this->Threads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $thread = $this->Threads->patchEntity($thread, $this->request->data);
            if ($this->Threads->save($thread)) {
                $this->Flash->success(__('The thread has been saved.'));

                return $this->redirect(['action' => 'view' , $id]);
            } else {
                $this->Flash->error(__('The thread could not be saved. Please, try again.'));
            }
        }
        $users = $this->Threads->Users->find('list', ['limit' => 200]);
        $forums = $this->Threads->Forums->find('list', ['limit' => 200]);
        $this->set(compact('thread', 'users', 'forums'));
        $this->set('_serialize', ['thread']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Thread id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $thread = $this->Threads->get($id);
        $post = $this->Threads->find()
            ->contain('Posts')
            ->where(['Threads.id' => $id])->count();

        $forumid = $this->Threads->find()
            ->select('forum_id')
            ->where(['id' => $id])
            ->first();

        if ($this->Threads->delete($thread)) {
            $this->Flash->success(__('The thread has been deleted.'));
            $query = $this->Threads->Forums->query();
            $query->update()
                ->set([$query->newExpr('countthread = countthread - 1'),
                    $query->newExpr('countpost = countpost - '.$post.'')])
                ->where(['id' => $forumid->forum_id])
                ->execute();
        } else {
            $this->Flash->error(__('The thread could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
}
