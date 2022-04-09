<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    function calc(){
       return view('calc', ["res" => ""]);
    }
    function suma(Request $request){
        $request->res = $request->num1+$request->num2;
        return view('calc', ["res" => $request]);
    }
    function resta(Request $request){
        $request->res = $request->num1-$request->num2;
        return view('calc', ["res" => $request]);
    }
    function multi(Request $request){
        $request->res = $request->num1*$request->num2;
        return view('calc', ["res" => $request]);
    }
    function divi(Request $request){
        if($request->num2==0){
            $request->res = "No es pot dividir per 0";
        }else{
            $request->res = $request->num1/$request->num2;
        }
        return view('calc', ["res" => $request]);
    }
}
