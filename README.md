# AXIONED WordPress Starter Repository


## Included
- `.gitignore` - That ignores all WordPress core files, default themes, plugins, system files and node modules or developement specific stuffs.
- `composer.json` - Used for WordPress plugins and other WP dependancies along with WP core files and <b>AXIONED</b> default theme package.
- `readme.md` - This file.
- Theme starting point - See below.


## Requirements
- Apache, PHP v7.4+, MySQL, phpmyadmin.
- composer
- env file - All the necessary Credentials like ACF Plugin keys etc.


## Starter Repo
The theme is build by the Axioned developers which has all the minimum files/templates which are commonly used on the actual projects along with some functionalities implemented like displaying posts on the template, banner/slider, ACF Flexible Layout implementation which can we re-used/refrenced on the actual project, also this theme can be used as a fallback if in case of project theme broken or any security issue at that time.

**What's been added:**

- Composer file with all the dependencies listed.
- WordPress plugin which are frequently used on the projects like
[Advance Custom Field](https://www.advancedcustomfields.com/resources/) - for maping side data with the helpp of custom fields.
[Akismet](https://wordpress.org/plugins/akismet/) - protect agains spam attack.
[All in one wp migration](https://wordpress.org/plugins/all-in-one-wp-migration/) - for migration database + code package.
[Disable comments](https://wordpress.org/plugins/disable-comments/) - Disable comment feature completely if not in used on the project. 
[Login recaptcha](https://wordpress.org/plugins/login-recaptcha/) - add security on login page to avoid any bot attacks.
[WP Hide login](https://wordpress.org/plugins/wps-hide-login/) - protect wp-admin URL.
[Redirection](https://wordpress.org/plugins/redirection/) - for adding redirect rules. 
[Simple history](https://wordpress.org/plugins/simple-history/) - to track CMS dasboard history.
[Wordfence](https://wordpress.org/plugins/wordfence/) - security plugin.
[WP Smushit](https://wordpress.org/plugins/wp-smushit/) - image optimisation plugin.
[WP Super cache](https://wordpress.org/plugins/wp-super-cache/) - cache plugin.

- Navbar & [WP Menu Walker](https://github.com/wp-bootstrap/wp-bootstrap-navwalker) that outputs the WP nav menu.
- [Axioned Theme package](https://axioned.xyz/axioned-theme.zip) - default WordPress theme.


**Theme specific files and functions:** 
- `functions.php` - Theme specific functions.
- `home.php`
- `header.php`
- `footer.php`
- `search.php`
- `404.php`
- `/sass/*.scss` - Theme specific SASS partials.

---

## 1 - Environment & WordPress Setup
1. Create project in local.
2. Open a terminal window and navigate to the parent folder of the above created one.
3. `git clone` this repo.
4. `rm -rf /axioned-wordpress-starter/.git` - Remove git folder from clone.
5. Move all files from the clone repo to your wordpress/project root folder.
6. `rm -rf /axioned-wordpress-starter/` - Remove clone folder.
7. `cd WP-ROOT-DIR` - Open project folder.
8. `composer install` - Run composer command to begin with WordPress setup and installing dependencies.

## 2 - Theme Setup
1. Install the Wordpres from browser then switch the theme to axioned viz. wp-custom-theme.
2. Go to plugin section enable/activate all the plugins which are added to the starter repo.
3. Check all the ACF fields are synced from Custom field setting before proceeding with content update.
4. Add the content in the CSM and make sure to run permalink reset from settings.
5. Now you will be able to check the theme in action on frontend.


## 3 - Folder structure to be followed.
This is the traditional axioned folder structure to be followed on all the WordPress projects. The basic minimum setup is already included in the `functions.php`.

All other assets, SASS, CSS and JS can be found below.
- `script.js` the unminified version of sitewide JS to present under `/lib/` folder and the minified version which is enqued in the `functions.php` should be under `js/script.min.js`.
- similarly for SASS/CSS all the SCSS files can be found under `SASS` folder and the compiled version of SASS can be found under `css/style.min.css` all sitewide styling.
<br>

For more details about the Folderstructure and other stuff can be found here [AXIONED WP Folder Structure](https://drive.google.com/file/d/17pOkZ_GF-wFG5uzn4wvGXNvdCYEyS-KK/view) and [AXIONED WP Framework](https://drive.google.com/drive/folders/1h4fvKWrYZ5ISOOJ-A0aPN41LuIgh3SVU)


## 4 - Start Development
1. Make sure the Gulp setup is running for respective project.
2. `gulp watch` inside of the theme folder to start file watch and hot reload using gulp.

<br/>
<em><strong>Note:</strong> For file gulp watch to work properly the npm and other dependencies is properly installed according to the gulp script for that you can connect with your respective project oversee.</em>

[Gulp.js Development Documentation »](https://gulpjs.com/docs/en/getting-started/quick-start)


---

## Project Config files

- ### composer.json
    In project root folder.
Used for installing initial WordPress setup, plugins and other dependencies on project.

- ### theme-name/gulpfile.js
    Configuration file for gulp. A toolkit to automate & enhance your developement workflow
JS minification, CSS minification, optimisation, handeling vendor prefixes for CSS, ES6, SASS, ect.

