<?php
require_once '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipmento_id = $_POST['equipmento_id'];
    $data = $_POST['data'];
    $kwh = $_POST['kwh'];
    $observacoes = $_POST['observacoes'];

    $stmt = $pdo->prepare("INSERT INTO energy_consumo (equipmento_id, data, kwh, observacoes) VALUES (?, ?, ?, ?)");
    $stmt->execute([$equipmento_id, $data, $kwh, $observacoes]);
    echo "Consumo registrado com sucesso!";
}
?>

<form method="POST" action="">
    <h2>Registrar Consumo Mensal</h2>
    <label for="equipmento_id">Equipamento:</label><br>
    <input type="text" id="equipmento_id" name="equipmento_id" required><br>

    <label for="data">Data:</label><br>
    <input type="date" id="data" name="data" required><br>

    <label for="kwh">Consumo (kWh):</label><br>
    <input type="number" id="kwh" name="kwh" required><br>

    <label for="observacoes">Observações:</label><br>
    <textarea id="observacoes" name="observacoes"></textarea><br><br>

    <button type="submit">Registrar</button>
</form>
