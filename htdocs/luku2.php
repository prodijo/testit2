<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['form_submitted'])) {
    // Suodatetaan ja tarkistetaan syötteet
    $first_number = filter_input(INPUT_POST, 'first_number', FILTER_VALIDATE_FLOAT);
    $second_number = filter_input(INPUT_POST, 'second_number', FILTER_VALIDATE_FLOAT);

    if ($first_number === false || $second_number === false) {
        echo "Virhe: Syötäthän molemmat luvut oikein numeromuodossa.";
    } else {
        if ($first_number > $second_number) {
            echo "$first_number on suurempi kuin $second_number";
        } elseif ($first_number < $second_number) {
            echo "$second_number on suurempi kuin $first_number";
        } else {
            echo "Luvut ovat yhtä suuret.";
        }
    }
} else {
    echo "Lomaketta ei ole lähetetty tai tiedot puuttuvat.";
}
?>