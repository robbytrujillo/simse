<script>
    $(document).ready(function() {
        // Menampilkan modal edit
        $(document).on("click", ".edit-modal", function() {
            $("#editModal").modal("show");
        });

        // Menampilkan modal delete
        $(document).on("click", ".delete-sanction-type", function() {
            $("#deleteModal").modal("show");
        });
    });
</script>

