<?php
 
// helper functions
function is_blank($str) {
  return !isset($str) || $str === '';
}
 
function redirect($url) {
  header("Location: $url");
  exit; // or die();
}
 
$contact_form = new stdClass;
$contact_form->name = '';
$contact_form->email = '';
$contact_form->message = '';
 
$errors = array();
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // name    - required
  // email   - required, must be a valid email address
  // message - required, length at least 10 chars
 
  $contact_form->name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $contact_form->email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $contact_form->message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 
  if (is_blank($contact_form->name)) {
    $errors['name'][] = 'Name is required.';
  }
 
  if (is_blank($contact_form->email)) {
    $errors['email'][] = 'Email is required.';
  }
  if (!filter_var($contact_form->email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'][] = 'Email is invalid.';
  }
 
  if (is_blank($contact_form->message)) {
    $errors['message'][] = 'Message is required.';
  }
  if (strlen($contact_form->message) < 10) {
    $errors['message'][] = 'Message must be at least 10 characters long.';
  }
 
  if (empty($errors)) {
    $to      = 'dwayne.crooks@gmail.com';
    $subject = 'I used your contact form';
    $message = "Hi,\n\nMy name is $contact_form->name.\n\n$contact_form->message";
    $headers = "From: $contact_form->email";
 
    $mail_sent = mail($to, $subject, $message, $headers);
    //redirect(sprintf('/mail.php?sent=%s', $mail_sent ? 'true' : 'false'));
  }
}
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
 
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 
    <title>Contact Us</title>
    <style>
      label {
        display: block;
      }
 
      .error-field label {
        color: red;
      }
 
      .error-field input[type="text"], .error-field textarea {
        background-color: red;
      }
    </style>
  </head>
  <body>
    <h1>Contact Us</h1>
 
    <?php if (!empty($errors)) : ?>
    <ul class="errors">
      <?php
      foreach ($errors as $field => $messages) :
        foreach ($messages as $message) :
      ?>
      <li><?php echo $message; ?></li>
      <?php endforeach; endforeach; ?>
    </ul>
    <?php endif; ?>
 
    <form action="" method="post">
      <p <?php if (!empty($errors['name'])) : echo 'class="error-field"'; endif; ?>>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $contact_form->name; ?>">
      </p>
 
      <p <?php if (!empty($errors['email'])) : echo 'class="error-field"'; endif; ?>>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $contact_form->email; ?>">
      </p>
 
      <p <?php if (!empty($errors['message'])) : echo 'class="error-field"'; endif; ?>>
        <label for="message">Message:</label>
        <textarea id="message" name="message"><?php echo $contact_form->message; ?></textarea>
      </p>
 
      <p>
        <input type="submit" value="Send my message">
      </p>
    </form>
  </body>
</html>