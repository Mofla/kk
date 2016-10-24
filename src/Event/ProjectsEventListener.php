<?php

namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Event\EventManager;

class ProjectsEventListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Model.ProjectsTable.add' => 'addproject',
        ];
    }
    public function addproject($event)
    {
        var_dump($event);
        die();
    }
}
