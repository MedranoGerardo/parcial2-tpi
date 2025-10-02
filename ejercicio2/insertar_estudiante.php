<?php
require_once 'database.php';

$message = '';

if ($_POST) {
    $nombre = trim($_POST['nombre']);
    $telefono = trim($_POST['telefono']);
    $fechaNacimiento = $_POST['fecha_nacimiento'];
    $direccion = trim($_POST['direccion']);
    
    if (empty($nombre) || empty($telefono) || empty($fechaNacimiento) || empty($direccion)) {
        $message = '<div class="alert alert-danger">Todos los campos son obligatorios.</div>';
    } else {
        $db = new Database();
        if ($db->insertEstudiante($nombre, $telefono, $fechaNacimiento, $direccion)) {
            $message = '<div class="alert alert-success">Estudiante registrado exitosamente.</div>';
            $_POST = array();
        } else {
            $message = '<div class="alert alert-danger">Error al registrar el estudiante.</div>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .alert {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Registro de Estudiantes</h3>
            </div>
            <div class="card-body">
                <?php echo $message; ?>
                
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" 
                               class="form-control" 
                               id="nombre" 
                               name="nombre" 
                               value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>"
                               required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="text" 
                               class="form-control" 
                               id="telefono" 
                               name="telefono" 
                               value="<?php echo isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : ''; ?>"
                               required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                        <input type="date" 
                               class="form-control" 
                               id="fecha_nacimiento" 
                               name="fecha_nacimiento" 
                               value="<?php echo isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : ''; ?>"
                               required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección:</label>
                        <textarea class="form-control" 
                                  id="direccion" 
                                  name="direccion" 
                                  rows="3" 
                                  required><?php echo isset($_POST['direccion']) ? htmlspecialchars($_POST['direccion']) : ''; ?></textarea>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Registrar Estudiante</button>
                    </div>
                </form>
                
                <hr class="my-4">
                
                <div class="text-center">
                    <a href="mostrar_estudiantes.php" class="btn btn-info me-2">Ver Estudiantes</a>
                    <a href="eliminar_estudiante.php" class="btn btn-warning">Eliminar Estudiantes</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>