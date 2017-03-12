<?php

class Model
{
    protected $dataBase = false;

    public function __construct()
    {
        $this->dataBase = DataBase::connect();
    }
}