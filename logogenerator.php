#!/usr/bin/env php
<?php
require 'vendor/autoload.php';
$config = Spyc::YAMLLoad('config.yml');

define ('__SOURCE_DIR__', $config['source']['image_directory']);
define ('__LOGO_DIR__', $config['destination']['image_directory']);
define ('__OUTPUT_EXT__', $config['destination']['extension']);

if (!is_dir(__SOURCE_DIR__)) {
  echo 'Error: source directory(' . __SOURCE_DIR__ . ') could not be found';
  exit(1);
}

if (!is_dir(__LOGO_DIR__)) {
  echo 'Error: destination directory(' . __LOGO_DIR__ . ') could not be found';
  exit(1);
}

$files = array_diff(scandir(__SOURCE_DIR__), array('..', '.'));
foreach ($files as $file) {
  $sourceLocation = __SOURCE_DIR__ . '/' . $file;
  $destinationName = array_shift(explode('.', $file));

  if (is_dir($sourceLocation)) {
    echo 'Directories will not be traversed, found: ' . $sourceLocation . "\n";
    continue;
  }

  foreach ($config['destination']['formats'] as $format) {
    echo "Thumbing " . $sourceLocation . " to " . $format['maxwidth'] . 'x' . $format['maxheight'] . "\n";
    createThumb($sourceLocation, $destinationName, $format['maxwidth'], $format['maxheight']);
  }
}

function createThumb($source, $destinationName, $maxwidth, $maxheight) {
  try {
    $image = \PHPImageWorkshop\ImageWorkshop::initFromPath($source);
    $image->resizeInPixel($maxwidth, $maxheight, true);
    $image->save(__LOGO_DIR__, $destinationName . '_' . $maxwidth . '_' . $maxheight . '.' . __OUTPUT_EXT__);
  } catch(Exception $e) {
    echo $e->getMessage();
  }
}