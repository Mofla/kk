<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
require_once(ROOT . DS . 'src'. DS . 'Controller'. DS . 'Component' . DS . 'ImageTool.php');
use ImageTool;


class UploadComponent extends Component
{

    public function getPicture($upload,$directory,$id,$width,$height)
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
        $path = WWW_ROOT . '/uploads/'.strtolower($directory).'/' . $file_newName;
        if(move_uploaded_file($upload['tmp_name'], $path))
        {
            ImageTool::resize([
                'input' => $path,
                'output' => $path,
                'width' => $width,
                'height' => $height,
                'mode' => 'fit'
            ]);
            return $file_newName;
        }
    }

    public function deleteImage($directory,$image)
    {
        $path = WWW_ROOT . '/uploads/'.strtolower($directory).'/' . $image;
        @unlink($path);
    }
}