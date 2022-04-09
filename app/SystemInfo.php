<?php

namespace App;

class SystemInfo{
    public function getUser(){
        exec('wmic COMPUTERSYSTEM Get UserName', $user);
        $user = explode('\\', $user[1]);
        return $user[1];
    }
}