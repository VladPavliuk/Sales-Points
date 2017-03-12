<?php

class Controller
{
    use CartInteract, CategoryInteract, ProductInteract;

    protected $smarty = false;

    public function __construct()
    {
        // Smarty initialization
        $this->smarty = SmartyRun::connect();
    }
}