<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalisiController extends Controller
{
    function analisisg(){
        return view('analisis');
    }

    function analisisp(Request $request){
        $p = [];
        for ($i=0; $i <= 10; $i++) { 
            $p[$i] = $i * $request->num;
        }
        $request->table = $p;
        if ($request->num%2==0){
            $request->divi2 = "Sí";
        }else{
            $request->divi2 = "No";
        }
        if ($request->num%3==0){
            $request->divi3 = "Sí";
        }else{
            $request->divi3 = "No";
        }
        if ($request->num%5==0){
            $request->divi5 = "Sí";
        }else{
            $request->divi5 = "No";
        }
        if ($request->num<0){
            $request->divi6 = "No tiene raiz quadrada";
        }else{
            $request->divi6 = round(sqrt($request->num), 2);
        }
        return view('detalle', ['nums' => $request]);
    }
}
