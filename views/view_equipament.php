<?php
require_once '../db/db.php';

$stmt = $pdo->query("SELECT * FROM equipment");
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
                    <td><?= htmlspecialchars($equipment['name']) ?></td>
                    <td><?= htmlspecialchars($equipment['type']) ?></td>
                    <td><?= htmlspecialchars($equipment['location']) ?></td>
                    <td><?= htmlspecialchars($equipment['power_watts']) ?></td>
                    <td><?= htmlspecialchars($equipment['responsible']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
