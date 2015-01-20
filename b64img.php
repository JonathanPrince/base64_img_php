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

        } else if (preg_match('/data\:image\/.+\;base64\,/', $input)) {

            $this->data_URI  = $input;

        } else {

            throw new Exception('Input should be a file or base64 data string.');

        }

    }

    /**
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

    /**
    * @return string base64 encoded image
    */

    public function get_data() {

        return $this->data_URI;

    }

    /**
    * @param string path and filename for file
    * @return boolean true on success
    */

    public function save_as($target) {

        $file_data = preg_replace('/data\:image\/.+\;base64\,/', '', $this->data_URI);
        $file_data = base64_decode($file_data);

        $success = file_put_contents($target, $file_data);

        if ($success != false) {

            return true;

        } else {

            return false;

        }

    }


}

?>
