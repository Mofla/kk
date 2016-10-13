<?php
namespace App\Controller\Component;
use Cake\Controller\Component;

class CustomComponent extends Component
{
    public function getPicture($upload,$directory,$id)
    {
        $extensions = ['jpg','jpeg','png'];
        $file_extension = explode('.',$upload['name'])[1];
        if(in_array($file_extension,$extensions))
        {
            return false;
        }
        // define new file name
        $file_newName = '';
        switch (ucfirst(strtolower($directory)))
        {
            case 'Portfolio':
                $dir_name = 'pf-'.$id;
                break;
        }
        // upload
        if(move_uploaded_file($upload['tmp_name'], WWW_ROOT . '/uploads/'.$directory.'/' . $file_newName . '.' . $file_extension))
        {
            return $file_newName;
        }
    }
}