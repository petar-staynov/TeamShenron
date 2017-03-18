<div class="ui grid">
	<?php 
		if (isset($_GET['approved'])) {
			$approved = $_GET['approved'];

			if ($approved == 1) { ?>
                <div class="sixteen wide column">
                	<div class="ui green message msg3">
	                    <i class="close icon"></i>
	                    <strong>Учителят беше одобрен</strong>
	                </div>
                </div>
                <!-- Message close -->
				<script>
				    $('.msg3 .close')
				      .on('click', function() {
				        $(this)
				          .closest('.msg3')
				          .transition('fade')
				        ;
				      })
				    ;
				</script>
	<?php	}
		}
		elseif (isset($_GET['declined'])) {
			$declined = $_GET['declined'];

			if ($declined == 1) { ?>
				<div class="sixteen wide column">
                	<div class="ui green message">
	                    <i class="close icon"></i>
	                    <strong>Учителят беше премахнат</strong>
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
	<div class="sixteen wide column">
		<h2 class="text-center">Учители чакащи за одобрение</h2>
		<div class="ui divider"></div>
		<?php 
			$rows = getRegistrations($db, $role['id']);

			if (count($rows)) {
		?>
		<table class="ui selectable celled table">
			<thead>
				<tr>
					<th>Име</th>
					<th>Фамилия</th>
					<th>Username</th>
					<th>Email</th>
					<th>Училище</th>
					<th>Клас</th>
					<th>Дата на регистрация</th>
					<th>Одобри</th>
					<th>Отхвърли</th>
				</tr>
			</thead>
			<tbody>
		<?php 
			foreach ($rows as $row) { 
				$school = getSchool($db, $row['school_id']);
				$class = getClass($db, $row['class_id']);
				?>
				<tr>
					<td><?= htmlspecialchars($row['first_name']) ?></td>
					<td><?= htmlspecialchars($row['last_name']) ?></td>
					<td><?= htmlspecialchars($row['username']) ?></td>
					<td><?= htmlspecialchars($row['email']) ?></td>
					<td><?= htmlspecialchars($school['name']) ?></td>
					<td><?= htmlspecialchars($class['class_num']) ?><?= htmlspecialchars($class['class_letter']) ?></td>
					<td><?= htmlspecialchars($row['registered_at']) ?></td>
					<td>
						<a href="back-end/approve-teacher.php?id=<?= $row['id'] ?>">
							<i class="add user icon" style="font-size: 1.5em;"></i>
						</a>
					</td>
					<td>
						<a href="back-end/decline-teacher.php?id=<?= $row['id'] ?>">
							<i class="remove user icon" style="font-size: 1.5em;"></i>
						</a>
					</td>
				</tr>
	<?php	}
		?>
			</tbody>
		</table>
		<?php 
			//endif 
			}
			else { ?>
				<h3>Няма неодобрени регистрации</h3>
	<?php	}	
		?>
	</div>


</div>

<div class="ui grid">
	<?php 
		if (isset($_GET['approved'])) {
			$approved = $_GET['approved'];

			if ($approved == 2) { ?>
                <div class="sixteen wide column">
                	<div class="ui green message msg">
	                    <i class="close icon"></i>
	                    <strong>Одобрен клас</strong>
	                </div>
                </div><br>
                <!-- Message close -->
				<script>
				    $('.msg .close')
				      .on('click', function() {
				        $(this)
				          .closest('.msg')
				          .transition('fade')
				        ;
				      })
				    ;
				</script>
	<?php	}
		}
		elseif (isset($_GET['declined'])) {
			$declined = $_GET['declined'];

			if ($declined == 0) { ?>
				<div class="sixteen wide column">
                	<div class="ui green message msg2">
	                    <i class="close icon"></i>
	                    <strong>Премахнат клас успешно!</strong>
	                </div>
                </div>
                <!-- Message close -->
				<script>
				    $('.msg2 .close')
				      .on('click', function() {
				        $(this)
				          .closest('.msg2')
				          .transition('fade')
				        ;
				      })
				    ;
				</script>
	<?php	}
		}
 	?>
	<div class="sixteen wide column">
		<h2 class="text-center">Класове</h2>
		<div class="ui divider"></div>
		<?php 
			$rows = getClasses($db, $role['id']);
			
			
			if (count($rows)) {
		?>
		<table class="ui selectable celled table">
			<thead>
				<tr>
					<th>Клас</th>
					<th>Буква</th>
					<th>Учител</th>
					<th>Отхвърли</th>
				</tr>
			</thead>
			<tbody>
		<?php 
			foreach ($rows as $row) { 
				$teacher = getTeacher($db, $row['teacher_id']);
				?>
				<tr>
					<td><?= htmlspecialchars($row['class_num']) ?></td>
					<td><?= htmlspecialchars($row['class_letter']) ?></td>
					<td><?= htmlspecialchars($teacher['first_name']) ?> <?= htmlspecialchars($teacher['last_name']) ?></td>
					<td>
						<a href="back-end/decline-class.php?id=<?= $row['id'] ?>">
							<i class="remove user icon" style="font-size: 1.5em;"></i>
						</a>
					</td>
				</tr>
	<?php	}
		?>
			</tbody>
		</table>
		<?php 
			//endif 
			}
			else { ?>
				<h3>Няма неодобрени регистрации</h3>
	<?php	}	
		?>
	</div>

	
</div>