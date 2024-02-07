<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Agregar Contacto</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var prefijoSelect = document.querySelector('select[name="prefijo"]');
            // Obtenemos el campo de teléfono
            var telefonoInput = document.getElementById('telefono');
            // Escuchar en el evento para cambiar el elemento seleccionado prefijo
            prefijoSelect.addEventListener('change', function() {
                // Actualizar el valor del campo en función a si cambiamos el prefijo 
                telefonoInput.value = prefijoSelect.value;
            });
        });
    </script>
</head>
<body>

<div class="container">
    <h1 id="body-title">Agenda de Contactos</h1>
    <h2>Agregar Contactos</h2>

    <form action="contactos.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        

      
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
        <select name="prefijo">
          <option value="+1 ">+1 (US/CA)</option>
          <option value="+34 ">+34 (ESP)</option>
          <option value="+44 ">+44 (UK)</option>
          <option value="+49 ">+49 (DE)</option>
          <option value="+55  ">+55 (BR)</option>
          <option value="+57 ">+57 (CO)</option>
          <!-- Prefijos tlfn-->
        </select>

        <button type="submit">Agregar Contacto</button>
    </form>
</div>

</body>
</html>