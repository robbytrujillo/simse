<script>
    $(document).ready(function() {
        // Menampilkan modal delete achievement
        $(document).on("click", ".delete-achievement", function() {
            $("#deleteModal").modal("show");
        });

        // Menampilkan modal edit achievement
        $(document).on("click", ".edit-modal", function() {
            $("#editModal").modal("show");
        });
    });
</script>

