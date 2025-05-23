<?php
require_once '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipment_id = $_POST['equipment_id'];
    $date = $_POST['date'];
    $kwh = $_POST['kwh'];
    $observations = $_POST['observations'];

    $stmt = $pdo->prepare("INSERT INTO energy_consumption (equipment_id, date, kwh, observations) VALUES (?, ?, ?, ?)");
    $stmt->execute([$equipment_id, $date, $kwh, $observations]);
    echo "Consumo registrado com sucesso!";
}

$stmt = $pdo->query("SELECT id, name FROM equipment");
$equipments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<form method="POST" action="">
    <h2>Registrar Consumo Mensal</h2>
    <label for="equipment_id">Equipamento:</label><br>
    <select id="equipment_id" name="equipment_id" required>
        <?php foreach ($equipments as $equipment): ?>
            <option value="<?= $equipment['id'] ?>"><?= htmlspecialchars($equipment['name']) ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="date">Data:</label><br>
    <input type="date" id="date" name="date" required><br>

    <label for="kwh">Consumo (kWh):</label><br>
    <input type="number" id="kwh" name="kwh" required><br>

    <label for="observations">Observações:</label><br>
    <textarea id="observations" name="observations"></textarea><br><br>

    <button type="submit">Registrar</button>
</form>
