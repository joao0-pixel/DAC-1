<?php
require_once '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $location = $_POST['location'];
    $power_watts = $_POST['power_watts'];
    $responsible = $_POST['responsible'];

    $stmt = $pdo->prepare("INSERT INTO equipment (name, type, location, power_watts, responsible) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $type, $location, $power_watts, $responsible]);
    echo "Equipamento registrado com sucesso!";
}
?>

<form method="POST" action="">
    <h2>Registrar Equipamento</h2>
    <label for="name">Nome:</label><br>
    <input type="text" id="name" name="name" required><br>

    <label for="type">Tipo:</label><br>
    <input type="text" id="type" name="type" required><br>

    <label for="location">Localização:</label><br>
    <input type="text" id="location" name="location" required><br>

    <label for="power_watts">Potência (Watts):</label><br>
    <input type="number" id="power_watts" name="power_watts" required><br>

    <label for="responsible">Responsável:</label><br>
    <input type="text" id="responsible" name="responsible" required><br><br>

    <button type="submit">Registrar</button>
</form>
