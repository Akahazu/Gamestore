<?php
session_start();
include "config/db.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$pass'");
    $data  = mysqli_fetch_assoc($query);

    if($data){
        $_SESSION['user'] = $data;
        header("Location: index.php");
    } else {
        $error = "Email atau password salah";
    }
}
?>
<?php include "includes/header.php"; ?>

<div class="container mt-5">
    <h2>Login</h2>
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
        <input type="email" name="email" class="form-control" placeholder="Email" required><br>
        <input type="password" name="password" class="form-control" placeholder="Password" required><br>
        <button class="btn btn-success" name="login">Login</button>
    </form>
</div>

<?php include "includes/footer.php"; ?>
