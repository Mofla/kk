<?php
namespace App\Controller\Dashboard;

use App\Controller\AppController;

/**
 * FromToTasks Controller
 *
 * @property \App\Model\Table\FromToTasksTable $FromToTasks
 */
class FromToTasksController extends AppController
{

    public function add()
    {
        $this->autoRender = false;
        $fromToTask = $this->FromToTasks->newEntity();
        if ($this->request->is('post')) {
            $fromToTask = $this->FromToTasks->patchEntity($fromToTask, $this->request->data);
            if ($this->FromToTasks->save($fromToTask)) {
                $this->Flash->success(__('The from to task has been saved.'));

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('The from to task could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('fromToTask', 'projects', 'froms', 'tos'));
        $this->set('_serialize', ['fromToTask']);
    }


    public function deleteajax()
    {
        $this->request->allowMethod(['post', 'delete']);
        $from = $this->request->data('from_id');
        $to = $this->request->data('to_id');

        $toDelete = $this->FromToTasks->find()->where(['from_id' => $from])->where(['to_id' => $to])->first();


        $fromToTask = $this->FromToTasks->get($toDelete->id);
        if ($this->FromToTasks->delete($fromToTask)) {
            $this->Flash->success(__('The from to task has been deleted.'));
        } else {
            $this->Flash->error(__('The from to task could not be deleted. Please, try again.'));
        }

    }
}
