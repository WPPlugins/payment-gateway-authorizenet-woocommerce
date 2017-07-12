<?php
/*
Plugin Name: EH Authorize.Net Payment Gateway for WooCommerce (Basic)
Plugin URI: https://www.xadapter.com/product/authorize-net-payment-gateway-woocommerce/
Description: Pay using Credit Cards.
Version: 1.1.2
Author: XAdapter
Author URI: https://www.xadapter.com/
*/

// to check wether accessed directly
if (!defined('ABSPATH')) {
	exit;
}


define('EH_AUTHORIZE_NET_DIR_PATH', plugin_dir_path(__FILE__));
define('EH_AUTHORIZE_NET_PLUGIN_PATH', plugin_dir_url(__FILE__));

add_action('plugins_loaded', 'eh_authorize_net_check', 99);//to start plugin

//function to check woocommerce active
function eh_authorize_net_check()
{
	 if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
		add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'eh_authorize_net_plugin_action_links');
		eh_authorize_net_init();
	} else {
		deactivate_plugins(plugin_basename(__FILE__));
	}
}

register_activation_hook(__FILE__, 'eh_authorize_net_init_log');
include_once("includes/log.php");

//function to add action links for plugin - settings link
function eh_authorize_net_plugin_action_links($links)
{
	$setting_link = admin_url('admin.php?page=wc-settings&tab=checkout&section=eh_authorize_net_aim_card');
	$plugin_links = array(
		'<a href="' . $setting_link . '">' . __('Settings', 'eh-authorize-net-gateway') . '</a>',
		'<a href="https://www.xadapter.com/product/authorize-net-payment-gateway-woocommerce/" target="_blank">' . __( 'Premium Upgrade', 'wf-woocommerce-packing-list' ) . '</a>',
		'<a href="https://wordpress.org/support/plugin/payment-gateway-authorizenet-woocommerce" target="_blank">' . __('Support', 'eh-authorize-net-gateway') . '</a>'
	);
	return array_merge($plugin_links, $links);
}

function eh_authorize_net_init()
{
	add_filter('woocommerce_payment_gateways', 'eh_section_add_authorize_net_gateway');
	include_once('includes/class-eh-authorize-net-aim-card.php');
}

function eh_section_add_authorize_net_gateway($methods)
{
	$methods[] = 'Eh_Authorize_Net_Card';
	return $methods;
}

function eh_authorize_net_init_log()
{
    if (WC()->version >= '2.7.0') {
        $logger = wc_get_logger();
        $live_context = array('source' => 'eh_authorize_net_pay_live');
        $init_msg = EH_Authorize_Net_Log::init_live_log();
        $logger->log("debug", $init_msg, $live_context);
        $dead_context = array('source' => 'eh_authorize_net_pay_dead');
        $init_msg = EH_Authorize_Net_Log::init_dead_log();
        $logger->log("debug", $init_msg, $dead_context);
    } else {
        $log = new WC_Logger();
        $init_msg = EH_Authorize_Net_Log::init_live_log();
        $log->add("eh_authorize_net_pay_live", $init_msg);
        $init_msg = EH_Authorize_Net_Log::init_dead_log();
        $log->add("eh_authorize_net_pay_dead", $init_msg);
    }
}
