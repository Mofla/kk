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
//        debug($event);
//        die();
        $task = $event->data['event'];
//     ON VERIFIE SI DE NOUVEAUX USER SONT AJOUTE A LA TACHE

        $nbr_original_users = count($entity->extractOriginalChanged($entity->visibleProperties())['users']);
        $nbr_actual_users = count($event->data['event']['users']);
        $list_original_users = array();
        $list_actual_users = array();

//creation tableau user d'origine
        for ($i = 0; $i < count($entity->extractOriginalChanged($entity->visibleProperties())['users']); $i++){
            $list_original_users[]= $entity->extractOriginalChanged($entity->visibleProperties())['users'][$i]['username'];
        }
//creation tableau user actuel
        for ($i = 0; $i < count($task['users']); $i++){
            $list_actual_users[] = $task['users'][$i]['username'];
        }
//comparaison entre les 2 tableaux
        $result =  array_diff($list_actual_users,$list_original_users);
//        creation des variables
        $new_task_content  = null;
        $list_result = null;

//        ECRITURE DE LA NOTE
        //si SEULEMENT l'état de la tache à été edité
        if (isset($task['state_id'])){
            $new_task_content .='La tache: '.$entity->extractOriginalChanged($entity->visibleProperties())['name'];
            $new_task_content .= '\nSon statut passe de: '.$entity->extractOriginalChanged($entity->visibleProperties())['state_id'] . $task->state->name.' à  '.$task['state_id'];
        }
        else{
            //si le nom de tache à été edité
        if (isset($task['name'])){
            $new_task_content .= 'La tache '.$entity->extractOriginalChanged($entity->visibleProperties())['name'].' deviens: '.$task['name'];
        }
        else{
            $new_task_content .='La tache: '.$entity->extractOriginalChanged($entity->visibleProperties())['name'];
        }
//si un nouvelle user est assigné à une tache
        if (!empty($result)){
            foreach($result as $valeur) {
                $list_result.=$valeur.' ';
            }
            $new_task_content .= 'Nouveau(x) utilisateur(s) assigné: '.$list_result;
        }
//si la description de la tache à été edité
        if (isset($task['description'])){
            $new_task_content .= '\nLa description '.$entity->extractOriginalChanged($entity->visibleProperties())['description']  . ' deviens: '.$task['description'];
        }
        }

        $diariesTable = TableRegistry::get('Diaries');
        $entriesTable = TableRegistry::get('Entries', ['contain' => 'Diaries']);
        $project_id = $task['project_id'];
        //pour chaque utilisateurs assigné à la tache
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
            $entrie->content = $new_task_content;
            $entriesTable->save($entrie);
        }
    }
}