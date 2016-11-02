<?php
namespace App\Controller\Connecteursmanager;

use App\Controller\AppController;

/**
 * Connectors Controller
 *
 * @property \App\Model\Table\ConnectorsTable $Connectors
 */
class ConnectorsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Common');
    }

    public function index()
    {
        $connectors = $this->Connectors->find('all',[
            'contain' => ['Permissions']
        ]);
        $actions = $this->Common->scanEverything(true);
        $compare = [];
        foreach ($connectors as $connector)
        {
            $compare[$connector->module][$connector->controller][$connector->function] = $connector->permission_id;
        }
        $permissions = $this->Connectors->Permissions->find('list');
        if($this->request->is(['post','put','patch']))
        {
            foreach($this->request->data as $key => $value)
            {
                // je récupère toutes les permissions choisies et les stocks dans un data
                // pour les save ensuite
                $explode = explode('-',$key);
                $options = [
                    'module' => $explode[0],
                    'controller' => $explode[1],
                    'function' => $explode[2]
                ];
                $check = $this->Connectors->find()->select('id')->where($options)->first();
                if($value != 0)
                {
                    $data[] = array_merge(['permission_id' => $value,],$options);

                }
                else{
                    if($check != null)
                    {
                        $check = $this->Connectors->get($check->id);
                        $this->Connectors->delete($check);
                    }
                }
            }
            $connectors = $this->Connectors->newEntities($data);
            $connectors = $this->Connectors->patchEntities($connectors,$data);
            if($this->Connectors->saveMany($connectors))
            {
                $this->Flash->success('Braval');
                return $this->redirect(['controller' => 'Permissions','action' => 'index']);
            }
        }

        $this->set(compact(['connectors','actions','compare','permissions']));
    }

    /**
     * Delete method
     *
     * @param string|null $id Connector id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $connector = $this->Connectors->get($id);
        if ($this->Connectors->delete($connector)) {
            $this->Flash->success(__('The connector has been deleted.'));
        } else {
            $this->Flash->error(__('The connector could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
