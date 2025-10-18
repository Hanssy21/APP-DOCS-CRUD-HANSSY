<?php
require __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use TCPDF;

// --- CONFIGURACIÓN DE DIRECTORIO ---
$directorio = __DIR__ . '/docs/';
if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);
}

// --- CAPTURAR DATOS DEL FORMULARIO ---
$titulo = $_POST['titulo'] ?? 'Documento';
$contenido = $_POST['contenido'] ?? '';
$tipo = $_POST['tipo'] ?? 'pdf';

// --- GENERAR SEGÚN TIPO ---
switch ($tipo) {
    case 'pdf':
        $archivo = $directorio . $titulo . '.pdf';

        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Write(0, $contenido);
        $pdf->Output($archivo, 'F');
        break;

    case 'word':
        $archivo = $directorio . $titulo . '.docx';

        $phpWord = new PhpWord();
        $seccion = $phpWord->addSection();
        $seccion->addText($contenido);
        $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($archivo);
        break;

    case 'excel':
        $archivo = $directorio . $titulo . '.xlsx';

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Título');
        $sheet->setCellValue('B1', 'Contenido');
        $sheet->setCellValue('A2', $titulo);
        $sheet->setCellValue('B2', $contenido);
        $writer = new Xlsx($spreadsheet);
        $writer->save($archivo);
        break;

    default:
        die("Tipo de documento no válido.");
}

// --- REDIRECCIÓN ---
header("Location: listar_docs.php?msg=ok");
exit;
?>
