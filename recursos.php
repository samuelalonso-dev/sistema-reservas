<?php
 require "db.php";

 $sql = "SELECT id, nombre, tipo, activo FROM recursos ORDER BY id DESC";
 $result = $conn->query($sql);

 if(!$result){
  die("Error en la consulta: " .  $conn->error);
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recursos</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
   <h1>Recursos</h1>
   <div class="acciones">
    <a href="crear_recurso.php" class="btn">+ Añadir recurso</a>
   </div>
   <main class="container">
    <h1>Recursos</h1>

    <table class="tabla">
      <caption class="visually-hidden">Listado de recursos disponibles</caption>
      <thead>
        <tr>
          <th scope = "col">ID</th>
          <th scope = "col">Nombre</th>
          <th scope = "col">Tipo</th>
          <th scope = "col">Activo</th>
        </tr>
      </thead>

      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= (int)$row['id'] ?></td>
            <td><?= htmlspecialchars($row['nombre']) ?></td>
            <td><?= htmlspecialchars($row['tipo']) ?></td>
            <td><?= $row['activo'] ? 'Sí' : 'No' ?></td>
          </tr>
          <?php endwhile; ?>
      </tbody>
    </table>

    <p class="volver">
      <a href="index.php">Volver a inicio</a>
    </p>
   </main>
</body>
</html>