<?php

namespace App\Http\Controllers;

class EnvController extends Controller
{
    public function getAppName()
    {
        return config("app.name");
    }
}
