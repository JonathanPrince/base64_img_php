<?php

class B64img {

    public function __construct($input) {

        // check if input is a valid file
        if (is_file($input)) {

            $this->file_type = mime_content_type($input);

            // check if file is an image before encoding
            if ($this->is_image()) {

                $file_contents = file_get_contents($input);

                $this->data_URI = 'data:' . $this->file_type . ';base64,' . base64_encode($file_contents);

            }

        } else if (strpos($input, 'data:') == 0) {


        } else {


        }

    }

    /**
    *   checks mime type of file
    *   @return boolean true if mime type is an image
    */

    private function is_image() {

        switch ($this->file_type) {

            case 'image/jpeg':
            case 'image/pjpeg':
            case 'image/png':
            case 'image/gif':
                return true;

            default:
                return false;

        }

    }


}

?>
