<?php
class Controllers_Login extends Controllers_Base {
    private Models_User $model;
    public function __construct(Views_Base $views, array $params) {
        parent::__construct($views, $params);
        $this->model = new Models_User();
    }

    public function get() {
        // http://localhost/freezer/Login?user=admin&password=password

        // TODO this is unsafe, change to POST
        $user = $_GET["user"];
        $pw = $_GET["password"];

        $user = $this->model->login($user, $pw);
        if ($user == null){
            http_response_code(403);
            $this->view->render(new Exception("Unauthenticated"));
        }

        Utils_Login::register_session($user);
        header('Location: /freezer/FreezerItem');
        die();
    }
}