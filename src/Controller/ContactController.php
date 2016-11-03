<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

class ContactController extends AppController
{

    public function index()
    {
        if ($this->request->is('post')) {
            $data = [$this->request->data['name'], $this->request->data['phone']];

            $email = new Email('default');
            $email->viewVars(['data' => $data]);
            $email->template('form', 'default')
                ->emailFormat('html');
            $email->to('perrinolivier88@gmail.com')
                ->subject('Vous avez reçu une demande via le formulaire de contact')
                ->send($this->request->data['message']);
}
    }


}
