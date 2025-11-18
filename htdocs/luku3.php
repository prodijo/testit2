<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['form_submitted']))
{

 $first_number = $_POST['first_number'];
 $second_number = $_POST['second_number'];

        if ($first_number > $second_number) {
            echo "$first_number on suurempi kuin $second_number";
        } elseif ($first_number < $second_number) {
            echo "$second_number on suurempi kuin $first_number";
        } else {
            echo "Luvut ovat yhtä suuret.";
        }
    
} 
?>