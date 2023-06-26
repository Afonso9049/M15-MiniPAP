<?php


/// Obtém o ID do usuário atual
$user_id = $_SESSION['user_id'];

// Verifica se o ID é igual a 0 e redireciona para a página correspondente
if ($user_id == 0) {
    header('Location: admin_page.php');
    exit();
} else {
    header('Location: user_page.php');
    exit();
}
?>