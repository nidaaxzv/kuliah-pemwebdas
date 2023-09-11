<?php
    require_once 'vendor/autoload.php';
    use PhpOffice\PhpWord\IOFactory;
    use PhpOffice\PhpWord\PhpWord;

    $phpWord = new PhpWord();
    $section = $phpWord->addSection();
    $title = array('size'=>16, 'bold'=>true);
    $section->addText("Data Legalisir Mahasiswa", $title);
    $section->addTextBreak(1);

    $styleTable = array('borderSize'=>6,'borderColor'=>'006699','cellMargin'=>80);
    $styleCell = array('valign'=>'center');
    $fontHeader = array('bold'=>true);
    $noSpace = array('spaceAfter'=>0);
    $imgStyle = array('width'=>50,'height'=>50);

    $phpWord->addTableStyle('myTable', $styleTable);

    $table = $section->addTable('myTable');
    $table->addRow();
    $table->addCell(500, $styleCell)->addText('No.', $fontHeader, $noSpace);
    $table->addCell(2000, $styleCell)->addText('Nama', $fontHeader, $noSpace);
    $table->addCell(2000, $styleCell)->addText('NIM', $fontHeader, $noSpace);
    $table->addCell(2000, $styleCell)->addText('Jenis Kelamin', $fontHeader, $noSpace);
    $table->addCell(2000, $styleCell)->addText('Jurusan', $fontHeader, $noSpace);
    $table->addCell(2000, $styleCell)->addText('Keperluan', $fontHeader, $noSpace);
    $table->addCell(2000, $styleCell)->addText('Tanggal Pengajuan', $fontHeader, $noSpace);
    $table->addCell(2000, $styleCell)->addText('Status', $fontHeader, $noSpace);

    include 'koneksi.php';
    $sql = "SELECT * FROM mahasiswa JOIN legalisir ON mahasiswa.nim = legalisir.nim";
    $result = mysqli_query($koneksi, $sql);

    $no = 1;
    foreach($result as $d){
        $table->addRow();
        $table->addCell(500, $styleCell)->addText($no++, array(), $noSpace);
        $table->addCell(2000, $styleCell)->addText($d['nama'], array(), $noSpace);
        $table->addCell(2000, $styleCell)->addText($d['nim'], array(), $noSpace);
        $table->addCell(2000, $styleCell)->addText($d['jenis_kelamin'], array(), $noSpace);
        $table->addCell(2000, $styleCell)->addText($d['jurusan'], array(), $noSpace);
        $table->addCell(2000, $styleCell)->addText($d['keperluan'], array(), $noSpace);
        $table->addCell(2000, $styleCell)->addText($d['tgl_pengajuan'], array(), $noSpace);
        $table->addCell(2000, $styleCell)->addText($d['status'], array(), $noSpace);
    }

    $filename = "datalegalisirmhs.docx";
    header('Content-Type: application/msword');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');

    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('php://output');
    exit;
?>


