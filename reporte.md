# Reporte: Caso de Uso Modificar Amigos (Aplicación Agenda 3 Capas) - Práctica U4-4 SC

## Introducción
El desarrollo de aplicaciones web estructurado bajo la arquitectura de tres capas (Presentación, Negocio y Datos) proporciona una clara separación de responsabilidades, facilitando el mantenimiento y la escalabilidad del sistema. En esta **Práctica U4-4 SC**, se ha consolidado el caso de uso **"Modificar Amigos"** dentro del sistema de menú dinámico **MENU3C**, incorporando subida segura de imágenes y garantizando que los menús se mantengan consistentes de acuerdo a los roles de los usuarios autenticados.

## Detalles de la Implementación Realizada

1. **Capa de Presentación (Plantillas Smarty):**
   * **`personas-modificar.html`**: Se estructuró un formulario HTML que contiene los campos requeridos (nombre, apellidos, profesión, teléfono, celular, correo electrónico, dirección y fotografía de perfil) utilizando el atributo `enctype="multipart/form-data"` para la transferencia de archivos al servidor. El campo de C.I. se mantiene de solo lectura para preservar la integridad referencial.
   * **`personas-listar.html`**: Se modificó el listado para renderizar la columna "Foto" mostrando el avatar correspondiente de cada amigo. Se añadió un fallback por defecto (`onerror`) que apunta a `fotos/default.png` si no hay foto cargada, evitando enlaces rotos.
   * **Visualización Dinámica**: Se ajustaron las acciones visibles de la tabla según el nivel de privilegios. Los amigos regulares (`nivel == 1`) no pueden ver la opción de "Eliminar", que queda reservada únicamente para el propietario.

2. **Capa de Negocio (Controlador PHP - `personas.php`):**
   * **Consistencia del Menú**: Se refactorizó la inicialización del menú al inicio del script según el nivel de sesión (`$_SESSION['nivel']`). De esta forma, el menú lateral no desaparece ni se encoje al entrar a los formularios de visualización o edición, resolviendo problemas de usabilidad presentes en la versión anterior.
   * **Validación de Archivos (Subida Segura de Fotografía)**:
     - Se implementó la verificación de extensión de archivos (restringido a `.jpg`, `.jpeg`, `.png`).
     - Se incorporó la función nativa `getimagesize()` para validar que el contenido subido sea realmente una estructura de imagen legítima, previniendo ciberataques por inyección de scripts PHP maliciosos a través de extensiones falsas.
     - Se implementó la creación automática de la carpeta `./fotos/` con permisos de lectura/escritura (`0777`).
     - Se estandarizó el guardado del archivo bajo el formato `[per_cod].jpg` haciendo un recorte de espacios en blanco (`trim`) para solucionar los problemas del padding de tipo `CHAR` de PostgreSQL.
   * **Control de Acceso y Permisos**: Se agregaron guardias de seguridad en las secciones de edición (`case 3` y `case 30`). Si un Amigo común intenta alterar el C.I. de otro contacto a través de la URL o la solicitud HTTP, el sistema denegará la petición inmediatamente.

3. **Capa de Datos (ADOdb y PostgreSQL):**
   * El controlador en la capa de negocio interactúa con PostgreSQL mediante la capa de abstracción **ADOdb**. Se ejecuta la sentencia preparada de actualización `UPDATE persona SET ... WHERE per_cod = ...` de manera limpia.
   * Se aplicó una función recursiva de limpieza de datos en PHP (`trim_array`) para eliminar los espacios redundantes (padding) generados por el tipo de columna estricto `CHAR(150)` de la base de datos antes de mandar los datos a Smarty.

## Conclusiones
* **Separación de Niveles**: La aplicación del patrón de tres capas permitió introducir un flujo completo de subida y almacenamiento de imágenes y lógica de permisos sin necesidad de rediseñar las tablas de la base de datos o contaminar las vistas Smarty con consultas directas a SQL.
* **Seguridad y Usabilidad**: Agregar validaciones del lado del servidor (como `getimagesize` y restricción de modificación por sesión) y proveer interfaces con fallbacks de recursos (como la imagen por defecto `default.png` y menús estáticos robustos) convierten a la aplicación en un entorno seguro y profesional adecuado para implementarse en plataformas de producción.
