<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-exam", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('exams.destroy', ':id') }}".replace(':id', id);
            $("#delete_exam_form").attr("action", deleteURL);
        });

        $(document).on("click", ".edit-modal", function() {
            const id = $(this).data("id");
            let url = "{{ route('exams.show', ':paramID') }}".replace(":paramID", id);
            let updateURL = "{{ route('exams.update', ':paramID') }}".replace(":paramID", id);

            $.ajax({
                url: url,
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
                success: (res) => {
                    $("#edit_title").val(res.data.title);
                    $("#edit_description").val(res.data.description);
                    $("#edit_start_time").val(res.data.start_time);
                    $("#edit_end_time").val(res.data.end_time);
                    $("#edit_duration").val(res.data.duration);
                    $("#edit_is_active").val(res.data.is_active);
                    $("#edit_class_id").val(res.data.class_id);
                    $("#edit_teacher_id").val(res.data.teacher_id);
                    $("#edit_mapel_id").val(res.data.mapel_id);
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

