# AXIONED WordPress Starter Repository


## Included
- `.gitignore` - That ignores all WordPress core files, default themes, plugins, system files and node modules or developement specific stuffs.
- `setup.json` - All the details for Database, Plugin list, theme details and other details around project are mentioned in this JSON file.
- `env.json` - ACF PRO key details should be mentioned in this JSON file.
- `setup.php` - Most important file where all the script for WordPress project setup along with activating/deactivating necessary plugin are implemented.
- `readme.md` - This file.
- Theme starting point - See below.


## Requirements
- WP-CLI Environment installed, Apache, PHP v7.0+, MySQL, phpmyadmin.


## Starter Repo
The theme is build by the Axioned developers which has all the minimum files/templates which are commonly used on the actual projects along with some functionalities implemented like displaying posts on the template, banner/slider, ACF Flexible Layout implementation which can we re-used/refrenced on the actual project, also this theme can be used as a fallback if in case of project theme broken or any security issue at that time.

**What's been added:**

- WP-CLI script `setup.php` this script will help to setup the complete WordPress with below mentioned plugins
- WordPress plugin which are frequently used on the projects like
    - [Advance Custom Field](https://www.advancedcustomfields.com/resources/) - for maping side data with the help of custom fields.
    - [All in one wp migration](https://wordpress.org/plugins/all-in-one-wp-migration/) - for migration database + code package.
    - [Disable comments](https://wordpress.org/plugins/disable-comments/) - Disable comment feature completely if not in used on the project. 
    - [Login recaptcha](https://wordpress.org/plugins/login-recaptcha/) - add security on login page to avoid any bot attacks.
    - [WP Hide login](https://wordpress.org/plugins/wps-hide-login/) - protect wp-admin URL.
    - [Redirection](https://wordpress.org/plugins/redirection/) - for adding redirect rules. 
    - [Simple history](https://wordpress.org/plugins/simple-history/) - to track CMS dasboard history.
    - [Wordfence](https://wordpress.org/plugins/wordfence/) - security plugin.
    - [WP Smushit](https://wordpress.org/plugins/wp-smushit/) - image optimisation plugin.
    - [WP Super cache](https://wordpress.org/plugins/wp-super-cache/) - cache plugin.

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
8. Inside env.json change `acf_key` key value.
9. Inside setup.json change property value as per your preference.
    - `dbname` add unique database name
    - `dbuser` add your database username
    - `dbpass` add your database password
    - `site_url` add site URL as per your preference
    - `title` add project name as site title
    - `admin_email` add your axioned email id here
    - `pluginListInstall` here add and remove plugin as per project requirement
10. `wp --require=setup.php setup` - Run WP-CLI command to begin with WordPress setup and installing dependencies.
11. Once setup is done add `screenshot` image in your theme folder and change `proxy` path in `gulp.js` file and do necessary changes on `package.json` and `.gitignore` file


## 2 - Folder structure to be followed.
This is the traditional axioned folder structure to be followed on all the WordPress projects. The basic minimum setup is already included in the `functions.php`.

All other assets, SASS, CSS and JS can be found below.
- `script.js` the unminified version of sitewide JS to present under `/lib/` folder and the minified version which is enqued in the `functions.php` should be under `js/script.min.js`.
- similarly for SASS/CSS all the SCSS files can be found under `SASS` folder and the compiled version of SASS can be found under `css/style.min.css` all sitewide styling.
<br>

*High level overview of file & folder Structure inside our theme folder*

    ├── function.php
    │
    ├── header.php
    │
    ├── footer.php
    │
    ├── home.php
    │   
    ├── template-parts
    │   └── pages
    │         ├── home
    │         │   ├── content-about-us.php
    │         │   ├── content-banner.php
    │         │   └── content-customer-reviews.php
    │         │
    │         └── modules
    │             ├── header
    │             │   ├── content-header-message.php
    │             │   └── content-primary-navigation.php
    │             │
    │             ├── footer
    │             │   ├── content-header-message.php
    │             │   └── content-primary-navigation.php
    │             │ 
    │             └── layout
    │                 ├── content-one-column.php
    │                 └── content-two-column.php
    ├── sass
    │   ├── default
    │   │    ├── _font.scss
    │   │    ├── _global.scss
    │   │    ├── _mixin.scss
    │   │    └── _variables.scss
    │   │
    │   ├── pages
    │   │   ├── home
    │   │   │   └── _home.scss
    │   │   │
    │   │   └── modules
    │   │        ├── header
    │   │        │   └── _header.scss
    │   │        │     
    │   │        ├── footer
    │   │        │   └── _footer.scss
    │   │        │
    │   │        └── layout
    │   │            └── _one-column.scss
    │   │            └── _two-column.scss
    │   │
    │   └── style.scss
    │
    ├── assets
    │   └── images
    │
    ├── css
    │   └── style.min.css
    │
    ├── js
    │   └── script.min.js
    │
    ├── acf_fields
    │   └── home.json
    │
    ├── fonts
    │   └── sans.woff2
    │
    ├── gulpfile.js
    │
    ├── single-product.php
    │
    ├── taxonomy-product-category.php
    │
    └── Other folder and files


## 3 - Start Development
1. Make sure the Gulp setup is running for respective project.
2. `gulp watch` inside of the theme folder to start file watch and hot reload using gulp.

<br/>
<em><strong>Note:</strong> For file gulp watch to work properly the npm and other dependencies is properly installed according to the gulp script for that you can connect with your respective project oversee.</em>

[Gulp.js Development Documentation »](https://gulpjs.com/docs/en/getting-started/quick-start)

## 4 - CI/CD Workflow and Setup files
1. The current package consist of basic deployment scripts which can be find inside `.github/workflows` folder curenly they are commented and added as a sample script files
2. There are 2 seprate script files which can be used for auto deployment for respective environment
    - `prod.yml`
    - `dev.yml`
3. The script is just basic deployment and post that clearing server cache using ssh linux commands
4. For more details about the script and its working please refer this [AXIONED document »](https://docs.google.com/document/d/11VPzzeMY8Own7j8GKJYv31i6sxuVax-y7nlMgqecvAo/edit?usp=sharing) which also includes some useful links and notes abot github action usage


    #### i. CI/CD Folder Structure
    <pre>
    ├── .github
    │   └── workflows
    │       ├── prod.yml
    │       └── dev.yml
    ├── wp-content
    │   ├── themes
    │   └── plugins
    ├── .gitignore
    └── README.md
    </pre>



    #### ii. CI/CD workflow Usage
    1. Uncomment the script present in the yml files above for the respective environment against respective branch
    2. Update the Credential and other server specific details like `remote_username, remot_host, path, etc.`
    3. Also the detail steps are covered/mentioned in the above linked AXIONED document which you can follow the same to set up the CI/CD in your projects.


---

## Project Config files

- ### setup.json
    In project root folder.
Details are mentioned related to Project Database, CMS login credential and othe dependencies etc. Before installing make sure to update the JSON file as per the project (Databse and other details).

- ### env.json
    In project root folder.
ACF PRO key details should be mentioned in this JSON file.

- ### setup.php
    In project root folder.
Used for installing initial WordPress setup, plugins and other dependencies of the project is mentioned.
To bigin with the setup the following command can be used `wp --require=setup.php setup`

- ### theme-name/gulpfile.js
    Configuration file for gulp. A toolkit to automate & enhance your developement workflow
JS minification, CSS minification, optimisation, handeling vendor prefixes for CSS, ES6, SASS, ect.

