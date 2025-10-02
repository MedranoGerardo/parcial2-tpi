<?php
require_once 'database.php';

$db = new Database();
$estudiantes = $db->getAllEstudiantes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>
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
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0">Lista de Estudiantes Registrados</h3>
            </div>
            <div class="card-body">
                <?php if (empty($estudiantes)): ?>
                    <div class="no-data">
                        <h4>No hay estudiantes registrados</h4>
                        <p>Haz clic en "Registrar Estudiante" para agregar el primer estudiante.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Fecha de Nacimiento</th>
                                    <th scope="col">Dirección</th>
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
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        <div class="alert alert-info">
                            <strong>Total de estudiantes registrados:</strong> <?php echo count($estudiantes); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <hr class="my-4">
                
                <div class="text-center">
                    <a href="insertar_estudiante.php" class="btn btn-primary me-2">Registrar Estudiante</a>
                    <a href="eliminar_estudiante.php" class="btn btn-warning me-2">Eliminar Estudiantes</a>
                    <button onclick="window.location.reload()" class="btn btn-secondary">Actualizar Lista</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>