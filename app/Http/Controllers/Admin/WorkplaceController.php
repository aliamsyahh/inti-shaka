<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Workplace;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WorkplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workplaces = Workplace::with('asset')->get();
        return view('workplace.index', compact('workplaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('workplace.create');
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
        Workplace::create($request->all());
        Alert::Success('Berhasil', 'workplace Berhasil Ditambah');
        return redirect(route('workplace.index'));
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
        $item = Workplace::findOrFail($id);
        return view('workplace.edit', compact('item'));
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
        $item = Workplace::findOrFail($id);
        $is_active = $request->has('is_active') ? true : false;
        $request['is_active'] = $is_active;
        $item->update($request->except('_token'));
        Alert::Success('Berhasil', 'workplace Berhasil Diupdate');
        return redirect(route('workplace.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Workplace::findOrFail($id);
        $item->delete();
        Alert::Error('Berhasil', 'workplace Berhasil Dihapus');
        return redirect(route('workplace.index'));
    }
}
