<?php
if (!$request_parameters) {
	AdminHelper::controllerRedirect('/calendar/venues/');
}


if (isset($_POST['dodelete']) || isset($_REQUEST['modalconfirm'])) {
	$venue_delete_request = new CASHRequest(
		array(
			'cash_request_type' => 'calendar', 
			'cash_action' => 'deletevenue',
			'venue_id' => $request_parameters[0]
		)
	);
	if ($venue_delete_request->response['status_uid'] == 'calendar_deletevenue_200') {
		AdminHelper::formSuccess('Success. Deleted.','/calendar/venues/' . $add_response['payload']);
	} else {
		AdminHelper::formFailure('Error. There was a problem deleting.');
	}
}

$cash_admin->setPageContentTemplate('delete_confirm');
?>