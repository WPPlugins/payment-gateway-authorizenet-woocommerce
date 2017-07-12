<?php
if (!defined('ABSPATH')) {
    exit;
}

return array(
	'eh_authorize_net_card_general_title' => array(
        'title' => __('General', 'eh-authorize-net-gateway'),
        'type' => 'title'
    ),
    'eh_authorize_net_card_enabled' => array(
        'title' => __('Authorize.Net', 'eh-authorize-net-gateway'),
        'label' => __('Enable', 'eh-authorize-net-gateway'),
        'type' => 'checkbox',
        'default' => 'no'
    ),
	'eh_authorize_net_card_title' => array(
        'title' => __('Title', 'eh-authorize-net-gateway'),
        'type' => 'text',
        'description' => __('Enter the title user will see at checkout.', 'eh-authorize-net-gateway'),
        'default' => __('Authorize.Net Card', 'eh-authorize-net-gateway'),
        'desc_tip' => true
    ),
	'eh_authorize_net_card_order_button' => array(
        'title' => __('Order Button Text', 'eh-authorize-net-gateway'),
        'type' => 'text',
        'description' => __('Enter the Order Button Text of the payment page.', 'eh-authorize-net-gateway'),
        'default' => __('Pay using Authorize.Net', 'eh-authorize-net-gateway'),
        'desc_tip' => true
    ),
	'eh_authorize_net_card_authentication_title' => array(
        'title' => __('Authentication', 'eh-authorize-net-gateway'),
        'type' => 'title'
    ),
	'eh_authorize_net_card_login_id' => array(
        'title' => __('Login ID', 'eh-authorize-net-gateway'),
        'type' => 'text',
        'description' => __('A unique key used to validate requests to Authorize.Net (it can be recovered in the "API Login ID and Transaction Key" section).', 'eh-authorize-net-gateway'),
        'placeholder' => 'Login ID'
    ),
	'eh_authorize_net_card_transaction_key' => array(
        'title' => __('Transaction Key', 'eh-authorize-net-gateway'),
        'type' => 'password',
        'description' => __('A unique key used to validate requests to Authorize.Net (it can be recovered in the "API Login ID and Transaction Key" section).', 'eh-authorize-net-gateway'),
        'placeholder' => 'Transaction Key'
    ),
	'eh_authorize_net_card_transaction_title' => array(
        'title' => __('Transaction', 'eh-authorize-net-gateway'),
        'type' => 'title'
    ),
	'eh_authorize_net_card_mode' => array(
        'title' => __('Transaction Mode', 'eh-authorize-net-gateway'),
        'type' => 'select',
        'options' => array(
            'test' => __('Test', 'eh-authorize-net-gateway'),
            'live' => __('Live', 'eh-authorize-net-gateway')
        ),
        'description' => __('', 'eh-authorize-net-gateway'),
        'default' => 'test'
    ),
	'eh_authorize_net_card_transaction_type' => array(
        'title' => __('Transaction Type', 'eh-authorize-net-gateway'),
        'type' => 'select',
        'options' => array(
            'AUTH_CAPTURE' => __('Authorize & Capture', 'eh-authorize-net-gateway'),
        ),
        'description' => __('', 'eh-authorize-net-gateway'),
        'default' => 'AUTH_CAPTURE'
    ),
	'eh_authorize_net_card_success_message' => array(
        'title' => __('Transaction Success Message', 'eh-authorize-net-gateway'),
        'type' => 'textarea',
        'css' => 'width:25em',
        'description' => __('Message to show for successful transaction.', 'eh-authorize-net-gateway'),
        'default' => __('Payment processed successfully.', 'eh-authorize-net-gateway'),
    ),
	'eh_authorize_net_card_failure_message' => array(
        'title' => __('Transaction Failure Message', 'eh-authorize-net-gateway'),
        'type' => 'textarea',
        'css' => 'width:25em',
        'description' => __('Message to show for failed transaction.', 'eh-authorize-net-gateway'),
        'default' => __('Payment has been declined.', 'eh-authorize-net-gateway'),
    ),
	'eh_authorize_net_card_logging' => array(
        'title' => __('Logging', 'eh-authorize-net-gatewayy'),
        'label' => __('Enable', 'eh-authorize-net-gateway'),
        'type' => 'checkbox',
        'default' => 'yes'
    ),
);