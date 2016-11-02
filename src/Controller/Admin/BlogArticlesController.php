<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * BlogArticles Controller
 *
 * @property \App\Model\Table\BlogArticlesTable $BlogArticles
 */
class BlogArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('front');

        $this->paginate = [
            'contain' => ['BlogCategories']
        ];
        $blogArticles = $this->paginate($this->BlogArticles);

        $this->set(compact('blogArticles'));
        $this->set('_serialize', ['blogArticles']);
    }

    /**
     * View method
     *
     * @param string|null $id Blog Article id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blogArticle = $this->BlogArticles->get($id, [
            'contain' => ['BlogCategories']
        ]);

        $this->set('blogArticle', $blogArticle);
        $this->set('_serialize', ['blogArticle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blogArticle = $this->BlogArticles->newEntity();
        if ($this->request->is('post')) {
            $blogArticle = $this->BlogArticles->patchEntity($blogArticle, $this->request->data);
            if ($this->BlogArticles->save($blogArticle)) {
                $this->Flash->success(__('The blog article has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The blog article could not be saved. Please, try again.'));
            }
        }
        $blogCategories = $this->BlogArticles->BlogCategories->find('list', ['limit' => 200]);
        $this->set(compact('blogArticle', 'blogCategories'));
        $this->set('_serialize', ['blogArticle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog Article id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blogArticle = $this->BlogArticles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blogArticle = $this->BlogArticles->patchEntity($blogArticle, $this->request->data);
            if ($this->BlogArticles->save($blogArticle)) {
                $this->Flash->success(__('The blog article has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The blog article could not be saved. Please, try again.'));
            }
        }
        $blogCategories = $this->BlogArticles->BlogCategories->find('list', ['limit' => 200]);
        $this->set(compact('blogArticle', 'blogCategories'));
        $this->set('_serialize', ['blogArticle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blogArticle = $this->BlogArticles->get($id);
        if ($this->BlogArticles->delete($blogArticle)) {
            $this->Flash->success(__('The blog article has been deleted.'));
        } else {
            $this->Flash->error(__('The blog article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
