<?php

namespace App\Http\Controllers;

use Biohazard\Widget;

class Index extends Controller
{
    
    public function index() {
        $widget = new Widget();
        return $widget->init();
    }

}
