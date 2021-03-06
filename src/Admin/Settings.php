<?php

namespace Ribarich\SE\Admin;

use Ribarich\SE;

class Settings {

	public $shipping_method_ids = array();

	public function init() {
		$this->init_shipping_method_ids();
		foreach ( $this->shipping_method_ids as $id ) {
			\add_filter( 'woocommerce_shipping_instance_form_fields_' . $id, array( $this, 'add_shipping_method_settings' ) );
		}
	}

	public function add_shipping_method_settings( $settings ) {
		$settings['ribarich_se_shipping_insurance']             = array(
			'title'             => __( 'Insurance percentage', 'ribarich_se' ),
			'type'              => 'text',
			'placeholder'       => '',
			'description'       => __( 'A customer has the choice to insure the shipment. Insurance cost is calculated as a percentage of products + shipping cost.', 'ribarich_se' ),
			'default'           => '0',
			'desc_tip'          => true,
			'sanitize_callback' => 'sanitize_text_field',
		);
		$settings['ribarich_se_shipping_insurance_apply_taxes'] = array(
			'title'       => __( 'Shipping insurance taxable', 'ribarich_se' ),
			'type'        => 'checkbox',
			'description' => __( 'Whether taxes should be applied to shipping insurance costs.', 'ribarich_se' ),
			'desc_tip'    => true,
		);

		return $settings;
	}

	public function init_shipping_method_ids() {
		$this->shipping_method_ids = array(
			'flat_rate',
			'inxpress_dhl_express',
			'inxpress_purolator',
			'inxpress_ups',
			'inxpress_canpar',
		);
	}

}
