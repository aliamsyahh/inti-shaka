<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UserExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $users = User::all();
        return view('export.user', compact('users'));
    }
}
