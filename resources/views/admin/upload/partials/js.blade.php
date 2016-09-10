    <script type="text/javascript">
        function delete_file(name) {
            $("#delete-file-name1").html(name);
            $("#delete-file-name2").val(name);
            $("#modal-file-delete").modal("show");
        }
        function delete_folder(name) {
            $("#delete-folder-name1").html(name);
            $("#delete-folder-name2").val(name);
            $("#modal-folder-delete").modal("show");
        }
        function preview_image(path) {
            $("#preview-image").attr("src", path);
            $("#path").html(path);
            $("#modal-image-view").modal("show");
        }

  </script>