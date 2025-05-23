<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Evaluación de Riesgo de Deserción Estudiantil</title>
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
      --warning-color: #f59e0b;
      --danger-color: #ef4444;
    }
    
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f6f8ff 0%, #e9f0ff 100%);
      color: var(--dark-text);
      line-height: 1.6;
      min-height: 100vh;
    }

    header {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
      color: white;
      padding: 2rem 1rem;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    header h1 {
      margin-bottom: 0.5rem;
      font-size: 2.2rem;
    }

    header p {
      font-size: 1.1rem;
      opacity: 0.9;
    }

    .container {
      max-width: 800px;
      margin: 2rem auto;
      background: white;
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    }

    .progress-container {
      margin-bottom: 2rem;
      background-color: #e2e8f0;
      border-radius: 999px;
      height: 8px;
      overflow: hidden;
    }

    .progress-bar {
      height: 100%;
      background: linear-gradient(to right, var(--primary-color), var(--accent-color));
      transition: width 0.4s ease;
      border-radius: 999px;
    }

    .step-indicator {
      display: flex;
      justify-content: space-between;
      margin-bottom: 1.5rem;
    }

    .step {
      text-align: center;
      font-size: 0.85rem;
      color: #718096;
    }

    .step.active {
      color: var(--primary-color);
      font-weight: bold;
    }

    .pregunta {
      display: none;
      animation: fadeIn 0.5s ease;
      margin-bottom: 2rem;
    }

    .pregunta.active {
      display: block;
    }

    .pregunta h3 {
      margin-bottom: 1rem;
      color: var(--primary-color);
      font-size: 1.3rem;
    }

    .opciones {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 0.8rem;
      margin-top: 1.5rem;
    }

    .opcion {
      background-color: #f8fafc;
      border: 2px solid #e2e8f0;
      border-radius: 8px;
      padding: 1rem;
      cursor: pointer;
      transition: all 0.2s ease;
      text-align: center;
    }

    .opcion:hover {
      border-color: var(--primary-color);
      background-color: #f0f4ff;
    }

    .opcion.selected {
      background-color: #ebf4ff;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.3);
    }

    .opcion input {
      display: none;
    }

    .navigation {
      display: flex;
      justify-content: space-between;
      margin-top: 2rem;
    }

    .btn {
      background: var(--primary-color);
      color: white;
      border: none;
      padding: 12px 24px;
      font-size: 1rem;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .btn:hover {
      background: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
    }

    .btn:active {
      transform: translateY(0);
    }

    .btn-secondary {
      background-color: #e2e8f0;
      color: #4a5568;
    }

    .btn-secondary:hover {
      background-color: #cbd5e0;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .btn-submit {
      background: linear-gradient(to right, var(--primary-color), var(--accent-color));
    }

    .resultado {
      display: none;
      margin-top: 2rem;
      padding: 2rem;
      text-align: center;
      border-radius: 12px;
      animation: fadeIn 0.5s ease;
    }

    .resultado h3 {
      margin-bottom: 1rem;
      font-size: 1.5rem;
    }

    .resultado p {
      margin-bottom: 1rem;
      font-size: 1.1rem;
    }

    .resultado .recomendaciones {
      text-align: left;
      margin-top: 1.5rem;
      padding: 1rem;
      background-color: #f8fafc;
      border-radius: 8px;
    }

    .resultado .recomendaciones h4 {
      margin-bottom: 0.8rem;
      color: var(--primary-color);
    }

    .resultado .recomendaciones ul {
      padding-left: 1.5rem;
    }

    .resultado .recomendaciones li {
      margin-bottom: 0.5rem;
    }

    .riesgo-alto {
      background-color: #fee2e2;
      border: 1px solid #fecaca;
    }

    .riesgo-medio {
      background-color: #fef3c7;
      border: 1px solid #fde68a;
    }

    .riesgo-bajo {
      background-color: #d1fae5;
      border: 1px solid #a7f3d0;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
      .container {
        margin: 1rem;
        padding: 1.5rem;
      }
      
      .opciones {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

<header>
  <h1>Evaluación de Riesgo de Deserción Estudiantil</h1>
  <p>Responde con sinceridad para identificar factores de riesgo y recibir recomendaciones personalizadas</p>
</header>

<div class="container">
  <div class="progress-container">
    <div class="progress-bar" id="progress-bar"></div>
  </div>
  
  <form id="formulario">
       <div class="pregunta active" id="pregunta-1">
      <h3>¿En qué semestre te encuetras?</h3>
      <div class="opciones">
        <label class="opcion">
          <input type="radio" name="p1" value="0">
        Cuarto
        </label>
        <label class="opcion">
          <input type="radio" name="p1" value="1">
     Quinto
        </label>
      </div>
    </div>
    <!-- Pregunta 1 -->
    <div class="pregunta" id="pregunta-2">
      <h3>1. ¿Te sientes satisfecho con la carrera que estás estudiando actualmente?</h3>

      <div class="opciones">
        <label class="opcion">
          <input type="radio" name="p2" value="0">
          Nunca
        </label>
        <label class="opcion">
          <input type="radio" name="p2" value="1">
          Pocas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p2" value="2">
          A veces
        </label>
        <label class="opcion">
          <input type="radio" name="p2" value="3">
          Muchas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p2" value="4">
          Siempre
        </label>
      </div>
    </div>

    <!-- Pregunta 2 -->
    <div class="pregunta" id="pregunta-3">
      <h3>2. ¿Has tenido dificultades para mantener tu promedio en los últimos semestres?</h3>
      
      <div class="opciones">
        <label class="opcion">
          <input type="radio" name="p3" value="0">
          Nunca
        </label>
        <label class="opcion">
          <input type="radio" name="p3" value="1">
          Pocas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p3" value="2">
          A veces
        </label>
        <label class="opcion">
          <input type="radio" name="p3" value="3">
          Muchas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p3" value="4">
          Siempre
        </label>
      </div>
    </div>

    <!-- Pregunta 3 -->
    <div class="pregunta" id="pregunta-4">
      <h3>3.¿Te cuesta equilibrar tus estudios con otras responsabilidades (trabajo, familia, etc.)?</h3>
      
      <div class="opciones">
        <label class="opcion">
          <input type="radio" name="p4" value="0">
          Nunca
        </label>
        <label class="opcion">
          <input type="radio" name="p4" value="1">
          Pocas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p4" value="2">
          A veces
        </label>
        <label class="opcion">
          <input type="radio" name="p4" value="3">
          Muchas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p4" value="4">
          Siempre
        </label>
      </div>
    </div>

    <!-- Pregunta 4 -->
    <div class="pregunta" id="pregunta-5">
      <h3>4.¿Consideras que tus materias actuales son demasiado exigentes o abrumadoras?</h3>
   
      <div class="opciones">
        <label class="opcion">
          <input type="radio" name="p5" value="0">
          Nunca
        </label>
        <label class="opcion">
          <input type="radio" name="p5" value="1">
          Pocas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p5" value="2">
          A veces
        </label>
        <label class="opcion">
          <input type="radio" name="p5" value="3">
          Muchas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p5" value="4">
          Siempre
        </label>
      </div>
    </div>

    <!-- Pregunta 5 -->
    <div class="pregunta" id="pregunta-6">
      <h3>5.¿Has pensado en cambiarte de carrera o universidad recientemente?</h3>

      <div class="opciones">
        <label class="opcion">
          <input type="radio" name="p6" value="0">
          Nunca
        </label>
        <label class="opcion">
          <input type="radio" name="p6" value="1">
          Pocas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p6" value="2">
          A veces
        </label>
        <label class="opcion">
          <input type="radio" name="p6" value="3">
          Muchas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p6" value="4">
          Siempre
        </label>
      </div>
    </div>

    <!-- Pregunta 6 -->
    <div class="pregunta" id="pregunta-7">
      <h3>6. ¿Participas en actividades extracurriculares o académicas que fortalezcan tu desarrollo profesional?</h3>
     
      <div class="opciones">
        <label class="opcion">
          <input type="radio" name="p7" value="0">
          Nunca
        </label>
        <label class="opcion">
          <input type="radio" name="p7" value="1">
          Pocas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p7" value="2">
          A veces
        </label>
        <label class="opcion">
          <input type="radio" name="p7" value="3">
          Muchas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p7" value="4">
          Siempre
        </label>
      </div>
    </div>

    <!-- Pregunta 7 -->
    <div class="pregunta" id="pregunta-8">
      <h3>7. ¿Sientes que tienes el apoyo suficiente por parte de docentes o tutores?</h3>
      
      <div class="opciones">
        <label class="opcion">
          <input type="radio" name="p8" value="0">
          Nunca
        </label>
        <label class="opcion">
          <input type="radio" name="p8" value="1">
          Pocas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p8" value="2">
          A veces
        </label>
        <label class="opcion">
          <input type="radio" name="p8" value="3">
          Muchas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p8" value="4">
          Siempre
        </label>
      </div>
    </div>

    <!-- Pregunta 8 -->
    <div class="pregunta" id="pregunta-9">
      <h3>8. ¿Estás satisfecho con tus avances hacia la práctica profesional o el trabajo de grado?</h3>
      <div class="opciones">
        <label class="opcion">
          <input type="radio" name="p9" value="0">
          Nunca
        </label>
        <label class="opcion">
          <input type="radio" name="p9" value="1">
          Pocas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p9" value="2">
          A veces
        </label>
        <label class="opcion">
          <input type="radio" name="p9" value="3">
          Muchas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p9" value="4">
          Siempre
        </label>
      </div>
    </div>

    <!-- Pregunta 9 -->
    <div class="pregunta" id="pregunta-10">
      <h3>9. ¿Tienes claro tu proyecto de vida y cómo tu carrera contribuye a él?</h3>
    
      <div class="opciones">
        <label class="opcion">
          <input type="radio" name="p10" value="0">
          Nunca
        </label>
        <label class="opcion">
          <input type="radio" name="p10" value="1">
          Pocas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p10" value="2">
          A veces
        </label>
        <label class="opcion">
          <input type="radio" name="p10" value="3">
          Muchas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p10" value="4">
          Siempre
        </label>
      </div>
    </div>

    <!-- Pregunta 10 -->
    <div class="pregunta" id="pregunta-11">
      <h3>10. ¿Tu situación económica ha afectado tu continuidad en la universidad en este semestre?</h3>
    
      <div class="opciones">
        <label class="opcion">
          <input type="radio" name="p11" value="0">
          Nunca
        </label>
        <label class="opcion">
          <input type="radio" name="p11" value="1">
          Pocas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p11" value="2">
          A veces
        </label>
        <label class="opcion">
          <input type="radio" name="p11" value="3">
          Muchas veces
        </label>
        <label class="opcion">
          <input type="radio" name="p11" value="4">
          Siempre
        </label>
      </div>
    </div>

    <head>
  <!-- ...tu contenido original... -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="navigation">
    <button type="button" id="btn-anterior" class="btn btn-secondary" style="display: none;">Anterior</button>
    <button type="button" id="btn-siguiente" class="btn">Siguiente</button>
    <button type="button" id="btn-evaluar" class="btn btn-submit" style="display: none;">Ver resultados</button>
  </div>
  </form>
  <br>
  <a href="semestres.php" class="btn btn-secondary"> Regresar</a>

  <div id="resultado" class="resultado">
    <!-- El contenido del resultado se generará dinámicamente -->
  </div>

  <!-- Modal de advertencia -->
  <div class="modal fade" id="modalAdvertencia" tabindex="-1" aria-labelledby="modalAdvertenciaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning text-dark">
          <h5 class="modal-title" id="modalAdvertenciaLabel">Advertencia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          Por favor, selecciona una opción para continuar.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const preguntas = document.querySelectorAll('.pregunta');
      const btnAnterior = document.getElementById('btn-anterior');
      const btnSiguiente = document.getElementById('btn-siguiente');
      const btnEvaluar = document.getElementById('btn-evaluar');
      const progressBar = document.getElementById('progress-bar');
      const resultado = document.getElementById('resultado');

      let preguntaActual = 0;
      const totalPreguntas = preguntas.length;

      function actualizarProgreso() {
        const porcentaje = ((preguntaActual + 1) / totalPreguntas) * 100;
        progressBar.style.width = `${porcentaje}%`;
      }

      function mostrarPregunta(index) {
        preguntas.forEach((pregunta, i) => {
          pregunta.classList.remove('active');
          if (i === index) {
            pregunta.classList.add('active');
          }
        });

        btnAnterior.style.display = index > 0 ? 'block' : 'none';
        if (index === totalPreguntas - 1) {
          btnSiguiente.style.display = 'none';
          btnEvaluar.style.display = 'block';
        } else {
          btnSiguiente.style.display = 'block';
          btnEvaluar.style.display = 'none';
        }

        actualizarProgreso();
      }

      btnAnterior.addEventListener('click', function() {
        if (preguntaActual > 0) {
          preguntaActual--;
          mostrarPregunta(preguntaActual);
        }
      });

      btnSiguiente.addEventListener('click', function() {
        const preguntaActualElement = preguntas[preguntaActual];
        const radioButtons = preguntaActualElement.querySelectorAll('input[type="radio"]');
        const seleccionado = Array.from(radioButtons).some(radio => radio.checked);

        if (!seleccionado) {
          const modal = new bootstrap.Modal(document.getElementById('modalAdvertencia'));
          modal.show();
          return;
        }

        if (preguntaActual < totalPreguntas - 1) {
          preguntaActual++;
          mostrarPregunta(preguntaActual);
        }
      });

      document.querySelectorAll('.opcion').forEach(opcion => {
        opcion.addEventListener('click', function() {
          const input = this.querySelector('input[type="radio"]');
          if (!input) return;
          const name = input.getAttribute('name');
          document.querySelectorAll(`.opcion input[name="${name}"]`).forEach(radio => {
            radio.closest('.opcion').classList.remove('selected');
            radio.checked = false;
          });
          this.classList.add('selected');
          input.checked = true;
        });
      });

      document.querySelectorAll('.opcion input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function() {
          const name = this.getAttribute('name');
          document.querySelectorAll(`.opcion input[name="${name}"]`).forEach(r => {
            r.closest('.opcion').classList.remove('selected');
          });
          if (this.checked) {
            this.closest('.opcion').classList.add('selected');
          }
        });
      });

      btnEvaluar.addEventListener('click', function() {
        const todasRespondidas = Array.from({ length: totalPreguntas }, (_, i) => {
          const name = `p${i + 1}`;
          return document.querySelector(`input[name="${name}"]:checked`) !== null;
        }).every(Boolean);

        if (!todasRespondidas) {
          alert('Por favor, responde todas las preguntas antes de ver los resultados.');
          return;
        }

        let puntuacion = 0;
        for (let i = 1; i <= totalPreguntas; i++) {
          const respuesta = document.querySelector(`input[name="p${i}"]:checked`);
          puntuacion += parseInt(respuesta.value);
        }

        const puntuacionMaxima = totalPreguntas * 4;
        const porcentaje = (puntuacion / puntuacionMaxima) * 100;

        let nivelRiesgo, mensaje, recomendaciones, clase;

        if (porcentaje >= 70) {
          nivelRiesgo = "Alto";
          mensaje = "Tus respuestas indican un alto riesgo de deserción estudiantil. Te recomendamos buscar apoyo lo antes posible.";
          recomendaciones = [
            "Agenda una cita con un consejero académico o tutor de tu institución",
            "Busca apoyo psicológico en los servicios de bienestar estudiantil",
            "Considera solicitar becas o ayudas financieras disponibles",
            "Habla con tus profesores sobre tus dificultades académicas",
            "Únete a grupos de estudio para mejorar tu comprensión de los contenidos"
          ];
          clase = "riesgo-alto";
        } else if (porcentaje >= 40) {
          nivelRiesgo = "Medio";
          mensaje = "Tus respuestas indican un riesgo moderado de deserción. Es importante que tomes medidas preventivas.";
          recomendaciones = [
            "Organiza mejor tu tiempo de estudio con un horario estructurado",
            "Busca tutorías para las materias que te resultan más difíciles",
            "Considera hablar con un consejero sobre tus dudas vocacionales",
            "Participa en actividades extracurriculares para mejorar tu integración",
            "Desarrolla técnicas de estudio más efectivas"
          ];
          clase = "riesgo-medio";
        } else {
          nivelRiesgo = "Bajo";
          mensaje = "Tus respuestas indican un bajo riesgo de deserción. ¡Sigue así!";
          recomendaciones = [
            "Continúa con tus buenos hábitos de estudio",
            "Mantén una comunicación abierta con profesores y compañeros",
            "Participa en actividades académicas complementarias",
            "Considera ser tutor de otros estudiantes que necesiten ayuda",
            "Establece metas académicas a corto y largo plazo"
          ];
          clase = "riesgo-bajo";
        }

        resultado.innerHTML = `
          <h3>Nivel de Riesgo: ${nivelRiesgo}</h3>
          <p>${mensaje}</p>
          <div class="recomendaciones">
            <h4>Recomendaciones personalizadas:</h4>
            <ul>${recomendaciones.map(rec => `<li>${rec}</li>`).join('')}</ul>
          </div>
          <div style="display: flex; justify-content: center; gap: 1rem; margin-top: 2rem;">
            <button type="button" class="btn" onclick="location.reload()">Realizar la encuesta nuevamente</button>
            <button type="button" class="btn" onclick="window.location.href='datos.php'">Registrar mis datos</button>
          </div>
        `;

        resultado.className = `resultado ${clase}`;
        resultado.style.display = 'block';

        document.getElementById('formulario').style.display = 'none';
        document.querySelector('.progress-container').style.display = 'none';
      });

      mostrarPregunta(0);
    });
  </script>
</body>
