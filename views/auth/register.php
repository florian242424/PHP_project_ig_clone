<?php ob_start(); ?>
<h2>Register</h2>
<?php if(isset($error)): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
<form method="post" action="index.php">
    <input type="hidden" name="action" value="register">
    <div class="mb-3"><label>Username</label><input type="text" name="username" class="form-control" required></div>
    <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
    <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
    <div class="mb-3"><label>Confirm Password</label><input type="password" name="password_confirm" class="form-control" required></div>
    <button class="btn btn-primary">Register</button>
</form>
<?php $content = ob_get_clean(); include 'views/layout.php'; ?>
