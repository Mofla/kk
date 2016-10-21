<?php
namespace App\Controller\Forums;

use App\Controller\AppController;

/**
 * ThreadsFiles Controller
 *
 * @property \App\Model\Table\ThreadsFilesTable $ThreadsFiles
 */
class ThreadsFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Threads', 'Files']
        ];
        $threadsFiles = $this->paginate($this->ThreadsFiles);

        $this->set(compact('threadsFiles'));
        $this->set('_serialize', ['threadsFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Threads File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $threadsFile = $this->ThreadsFiles->get($id, [
            'contain' => ['Threads', 'Files']
        ]);

        $this->set('threadsFile', $threadsFile);
        $this->set('_serialize', ['threadsFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $threadsFile = $this->ThreadsFiles->newEntity();
        if ($this->request->is('post')) {
            $threadsFile = $this->ThreadsFiles->patchEntity($threadsFile, $this->request->data);
            if ($this->ThreadsFiles->save($threadsFile)) {
                $this->Flash->success(__('The threads file has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The threads file could not be saved. Please, try again.'));
            }
        }
        $threads = $this->ThreadsFiles->Threads->find('list', ['limit' => 200]);
        $files = $this->ThreadsFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('threadsFile', 'threads', 'files'));
        $this->set('_serialize', ['threadsFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Threads File id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $threadsFile = $this->ThreadsFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $threadsFile = $this->ThreadsFiles->patchEntity($threadsFile, $this->request->data);
            if ($this->ThreadsFiles->save($threadsFile)) {
                $this->Flash->success(__('The threads file has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The threads file could not be saved. Please, try again.'));
            }
        }
        $threads = $this->ThreadsFiles->Threads->find('list', ['limit' => 200]);
        $files = $this->ThreadsFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('threadsFile', 'threads', 'files'));
        $this->set('_serialize', ['threadsFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Threads File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $threadsFile = $this->ThreadsFiles->get($id);
        if ($this->ThreadsFiles->delete($threadsFile)) {
            $this->Flash->success(__('The threads file has been deleted.'));
        } else {
            $this->Flash->error(__('The threads file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
