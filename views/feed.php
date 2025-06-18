<?php use instagram_clone\models\Like;ob_start(); ?>
<div id="posts">
<?php foreach($posts as $post): ?>
  <div class="card mb-4">
    <div class="card-header"><strong><?php echo htmlspecialchars($post['username']); ?></strong></div>
    <img src="public/uploads/<?php echo htmlspecialchars($post['image_path']); ?>" class="card-img-top">
    <div class="card-body">
      <p><?php echo nl2br(htmlspecialchars($post['caption'])); ?></p>
      <button class="btn btn-outline-primary like-btn" data-post="<?php echo $post['id']; ?>">
        <?php echo Like::countByPost($post['id']); ?> ❤️
      </button>
    </div>
  </div>
<?php endforeach; ?>
</div>
<?php include 'views/upload_modal.php'; ?>
<?php $content = ob_get_clean(); include 'views/layout.php'; ?>
