<?php
namespace App\Controller\Component;
use Cake\Controller\Component;

class UploadComponent extends Component
{
    public function getPicture($upload,$directory,$id)
    {
        $extensions = ['jpg','jpeg','png'];
        $file_extension = explode('.',$upload['name'])[1];
        if(!in_array($file_extension,$extensions))
        {
            return $file_newName = 'default.png';
        }
        // define new file name
        $file_newName = strtolower($directory).'-'.$id.'.'.$file_extension;
        // upload
        if(move_uploaded_file($upload['tmp_name'], WWW_ROOT . '/uploads/'.strtolower($directory).'/' . $file_newName))
        {
            return $file_newName;
        }
    }
}