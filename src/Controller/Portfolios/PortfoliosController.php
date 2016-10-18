<?php
namespace App\Controller\Portfolios;

use App\Controller\AppController;

/**
 * Portfolios Controller
 *
 * @property \App\Model\Table\PortfoliosTable $Portfolios
 */
class PortfoliosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id=null)
    {
        $portfolios = $this->Portfolios->find('all',[
            'contain' => 'Users'
        ]);
        if($id!=null)
        {
            $portfolios = $portfolios->matching('Users',function($q)use($id){
                return $q->where(['Users.id' => $id]);
            });
        }
        $this->paginate = [
            'limit' => 8
        ];
        $portfolios = $this->paginate($portfolios);
        $this->set(compact('portfolios'));
        $this->set('_serialize', ['portfolios']);
    }

    /**
     * View method
     *
     * @param string|null $id Portfolio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $portfolio = $this->Portfolios->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('portfolio', $portfolio);
        $this->set('_serialize', ['portfolio']);
    }


}
