document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.like-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const postId = this.dataset.post;
      fetch('index.php?page=like', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'action=like&post_id=' + postId
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          this.textContent = data.count + ' ❤️';
        }
      });
    });
  });
});
