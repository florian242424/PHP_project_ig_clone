<div class="modal fade" id="uploadModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="index.php" enctype="multipart/form-data">
        <input type="hidden" name="action" value="upload">
        <div class="modal-header"><h5 class="modal-title">Neuen Beitrag hochladen</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
        <div class="modal-body">
          <div class="mb-3"><label>Bild</label><input type="file" name="image" accept="image/*" class="form-control" required></div>
          <div class="mb-3"><label>Beschreibung</label><textarea name="caption" class="form-control"></textarea></div>
        </div>
        <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button><button type="submit" class="btn btn-primary">Hochladen</button></div>
      </form>
    </div>
  </div>
</div>
