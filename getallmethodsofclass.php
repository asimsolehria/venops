<?php
/**
 * Customer completed order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php /* translators: %s: Customer first name */ ?>
<p><?php printf( esc_html__( 'Hi %s,', 'woocommerce' ), esc_html( $order->get_billing_first_name() ) ); ?></p>
<?php /* translators: %s: Site title */ ?>
<p><?php esc_html_e( 'We have finished processing your order.', 'woocommerce' ); ?></p>

<p>
This is a confirmation message for your Venops membership activation. 
<p>
Below, you will find links to download a quick-start guide and the corresponding template used for generating OIG exclusion reports. All templates and guides are always available in the Downloads area whenever you are logged in.
<p>
<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );
// $subscription=wcs_get_subscriptions_for_order( $order->id );

// foreach ($subscription as $key => $value)
// 	$subscription=$value;


// echo $subscription->get_date( 'start');
// echo $subscription->get_date( 'next_payment');
// echo "\n";
// echo date("F j, Y", strtotime($subscription->get_date( 'start')));

// 	$orders=$subscription->get_related_orders( 'all' );
// foreach ($orders as $key => $value) {
// 	echo $value->get_billing_email;
// }

$items=$order->get_items();


$additional=NULL;
foreach ($items as $key => $value) {
	$additional=$value->get_meta_data();
}

echo $additional[1]->get_data()["key"];
echo $additional[1]->get_data()["value"];

// $class_methods = get_class_methods($value);
// 	foreach ($class_methods as $method_name) 
// 		{
// 			echo "$method_name<br/>";
// 		}

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

?>
<p>
The Venops website includes a <a href="http://venops.com/knowledge-base/" target="_blank" rel="noopener">Knowlege Base</a> with complete guides for each of our regulatory compliance services, as well as useful direct-source references.
<p>
</p>
Questions? You can always email us at <a href="mailto:memberservices@venops.com">memberservices@venops.com</a> for direct assistance.
<p>
</p>
Welcome to regulatory compliance for professionals.
<p>
</p>
Venops Member Services
</p>
<?php

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
