<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace tb\interfaces;

/**
 * Description of Crud
 *
 * @author imac
 */
interface Crud {
    
    public function create();
    public function read($param);
    public function update($param);
    public function delete($param);
    
}
