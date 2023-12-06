<?php
session_start();

// Hapus semua data session
session_unset();
session_destroy();

// Redirect ke halaman index.php setelah logout
header('Location: home.php');
exit;
?>
