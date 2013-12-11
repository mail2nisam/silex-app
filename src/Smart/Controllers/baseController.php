<?php
namespace Smart\Controllers;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of baseController
 *
 * @author uvj
 */
class baseController {
    public $_app;
    function __construct(\Silex\Application $app) {
        
        $this->_app =   $app;
    }

    //put your code here
}
