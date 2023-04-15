// Establecer la información de conexión a la base de datos
$servername = "localhost";
$username = "nombre_usuario";
$password = "contraseña";
$dbname = "nombre_base_de_datos";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Ejecutar una consulta SQL
$sql = "SELECT id, nombre, correo FROM usuarios";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los resultados
    $usuarios = array();

    // Recorrer los resultados y agregarlos al array
    while($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }

    // Convertir el array a formato JSON y mostrarlo en la pantalla
    echo json_encode($usuarios);
} else {
    echo "No hay resultados.";
}

// Cerrar la conexión
$conn->close();