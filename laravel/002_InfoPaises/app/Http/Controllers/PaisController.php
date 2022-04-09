<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaisController extends Controller
{
    function nuevo(){
        return view('nuevo');
    }
    function pais(Request $request) {
        $request->density=$request->habitants/$request->superficie;
        return view('vernuevo', ['request' => $request]);
    }
    function paisinfo($npais) {
        return view('info',['npais' => $npais]);
    }
}
