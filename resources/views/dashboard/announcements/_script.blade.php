<script>
  $(document).ready(function() {
    $(document).on("click", ".delete-announcement", function() {
      const id = $(this).data("id");
      const deleteURL = "{{ route('announcements.destroy', ':id') }}".replace(':id', id);
      $("#delete_announcement_form").attr("action", deleteURL);
    });

    $(document).on("click", ".edit-modal", function() {
      const id = $(this).data("id");
      let url = "{{ route('announcements.show', ':paramID') }}".replace(":paramID", id);
      let updateURL = "{{ route('announcements.update', ':paramID') }}".replace(":paramID", id);

      $.ajax({
        url: url,
        method: "GET",
        headers: {
          "Content-Type": "application/json",
        },
        success: (res) => {
          $("#edit_title").val(res.data.title);
          $("#edit_content").val(res.data.content);
          $("#edit_published_at").val(res.data.published_at);
          $("form").attr("action", updateURL);
        },
        error: (err) => {
          alert("An error occurred, please check the console for details.");
        },
      });
    });
  });
</script>

