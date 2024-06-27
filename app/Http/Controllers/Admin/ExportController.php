<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AssetExport;
use App\Exports\CompanyExport;
use App\Exports\WokrplaceExport;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function asset()
    {
        return Excel::download(new AssetExport, 'Asset-' . Carbon::now() . '.xlsx');
    }
    public function company()
    {
        return Excel::download(new CompanyExport, 'Company-' . Carbon::now() . '.xlsx');
    }
    public function workplace()
    {
        return Excel::download(new WokrplaceExport, 'Workplace-' . Carbon::now() . '.xlsx');
    }
}
