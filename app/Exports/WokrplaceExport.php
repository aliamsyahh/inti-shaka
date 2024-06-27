<?php

namespace App\Exports;

use App\Models\Workplace;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class WokrplaceExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $workplaces = Workplace::with('company')->get();
        return view('export.workplace', compact('workplaces'));
    }
}
