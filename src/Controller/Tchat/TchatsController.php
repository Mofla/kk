<?php
namespace App\Controller\Tchat;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Log\Log;

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
        $role = $this->Auth->User('role_id');

        if ($role != '1'):

            return $this->redirect(['action' => 'autorize']);

            endif;

        $time_2 = Time::now();
        $time_2->timezone = 'Europe/Paris';
        $time_2->i18nFormat('Ymdhms');
        $time_2->modify('-1 weeks');

        $list_message = $this->Tchats->find('all')->contain('Users')->where(['room_id'=>$id_room])->order('date');
        $count_message = $this->Tchats->find('all')->where(['room_id'=>$id_room])->count();

        $this->set(compact('tchat','list_message','user','id','time_2','count_message'));
        $this->set('_serialize', ['tchat']);
    }

    public function counttchat($id_room = NULL)
    {
        $nombre_message = $this->Tchats->find('all')->where(['room_id'=>$id_room])->count();

        $this->set(compact('nombre_message'));
    }

    public function add($id_room = NULL)
    {


        $users = $this->Auth->User('id');
        $this->loadModel('Rooms');
        $id_rooms = $id_room ;
        $user = $this->Auth->User('username');
        $time = Time::now();
        $time->timezone = 'Europe/Paris';
        $time->i18nFormat('Y-m-d h:m:s');
        $mess = $this->request->data('message');

        $trans = array( "<<"=>":",">>"=>":","<script><script>" => ":Script:","</script></script>" => ":Script:","<script>" => ":Script:","<script type='javascript'>" => ":Script:", "</script>" => ":endScript:", "<?php" => ":php:", "?>" => ":endphp:", "<?=" => "echo", "<style>" => ":Style:", "</style>" => ":style:","<style type= text/css>"=>":Style:","<div style="=>":Div:","<p style="=>":P:","</div>"=>":EndDiv:","</p>"=>":EndP:","</code>"=>":EndCode:","<code>"=>":Code:","//"=>":Com:","<--"=>":Com:","<!--"=>":Com:");
        $replace = strtr($mess, $trans);

            Log::config('log', function () {
                return new \Cake\Log\Engine\FileLog(['path' => LOGS, 'file' => 'archive']);
            });

        $message = $this->request->data('message');
        if ( !empty($message)){
            $this->log($message);
        }
        $tchat = $this->Tchats->newEntity();

        if ($this->request->is('post')) {

            $tchat = $this->Tchats->patchEntity($tchat, $this->request->data);

            $tchat->message = $replace;

            $tchat->user_id = $users ;

            $tchat->date = $time;

             $this->Tchats->save($tchat);
        }
        $name_rooms = $this->Rooms->find('all')->contain('Users')->where(['id'=>$id_rooms]);
        $count_message = $this->Tchats->find('all')->where(['room_id'=>$id_rooms])->count();


        $c = 0 ;
        foreach ($name_rooms as $name_room):
            foreach ($name_room->users as $user_room):

                if ($user_room->id === $users) {

                    $c++ ;
                }

            endforeach;
        endforeach;

        if ($c === 0){

            return $this->redirect(['action' => 'autorize']);
        }

        $this->set(compact('tchat','user','time_2','count_message','id_rooms','name_rooms','users'));
        $this->set('_serialize', ['tchat']);
    }

    public function history($id_room = NULL){

        $date_fin = $this->request->data('datefin');
        $date_debut = $this->request->data('datedebut');


        if (empty($date_fin)&&empty($date_debut)){

            $list_message = $this->Tchats->find('all')->contain('Users')->where(['room_id'=>$id_room]);
        }

        if (!empty($date_debut)&&empty($date_fin)){

            $date_debut = $this->request->data('datedebut');
            $date_fin = "";
            $list_message = $this->Tchats->find('all')->contain('Users')->where(['date >'=>$date_debut])->where(['room_id'=>$id_room]);


        }
        if (!empty($date_fin)&&empty($date_debut)){

            $date_fin = $this->request->data('datefin');
            $date_debut = "";
            $list_message = $this->Tchats->find('all')->contain('Users')->where(['date <'=>$date_fin])->where(['room_id'=>$id_room]);

        }
        if (!empty($date_fin)&&!empty($date_debut)){

            $date_debut = $this->request->data('datedebut');
            $date_fin = $this->request->data('datefin');
            $list_message = $this->Tchats->find('all')->contain('Users')->where(['date BETWEEN'=>$date_debut])->andWhere(['"'.$date_fin.'"'])->andWhere(['room_id'=>$id_room]);

        }
        $empty = "";
        if($list_message->isEmpty()) {
            $empty = "Il y a pas de message avec votre critere de recherche";
        }

        $this->set(compact('list_message','date_fin','date_debut','empty'));
}

public function autorize(){}

    public function report($id = null)
    {
        $roomsUser = $this->Tchats->get($id, [
            'contain' => []
        ]);
        $report = $roomsUser->report + 1;

            $roomsUser = $this->Tchats->patchEntity($roomsUser, $this->request->data);
            $roomsUser->report = $report ;
           if ($this->Tchats->save($roomsUser)){
               return $this->redirect($this->referer());
           }
    }
}
