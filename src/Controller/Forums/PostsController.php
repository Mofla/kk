<?php
namespace App\Controller\Forums;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Threads']
        ];
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Users', 'Threads', 'Files']
        ]);

        $this->set('post', $post);
        $this->set('_serialize', ['post']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $user = $this->Auth->user('id');
        $forumid = $this->Posts->Threads->find()
            ->select('forum_id')
            ->where(['id' => $id])
            ->first();
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $user;
            $this->request->data['thread_id'] = $id;
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                $query = $this->Posts->Threads->forums->query();
                $query->update()
                    ->set([$query->newExpr('countpost = countpost + 1'),'lastuser' => $user])
                    ->where(['id' => $forumid->forum_id])
                    ->execute();
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('post'));
        $this->set('_serialize', ['post']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Files']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $threads = $this->Posts->Threads->find('list', ['limit' => 200]);
        $files = $this->Posts->Files->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users', 'threads', 'files'));
        $this->set('_serialize', ['post']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $forumid = $this->Posts->Threads->find()
            ->select('forum_id')
            ->where(['id' => $id])
            ->first();
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
            $query = $this->Posts->Threads->forums->query();
            $query->update()
                ->set($query->newExpr('countpost = countpost - 1'))
                ->where(['id' => $forumid->forum_id])
                ->execute();
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
