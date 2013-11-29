<?php

namespace Smart\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userModel
 *
 * @author uvj
 */
use Silex\Application;

class userModel {

    protected $_app;
    protected $_db;

    function __construct(Application $_app) {
        $this->_app = $_app;
        $this->_db = $this->_app['db'];
    }

    public function fetchStates() {
        return $this->_db->fetchAll('SELECT * FROM states');
    }

}
