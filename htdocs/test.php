
<?php
if (function_exists('gd_info')) {
    echo "GD-laajennus on käytössä!";
    print_r(gd_info());
} else {
    echo "GD-laajennus EI ole käytössä.";
}
?>
