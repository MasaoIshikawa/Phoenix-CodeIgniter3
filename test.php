<?php
/**
 * FoxyCart Test XML Generator
 * 
 * @link http://wiki.foxycart.com/integration:misc:test_xml_post
 * @version 2.0
 */
/*
	DESCRIPTION: =================================================================
	The purpose of this file is to help you set up and debug your FoxyCart XML DataFeed scripts.
	It's designed to mimic FoxyCart.com and send encrypted and encoded XML to a URL of your choice.
	It will print out the response that your script gives back, which should be "foxy" if successful.
	
	USAGE: =======================================================================
	- Place this file somewhere on your server.
	- Edit the $myURL to the URL where your XML processing script is located.
	- Edit the $myKey to match the key you put in your FoxyCart admin.
	- Edit the $XMLOutput if you have specific data you'd like to test.
	- Save.
	- Load this file in your browser. It will send XML to your script just like FoxyCart would
	  after an order on your store, and will output what your script returns.
	- Test until you get your script working properly.
	
	REQUIREMENTS: ================================================================
	- PHP
	- cURL support in PHP
*/
// ======================================================================================
// CHANGE THIS DATA:
// Set the URL you want to post the XML to.
// Set the key you entered in your FoxyCart.com admin.
// Modify the XML below as necessary.  DO NOT modify the structure, just the data
// ======================================================================================
$myURL = 'http://wsddev2.com/dev/phoenix/myaccount/order_history/order_add_feed/';
$myKey = 'testkey3421wertyq';

// You can change the test data below if you'd like to test specific fields.
// For example, you may want to set it up to mirror 
$XMLOutput = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>

<foxydata>
	<transactions>
		<transaction>
			<id><![CDATA[52768]]></id>
			<store_id><![CDATA[9]]></store_id>
			<store_version><![CDATA[0.7.0]]></store_version>
			<is_test><![CDATA[1]]></is_test>
			<is_hidden><![CDATA[0]]></is_hidden>
			<data_is_fed><![CDATA[0]]></data_is_fed>
			<transaction_date><![CDATA[2010-08-19 13:50:00]]></transaction_date>
			<processor_response><![CDATA[Authorize.net Transaction ID:2154082729]]></processor_response>
			<customer_id><![CDATA[193]]></customer_id>
			<is_anonymous><![CDATA[0]]></is_anonymous>
			<minfraud_score><![CDATA[0]]></minfraud_score>
			<customer_first_name><![CDATA[Jörgé •™¡ªº]]></customer_first_name>
			<customer_last_name><![CDATA[Cantú]]></customer_last_name>
			<customer_company><![CDATA[Your Company]]></customer_company>
			<customer_address1><![CDATA[&amp;]]></customer_address1>
			<customer_address2><![CDATA[]]></customer_address2>
			<customer_city><![CDATA[seal beach]]></customer_city>
			<customer_state><![CDATA[CA]]></customer_state>
			<customer_postal_code><![CDATA[90740]]></customer_postal_code>
			<customer_country><![CDATA[US]]></customer_country>
			<customer_phone><![CDATA[]]></customer_phone>
			<customer_email><![CDATA[test@example.com]]></customer_email>
			<customer_ip><![CDATA[123.123.123.123]]></customer_ip>
			<shipping_first_name><![CDATA[]]></shipping_first_name>
			<shipping_last_name><![CDATA[]]></shipping_last_name>
			<shipping_company><![CDATA[]]></shipping_company>
			<shipping_address1><![CDATA[]]></shipping_address1>
			<shipping_address2><![CDATA[]]></shipping_address2>
			<shipping_city><![CDATA[]]></shipping_city>
			<shipping_state><![CDATA[]]></shipping_state>
			<shipping_postal_code><![CDATA[]]></shipping_postal_code>
			<shipping_country><![CDATA[]]></shipping_country>
			<shipping_phone><![CDATA[]]></shipping_phone>
			<shipto_shipping_service_description><![CDATA[USPS Priority Mail Flat Rate Envelope]]></shipto_shipping_service_description>
			<purchase_order><![CDATA[]]></purchase_order>
			<cc_number_masked><![CDATA[xxxxxxxxxxxx4242]]></cc_number_masked>
			<cc_type><![CDATA[Visa]]></cc_type>
			<cc_exp_month><![CDATA[08]]></cc_exp_month>
			<cc_exp_year><![CDATA[2013]]></cc_exp_year>
			<cc_start_date_month><![CDATA[06]]></cc_start_date_month>
			<cc_start_date_year><![CDATA[2008]]></cc_start_date_year>
			<cc_issue_number><![CDATA[01]]></cc_issue_number>
			<product_total><![CDATA[12.35]]></product_total>
			<tax_total><![CDATA[0]]></tax_total>
			<shipping_total><![CDATA[7.52]]></shipping_total>
			<order_total><![CDATA[19.87]]></order_total>
			<payment_gateway_type><![CDATA[authorize]]></payment_gateway_type>
			<receipt_url><![CDATA[http://themancan.foxycart.com/receipt?id=28a313c5217794e89a989ccd69eefa40]]></receipt_url>
			<taxes/>
			<discounts/>
			<attributes/>
			<status>approved</status>
			<customer_password><![CDATA[2e29f4fa2efb67dc28860abf05523a1784829a90177c1477460e42da00f81659]]></customer_password>
			<customer_password_salt><![CDATA[SSCtVKDnH1vAwuLyY2XHziIFv3fN5laN8DbYiIcUDBkZW2pP]]></customer_password_salt>
			<customer_password_hash_type><![CDATA[sha256_salted_suffix]]></customer_password_hash_type>
			<customer_password_hash_config><![CDATA[48]]></customer_password_hash_config>
			<custom_fields>
				<custom_field>
					<custom_field_name><![CDATA[example_hidden]]></custom_field_name>
					<custom_field_value><![CDATA[value_1]]></custom_field_value>
					<custom_field_is_hidden><![CDATA[1]]></custom_field_is_hidden>
				</custom_field>
				<custom_field>
					<custom_field_name><![CDATA[Hidden_Value]]></custom_field_name>
					<custom_field_value><![CDATA[My Name Is_Jonas©;&amp;texture &amp;_ smoothness=rough||929274e2c2b22d8d51540d8bf657eef133121d7e67c05284687edcd8bfdcd946]]></custom_field_value>
					<custom_field_is_hidden><![CDATA[1]]></custom_field_is_hidden>
				</custom_field>
			</custom_fields>
			<transaction_details>
				<transaction_detail>
					<product_name><![CDATA[Example Product with Hex and Plus Spaces]]></product_name>
					<product_price><![CDATA[10.00]]></product_price>
					<product_quantity><![CDATA[2]]></product_quantity>
					<product_weight><![CDATA[4.000]]></product_weight>
					<product_code><![CDATA[abc123zzz]]></product_code>
					<parent_code><![CDATA[]]></parent_code>
					<image><![CDATA[]]></image>
					<url><![CDATA[]]></url>
					<length><![CDATA[]]></length>
					<width><![CDATA[]]></width>
					<height><![CDATA[]]></height>
					<expires><![CDATA[]]></expires>
					<sub_token_url><![CDATA[]]></sub_token_url>
					<subscription_frequency><![CDATA[]]></subscription_frequency>
					<subscription_startdate><![CDATA[0000-00-00]]></subscription_startdate>
					<subscription_nextdate><![CDATA[0000-00-00]]></subscription_nextdate>
					<subscription_enddate><![CDATA[0000-00-00]]></subscription_enddate>
					<is_future_line_item>0</is_future_line_item>
					<shipto><![CDATA[]]></shipto>
					<category_description><![CDATA[Discount: Price: Percentage]]></category_description>
					<category_code><![CDATA[discount_price_percentage]]></category_code>
					<product_delivery_type><![CDATA[shipped]]></product_delivery_type>
					<transaction_detail_options>
						<transaction_detail_option>
							<product_option_name><![CDATA[color]]></product_option_name>
							<product_option_value><![CDATA[red]]></product_option_value>
							<price_mod><![CDATA[-4.000]]></price_mod>
							<weight_mod><![CDATA[0.000]]></weight_mod>
						</transaction_detail_option>
						<transaction_detail_option>
							<product_option_name><![CDATA[Quantity Discount]]></product_option_name>
							<product_option_value><![CDATA[$0.50]]></product_option_value>
							<price_mod><![CDATA[0.500]]></price_mod>
							<weight_mod><![CDATA[0.000]]></weight_mod>
						</transaction_detail_option>
						<transaction_detail_option>
							<product_option_name><![CDATA[Price Discount Amount]]></product_option_name>
							<product_option_value><![CDATA[-5%]]></product_option_value>
							<price_mod><![CDATA[-0.325]]></price_mod>
							<weight_mod><![CDATA[0.000]]></weight_mod>
						</transaction_detail_option>
					</transaction_detail_options>
				</transaction_detail>
			</transaction_details>
			<shipto_addresses/>
		</transaction>
	</transactions>
</foxydata>';



// ======================================================================================
// YOU'RE DONE.  DO NOT MODIFY BELOW THIS LINE.
// The code below this line should not be modified unless you have a good reason to do so.
// ======================================================================================

// ======================================================================================
// ENCRYPT YOUR XML
// Modify the include path to go to the rc4crypt file.
// ======================================================================================
$XMLOutput_encrypted = rc4crypt::encrypt($myKey,$XMLOutput);
$XMLOutput_encrypted = urlencode($XMLOutput_encrypted);


// ======================================================================================
// POST YOUR XML TO YOUR SITE
// Do not modify.
// ======================================================================================
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $myURL);
curl_setopt($ch, CURLOPT_POSTFIELDS, array("FoxyData" => $XMLOutput_encrypted));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
// Shared hosting users on GoDaddy or other hosts may need to uncomment the following lines:
// curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
// curl_setopt($ch, CURLOPT_PROXY,"http://64.202.165.130:3128"); // Replace this IP with whatever your host specifies.
// End shared hosting options
$response = curl_exec($ch);
curl_close($ch);


header("content-type:text/plain");
print $response;




// ======================================================================================
// RC4 ENCRYPTION CLASS
// Do not modify.
// ======================================================================================
/**
 * RC4Crypt 3.2
 *
 * RC4Crypt is a petite library that allows you to use RC4
 * encryption easily in PHP. It's OO and can produce outputs
 * in binary and hex.
 *
 * (C) Copyright 2006 Mukul Sabharwal [http://mjsabby.com]
 *     All Rights Reserved
 *
 * @link http://rc4crypt.devhome.org
 * @author Mukul Sabharwal <mjsabby@gmail.com>
 * @version $Id: class.rc4crypt.php,v 3.2 2006/03/10 05:47:24 mukul Exp $
 * @copyright Copyright &copy; 2006 Mukul Sabharwal
 * @license http://www.gnu.org/copyleft/gpl.html
 * @package RC4Crypt
 */

/**
 * RC4 Class
 * @package RC4Crypt
 */
class rc4crypt {
	/**
	 * The symmetric encryption function
	 *
	 * @param string $pwd Key to encrypt with (can be binary of hex)
	 * @param string $data Content to be encrypted
	 * @param bool $ispwdHex Key passed is in hexadecimal or not
	 * @access public
	 * @return string
	 */
	function encrypt ($pwd, $data, $ispwdHex = 0)
	{
		if ($ispwdHex)
			$pwd = @pack('H*', $pwd); // valid input, please!

		$key[] = '';
		$box[] = '';
		$cipher = '';

		$pwd_length = strlen($pwd);
		$data_length = strlen($data);

		for ($i = 0; $i < 256; $i++)
		{
			$key[$i] = ord($pwd[$i % $pwd_length]);
			$box[$i] = $i;
		}
		for ($j = $i = 0; $i < 256; $i++)
		{
			$j = ($j + $box[$i] + $key[$i]) % 256;
			$tmp = $box[$i];
			$box[$i] = $box[$j];
			$box[$j] = $tmp;
		}
		for ($a = $j = $i = 0; $i < $data_length; $i++)
		{
			$a = ($a + 1) % 256;
			$j = ($j + $box[$a]) % 256;
			$tmp = $box[$a];
			$box[$a] = $box[$j];
			$box[$j] = $tmp;
			$k = $box[(($box[$a] + $box[$j]) % 256)];
			$cipher .= chr(ord($data[$i]) ^ $k);
		}
		return $cipher;
	}
	/**
	 * Decryption, recall encryption
	 *
	 * @param string $pwd Key to decrypt with (can be binary of hex)
	 * @param string $data Content to be decrypted
	 * @param bool $ispwdHex Key passed is in hexadecimal or not
	 * @access public
	 * @return string
	 */
	function decrypt ($pwd, $data, $ispwdHex = 0)
	{
		return rc4crypt::encrypt($pwd, $data, $ispwdHex);
	}
}
// ======================================================================================
// END RC4 ENCRYPTION CLASS
// Do not modify.
// ======================================================================================

?>