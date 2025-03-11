<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-achievement-award", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('achievement-awards.destroy', ':id') }}".replace(':id', id);
            $("#delete_achievement_award_form").attr("action", deleteURL);
        });

        $(document).on("click", ".edit-modal", function() {
            const id = $(this).data("id");
            let url = "{{ route('achievement-awards.show', ':paramID') }}".replace(":paramID", id);
            let updateURL = "{{ route('achievement-awards.update', ':paramID') }}".replace(":paramID", id);

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
                    console.error("Edit error occurred:", err);
                    alert("An error occurred, please check the console for details.");
                },
            });
        });
    });
</script>

