<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 19/07/2018
 * Time: 10:36
 */

class courseController extends Controller {

    public function __construct() {
        $u = new Users();
        if(!$u->isLogged()) {
            header('location: '.BASE_URL.'login');
        }
    }


}