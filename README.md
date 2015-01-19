# base64_img_php

PHP Class for base64 image encoding and decoding

##Usage

```php

require 'path/to/class/b64img.php';

// encode file as data uri
$image1 = new B64img('./some_image.png');
$data_URI = $image1->get_data();


// save data uri as file
$image2 = new B64img($data_URI);
$image2->save_as('./new_image.png');

```
