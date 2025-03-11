<?php

namespace App\Exports;

use App\Models\Violation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ViolationsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $classId;

    public function __construct($classId)
    {
        $this->classId = $classId;
    }

    public function collection()
    {
        return Violation::with('student', 'violationType', 'reporter', 'sanctionType', 'student.classRoom')
            ->whereHas('student', function ($query) {
                $query->where('class_id', $this->classId);
            })
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'Kelas Siswa',
            'Jenis Pelanggaran',
            'Jenis Sanksi',
            'Pelapor',
            'Deskripsi',
        ];
    }

    public function map($row): array
    {
        static $i = 0;

        $i++;
        return [
            $i,
            $row->student->name, 
            $row->student->classRoom->name, 
            $row->violationType->name, 
            $row->sanctionType->name, 
            $row->reporter->name, 
            $row->description, 
        ];
    }

    public function styles($sheet)
    {
        // Set header styles
        $sheet->getStyle('A1:G1')->applyFromArray([
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
        $sheet->getColumnDimension('D')->setWidth(25);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->getColumnDimension('G')->setWidth(30);

        $rowCount = count($sheet->toArray()) + 1; 
        for ($i = 2; $i <= $rowCount; $i++) {
            $sheet->getStyle("A$i:G$i")->applyFromArray([
                'border' => [
                    'top' => ['borderStyle' => Border::BORDER_THIN],
                    'left' => ['borderStyle' => Border::BORDER_THIN],
                    'right' => ['borderStyle' => Border::BORDER_THIN],
                    'bottom' => ['borderStyle' => Border::BORDER_THIN],
                ],
            ]);
            if ($i % 2 == 0) {
                $sheet->getStyle("A$i:G$i")->applyFromArray([
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
