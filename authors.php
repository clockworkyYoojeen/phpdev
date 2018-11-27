<?php 
require "config.php";
require "db_queries.php";
require "page_parts.php";

page_header();
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
						<div class="panel panel-success">
  <div class="panel-heading"><h4 class="text-center">Authors List</h4></div>
  <div class="panel-body">
  	<?php
  	if (!isset($_POST['start'])) { $step = 0; }
  	else {
  		$start = $_POST['start'];
  		$step = $start * ITEMS_NUM;
  	} 
  	$data = get_author_info($pdo, ITEMS_NUM, $step);
  	?>
  	<div class="container res">
  		<h1><?= $label; ?></h1>
  		<?php foreach($data as $item) { ?>
		<div class="row">
  		<div class="col-md-2 col-sm-2 text-center">
  			<img src="<?= $item['image']; ?>" class="img-thumbnail" alt="author_photo">
  			<h5><?= $item['fullname']; ?></h5>
  		</div>
  		<div class="col-md-4 col-sm-4">
  			<ul class="list-group">
  				<?php $books = get_author_books($item['books_by_author']); ?>
  				<?php foreach($books as $title){ ?>
  <li class="list-group-item list-group-item-default"><?= $title ?></li>
  				<?php } ?>
</ul>
  		</div>
  
  		</div>
  		<hr>
  		<?php } ?>
  	</div> <!-- end container -->
  </div>
</div>
		</div>
	</div>
	<?php echo get_navigation($pdo, "authors", ITEMS_NUM); ?>
</div> <!-- end container -->
<?php
footer();

