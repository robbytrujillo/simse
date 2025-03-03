<script>
    $(document).ready(function() {

        $(document).on("click", ".delete-exam", function() {

            $("#deleteExamModal").modal("show");
        });
        $(document).on("click", ".edit-modal", function() {

            $("#editExamModal").modal("show");
        });
    });
</script>
