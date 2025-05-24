<?php
require_once '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $localizacao = $_POST['localizacao'];
    $power_watts = $_POST['power_watts'];
    $responsabilidade = $_POST['responsabilidade'];

    $stmt = $pdo->prepare("INSERT INTO equipmento (nome, tipo, localizacao, power_watts, responsabilidade) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $tipo, $localizacao, $power_watts, $responsabilidade]);
    echo "Equipamento registrado com sucesso!";
}
?>

<form method="POST" action="">
    <h2>Registrar Equipamento</h2>
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" required><br>

    <label for="tipo">Tipo:</label><br>
    <input type="text" id="tipo" name="tipo" required><br>

    <label for="localizacao">Localização:</label><br>
    <input type="text" id="localizacao" name="localizacao" required><br>

    <label for="power_watts">Potência (Watts):</label><br>
    <input type="number" id="power_watts" name="power_watts" required><br>

    <label for="responsabilidade">Responsável:</label><br>
    <input type="text" id="responsabilidade" name="responsabilidade" required><br><br>

    <button type="submit">Registrar</button>
</form>
