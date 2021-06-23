<?php

namespace App\Http\Controllers;

use App\Models\Casa;
use Illuminate\Http\Request;

class CasaController extends MasterApiController
{
    protected $model;
    public function __construct(Casa $casa, Request $request)
    {
        $this->model = $casa;
        $this->request = $request;
    }
}
