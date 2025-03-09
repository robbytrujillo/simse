<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-vendor", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('vendors.destroy', ':id') }}".replace(':id', id);
            $("#delete_vendor_form").attr("action", deleteURL);
        });

        $(document).on("click", ".edit-modal", function() {
            const id = $(this).data("id");
            let url = "{{ route('vendors.show', ':paramID') }}".replace(":paramID", id);
            let updateURL = "{{ route('vendors.update', ':paramID') }}".replace(":paramID", id);

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

