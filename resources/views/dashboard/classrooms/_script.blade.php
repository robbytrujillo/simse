<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-class", function() {

            const id = $(this).data("id");

            $("#delete_class_form").attr("action", "");
        });

        $(document).on("click", ".edit-modal", function() {

            const id = $(this).data("id");

            $.ajax({
                url: "",
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
                success: (res) => {

                    $("#edit_name").val(res.data.name);
                    $("#edit_slug").val(res.data.slug); 
                    $("#edit_teacher").val(res.data.teacher_id); 

                    $("form").attr("action", "");
                },
                error: (err) => {
                    alert("An error occurred, please check the console for details.");
                },
            });
        });
    });
</script>

