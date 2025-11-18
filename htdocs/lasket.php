
<?php
if (isset($_POST['form_submitted'])) {
    $luku1 = floatval($_POST['first_number']);
    $luku2 = floatval($_POST['second_number']);
    $operaatio = $_POST['operation'];
    $tulos = "";
    $merkki = "";

    switch ($operaatio) {
        case "plus":
            $tulos = $luku1 + $luku2;
            $merkki = "+";
            break;
        case "miinus":
            $tulos = $luku1 - $luku2;
            $merkki = "-";
            break;
        case "kerto":
            $tulos = $luku1 * $luku2;
            $merkki = "×";
            break;
        case "jako":
            if ($luku2 != 0) {
                $tulos = $luku1 / $luku2;
                $merkki = "/";
            } else {
                $tulos = "Nollalla ei voi jakaa!";
                $merkki = "/";
            }
            break;
        default:
            $tulos = "Virheellinen laskutoimitus";
            $merkki = "?";
    }

    echo "<h2>Tulos</h2>";
    if (is_numeric($tulos)) {
        echo "$luku1 $merkki $luku2 = $tulos";
    } else {
        echo $tulos;
    }
} else {
    echo "Lomaketta ei ole lähetetty oikein.";
}
?>
