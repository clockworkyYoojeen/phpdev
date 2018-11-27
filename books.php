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
  <div class="panel-heading"><h4 class="text-center">Books List</h4></div>
  <div class="panel-body">
  	  <table class="table table-striped table-responsive res">
    <thead>
      <tr>
        <th class="text-center">Title</th>
        <th class="text-center">Image</th>
        <th class="text-center">Author's name</th>
        <th> </th>
      </tr>
    </thead>
    <tbody>
     	<?php
  	if (!isset($_POST['start'])) { $step = 0; }
  	else {
  		$start = $_POST['start'];
  		$step = $start * ITEMS_NUM;
  	}
     		$book_info = get_books($pdo, ITEMS_NUM, $step);
     		foreach ( $book_info as $book) { ?>
     			<tr>
        <td><?= $book['bookname']; ?></td>
        <td class="text-center"><img src="<?= $book['image']; ?>" alt="image"></td>
        <td><?= $book['fullname']; ?></td>
        <td><button class="btn btn-info order">order</button></td>
      </tr>
    <?php 	}
     	?>
    </tbody>
  </table>
  </div>
</div>	
		</div>
	</div>
	<?php echo get_navigation($pdo, "books", ITEMS_NUM); ?>
</div> <!-- end container -->
<?php
footer();