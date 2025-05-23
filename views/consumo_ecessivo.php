<?php
require_once '../db/db.php';

$threshold = 500; // Consumo máximo permitido
$stmt = $pdo->prepare("
    SELECT e.name AS equipment_name, ec.date, ec.kwh
    FROM energy_consumption ec
    JOIN equipment e ON ec.equipment_id = e.id
    WHERE ec.kwh > ?
    ORDER BY ec.date DESC
");
$stmt->execute([$threshold]);
$alerts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Alertas de Consumo Excessivo</h2>
<table border="1">
    <thead>
        <tr>
            <th>Equipamento</th>
            <th>Data</th>
            <th>Consumo (kWh)</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($alerts)): ?>
            <tr>
                <td colspan="3">Nenhum alerta de consumo encontrado.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($alerts as $alert): ?>
                <tr>
                    <td><?= htmlspecialchars($alert['equipment_name']) ?></td>
                    <td><?= htmlspecialchars($alert['date']) ?></td>
                    <td><?= htmlspecialchars($alert['kwh']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
