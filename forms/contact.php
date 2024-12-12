<?php
// Replace with your real receiving email address
$receiving_email_address = 'your-email@example.com';

// Check if the PHP Email Form library exists
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" library!');
}

// Create a new instance of the PHP Email Form
$contact = new PHP_Email_Form;
$contact->ajax = true; // Set AJAX to true for smoother form submission

// Configure email details
$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : '';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : '';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : '';



// Add form messages
if (isset($_POST['name'])) {
    $contact->add_message($_POST['name'], 'From');
}
if (isset($_POST['email'])) {
    $contact->add_message($_POST['email'], 'Email');
}
if (isset($_POST['message'])) {
    $contact->add_message($_POST['message'], 'Message', 10);
}

// Send the email and output the result
echo $contact->send();
?>

