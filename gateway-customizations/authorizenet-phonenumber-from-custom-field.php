/**
 * Customize Authorize.net payment params. In this case, a phone number from a custom field. Change your_phone_number to the name attribute of the phone field. 
 *
 * Note that this is meant for versionf of The Give Authorize gateway plugin BEFORE 1.3.3, when the gateway code was changed from POST transactions to webhooks. This codes does not work with webhooks.
 * 
 * @param array $args The request that's sent to Authorize.net
 *
 * @return array $args
 */
function guidedogs_authorizenet_phone($args){
	$phone = "";
	if(! empty( $_POST['your_phone_number'] ) ? $_POST['your_phone_number'] : 'undefined'){
		$phone = $_POST['your_phone_number'];
	}
	$args['transactionRequest']['phoneNumber'] = $phone;
	$args->phoneNumber = $phone;

	return $args;

}

add_filter( 'give_authorize_payment_args', 'guidedogs_authorizenet_phone', 100 );
