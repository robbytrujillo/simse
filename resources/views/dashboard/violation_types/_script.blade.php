<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-violation-type", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('violation-types.destroy', ':id') }}".replace(':id', id);
            $("#delete_violation_type_form").attr("action", deleteURL);
        });

        $(document).on("click", ".edit-modal", function() {
            const id = $(this).data("id");
            let url = "{{ route('violation-types.show', ':paramID') }}".replace(":paramID", id);
            let updateURL = "{{ route('violation-types.update', ':paramID') }}".replace(":paramID", id);

            $.ajax({
                url: url,
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
                success: (res) => {
                    $("#edit_name").val(res.data.name);
                    $("#edit_description").val(res.data.description);
                    $("form").attr("action", updateURL);
                },
                error: (err) => {
                    alert("An error occurred, please check the console for details.");
                },
            });
        });
    });
</script>

