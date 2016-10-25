<?php
namespace App\Controller\Tchat;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Tchats Controller
 *
 * @property \App\Model\Table\TchatsTable $Tchats */
class TchatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id_room = NULL)
    {
        $user = $this->Auth->User('username');
        $id = $this->Auth->User('id');
        $time = Time::now();
        $time->timezone = 'Europe/Paris';
        $time->i18nFormat('Y-m-d h:m:s');

        $time_2 = Time::now();
        $time_2->timezone = 'Europe/Paris';
        $time_2->i18nFormat('Ymdhms');
        $time_2->modify('-1 weeks');

        $list_message = $this->Tchats->find('all')->contain('Users')->where(['room_id'=>$id_room])->order('date');
        $count_message = $this->Tchats->find('all')->count();

        $this->set(compact('tchat','list_message','user','id','time_2','count_message'));
        $this->set('_serialize', ['tchat']);
    }

    public function counttchat()
    {
        $nombre_message = $this->Tchats->find('all')->count();

        $this->set(compact('nombre_message'));
    }

    public function add($id_room = NULL)
    {
        $users = $this->Auth->User('id');
        $this->loadModel('Rooms');
        $id_rooms = $id_room ;
        $user = $this->Auth->User('username');
        $id_user = $this->Auth->User('id');
        $time = Time::now();
        $time->timezone = 'Europe/Paris';
        $time->i18nFormat('Y-m-d h:m:s');

        $time_2 = Time::now();
        $time_2->timezone = 'Europe/Paris';
        $time_2->i18nFormat('Ymdhms');
        $time_2->modify('-1 weeks');

        $tchat = $this->Tchats->newEntity();

        if ($this->request->is('ajax')) {

            $tchat = $this->Tchats->patchEntity($tchat, $this->request->data);

/*            $tchat->room_id = $id_room ;*/

            $tchat->user_id = $users ;

            $tchat->date = $time;

             $this->Tchats->save($tchat);
        }
        $name_rooms = $this->Rooms->find('all')->contain('Users')->where(['id'=>$id_rooms]);
        $count_message = $this->Tchats->find('all')->where(['room_id'=>$id_rooms])->count();

        $this->set(compact('tchat','user','id_user','time_2','count_message','id_rooms','name_rooms','users'));
        $this->set('_serialize', ['tchat']);
    }
    public function history(){

        $date_fin = $this->request->data('datefin');
        $date_debut = $this->request->data('datedebut');
        $user = '2';

        if (empty($date_fin)&&empty($date_debut)){

            $list_message = $this->Tchats->find('all')->contain('Users');
        }

        if (!empty($date_debut)&&empty($date_fin)){

            $date_debut = $this->request->data('datedebut');
            $date_fin = "";
            $list_message = $this->Tchats->find('all')->contain('Users')->where(['date >'=>$date_debut]);


        }
        if (!empty($date_fin)&&empty($date_debut)){

            $date_fin = $this->request->data('datefin');
            $date_debut = "";
            $list_message = $this->Tchats->find('all')->contain('Users')->where(['date <'=>$date_fin]);

        }
        if (!empty($date_fin)&&!empty($date_debut)){

            $date_debut = $this->request->data('datedebut');
            $date_fin = $this->request->data('datefin');
            $list_message = $this->Tchats->find('all')->contain('Users')->where(['date BETWEEN'=>$date_debut])->andWhere(['"'.$date_fin.'"']);

        }
        $empty = "";
        if($list_message->isEmpty()) {
            $empty = "Il y a pas de message avec votre critere de recherche";
        }

        $this->set(compact('list_message','date_fin','date_debut','empty'));
}

public function autorize(){}
}
