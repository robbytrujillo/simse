<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-silabus", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('silabuses.destroy', ':id') }}".replace(':id', id);
            $("#delete_silabus_form").attr("action", deleteURL);
        });

        $(document).on("click", ".edit-modal", function() {
            const id = $(this).data("id");
            let url = "{{ route('silabuses.show', ':paramID') }}".replace(":paramID", id);
            let updateURL = "{{ route('silabuses.update', ':paramID') }}".replace(":paramID", id);

            $.ajax({
                url: url,
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
                success: (res) => {
                    $("#edit_content").val(res.data.content); 
                    $("#edit_mapel_id").val(res.data.mapel_id); 
                    $("#edit_class_id").val(res.data.class_id); 
                    $("#edit_curriculum_id").val(res.data.curriculum_id); 
                    $("#edit_silabus_form").attr("action", updateURL);
                },
                error: (err) => {
                    console.error("Edit error occurred:", err);
                    alert("An error occurred, please check the console for details.");
                },
            });
        });
    });
</script>

