<script>
    function addtocart(id) {
        // alert(id);
        var qty = $("#qty").val();
        // var price = $("#price").val();
        // var prod_rename=$("#prod_rename").val();
        // alert(qty);
        // alert(price);

        $.ajax({
            type: "post",
            url: "addtocart_product.php",
            data: {
                p_id: id,
                qty: qty,
                // price: price,
                // prod_nm: prod_rename,
            },
            success: function (data) {
                // alert(data);
                if (data == 0) {
                    swal("oops !", "Product already exist in cart", "info");
                } else if (data == 1) {
                    swal("Added !", "Product Successfully added to cart", "success");
                }
                cartcount();
                // subtotal();
            }
        });
    }

    function cartcount() {
        $.ajax({
            type: "post",
            url: "cartcount.php",
            success: function (data2) {
                $('#count1').html(data2);
            }
        });
    }
</script>