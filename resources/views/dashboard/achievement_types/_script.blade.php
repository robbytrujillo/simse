<script>
    $(document).ready(function() {
        // Menampilkan modal delete achievement type
        $(document).on("click", ".delete-achievement-type", function() {
            $("#deleteModal").modal("show");
        });

        // Menampilkan modal edit achievement type
        $(document).on("click", ".edit-modal", function() {
            $("#editModal").modal("show");
        });
    });
</script>

