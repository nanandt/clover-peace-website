<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;
use App\TravelPackage;
use App\Picture;
use App\Gallery;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TravelPackage::all();
        // mengambil semua data

        return view('pages.admin.travel-package.index',[
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
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    // fungsi store untuk meyimpan data
    // fungsi store untuk menyimpan data
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        TravelPackage::create($data);
        return redirect()->route('travel-package.index');
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
        $item = TravelPackage::findOrFail($id);

        return view('pages.admin.travel-package.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPackageRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = TravelPackage::findOrFail($id);

        $item->update($data);

        return redirect()->route('travel-package.index');
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
        $item_gallery = Gallery::where('travel_packages_id', $id)->get();
        foreach($item_gallery as $item)
        {
            $gallery = Gallery::findOrFail($item->id);
            $gallery->delete();
        }

        $item_pictures = Picture::where('travel_packages_id', $id)->get();
        foreach($item_pictures as $item)
        {
            $picture = Picture::findOrFail($item->id);
            $picture->delete();
        }

        $item_transactions = Transaction::where('travel_packages_id', $id)->get();
        foreach($item_transactions as $item)
        {
            $picture = Transaction::findOrFail($item->id);
            $picture->delete();
        }

        $item = TravelPackage::findOrFail($id);

        $item->delete();

        return redirect()->route('travel-package.index');

    }
}
