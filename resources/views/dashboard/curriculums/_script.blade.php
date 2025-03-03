<script>
    $(document).ready(function() {
        // Menampilkan modal delete kurikulum
        $(document).on("click", ".delete-kurikulum", function() {
            $("#deleteKurikulumModal").modal("show");
        });

        // Menampilkan modal edit kurikulum
        $(document).on("click", ".edit-modal", function() {
            $("#editKurikulumModal").modal("show");
        });
    });
</script>

