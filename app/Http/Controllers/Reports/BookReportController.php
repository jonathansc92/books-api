<?php

namespace App\Http\Controllers\Reports;

use App\Exports\BookReportExport;
use App\Http\Filters\BookViewFilter;
use App\Http\Services\BookViewService;
use Illuminate\Http\JsonResponse;

class BookReportController
{
    protected $service;

    public function __construct(BookViewService $service)
    {
        $this->service = $service;
    }

    public function index(BookViewFilter $filter): JsonResponse
    {
        return $this->service->get($filter);
    }

    public function report(BookViewFilter $filter)
    {
        return (new BookReportExport($this->service->report($filter)))->download('relatorio_livros_' . \Carbon\Carbon::createFromTimestamp(time())->timestamp . '.xlsx', \Maatwebsite\Excel\Excel::XLSX, ['Content-Type' => 'text/xlsx']);
    }
}
