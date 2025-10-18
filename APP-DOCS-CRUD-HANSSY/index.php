<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generador de Documentos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <h1 class="text-center mb-4">📄 Generador de Documentos PDF, Word y Excel</h1>

    <div class="card shadow p-4">
      <form action="crear_doc.php" method="POST">
        <div class="mb-3">
          <label for="titulo" class="form-label">Título del documento</label>
          <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>

        <div class="mb-3">
          <label for="contenido" class="form-label">Contenido</label>
          <textarea class="form-control" id="contenido" name="contenido" rows="6" required></textarea>
        </div>

        <div class="mb-3">
          <label for="tipo" class="form-label">Tipo de documento</label>
          <select class="form-select" id="tipo" name="tipo" required>
            <option value="pdf">PDF</option>
            <option value="word">Word (.docx)</option>
            <option value="excel">Excel (.xlsx)</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">Generar Documento</button>
      </form>
    </div>

    <div class="text-center mt-4">
      <a href="listar_docs.php" class="btn btn-success">📁 Ver documentos generados</a>
    </div>
  </div>

</body>
</html>
