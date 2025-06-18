<?php

class Controllers_FreezerItem extends Controllers_Base {
    private $model;

    public function __construct(Views_Base $view, array $params) {
        parent::__construct($view, $params);
        $this->model = new Models_FreezerItem();
    }

    public function get(){
        if($this->params){
            $data = $this->model->findById($this->params[0]);
        } else {
            $data = $this->model->findAll();
        }
        $this->view->render($data);
    }

    public function post(){
        Utils_Login::check_session_or_error();
        $obj = new Domains_FreezerItem($_POST);
        $data = $this->model->insert($obj);
        http_response_code(301);
        header('Location: /freezer/FreezerItem/' . $data->id);
        die();
    }

    public function delete(){
        Utils_Login::check_session_or_error();
        if(!$this->params[0]){
            throw new Exceptions_NotFound("Id not Found");
        }

        $this->model->delete($this->params[0]);
        http_response_code(204);
    }

    public function put(){
        Utils_Login::check_session_or_error();
        if(isset($this->params[0]) && !isset($GLOBALS["_PUT"]["id"])){
            $GLOBALS["_PUT"]["id"] = $this->params[0];
        }

        if (!isset($GLOBALS["_PUT"]["id"])){
            throw new Exceptions_NotFound("Id not Found");
        }

        $obj = new Domains_FreezerItem($GLOBALS["_PUT"]);
        $data = $this->model->update($obj);
        http_response_code(201);
        $this->view->render($data);
    }
}