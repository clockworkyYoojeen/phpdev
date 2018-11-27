<?php 

function get_books($pdo, $limit, $step = 0)
{
	$stmt = $pdo->query("select bookname, books.image, fullname from books, authors where books.author_id = authors.id limit " .$step. "," .$limit);
	return $stmt;
}

function get_author_info($pdo, $limit, $step = 0)
{
	$stmt = $pdo->query("SELECT authors.fullname, authors.image, GROUP_CONCAT(books.bookname) as `books_by_author` 
FROM authors LEFT JOIN books ON authors.id = books.author_id 
GROUP BY authors.fullname limit " .$step.",".$limit)->fetchAll(PDO::FETCH_ASSOC);
	return $stmt;
}

function get_author_books($str)
{
	$arr = explode(',', $str);
	return $arr;
} 

function get_navigation($pdo, $table,$num = 1)
{
	$stmt = $pdo->query("select count(*) from " . $table)->fetchColumn();
	$records = intval($stmt);
	$html = "<ul class='pagination'>";
	for($i = 0,$start = 0,$p = 1;  $i < $records; $i+=$num, $p++,$start++){
		$html .= "<li><a href='#' data-start='" . $start . "' data-target='" . $_SERVER['SCRIPT_NAME'] . "'>" . $p . "</a></li>";
	}
	$html .= "</ul>";
	return $html;

}




