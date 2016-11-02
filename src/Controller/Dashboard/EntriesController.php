<?php
namespace App\Controller\Dashboard;

use App\Controller\AppController;
use Cake\I18n\Time;
Time::setToStringFormat('yyyy/MM/dd HH:mm');


/**
 * Entries Controller
 *
 * @property \App\Model\Table\EntriesTable $Entries
 */
class EntriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Diaries']
        ];
        $entries = $this->paginate($this->Entries);

        $this->set(compact('entries'));
        $this->set('_serialize', ['entries']);
    }

    public function liste()
    {
        $this->paginate = [
            'contain' => ['Diaries']
        ];
        $entries = $this->paginate($this->Entries);

        $this->set(compact('entries'));
        $this->set('_serialize', ['entries']);
    }
    /**
     * View method
     *
     * @param string|null $id Entry id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entry = $this->Entries->get($id, [
            'contain' => ['Diaries']
        ]);

        $this->set('entry', $entry);
        $this->set('_serialize', ['entry']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */

    public function autoadd()
    {
        $entry = $this->Entries->newEntity();
        if ($this->request->is('post')) {
            $entry = $this->Entries->patchEntity($entry, $this->request->data);
            if ($this->Entries->save($entry)) {
                $this->Flash->success(__('The entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The entry could not be saved. Please, try again.'));
            }
        }
        $diaries = $this->Entries->Diaries->find('list', ['limit' => 200]);
        $this->set(compact('entry', 'diaries'));
        $this->set('_serialize', ['entry']);
    }

    public function add($id = null)
    {

        $time = Time::now();
        $entry = $this->Entries->newEntity();
        if ($this->request->is('post')) {
            $entry = $this->Entries->patchEntity($entry, $this->request->data);
            $entry->date = $time;
            if ($this->Entries->save($entry)) {
                $this->Flash->success(__('The entry has been saved.'));
                
                return $this->redirect($this->referer() . '#tab_5');

            } else {
                $this->Flash->error(__('The entry could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('entry', 'id'));
        $this->set('_serialize', ['entry']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Entry id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->autoRender = false;
        $entry = $this->Entries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entry = $this->Entries->patchEntity($entry, $this->request->data);
            $entry->date = Time::now();
            if ($this->Entries->save($entry)) {
                $this->redirect($this->referer() . '#tab_5');
                $this->Flash->success(__('The entry has been saved.'));

            } else {
                $this->Flash->error(__('The entry could not be saved. Please, try again.'));
            }
        }
        $diaries = $this->Entries->Diaries->find('list', ['limit' => 200]);
        $this->set(compact('entry', 'diaries'));
        $this->set('_serialize', ['entry']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Entry id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entry = $this->Entries->get($id);
        if ($this->Entries->delete($entry)) {
            $this->Flash->success(__('The entry has been deleted.'));
        } else {
            $this->Flash->error(__('The entry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
