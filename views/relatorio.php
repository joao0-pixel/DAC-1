<?php
require_once '../db/db.php';

$stmt = $pdo->query("
    SELECT e.name AS equipment_name, SUM(ec.kwh) AS total_kwh
    FROM energy_consumption ec
    JOIN equipment e ON ec.equipment_id = e.id
    GROUP BY e.name
    ORDER BY total_kwh DESC
");
$report = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Relatórios de Consumo</h2>
<table border="1">
    <thead>
        <tr>
            <th>Equipamento</th>
            <th>Total de Consumo (kWh)</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($report)): ?>
            <tr>
                <td colspan="2">Nenhum dado encontrado.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($report as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['equipment_name']) ?></td>
                    <td><?= htmlspecialchars($item['total_kwh']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
