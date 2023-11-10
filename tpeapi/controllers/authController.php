<?php
require_once 'models/modelUsuarios.php';
require_once 'helpers/authHelper.php';
require_once 'views/view.php';

class authController extends apiController {
    private $authHelper;

    function __construct() {
        parent::__construct();
        $this->authHelper = new AuthHelper();
        $this->model = new UserModel();
    }

    function getToken($params = []) {
        $basic = $this->authHelper->getAuthHeaders(); // Darnos el header 'Authorization:' 'Basic: base64(usr:pass)'

        if(empty($basic)) {
            $this->view->response('No envió encabezados de autenticación.', 401);
            return;
        }

        $basic = explode(" ", $basic); // ["Basic", "base64(usr:pass)"]

        if($basic[0]!="Basic") {
            $this->view->response('Los encabezados de autenticación son incorrectos.', 401);
            return;
        }

        $userpass = base64_decode($basic[1]); // usr:pass
        $userpass = explode(":", $userpass); // ["usr", "pass"]

        $user = $userpass[0];
        $pass = $userpass[1];

        $userBBDD = $this->model->getUsuarioByUser($user);

        if($userBBDD && $userBBDD->usuario == $user && password_verify($pass, $userBBDD->password)) {
           
            $token = $this->authHelper->createToken($userBBDD);
            $this->view->response($token, 200);
        } else {
            $this->view->response('El usuario o contraseña son incorrectos.', 401);
        }
    }
}