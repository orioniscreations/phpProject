<?php  include('../config.php'); ?>
<?php  include('includes/admin_functions.php'); ?>
<?php include('includes/header.php'); ?>
<!-- Get all topics from DB -->
<?php $type = getAllTopics();	?>
	<title>Admin | Manage Topics</title>
</head>
<body>
	<!-- admin navbar -->
	<?php include( 'includes/navbar.php') ?>
	<div class="container content">
		<!-- Left side menu -->
		<?php include( 'includes/menu.php') ?>

		<!-- Middle form - to create and edit -->
		<div class="action">
			<h1 class="page-title">Create/Edit Comic Types</h1>
			<form method="post" action="<?php echo BASE_URL . 'types.php'; ?>" >
				<!-- validation errors for the form -->
				<?php include( '../includes/errors.php') ?>
				<!-- if editing topic, the id is required to identify that topic -->
				<?php if ($isEditingTopic === true): ?>
					<input type="hidden" name="type_id" value="<?php echo $type_id; ?>">
				<?php endif ?>
				<input type="text" name="type_name" value="<?php echo $type_name; ?>" placeholder="Topic">
				<!-- if editing topic, display the update button instead of create button -->
				<?php if ($isEditingTopic === true): ?> 
					<button type="submit" class="btn" name="update_type">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn" name="create_type">Save</button>
				<?php endif ?>
			</form>
		</div>
		<!-- // Middle form - to create and edit -->

		<!-- Display records from DB-->
		<div class="table-div">
			<!-- Display notification message -->
			<?php include( '../includes/messages.php') ?>
			<?php if (empty($type)): ?>
				<h1>No topics in the database.</h1>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>#</th>
						<th>Comic Type</th>
						<th colspan="2">Action</th>
					</thead>
					<tbody>
					<?php foreach ($type as $key => $type): ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $type['type']; ?></td>
							<td>
								<a class="fa fa-pencil btn edit"
									href="types.php?edit-topic=<?php echo $type['id'] ?>">
								</a>
							</td>
							<td>
								<a class="fa fa-trash btn delete"								
									href="types.php?delete-topic=<?php echo $type['id'] ?>">
								</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
		</div>
		<!-- // Display records from DB -->
	</div>
</body>
</html>