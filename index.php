<?php
$conn = mysqli_connect("localhost", "root", "", "elerning");
$result = mysqli_query($conn, "SELECT * FROM users");


// $user = mysqli_fetch_assoc($result);
// var_dump($user);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
            <th>Nama</th>
            <th>UserName</th>
            <th>Password</th>
    </tr>
    
    <?php while($usr = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $usr["nama"]  ?></td>
            <td><?= $usr["username"]  ?></td>
            <td><?= $usr["password"]  ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    </body>
</html>