# Proyecto Agenda Personal (Arquitectura de 3 Capas)

Este proyecto es una aplicación web desarrollada para la materia de **Tecnología Web (INF513)** en la UAGRM - FICCT. El objetivo principal es aplicar los conceptos de la **Arquitectura de 3 Capas** utilizando tecnologías clásicas de backend en PHP y abstracción de datos.

## 🏗️ Arquitectura de 3 Capas
El proyecto está estrictamente dividido en tres capas lógicas y físicas para asegurar el mantenimiento, seguridad y escalabilidad del código:

1.  **Capa de Presentación (Frontend):** 
    *   **Tecnología:** Smarty Templates (Archivos `.html` en la carpeta `/templates`).
    *   **Propósito:** Interfaz de usuario limpia, sin mezclar código HTML con lógica PHP. Implementa un diseño premium utilizando Vanilla CSS (estilo *Glassmorphism*).
2.  **Capa de Negocio (Controladores):**
    *   **Tecnología:** PHP Puro (Archivos en la raíz como `personas.php`, `pc_login.php`).
    *   **Propósito:** Gestiona las sesiones, validaciones, procesamiento de formularios y manejo seguro de archivos (subida de fotografías).
3.  **Capa de Datos (Backend):**
    *   **Tecnología:** PostgreSQL + ADOdb for PHP (`env.php`).
    *   **Propósito:** Capa de abstracción de base de datos que permite ejecutar consultas SQL seguras sin depender de una sintaxis rígida nativa, facilitando la migración entre gestores de bases de datos.

## 🚀 Funcionalidades
*   **Autenticación de Usuarios:** Login seguro con manejo de roles y sesiones (Propietarios vs. Amigos).
*   **Gestión de Contactos (CRUD):** 
    *   Listado de amigos.
    *   Registro de nuevas personas.
    *   Edición de datos de contactos.
*   **Subida de Archivos:** Integración de carga de fotografías de perfil (`.jpg`/`.png`) vinculadas mediante el identificador (C.I.) sin afectar el modelo estricto de la base de datos.
*   **Vistas Dinámicas:** Menús que se adaptan al nivel de permisos del usuario logueado.

## 🛠️ Tecnologías Utilizadas
*   PHP (Lógica del lado del servidor)
*   PostgreSQL (Motor de base de datos relacional)
*   ADOdb (Capa de abstracción de base de datos)
*   Smarty (Motor de plantillas HTML)
*   Vanilla CSS (Efectos Glassmorphism, Google Fonts "Outfit")

## ⚙️ Instalación y Configuración

1. **Configurar la Conexión a la BD:**
   Edita el archivo `env.php` con tus credenciales de PostgreSQL y la ruta del servidor:
   ```php
   $dbdriver = 'postgres';    
   $dbserver = '127.0.0.1';
   $dbuser = 'tu_usuario';
   $dbpassword = 'tu_password';
   ```

2. **Permisos de Carpetas (Linux/Servidor):**
   Para que el sistema funcione correctamente, es obligatorio otorgar permisos de escritura (chmod `777`) a las siguientes carpetas:
   *   `/fotos/` -> Para permitir la subida de imágenes de perfil.
   *   `/templates_c/` -> Carpeta requerida por Smarty para compilar las plantillas HTML.

3. **Creación de la Base de Datos:**
   Sube y ejecuta en el navegador el archivo `setup_db.php`. Este script creará automáticamente las tablas (`persona`, `grupo`, `permiso`) e insertará los usuarios iniciales. 
   *(Nota: Una vez insertados los datos, elimina este archivo por seguridad).*

## 👨‍💻 Autor
*   **Axel Mamani** - *Desarrollador* - Grupo 13SC - UAGRM FICCT
