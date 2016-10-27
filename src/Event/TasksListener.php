<?php
namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Event\EventManager;
use Cake\Log\Log;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class TasksListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Model.Task.addtask' => 'addtask',
            'Model.Task.edittask' => 'edittask'
        ];
    }

    public function addtask($event)
    {
        $task = $event->data['event'];
//        debug($task);
//        die();
        $diariesTable = TableRegistry::get('Diaries');
        $entriesTable = TableRegistry::get('Entries', ['contain' => 'Diaries']);
        $project_id = $task['project_id'];
        //pour chaque utilisateurs
        for ($i = 0; $i < count($task['users']); $i++) {
            $user_id = $task['users'][$i]['id'];
            //recupération de diaries_id
            $query = $diariesTable->find()
                ->select(['id'])
                ->where([
                    'user_id' => $user_id,
                    'project_id' => $project_id,
                ]);
            //enregistrement de la nouvelles notes
            $entrie = $entriesTable->newEntity();
            $entrie->diary_id = $query;
            $entrie->date = Time::now();
            $entrie->content = 'Vous avez été assigné à la nouvelle tache : ' . $task['name'];
            $entriesTable->save($entrie);
        }
    }

    public function edittask($event , $entity)
    {

        $nbr_original_users = count($entity->extractOriginalChanged($entity->visibleProperties())['users']);
        $nbr_actual_users = count($event->data['event']['users']);
        $list_original_users = array();
        $list_actual_users = array();


        for ($i = 0; $i < count($entity->extractOriginalChanged($entity->visibleProperties())['users']); $i++){
            $list_original_users[]= array($entity->extractOriginalChanged($entity->visibleProperties())['users'][$i]['username']);
        }
        debug($list_original_users);
      die();

        foreach ($event->data['event']['users'] as $list_user){
            $list_actual_users[] = array($list_user['username']);
        }
        debug($list_actual_users);
        die();
//        $task = $event->data['event'];
//       debug($task);
//      die();
        $diariesTable = TableRegistry::get('Diaries');
        $entriesTable = TableRegistry::get('Entries', ['contain' => 'Diaries']);
        $project_id = $task['project_id'];
        //pour chaque utilisateurs
        for ($i = 0; $i < count($task['users']); $i++) {
            $user_id = $task['users'][$i]['id'];
            //recupération de diaries_id
            $query = $diariesTable->find()
                ->select(['id'])
                ->where([
                    'user_id' => $user_id,
                    'project_id' => $project_id,
                ]);
            //enregistrement de la nouvelles notes
            $entrie = $entriesTable->newEntity();
            $entrie->diary_id = $query;
            $entrie->date = Time::now();
            $entrie->content = 'Vous avez été assigné à la nouvelle tache : ' . $task['name'];
            $entriesTable->save($entrie);
        }
    }
}