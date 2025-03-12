<?php

namespace App\Exports;

use App\Models\ExamResult;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ExamResultsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $examId;

    public function __construct($examId)
    {
        $this->examId = $examId;
    }
    public function collection()
    {
        return ExamResult::with(['siswa.classRoom'])
            ->where('exam_id', $this->examId)
            ->get();
    }
    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'Nama Kelas',
            'Skor',
            'Tanggal Dibuat',
        ];
    }
    public function map($row): array
    {
        static $i = 0;

        $i++;
        return [
            $i,
            $row->siswa->name,
            $row->siswa->classRoom->name ?? 'Tidak Ada Kelas',
            $row->score,
            $row->created_at->format('Y-m-d H:i:s'),
        ];
    }
    public function styles($sheet)
    {
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFFFF'],
                'size' => 12,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => '4F81BD'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(25);
        for ($i = 2; $i <= $rowCount; $i++) {
            $sheet->getStyle("A$i:E$i")->applyFromArray([
                'border' => [
                    'top' => ['borderStyle' => Border::BORDER_THIN],
                    'left' => ['borderStyle' => Border::BORDER_THIN],
                    'right' => ['borderStyle' => Border::BORDER_THIN],
                    'bottom' => ['borderStyle' => Border::BORDER_THIN],
                ],
            ]);
            if ($i % 2 == 0) {
                $sheet->getStyle("A$i:E$i")->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'E6F0F5'],
                    ],
                ]);
            }
        }
        return $sheet;
    }
}

