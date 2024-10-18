<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaintingController extends Controller
{
    public $paintings;
    public $artists = [];

    public function __construct() {
        $this->paintings = Storage::json('Painting.json');
        // dd($this->paintings);
        foreach($this ->paintings as $paint ){
            if(!in_array($paint['Artist'], $this->artists)){
                $this->artists[] = $paint['Artist'];
            }
        }
        sort($this->artists);
    }

    public function index()
    {
        return view('index',[
            'paintings' => $this->paintings, 'artists' => $this->artists]);
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
            if(str_contains(strtolower($paint['Painting']), strtolower($request->title))){
                $filteredPaintings[] = $paint;
            }
        }

        $request->flash();
        return view('index', ['paintings' => $filteredPaintings, 'artists' => $this->artists]);
    }

    public function searchByArtist(Request $request)
    {
        $filteredPaintings = $this->getPaintingsByArtist($request->artist);

        $request->flash();
        return view('index', ['paintings' => $filteredPaintings, 'artists' => $this->artists]);
    }

    public function showArtistPaints($artist){
        $filteredPaintings = $this->getPaintingsByArtist($artist);
        return view('index', ['paintings' => $filteredPaintings, 'artists' => $this->artists]);
    }

    private function getPaintingsByArtist($artist){
        $filteredPaintings = [];
        foreach($this->paintings as $paint){
            if(($paint['Artist']) == ($artist)){
                $filteredPaintings[] = $paint;
            }
        }
        return $filteredPaintings;
    }

    public function showArtists(){
        return view ('artists', ['artists' => $this->artists]);
    }
}
