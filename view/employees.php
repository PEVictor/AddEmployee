<h2>Employees List</h2>
<hr>
<div class="container">
	<table class="table table-borderless">
		<thead class="thead-dark">
			<tr>
			<?php
			if (!empty($employees)) {
				foreach (array_keys($employees[0]) as $value) {
					echo '<th scope="col">'.$value.'</th>';
				}
			}
			if ($admin) {
				echo '<th scope="col">Edit</th>';
			}
			?>
			</tr>
		</thead>
		<tbody>
		<?php
		if (!empty($employees)) {
			foreach ($employees as $employee) {
				echo '<tr>';
				foreach ($employee as $value) {
					echo '<td>'.$value.'</td>';
				}
				if ($admin) {
					echo '<th scope="col"><a href="?edit='.$employee["id_user"].'">Edit</a></th>';
				}
				echo '</tr>';
			}
		}
		?>
		</tbody>
	</table>
</div>