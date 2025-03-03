<script>
    $(document).ready(function() {
        // Menampilkan modal delete silabus
        $(document).on("click", ".delete-silabus", function() {
            $("#deleteSilabusModal").modal("show");
        });

        // Menampilkan modal edit silabus
        $(document).on("click", ".edit-modal", function() {
            $("#editSilabusModal").modal("show");
        });
    });
</script>

