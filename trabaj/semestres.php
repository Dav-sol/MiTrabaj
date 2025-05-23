<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Encuestas por Semestre</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <style>
    :root {
      --primary: #4361ee;
      --primary-dark: #3a56d4;
      --secondary: #c89de6;
      --accent: #f72585;
      --bg-light: #f0f4ff;
      --text-dark: #1e293b;
      --text-light: #ffffff;
      --footer-dark: #1f2937;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(to right, #f0f4ff, #e0e7ff);
      color: var(--text-dark);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    nav {
      background: var(--primary);
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    nav h2 {
      font-size: 1.5rem;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 1.5rem;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s;
    }

    nav ul li a:hover {
      color: var(--accent);
    }

    .hero {
      position: relative;
      background: linear-gradient(to right, var(--primary), var(--secondary));
      color: var(--text-light);
      padding: 6rem 2rem 8rem;
      text-align: center;
      border-bottom-left-radius: 60px;
      border-bottom-right-radius: 60px;
    }

    .hero h1 {
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    .hero p {
      font-size: 1.2rem;
      max-width: 650px;
      margin: 0 auto;
      opacity: 0.95;
    }

    .wave {
      position: absolute;
      bottom: -1px;
      left: 0;
      width: 100%;
      height: 70px;
      overflow: hidden;
      line-height: 0;
    }

    .wave svg {
      position: relative;
      display: block;
      width: calc(100% + 1.3px);
      height: 100px;
    }

    .container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 2rem;
      margin-top: -4rem;
      padding: 0 2rem 4rem;
    }

    .card {
      background: white;
      width: 300px;
      border-radius: 20px;
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
      padding: 2rem;
      text-align: center;
      transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-10px) scale(1.03);
      box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2);
    }

    .card.sem2-3 {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: var(--text-light);
    }

    .card.sem4-5 {
      background: linear-gradient(135deg, var(--secondary), #a673e8);
      color: var(--text-light);
    }

    .card .icon {
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    .card h2 {
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
    }

    .card p {
      font-size: 1rem;
      margin-bottom: 1.2rem;
    }

    .card a {
      text-decoration: none;
      background: var(--accent);
      color: white;
      padding: 0.7rem 1.4rem;
      border-radius: 999px;
      font-weight: 600;
      transition: background 0.3s ease;
    }

    .card a:hover {
      background: #d61e6d;
    }

    footer {
      background: var(--footer-dark);
      color: white;
      text-align: center;
      padding: 2rem 1rem;
      margin-top: auto;
    }

    footer .social-icons {
      margin: 1rem 0;
    }

    footer .social-icons a {
      color: white;
      margin: 0 0.5rem;
      font-size: 1.4rem;
      transition: color 0.3s;
    }

    footer .social-icons a:hover {
      color: var(--accent);
    }

    .modal, .popup {
      position: fixed;
      top: 0; left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0,0,0,0.6);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .modal.active, .popup.active {
      display: flex;
    }

    .modal-content, .popup-content {
      background: white;
      padding: 2rem;
      border-radius: 12px;
      text-align: center;
      max-width: 400px;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
    }

    .close-btn {
      margin-top: 1rem;
      background: var(--accent);
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 6px;
      cursor: pointer;
    }

    @media (max-width: 600px) {
      .hero h1 {
        font-size: 2rem;
      }

      .card {
        width: 100%;
        max-width: 350px;
      }
    }
  </style>
</head>
<body>
  <nav>
    <h2>Mi Plataforma</h2>
    <ul>
      <li><a href="#">Inicio</a></li>
      <li><a href="#" onclick="showContacto()">Contacto</a></li>
      <li><a href="#">Ayuda</a></li>
    </ul>
  </nav>

  <section class="hero">
    <h1>Encuestas de Seguimiento Académico</h1>
    <p>Selecciona la encuesta correspondiente a tu semestre y ayúdanos a identificar posibles riesgos de deserción para brindarte el mejor acompañamiento.</p>
    <div class="wave">
      <svg viewBox="0 0 500 150" preserveAspectRatio="none">
        <path d="M0.00,49.98 C150.00,150.00 349.90,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #f5f7ff;"></path>
      </svg>
    </div>
  </section>

  <div class="container">
    <div class="card sem2-3">
      <div class="icon"><i class="fas fa-user-graduate"></i></div>
      <h2>Segundo a Tercer Semestre</h2>
      <p>Detecta factores clave al inicio de tu formación académica.</p>
      <a href="desercion.php">Iniciar Encuesta</a>
    </div>

    <div class="card sem4-5">
      <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
      <h2>Cuarto a Quinto Semestre</h2>
      <p>Evalúa tu progreso académico y recibe orientación efectiva.</p>
      <a href="desercion2.php">Iniciar Encuesta</a>
    </div>
  </div>

  <footer>
    <div class="social-icons">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <p>© 2025 Plataforma Académica | Todos los derechos reservados.</p>
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

