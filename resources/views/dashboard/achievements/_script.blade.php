<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-achievement", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('achievements.destroy', ':id') }}".replace(':id', id);
            $("#delete_achievement_form").attr("action", deleteURL);
        });

        $('#class_id').on('change', function() {
            var classId = $(this).val();
            $('#student_id').html('<option value="">Pilih Siswa</option>');
            if (classId) {
                $.ajax({
                    url: '{{ route('getStudentsByClass') }}',
                    type: 'GET',
                    data: { class_id: classId },
                    success: function(response) {
                        $.each(response, function(index, student) {
                            $('#student_id').append('<option value="' + student.id + '">' + student.name + '</option>');
                        });
                    },
                    error: function() {
                        alert("An error occurred while fetching students.");
                    }
                });
            }
        });

        $(document).on("click", ".edit-modal", function() {
            const id = $(this).data("id");
            let url = "{{ route('achievements.show', ':paramID') }}".replace(":paramID", id);
            let updateURL = "{{ route('achievements.update', ':paramID') }}".replace(":paramID", id);

            $.ajax({
                url: url,
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
                success: (res) => {
                    $("#edit_date").val(res.data.date);
                    $("#edit_description").val(res.data.description);
                    $("#edit_student_id").val(res.data.student_id);
                    if (res.data.image) {
                        const imageUrl = '/storage/' + res.data.image;
                        $("#image_preview").attr("src", imageUrl).show();
                    }
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

