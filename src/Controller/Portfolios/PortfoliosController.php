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
        ])->where(['finished' => 1]);
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
        $is_authorized = false;
        foreach($portfolio->users as $users)
        {
            if($users->id == $this->Auth->user('id') && count($portfolio->users) == 1)
            {
                $is_authorized = true;
            }
        }

        $this->set('portfolio', $portfolio);
        $this->set('is_authorized',$is_authorized);
        $this->set('_serialize', ['portfolio']);
    }

    public function add($id = null)
    {
        if($id != $this->Auth->user('id'))
        {
            return $this->redirect(['controller' => 'Pages', 'action' => '/']);
        }
        $portfolio = $this->Portfolios->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['users_number'] = 1;
            $this->request->data['finished'] = 1;
            $this->request->data['users'] = [
                '_ids' => [$id]
            ];

            $portfolio = $this->Portfolios->patchEntity($portfolio, $this->request->data);
            if ($this->Portfolios->save($portfolio)) {
                // add image
                $picture = $this->Upload->getPicture($this->request->data['picture'],'Portfolios',$portfolio->id,500,500);
                $this->request->data['picture_url'] = $picture;
                $portfolio = $this->Portfolios->patchEntity($portfolio, $this->request->data);
                $this->Portfolios->save($portfolio);
                // end add image
                $this->Flash->success(__('The portfolio has been saved.'));

                return $this->redirect(['action' => 'index',$id]);
            }else {
                $this->Flash->error(__('The portfolio could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('portfolio','users','id'));
    }

    public function edit($id = null)
    {
        $portfolio = $this->Portfolios->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if(!empty($this->request->data['picture']['name']))
            {
                $picture = $this->Upload->getPicture($this->request->data['picture'],'Portfolios',$id,500,500);
                $this->request->data['picture_url'] = $picture;
            }
            $portfolio = $this->Portfolios->patchEntity($portfolio, $this->request->data);
            if ($this->Portfolios->save($portfolio)) {
                $this->Flash->success(__('The portfolio has been saved.'));

                return $this->redirect(['action' => 'view',$portfolio->id]);
            } else {
                $this->Flash->error(__('The portfolio could not be saved. Please, try again.'));
            }
        }
        $users = $this->Portfolios->Users->find('list', [
            'keyField' => 'id',
            'valueField' => function($q){
                return $q['firstname'].' '.$q['lastname'];
            }
        ]);
        $this->set(compact('portfolio', 'users'));
        $this->set('_serialize', ['portfolio']);
    }

    public function test()
    {
        $test = $this->Common->scanEverything();
        $modules = $this->Common->getModules();
        $controllers = $this->Common->getControllers('Admin');
        $actions = $this->Common->getActions('Admin','Users');
        $this->set('test',$test);
        $this->set('modules',$modules);
        $this->set('controllers',$controllers);
        $this->set('actions',$actions);
    }

}
