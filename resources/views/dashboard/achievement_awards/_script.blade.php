<script>
    $(document).ready(function() {
        // Menampilkan modal delete achievement award
        $(document).on("click", ".delete-achievement-award", function() {
            $("#deleteModal").modal("show");
        });

        // Menampilkan modal edit achievement award
        $(document).on("click", ".edit-modal", function() {
            $("#editModal").modal("show");
        });
    });
</script>

