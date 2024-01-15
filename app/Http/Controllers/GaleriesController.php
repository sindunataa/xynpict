<?php

namespace App\Http\Controllers;

use App\Events\ServerCreated;
use App\Models\Albums;
use App\Models\Galeries;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class GaleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $galery = Albums::all();
        $galeries = Galeries::latest()->simplePaginate(10);

        return view('pages.galeries.index', compact('galeries', 'galery'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galery = Albums::all();
        
        return view('pages.galeries.create', compact('galery'));
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
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'albums_id' => 'required',
        ]);

        $input = $request->all();


        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Galeries::create($input);

        return redirect()->route('galery.index')
            ->with('success', 'Gallery created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeries  $galeries
     * @return \Illuminate\Http\Response
     */
    public function show(Galeries $galery)
    {
        $galeries = Albums::all();
        // $albums = Albums::get();
        $albums = Galeries::all();

        return view('pages.galeries.show', compact('albums', 'galeries', 'galery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeries  $galeries
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeries $galery)
    {
        $galeries = Albums::all();
        $albums = Galeries::all();

        return view('pages.galeries.edit', compact('albums', 'galeries', 'galery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeries  $galeries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'content' => 'required',
            'albums_id' => 'required',
        ]);

        $input = $request->all();
        $galery = Galeries::findorfail($id);
        // dd($galery);
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $galery->update($input);
        //dd($galery->toArray());
        return redirect()->route('galery.index')
            ->with('success', 'Gallery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeries  $galeries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeries $galery)
    {
        $galery->DELETE();

        return redirect()->route('galery.index')
            ->with('success', 'Gallery deleted successfully');
    }
}
