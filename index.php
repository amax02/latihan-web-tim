<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "elerning");

// Fungsi login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            // Jika data ditemukan, set session login
            $_SESSION['loggedin'] = true;
            header("Location: index.php"); // Redirect ke halaman index setelah login
            exit;
        } else {
            // Jika data tidak ditemukan, tampilkan pesan error
            $error = true;
        }
    }
}

// Fungsi logout
if (isset($_POST['logout'])) {
    // Hapus semua data session
    session_unset();
    session_destroy();
    // Redirect ke halaman login setelah logout
    header('Location: login.php');
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <!-- Form login -->
    <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) : ?>
        <form method="post" action="">
            <?php if (isset($error)) : ?>
                <p style="color: red; font-style: italic;">Username/password salah!</p>
            <?php endif; ?>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username"><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"><br><br>
            <input type="submit" name="submit" value="Login">
        </form>
    <?php else : ?>
        <!-- Tampilkan tabel data jika sudah login -->
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Nama</th>
                <th>UserName</th>
                <th>Password</th>
            </tr>

            <?php while ($usr = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $usr["nama"]  ?></td>
                    <td><?= $usr["username"]  ?></td>
                    <td><?= $usr["password"]  ?></td>
                </tr>
            <?php endwhile; ?>
        </table>

        <!-- Form logout -->
        <form method="post" action="">
            <button type="submit" name="logout">Logout</button>
        </form>
    <?php endif; ?>
</body>

</html>
