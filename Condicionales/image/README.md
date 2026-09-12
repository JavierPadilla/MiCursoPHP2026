# Venta al Crédito – Ejemplo MVC (HTML + CSS + PHP)

Aplicación web sencilla que permite vender un producto al crédito,
calculando el subtotal y el detalle de cuotas (letras) a pagar.

## Estructura (patrón MVC)

```
mvc-tienda/
├── app/
│   ├── models/
│   │   ├── Producto.php      -> Catálogo de productos (datos)
│   │   └── Venta.php         -> Reglas de negocio: subtotal y cálculo de cuotas
│   ├── controllers/
│   │   └── VentaController.php -> Coordina Modelo <-> Vista, valida entradas
│   └── views/
│       └── venta.php         -> Formulario HTML (presentación)
├── public/
│   ├── index.php             -> Front Controller (único punto de entrada)
│   ├── css/style.css
│   └── js/venta.js           -> Llamadas AJAX al front controller
└── README.md
```

- **Modelo**: `Producto` guarda el catálogo (Lavadora $1500, Refrigerador
  $3500, Radiograbadora $500, Tostadora $150). `Venta` calcula el subtotal
  (precio × cantidad) y reparte ese subtotal en N cuotas iguales, ajustando
  la última cuota para que la suma cuadre exactamente con el subtotal.
- **Controlador**: `VentaController` recibe los datos (del front controller),
  valida (producto exista, cantidad > 0, número de cuotas > 0) y delega
  el cálculo a los modelos.
- **Vista**: `venta.php` solo pinta el formulario y recibe la lista de
  productos ya cargada por el controlador; no contiene lógica de negocio.
- **Front Controller**: `public/index.php` es la única puerta de entrada.
  Si la petición trae `action=calcular_subtotal` o `action=calcular_cuotas`
  responde JSON (para las llamadas AJAX de `venta.js`); en cualquier otro
  caso, renderiza la vista con el listado de productos.

## Flujo de uso

1. El usuario selecciona un **producto** → JS toma el precio desde el
   atributo `data-precio` de la opción seleccionada y lo muestra en el
   cuadro de texto (no requiere ir al servidor).
2. Ingresa la **cantidad** y presiona **Calcular** → JS hace un POST a
   `index.php?action=calcular_subtotal`, el controlador crea una `Venta`
   y devuelve el subtotal en JSON.
3. Al elegir el **número de cuotas**, JS hace un POST a
   `index.php?action=calcular_cuotas`; el controlador vuelve a calcular
   la venta y devuelve el arreglo de cuotas con su monto, que se pinta
   en una tabla.

## Cómo ejecutarlo

Requiere PHP 7.4+ instalado.

```bash
cd mvc-tienda
php -S localhost:8000 -t public
```

Luego abre `http://localhost:8000` en el navegador.

## Notas / posibles extensiones

- Los productos están precargados en el modelo (simulando una tabla);
  para producción bastaría con cambiar `Producto::obtenerListaProductos()`
  por una consulta a base de datos (PDO), sin tocar el controlador ni la vista.
- El reparto de cuotas es en partes iguales, sin interés. Si la tienda
  cobra interés, se agregaría esa regla dentro de `Venta::calcularCuotas()`.
- Se puede añadir un campo de fecha inicial para mostrar también la fecha
  de vencimiento de cada letra.
