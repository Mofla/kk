<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

class ContactController extends AppController
{

    public function index()
    {

        if ($this->request->is('post')) {
            $adminmail = TableRegistry::get('Users');
            $recipients = $adminmail->find('all')
                ->select('email')
                ->where(['role_id' => 1]);
            $data = [$this->request->data['name'], $this->request->data['email'], $this->request->data['phone']];
foreach ($recipients as $recipient){
            $email = new Email('default');
            $email->viewVars(['data' => $data]);
            $email->template('form', 'default')
                ->emailFormat('html');
            $email->to($recipient->email)
                ->subject('Vous avez reçu une demande via le formulaire de contact')
                ->send($this->request->data['message']);
}
}
    }


}
