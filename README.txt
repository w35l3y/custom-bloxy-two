==== Bloxy Two ====

Author: Stefan Kröber
Author URI: http://www.arcance.net
Theme URI: http://www.arcance.net/freebies/bloxy-two
Description: A snazzy WordPress theme with some glassy effects - now without bubbles! You can choose between an orange or blue sidebar or use both colors and up to three widget areas in the footer. On top, it supports left and right sidebars, featured posts, multiple post formats, is translation ready and comes with a custom editor style.





== CONTENT ==

 * Installation
 * Limitations & Known Issues
 * Get Support
 * Changelog





= INSTALLATION =

To install the theme, simply copy the folder you just downloaded to your themes directory (wordpress/wp-content/themes/), using your favourite ftp tool. After that, go to Appearance > Themes in your WordPress Admin Panel and activate the theme.





= LIMITATIONS & KNOWN ISSUES =

Using search widget in the sidebar
	
Currently it is important to make sure, that you add a title to the search widget, otherwise the layout will break. This happens due to the method the sidebar widgets are implemented with. If no title is set, an necessary opening <div>-tag would not be printed, thus closing a prior div element too early.

- - - - -

Theme may be bugged in Internet Explorer
	
Though I do not expect major issues regarding legacy Internet Explorer compatibility, there may be some minor flaws - leaving aside the fact that I am not including a PNG-Fix. I am not testing for older IE compatibility with this release. I may address this in a future update. If you encounter any major bugs, please contact me: http://www.arcance.net/contact





= GET SUPPORT =

I found a bug! There is a faulty translation!
	
Sorry for that. I probably drank to less coffee the night I was working on that. It would be very kind, if you could report any bugs or flaws you encounter. There are several ways to do so:
Write me an email: http://www.arcance.net/contact
Open a support ticket / thread on wordpress.org: http://wordpress.org/extend/themes/bloxy-two
Email is way faster - I do not often check the wordpress.org tickets

- - - - -

I am missing a feature. Can you add it? I have another question!
	
Feel free to ask whatever you want. If I can, I will help you. But keep in mind that I am not able to help with WordPress issues in general, not directly related to my themes.
Write me an email: http://www.arcance.net/contact

	



== CHANGELOG ==

Version 1.6.1 - 23.08.2012

Fixed: Container for wp_link_pages() is now properly cleared
Fixed: Fixed styling and z-indexes of header navigation

Changed: Theme URI changed to arcance.net/freebies/bloxy-two

Added: Copyright information in footer.php and style.css
Added: If a post has no title, it will now use "Untitled" so that the single-post view is easily accessible even if comments are disabled

- - - - -

Version 1.6 - 07.08.2012

Changed: Background-image for article meta
Changed: Improved table and text styles, even added some uncommon ones

Added: Support for post-formats: aside, audio, gallery, image, link, quote, video
Added: Made the theme translation-ready, german already included
Added: Template for attachments
Added: Template for author archives
Added: Basic editor stylesheet for the admin panel
Added: Badge to highlight sticky posts
Added: CSS-styles for images inside posts and "no-border" class to reset it
Added: Readme.txt and License.txt

- - - - -

Version 1.5 - 15.09.2011

Huge step! Completely refined the design and rebuild it from the ground up.

- - - - -

Version 1.0

Initial release

