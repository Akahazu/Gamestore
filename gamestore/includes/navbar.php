<?php
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    
    <a class="navbar-brand" href="index.php">GameStore</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
        aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">

        <li class="nav-item">
          <a class="nav-link" href="games.php">Games</a>
        </li>

        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') { ?>
        <li class="nav-item">
          <a class="nav-link" href="admin/index.php">Admin Panel</a>
        </li>
        <?php } ?>

      </ul>

      <ul class="navbar-nav">

        <?php if (!isset($_SESSION['user'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <span class="nav-link">
                    Hi, <?= $_SESSION['user']['name']; ?>
                </span>
            </li>

            <li class="nav-item">
                <a class="nav-link text-danger" href="logout.php">Logout</a>
            </li>
        <?php } ?>

      </ul>
    </div>

  </div>
</nav>
