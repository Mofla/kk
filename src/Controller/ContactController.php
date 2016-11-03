<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

class ContactController extends AppController
{

    public function index()
    {
        if ($this->request->is('post')) {
            $recipients = ['perrinolivier88@gmail.com','florent.maillard.pro@gmail.com','prevotgwenael@gmail.com',
            'audrey.toussaints@gmail.com', 'znirgal@gmail.com', 'dassigny.kevin@hotmail.fr', 'alexis.nazimek88@gmail.com'];
            $data = [$this->request->data['name'], $this->request->data['email'], $this->request->data['phone']];
foreach ($recipients as $recipient){
            $email = new Email('default');
            $email->viewVars(['data' => $data]);
            $email->template('form', 'default')
                ->emailFormat('html');
            $email->to($recipient)
                ->subject('Vous avez reçu une demande via le formulaire de contact')
                ->send($this->request->data['message']);
}
}
    }


}
