<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BookReportExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        return [
            'Autor',
            'Livros',
            'Assuntos',
        ];
    }

    public function collection()
    {
        return $this->data;
    }

    public function map($row): array
    {
        return [
            $row->author_name,
            $row->books_by_author,
            $row->subjects_by_author,
        ];
    }
}
