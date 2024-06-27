<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetPicLink;
use App\Models\Workplace;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AssetPicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assetspic = Workplace::all();
        return view('assetpic.index', compact('assetspic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asset = Asset::all();
        return view('assetpic.create', compact('asset'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $is_active = $request->has('is_active') ? true : false;
        $request['is_active'] = $is_active;
        AssetPicLink::create($request->all());
        Alert::Success('Berhasil', 'asset Berhasil Ditambah');
        return redirect(route('pic.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = AssetPicLink::findOrFail($id);
        return view('assetpic.view', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asset = Asset::all();
        $item = AssetPicLink::findOrFail($id);
        return view('assetpic.edit', compact('item', 'asset'));
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
        $is_active = $request->has('is_active') ? true : false;
        $request['is_active'] = $is_active;
        $item = AssetPicLink::findOrFail($id);
        $item->update($request->except('_token'));
        Alert::Success('Berhasil', 'asset Berhasil Diupdate');
        return redirect(route('pic.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = AssetPicLink::findOrFail($id);
        $item->delete();
        Alert::Error('Berhasil', 'asset Berhasil Dihapus');
        return redirect(route('pic.index'));
    }
}
