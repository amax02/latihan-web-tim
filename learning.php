<?php
session_start();

// Cek apakah session 'loggedIn' tidak ada atau tidak aktif
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    // Redirect ke halaman login jika belum login
    header('Location: login.php');
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "db_kita"); // Pastikan nama database sesuai
$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'"); // Ambil data pengguna yang sesuai dengan username yang sedang login
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning</title>
</head>

<body>
    <h1>Halaman E-Learning</h1>

    <!-- Tampilkan data jika sudah login -->
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Nama</th>
            <th>UserName</th>
            <th>Password</th>
        </tr>

        <?php while ($usr = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $usr["name"]  ?></td>
                <td><?= $usr["username"]  ?></td>
                <td><?= $usr["password"]  ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <p><a href="logout.php">Logout</a></p>
</body>

</html>