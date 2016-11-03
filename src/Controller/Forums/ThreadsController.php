<?php
namespace App\Controller\Forums;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\View\Helper\PaginatorHelper;
use Cake\Event\Event;
/**
 * Threads Controller
 *
 * @property \App\Model\Table\ThreadsTable $Threads
 */
class ThreadsController extends AppController
{

    public $paginate = [
        'limit' => 12,
        'order' => [
            'Posts.id' => 'asc'
        ]
    ];
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function view($fid = null, $forum = null, $slug = null, $id = null)
    {
        $role = $this->Auth->user('role_id');
        $sub = $this->Threads->Subscriptions;
        $user = $this->Auth->user('id');
        $subscription = $sub->find()
            ->select('id')
            ->where(['user_id'=> $user , 'thread_id'=> $id])
            ->first();

        $thread = $this->Threads->find()
            ->contain(['Files','Users.Roles'])
        ->where(['Threads.id' => $id])
        ->first();

        $posts = $this->Threads->Posts->find('all')
           ->contain(['Users.Roles','Files'])
            ->where(['thread_id' => $id]);

        $query = $this->Threads->query();
        $query->update()
            ->set($query->newExpr('countview = countview + 1'))
            ->where(['id' => $id])
            ->execute();

        $this->set(compact('thread','subscription','fid','forum','slug','id','role'));
        $this->set('posts', $this->paginate($posts));
    }


    public function add($slug = null, $id = null)
    {
        $user = $this->Auth->user('id');

        $thread = $this->Threads->newEntity();

        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $user;
            $this->request->data['forum_id'] = $id;
            $thread = $this->Threads->patchEntity($thread, $this->request->data);
            if ($this->Threads->save($thread)) {
#upload de fichier
                $picture = $this->Upload->getFile($this->request->data['upload'],'files');
                $this->request->data['upload'] = $picture;
                $file = $this->Threads->Files->newEntity();
                $this->request->data['name'] = $picture ;
                $this->request->data['post_id'] = $thread->id ;
                $file = $this->Threads->Files->patchEntity($file, $this->request->data);
                $this->Threads->Files->save($file);
                $data = [
                    'thread_id' => $thread->id
                    ,
                    'file_id' => $file->id

                ];
                $fp = TableRegistry::get('threads_files');
                $postsFiles = $fp->newEntity();
                $postsFiles = $fp->patchEntity($postsFiles,$data);
                $fp->save($postsFiles);

                $query = $this->Threads->Forums->query();
                $query->update()
                    ->set($query->newExpr('countthread = countthread + 1'))
                    ->where(['id' => $id])
                    ->execute();

                $this->Flash->success(__('The thread has been saved.'));
                return $this->redirect(['controller'=>'Forums','action' => 'view' , 'slug' => strtolower(str_replace(' ', '-', $slug)), 'id' => $id]);
            } else {
                $this->Flash->error(__('The thread could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('thread', 'user', 'forums'));
        $this->set('_serialize', ['thread']);
    }



    public function edit($fid = null, $forum = null, $slug = null, $id = null)
    {
        $thread = $this->Threads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $thread = $this->Threads->patchEntity($thread, $this->request->data);
            if ($this->Threads->save($thread)) {
                $this->Flash->success(__('The thread has been saved.'));

                return $this->redirect(['controller'=>'Threads','action' => 'view' , 'fid' => $fid, 'forum' => strtolower(str_replace(' ', '-', $forum)), 'slug' => strtolower(str_replace(' ', '-', $slug)), 'id' => $id ]);

            } else {
                $this->Flash->error(__('The thread could not be saved. Please, try again.'));
            }
        }
        $users = $this->Threads->Users->find('list', ['limit' => 200]);
        $forums = $this->Threads->Forums->find('list', ['limit' => 200]);
        $this->set(compact('thread', 'users', 'forums'));
        $this->set('_serialize', ['thread']);
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $thread = $this->Threads->get($id);

        $post = $this->Threads->find()
            ->select('countpost')
            ->where(['Threads.id' => $id])
            ->first();

        $forumid = $this->Threads->find()
            ->select('forum_id')
            ->where(['id' => $id])
            ->first();

        if ($this->Threads->delete($thread)) {
            $this->Flash->success(__('The thread has been deleted.'));
            $query = $this->Threads->Forums->query();
            $query->update()
                ->set([$query->newExpr('countthread = countthread - 1'),
                    $query->newExpr('countpost = countpost - '.$post->countpost.'')])
                ->where(['id' => $forumid->forum_id])
                ->execute();
        } else {
            $this->Flash->error(__('The thread could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $actions = $this->Common->guestActions($this->params['prefix'],$this->params['controller']);
        $this->Auth->allow($actions);
    }
}
