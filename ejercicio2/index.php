<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            padding-top: 80px;
        }
        .main-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }
        .btn-custom {
            border-radius: 10px;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: 600;
            margin: 10px;
            transition: all 0.3s ease;
            min-width: 200px;
        }
        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        .title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 30px;
        }
        .subtitle {
            color: #7f8c8d;
            margin-bottom: 40px;
        }
        .feature-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="main-card p-5">
                    <div class="text-center">
                        <h1 class="title">🎓 Sistema de Gestión de Estudiantes</h1>
                        <p class="subtitle">Administra la información de estudiantes de manera fácil y eficiente</p>
                    </div>
                    
                    <div class="row text-center">
                        <div class="col-md-4 mb-4">
                            <div class="feature-icon">➕</div>
                            <h5>Registrar</h5>
                            <p class="text-muted">Agrega nuevos estudiantes al sistema</p>
                            <a href="insertar_estudiante.php" class="btn btn-primary btn-custom">
                                Registrar Estudiante
                            </a>
                        </div>
                        
                        <div class="col-md-4 mb-4">
                            <div class="feature-icon">📋</div>
                            <h5>Consultar</h5>
                            <p class="text-muted">Ve la lista completa de estudiantes</p>
                            <a href="mostrar_estudiantes.php" class="btn btn-success btn-custom">
                                Ver Estudiantes
                            </a>
                        </div>
                        
                        <div class="col-md-4 mb-4">
                            <div class="feature-icon">🗑️</div>
                            <h5>Eliminar</h5>
                            <p class="text-muted">Remueve estudiantes del sistema</p>
                            <a href="eliminar_estudiante.php" class="btn btn-danger btn-custom">
                                Eliminar Estudiantes
                            </a>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="text-center">
                        <h6 class="text-muted">Base de datos: <strong>alumno</strong> | Tabla: <strong>estudiante</strong></h6>
                        <p class="small text-muted">
                            Campos: nombre, teléfono, fecha de nacimiento, dirección
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>