<?php

class Views_Json extends Views_Base {
    public function render($data){
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data);
        exit;
    }
}