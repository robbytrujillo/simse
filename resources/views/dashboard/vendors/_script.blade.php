<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-category", function() {
            $("#delete_category_modal").modal('show');
        });

        $(document).on("click", ".edit-modal", function() {
            $("#category_edit_modal").modal('show');
        });
    });
</script>

