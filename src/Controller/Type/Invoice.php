<?php

namespace Controller\Type;

use Controller\AbstractController;

class Invoice extends AbstractController{

    public function index(){

        return [
            "view" => "views/invoice.php",
            "params" => []
        ];

    }


}
