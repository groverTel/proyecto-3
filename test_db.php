<?php
// Script para probar la conexión a la base de datos PostgreSQL en el servidor

$host = '127.0.0.1'; // En el servidor esto es localhost
$dbname = 'db_grupo13sc';
$user = 'grupo13sc';
$password = 'grup013grup013*'; // La contraseña que pusiste en env.php

echo "<h2>Prueba de Conexión a PostgreSQL</h2>";

// Intentamos la conexión nativa
$conn_string = "host=$host dbname=$dbname user=$user password=$password";
$dbconn = @pg_connect($conn_string);

if (!$dbconn) {
    echo "<div style='color: red; font-weight: bold;'>Error: No se pudo conectar a la base de datos.</div>";
    $error = error_get_last();
    echo "<p>Detalles del error: " . ($error ? $error['message'] : "Verifica tu usuario, contraseña y nombre de BD.") . "</p>";
} else {
    echo "<div style='color: green; font-weight: bold;'>¡Éxito! Conexión establecida correctamente a la base de datos '$dbname'.</div>";
    
    // Si conectó, veamos si la tabla 'persona' existe
    $query = "SELECT EXISTS (
                 SELECT FROM information_schema.tables 
                 WHERE table_schema = 'public' 
                 AND table_name = 'persona'
              );";
              
    $result = pg_query($dbconn, $query);
    if ($result) {
        $row = pg_fetch_row($result);
        if ($row[0] == 't') {
            echo "<p style='color: blue;'>La tabla <b>'persona'</b> SÍ EXISTE. ¡Todo está listo para que el sistema funcione!</p>";
        } else {
            echo "<p style='color: orange;'>La tabla <b>'persona'</b> NO EXISTE. Debes crearla ejecutando los comandos CREATE TABLE.</p>";
        }
    }
    
    pg_close($dbconn);
}
?>
