{{-- View Image Modal --}}
<div class="modal fade" id="modal-image-view">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">{{ trans('startup.pages.admin_uploads.image_prew') }}</h4>
      </div>
      <div class="modal-body">
        <img id="preview-image" src="x" class="img-responsive">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
         <i class="fa fa-close" aria-hidden="true"></i> {{ trans('startup.cancel') }}
        </button>
      </div>
    </div>
  </div>
</div>