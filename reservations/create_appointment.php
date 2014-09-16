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

?>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>

<script type="text/javascript">
tinymce.init({
    selector: "textarea",
	menubar: false
 });
</script>

<div class="page-header">
	<h2>TfEL Guru Reservations</h2>
	<p class="lead">Professional One-To-One Development</p>
</div>

<p><a href="./dashboard.php" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Back</a></p>

<form action="create_edit_scaffold.php" method="get">
	<input type="hidden" name="owner" value="<?=$userData[email_address]?>">
	<p>Date &amp; time<br>
	<input type="datetime-local" name="whem" class="form-control" placeholder="2014-12-25 09:00 am" required><em><a href="#">Click here to check this time for availability on non urgent requests</a></em></p>
	<p>Where <br>
	<input type="text" name="where" class="form-control" placeholder="Level 4, 31 Flinders Street, Adelaide" required></p>
	<p>For <br>
	<select name="for" class="form-control"><option value="Mac">General Mac Technical Issue</option><option value="iOS">General iDevice Technical Issue</option><option value="PC">General PC Technical Issue</option><option value="Broken Device">Broken Device(s)?</option><option value="Deployment">iPad Case Software Request</option><option value="Security">Web Security / Safety Issue</option><option value="Presentation">Presentation Support</option><option value="Other">Other</option></select></p>
	<p>Priority <br>
	<select name="priority" class="form-control"><option value="1">Low importance (up to 14 business days)</option><option value="2">Mid importance (up to 8 business days)</option><option value="3">High importance (up to 5 business days)</option><option value="4">Urgent Importance (1 business day) *</option></select></p>
	<p>Problem description (doesn't need to be in depth) <br>
	<textarea name="description"> </textarea></p>
	<p class="pull-right">Resize here ^</p>
	<p><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-ok"></span> Create Appointment</button></p>
</form>
<p><font color=red>*</font> indicates requirement for line-manager approval.</p>
<?php

// Wrapper
require "footer.php";

?>