<?php
include 'db.php';

// ========================
// CREAR NUEVO ACTOR
// ========================
if (isset($_POST['create'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $stmt = $conn->prepare("INSERT INTO actor (first_name, last_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $first_name, $last_name);
    $stmt->execute();
    $stmt->close();
    echo "<p>Actor creado ✅</p>";
}

// ========================
// ACTUALIZAR ACTOR
// ========================
if (isset($_POST['update'])) {
    $actor_id = $_POST['actor_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $stmt = $conn->prepare("UPDATE actor SET first_name = ?, last_name = ? WHERE actor_id = ?");
    $stmt->bind_param("ssi", $first_name, $last_name, $actor_id);
    $stmt->execute();
    $stmt->close();
    echo "<p>Actor actualizado ✅</p>";
}

// ========================
// ELIMINAR ACTOR
// ========================
if (isset($_POST['delete'])) {
    $actor_id = $_POST['actor_id'];

    $stmt = $conn->prepare("DELETE FROM actor WHERE actor_id = ?");
    $stmt->bind_param("i", $actor_id);
    $stmt->execute();
    $stmt->close();
    echo "<p>Actor eliminado ✅</p>";
}

// ========================
// LEER ACTORES
// ========================
$result = $conn->query("SELECT actor_id, first_name, last_name FROM actor");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Actores Sakila</title>
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

    <h2>Crear Actor</h2>
    <form method="POST" action="">
        <input type="text" name="first_name" placeholder="Nombre" required>
        <input type="text" name="last_name" placeholder="Apellido" required>
        <button type="submit" name="create">Crear</button>
    </form>

    <h2>Actualizar Actor</h2>
    <form method="POST" action="">
        <input type="number" name="actor_id" placeholder="ID Actor" required>
        <input type="text" name="first_name" placeholder="Nombre" required>
        <input type="text" name="last_name" placeholder="Apellido" required>
        <button type="submit" name="update">Actualizar</button>
    </form>

    <h2>Eliminar Actor</h2>
    <form method="POST" action="">
        <input type="number" name="actor_id" placeholder="ID Actor" required>
        <button type="submit" name="delete">Eliminar</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
