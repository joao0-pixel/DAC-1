<?php
require_once '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $password, $role])) {
        header('Location: login.php');
        exit;
    } else {
        $error = 'Erro ao registrar usuário.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro - ByteGreen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Registro</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Usuário:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="role">Perfil:</label>
        <select name="role" id="role" required>
            <option value="admin">Administrador</option>
            <option value="technician">Técnico</option>
            <option value="manager">Gestor</option>
        </select>
        <br>
        <button type="submit">Registrar</button>
    </form>
    <a href="login.php">Voltar para login</a>
</body>
</html>
