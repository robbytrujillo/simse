<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-teaching", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('teachings.destroy', ':id') }}".replace(':id', id);
            $("#delete_teaching_form").attr("action", deleteURL);
        });
    });
</script>
