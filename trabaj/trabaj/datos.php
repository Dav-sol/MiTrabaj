<?php
$exito = false;
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("conexion.php");

    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];

    $sql = "INSERT INTO estudiante (nombre, cedula, edad, correo) VALUES ('$nombre', '$cedula', $edad, '$correo')";

    if (mysqli_query($conexion, $sql)) {
        $exito = true;
    } else {
        $error = "Error: " . mysqli_error($conexion);
    }
    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Encuesta Estudiantil</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
  :root {
    --primary-color: #4361ee;
    --primary-dark: #3a56d4;
    --secondary-color: #7209b7;
    --accent-color: #f72585;
    --light-bg: #f8f9fa;
    --dark-text: #2d3748;
    --light-text: #f8f9fa;
    --success-color: #10b981;
  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #f6f8ff 0%, #e9f0ff 100%);
    color: var(--dark-text);
    line-height: 1.6;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 1rem;
  }

  header {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 2rem 1rem;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 0 0 20px 20px;
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
  }

  .container {
    max-width: 800px;
    margin: 10rem auto 2rem;
    background: white;
    padding: 2rem;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    width: 100%;
    position: relative;
  }

  h2 {
    color: var(--primary-color);
    text-align: center;
    margin-bottom: 1.5rem;
  }

  label {
    display: block;
    margin-top: 1rem;
    font-weight: bold;
  }

  input, select {
    width: 100%;
    padding: 0.75rem;
    margin-top: 0.5rem;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s;
  }

  input:focus {
    border-color: var(--primary-color);
    outline: none;
  }

  .btn {
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    width: 100%;
    margin-top: 1.5rem;
  }

  .btn:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
  }

  .note {
    margin-top: 1.5rem;
    font-size: 0.9rem;
    color: #64748b;
    text-align: center;
  }

  .success-message {
    display: none;
    background-color: #e6fffa;
    color: var(--success-color);
    border: 1px solid var(--success-color);
    padding: 1.5rem;
    border-radius: 10px;
    text-align: center;
    margin-top: 2rem;
    animation: fadeInUp 0.8s ease-out forwards;
  }

  .success-message i {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    display: block;
  }

  .tips {
    margin-top: 1rem;
    font-style: italic;
    color: #444;
    opacity: 0;
    animation: fadeIn 2s ease-out 1.5s forwards;
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes fadeIn {
    to {
      opacity: 1;
    }
  }

  @media (max-width: 768px) {
    .container {
      margin: 5rem 1rem 1rem;
      padding: 1.5rem;
    }
  }
<?php if (!$exito): ?>
    .success-message { display: none; }
    <?php endif; ?>
  </style>
</head>
<body>
  <header>
    <h1>Registro de Estudiante</h1>
    <p>Completa tus datos para acceder a recomendaciones personalizadas</p>
  </header>

  <div class="container">
    <?php if ($exito): ?>
      <div class="success-message" id="mensajeExito">
        <i class="fas fa-check-circle"></i>
        ¡Encuesta enviada correctamente!
        <div class="tips">
          🌟 Gracias por confiar en nosotros.<br>
          💡 Recuerda: el conocimiento es tu mejor herramienta.<br>
          🚀 ¡Sigue esforzándote, el futuro es tuyo!
        </div>
      </div>
      <?php else: ?>
      <form id="formulario" method="post" action="">
        <h2>Información Personal</h2>
        <label for="nombre">Nombre completo</label>
        <input type="text" id="nombre" name="nombre" required placeholder="Ej: Juan Pérez">
        <label for="cedula">Cédula</label>
        <input type="text" id="cedula" name="cedula" required placeholder="Ej: 1234567890">
        <label for="edad">Edad</label>
        <input type="number" id="edad" name="edad" min="16" required placeholder="Ej: 20">
        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="correo" required placeholder="Ej: estudiante@ejemplo.com">
        <button type="submit" class="btn">
          <i class="fas fa-paper-plane"></i> Enviar
        </button>
      </form>
    <?php endif; ?>
    <p class="note">
      Tus datos están protegidos y solo se usarán para generar recomendaciones académicas.
    </p>
  </div>
</body>
</html>
</body>
</html>






