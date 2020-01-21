<?PHP

	include('db_connection.php');

	define('INTERVAL', 30); // In Seconds

	echo('Updater started!\n');
	
	while (true) {
		// Gets the URL's from DB
		$query_get_urls = "SELECT * FROM urls";
		$allUrls = mysqli_query($db_connection, $query_get_urls) or die("ERROR when trying to get urls from DB");

		while($row = mysqli_fetch_assoc($allUrls)) {

			// Makes a request to each URL
			$url = $row['url'];
			$curl = curl_init($url);   

			// Curl options
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HEADER, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

			$response = curl_exec($curl); 
			$statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
			$body = substr($response, $header_size);
			$body = utf8_encode($body);
			$body = htmlentities($body, ENT_QUOTES);

			// Updates the URL's status and body on DB
			$updateQuery = "UPDATE urls SET status = '{$statusCode}', body = " . ($body ? "'{$body}'" : 'NULL') . " WHERE url_id = '{$row['url_id']}'";
			mysqli_query($db_connection, $updateQuery) or die("ERROR when trying to update the urls on DB" . $updateQuery);

			curl_close($curl );
		}
		echo('Updated!\n');
		sleep(INTERVAL);
	}

?>
