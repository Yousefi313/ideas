<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class IdeaController extends Controller {


    public function show(Idea $idea){
        return view('ideas.show',compact('idea'));
    }

    public function edit(Idea $idea){

        $editing = true;

        return view('ideas.show',compact('idea','editing'));
    }

    public function store()
    {

        request()->validate([
            'content' => 'required|min:5|max:255'
        ]);

        $idea = Idea::create(
            [
                'content' => request()->get('content', ''),
            ]
        );
        //The above code is the same as below but more concise
        // $idea = new Idea([
        //     'content' => request()->get('idea', ''),
        // ]);
        // $idea->save();

        return redirect()->route('dashboard')->with('Success','Idea created successfully!');
    }

    public function destroy(Idea $idea){

        $idea->delete(); //Using Route Model Binding makes your code more readable and concise
        // Idea::where('id',$id)->firstOrFail()->delete();

        // The above code is the same but more clean and concise
        //by default where methode compares the two ids by equal
        // $idea = Idea::where('id',$id)->firstOrFail(); //It deletes the item and if the item doesn't exist the error 404 appears

        // $idea->delete();

        return redirect()->route('dashboard')->with('Success','Idea deleted successfully!');
    }

    public function update(Idea $idea){

        request()->validate([
            'content' => 'required|min:5|max:255'
        ]);

        $idea->content = request()->get('content','');
        $idea->save();

        return redirect()->route('ideas.show',$idea->id)->with('success','Idea updated successfully!');
    }
}
