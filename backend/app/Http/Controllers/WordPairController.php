<?php

namespace App\Http\Controllers;

use App\Models\WordPair;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WordPairController extends Controller
{
    public function index()
    {
        $wordPairs = WordPair::all()->map(function ($pair) {
            return [
                'english' => $pair->english,
                'serbian' => $pair->serbian,
                'image' => $pair->image_url,
            ];
        });

        return response()->json($wordPairs);
    }

    public function store(Request $request)
    {
        $file = $request->file("image");
        $ex  =  $file->getClientOriginalExtension();
        $fileName = Str::random() . "." . $ex;
        $file->move("attachments/", $fileName);

        WordPair::create([
            'english' => $request->english,
            'serbian' => $request->serbian,
            'image' => 'attachments/' . $fileName
        ]);

        return response()->json("Inserted succesfully", 201);
    }
}
