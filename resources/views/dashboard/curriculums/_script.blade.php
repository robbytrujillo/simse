<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-kurikulum", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('curriculums.destroy', ':id') }}".replace(':id', id);
            $("#delete_kurikulum_form").attr("action", deleteURL);
        });

        $(document).on("click", ".edit-modal", function() {
            const id = $(this).data("id");
            let url = "{{ route('curriculums.show', ':paramID') }}".replace(":paramID", id);
            let updateURL = "{{ route('curriculums.update', ':paramID') }}".replace(":paramID", id);

            $.ajax({
                url: url,
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
                success: (res) => {
                    $("#edit_nama_kurikulum").val(res.data.name);
                    $("#edit_academic_year").val(res.data.academic_year);
                    $("#edit_description").val(res.data.description);
                    $("#edit_kurikulum_form").attr("action", updateURL);
                },
                error: (err) => {
                    console.error("Edit error occurred:", err);
                    alert("An error occurred, please check the console for details.");
                },
            });
        });
    });
</script>

