<?php
/*
Plugin Name: Test Work Shop
Plugin URI: https://github.com/gurachek/wp_plugin
Description: Test Work plugin for "Codediller"
Version: 0.1
Author: Gurachek webcrash091@gmail.com
Author URI: https://gurachek.com
*/
if (preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) {
    die('You are not allowed to call this page directly.');
}

require_once 'ShopClass.php';

if (class_exists('Shop')) {
    
    register_activation_hook(__FILE__, array('Shop', 'shopInstall'));
    
    $shop = new Shop();
}