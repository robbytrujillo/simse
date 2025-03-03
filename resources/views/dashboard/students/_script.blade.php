<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-student", function() {
            $("#delete_student_form").attr("action", "#");
        });
        $(document).on("click", ".edit-modal", function() {
            $("#edit_student_form").modal("show");
        });
    });
</script>
