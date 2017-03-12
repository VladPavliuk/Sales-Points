<?php

class Model
{
    protected $dataBase = false;

    public function __construct()
    {
        // connection to DataBase
        $this->dataBase = DataBase::connect();

        // session variable initialization
        if(empty($_SESSION["cart"])) {
            $_SESSION["cart"] = [];
        }
    }
}