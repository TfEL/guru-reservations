<?php

// Manegerial dashboard

// Functions
require "../api/api.fnc.php";
require "../api/settings.php";
require "loginverification.fnc.php";

// Wrapper
require "header.php";

$userData = login_verify($_COOKIE);

$db = configure_active_database();

$socket = ConnectToDatabase($db);

$query = MakeDatabaseQuery("SELECT * FROM `registrations` WHERE `WHO`='$userData[email_address]' AND `completed`='0';", $socket);

$inc = 0;
foreach($query as $key) {
	$inc++;
}

?>

<div class="page-header">
	<h2>TfEL Guru Reservations</h2>
	<p class="lead">Professional One-To-One Development</p>
</div>

<p>Welcome back, <?=$userData[first_name]?>. You have <?=$inc?> reservations upcoming.</p>

<p><a href="create_appointment.php" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Make Appointment</a></p>
	
<?php

foreach($query as $key) {
	echo "<div class=\"panel panel-default\">";
		echo "<div class=\"panel-heading\">";
			echo "<div class=\"pull-right\"><span class=\"glyphicon glyphicon-calendar\"> </span> </div>";
			echo "<p class=\"panel-title\">Guru Reservation</p>";
		echo "</div>";
		echo "<div class=\"panel-body\">";
			echo "<p><strong>When:</strong> $key[when].</p>";
			echo "<p><strong>Where:</strong> $key[where].</p>";
			echo "<p><strong>Appointment Subject:</strong> $key[for].</p>";
			echo "<div class=\"pull-right\"> <a href=\"./delete_appointment.php?id=$key[id]\" class=\"btn btn-danger\"> <span class=\"glyphicon glyphicon-remove\"></span> Cancel Appointment</a> <a href=\"./create_ical.php?event=$key[id]\" class=\"btn btn-primary\"> <span class=\"glyphicon glyphicon-flag\"></span> Download Calendar Entry (for Outlook)</a> </div>";
		echo "</div>";
	echo "</div>";
}

echo '<p><em>Please try to refrain from cancelling appointments on the day of the appointment.</em></p>';

// Wrapper
require "footer.php";

?>