<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-student", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('students.destroy', ':id') }}".replace(':id', id);
            $("#delete_student_form").attr("action", deleteURL);
        });

        $(document).on("click", ".edit-modal", function() {
            const id = $(this).data("id");
            let url = "{{ route('students.show', ':paramID') }}".replace(":paramID", id);
            let updateURL = "{{ route('students.update', ':paramID') }}".replace(":paramID", id);

            $.ajax({
                url: url,
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
                success: (res) => {
                    $("#edit_nis").val(res.data.nis);
                    $("#edit_name").val(res.data.name);
                    $("#edit_email").val(res.data.email);
                    $("#edit_gender").val(res.data.gender);
                    $("#edit_dob").val(res.data.dob);
                    $("#edit_address").val(res.data.address);
                    $("#edit_phone").val(res.data.phone);
                    $("#edit_father_name").val(res.data.father_name);
                    $("#edit_class_id").val(res.data.class_id);

                    if (res.data.image) {
                        const imageUrl = '/storage/' + res.data.image;
                        $("#image_preview").attr("src", imageUrl).show();
                    } else {
                        $("#image_preview").hide();
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
