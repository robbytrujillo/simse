<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-teacher", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('teachers.destroy', ':id') }}".replace(':id', id);
            $("#delete_teacher_form").attr("action", deleteURL);
        });

        $(document).on("click", ".edit-modal", function() {
            const id = $(this).data("id");
            let url = "{{ route('teachers.show', ':paramID') }}".replace(":paramID", id);
            let updateURL = "{{ route('teachers.update', ':paramID') }}".replace(":paramID", id);

            $.ajax({
                url: url,
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
                success: (res) => {
                    $("#edit_full_name").val(res.data.full_name);
                    $("#edit_position").val(res.data.position);
                    $("#edit_gender").val(res.data.gender);
                    $("#edit_birth_place").val(res.data.birth_place);
                    $("#edit_birth_date").val(res.data.birth_date);
                    $("#edit_address").val(res.data.address);
                    $("#edit_phone").val(res.data.phone);
                    $("#edit_email").val(res.data.email);
                    $("#edit_last_education").val(res.data.last_education);
                    $("#edit_education_institution").val(res.data.education_institution);
                    $("#edit_graduation_year").val(res.data.graduation_year);
                    $("#edit_employee_id").val(res.data.employee_id);
                    $("#edit_employment_status").val(res.data.employment_status);
                    $("#edit_start_date").val(res.data.start_date);

                    if (res.data.image) {
                        const imageUrl = '/storage/' + res.data.image;
                        $("#image_preview").attr("src", imageUrl).show();
                    }

                    $("form").attr("action", updateURL);
                },
                error: (err) => {
                    alert("An error occurred, please check the console for details.");
                },
            });
        });
    });
</script>

