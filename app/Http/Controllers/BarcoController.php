<?php

namespace App\Http\Controllers;

use App\Models\Barco;
use Illuminate\Http\Request;

class BarcoController extends MasterApiController
{
    protected $model;
    public function __construct(Barco $barco, Request $request)
    {
        $this->model = $barco;
        $this->request = $request;
    }
}
