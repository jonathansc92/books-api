<?php

namespace App\Http\Controllers\Reports;

use App\Http\Filters\BookFilter;
use App\Http\Services\BookViewService;
use Illuminate\Http\JsonResponse;
use App\Exports\BookReportExport;
use Excel;

class BookReportController
{
    protected $service;

    public function __construct(BookViewService $service)
    {
        $this->service = $service;
    }

    public function report(BookFilter $filter)
    {
        return (new BookReportExport)->download('invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX, ['Content-Type' => 'text/xlsx']);
    }
}
