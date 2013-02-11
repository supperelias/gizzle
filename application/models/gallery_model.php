<?php

class Gallery_model extends CI_Model {

  function __construct() {
    // Call the Model constructor
    parent::__construct();
  }

  /*
   *  Get images from folder and echo array
   */
  function get_from_folder($folder) {
    $images = array();
    $dir = 'resources/images/content/' . $folder;

    // each image found
    foreach (scandir($dir) as $file) {
      if (!is_dir($file)) {

        if (pathinfo($file, PATHINFO_EXTENSION) == 'jpg') {

          $image = '<a data-gallery="'. $folder .'" href="' . $dir . '/' . $file . '" style="background-image:url(' . $dir . '/thumbs/' . $file . ')"></a>';

          array_push($images, $image);
        }
      }
    }

    return $images;
  }

}

?>
