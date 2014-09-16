<?php

require "authentication_header.fnc.php";

require "api.fnc.php";

require "settings.php";

$db = configure_active_database();

$socket = ConnectToDatabase($db);

$query = MakeDatabaseQuery("SELECT * FROM `registrations`;", $socket);

$return = array();

foreach ($query as $key) {
	$when = $key[when];
	$where = $key[where];
	$for = $key['for'];
	$description = $key[description];
	if ($key[priority] == 1) { $priority = "Low"; }
	if ($key[priority] == 2) { $priority = "Medium"; }
	if ($key[priority] == 3) { $priority = "High"; }
	if ($key[priority] == 4) { $priority = "Urgent (LMA)"; }
	$topush = array("id" => $key['id'], "when" => $when, "where" => $where, "for" => $for, "description" => $description, "priority" => $priority, "who" => $key['who'], );
	array_push($return, $topush);
}

echo json_encode($return, JSON_PRETTY_PRINT);

?>