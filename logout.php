<?php
session_start();
session_unset(); // Hapus semua data session
session_destroy(); // Hancurkan session

// Hapus cookie dengan menetapkan masa berlaku di masa lalu
setcookie('id', $userf['id'], time() - 3600, "/"); // Hapus cookie user_id
setcookie('uname', $userf['uname'], time() - 3600, "/"); // Hapus cookie user_name

// Redirect ke halaman login
header('Location: index.php?modul=login');
exit;
?>
