<?php

namespace App\Event;

use Cake\Event\EventListenerInterface;


class ProjectsEventListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Model.ProjectsTable.add' => 'addproject',
        ];
    }
    public function addproject($event, $projects )
    {
        debug($event);
        debug($projects);
        die();
    }
}
