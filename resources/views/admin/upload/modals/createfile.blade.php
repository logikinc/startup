{{-- Upload File Modal --}}
<div class="modal fade" id="modal-file-upload">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="/admin/upload/file"
            class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="folder" value="{{ $folder }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            ×
          </button>
          <h4 class="modal-title">{{ trans('startup.pages.admin_uploads.upload_new') }}</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="file" class="col-sm-3 control-label">
              {{ trans('startup.pages.admin_uploads.file') }}
            </label>
            <div class="col-sm-8">
              <input type="file" id="file" name="file">
            </div>
          </div>
          <div class="form-group">
            <label for="file_name" class="col-sm-3 control-label">
              {{ trans('startup.pages.admin_uploads.optional') }}
            </label>
            <div class="col-sm-4">
              <input type="text" id="file_name" name="file_name"
                     class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-upload"></i> {{ trans('startup.pages.admin_uploads.upload_file') }}
          </button>            
          <button type="button" class="btn btn-default" data-dismiss="modal">
            <i class="fa fa-close" aria-hidden="true"></i> {{ trans('startup.cancel') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</div>