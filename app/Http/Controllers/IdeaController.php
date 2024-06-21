<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        $idea = Idea::create(
            [
                'content' => request()->get('idea', ''),
            ]
        );
        //The above code is the same as below but more concise
        // $idea = new Idea([
        //     'content' => request()->get('idea', ''),
        // ]);
        // $idea->save();

        return redirect()->route('dashboard');
    }
}
