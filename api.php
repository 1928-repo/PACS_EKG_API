<?php

	require 'worklist.php';
	require 'archive.php';

	switch ($_SERVER['REQUEST_METHOD']) {

		case 'GET':

			// get worklist from DB
			$users = getWorklist();

			// send json response
			header('Content-Type: application/json');
   		echo json_encode($users, JSON_PRETTY_PRINT);

			break;


		case 'POST':

			header('Content-Type: application/json');
			$requestBody = json_decode(file_get_contents('php://input'), true);

			// parse archive
			$archive = parseArchive($requestBody);
			if (!$archive) {
					http_response_code(404);
					echo json_encode(['message' => 'Archive file not found']);
					break;
			}

			storeArchive($archive);

			echo json_encode(['message' => 'archive stored successfully']);

			break;


	}
?>
