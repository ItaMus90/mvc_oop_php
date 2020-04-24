<?php

namespace App\Controller\Type;

use App\Controller\AbstractController;
use App\Helper\HTTP\Request\Request;

class Invoice extends AbstractController{

    public function index(Request $request){

        return [
            "view" => "views/invoice.php",
            "params" => []
        ];

    }


}
