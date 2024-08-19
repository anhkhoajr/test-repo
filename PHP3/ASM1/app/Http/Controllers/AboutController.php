<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function about() {
        // dữ liệu load từ mobile

        // show lên view
        return view('about');
    }
}
