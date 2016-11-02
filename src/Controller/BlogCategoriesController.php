<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BlogCategories Controller
 *
 * @property \App\Model\Table\BlogCategoriesTable $BlogCategories
 */
class BlogCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $blogCategories = $this->paginate($this->BlogCategories);

        $this->set(compact('blogCategories'));
        $this->set('_serialize', ['blogCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Blog Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blogCategory = $this->BlogCategories->get($id, [
            'contain' => ['BlogArticles']
        ]);

        $this->set('blogCategory', $blogCategory);
        $this->set('_serialize', ['blogCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */

}
