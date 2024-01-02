<?php

namespace App\Http\Controllers\Reports;

use App\Exports\BookReportExport;
use App\Http\Services\BookViewService;

class BookReportController
{
    protected $service;

    public function __construct(BookViewService $service)
    {
        $this->service = $service;
    }

    public function report()
    {
        return (new BookReportExport($this->service->get()))->download('invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX, ['Content-Type' => 'text/xlsx']);
    }
}
