<?php
/**
 * Plugin Name: afzal-gateway
 * Plugin URI: https://wordpress.org/plugins/afzal-gateway/
 * Description: we can pay to into your woocommerce through this gateway
 * Version: 1.0.0
 * Requires at least: 6.3
 * Requires PHP: 8.1
 * Author: afzal
 * Author URI:
 * License: GPLv2 or later
 * License URI:
 * Update URI: 
 * Text Domain: afzal-pay
 */

 if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) return;

add_action( 'plugins_loaded', 'afzal_payment_init', 11 );

function afzal_payment_init() {
    if( class_exists( 'WC_Payment_Gateway' ) ) {
        class WC_AfzalGateway extends WC_Payment_Gateway {
            public function __construct() {
                $this->id   = 'afzal_payment';
                $this->icon = '';
                $this->has_fields = false;
                $this->method_title = __( 'Afzal Payment', 'afzal-pay');
                $this->method_description = __( 'Afzal local content payment systems.', 'afzal-pay');

                $this->supports = array(
                    'products'
                );

                $this->init_form_fields();
                $this->init_settings();

                $this->title = $this->get_option( 'title' );
                $this->description = $this->get_option( 'description' );
                $this->instructions = $this->get_option( 'instructions', $this->description );

                add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
                add_action( 'woocommerce_thank_you_' . $this->id, array( $this, 'thank_you_page' ) );
            }

            public function init_form_fields() {
                $this->form_fields = apply_filters( 'woo_afzal_pay_fields', array(
                    'enabled' => array(
                        'title' => __( 'Enable/Disable', 'afzal-pay'),
                        'type' => 'checkbox',
                        'label' => __( 'Enable or Disable Afzal Payments', 'afzal-pay'),
                        'default' => 'no'
                    ),
                    'title' => array(
                        'title' => __( 'Afzal Payments Gateway', 'afzal-pay'),
                        'type' => 'text',
                        'default' => __( 'Afzal Payments Gateway', 'afzal-pay'),
                        'desc_tip' => true,
                        'description' => __( 'Add a new title for the Afzal Payments Gateway that customers will see when they are in the checkout page.', 'afzal-pay')
                    ),
                    'description' => array(
                        'title' => __( 'Afzal Payments Gateway Description', 'afzal-pay'),
                        'type' => 'textarea',
                        'default' => __( 'Please remit your payment to the shop to allow for the delivery to be made', 'afzal-pay'),
                        'desc_tip' => true,
                        'description' => __( 'Add a new title for the Afzal Payments Gateway that customers will see when they are in the checkout page.', 'afzal-pay')
                    ),
                    'instructions' => array(
                        'title' => __( 'Instructions', 'afzal-pay'),
                        'type' => 'textarea',
                        'default' => __( 'Default instructions', 'afzal-pay'),
                        'desc_tip' => true,
                        'description' => __( 'Instructions that will be added to the thank you page and odrer email', 'afzal-pay')
                    ),

                ));
            }

            public function process_payment( $order_id ) {
                global $woocommerce;

                $order = wc_get_order($order_id);

                $order_data = $order->get_data();

                $response = wp_remote_post(
                    'http://task-gateway-laravel.test/api/larapay',
                    array(
                        'body' => json_encode(array('order' => $order_data)),
                        'headers' => array('Content-Type' => 'application/json'),
                    )
                );

                if (!is_wp_error($response)) {
                    $response_body = wp_remote_retrieve_body($response);
                    $response_data = json_decode($response_body, true);
            

                    if ($response_data && isset($response_data['status']) && $response_data['status'] === 'success') {
                        $order->update_status('on-hold', __('Awaiting Afzal Payment', 'afzal-pay'));

                        $order->reduce_order_stock();

                        WC()->cart->empty_cart();

                        return array(
                            'result' => 'success',
                            'redirect' => $this->get_return_url($order),
                        );
                    } else {
                        wc_add_notice(__('Connection error or invalid response.', 'afzal-pay'), 'error');
                        return;
                    }
                } else {
                    wc_add_notice(__('Connection error.', 'afzal-pay'), 'error');
                    return;
                }



            }


            public function thank_you_page(){
                if( $this->instructions ){
                    echo wpautop( $this->instructions );
                }
            }
        }
    }

    add_filter( 'woocommerce_payment_gateways', 'add_to_woo_afzal_payment_gateway' );
}


function add_to_woo_afzal_payment_gateway( $gateways ) {
    $gateways[] = 'WC_AfzalGateway';
    return $gateways;
}
