<?php 

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASENAME", "db_dhlrate");


$conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASENAME);

if(!$conn){
	echo "error in mysql connect";
}
//echo "connect sucess";

function escape($value, $conn) {
		return $conn->real_escape_string($value);
	}

 function query($sql, $conn) {
	$query = $conn->query($sql);

	if (!$conn->errno){
		if (isset($query->num_rows)) {
			$data = array();

			while ($row = $query->fetch_assoc()) {
				$data[] = $row;
			}

			$result = new stdClass();
			$result->num_rows = $query->num_rows;
			$result->row = isset($data[0]) ? $data[0] : array();
			$result->rows = $data;

			unset($data);

			$query->close();

			return $result;
		} else{
			return true;
		}
	} else {
		throw new ErrorException('Error: ' . $conn->error . '<br />Error No: ' . $conn->errno . '<br />' . $sql);
		exit();
	}
}
?>


