

# GRAPHICS WESTCHESTER TOOLSET

This is a toolset created by the Peekskill Web Design Team to assist in the creation of wordpress site.

Table of Contents:

1. Shortcodes
2. Social Widget
3. Settings Page
4. Custom CSS
5. Custom Post Types
6. Maintenance Mode
7. Client User Type
8. Dynamic Excerpt Lengths

____________________________________________________
## 1. Shortcodes

These will be used in your pages to assist in layout and behavior.

*source(s): /modules/shortcodes.php*


### SKELETON

These shortcodes are for layout according to the skeleton css framework.

_____________________________________________________


#### Container

	[container][/container]

	Optional:

		class 
			Default = ''
			Adds a class to the div

----------------------------------------------------

### Row

	[row][/row]

	Optional:

		class 
			Default = ''
			Adds a class to the div

----------------------------------------------------

### Columns

	[col][/col]

	Required:

		cols
			Default = ''
			Adds column width e.g., "eight"

	Optional:

		offset
			Default = ''
			Adds offset to column e.g., "one"

		class
			Default = ''
			Adds class to columns section
----------------------------------------------------

## Accordians

These shortcodes will create a js accordian. They can be styled further via css classes.


### Accordian Container

This must wrap any accordian that you want to make.

	[acc-container][/acc-container]

	Optional:

		class
			Default = ''
			Adds class to columns section
----------------------------------------------------

### Accordian Container

This must wrap any accordian that you want to make.

	[acc-container][/acc-container]

	Optional:

		class
			Default = ''
			Adds class to columns section
----------------------------------------------------

### Accordian Container

This must wrap any accordian that you want to make.

	[acc-container][/acc-container]

	Optional:

		class
			Default = ''
			Adds class to columns section
----------------------------------------------------

## 2. Social Widget

This is a widget (accessed in the **appearance>widgets** menu) that will display an icon link to the social site of your choosing. It uses Font Awesome which must be enqueued into your site already.

*source(s): /modules/social-widget.php*

____________________________________________________

## 3. Settings Page

This page, accessed through the **Graphics Westchester Theme Options** menu, will allow a user to add their google analytics code, an image for the login page, and a favicon.

All three will be added to their proper locations.

*source(s): /pages/settings.php, /pages/functions/settings-functions.php*

___________________________________________________


## 4. Image Sizes

This page, accessed through the **Graphics Westchester Theme Options** menu, will display a message with the optimal image sizes for each one. **Please note, THIS WILL NOT CREATE AN IMAGE SIZE FOR YOU. This is only meant to allow a client to see what the optimal upload size is.**

*source(s): /pages/image-sizes.php, /pages/functions/image-sizes-functions.php*

____________________________________________________

## 5. Custom CSS

This page, accessed through the **Graphics Westchester Theme Options** menu, will allow you to make edits safely to your live css files. It will be added to the head and will override any styles asside from inline styles.

*source(s): /pages/custom-css.php, /pages/functions/custom-css-functions.php*

_____________________________________________________

## 6. Custom Post Types

This page, accessed through the **Graphics Westchester Theme Options** menu, will allow you to make custom post types for your wordpress site. Note that this will not display any post types created by any other means and it may break if you add a second post type with the same slug!

*source(s): /pages/cpt.php, /pages/functions/cpt-functions.php*
_____________________________________________________

## 7. Maintenance Mode

This page, accessed through the **Graphics Westchester Theme Options** menu, it creates a maintenance mode page to be displayed to non logged in users. It can be added without any dependence on a specific theme. It does, however, rely on a Ninja Forms form to be created. An ID for this form can be placed in the Ninja Form ID field.

*source(s): /pages/maintenance-mode.php, /pages/functions/maintenance-mode-functions.php, /maintenance.css*

_____________________________________________________

## 8. Client User Type

This is a user type created to show the client the site behind the maintenance mode form. They have no capabilities and cannot even view the admin bar when logged in. In order to add capabilities to that user, either switch them to another user type, or use the add_cap function. Information on how to do this can be found here: [https://codex.wordpress.org/Function_Reference/add_cap](https://codex.wordpress.org/Function_Reference/add_cap)

*source(s): /modules/add-client-user.php*

______________________________________________________

## 9. Dynamic Excerpt Lengths - graphw_excerpt($Character_Count, $Ending)

This function will display a custom excerpt length of the queried post. It also includes an option of adding your own custom ending. The default is " ...".

*source(s): /modules/custom-excerpt.php*





