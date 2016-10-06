<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Menu cell
 */
class MenuCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($id)
    {
        $this->loadModel('Permission');

        $permission = $this->Permissions->get($id, [
            'contain' => ['Roles', 'Connectors']
        ]);
        debug($permission);

        $this->set('permission', $permission);
        $this->set('_serialize', ['permission']);
    }
}
