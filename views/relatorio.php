<?php
require_once '../db/db.php';

$stmt = $pdo->query("
    SELECT e.nome AS equipmento_nome, SUM(ec.kwh) AS total_kwh
    FROM energy_consumo ec
    JOIN equipmento e ON ec.equipmento_id = e.id
    GROUP BY e.nome
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
                    <td><?= htmlspecialchars($item['equipmento_nome']) ?></td>
                    <td><?= htmlspecialchars($item['total_kwh']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
