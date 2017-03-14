<div class="ui grid">
	<?php 
		if (isset($_GET['approved'])) {
			$approved = $_GET['approved'];

			if ($approved == 1) { ?>
                <div class="four wide column">
                	<div class="ui green message">
	                    <i class="close icon"></i>
	                    <strong>Потребителя беше одобрен</strong>
	                </div>
                </div>
                <!-- Message close -->
				<script>
				    $('.message .close')
				      .on('click', function() {
				        $(this)
				          .closest('.message')
				          .transition('fade')
				        ;
				      })
				    ;
				</script>
	<?php	}
		}
 	?>
	<div class="four column row">
		<h2 class="text-center">Директори чакащи за одобрение</h2>
		<table class="ui selectable celled table">
			<thead>
				<tr>
					<th>Име</th>
					<th>Фамилия</th>
					<th>Username</th>
					<th>Email</th>
					<th>Училище</th>
					<th>Дата на регистрация</th>
					<th>Одобри</th>
					<th>Отхвърли</th>
				</tr>
			</thead>
			<tbody>
		<?php 
			$rows = getRegistrations($db, $role['id']);

			foreach ($rows as $row) { 
				$school = getSchool($db, $row['school_id']);
				?>
				<tr>
					<td><?= htmlspecialchars($row['first_name']) ?></td>
					<td><?= htmlspecialchars($row['last_name']) ?></td>
					<td><?= htmlspecialchars($row['username']) ?></td>
					<td><?= htmlspecialchars($row['email']) ?></td>
					<td><?= htmlspecialchars($school['name']) ?></td>
					<td><?= htmlspecialchars($row['registered_at']) ?></td>
					<td>
						<a href="back-end/approve-user.php?id=<?= $row['id'] ?>">
							<i class="add user icon" style="font-size: 1.5em;"></i>
						</a>
					</td>
					<td>
						<a href="back-end/decline-user.php?id=<?= $row['id'] ?>">
							<i class="remove user icon" style="font-size: 1.5em;"></i>
						</a>
					</td>
				</tr>
	<?php	}
		?>
			</tbody>
		</table>
	</div>
</div>