<?php 
$error_messages = [];
$userName = filter_var(
				$_POST['userName'],
				FILTER_SANITIZE_STRING,
				FILTER_FLAG_STRIP_LOW|FILTER_FLAG_ENCODE_HIGH
);
if ($userName == false) { push($error_messages,"Wrong username");}

$userEmail = filter_var($_POST['userEmail'], FILTER_SANITIZE_EMAIL);
if ($userEmail == false) { push($error_messages,"Wrong useremail");}

$bookName = filter_var(
				$_POST['bookName'],
				FILTER_SANITIZE_STRING,
				FILTER_FLAG_STRIP_LOW|FILTER_FLAG_ENCODE_HIGH
);
$authorName = filter_var(
				$_POST['authorName'],
				FILTER_SANITIZE_STRING,
				FILTER_FLAG_STRIP_LOW|FILTER_FLAG_ENCODE_HIGH
);
if ($bookName == false || $authorName == false ) { push($error_messages,"Some errors occured");}

$orderTime = $_POST['orderTime'];

if (count($error_messages) != 0) {
	foreach ( $error_messages as $error) {
		echo $error . PHP_EOL;
	}
	return;
} else {
	$to      = 'nobody@example.com';
$subject = 'Book ordering';
$message = "Hi, " . $userName . " you have just ordered a book '" . $bookName . "' by author "
. $authorName . " at " . $orderTime . ". Thanks for dealing with us!";
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $headers)) {
	echo "Submitted successfully!";
} else {
	echo "Something wrong...";
}
}


