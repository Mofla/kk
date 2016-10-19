<?php
namespace App\Controller\Admin;

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

    public function index()
    {
        $portfolios = $this->Portfolios->find('all', [
            'contain' => 'Users'
        ]);
        $this->paginate = [
            'limit' => 10
        ];
        $portfolios = $this->paginate($portfolios);

        $this->set(compact('portfolios'));
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $portfolio = $this->Portfolios->newEntity();
        if ($this->request->is('post')) {
            $portfolio = $this->Portfolios->patchEntity($portfolio, $this->request->data);
            if ($this->Portfolios->save($portfolio)) {
                // add image
                $picture = $this->Upload->getPicture($this->request->data['picture'],'Portfolios',$portfolio->id,500,500);
                $this->request->data['picture_url'] = $picture;
                $portfolio = $this->Portfolios->patchEntity($portfolio, $this->request->data);
                $this->Portfolios->save($portfolio);
                // end add image
                $this->Flash->success(__('The portfolio has been saved.'));

                return $this->redirect(['action' => 'index']);
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

    /**
     * Edit method
     *
     * @param string|null $id Portfolio id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
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

                return $this->redirect(['action' => 'index']);
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

    /**
     * Delete method
     *
     * @param string|null $id Portfolio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $portfolio = $this->Portfolios->get($id);
        $image = $portfolio->picture_url;
        if ($this->Portfolios->delete($portfolio)) {
            $this->Upload->deleteImage('Portfolios',$image);
            $this->Flash->success(__('The portfolio has been deleted.'));
        } else {
            $this->Flash->error(__('The portfolio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
