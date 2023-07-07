<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <form id='actTiket' method='POST' class='quantity' action="#">
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input type='text' name='quantity' value='0' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <script>
        /*
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
        });*/
    </script>

</body>

</html>