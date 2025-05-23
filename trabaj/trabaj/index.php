<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Plataforma de evaluación de riesgo de deserción estudiantil. Descubre si estás en riesgo y recibe recomendaciones.">
  <title>Evaluación de Riesgo de Deserción Estudiantil</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    :root {
      --primary: #4f46e5;
      --secondary: #9333ea;
      --accent: #f43f5e;
      --bg: #f9fafb;
      --text: #1f2937;
      --light: #ffffff;
      --card-shadow: rgba(0, 0, 0, 0.1);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--bg);
      color: var(--text);
      line-height: 1.6;
    }

    header {
      background: linear-gradient(to right, var(--primary), var(--secondary));
      color: var(--light);
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 10px var(--card-shadow);
    }

    header h1 {
      font-size: 1.8rem;
      font-weight: 700;
    }

    nav a {
      color: white;
      margin-left: 1rem;
      text-decoration: none;
      font-weight: 500;
      cursor: pointer;
      transition: 0.3s;
    }

    nav a:hover {
      color: var(--accent);
    }

    .modal, .popup {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: rgba(0, 0, 0, 0.6);
      visibility: hidden;
      opacity: 0;
      transition: visibility 0s, opacity 0.3s;
      z-index: 2000;
    }

    .modal.active, .popup.active {
      visibility: visible;
      opacity: 1;
    }

    .modal-content, .popup-content {
      background: white;
      padding: 2rem;
      border-radius: 12px;
      text-align: center;
      max-width: 400px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .modal-content h3, .popup-content h3 {
      color: var(--primary);
      margin-bottom: 1rem;
    }

    .close-btn {
      margin-top: 1rem;
      background: var(--accent);
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      cursor: pointer;
    }

    main {
      max-width: 1200px;
      margin: auto;
      padding: 4rem 1rem;
    }

    .intro {
      text-align: center;
      margin-bottom: 3rem;
    }

    .intro h2 {
      font-size: 2.8rem;
      color: var(--primary);
      margin-bottom: 1rem;
    }

    .intro p {
      font-size: 1.25rem;
      color: #4b5563;
      max-width: 800px;
      margin: auto;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2.5rem;
      margin: 3rem 0;
    }

    .card {
      background-color: var(--light);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 8px 20px var(--card-shadow);
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-8px);
    }

    .card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .card-content {
      padding: 2rem;
      text-align: center;
    }

    .card-content h3 {
      color: var(--primary);
      font-size: 1.4rem;
      margin-bottom: 1rem;
    }

    .card-content p {
      color: #4b5563;
      font-size: 1rem;
    }

    .boton-iniciar {
      text-align: center;
      margin-top: 4rem;
    }

    .boton-iniciar a {
      background-color: var(--primary);
      color: white;
      text-decoration: none;
      padding: 1rem 2.5rem;
      font-size: 1.1rem;
      border-radius: 50px;
      transition: 0.3s;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .boton-iniciar a:hover {
      background-color: var(--accent);
    }

    footer {
      background-color: #111827;
      color: #e5e7eb;
      padding: 2rem 1rem;
      margin-top: 4rem;
      text-align: center;
    }

    .footer-icons a {
      color: #e5e7eb;
      margin: 0 0.5rem;
      font-size: 1.2rem;
      transition: 0.3s;
    }

    .footer-icons a:hover {
      color: var(--accent);
    }
  </style>
</head>
<body>

  <header>
    <h1>Gestión de Registros</h1>
    <nav>
      <a onclick="showInicio()">Inicio</a>
      <a onclick="showContacto()">Contacto</a>
    </nav>
  </header>

  <main>
    <section class="intro">
      <h2>¿Estás en riesgo de desertar?</h2>
      <p>Esta plataforma te ayuda a identificar si estás en riesgo de abandonar tus estudios, y te ofrece recomendaciones útiles para evitarlo. ¡Comienza ahora!</p>
    </section>

    <section class="cards">
      <div class="card">
        <img src="foto.jpg" alt="Estudiante">
        <div class="card-content">
          <h3>¿Qué es la deserción?</h3>
          <p>Es el abandono prematuro de los estudios universitarios. Puede tener causas personales, económicas o académicas.</p>
        </div>
      </div>
      <div class="card">
        <img src="fotos.jpg" alt="Advertencia">
        <div class="card-content">
          <h3>¿Por qué importa?</h3>
          <p>Detectar el riesgo a tiempo puede ayudarte a buscar apoyo, mejorar tu desempeño y alcanzar tus metas profesionales.</p>
        </div>
      </div>
      <div class="card">
        <img src="foto1.jpg" alt="Formulario">
        <div class="card-content">
          <h3>¿Qué hacemos?</h3>
          <p>Te guiamos mediante un formulario que analiza tus condiciones actuales y genera una evaluación automática.</p>
        </div>
      </div>
    </section>

    <div class="boton-iniciar">
      <a href="semestres.php"><i class="fas fa-pen"></i> Iniciar Encuesta</a>
    </div>
  </main>

  <footer>
    <p>© 2025 Universidad Simón Bolívar - Todos los derechos reservados</p>
    <div class="footer-icons">
      <a href="https://wa.me/573001112233" target="_blank"><i class="fab fa-whatsapp"></i></a>
      <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
      <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
    </div>
  </footer>

  <div class="modal" id="modalContacto">
    <div class="modal-content">
      <h3>Contacto</h3>
      <p>Teléfono: +57 300 111 2233</p>
      <button class="close-btn" onclick="closeContacto()">Cerrar</button>
    </div>
  </div>

  <div class="popup" id="popupInicio">
    <div class="popup-content">
      <h3>Bienvenido</h3>
      <p>Gracias por visitar nuestra plataforma. Descubre si estás en riesgo de deserción y cómo prevenirlo.</p>
      <button class="close-btn" onclick="closeInicio()">Entendido</button>
    </div>
  </div>

  <script>
    function showContacto() {
      document.getElementById('modalContacto').classList.add('active');
    }
    function closeContacto() {
      document.getElementById('modalContacto').classList.remove('active');
    }
    function showInicio() {
      document.getElementById('popupInicio').classList.add('active');
    }
    function closeInicio() {
      document.getElementById('popupInicio').classList.remove('active');
    }

    window.onload = () => {
      showInicio();
    }
  </script>

</body>
</html>
