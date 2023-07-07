<?php
/**
* @when before_wp_load
*/
function setup_command() {

  // Read the JSON file
  $json = file_get_contents('setup.json');
  $json_data = json_decode($json, true);

  $acf_data = file_get_contents('env.json');
  $acf_json_data = json_decode($acf_data, true);

  $path = dirname(__FILE__);
  $ver = $json_data['version'];

  $dbname = $json_data['dbname'];
  $dbuser = $json_data['dbuser'];
  $dbpass = $json_data['dbpass'];
  $dbhost = $json_data['dbhost'];

  $site_url = $json_data['site_url'];
  $title = $json_data['title'];
  $admin_name = $json_data['admin_name'];
  $admin_password = $json_data['admin_password'];
  $admin_email = $json_data['admin_email'];

  $pluginListInstall = $json_data['pluginListInstall'];
  $pluginListUninstall = $json_data['pluginListUninstall'];

  $acf_key = $acf_json_data['acf_key'];
  $axioned_theme = $json_data['axioned_theme'];

  WP_CLI::runcommand('core download --path="'.$path.'" --version='.$ver);
  WP_CLI::runcommand('core config --dbname="'.$dbname.'" --dbuser="'.$dbuser.'" --dbpass="'.$dbpass.'" --dbhost="'.$dbhost.'" --dbprefix=wp_ --path="'.$path.'"');

  WP_CLI::runcommand('db create --path="'.$path.'"');
  WP_CLI::line("WordPress installation started...");
  WP_CLI::runcommand('core install --url="'.$site_url.'" --title="'.$title.'" --admin_name="'.$admin_name.'" --admin_password="'.$admin_password.'" --admin_email="'.$admin_email.'" --path="'.$path.'" --skip-themes');
  WP_CLI::runcommand('core verify-checksums --version='.$ver.' --path="'.$path.'"',['exit_error' => false]);
  WP_CLI::line("Plugin installation started...");
  install($pluginListInstall, $path, $acf_key);
  uninstall($pluginListUninstall, $path);
  WP_CLI::runcommand('plugin verify-checksums --all --path="'.$path.'"', ['exit_error' => false]);
  WP_CLI::runcommand('theme delete --all');
  WP_CLI::runcommand('theme install '.$axioned_theme.' --activate --path="'.$path.'"');

  WP_CLI::success('Setup Website successfully.');
}
WP_CLI::add_command('setup', 'setup_command');

// wp --require=setup.php setup

function install($pluginList, $path, $acf_key) {
    $plugCount = count($pluginList);
    $progress = \WP_CLI\Utils\make_progress_bar('Creating Posts', $plugCount);
    $options = ['exit_error' => false];

    foreach ($pluginList as $plug) {
      $name = $plug["name"];
      $status = ($plug["status"] ? $plug["status"] : "");
      $ver = ($plug["version"] ? $plug["version"] : "");

      if($name == "acf-pro") {
        if (file_put_contents('acf-pro.zip', file_get_contents("https://connect.advancedcustomfields.com/index.php?t=$ver&p=pro&a=download&k=$acf_key") ) ) {
          WP_CLI::line("ACF Pro downloaded successfully.");
          WP_CLI::runcommand("plugin install ./acf-pro.zip");
          unlink("acf-pro.zip");
          WP_CLI::runcommand("plugin activate advanced-custom-fields-pro");
        } else {
          WP_CLI::line("ACF Pro downloading failed.");
        }
        continue;
      }

      $cli = "plugin install ".$name." ".($status? " --activate ":" ").($ver? "--version=".$ver : " ").' --path="'.$path.'" ';

      WP_CLI::runcommand($cli,$options);

      $progress->tick();
    }
    $progress->finish();
    WP_CLI::success($plugCount.' Plugins Installed !!!!');
}

function uninstall($pluginList, $path) {
    $plugCount = count($pluginList);
    $progress = \WP_CLI\Utils\make_progress_bar('Creating Posts', $plugCount);

    WP_CLI::line("Exicution Started.");

    foreach ($pluginList as $plug) {
      $name = $plug["name"];
        
      WP_CLI::runcommand("plugin deactivate ".$name.' --path="'.$path.'" ');
      WP_CLI::runcommand("plugin uninstall ".$name.' --path="'.$path.'" ');

      $progress->tick();
    }
    $progress->finish();
    WP_CLI::success($plugCount.' Plugins Uninstalled !!!!');
}
