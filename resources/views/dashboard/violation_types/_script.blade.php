<script>
    $(document).ready(function() {
        // Hanya menampilkan modal ketika tombol tertentu diklik
        $(document).on("click", ".edit-modal", function() {
            // Tampilkan modal edit
            $("#editModal").modal("show");
        });

        $(document).on("click", ".delete-violation-type", function() {
            // Tampilkan modal delete
            $("#deleteModal").modal("show");
        });
    });
</script>

