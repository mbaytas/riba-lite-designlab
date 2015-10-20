/**
 * Custom script that builds a SELECT drop-down with all menu links.
 *
 * Selects are great since they support CSS3
 *
 */
jQuery(document).ready(function(){

	jQuery('ul:first').attr("id", "primary-menu");
	jQuery("ul#primary-menu > li:has(ul)").addClass("hasChildren");
	jQuery("ul#primary-menu > li:has(ul) > ul > li > a").addClass("isChild");
});

jQuery(function() {
	jQuery("<select id='rl-navMenu' />").appendTo("#masthead");
	jQuery("#rl-navMenu").wrap('<div class="rl-styled-select"></div>');
	jQuery("<option />", {
		"selected": "selected",
		"value"   : "",
		"text"    : "Menu",
	}).appendTo("#masthead select");

	jQuery("nav a").each(function() {
		var el = jQuery(this);
		jQuery("<option />", {
			"value"   : el.attr("href"),
			"text"    : el.text(),
			"class"   : el.attr("class")
		}).appendTo("#masthead select");
	});

	jQuery("select#rl-navMenu").change(function() {
		window.location = jQuery(this).find("option:selected").val();
	});
});

jQuery(document).ready(function() {
	jQuery("#masthead select option").each(function() {
		var el = jQuery(this);
		if(el.hasClass("isChild")){
			jQuery(el.prepend("- "))
		}
	});
});