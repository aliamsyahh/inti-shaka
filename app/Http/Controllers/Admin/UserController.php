<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workplace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workplace = Workplace::all();
        return view('user.create', compact('workplace'));
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
        User::create([
            'workplaces_id' => $request->workplaces_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'is_active' => $request->is_active,
        ]);
        Alert::Success('Berhasil', 'User Berhasil Ditambah');
        return redirect(route('user.index'));
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
        $workplace = Workplace::all();
        $item = User::findOrFail($id);
        return view('user.edit', compact('item', 'workplace'));
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
        $item = User::findOrFail($id);
        if ($request->password != null) {
            $request['password'] = Hash::make($request->password);
        } else {
            $request['password'] = $item->password;
        }
        $item->update($request->except('_token'));
        Alert::Success('Berhasil', 'User Berhasil Diupdate');
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        Alert::Error('Berhasil', 'User Berhasil Dihapus');
        return redirect(route('user.index'));
    }
}
