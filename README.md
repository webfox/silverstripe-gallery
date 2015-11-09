#Silverstripe Carousel#
This plugin simply adds the required dataobject and makes an extension available to automatically add a carousel tab to any page on your site.
This plugin does not do the frontend for you at all as there are so many different options that it's impracticable.

Just loop over `$PrimaryGalleryImages` or `$SecondaryGalleryImages` and render the slides out as you wish.
`$Image` refers to the uploaded image
`$Title` refers to the title on the image

# Installation Instructions #
## Composer ##
Run the following to add this module as a requirement and install it via composer.

```
composer require "webfox/silverstripe-gallery"
```

Next up add the required config settings, below is an example of adding a carousel to all Page and all subclasses, setting a custom folder for
the images to upload to, and setting custom tab titles:

```
Page:
  primary_gallery:
    title: 'Carousel Images'
    folder: 'Carousel-Images'
  secondary_gallery:
    title: 'Gallery Images'
    folder: 'Gallery-Images'
  extensions:
    - GalleryExtension
```

By default both galleries are enabled, but can be disabled by setting `enabled` to `false`, which can also be used to disable the gallery on a subclass:

```
SubclassOfPage:
  primary_gallery:
    enabled: false
  secondary_gallery:
    enabled: false
```

then browse to `/dev/build?flush=all`

#Requirements#
* Silverstripe 3.1+
