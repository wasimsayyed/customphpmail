<?php

session_start();

require_once '../helpers/security.php';

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : array();
$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : array();


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHPmailer</title>
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		<div class="contact">
			<?php if(!empty($errors)): ?>
				<div class="panel">
					<?php echo "<ul class='errorinfo'><li>" . implode("</li><li>", $errors) . "</li></ul>"; ?>
				</div>
			<?php endif; ?>
			<form action="contact.php" method="POST">
				<label>
					Your Name*
					<input type="text" name="name" autocomplete="off"<?php $tr='border: 2px solid red;'; echo isset($fields['name']) ? 'value="'.e($fields['name']).'"' : '' ?>>
				</label>
				<label>
					Your Email*
					<input type="text" name="email" autocomplete="off"<?php echo isset($fields['email']) ? 'value="'.e($fields['email']).'"' : '' ?>>
				</label>
				<label>
					Your Message*
					<textarea name="message" rows="8"><?php echo isset($fields['message']) ? e($fields['message']) : '' ?></textarea>
				</label>
				<input type="submit" value="Send">
				<p class="muted">* means a required field</p>
			</form>
		</div>
	</body>
</html>
<?php

unset($_SESSION['errors']);
unset($_SESSION['fields']);

?>
