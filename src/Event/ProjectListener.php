<?php

namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Event\EventManager;
use Cake\Log\Log;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class ProjectListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Model.Project.add' => 'addproject',
            'Model.Project.edit' => 'editproject',
        ];
    }
    public function addproject($event)
    {

      die();
        $subject =  $event->data['event'];

        $diariesTable = TableRegistry::get('Diaries');
        $entriesTable = TableRegistry::get('Entries',['contain'=>'Diaries']);

        for ($i = 0; $i < count($subject['users']); $i++) {

            $diarie = $diariesTable->newEntity();
            $diarie->user_id = $subject['users'][$i]['id'];
            $diarie->project_id= $subject['users'][$i]['_joinData']['project_id'];
            $diariesTable->save($diarie);

            $entrie = $entriesTable->newEntity();
            $entrie->diary_id = $diarie->id;
            $entrie->date = Time::now();
            $entrie->content = 'le Projet '.$subject['name'].' viens d\'être crée';
            $entriesTable->save($entrie);
        }
    }
    public function editproject($event , $entity)
    {
        $original_project = $entity->extractOriginalChanged($entity->visibleProperties());
        $project = $event->data['event'];
//     ON VERIFIE SI DE NOUVEAUX USER SONT AJOUTE AU PROJET
        $list_original_users = array();
        $list_actual_users = array();
        $list_original_users_id = array();
        $list_users_id = array();
//creation tableau user d'origine
        for ($i = 0; $i < count($original_project['users']); $i++){
            $list_original_users[]= $original_project['users'][$i]['username'];
            $list_original_users_id[] = $original_project['users'][$i]['id'];
        }
//creation tableau user actuel
        for ($i = 0; $i < count($project['users']); $i++){
            $list_actual_users[] = $project['users'][$i]['username'];
            $list_users_id[] = $project['users'][$i]['id'];
        }
//comparaison entre les 2 tableaux
        $result_users =  array_diff($list_actual_users,$list_original_users);
        $result_id =  array_diff($list_users_id,$list_original_users_id);

        $diariesTable = TableRegistry::get('Diaries');
        $entriesTable = TableRegistry::get('Entries', ['contain' => 'Diaries']);

        $project_id = $project['id'];
        //pour chaque utilisateurs assigné au projet
        foreach ($result_id as $new_user) {

            //création du nouveau journal
            $diarie = $diariesTable->newEntity();
            $diarie->user_id = $new_user;
            $diarie->project_id= $project_id;
            $diariesTable->save($diarie);

            //enregistrement de la nouvelles notes
            $entrie = $entriesTable->newEntity();
            $entrie->diary_id = $diarie->id;
            $entrie->date = Time::now();
            $entrie->content = 'Vous avez été rajouté au projet: ' . $project['name'];
            $entriesTable->save($entrie);
        }
    }
}
