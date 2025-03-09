<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-category", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('categories.destroy', ':id') }}".replace(':id', id);
            $("#delete_category_form").attr("action", deleteURL);
        });

        $(document).on("click", ".edit-modal", function() {
            const id = $(this).data("id");
            let url = "{{ route('categories.show', ':paramID') }}".replace(":paramID", id);
            let updateURL = "{{ route('categories.update', ':paramID') }}".replace(":paramID", id);

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

