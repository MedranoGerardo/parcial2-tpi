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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .table th {
            background-color: #e9ecef;
        }
        .no-data {
            text-align: center;
            padding: 50px;
            color: #6c757d;
        }
        .btn-delete {
            padding: 5px 10px;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h3 class="mb-0">Eliminar Estudiantes</h3>
            </div>
            <div class="card-body">
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
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
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