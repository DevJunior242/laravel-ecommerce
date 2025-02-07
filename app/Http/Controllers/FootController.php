<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class FootController extends Controller
{
    //

    public function foot()
    {
        return view('foot.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'home' => 'required',
            'away' => 'required',
            'score' => 'required',
            'scorex' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg',
            'imagex' => 'nullable|mimes:png,jpg,jpeg,svg',
        ]);

        $score =  new Score();
        $score->home = $request->home;
        $score->away = $request->away;
        $score->score = $request->score;
        $score->scorex = $request->score;

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagepath = $image->store('images', 'public');
            $score->image_path = $imagepath;
    }

    if ($request->hasFile('imagex')) {
        $imagex = $request->file('imagex');
        $imagepathx = $imagex->store('imagex', 'public');
        $score->image_pathx = $imagepathx;
}
  
    
    
    $score->home = $request->home;
    $score->away = $request->away;
    $score->score = $request->score;
    $score->scorex = $request->scorex;
     
    $score->save();
    return back();
    
    } 

    public function footShow()
    {
        $scores = Score::all();
        
        return view('foot.show', compact('scores'));
    }
}
