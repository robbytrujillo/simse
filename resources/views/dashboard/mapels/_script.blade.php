<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-mapel", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('mapels.destroy', ':id') }}".replace(':id', id);
            $("#deleteMapelModal").modal("show");
        });

        $(document).on("click", ".edit-modal", function() {
            const id = $(this).data("id");
            let url = "{{ route('mapels.show', 'paramID') }}".replace(":paramID", id);
            let updateURL = "{{ route('mapels.edit', 'paramID') }}".replace(":paramID", id);

            $.ajax({
                url: url,
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
                success: (res) => {
                    $("#edit_nama_mapel").val(res.data.nama_mapel);
                    $("form").attr("action", updateURL);
                },
                error: (err) => {
                    alert("An error occurred, please check the console for details.");
                },
            });
        });
    });
</script>

