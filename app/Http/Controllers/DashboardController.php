<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller{

    public function index(){

        $idea = new Idea([
            'content' =>'Wassup bro?'
        ]);
        // dump(Idea::all()); //This is how you print the content of databse on the page.
        $idea->save();
        return view('dashboard',[
            'ideas' => Idea::orderBy('created_at','DESC')->get()
        ]);
    }
}
