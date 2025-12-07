<?php 
include "includes/header.php";
include "includes/navbar.php";
include "config/db.php";

$games = mysqli_query($conn, "SELECT * FROM games");
?>

<div class="container mt-5">
    <h2>Daftar Game</h2>
    <div class="row">
        <?php while($g = mysqli_fetch_assoc($games)) { ?>
            <div class="col-md-3 mt-4">
                <div class="card">
                    <img src="assets/img/<?= $g['image'] ?>" class="card-img-top">
                    <div class="card-body">
                        <h5><?= $g['title'] ?></h5>
                        <p>Rp <?= number_format($g['price']) ?></p>
                        <a href="order.php?id=<?= $g['id'] ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include "includes/footer.php"; ?>
