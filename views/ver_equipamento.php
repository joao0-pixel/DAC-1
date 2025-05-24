<?php
require_once '../db/db.php';

$stmt = $pdo->query("SELECT * FROM equipmento");
$equipments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Lista de Equipamentos</h2>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Localização</th>
            <th>Potência (Watts)</th>
            <th>Responsável</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($equipments)): ?>
            <tr>
                <td colspan="6">Nenhum equipamento encontrado.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($equipments as $equipment): ?>
                <tr>
                    <td><?= htmlspecialchars($equipment['id']) ?></td>
                    <td><?= htmlspecialchars($equipment['nome']) ?></td>
                    <td><?= htmlspecialchars($equipment['tipo']) ?></td>
                    <td><?= htmlspecialchars($equipment['localizacao']) ?></td>
                    <td><?= htmlspecialchars($equipment['power_watts']) ?></td>
                    <td><?= htmlspecialchars($equipment['responsabilidade']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
