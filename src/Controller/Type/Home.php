<?php

namespace App\Controller\Type;

use App\Controller\AbstractController;

class Home extends AbstractController{

    public function index(){

        return [
            'view' => 'views/home.php',
            'params' => []
        ];

    }

}