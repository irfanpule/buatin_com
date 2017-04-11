<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function view()
    {

        return view('contents.add-portfolio');
    }

    public function store(Request $request)
    {
        return dd($request->all(), $request->file());
    }


}
