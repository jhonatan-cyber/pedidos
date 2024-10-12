<?php

namespace app\controllers;

use Exception;
use app\config\view;
use app\config\response;
use app\models\homeModel;
use app\config\controller;
use app\config\seguridad;

class home extends controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new homeModel();
    }
    public function index()
    {
        if ($this->method !== 'GET') {
            return $this->response(response::estado405());
        }
        if ($this->method !== 'GET') {
            $this->response(Response::estado405());
        }
        $view = new view();

        try {

            session_regenerate_id(true);
            if (!empty($_SESSION['activo'])) {
                echo $view->render('home', 'index');
            } else {
                echo $view->render('auth', 'index');
            }
        } catch (Exception $e) {
            http_response_code(404);
            $this->response(Response::estado404($e));
        }


    }

}