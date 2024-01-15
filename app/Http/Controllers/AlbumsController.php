<?php

namespace App\Http\Controllers;

use App\Models\Galeries;
use App\Models\Albums;
use Illuminate\Http\Request;


class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
    
       
        $albums = Albums::with('galeries')->latest()->paginate(5);
        
        return view('pages.albums.index',compact('albums'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'desc' => 'required',
        
        ]);
  
        $input = $request->all();
  
        
    
        Albums::create($input);
     
        return redirect()->route('albums.index')
                        ->with('success','Album created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function show(Albums $album)
    {
        return view('pages.albums.show',compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function edit(Albums $album)
    {
       // dd($album);
        return view('pages.albums.edit',compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'desc' => 'required',
        
        ]);
  
        $input = $request->all();
        $album = Albums::findorfail($id);
        $album->update($input);
        //dd($input);
        return redirect()->route('albums.index')    
                        ->with('success','Album updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function destroy(Albums $album)
    {
        $album->galeries()->delete();
        $album->DELETE();
     
        return redirect()->route('albums.index')
                        ->with('success','Albums deleted successfully');
    }
}
