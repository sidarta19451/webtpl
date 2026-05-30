<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // public function profil (){
    //     return "ini halaman profil dari pagecontroller"; 
    // }

    // public function show ($id){
    //     return "Ini halaman dengan ID: ". $id;
    // }

    public function index(){
        return "Ini halaman profil";
    }
}
