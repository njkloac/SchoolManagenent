<?php

namespace App\Http\Controllers;

  

use App\Http\Controllers\AdminController;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;

//use App\Models\Admin;

use Hash;

  

class AdminController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function registerProf()

    {

        return view('adminSpace.registerProf');

    }  


}