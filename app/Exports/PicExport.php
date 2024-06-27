<?php

namespace App\Exports;

use App\Models\AssetPicLink;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PicExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $pics = AssetPicLink::all();
        return view('export.pic', compact('pics'));
    }
}
