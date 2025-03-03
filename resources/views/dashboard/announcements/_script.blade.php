<script>
    $(document).ready(function() {
      $(document).on("click", ".edit-modal", function() {
        $("#announcement_edit_modal").modal('show');
      });
  
      $(document).on("click", ".delete-announcement", function() {
        $("#delete_announcement_modal").modal('show');
      });
    });
  </script>
  
  