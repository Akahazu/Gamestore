<?php
include "config/db.php";

if (isset($_POST['register'])) {

    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    // Cek apakah email sudah digunakan
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Email sudah terdaftar!";
    } else {
        // Insert user baru (role default user)
        mysqli_query($conn, "INSERT INTO users (name, email, password, role) 
                             VALUES ('$name', '$email', '$pass', 'user')");
        header("Location: login.php");
        exit;
    }
}
?>

<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>

<div class="container mt-5">
    <h2>Register</h2>

    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php } ?>

    <form method="POST">
        <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required><br>

        <input type="email" name="email" class="form-control" placeholder="Email" required><br>

        <input type="password" name="password" class="form-control" placeholder="Password" required><br>

        <button class="btn btn-primary" name="register">Register</button>
    </form>

</div>

<?php include "includes/footer.php"; ?>
