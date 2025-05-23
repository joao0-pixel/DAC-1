<?php
require_once '../db/db.php';

// Exemplo de logs. Em um sistema real, os logs seriam gravados automaticamente no banco.
$logs = [
    ['2025-05-22 14:00', 'admin', 'Adicionou novo equipamento.'],
    ['2025-05-22 14:30', 'technician', 'Registrou consumo mensal.'],
    ['2025-05-22 15:00', 'manager', 'Visualizou relatórios de consumo.']
];
?>

<h2>Histórico de Ações</h2>
<table border="1">
    <thead>
        <tr>
            <th>Data/Hora</th>
            <th>Usuário</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($logs)): ?>
            <tr>
                <td colspan="3">Nenhum log encontrado.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($logs as $log): ?>
                <tr>
                    <td><?= htmlspecialchars($log[0]) ?></td>
                    <td><?= htmlspecialchars($log[1]) ?></td>
                    <td><?= htmlspecialchars($log[2]) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
