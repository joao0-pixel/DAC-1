<?php
require_once '../db/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header('Location: ../index.php');
        exit;
    } else {
        $error = "Usuário ou senha incorretos.";
    }
}
?>

<form method="POST" action="">
    <h2>Login</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <label for="username">Usuário:</label><br>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Senha:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Entrar</button>
</form>
