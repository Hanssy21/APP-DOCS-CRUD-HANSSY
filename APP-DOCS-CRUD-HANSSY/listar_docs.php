<?php
$directorio = __DIR__ . '/docs/';
$archivos = scandir($directorio);

// Verificar si hay un mensaje por eliminación u error
$msg = "";
if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'deleted') {
        $msg = "<div style='color: green; font-weight: bold;'>✅ Documento eliminado correctamente.</div>";
    } elseif ($_GET['msg'] === 'notfound') {
        $msg = "<div style='color: red; font-weight: bold;'>❌ El archivo no fue encontrado.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listar Documentos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      background: #f9f9f9;
    }
    h2 {
      color: #2c3e50;
    }
    table {
      width: 60%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }
    th {
      background: #2c3e50;
      color: white;
    }
    a {
      color: #2980b9;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    .delete {
      color: red;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h2>📄 Lista de Documentos</h2>
  <?php echo $msg; ?>

  <table>
    <tr>
      <th>Archivo</th>
      <th>Acciones</th>
    </tr>
    <?php
    foreach ($archivos as $archivo) {
        if ($archivo != '.' && $archivo != '..') {
            echo "<tr>
                    <td>$archivo</td>
                    <td>
                      <a href='docs/$archivo' target='_blank'>Abrir</a> | 
                      <a class='delete' href='eliminar_doc.php?file=$archivo' onclick='return confirm(\"¿Eliminar este archivo?\")'>Eliminar</a>
                    </td>
                  </tr>";
        }
    }
    ?>
  </table>
  <br>
  <a href="index.php">⬅ Volver al inicio</a>
</body>
</html>
