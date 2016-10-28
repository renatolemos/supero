<?php

for ($i = 1; $i < 100; $i++) {

    if ((($i % 3) == 0) && (($i % 5) == 0)) {

        echo $i . ' - FizzBuzz<br>';
    } elseif (($i % 3) == 0) {
        echo $i . ' - Fizz <br>';
    } elseif ((($i % 5) == 0)) {
        echo $i . ' - Buzz <br>';
    }
}
?>