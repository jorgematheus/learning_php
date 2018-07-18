<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 04/07/2018
 * Time: 00:16
 */

class Controller {

    public function loadView($viewName, $viewData = array()) {
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }

    public function loadTemplate($viewName, $viewData = array()) {
        require 'views/template.php';
    }

    public function loadViewInTemplate($viewName, $viewData = array()) {
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }
}