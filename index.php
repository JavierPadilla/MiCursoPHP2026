<?php
/**
 * Portal educativo personal
 * Menú superior + menú lateral de cursos (principal / clases / ejercicios)
 * Toda la navegación de contenido ocurre en el cliente (JS), sin recargar la página.
 * Los datos de los cursos viven en este arreglo de PHP: para agregar un curso,
 * una clase o un ejercicio nuevo, solo se edita el arreglo $cursos de abajo.
 */

$perfil = [
    'nombre'   => 'Prof. Elena Duarte',
    'rol'      => 'Docente de Tecnología · Formadora de formadores',
    'correo'   => 'elena.duarte@ejemplo.com',
    'ubicacion'=> 'Culiacán, Sinaloa, México',
];

$enlaces_externos = [
    ['nombre' => 'YouTube',  'url' => 'https://www.youtube.com/', 'icono' => 'yt'],
    ['nombre' => 'GitHub',   'url' => 'https://github.com/',      'icono' => 'gh'],
    ['nombre' => 'LinkedIn', 'url' => 'https://www.linkedin.com/','icono' => 'in'],
];

$cursos = [
    'desarrollo-web' => [
        'nombre'      => 'Desarrollo Web',
        'resumen'     => 'HTML, CSS, JavaScript y PHP para construir sitios reales desde cero.',
        'principal'   => 'Este curso recorre el desarrollo web desde la estructura de una página hasta la lógica del lado del servidor. Al terminar, el alumno será capaz de construir, estilizar y dar dinamismo a un sitio completo, y de conectarlo con datos en el backend.',
        'clases'      => [
            ['titulo' => 'Clase 1 · Estructura con HTML',      'contenido' => 'Etiquetas semánticas, formularios y buenas prácticas de estructura de documento.'],
            ['titulo' => 'Clase 2 · Estilos con CSS',           'contenido' => 'Modelo de caja, Flexbox, Grid y variables CSS para maquetar interfaces.'],
            ['titulo' => 'Clase 3 · Interactividad con JavaScript', 'contenido' => 'Manipulación del DOM, eventos y consumo de datos dinámicos.'],
            ['titulo' => 'Clase 4 · Lógica de servidor con PHP', 'contenido' => 'Variables, arreglos, formularios y cómo PHP genera HTML dinámico.'],
            ['titulo' => 'Clase 5 · Ejercicios PHP', 'contenido' => 'Taller de ejercicios en PHP.'],
""
        ],
        'ejercicios'  => [
            ['titulo' => 'Ejercicio 1 · Tarjeta de presentación en HTML/CSS', 'contenido' => 'Construir una tarjeta personal con foto, nombre y redes sociales, sin frameworks.'],
            ['titulo' => 'Ejercicio 2 · Lista de tareas con JavaScript',      'contenido' => 'Agregar, marcar y eliminar tareas manipulando el DOM.'],
            ['titulo' => 'Ejercicio 3 · Formulario de contacto en PHP',      'contenido' => 'Recibir datos de un formulario y mostrarlos validados en pantalla.'],
        ],
    ],
    'python-basico' => [
        'nombre'      => 'Python desde Cero',
        'resumen'     => 'Fundamentos de programación usando Python como primer lenguaje.',
        'principal'   => 'Curso introductorio pensado para quienes nunca han programado. Se avanza de la sintaxis básica a la resolución de problemas con funciones, listas y estructuras de control.',
        'clases'      => [
            ['titulo' => 'Clase 1 · Variables y tipos de datos', 'contenido' => 'Números, cadenas, booleanos y cómo Python interpreta cada tipo.'],
            ['titulo' => 'Clase 2 · Condicionales y ciclos',      'contenido' => 'if/else, for y while para controlar el flujo del programa.'],
            ['titulo' => 'Clase 3 · Funciones',                   'contenido' => 'Definición de funciones, parámetros y valores de retorno.'],
            ['titulo' => 'Clase 4 · Listas y diccionarios',       'contenido' => 'Estructuras de datos para organizar y recorrer información.'],
        ],
        'ejercicios'  => [
            ['titulo' => 'Ejercicio 1 · Calculadora básica',      'contenido' => 'Leer dos números y un operador, y mostrar el resultado.'],
            ['titulo' => 'Ejercicio 2 · Validador de contraseñas','contenido' => 'Verificar longitud mínima y presencia de números y letras.'],
            ['titulo' => 'Ejercicio 3 · Agenda de contactos',     'contenido' => 'Guardar contactos en un diccionario y permitir buscarlos por nombre.'],
        ],
    ],
    'bases-de-datos' => [
        'nombre'      => 'Bases de Datos',
        'resumen'     => 'Modelado relacional y SQL para almacenar y consultar información.',
        'principal'   => 'Se estudia el diseño de bases de datos relacionales, desde el modelo entidad-relación hasta consultas SQL avanzadas, con ejemplos aplicados a proyectos escolares.',
        'clases'      => [
            ['titulo' => 'Clase 1 · Modelo entidad-relación', 'contenido' => 'Entidades, atributos y relaciones antes de escribir una sola línea de SQL.'],
            ['titulo' => 'Clase 2 · Consultas SELECT',         'contenido' => 'Filtrado, ordenamiento y combinación de tablas con JOIN.'],
            ['titulo' => 'Clase 3 · Inserción y actualización','contenido' => 'INSERT, UPDATE y DELETE de forma segura.'],
        ],
        'ejercicios'  => [
            ['titulo' => 'Ejercicio 1 · Diseño de una base escolar', 'contenido' => 'Modelar alumnos, materias y calificaciones en tablas relacionadas.'],
            ['titulo' => 'Ejercicio 2 · Consultas con JOIN',          'contenido' => 'Obtener el listado de alumnos con su promedio por materia.'],
        ],
    ],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($perfil['nombre']) ?> · Portal educativo</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
<style>
  :root{
    --tinta:      #1B2A41;
    --papel:      #FAF7F0;
    --panel:      #F1ECE0;
    --ambar:      #D9A441;
    --teal:       #3F7268;
    --linea:      #E1D9C6;
    --texto-suave:#5B6472;
    --radio:      6px;
  }

  *{ box-sizing:border-box; }

  body{
    margin:0;
    background:var(--papel);
    color:var(--tinta);
    font-family:'Inter', sans-serif;
    -webkit-font-smoothing:antialiased;
  }

  h1,h2,h3{
    font-family:'Fraunces', serif;
    font-weight:600;
    margin:0 0 .5rem 0;
    letter-spacing:-0.01em;
  }

  a{ color:inherit; text-decoration:none; }

  .visually-hidden{
    position:absolute; width:1px; height:1px; overflow:hidden; clip:rect(0 0 0 0);
  }

  /* ---------- Encabezado / menú principal ---------- */
  header.top{
    position:sticky; top:0; z-index:30;
    background:var(--tinta);
    color:var(--papel);
    display:flex; align-items:center; justify-content:space-between;
    padding:.85rem 1.5rem;
    gap:1rem;
    flex-wrap:wrap;
  }

  .marca{
    display:flex; align-items:baseline; gap:.6rem;
  }
  .marca .punto{
    width:.55rem; height:.55rem; border-radius:50%;
    background:var(--ambar); display:inline-block;
  }
  .marca span.nombre{ font-family:'Fraunces', serif; font-weight:600; font-size:1.05rem; }
  .marca span.rol{ font-size:.75rem; color:#C9C2B2; display:block; }

  nav.principal{
    display:flex; align-items:center; gap:.25rem;
    flex-wrap:wrap;
  }

  nav.principal button.nav-link{
    background:none; border:none; color:var(--papel);
    font-family:'Inter', sans-serif; font-size:.9rem; font-weight:500;
    padding:.5rem .85rem; border-radius:var(--radio);
    cursor:pointer; letter-spacing:.01em;
  }
  nav.principal button.nav-link:hover{ background:rgba(250,247,240,.1); }
  nav.principal button.nav-link.activo{
    background:var(--ambar); color:var(--tinta); font-weight:600;
  }

  .dropdown{ position:relative; }
  .dropdown-menu{
    position:absolute; right:0; top:calc(100% + .5rem);
    background:var(--papel); color:var(--tinta);
    border:1px solid var(--linea); border-radius:var(--radio);
    min-width:170px; box-shadow:0 12px 24px rgba(27,42,65,.18);
    display:none; flex-direction:column; overflow:hidden;
  }
  .dropdown-menu.abierto{ display:flex; }
  .dropdown-menu a{
    padding:.6rem .9rem; font-size:.88rem; display:flex; align-items:center; gap:.5rem;
  }
  .dropdown-menu a:hover{ background:var(--panel); }
  .dropdown-menu .badge{
    font-family:'JetBrains Mono', monospace; font-size:.65rem;
    color:var(--teal); border:1px solid var(--teal); border-radius:3px;
    padding:0 .3rem;
  }

  /* ---------- Layout con menú lateral ---------- */
  .contenedor{
    display:flex; align-items:flex-start;
    max-width:1180px; margin:0 auto;
  }

  aside.lateral{
    width:270px; flex-shrink:0;
    padding:1.5rem 1rem 3rem;
    position:sticky; top:58px;
    max-height:calc(100vh - 58px);
    overflow-y:auto;
  }

  aside.lateral h2.titulo-lateral{
    font-family:'JetBrains Mono', monospace; text-transform:uppercase;
    font-size:.7rem; letter-spacing:.12em; color:var(--texto-suave);
    margin:0 0 .8rem .4rem;
  }

  .curso{
    margin-bottom:.3rem;
    border-left:2px solid transparent;
  }
  .curso.activo-curso{ border-left:2px solid var(--ambar); }

  .curso-cabecera{
    width:100%; display:flex; align-items:center; justify-content:space-between;
    background:none; border:none; cursor:pointer;
    padding:.55rem .6rem; border-radius:var(--radio);
    font-family:'Inter', sans-serif; font-weight:600; font-size:.87rem;
    color:var(--tinta); text-align:left;
  }
  .curso-cabecera:hover{ background:var(--panel); }
  .curso-cabecera .flecha{ transition:transform .15s ease; color:var(--texto-suave); font-size:.7rem; }
  .curso.abierto .curso-cabecera .flecha{ transform:rotate(90deg); }

  .curso-cuerpo{ display:none; padding-left:.6rem; }
  .curso.abierto .curso-cuerpo{ display:block; }

  .sub-grupo-titulo{
    font-family:'JetBrains Mono', monospace; font-size:.65rem;
    text-transform:uppercase; letter-spacing:.08em; color:var(--texto-suave);
    margin:.5rem 0 .2rem .5rem;
  }

  .curso-cuerpo a{
    display:block; padding:.4rem .6rem .4rem 1.1rem;
    font-size:.83rem; color:var(--texto-suave);
    border-radius:var(--radio); position:relative;
  }
  .curso-cuerpo a:hover{ background:var(--panel); color:var(--tinta); }
  .curso-cuerpo a.activo{
    background:var(--tinta); color:var(--papel); font-weight:500;
  }

  /* ---------- Contenido principal ---------- */
  main.contenido{
    flex:1; min-width:0;
    padding:2.2rem 2rem 5rem;
  }

  section.pagina{ display:none; animation:aparece .25s ease; }
  section.pagina.activa{ display:block; }

  @keyframes aparece{
    from{ opacity:0; transform:translateY(6px); }
    to{ opacity:1; transform:translateY(0); }
  }

  .eyebrow{
    font-family:'JetBrains Mono', monospace; font-size:.72rem;
    text-transform:uppercase; letter-spacing:.1em; color:var(--teal);
    margin-bottom:.4rem; display:block;
  }

  p.lead{ font-size:1.02rem; color:var(--texto-suave); max-width:640px; line-height:1.6; }

  .tarjetas{
    display:grid; grid-template-columns:repeat(auto-fill,minmax(230px,1fr));
    gap:1rem; margin-top:1.5rem;
  }
  .tarjeta{
    background:var(--panel); border:1px solid var(--linea); border-radius:var(--radio);
    padding:1.1rem;
  }
  .tarjeta h3{ font-size:1rem; }
  .tarjeta p{ font-size:.85rem; color:var(--texto-suave); margin:.3rem 0 .8rem; }
  .tarjeta button{
    background:none; border:1px solid var(--tinta); border-radius:var(--radio);
    padding:.4rem .8rem; font-size:.78rem; font-weight:600; cursor:pointer;
    color:var(--tinta);
  }
  .tarjeta button:hover{ background:var(--tinta); color:var(--papel); }

  .caja{
    background:#fff; border:1px solid var(--linea); border-radius:var(--radio);
    padding:1.4rem 1.5rem; max-width:680px; margin-top:1rem;
    line-height:1.7; font-size:.95rem;
  }

  .lista-simple{ list-style:none; padding:0; margin:1.2rem 0 0; max-width:680px; }
  .lista-simple li{
    border-bottom:1px solid var(--linea); padding:.75rem .2rem;
    display:flex; justify-content:space-between; align-items:center; gap:1rem;
  }
  .lista-simple li a.enlace-item{ font-weight:500; }
  .lista-simple li a.enlace-item:hover{ color:var(--teal); }
  .num{
    font-family:'JetBrains Mono', monospace; color:var(--ambar); font-weight:600;
    margin-right:.5rem;
  }

  .migaja{
    font-size:.78rem; color:var(--texto-suave); margin-bottom:.6rem;
  }
  .migaja button{
    background:none; border:none; color:var(--teal); cursor:pointer;
    font-size:.78rem; padding:0; text-decoration:underline;
  }

  footer.pie{
    border-top:1px solid var(--linea); padding:1.2rem 2rem;
    font-size:.78rem; color:var(--texto-suave);
    display:flex; justify-content:space-between; flex-wrap:wrap; gap:.5rem;
  }

  /* ---------- Responsivo ---------- */
  .abrir-lateral{ display:none; }

  @media (max-width: 880px){
    .contenedor{ flex-direction:column; }
    aside.lateral{
      position:static; width:100%; max-height:none;
      border-bottom:1px solid var(--linea);
      display:none;
    }
    aside.lateral.visible{ display:block; }
    .abrir-lateral{
      display:inline-flex; align-items:center; gap:.4rem;
      background:var(--ambar); color:var(--tinta); border:none;
      border-radius:var(--radio); padding:.45rem .8rem; font-weight:600;
      font-size:.82rem; cursor:pointer; margin:1rem 0 0 1rem;
    }
    main.contenido{ padding:1.2rem 1.2rem 4rem; }
  }
</style>
</head>
<body>

<header class="top">
  <div class="marca">
    <span class="punto"></span>
    <div>
      <span class="nombre"><?= htmlspecialchars($perfil['nombre']) ?></span>
      <span class="rol"><?= htmlspecialchars($perfil['rol']) ?></span>
    </div>
  </div>

  <nav class="principal" aria-label="Menú principal">
    <button class="nav-link" data-target="inicio">Inicio</button>
    <button class="nav-link" data-target="curriculum">Currículum</button>
    <button class="nav-link" data-target="acerca-de-mi">Acerca de mí</button>

    <div class="dropdown">
      <button class="nav-link" id="btnEnlaces" aria-haspopup="true" aria-expanded="false">Otros enlaces ▾</button>
      <div class="dropdown-menu" id="menuEnlaces" role="menu">
        <?php foreach ($enlaces_externos as $e): ?>
          <a href="<?= htmlspecialchars($e['url']) ?>" target="_blank" rel="noopener noreferrer" role="menuitem">
            <span class="badge"><?= htmlspecialchars(strtoupper($e['icono'])) ?></span>
            <?= htmlspecialchars($e['nombre']) ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </nav>
</header>

<button class="abrir-lateral" id="btnLateral">☰ Cursos</button>

<div class="contenedor">

  <!-- ---------- Menú lateral: cursos ---------- -->
  <aside class="lateral" id="menuLateral">
    <h2 class="titulo-lateral">Mis cursos</h2>

    <?php foreach ($cursos as $slug => $curso): ?>
      <div class="curso" data-curso="<?= htmlspecialchars($slug) ?>">
        <button class="curso-cabecera" data-toggle-curso="<?= htmlspecialchars($slug) ?>">
          <span><?= htmlspecialchars($curso['nombre']) ?></span>
          <span class="flecha">▶</span>
        </button>

        <div class="curso-cuerpo">
          <a href="#" class="enlace-pagina" data-target="curso-<?= htmlspecialchars($slug) ?>-principal">Página principal</a>

          <div class="sub-grupo-titulo">Clases</div>
          <?php foreach ($curso['clases'] as $i => $clase): ?>
            <a href="#" class="enlace-pagina" data-target="curso-<?= htmlspecialchars($slug) ?>-clase-<?= $i ?>">
              <?= htmlspecialchars($clase['titulo']) ?>
            </a>
          <?php endforeach; ?>

          <div class="sub-grupo-titulo">Ejercicios propuestos</div>
          <?php foreach ($curso['ejercicios'] as $i => $ej): ?>
            <a href="#" class="enlace-pagina" data-target="curso-<?= htmlspecialchars($slug) ?>-ejercicio-<?= $i ?>">
              <?= htmlspecialchars($ej['titulo']) ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </aside>

  <!-- ---------- Contenido principal ---------- -->
  <main class="contenido" id="contenido">

    <section class="pagina activa" id="pagina-inicio">
      <span class="eyebrow">Bienvenida</span>
      <h1>Hola, soy <?= htmlspecialchars($perfil['nombre']) ?></h1>
      <p class="lead">
        Este es mi portal de clases: aquí encuentras mi currículum, un poco sobre mí,
        y el material de cada curso que imparto — su página principal, sus clases y
        los ejercicios propuestos para practicar.
      </p>

      <div class="tarjetas">
        <?php foreach ($cursos as $slug => $curso): ?>
          <div class="tarjeta">
            <h3><?= htmlspecialchars($curso['nombre']) ?></h3>
            <p><?= htmlspecialchars($curso['resumen']) ?></p>
            <button class="ir-a-curso" data-target="curso-<?= htmlspecialchars($slug) ?>-principal">Ver curso</button>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="pagina" id="pagina-curriculum">
      <span class="eyebrow">Trayectoria</span>
      <h1>Currículum</h1>
      <div class="caja">
        <p><strong>Formación:</strong> Ingeniería en Sistemas Computacionales; Maestría en Educación con enfoque en tecnología.</p>
        <p><strong>Experiencia:</strong> 8 años impartiendo cursos de desarrollo web, programación y bases de datos en nivel medio superior y superior.</p>
        <p><strong>Certificaciones:</strong> Desarrollo web full-stack, administración de bases de datos relacionales, diseño instruccional.</p>
        <p>Puedes escribirme a <a href="mailto:<?= htmlspecialchars($perfil['correo']) ?>"><?= htmlspecialchars($perfil['correo']) ?></a>.</p>
      </div>
    </section>

    <section class="pagina" id="pagina-acerca-de-mi">
      <span class="eyebrow">Un poco más</span>
      <h1>Acerca de mí</h1>
      <div class="caja">
        <p>Soy docente de tecnología en <?= htmlspecialchars($perfil['ubicacion']) ?>. Creo que programar se aprende
        construyendo cosas pequeñas y reales, no solo leyendo teoría — por eso cada curso que armo
        incluye clases cortas y ejercicios propuestos para practicar de inmediato.</p>
        <p>Fuera del salón de clases, comparto tutoriales en YouTube y proyectos de ejemplo en GitHub,
        que puedes encontrar en el menú "Otros enlaces".</p>
      </div>
    </section>

    <?php foreach ($cursos as $slug => $curso): ?>

      <!-- Página principal del curso -->
      <section class="pagina" id="pagina-curso-<?= htmlspecialchars($slug) ?>-principal">
        <span class="eyebrow">Curso</span>
        <h1><?= htmlspecialchars($curso['nombre']) ?></h1>
        <p class="lead"><?= htmlspecialchars($curso['principal']) ?></p>

        <ul class="lista-simple">
          <?php foreach ($curso['clases'] as $i => $clase): ?>
            <li>
              <span><span class="num"><?= $i + 1 ?></span>
                <a class="enlace-item enlace-pagina" href="#" data-target="curso-<?= htmlspecialchars($slug) ?>-clase-<?= $i ?>">
                  <?= htmlspecialchars($clase['titulo']) ?>
                </a>
              </span>
            </li>
          <?php endforeach; ?>
        </ul>
      </section>

      <!-- Clases -->
      <?php foreach ($curso['clases'] as $i => $clase): ?>
        <section class="pagina" id="pagina-curso-<?= htmlspecialchars($slug) ?>-clase-<?= $i ?>">
          <div class="migaja">
            <button class="enlace-pagina" data-target="curso-<?= htmlspecialchars($slug) ?>-principal"><?= htmlspecialchars($curso['nombre']) ?></button>
             / Clase <?= $i + 1 ?>
          </div>
          <span class="eyebrow">Clase</span>
          <h1><?= htmlspecialchars($clase['titulo']) ?></h1>
          <div class="caja"><p><?= htmlspecialchars($clase['contenido']) ?></p></div>
        </section>
      <?php endforeach; ?>

      <!-- Ejercicios -->
      <?php foreach ($curso['ejercicios'] as $i => $ej): ?>
        <section class="pagina" id="pagina-curso-<?= htmlspecialchars($slug) ?>-ejercicio-<?= $i ?>">
          <div class="migaja">
            <button class="enlace-pagina" data-target="curso-<?= htmlspecialchars($slug) ?>-principal"><?= htmlspecialchars($curso['nombre']) ?></button>
             / Ejercicio propuesto
          </div>
          <span class="eyebrow">Ejercicio propuesto</span>
          <h1><?= htmlspecialchars($ej['titulo']) ?></h1>
          <div class="caja"><p><?= htmlspecialchars($ej['contenido']) ?></p></div>
        </section>
      <?php endforeach; ?>

    <?php endforeach; ?>

  </main>
</div>

<footer class="pie">
  <span>© <?= date('Y') ?> <?= htmlspecialchars($perfil['nombre']) ?></span>
  <span><?= htmlspecialchars($perfil['ubicacion']) ?></span>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {

  const paginas   = document.querySelectorAll('section.pagina');
  const navLinks  = document.querySelectorAll('nav.principal .nav-link[data-target]');
  const cursoLinks= document.querySelectorAll('.enlace-pagina, .ir-a-curso');

  function mostrarPagina(id) {
    paginas.forEach(p => p.classList.toggle('activa', p.id === 'pagina-' + id));

    // resalta el ítem correspondiente en el menú superior
    navLinks.forEach(b => b.classList.toggle('activo', b.dataset.target === id));

    // resalta el ítem correspondiente en el menú lateral y abre su curso
    document.querySelectorAll('.curso-cuerpo a').forEach(a => {
      a.classList.toggle('activo', a.dataset.target === id);
    });

    if (id.startsWith('curso-')) {
      const slug = id.split('-')[1];
      document.querySelectorAll('.curso').forEach(c => {
        c.classList.toggle('activo-curso', c.dataset.curso === slug);
      });
      // abre automáticamente el curso al que pertenece la página activa
      const cursoAbierto = document.querySelector('.curso[data-curso="' + slug + '"]');
      if (cursoAbierto) cursoAbierto.classList.add('abierto');
    }

    window.location.hash = id;
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  // Menú superior
  navLinks.forEach(btn => {
    btn.addEventListener('click', () => mostrarPagina(btn.dataset.target));
  });

  // Enlaces del menú lateral y tarjetas "Ver curso"
  cursoLinks.forEach(el => {
    el.addEventListener('click', (ev) => {
      ev.preventDefault();
      mostrarPagina(el.dataset.target);
    });
  });

  // Acordeón de cursos
  document.querySelectorAll('[data-toggle-curso]').forEach(btn => {
    btn.addEventListener('click', () => {
      const contenedorCurso = btn.closest('.curso');
      const yaAbierto = contenedorCurso.classList.contains('abierto');
      document.querySelectorAll('.curso').forEach(c => c.classList.remove('abierto'));
      if (!yaAbierto) contenedorCurso.classList.add('abierto');
    });
  });

  // Dropdown "Otros enlaces"
  const btnEnlaces  = document.getElementById('btnEnlaces');
  const menuEnlaces = document.getElementById('menuEnlaces');
  btnEnlaces.addEventListener('click', () => {
    const abierto = menuEnlaces.classList.toggle('abierto');
    btnEnlaces.setAttribute('aria-expanded', abierto);
  });
  document.addEventListener('click', (ev) => {
    if (!ev.target.closest('.dropdown')) menuEnlaces.classList.remove('abierto');
  });

  // Menú lateral colapsable en móvil
  const btnLateral  = document.getElementById('btnLateral');
  const menuLateral = document.getElementById('menuLateral');
  if (btnLateral) {
    btnLateral.addEventListener('click', () => menuLateral.classList.toggle('visible'));
  }

  // Soporte de enlaces directos con #hash (ej. compartir un enlace a una clase)
  const inicial = window.location.hash.replace('#', '');
  if (inicial && document.getElementById('pagina-' + inicial)) {
    mostrarPagina(inicial);
  } else {
    mostrarPagina('inicio');
  }
});
</script>

</body>
</html>