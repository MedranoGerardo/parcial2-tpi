<?php
require_once 'database.php';

$message = '';
$db = new Database();

if (isset($_POST['delete_id'])) {
    $id = (int)$_POST['delete_id'];
    if ($db->deleteEstudiante($id)) {
        $message = '<div class="alert alert-success">Estudiante eliminado exitosamente.</div>';
    } else {
        $message = '<div class="alert alert-danger">Error al eliminar el estudiante.</div>';
    }
}

$estudiantes = $db->getAllEstudiantes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Estudiantes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            color: #dc3545;
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #dc3545;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #333;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-align: center;
            margin: 3px;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #545b62;
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
        .alert-warning {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
        }
        .info-box {
            background-color: #d1ecf1;
            border: 1px solid #bee5eb;
            color: #0c5460;
            padding: 15px;
            border-radius: 4px;
            margin: 15px 0;
        }
        .no-data {
            text-align: center;
            padding: 50px;
            color: #6c757d;
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
        <h3>Eliminar Estudiantes</h3>
        
        <?php echo $message; ?>
        
        <?php if (empty($estudiantes)): ?>
            <div class="no-data">
                <h4>No hay estudiantes registrados para eliminar</h4>
                <p>Haz clic en "Registrar Estudiante" para agregar estudiantes.</p>
            </div>
        <?php else: ?>
            <div class="alert alert-warning">
                <strong>¡Atención!</strong> La eliminación de registros es permanente y no se puede deshacer.
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Fecha de Nacimiento</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($estudiantes as $estudiante): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($estudiante['id']); ?></td>
                                        <td><?php echo htmlspecialchars($estudiante['nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($estudiante['teléfono']); ?></td>
                                        <td><?php echo htmlspecialchars($estudiante['fecha de nacimiento']); ?></td>
                                        <td><?php echo htmlspecialchars($estudiante['dirección']); ?></td>
                                        <td>
                                            <form method="POST" style="display: inline;" 
                                                  onsubmit="return confirm('¿Está seguro de que desea eliminar a <?php echo htmlspecialchars($estudiante['nombre']); ?>?');">
                                                <input type="hidden" name="delete_id" value="<?php echo $estudiante['id']; ?>">
                                                <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        <div class="alert alert-info">
                            <strong>Total de estudiantes:</strong> <?php echo count($estudiantes); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <hr class="my-4">
                
                <div class="text-center">
                    <a href="insertar_estudiante.php" class="btn btn-primary me-2">Registrar Estudiante</a>
                    <a href="mostrar_estudiantes.php" class="btn btn-success me-2">Ver Estudiantes</a>
                    <button onclick="window.location.reload()" class="btn btn-secondary">Actualizar Lista</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmarEliminacion(nombre, id) {
            if (confirm('¿Está completamente seguro de que desea eliminar al estudiante "' + nombre + '"? Esta acción no se puede deshacer.')) {
                document.getElementById('delete_form_' + id).submit();
            }
        }
    </script>
</body>
</html>