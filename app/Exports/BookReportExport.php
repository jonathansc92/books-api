<?php

namespace App\Exports;

use App\Models\BookView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class BookReportExport implements FromCollection
{
    use Exportable;

    public function collection()
    {
        return BookView::all();
    }
}