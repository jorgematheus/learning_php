<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 02/07/2018
 * Time: 23:33
 */
class Core {

    public function run() {
       $url = '/';
       $params = array();
       if(isset($_GET['url'])) {
           $url.=$_GET['url'];
       }
       if(!empty($url) && $url != '/') {
            $url = explode('/', $url);
            array_shift($url);
            $currentController = $url[0].'Controller';
            array_shift($url);

            if(isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }
            if (count($url) > 0) {
                $params = $url;
            }
       } else {
           $currentController = 'homeController';
           $currentAction = 'index';
       }

      /* if($currentController == 'contentController' && $currentAction == 'ckeditor') {
            $currentController = 'tes';
            $currentAction = 'te';
            header('location: '.BASE_URL.'vendor/ckeditor/plugins/imageuploader/imgbrowser.php?CKEditor=content&CKEditorFuncNum=1&langCode=pt-br');
       }
*/
       if(!file_exists('controllers/'.$currentController.'.php') || 
            !method_exists($currentController, $currentAction)) {
            $currentController = 'notFoundController';
            $currentAction = 'index';
       }

       $c = new $currentController();

       call_user_func_array(array($c, $currentAction), $params);
    }
}