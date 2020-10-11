<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PictureRequest;
use App\Picture;
use App\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Picture::with(['travel_package'])->get();
        // travel_package adalah relasi yg sudah dibuat yg ada dimodel picture

        return view('pages.admin.picture.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travel_packages = TravelPackage::all();
        return view('pages.admin.picture.create',[
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PictureRequest $request)
    // fungsi store untuk menyimpan data
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/picture', 'public'
        );

        Picture::create($data);
        return redirect()->route('picture.index');
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
    // findOFail jika datanya ada makan akan dimunculin tp jika tdk ada akan return 404/tidak ketemu
    {
        $item = Picture::findOrFail($id);
        $travel_packages = TravelPackage::all();

        return view('pages.admin.picture.edit',[
            'item' => $item,
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PictureRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/picture', 'public'
        );

        $item = Picture::findOrFail($id);

        $item->update($data);

        return redirect()->route('picture.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    // findOFail jika datanya ada makan akan dimunculin tp jika tdk ada akan return 404/tidak ketemu
    {
        $item = Picture::findOrFail($id);

        $item->delete();

        return redirect()->route('picture.index');

    }
}
