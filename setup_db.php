<?php
// Script para crear las tablas e insertar los datos iniciales automáticamente

$host = '127.0.0.1';
$dbname = 'db_grupo13sc';
$user = 'grupo13sc';
$password = 'grup013grup013*';

echo "<h2>Instalador de la Base de Datos (Agenda 3 Capas)</h2>";

$conn_string = "host=$host dbname=$dbname user=$user password=$password";
$dbconn = @pg_connect($conn_string);

if (!$dbconn) {
    die("<div style='color: red;'>Error de conexión: " . pg_last_error() . "</div>");
}

// Todo el código SQL que pasaste en el primer mensaje
$sql = "
CREATE TABLE IF NOT EXISTS persona
(
  per_cod char(14) PRIMARY KEY,
  per_nom char(150) NOT NULL,
  per_appm char(150) NOT NULL,
  per_prof char(100) NOT NULL,
  per_telf char(17) NOT NULL,
  per_cel char(17) NOT NULL,
  per_email char(50) UNIQUE NOT NULL,
  per_dir char(150) NOT NULL,
  per_fnac date NOT NULL,
  per_lnac char(150) NOT NULL,
  per_est boolean NOT NULL,
  per_create timestamp NOT NULL,
  per_update timestamp NOT NULL
);

CREATE TABLE IF NOT EXISTS grupo
(  
  grup_cod int PRIMARY KEY,
  grup_name char(50) UNIQUE NOT NULL,
  grup_descrip char(150) NOT NULL,
  grup_est boolean NOT NULL,
  grup_create timestamp NOT NULL,
  grup_update timestamp NOT NULL
);

CREATE TABLE IF NOT EXISTS permiso
(  
  per_cod char(14) NOT NULL,
  FOREIGN KEY(per_cod) REFERENCES persona(per_cod),
  grup_cod int NOT NULL,
  FOREIGN KEY(grup_cod) REFERENCES grupo(grup_cod),
  perm_pass char(14) NOT NULL,
  perm_fini date NOT NULL,
  perm_ffin date NOT NULL,
  perm_est boolean NOT NULL,
  perm_create timestamp NOT NULL,
  perm_update timestamp NOT NULL
);

-- Vaciamos primero por si acaso ejecutamos el script dos veces
TRUNCATE TABLE permiso, grupo, persona CASCADE;

/*Amigos*/
INSERT INTO persona VALUES ('3885821','Erick','Ureña Inarra','Estudiante','3885821','770-09255','ericksaurio@yahoo.com','Santos Dumont 5to anillo','1975-01-25','Santa Cruz',true , now(), now());
INSERT INTO persona VALUES ('4012065', 'Jose Manuel','Colque Paulasanz','Estudiante', '33522210', '710-99465','josemanuel@gmail.com', 'Av. 1ro de Mayo #1520', '1975-05-14','Santa Cruz',true,now(),now());
/*Propietario */
INSERT INTO persona VALUES ('3924689', 'Evans', 'Balcazar Veizaga', 'Estudiante', '33522310', '710-76685', 'evansbv@gmail.com','Av. Humberto S. R. #220', '1975-08-29','Puerto Suarez', true, now(),now());
INSERT INTO persona VALUES ('14085848', 'Axel', 'Mamani', 'Estudiante', '00000000', '00000000', 'axel@gmail.com','UAGRM', '2000-01-01','Santa Cruz', true, now(),now());

/*Grupos*/
INSERT INTO grupo VALUES (1,'Amigos','Actividades de Amigos', true, now(),now());
INSERT INTO grupo VALUES (2,'Propietario','Actividades del Propietario', true, now(),now());

/*Permisos Propietario*/
INSERT INTO permiso VALUES ('3924689',2,'654321','2021-01-01','2030-12-31', true, now(),now());
INSERT INTO permiso VALUES ('14085848',2,'14085848','2021-01-01','2030-12-31', true, now(),now());
/*Permisos Amigos*/
INSERT INTO permiso VALUES ('3885821',1,'123456','2021-01-01','2021-12-31', true, now(),now());
INSERT INTO permiso VALUES ('4012065',1,'123456','2021-01-01','2021-12-31', true, now(),now());
";

$result = pg_query($dbconn, $sql);

if ($result) {
    echo "<div style='color: green; font-weight: bold;'>¡ÉXITO! Las tablas (persona, grupo, permiso) se crearon correctamente y se insertaron los datos de prueba.</div>";
    echo "<p><a href='index.php'>Haz clic aquí para ir al Sistema (index.php) y hacer login</a></p>";
    echo "<p>Recuerda: El usuario de prueba es <b>3924689</b> y la contraseña es <b>654321</b></p>";
} else {
    echo "<div style='color: red;'>Error al crear las tablas: " . pg_last_error($dbconn) . "</div>";
}

pg_close($dbconn);
?>
