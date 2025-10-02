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
            color: #28a745;
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #28a745;
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
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
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
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #545b62;
        }
        .no-data {
            text-align: center;
            padding: 50px;
            color: #6c757d;
        }
        .info-box {
            background-color: #d1ecf1;
            border: 1px solid #bee5eb;
            color: #0c5460;
            padding: 15px;
            border-radius: 4px;
            margin: 15px 0;
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
        <h3>Lista de Estudiantes Registrados</h3>
        
        <?php if (empty($estudiantes)): ?>
            <div class="no-data">
                <h4>No hay estudiantes registrados</h4>
                <p>Haz clic en "Registrar Estudiante" para agregar el primer estudiante.</p>
            </div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Dirección</th>
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
            
            <div class="info-box">
                <strong>Total de estudiantes registrados:</strong> <?php echo count($estudiantes); ?>
            </div>
        <?php endif; ?>
        
        <div class="navigation">
            <div class="text-center">
                <a href="insertar_estudiante.php" class="btn btn-primary">Registrar Estudiante</a>
                <a href="eliminar_estudiante.php" class="btn btn-warning">Eliminar Estudiantes</a>
                <button onclick="window.location.reload()" class="btn btn-secondary">Actualizar Lista</button>
            </div>
        </div>
    </div>
</body>
</html>