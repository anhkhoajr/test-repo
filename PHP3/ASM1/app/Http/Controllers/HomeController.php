<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $model;
    public function __construct(products $model)
    {
        $this->model = $model;
    }
    function index() {
        $productall = $this->model->get_all(8);
        $TopViewed = $this->model->getTopViewed(8);
        $categories = $this->model->ct_all();
        return view('home', compact('productall','TopViewed','categories'));
    }
}
