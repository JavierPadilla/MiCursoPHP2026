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
            [
                'titulo'    => 'Clase 1 · Estructura con HTML',
                'objetivo'  => 'Construir la estructura de un documento HTML usando etiquetas semánticas.',
                'desarrollo'=> [
                    'HTML organiza el contenido de una página en bloques con significado: un encabezado no es lo mismo que un párrafo, y un menú de navegación no es lo mismo que un pie de página. Usar la etiqueta correcta para cada cosa se llama HTML semántico, y ayuda tanto a los buscadores como a los lectores de pantalla a entender la página.',
                    'Todo documento HTML tiene un esqueleto fijo: <!DOCTYPE html>, <html>, <head> (metadatos, título, enlaces a CSS) y <body> (lo que se ve). Dentro del <body> es donde se organiza el contenido con etiquetas como <header>, <nav>, <main>, <section> y <footer>.',
                ],
                'ejemplos'  => [
                    [
                        'titulo' => 'Ejemplo 1 · Esqueleto básico de una página',
                        'codigo' => "<!DOCTYPE html>\n<html lang=\"es\">\n<head>\n  <meta charset=\"UTF-8\">\n  <title>Mi página</title>\n</head>\n<body>\n  <header>\n    <h1>Bienvenido</h1>\n  </header>\n  <main>\n    <p>Este es el contenido principal.</p>\n  </main>\n  <footer>\n    <p>© 2026</p>\n  </footer>\n</body>\n</html>",
                        'explicacion' => 'Nota cómo <header>, <main> y <footer> dividen la página en zonas con significado, en lugar de usar puros <div> genéricos.',
                    ],
                    [
                        'titulo' => 'Ejemplo 2 · Formulario simple',
                        'codigo' => "<form action=\"procesar.php\" method=\"post\">\n  <label for=\"nombre\">Nombre:</label>\n  <input type=\"text\" id=\"nombre\" name=\"nombre\" required>\n\n  <label for=\"correo\">Correo:</label>\n  <input type=\"email\" id=\"correo\" name=\"correo\" required>\n\n  <button type=\"submit\">Enviar</button>\n</form>",
                        'explicacion' => 'El atributo "for" del <label> debe coincidir con el "id" del <input> correspondiente: así, al hacer clic en la etiqueta, el cursor salta al campo.',
                    ],
                ],
            ],
            [
                'titulo'    => 'Clase 2 · Estilos con CSS',
                'objetivo'  => 'Dar estilo y organizar el espacio de una página usando el modelo de caja y Flexbox.',
                'desarrollo'=> [
                    'Cada elemento HTML es, para efectos de CSS, una caja rectangular. Esa caja tiene contenido, relleno interno (padding), borde (border) y espacio exterior (margin). Entender este "modelo de caja" es la base de cualquier maquetado en CSS.',
                    'Flexbox es un sistema pensado para acomodar elementos en una fila o columna, repartiendo el espacio entre ellos de forma flexible. Se activa con "display: flex" en el contenedor padre, y las propiedades como justify-content y align-items controlan cómo se distribuyen los hijos.',
                ],
                'ejemplos'  => [
                    [
                        'titulo' => 'Ejemplo 1 · Modelo de caja',
                        'codigo' => ".tarjeta {\n  padding: 16px;      /* espacio interno */\n  border: 1px solid #ccc;\n  margin: 12px;        /* espacio externo */\n  box-sizing: border-box; /* el padding y el borde ya no agrandan la caja */\n}",
                        'explicacion' => '"box-sizing: border-box" evita sorpresas: el ancho que definas incluirá el padding y el borde, en vez de sumarse aparte.',
                    ],
                    [
                        'titulo' => 'Ejemplo 2 · Barra de navegación con Flexbox',
                        'codigo' => ".barra {\n  display: flex;\n  justify-content: space-between;\n  align-items: center;\n  gap: 1rem;\n}",
                        'explicacion' => '"space-between" empuja el primer elemento al inicio y el último al final, dejando el espacio libre distribuido entre ellos — ideal para un logo a la izquierda y un menú a la derecha.',
                    ],
                ],
            ],
            [
                'titulo'    => 'Clase 3 · Interactividad con JavaScript',
                'objetivo'  => 'Reaccionar a las acciones del usuario y modificar la página sin recargarla.',
                'desarrollo'=> [
                    'JavaScript puede "escuchar" eventos del usuario —clics, teclas, envío de formularios— y ejecutar código en respuesta. Esto se hace con addEventListener, que conecta un elemento del DOM con una función que se ejecuta cuando ocurre el evento.',
                    'Para modificar la página, JavaScript accede al DOM (Document Object Model): una representación en memoria del HTML que se puede leer y cambiar. Métodos como document.querySelector() encuentran elementos, y propiedades como .textContent o .classList los modifican.',
                ],
                'ejemplos'  => [
                    [
                        'titulo' => 'Ejemplo 1 · Contador con un botón',
                        'codigo' => "let contador = 0;\nconst boton = document.querySelector('#sumar');\nconst salida = document.querySelector('#total');\n\nboton.addEventListener('click', () => {\n  contador++;\n  salida.textContent = contador;\n});",
                        'explicacion' => 'Cada clic ejecuta la función, incrementa la variable "contador" y actualiza el texto en pantalla — sin recargar la página.',
                    ],
                    [
                        'titulo' => 'Ejemplo 2 · Mostrar u ocultar un panel',
                        'codigo' => "const panel = document.querySelector('.panel');\ndocument.querySelector('#toggle').addEventListener('click', () => {\n  panel.classList.toggle('visible');\n});",
                        'explicacion' => '"classList.toggle" agrega la clase "visible" si no la tiene, o la quita si ya la tiene — la misma técnica que usa el menú lateral de este sitio.',
                    ],
                ],
            ],
            [
                'titulo'    => 'Clase 4 · Lógica de servidor con PHP',
                'objetivo'  => 'Usar variables y arreglos en PHP para generar HTML dinámico.',
                'desarrollo'=> [
                    'A diferencia de JavaScript, PHP se ejecuta en el servidor antes de que la página llegue al navegador. El resultado es HTML puro: el usuario nunca ve el código PHP, solo su resultado.',
                    'Un patrón muy común —el que usa este mismo sitio— es guardar datos en un arreglo de PHP y recorrerlo con foreach para generar HTML repetido (una tarjeta por curso, un enlace por clase) sin copiar y pegar el mismo bloque muchas veces.',
                ],
                'ejemplos'  => [
                    [
                        'titulo' => 'Ejemplo 1 · Variables dentro de HTML',
                        'codigo' => "<?php\n\$nombre = 'Ana';\n\$edad = 20;\n?>\n<p>Hola <?= \$nombre ?>, tienes <?= \$edad ?> años.</p>",
                        'explicacion' => 'La sintaxis "<?= ... ?>" es un atajo de "<?php echo ... ?>" para insertar un valor de PHP directamente en el HTML.',
                    ],
                    [
                        'titulo' => 'Ejemplo 2 · Recorrer un arreglo con foreach',
                        'codigo' => "<?php \$frutas = ['Manzana', 'Pera', 'Uva']; ?>\n<ul>\n  <?php foreach (\$frutas as \$fruta): ?>\n    <li><?= \$fruta ?></li>\n  <?php endforeach; ?>\n</ul>",
                        'explicacion' => 'Este es exactamente el mecanismo que genera la lista de clases y ejercicios en el menú lateral de tu página.',
                    ],
                ],
            ],
            [
                'titulo'    => 'Clase 5 · Taller de ejercicios en PHP',
                'objetivo'  => 'Aplicar variables, arreglos y foreach resolviendo ejercicios cortos.',
                'desarrollo'=> [
                    'Esta clase es práctica: se resuelven en vivo pequeños problemas usando solo lo visto en la Clase 4, para afianzar el uso de arreglos y foreach antes de pasar a temas más avanzados como formularios y bases de datos.',
                ],
                'ejemplos'  => [
                    [
                        'titulo' => 'Ejemplo 1 · Sumar los elementos de un arreglo',
                        'codigo' => "<?php\n\$numeros = [4, 8, 15, 16, 23];\n\$suma = 0;\nforeach (\$numeros as \$n) {\n    \$suma += \$n;\n}\necho \"La suma es: \$suma\";",
                        'explicacion' => '"\$suma += \$n" es un atajo de "\$suma = \$suma + \$n", y se repite una vez por cada número del arreglo.',
                    ],
                ],
            ],
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

  .ejemplo{
    max-width:680px; margin-top:1.1rem;
    border:1px solid var(--linea); border-radius:var(--radio); overflow:hidden;
  }
  .ejemplo-titulo{
    margin:0; padding:.6rem .9rem; background:var(--panel);
    font-weight:600; font-size:.85rem; border-bottom:1px solid var(--linea);
  }
  .ejemplo pre{
    margin:0; padding:1rem .9rem; background:var(--tinta); overflow-x:auto;
  }
  .ejemplo pre code{
    font-family:'JetBrains Mono', monospace; font-size:.8rem; line-height:1.55;
    color:#EDE7D6; white-space:pre;
  }
  .ejemplo-explicacion{
    margin:0; padding:.7rem .9rem; font-size:.85rem; color:var(--texto-suave);
    background:#fff;
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

          <?php if (isset($clase['desarrollo'])): ?>
            <!-- Formato "clase desarrollada": objetivo + párrafos + ejemplos de código -->
            <?php if (!empty($clase['objetivo'])): ?>
              <p class="lead"><strong>Objetivo:</strong> <?= htmlspecialchars($clase['objetivo']) ?></p>
            <?php endif; ?>

            <div class="caja">
              <?php foreach ($clase['desarrollo'] as $parrafo): ?>
                <p><?= htmlspecialchars($parrafo) ?></p>
              <?php endforeach; ?>
            </div>

            <?php if (!empty($clase['ejemplos'])): ?>
              <h3 style="margin-top:1.8rem;">Ejemplos</h3>
              <?php foreach ($clase['ejemplos'] as $ejemplo): ?>
                <div class="ejemplo">
                  <p class="ejemplo-titulo"><?= htmlspecialchars($ejemplo['titulo']) ?></p>
                  <pre><code><?= htmlspecialchars($ejemplo['codigo']) ?></code></pre>
                  <?php if (!empty($ejemplo['explicacion'])): ?>
                    <p class="ejemplo-explicacion"><?= htmlspecialchars($ejemplo['explicacion']) ?></p>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

          <?php else: ?>
            <!-- Formato viejo, de una sola frase: se sigue soportando -->
            <div class="caja"><p><?= htmlspecialchars($clase['contenido']) ?></p></div>
          <?php endif; ?>
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
