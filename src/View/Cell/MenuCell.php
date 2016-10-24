<?php
namespace App\View\Cell;

use App\Model\Entity\Connector;
use Cake\View\Cell;
use App\Controller\Component\CommonComponent;

/**
 * Menu cell
 */
class MenuCell extends Cell
{
    public $components= ['Common'];
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
    function loadControllerAndActions()
    {
        $path = './src/Controller';
        $dirs = scandir($path);
        $files = [];
        $ignore = [
            '.',
            '..',
            'empty',
            'Component'
        ];
        foreach ($dirs as $dir)
        {
            if ($dir === '.' or $dir === '..') continue;
            if(is_dir($path . '/' . $dir))
            {
                $temp_file = scandir($path . '/' . $dir);
                foreach ($temp_file as $temp)
                {
                    if (!in_array($temp, $ignore) && !in_array($dir,$ignore))
                    {
                        if(!array_key_exists($dir,$files))
                        {
                            $files[$dir][] = '--';
                        }
                        $temp = explode('.',$temp)[0];
                        $files[$dir][] = $temp;
                    }
                }
            }
        }
        return $files;
    }

    public function getControllers()
    {
        $files = $this->loadControllerAndActions();
        return array_keys($files);
    }
    public function display($id)
    {

        $i= $id;
        $this->loadModel('Permissions');
        $this->loadModel('Roles');
        $this->loadModel('Connectors');
        $this->loadModel('Users');
        $user = $this->Users->find('all')
            ->where(['id'=> $id]);
        //on récupère l'id de la colonne role_id
        $role= $this->Users->find('all')
            ->select('role_id')
            ->where(['id'=> $id]);
        //on affiche les permissions selon le rôle et si on a demandé qu'il soit afficher dans le menu
        $module = $this->getControllers();

        $query = $this->Permissions->find('all')->contain([
            'Connectors' => function ($q) {
                return $q->select(['module', 'controller','function','permission_id']);
            },
             'Roles'
        ])
             ->where(['menu'=> 1])
            ->matching('Roles')->where(['Roles.id =' => $role]);

        $this->set('_serialize', ['permission']);
        $this->set(compact('i','role', 'user','query'));
    }


}
