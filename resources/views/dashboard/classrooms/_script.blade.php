<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-class", function() {

            const id = $(this).data("id");
            const deleteURL = "{{ route('classrooms.destroy', ':id') }}".replace(':id', id);

            $("#delete_class_form").attr("action", deleteURL);
        });

        $(document).on("click", ".edit-modal", function() {

            const id = $(this).data("id");
            let url = "{{ route('classrooms.show', ':paramID') }}".replace(":paramID", id);

            let updateURL = "{{ route('classrooms.update', ':paramID') }}".replace(":paramID", id);

            $.ajax({
                url: url,
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
                success: (res) => {
                    $("#edit_name").val(res.data.name);
                    $("#edit_slug").val(res.data.slug); 
                    $("#edit_teacher").val(res.data.teacher_id); 

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

