<?php
if (!$_POST) exit;
if (!defined(ABSPATH)) {
	$pagePath = explode('/wp-content/', dirname(__FILE__));
	include_once(str_replace('wp-content/', '', $pagePath[0] . '/wp-load.php'));
}
// Email address verification, do not edit.
function vestige_validate_mail($email)
{
	return (preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email));
}
if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");
$fname     = $_POST['fname'];
$lname     = $_POST['lname'];
$email    = $_POST['email'];
$phone     = $_POST['phone'];
$comments = $_POST['comments'];
if (trim($fname) == '') {
	echo '<div class="alert alert-error">' . esc_html__('You must enter your first name.', 'vestige') . '</div>';
	exit();
} else if (trim($email) == '') {
	echo '<div class="alert alert-error">' . esc_html__('You must enter email address.', 'vestige') . '</div>';
	exit();
} else if (!vestige_validate_mail($email)) {
	echo '<div class="alert alert-error">' . esc_html__('You must enter a valid email address.', 'vestige') . '</div>';
	exit();
}
if (get_magic_quotes_gpc()) {
	$comments = stripslashes($comments);
}
// Configuration option.
// Enter the email address that you want to emails to be sent to.
// Example $address = "joe.doe@yourdomain.com";
//$address = "example@websiteurl.com";
//$address = "info@imithemes.com";
// Configuration option.
// i.e. The standard subject will appear as, "You've been contacted by John Doe."
// Example, $e_subject = '$name . ' has contacted you via Your Website.';
$e_subject = 'Contact Form';
// Configuration option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.
$recipients_email = get_option('admin_email');
$e_body = esc_html__("You have been contacted by", "vestige") . " " . $fname . $lname . ", " . esc_html__("their additional message is as follows.", "vestige") . PHP_EOL . PHP_EOL;
$e_content = '';
$e_content .= esc_html__("Name:", "vestige") . esc_attr($fname) . esc_attr($lname) . PHP_EOL . PHP_EOL;
$e_content .= esc_html__("Email:", "vestige") . esc_attr($email) . PHP_EOL . PHP_EOL;
$e_content .= esc_html__("Phone:", "vestige") . esc_attr($phone) . PHP_EOL . PHP_EOL;
$e_content .= esc_html__("Message:", "vestige") . esc_attr($comments) . PHP_EOL . PHP_EOL;
$e_reply = __("You can contact", "vestige") . " " . esc_attr($fname) . esc_attr($lname) . __("via email or via Phone", "vestige") . esc_attr($phone) . "," . esc_attr($email);
$msg = wordwrap($e_body . $e_content . $e_reply, 70);
$headers = "From: $email" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
if (mail($recipients_email, $e_subject, $msg, $headers)) {
	// Email has sent successfully, echo a success page.
	echo "<div class='alert alert-success'>";
	echo "<h3>" . esc_html__("Email Sent Successfully.", "vestige") . "</h3><br>";
	echo "<p>" . esc_html__("Thank you", "vestige") . " <strong>$fname</strong>, " . esc_html__("your message has been submitted to us.", "vestige") . "</p>";
	echo "</div>";
} else {
	echo 'ERROR!';
}
