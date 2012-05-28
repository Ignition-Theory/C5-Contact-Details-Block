C5 Contact Details Block
========================

A [Concrete5](http://concrete5.org) block for displaying contact details. Uses [hCard microformat](http://microformats.org/wiki/hcard) and includes vCard download option.

The block contains a simple set values that currently include:

* Full Name (Inlcudes options for honorifics)
* Department
* Role
* Two Phone Numbers (with option to select type)
* Email Address
* Postal Address

Values differ depending upon whether card is for Organisation or Person

vCard download uses [class_vcard.php by Troy Wolf](http://www.troywolf.com/articles/php/class_vcard/ "class_vcard.php by Troy Wolf")


Installing
----------

* Download latest version from [Github](https://github.com/Ignition-Theory/C5-Contact-Details-Block)
* Place 'contact_details' within the 'packages' folder of your Concrete
* Login to Concrete5 and install via 'install' on the dashboard

Usage
-----

Works like any other block. Select the card type and fill out the details. All details except Name are optional.

