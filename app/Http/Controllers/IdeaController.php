<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {

        request()->validate([
            'idea' => 'required|min:5|max:255'
        ]);

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

        return redirect()->route('dashboard')->with('Success','Idea created successfully!');
    }

    public function destroy($id){

        Idea::where('id',$id)->firstOrFail()->delete();

        // The above code is the same but more clean and concise
        //by default where methode compares the two ids by equal
        // $idea = Idea::where('id',$id)->firstOrFail(); //It deletes the item and if the item doesn't exist the error 404 appears

        // $idea->delete();

        return redirect()->route('dashboard')->with('Success','Idea deleted successfully!');
    }
}
