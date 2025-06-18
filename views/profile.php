<?php ob_start(); ?>
<h2><?php echo htmlspecialchars($user['username']); ?></h2>
<p><?php echo htmlspecialchars($user['bio']); ?></p>
<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != $user['id']): ?>
  <form method="post" action="index.php">
    <input type="hidden" name="action" value="<?php echo $isFollowing ? 'unfollow' : 'follow'; ?>">
    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
    <input type="hidden" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
    <button class="btn btn-<?php echo $isFollowing ? 'danger' : 'primary'; ?>"><?php echo $isFollowing ? 'Unfollow' : 'Follow'; ?></button>
  </form>
<?php endif; ?>
<div class="row mt-4">
<?php foreach($posts as $post): ?>
  <div class="col-4 mb-3"><img src="public/uploads/<?php echo htmlspecialchars($post['image_path']); ?>" class="img-fluid"></div>
<?php endforeach; ?>
</div>
<?php $content = ob_get_clean(); include 'views/layout.php'; ?>
