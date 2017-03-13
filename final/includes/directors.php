<div class="ui grid">
	<div class="four column row">
		<table class="ui selectable celled table">
			<thead>
				<tr>
					<th>Име</th>
					<th>Фамилия</th>
					<th>Username</th>
					<th>Email</th>
					<th>Училище</th>
					<th>Дата на регистрация</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Ангел</td>
					<td>Миладинов</td>
					<td>angelcho</td>
					<td>miladinov_1997@abv.bg</td>
					<td>81 "СОУ Виктор Юго"</td>
					<td>12-03-2017</td>
				</tr>
		<?php 
			$rows = getRegistrations($db, $role['role_id']);

			foreach ($rows as $row) { ?>
				<tr>
					<td>Ангел</td>
					<td>Миладинов</td>
					<td>angelcho</td>
					<td>miladinov_1997@abv.bg</td>
					<td>81 "СОУ Виктор Юго"</td>
					<td>12-03-2017</td>
				</tr>
	<?php	}
		?>
			</tbody>
		</table>
	</div>
</div>