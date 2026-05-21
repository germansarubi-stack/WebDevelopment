################################################# DataBase conexion #####################################################################
# Sistema de Gestión de Clientes (ABM) 👥💼

Un sistema web clásico de tipo **ABM** (Alta, Baja y Modificación) o **CRUD** para la administración de clientes. El proyecto utiliza una 
arquitectura limpia en **PHP** estructurada con programación orientada a objetos (POO), persistencia de datos mediante **PDO**, una 
interfaz responsiva construida con **Bootstrap 5** y dinamismo en el cliente mediante **JavaScript**.

---

## 📋 Características del Proyecto

* **Listar Clientes:** Consulta en tiempo real que trae de forma dinámica todos los registros almacenados en la base de datos a una tabla 
interactiva.
* **Insertar (Alta):** Formulario con validaciones básicas de tipos de datos para agregar nuevos registros.
* **Actualizar (Modificación):** Permite editar cualquier campo del cliente seleccionado de manera precisa.
* **Eliminar (Baja):** Borrado físico del registro en la base de datos utilizando su identificador único.
* **Carga Dinámica (JS):** Al hacer clic en el botón de una fila, los datos del cliente se transfieren instantáneamente a los campos del 
formulario para agilizar las acciones de edición o borrado sin recargar la página.

---

## 🛠️ Tecnologías y Herramientas

* **Backend:** PHP 8.x (Programación Orientada a Objetos y PDO).
* **Base de Datos:** MySQL / MariaDB (Driver `mysql:host;port=3306`).
* **Frontend:** HTML5, JavaScript (Vanilla JS para manipulación del DOM) y Bootstrap 5.1 (para el diseño e interfaz de usuario).

---

## 📂 Estructura de Archivos

* **`Index.php`:** La interfaz de usuario principal. Contiene el formulario de entrada de datos, la tabla de visualización que consume el 
backend y el script de JavaScript para la selección de filas.
* **`CClientes.php`:** Controlador y clase `Clientes`. Contiene los métodos estáticos (`listarClientes`, `insertarCliente`, 
`actualizarCliente`, `eliminarCliente`) encargados de procesar las peticiones del formulario a través de métodos `POST`.
* **`conexion.php`:** Clase de abstracción de base de datos encargada de centralizar la conexión mediante un bloque `try-catch` y 
retornar la instancia activa de `PDO`.
* **`TABLA_CLIENTES (2).sql`:** Script SQL con la estructura exacta de la tabla `clientes`, índices primarios y únicos, configuraciones 
de autoincremento y un volcado de datos iniciales para pruebas.

---

## 🗄️ Modelo de Datos (Esquema SQL)

La base de datos se denomina `tp3_abm_clientes` y contiene una única tabla llamada `clientes` con la siguiente estructura:

* `clinete_ID` (INT, Clave Primaria, Autoincremental)
* `nombre` (VARCHAR 100, Obligatorio)
* `apellido` (VARCHAR 100, Obligatorio)
* `email` (VARCHAR 100, Único)
* `telefono` (VARCHAR 20)
* `direccion` (VARCHAR 255)
* `fecha_alta` (TIMESTAMP, Inicializado por defecto con el tiempo actual del servidor)

---

## 🚀 Instalación y Despliegue Local (con XAMPP)

Para poner en marcha este proyecto de manera local, utilizaremos **XAMPP** como entorno de desarrollo Apache y MySQL. Sigue estos pasos:

### 1. Ubicación del Proyecto
1. Descarga o clona este repositorio.
2. Mueve la carpeta completa del proyecto dentro del directorio raíz de servidores de XAMPP:
   * En **Windows**: `C:\xampp\htdocs\`
   * En **Linux / Ubuntu**: `/opt/lampp/htdocs/`
   * En **macOS**: `/Applications/XAMPP/xamppfiles/htdocs/`

*Nota: Se recomienda nombrar la carpeta como `abm-clientes` para que la estructura coincida con las URLs por defecto.*

### 2. Levantar los Servicios
Abre el **XAMPP Control Panel** e inicia los siguientes módulos haciendo clic en **Start**:
* **Apache** (Servidor Web)
* **MySQL** (Motor de Base de Datos)

### 3. Importar la Base de Datos
1. Abre tu navegador web favorito e ingresa a **phpMyAdmin**: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. En el menú de la izquierda, haz clic en **Nueva** para crear una base de datos.
3. Asígnale el nombre exacto de: `tp3_abm_clientes`.
4. Selecciona la base de datos recién creada, dirígete a la pestaña **Importar** (en la parte superior) y selecciona el archivo 
`TABLA_CLIENTES (2).sql` que se encuentra en la raíz de este proyecto.
5. Haz clic en el botón **Importar** o **Continuar** al final de la página.

### 4. Configuración de Credenciales (Opcional)
Por defecto, el script de conexión viene configurado para los parámetros estándar de XAMPP (`root` y sin contraseña). Si modificaste la 
seguridad de tu entorno local, edita las credenciales al inicio del archivo `conexion.php`:
```php
$host = "localhost";
$dbname = "tp3_abm_clientes";
$usurname = "TU_USUARIO_XAMPP";
$password = "TU_CONTRASEÑA_XAMPP";

### 5. Acceso al Sistema
Una vez completados los pasos anteriores, abre tu navegador e ingresa a la siguiente URL para usar la aplicación:
http://localhost/abm-clientes/Index.php

## 🔒 Buenas Prácticas Implementadas
Consultas Preparadas (Prepared Statements): El uso de $query->prepare() junto con bindParam() asegura que los datos de entrada pasen por 
un proceso de sanitización, previniendo ataques de Inyección SQL (SQLi).

Manejo de Errores Robustos: El puente de conexión implementa la captura de excepciones mediante PDOException, asegurando que los fallos 
del motor de base de datos no expongan variables sensibles del entorno.


#################################################### DataBase Json ##################################################################
# Consulta de Usuarios MySQL a Formato JSON (AJAX) 🌐🔗

Este proyecto es una aplicación web interactiva que permite consultar de manera dinámica la información de usuarios/personas almacenada 
en una base de datos **MySQL**, procesarla en el servidor mediante **PHP (PDO)** y retornar las filas mapeadas directamente en formato 
estructurado **JSON**. 

La principal ventaja del sistema es que la comunicación se realiza de forma asíncrona a través de **AJAX (jQuery)**, evitando la recarga 
innecesaria del navegador para ofrecer una experiencia fluida.

---

## 📋 Características del Proyecto

* **Consulta Asíncrona:** Utiliza peticiones `GET` mediante el método `$.ajax` de jQuery para solicitar los datos en segundo plano.
* **Procesamiento de Datos:** El servidor filtra el registro por el ID solicitado, construye un array asociativo y lo codifica nativamente
como un objeto JSON (`json_encode`).
* **Visualización Dinámica:** Incluye una interfaz limpia utilizando **Bootstrap 5** y un área de texto (`<textarea>`) donde se renderiza 
la respuesta JSON cruda recibida desde el backend.
* **Manejo de Estados:** Muestra un mensaje temporal de *"Procesando, espere por favor..."* mientras la base de datos resuelve la consulta.

---

## 🛠️ Tecnologías y Librerías Utilizadas

* **Backend:** PHP 8.x utilizando Programación Orientada a Objetos y **PDO (PHP Data Objects)**.
* **Base de Datos:** MySQL / MariaDB (Driver orientado a `mysql:host;dbname`).
* **Frontend:** HTML5, **Bootstrap 5.2** (UI/Estilos), **jQuery 1.x** (Librería para la abstracción de llamadas AJAX).

---

## 📂 Estructura del Proyecto

* **`index.php`:** Contiene la interfaz de usuario con el formulario de búsqueda, el contenedor del resultado y la función en JavaScript 
`buscarID(Id)` encargada de despachar la petición AJAX hacia el backend.
* **`conectar.php`:** Clase de abstracción de datos (`Conexion`). Se encarga de levantar el puente seguro mediante PDO configurando la 
codificación de caracteres en UTF-8 y expone la lógica que procesa el parámetro `id`, ejecuta la sentencia preparada y devuelve el 
resultado parseado en JSON.
* **`TP4_SQL_Tabla_Personas.sql`:** Script estructurado con la creación de la base de datos `tp4_personas`, la tabla `personas` con sus 
restricciones correspondientes y un volcado de registros de prueba (DNI, Nombre, Apellido, Edad, Email, Telefono).

---

## 🚀 Instalación y Despliegue Local (con XAMPP)

Sigue estas instrucciones para desplegar y probar la aplicación en tu entorno local de desarrollo:

### 1. Ubicación de los Archivos
1. Descarga o clona este repositorio.
2. Mueve la carpeta del proyecto dentro del directorio raíz de servidores web de tu entorno **XAMPP**:
   * En **Windows**: `C:\xampp\htdocs\consulta-json\`
   * En **Linux / Ubuntu**: `/opt/lampp/htdocs/consulta-json\`
   * En **macOS**: `/Applications/XAMPP/xamppfiles/htdocs/consulta-json\`

### 2. Levantar los Servicios en XAMPP
Abre el **XAMPP Control Panel** e inicia los siguientes módulos principales:
* **Apache** (Servidor HTTP)
* **MySQL** (Motor de Base de Datos)

### 3. Importar la Base de Datos
1. Abre tu navegador web favorito e ingresa al gestor **phpMyAdmin**: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. En el panel izquierdo, haz clic en **Nueva** para crear una base de datos limpia.
3. Asígnale el nombre exacto de: `tp4_personas`.
4. Selecciónala de la lista, dirígete a la pestaña **Importar** en el menú superior, y carga el archivo `TP4_SQL_Tabla_Personas.sql` 
ubicado en la raíz del proyecto.
5. Presiona el botón **Importar** o **Continuar** al final de la página.

### 4. Verificación de Credenciales
* **Servidor:** `localhost`
* **Base de Datos:** `tp4_personas`
* **Usuario:** `TU_USUARIO`
* **Contraseña:** `TU_CONSTRASEÑA`

*Si modificaste las credenciales de seguridad predeterminadas en tu servidor MySQL, edita las constantes `servidor`, `nombre_bd`, 
`usuario` o `password` dentro de la función `Conectar()` del archivo `conectar.php`.*

### 5. Ejecución en el Navegador
Una vez configurado, accede al sistema escribiendo la siguiente dirección URL en tu barra de direcciones:
```text
http://localhost/consulta-json/index.php

## 💻 Ejemplo de Uso y Respuesta
Ingresa un ID numérico válido en el campo del formulario (por ejemplo: 1).

Haz clic en el botón "Obtener JSON".

El sistema devolverá asíncronamente en el cuadro de texto un formato limpio como el siguiente:
JSON
[
  {
    "id": "1",
    "DNI": "75931695432",
    "nombre": "Jose",
    "apellido": "Perez",
    "edad": "32",
    "email": "joseperez@gmail.com",
    "telefono": "235935618952"
  }
]

################################################ from php ######################################################################
Aquí tienes una propuesta completa de README.md estructurada específicamente para este nuevo proyecto (que maneja validación de datos, 
persistencia de sesiones y transferencia de estados mediante cookies en PHP), listo para documentar tu repositorio de GitHub y adaptado 
para el despliegue en XAMPP.

Markdown
# Sistema de Login y Formulario con Persistencia de Sesión 🔐📝

Este proyecto es una aplicación web interactiva en **PHP** que demuestra el control de accesos, la validación segura de datos en el 
servidor mediante expresiones regulares (Regex), y la persistencia de estados de usuario utilizando variables de sesión 
(`$_SESSION`) y configuración personalizada de ciclo de vida de cookies.

---

## 📋 Características del Proyecto

* **Validación de Datos con Regex:** El script valida estrictamente del lado del servidor que el nombre ingresado contenga únicamente 
letras mediante `preg_match('/^[a-zA-Z]+$/u', $nombre)`.
* **Persistencia de Sesión:** Configura las sesiones de PHP para que tengan una duración extendida en el navegador de 24 horas 
(`'cookie_lifetime' => 86400`), permitiendo mantener al usuario autenticado.
* **Control de Acceso Seguro:** El formulario principal está protegido; si un usuario intenta ingresar directamente sin haber iniciado 
sesión, es redirigido automáticamente a la pantalla de login.
* **Interfaz Limpia y Responsiva:** Toda la capa visual está diseñada con **Bootstrap 5.3**, utilizando componentes de tarjetas 
(*cards*), validaciones visuales de formulario y fondos con opacidad suavizada.

---

## 🛠️ Tecnologías y Librerías Utilizadas

* **Backend:** PHP 8.x (Manejo de Sesiones Nativas y Post-Redirect-Get).
* **Frontend:** HTML5, CSS Nativo y **Bootstrap 5.3** (a través de CDN para estilos y componentes dinámicos).

---

## 📂 Estructura del Proyecto

* **`Input.php`:** Actúa como la pantalla de inicio de sesión (*Login*). Captura el nombre del usuario, ejecuta la validación por 
expresiones regulares, inicia la sesión si los datos son correctos y redirige al formulario. También se encarga de imprimir los mensajes 
de error correspondientes.
* **`Formulario.php`:** Es la página protegida que recupera la sesión activa. Contiene el formulario secundario de captura de datos 
(Email y Teléfono con placeholders informativos) y renderiza en pantalla un resumen de los datos procesados mediante el método 
`POST`.

---

## 🚀 Instalación y Despliegue Local (con XAMPP)

Sigue estas sencillas instrucciones para desplegar y probar la aplicación en tu entorno de desarrollo local:

### 1. Ubicación de los Archivos
1. Descarga o clona este repositorio.
2. Mueve la carpeta completa del proyecto dentro del directorio raíz de servidores web de tu entorno **XAMPP**:
   * En **Windows**: `C:\xampp\htdocs\control-sesiones\`
   * En **Linux / Ubuntu**: `/opt/lampp/htdocs/control-sesiones\`
   * En **macOS**: `/Applications/XAMPP/xamppfiles/htdocs/control-sesiones\`

### 2. Levantar los Servicios en XAMPP
Abre el **XAMPP Control Panel** e inicia el siguiente módulo principal:
* **Apache** (Servidor HTTP)
* *Nota: Este proyecto no requiere conexión a bases de datos MySQL, por lo que solo basta con encender Apache.*

### 3. Ejecución en el Navegador
Una vez que el servicio esté corriendo, accede al sistema escribiendo la siguiente dirección URL en la barra de navegación:
```text
http://localhost/control-sesiones/Input.php

## 💻 Flujo de Funcionamiento del Sistema
Paso 1 (Inicio de Sesión): El usuario ingresa su nombre en Input.php. Si contiene números o caracteres especiales, el sistema 
intercepta la petición y muestra el aviso: "El nombre debe contener solo letras.".

Paso 2 (Redirección Seguro): Al pasar la validación, los datos se guardan en el arreglo superglobal $_SESSION['nombre'] y se le 
redirige de forma transparente hacia Formulario.php.

Paso 3 (Formulario y Resumen): En Formulario.php, el usuario visualiza un saludo personalizado con su nombre recuperado de la sesión y 
puede completar los campos de E-mail y Teléfono, cuyos resultados se procesan en la misma pantalla al presionar Enviar.

############################################### Login, table, form, links, home, iframe ##########################################
# Módulos de Desarrollo Web: Arquitectura Frontend y Persistencia en PHP 🌐🔐

Este repositorio reúne un conjunto integral de prácticas, maquetas de diseño e implementaciones lógicas que abarcan desde los fundamentos 
de la maquetación en **HTML5 y Bootstrap** hasta el desarrollo backend estructurado en **PHP 8.x**. El enfoque principal del proyecto es
demostrar el uso de buenas prácticas en interfaces responsivas, persistencia de estados de usuario mediante sesiones del lado del
servidor y control de accesos.

---

## 📋 Características de los Módulos

### 1. Núcleo Backend y Control de Sesiones (`PHP`)
* **Validación de Datos en Servidor:** Filtrado estricto mediante expresiones regulares (Regex) para garantizar el ingreso seguro de 
texto (alfabético únicamente).
* **Persistencia Avanzada:** Uso nativo de variables superglobales `$_SESSION` configurando un tiempo de vida extendido de las cookies a 
24 horas (`86400` segundos) para mantener al usuario autenticado.
* **Seguridad y Flujo de Navegación:** Implementación del patrón *Post-Redirect-Get* para evitar reenvíos de formularios y un sistema de 
control de accesos que redirige a los usuarios no autenticados a la pantalla de login.

### 2. Interfaces y Maquetación de Componentes (`HTML5 & Bootstrap`)
* **Plataforma de Salud Mental:** Maquetas dinámicas orientadas a clínicas estéticas/psicológicas que incluyen:
  * Formularios de admisión médica completos con controles avanzados (selectores de disponibilidad horaria y áreas de comentarios para 
  problemáticas).
  * Tablas de profesionales con diseño interactivo (`table-hover`, `table-striped`) y desborde controlado (`overflow-auto`).
  * Tarjetas de presentación de profesionales estilizadas (`card`).
* **Sistemas de Autenticación Visual:** Pantallas de login modernas optimizadas con librerías de iconos oficiales (`Bootstrap Icons`), 
selectores de persistencia (*Remember Me*) y botones integrados para autenticación de terceros (OAuth simulado con Google y Facebook).
* **Guías Fundamentales de HTML5:** Documentos de aprendizaje que explican detalladamente la semántica web (`<header>`, `<nav>`, 
`<section>`, `<article>`, `<aside>`, `<footer>`), anclajes internos de páginas, hipervínculos absolutos/relativos e inserción adaptativa
mediante `<iframe>`.

---

## 📂 Estructura del Repositorio

El proyecto se segmenta en las siguientes capas de desarrollo:

### 🗄️ Capa Lógica y Backend (PHP)
* **`Input.php`:** Pantalla de autenticación y lógica inicial. Valida el nombre del usuario mediante la expresión `/^[a-zA-Z]+$/u`. 
Si es correcto, inicia la sesión y redirige de forma segura.
* **`Formulario.php`:** Página protegida que recupera la sesión del usuario, procesa los datos complementarios 
(Contraseña, Ciudad, País, Email y Teléfono) a través del método `POST` y renderiza un resumen en pantalla limpiando los datos con 
`htmlspecialchars`.

### 🎨 Capa de Diseño y Maquetación (HTML5 / Bootstrap)
* **`Login1.html` y `Login.html`:** Vistas de inicio de sesión estilizadas que implementan paletas de colores suaves, sombras 
(`shadow`), bordes redondeados y componentes nativos de Bootstrap 4/5.
* **`Tabla.html`:** Interfaz interactiva que lista profesionales de la salud mental, sus orientaciones, especializaciones, horarios 
disponibles y enlaces de contacto directo.
* **`Formulario.html` (Bootstrap) y `card.html`:** Formularios responsivos de admisión para procesos de psicoterapia y tarjetas con 
bordes primarios para perfiles médicos.
* **`1_index.html`, `2_iframe.html`, `4_vinculos.html`, `5_formulario.html`, `6_formulario.html` y `inicio.html`:** Scripts didácticos 
esenciales que cubren todo el espectro de etiquetas HTML5, tipos de inputs (`color`, `range`, `datetime-local`), tablas con fondos 
personalizados, vinculaciones a correos mediante `mailto:` y hojas de estilo en cascada (`estilo.css`).

---

## 🚀 Instalación y Despliegue Local (con XAMPP)

Para ejecutar este entorno web de manera local, se utiliza **XAMPP** como servidor de desarrollo Apache. Sigue este procedimiento paso a 
paso:

### 1. Ubicación del Proyecto
1. Descarga el código fuente o clona este repositorio.
2. Mueve la carpeta completa del proyecto dentro del directorio de publicación de tu entorno **XAMPP**:
   * 📁 **Windows:** `C:\xampp\htdocs\desarrollo-web\`
   * 📁 **Linux / Ubuntu:** `/opt/lampp/htdocs/desarrollo-web\`
   * 📁 **macOS:** `/Applications/XAMPP/xamppfiles/htdocs/desarrollo-web\`

### 2. Inicialización de Servicios
1. Ejecuta el **XAMPP Control Panel**.
2. Inicia el módulo **Apache** haciendo clic en el botón **Start** (este proyecto gestiona la lógica en el servidor y las sesiones de 
forma nativa en archivos del sistema, por lo que no requiere bases de datos SQL para la autenticación básica).

### 3. Acceso desde el Navegador
Abre la URL correspondiente a la sección que desees inspeccionar en tu navegador web:

* **Para iniciar el flujo seguro de sesiones PHP:**
  ```text
  http://localhost/desarrollo-web/Input.php

Para visualizar la interfaz de profesionales y tablas Bootstrap:http://localhost/desarrollo-web/Tabla.html

Para revisar las guías estructurales de HTML5:http://localhost/desarrollo-web/1_index.html

## 🔐 Seguridad e Integridad de Datos en el Servidor
Protección contra Ataques XSS (Cross-Site Scripting): Toda la información inyectada por el usuario en los campos del formulario es 
sanitizada en el backend mediante htmlspecialchars(), evitando la ejecución de scripts maliciosos en el navegador.

Aislamiento de Sesiones: La directiva session_start restringe el acceso cruzado y encapsula la identidad del usuario únicamente 
mientras dure el ciclo de vida estipulado en la cookie del cliente.
