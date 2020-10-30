<?php
echo " <div class='form_login_err'> ";
if (count($login_err_Array) > 0) {
	foreach ($login_err_Array  as $error) {
		echo "<h5>".$error."</h5><br>";
}
}
echo "</div>";

					