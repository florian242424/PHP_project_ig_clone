<?php ob_start(); ?>
<h2>Login</h2>
<?php if(isset($error)): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
<form method="post" action="index.php">
    <input type="hidden" name="action" value="authenticate">
    <div class="mb-3"><label>Username</label><input type="text" name="username" class="form-control" required></div>
    <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
    <button class="btn btn-primary">Login</button>
</form>
<?php $content = ob_get_clean(); include 'views/layout.php'; ?>
