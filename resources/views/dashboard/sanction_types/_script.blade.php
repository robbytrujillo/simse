<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-sanction-type", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('sanction-types.destroy', ':id') }}".replace(':id', id);
            $("#delete_sanction_type_form").attr("action", deleteURL);
        });

        $(document).on("click", ".edit-modal", function() {
            const id = $(this).data("id");
            let url = "{{ route('sanction-types.show', ':paramID') }}".replace(":paramID", id);
            let updateURL = "{{ route('sanction-types.update', ':paramID') }}".replace(":paramID", id);

            console.log(`Fetching sanction type for editing with ID: ${id}`);

            $.ajax({
                url: url,
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
                success: (res) => {
                    console.log("Edit response received:", res);
                    $("#edit_name").val(res.data.name);
                    $("#edit_description").val(res.data.description);
                    $("form").attr("action", updateURL);
                },
                error: (err) => {
                    console.error("Edit error occurred:", err);
                    alert("An error occurred, please check the console for details.");
                },
            });
        });
    });
</script>

