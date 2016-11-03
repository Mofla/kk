<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\Helper\TimeHelper;
use Cake\I18n\Time;
use Cake\ORM\ResultSet;

/**
 * BlogArticles Controller
 *
 * @property \App\Model\Table\BlogArticlesTable $BlogArticles
 *  * @property \App\Model\Table\BlogCategoriesTableTable $BlogCategories
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
        $this->loadModel('BlogCategories');
        $this->paginate = [
            'contain' => ['BlogCategories']
        ];
        $blogArticles = $this->paginate($this->BlogArticles);
        $categories= $this->BlogCategories->find('all', [
            'limit' => 5]);

        $last_news= $this->BlogArticles->find('all', [
            'limit' => 3,
            'order' => 'BlogArticles.created DESC']);

        $this->set(compact('blogArticles','categories','last_news'));
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
        $this->loadModel('BlogCategories');

        $last_news= $this->BlogArticles->find('all', [
            'limit' => 3,
            'order' => 'BlogArticles.created DESC']);

        $this->set('blogArticle', $blogArticle);
        $this->set(compact('last_news'));
        $this->set('_serialize', ['blogArticle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */

}
