# OpenConext-logogenerator

## Requirements
- PHP 5.3+ with the GD Library
- Composer
- Command line access

## Installation
- Clone this repository
- Load the dependencies using Composer (https://getcomposer.org/).

## Usage
The logogenerator.php is an executable command line script which read the config.yml to generate thumbnail images.

Example config.yml (as distributed by the repo);
    # Basic YAML Configuration for logo image generator
    ---
    # Configuration of the source images path
    source:
        image_directory: '/tmp/images'

    # Configuration for the destination images
    destination:
      # List of formats to use,
      formats:
        - maxwidth: 200
          maxheight: 80
    
        - maxwidth: 160
          maxheight: 60
    
      image_directory: '/tmp/resized'