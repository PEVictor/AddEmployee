<div>
	<?php
	if ($error) {
		echo "<p>Error</p>";
	} 
	?>
	<form method="post">
		<input type="email" name="email">
		<input type="password" name="password">
		<input type="submit" name="login">
	</form>
</div>