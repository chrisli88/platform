<?php


namespace CASHMusic\Admin;

use CASHMusic\Core\CASHSystem as CASHSystem;
use CASHMusic\Core\CASHRequest as CASHRequest;
use ArrayIterator;
use CASHMusic\Admin\AdminHelper;


if (isset($_REQUEST['connection_id']) && isset($_REQUEST['filename'])) {
	$success_response = $cash_admin->requestAndStore(
		array(
			'cash_request_type' => 'asset', 
			'cash_action' => 'finalizeupload',
			'connection_id' => $_REQUEST['connection_id'],
			'filename' => $_REQUEST['filename']
		)
	);
	if ($success_response['payload']) {
		echo '{"success":"true"}';
	} else {
		echo '{"success":"false"}';
	}
} else {
	echo '{"success":"false"}';
}
exit();
?>