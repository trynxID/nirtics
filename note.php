<form id='actTiket' method='POST' class='quantity'>
    <input type='button' value='-' class='qtyminus minus' field='quantity' />
    <input type='text' name='quantity' value='0' class='qty' />
    <input type='button' value='+' class='qtyplus plus' field='quantity' />
</form>
<script>
    document.ready(function() {
        let quantitiy = 0;
        document.getElementByClassName("plus").click(function(e) {
            e.preventDefault();
            let quantity = parseInt(document.getElementById("qty").value);
            document.getElementById("qty").val(quantity + 1);
        });

        document.getElementByClassName("minus").click(function(e) {
            e.preventDefault();
            let quantity = parseInt(document.getElementById("qty").value);
            if (quantity > 0) {
                document.getElementById("qty").val(quantity - 1);
            }
        });

    });
    document.ready(function() {
        var quantity = 0;
        document.getElementsByClassName('.plus').addEventListener("click", function(e) {
            e.preventDefault();
            var quantity = parseInt(document.getElementById('#qty').val());
            document.getElementById('#qty').val(quantity + 1);
        });
        document.getElementsByClassName('.minus').addEventListener("click", function(e) {
            e.preventDefault();
            var quantity = parseInt(document.getElementById('#qty').val());
            if (quantity > 0) {
                document.getElementById('#qty').val(quantity - 1);
            }
        });
    });
    jQuery(document).ready(($) => {
        $(".quantity").on("click", ".plus", function(e) {
            let $input = $(this).prev("input.qty");
            let val = parseInt($input.val());
            $input.val(val + 1).change();
        });

        $(".quantity").on("click", ".minus", function(e) {
            let $input = $(this).next("input.qty");
            var val = parseInt($input.val());
            if (val > 0) {
                $input.val(val - 1).change();
            }
        });
    });
</script>