<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testing";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Verifikasi jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses data yang dikirim dari form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Lakukan validasi data yang diterima
    if (!empty($name) && !empty($email) && !empty($username) && !empty($password)) {
        // Escape input untuk menghindari SQL injection
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $username = mysqli_real_escape_string($conn, $username);

        // Hash password sebelum disimpan ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Periksa apakah username atau email sudah ada dalam database (jika diperlukan)

        // Simpan data pengguna ke dalam database
        $sql = "INSERT INTO users (name, email, username, password) VALUES ('$name', '$email', '$username', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            // Jika data berhasil disimpan, arahkan pengguna ke halaman login atau halaman utama
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Semua field harus diisi!";
    }
}
$conn->close();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- Nav START -->
    <nav>
        <div class="container-fluid">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <div class="col-md-3 mb-2 mb-md-0">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                    </a>
                </div>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2">Features</a></li>
                    <li><a href="#" class="nav-link px-2">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2">About</a></li>
                </ul>

                <div class="col-md-3 text-end">
                    <a href="login.php"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>
                    <a href="register.php"><button type="button" class="btn btn-primary">Sign-up</button></a>
                </div>
            </header>
        </div>
    </nav>
    <!-- Nav END -->

    <!-- Contet START -->
    <section class="mt-5 container">
        <div class="row border">
            <div class="col-5 border">
                <div class="row">
                    <div class="col border">
                        <img src="assets/login.png" width="521.156" height="789" alt="">
                    </div>
                </div>
            </div>
            <div class="col-7 border ">
                <div class="row">
                    <div class="col-12 border text-center mt-5">
                        <p>Logo</p>
                    </div>
                    <div class="col-12 border text-center">
                        <p>Create an account</p>
                    </div>
                    <div class="col-12 border text-center">
                        <p>Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                    <div class="col-6 border text-center">
                        <p>For Frontend</p>
                    </div>
                    <div class="col-6 border text-center">
                        <p>For Backend</p>
                    </div>
                    <div class="col border">
                        <form method="post" action="register.php">
                            <div class="mt-5 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class=" mb-3 ">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <button type="submit" class="mt-4 btn btn-primary">Create an account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contest END -->


    <!-- Footer Start -->
    <footer class="container mt-5 py-5 ">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col-md-5 offset-md-1 mb-3">
                <form>
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>© 2023 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#twitter"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#instagram"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#facebook"></use>
                        </svg></a></li>
            </ul>
        </div>
    </footer>
    <!-- Footer End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>