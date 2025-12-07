<?php
session_start();
if($_SESSION['user']['role'] != "admin"){
    header("Location: ../index.php");
}
include "../config/db.php";

$games = mysqli_query($conn, "SELECT * FROM games");
?>

<h2>Admin - Game Management</h2>
<a href="add_game.php" class="btn btn-success mb-3">Tambah Game</a>

<table class="table table-bordered">
<tr>
    <th>Title</th>
    <th>Price</th>
    <th>Aksi</th>
</tr>

<?php while($g = mysqli_fetch_assoc($games)) { ?>
<tr>
    <td><?= $g['title'] ?></td>
    <td><?= $g['price'] ?></td>
    <td>
        <a href="edit_game.php?id=<?= $g['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="delete_game.php?id=<?= $g['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
    </td>
</tr>
<?php } ?>

</table>
