<?php

abstract class Views_Base {
    protected $resouce_name;
    protected $params;

    public function __construct($resource_name, $params) {
        $this->resouce_name = $resource_name;
        $this->params = $params;
    }

    public abstract function render($data);
}
