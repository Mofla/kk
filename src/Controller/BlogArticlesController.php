<?php
namespace App\Controller;

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

}
