<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $contacto = "$nombre, $telefono\n";
    file_put_contents('contactos.txt', $contacto, FILE_APPEND);
}

// Eliminar contacto si se hace click en el enlace de eliminación
if (isset($_GET['eliminar'])) {
    $contactoEliminar = $_GET['eliminar'];
    $contactos = file('contactos.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $contactos = array_filter($contactos, function ($line) use ($contactoEliminar) {
        return strpos($line, $contactoEliminar) === false;
    });
    file_put_contents('contactos.txt', implode("\n", $contactos));

    // Redirigir después de eliminar para evitar el error
    header('Location: contactos.php');
    exit;
}


// Continuar con el código HTML después de la lógica de eliminación
$contactos = file('contactos.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Contactos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1 id="body-title">Alexander</h1>
<div class="container mt-5">
    <?php if ($contactos): ?>
        <h2 class="mb-4">Lista de Contactos</h2>
        <ul class="list-group">
            <?php foreach ($contactos as $contacto): ?>
                <?php list($nombre, $telefono) = explode(', ', $contacto); ?>
            
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="contact-info"><?php echo "$nombre - $telefono"; ?></span>
                  
                    <a href="contactos.php?eliminar=<?php echo urlencode($nombre); ?>" class="btn position-relative btn-danger ml-10">Eliminar</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="index.php" class="btn btn-light mt-4">Volver al Formulario</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>