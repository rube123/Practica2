<?php
include 'db.php';

// Actualizar actor si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $actor_id = $_POST['actor_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $stmt = $conn->prepare("UPDATE actor SET first_name = ?, last_name = ? WHERE actor_id = ?");
    $stmt->bind_param("ssi", $first_name, $last_name, $actor_id);
    $stmt->execute();
    $stmt->close();
    echo "<p>Actor actualizado ✅</p>";
}

// Obtener todos los actores
$result = $conn->query("SELECT actor_id, first_name, last_name FROM actor");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actores Sakila</title>
</head>
<body>
    <h1>Tabla de Actores</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['actor_id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Actualizar Actor</h2>
    <form method="POST" action="">
        <input type="number" name="actor_id" placeholder="ID Actor" required>
        <input type="text" name="first_name" placeholder="Nombre" required>
        <input type="text" name="last_name" placeholder="Apellido" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
