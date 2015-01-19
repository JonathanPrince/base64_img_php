<?php

class B64img {

    public function __construct($input) {

        // check if input is a valid file
        if (is_file($input)) {


        } else if (strpos($input, 'data:') == 0) {


        } else {


        }

    }


}

?>
