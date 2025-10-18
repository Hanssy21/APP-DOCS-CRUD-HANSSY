<?php
// Ruta de la carpeta donde están los documentos
$directorio = __DIR__ . '/docs/';

// Verifica si el parámetro "file" existe en la URL
if (isset($_GET['file'])) {
    $archivo = basename($_GET['file']); // Evita rutas peligrosas
    $rutaArchivo = $directorio . $archivo;

    // Verifica si el archivo existe
    if (file_exists($rutaArchivo)) {
        unlink($rutaArchivo); // Elimina el archivo
        header("Location: listar_docs.php?msg=deleted");
        exit;
    } else {
        header("Location: listar_docs.php?msg=notfound");
        exit;
    }
} else {
    header("Location: listar_docs.php");
    exit;
}
?>
