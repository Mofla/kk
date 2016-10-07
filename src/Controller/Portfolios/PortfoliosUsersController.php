<?php
namespace App\Controller\Portfolios;

use App\Controller\AppController;

/**
 * PortfoliosUsers Controller
 *
 * @property \App\Model\Table\PortfoliosUsersTable $PortfoliosUsers
 */
class PortfoliosUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Portfolios', 'Users']
        ];
        $portfoliosUsers = $this->paginate($this->PortfoliosUsers);

        $this->set(compact('portfoliosUsers'));
        $this->set('_serialize', ['portfoliosUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Portfolios User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $portfoliosUser = $this->PortfoliosUsers->get($id, [
            'contain' => ['Portfolios', 'Users']
        ]);

        $this->set('portfoliosUser', $portfoliosUser);
        $this->set('_serialize', ['portfoliosUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $portfoliosUser = $this->PortfoliosUsers->newEntity();
        if ($this->request->is('post')) {
            $portfoliosUser = $this->PortfoliosUsers->patchEntity($portfoliosUser, $this->request->data);
            if ($this->PortfoliosUsers->save($portfoliosUser)) {
                $this->Flash->success(__('The portfolios user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The portfolios user could not be saved. Please, try again.'));
            }
        }
        $portfolios = $this->PortfoliosUsers->Portfolios->find('list', ['limit' => 200]);
        $users = $this->PortfoliosUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('portfoliosUser', 'portfolios', 'users'));
        $this->set('_serialize', ['portfoliosUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Portfolios User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $portfoliosUser = $this->PortfoliosUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $portfoliosUser = $this->PortfoliosUsers->patchEntity($portfoliosUser, $this->request->data);
            if ($this->PortfoliosUsers->save($portfoliosUser)) {
                $this->Flash->success(__('The portfolios user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The portfolios user could not be saved. Please, try again.'));
            }
        }
        $portfolios = $this->PortfoliosUsers->Portfolios->find('list', ['limit' => 200]);
        $users = $this->PortfoliosUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('portfoliosUser', 'portfolios', 'users'));
        $this->set('_serialize', ['portfoliosUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Portfolios User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $portfoliosUser = $this->PortfoliosUsers->get($id);
        if ($this->PortfoliosUsers->delete($portfoliosUser)) {
            $this->Flash->success(__('The portfolios user has been deleted.'));
        } else {
            $this->Flash->error(__('The portfolios user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
