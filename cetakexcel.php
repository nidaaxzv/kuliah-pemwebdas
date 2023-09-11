<?php
    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\IOFactory;

    $spreadsheet = new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'DATA LEGALISIR');
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
    $spreadsheet->getActiveSheet()->mergeCells('A1:H1');
    $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');

    $spreadsheet->getActiveSheet()
            ->setCellValue('A3','No.')
            ->setCellValue('B3','Nama')
            ->setCellValue('C3','NIM')
            ->setCellValue('D3','Jenis Kelamin')
            ->setCellValue('E3','Jurusan')
            ->setCellValue('F3','Keperluan')
            ->setCellValue('G3','Tanggal Pengajuan')
            ->setCellValue('H3','Status');

    $spreadsheet->getActiveSheet()->getStyle('A1:H3')->getFont()->setBold(true);

    include 'koneksi.php';
    $sql = "SELECT * FROM mahasiswa JOIN legalisir ON mahasiswa.nim = legalisir.nim";
    $result = mysqli_query($koneksi, $sql);

    $no = 1; $rowID = 4;
    foreach ($result as $d) {
        $spreadsheet->getActiveSheet()
            ->setCellValue('A'.$rowID, $no++)
            ->setCellValue('B'.$rowID, $d['nama'])
            ->setCellValue('C'.$rowID, $d['nim'])
            ->setCellValue('D'.$rowID, $d['jenis_kelamin'])
            ->setCellValue('E'.$rowID, $d['jurusan'])
            ->setCellValue('F'.$rowID, $d['keperluan'])
            ->setCellValue('G'.$rowID, $d['tgl_pengajuan'])
            ->setCellValue('H'.$rowID, $d['status']);
            //mengatur row height
            $spreadsheet->getActiveSheet()->getRowDimension($rowID)->setRowHeight(50);
            $rowID++;
        }

        foreach(range('A','H') as $columnID){
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);

        }

        $border = array(
            'allBorders' => array(
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
            )
            );
        $spreadsheet->getActiveSheet()->getStyle('A3'.':H'.($rowID-1))
                    ->getBorders()->applyFromArray($border);

        $alignment = array(
            'alignment' => array(
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            )
            );
            $spreadsheet->getActiveSheet()->getStyle('A3'.':H'.($rowID-1))->applyFromArray($alignment);

        $filename = 'datalegalisir.xlsx';
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $objWriter = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $objWriter->save('php://output');
        exit;

?>