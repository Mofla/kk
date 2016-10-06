<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PostsFiles Controller
 *
 * @property \App\Model\Table\PostsFilesTable $PostsFiles
 */
class PostsFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Posts', 'Files']
        ];
        $postsFiles = $this->paginate($this->PostsFiles);

        $this->set(compact('postsFiles'));
        $this->set('_serialize', ['postsFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Posts File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $postsFile = $this->PostsFiles->get($id, [
            'contain' => ['Posts', 'Files']
        ]);

        $this->set('postsFile', $postsFile);
        $this->set('_serialize', ['postsFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $postsFile = $this->PostsFiles->newEntity();
        if ($this->request->is('post')) {
            $postsFile = $this->PostsFiles->patchEntity($postsFile, $this->request->data);
            if ($this->PostsFiles->save($postsFile)) {
                $this->Flash->success(__('The posts file has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The posts file could not be saved. Please, try again.'));
            }
        }
        $posts = $this->PostsFiles->Posts->find('list', ['limit' => 200]);
        $files = $this->PostsFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('postsFile', 'posts', 'files'));
        $this->set('_serialize', ['postsFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Posts File id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $postsFile = $this->PostsFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $postsFile = $this->PostsFiles->patchEntity($postsFile, $this->request->data);
            if ($this->PostsFiles->save($postsFile)) {
                $this->Flash->success(__('The posts file has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The posts file could not be saved. Please, try again.'));
            }
        }
        $posts = $this->PostsFiles->Posts->find('list', ['limit' => 200]);
        $files = $this->PostsFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('postsFile', 'posts', 'files'));
        $this->set('_serialize', ['postsFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Posts File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $postsFile = $this->PostsFiles->get($id);
        if ($this->PostsFiles->delete($postsFile)) {
            $this->Flash->success(__('The posts file has been deleted.'));
        } else {
            $this->Flash->error(__('The posts file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
