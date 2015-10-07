=== Riba Lite ===

Contributors: Macho Themes
Tags: translation-ready, custom-background, theme-options, custom-menu, post-formats, threaded-comments

Requires at least: 4.0
Tested up to: 4.2.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A starter theme called Riba Lite.

== Description ==

Hi. I'm Riba - a blogging / magazine WordPress theme. I've been built from the ground up by the awesome guys @ Macho Themes (http://www.machothemes.com) and I'm available for free. 

== Installation ==
	
1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.


== Changelog ==

### V 10.4
    - Updated screenshot

### V 1.0.3.2
    - Updated readme.txt
    - Removed double license file (license.md)
    - Fixed a small bug in inc/components/class.mt-contact-bar.php
    - Prefixed with MTL all inc/components items; apparently theme framework components need to have their own prefix ... jeez

### V 1.0.3
    - Added TGMPA.
    - Added Login Customizer.
    - Updated header menu (CSS fixes).
    - Added Contact bar & full-screen search functionality.
    - Added breadcrumbs on single blog posts via hook.
    - Fixed Line height problem on related posts.
    - Added Parallax text fade & opacity effect on single blog posts.
    - Added up-sell features.
    - Fixed CSS Issues in the Customizer

### V 1.0.2
    - Updated screenshot
    - Added action Hooks
        - mtl_after_content
            - sharing bar
            - related posts
            - author box
        - mtl_before_content
            - sharing bar (by option)
        - mtl_entry_meta
            - post meta
                - estimated reading time
                - author
                - posted on
    - Created /components/ folders; Most of the functions / classes found in /inc/extras.php are now located in their corresponing class PHP files (removing / adding components is now easier)
    - Sanitized URL return functions from /inc/components/class.mt-breadcrumbs.php
    - Customizer
        - Replaced the customizer section setting: "separator_type" (used to allow HTML) to a drop-down with a few options
        - Addded posibility of displaying the sharing bar before / after content (prior version only allowed for the sharing bar to be displayed at the end of the content).
    - If MBYTplayer script is turned off (Customizer -> Advanced), video controls aren't displayed and as a fallback, the featured post image is displayed instead of the video background
    - Added preloader styles as a customizer section (more preloader styles will be added in the near fuure)

### V 1.0.1
    - Updated screenshot
    - fixed a few responsive bugs


### V 1.0.0
    - Initial Release


= License =
Riba Lite WordPress theme, Copyright (C) 2015 MachoThemes.com
Riba Lite WordPress theme is licensed under the GPL3.

Unless otherwise specified, all the theme files, scripts and images are licensed under GNU General Public License.
The exceptions to this license are as follows:

* Bootstrap v3.3.4 (http://getbootstrap.com)
    Copyright 2011-2014 Twitter, Inc.
    Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)


* Headroom JS v 0.7.0 (http://wicky.nillia.ms/headroom.js/)
	Licensed under MIT

* Pace JS (http://github.hubspot.com/pace/docs/welcome/)
	Licensed under MIT

* jQuery Owl Carousel
    Copyright (c) 2013 Bartosz Wojciechowski (http://owlgraphic.com/owlcarousel)
    Licensed under the MIT license. (http://www.opensource.org/licenses/mit-license.php)

* jquery Query Loader 2
    Copyright (c) 2011 - Gaya Kessler
    Licensed under the MIT license. (http://www.opensource.org/licenses/mit-license.php)

* jQuery SmoothScroll
     Copyright (C) Balazs Galambosi (maintainer) & Michael Herf     (Pulse Algorithm)
     Licensed under the MIT license.(http://www.opensource.org/licenses/mit-license.php)

   * Images ( all images are from unsplash.com )
       - First post image: https://images.unsplash.com/46/yzS7SdLJRRWKRPmVD0La_creditcard.jpg
	- Second post image: https://images.unsplash.com/photo-1417721955552-a49ac2d334e8
	- Third post image: https://images.unsplash.com/uploads/14115120538776712c565/a699942a
	- Fourth post image: https://images.unsplash.com/uploads/14132599381062b4d4ede/3b6f33f2
	- Fifth post image (which you can barely see): https://images.unsplash.com/photo-1415226556993-1404e0c6e727
	- Sixth post image (which you can barely see): https://images.unsplash.com/photo-1425141750113-187b6a13e28c
	- Seventh image: https://images.unsplash.com/photo-1440964829947-ca3277bd37f8?q=80&fm=jpg

 * Font Awesome

	License: SIL OFL 1.1
	URL: http://scripts.sil.org/OFL

 * Google Fonts:

    Montserrat ( Copyright 2012, Julieta Ulanovsky )
	https://www.google.com/fonts/specimen/Montserrat

    License: SIL OFL 1.1
    URL: http://scripts.sil.org/OFL



