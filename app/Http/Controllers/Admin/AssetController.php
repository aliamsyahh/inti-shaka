<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AssetExport;
use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetPicLink;
use App\Models\Workplace;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = Asset::all();
        return view('asset.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workplace = Workplace::all();
        return view('asset.create', compact('workplace'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kodeQuery = Asset::orderBy('id', 'desc')->first();
        $kode = 'A0001';
        if ($kodeQuery) {
            $is_active = $request->has('is_active') ? true : false;
            $request['is_active'] = $is_active;
            $request['code'] = 'A' . sprintf('%04d', $kodeQuery->id + 1);
        }
        $asset = Asset::create($request->all());
        Alert::Success('Berhasil', 'asset Berhasil Ditambah');
        return redirect(route('asset.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Asset::findOrFail($id);
        return view('asset.view', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workplace = Workplace::all();
        $item = Asset::findOrFail($id);
        return view('asset.edit', compact('item', 'workplace'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $item)
    {
        $is_active = $request->has('is_active') ? true : false;
        $request['is_active'] = $is_active;
        $item->update($request->except('_token'));
        Alert::Success('Berhasil', 'asset Berhasil Diupdate');
        return redirect(route('asset.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(asset $item)
    {
        $item->delete();
        Alert::Error('Berhasil', 'asset Berhasil Dihapus');
        return redirect(route('asset.index'));
    }
}
