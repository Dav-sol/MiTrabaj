<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de registros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .navbar {
            display: flex;
            justify-content: center;
            gap: 40px;
            background-color:rgb(76, 144, 175);
            padding: 15px 0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .navbar a:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .navbar a i {
            margin-right: 8px;
        }
        
    </style>
</head>
<body>

    <h1>Evaluación de Riesgo de Deserción Estudiantil</h1>
<p>  Bienvenidos, esta página tiene como objetivo alertarte a tí como estudiante, según los factores que selecciones en el siguiente formulario, si estás o no propenso a desertar, si estas riesgo te daremos una serie de recomendaciones generales para ayudarte a evitar tu deserción.</p>
<div class="navbar">
        <a href="desercion.php"><i class="fas fa-user-graduate"></i>Ingresa tus datos personales</a>
    </div>

</body>
</html>