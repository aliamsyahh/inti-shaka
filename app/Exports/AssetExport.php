<?php

namespace App\Exports;

use App\Models\Asset;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AssetExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $assets = Asset::all();
        return view('export.asset', compact('assets'));
    }
}
