
<?php require_once 'databasetourist.php'; ?>

<?php 

    $db = new DatabaseMyShop();

    $conn = $db->connect();

    $rows = $conn->query("SELECT c1.title, c2.user_id FROM blog as c1 JOIN user_blog c2 ON c1.id = c2.blog_id WHERE c1.check_like = 1 AND c1.title = 'Nam o. people are friendly';");


?>

<div class="myform">
	<?php foreach ($rows as  $value): ?>
		<?php echo $value['title']; ?>
	<?php endforeach ?>
</div>

