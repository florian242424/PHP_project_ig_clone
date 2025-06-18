<?php
use instagram_clone\models\User;require 'models/User.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">InstaClone</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Feed</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
          <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#uploadModal">Upload</a></li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav">
        <?php if(isset($_SESSION['user_id'])): 
          $user = User::findById($_SESSION['user_id']); ?>
          <li class="nav-item"><a class="nav-link" href="index.php?page=profile&user=<?php echo urlencode($user['username']); ?>"><?php echo htmlspecialchars($user['username']); ?></a></li>
          <li class="nav-item"><a class="nav-link" href="index.php?page=logout">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="index.php?page=login">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php?page=register">Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
