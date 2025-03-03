<script>
    $(document).ready(function() {
        // Hanya menampilkan modal tanpa logika
        $(document).on("click", ".delete-violation", function() {
            $("#delete_violation_modal").modal("show");
        });

        $(document).on("click", ".edit-modal", function() {
            $("#violation_edit_modal").modal("show");
        });
    });
</script>

