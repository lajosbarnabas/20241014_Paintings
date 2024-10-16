<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaintingController extends Controller
{
    public $paintings;

    public function __construct() {
        $this->paintings = Storage::json('Painting.json');
        // dd($this->paintings);
    }

    public function index()
    {
        return view('index',[
            'paintings' => $this->paintings]);
    }

    public function show($title)
    {
        foreach($this->paintings as $paint){
            if($paint['Painting'] == $title){
                return view('details', ['paint' => $paint]);
            }
        }

        return abort(404);
    }

    public function searchBytitle(Request $request)
    {
        $filteredPaintings = [];
        foreach($this->paintings as $paint){
            if(str_contains($paint['Painting'], $request->title)){
                $filteredPaintings[] = $paint;
            }
        }

        $request->flash();
        return view('index', ['paintings' => $filteredPaintings]);
    }
}
