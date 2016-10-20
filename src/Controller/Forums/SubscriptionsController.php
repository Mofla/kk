<?php
namespace App\Controller\Forums;

use App\Controller\AppController;

/**
 * Subscriptions Controller
 *
 * @property \App\Model\Table\SubscriptionsTable $Subscriptions
 */
class SubscriptionsController extends AppController
{

    public function add()
    {
        $this->autoRender = false;
        $subscription = $this->Subscriptions->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Auth->user('id');
            $this->request->data['user_id'] = $user;
            $subscription = $this->Subscriptions->patchEntity($subscription, $this->request->data);
            $this->Subscriptions->save($subscription);
        }
    }


    public function delete()
    {
        $this->autoRender = false;
        $user = $this->Auth->user('id');
        $id = $this->request->data['thread_id'];
        $this->request->allowMethod(['post', 'delete']);
        $subscription = $this->Subscriptions->find()
        ->where(['user_id'=> $user , 'thread_id'=> $id])
        ->first();
        $this->Subscriptions->delete($subscription);
    }
}
