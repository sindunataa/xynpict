<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeries;
use App\Models\Albums;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $galery = Galeries::with('albums')->get();
        $album = Albums::get();
        
        if ($request->has('filterValue')) {
            $filterValue = $request->input('filterValue');

            // Periksa apakah nilai filter kosong
            if ($filterValue === '*') {
                // Tampilkan semua data jika nilai filter kosong
                $filteredData = $galery;
            } else {
                // Lakukan filter data berdasarkan nilai filter
                $filteredData = $galery->where('album_id', $filterValue);
            }

            return view('frontend.home', compact('galery', 'album', 'filteredData'));
        }

    
        return view('frontend.home',compact('galery', 'album'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
