{{-- Delete Folder Modal --}}
<div class="modal fade" id="modal-folder-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">Please Confirm</h4>
      </div>
      <div class="modal-body">
          Are you sure you want to delete the
          <kbd><span id="delete-folder-name1">folder</span></kbd>
          folder?
      </div>
      <div class="modal-footer">
        <form method="POST" action="/admin/settings/backup/folder">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="folder" value="{{ $folder }}">
          <input type="hidden" name="del_folder" id="delete-folder-name2">
          <button type="submit" class="btn btn-danger">
            <i class="fa fa-times-circle"></i> Delete Folder
          </button>          
          <button type="button" class="btn btn-default" data-dismiss="modal">
            <i class="fa fa-close" aria-hidden="true"></i> Cancel
          </button>
        </form>
      </div>
    </div>
  </div>
</div>