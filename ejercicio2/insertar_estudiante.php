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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #007bff;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        textarea {
            height: 80px;
            resize: vertical;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            margin: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-info {
            background-color: #17a2b8;
            color: white;
        }
        .btn-info:hover {
            background-color: #138496;
        }
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-full {
            width: 100%;
            margin: 10px 0;
        }
        .alert {
            padding: 15px;
            margin: 15px 0;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        .alert-danger {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        .text-center {
            text-align: center;
        }
        .navigation {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Registro de Estudiantes</h3>
        
        <?php echo $message; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" 
                       id="nombre" 
                       name="nombre" 
                       value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>"
                       required>
            </div>
            
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" 
                       id="telefono" 
                       name="telefono" 
                       value="<?php echo isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : ''; ?>"
                       required>
            </div>
            
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" 
                       id="fecha_nacimiento" 
                       name="fecha_nacimiento" 
                       value="<?php echo isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : ''; ?>"
                       required>
            </div>
            
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                       id="direccion" 
                       name="direccion" 
                       rows="3" 
                       required><?php echo isset($_POST['direccion']) ? htmlspecialchars($_POST['direccion']) : ''; ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary btn-full">Registrar Estudiante</button>
        </form>
        
        <div class="navigation">
            <div class="text-center">
                <a href="mostrar_estudiantes.php" class="btn btn-info">Ver Estudiantes</a>
                <a href="eliminar_estudiante.php" class="btn btn-warning">Eliminar Estudiantes</a>
            </div>
        </div>
    </div>
</body>
</html>