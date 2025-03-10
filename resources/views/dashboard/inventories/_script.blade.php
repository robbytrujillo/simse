<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-inventory", function() {
            const id = $(this).data("id");
            const deleteURL = "{{ route('inventories.destroy', ':id') }}".replace(':id', id);
            $("#delete_inventory_form").attr("action", deleteURL);
        });

        $(document).on("click", ".edit-modal", function() {
            const id = $(this).data("id");
            let url = "{{ route('inventories.show', ':paramID') }}".replace(":paramID", id);
            let updateURL = "{{ route('inventories.update', ':paramID') }}".replace(":paramID", id);

            console.log(`Fetching inventory for editing with ID: ${id}`);

            $.ajax({
                url: url,
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
                success: (res) => {
                    console.log("Edit response received:", res);
                    $("#edit_item_code").val(res.data.item_code);
                    $("#edit_item_name").val(res.data.item_name);
                    $("#edit_category_id").val(res.data.category_id);
                    $("#edit_vendor_id").val(res.data.vendor_id);
                    $("#edit_description").val(res.data.description);
                    $("#edit_class_id").val(res.data.class_id);
                    $("#edit_quantity").val(res.data.quantity);
                    $("#edit_condition").val(res.data.condition);
                    $("#edit_procurement_date").val(res.data.procurement_date);
                    $("#edit_remarks").val(res.data.remarks);
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

