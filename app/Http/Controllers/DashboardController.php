<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller{

    public function index(){

        $users = [                              //Array with square Brackets
            [
                'name' => 'Finola',
                'age' => 60,
            ],
            [
                'name' => 'Jane',
                'age' => 34,
            ]
        ];

        // $users = array(['name'=>'finola', 'age'=>60],['name'=>'jane', 'age'=>34]);
        //The above array is an array defined with 'array()' function.

        return view(            //here I pass the array as the second argument.
            'dashboard',
            [
                'users' => $users
            ]);
    }
}
