<?php
/*
Template Name: Contact Form
*/
?>

<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['js_contact_name']) === '') {
		$nameError = __('Please enter your name.', 'js');
		$hasError = true;
	} else {
		$name = trim($_POST['js_contact_name']);
	}

	if(trim($_POST['js_contact_email']) === '')  {
		$emailError = __('Please enter your email address.', 'js');
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['js_contact_email']))) {
		$emailError = __('You entered an invalid email address.', 'js');
		$hasError = true;
	} else {
		$email = trim($_POST['js_contact_email']);
	}
	
	if(trim($_POST['js_contact_subject']) === '') {
		$subjectError = __('Please enter a subject.', 'js');
		$hasError = true;
	} else {
		$subject = trim($_POST['js_contact_subject']);
	}

	if(trim($_POST['js_contact_message']) === '') {
		$messageError = __('Please enter a message.', 'js');
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['js_contact_message']));
		} else {
			$comments = trim($_POST['js_contact_message']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$blog_name = get_bloginfo('name');
		$form_subject = '['. $blog_name .'] '.$subject .' From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nSubject: $subject \n\nMessage: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $form_subject, $body, $headers);
		$emailSent = true;
	}

} ?>

<?php get_header(); ?>

<div class="inside content left">
	<section class="main page">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<header>
		<h2 class="title"><?php the_title(); ?></h2>
	</header>
	
	<article> 
	
		<?php the_content(); ?>
		
<?php if(isset($emailSent) && $emailSent == true) { ?>
	<p class="attention fade"><?php _e('Thanks, your email was sent successfully','js') ?>.</p>
<?php } else { ?>
	<?php if(isset($hasError) || isset($captchaError)) { ?>
		<p class="error fade bold"><?php _e('Sorry, an error occured','js') ?>.<p>
	<?php } ?>
<?php } ?>
		
		<form id="contact-form" class="form fluid" action="<?php the_permalink(); ?>" method="post">
			
			<div class="form-fix">

					<p>
					<label for="js_contact_name"><?php _e('Your Name', 'js'); ?>:</label><br/>
					<input class="wide required requiredField" name="js_contact_name" id="js_contact_name" type="text" tabindex="1" value="<?php if(isset($_POST['js_contact_name'])) echo $_POST['js_contact_name'];?>" />
					<?php if($nameError != '') { ?><span class="error"><?=$nameError;?></span><?php } ?></span>
					</p>
					<p>
					<label for="js_contact_email"><?php _e('Your Email', 'js'); ?>:</label><br/>
					<input class="wide email required requiredField" name="js_contact_email" id="js_contact_email" type="text" tabindex="2" value="<?php if(isset($_POST['js_contact_email']))  echo $_POST['js_contact_email'];?>" />
					<?php if($emailError != '') { ?><span class="error fluid"><?=$emailError;?></span><?php } ?>
					</p>
					<p>
					<label for="js_contact_subject"><?php _e('Subject', 'js'); ?>:</label><br/>
					<input class="wide required requiredField" name="js_contact_subject" id="js_contact_subject" type="text" tabindex="3" value="<?php if(isset($_POST['js_contact_subject']))  echo $_POST['js_contact_subject'];?>" />
					<?php if($subjectError != '') { ?><span class="error fluid"><?=$subjectError;?></span><?php } ?>
					</p>
					
					<p>
					<label for="js_contact_message"><?php _e('Your Message', 'js'); ?>:</label><br/>
					<textarea class="required requiredField" name="js_contact_message" id="js_contact_message" rows="7" tabindex="4"><?php if(isset($_POST['js_contact_message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['js_contact_message']); } else { echo $_POST['comments']; } } ?></textarea>
					<?php if($messageError != '') { ?><p class="error fluid"><?=$messageError;?></p><?php } ?>
					</p>
			
			</div>
			
			<button type="submit" tabindex="5"><?php _e('Send Message', 'js'); ?></button>
			<input type="hidden" name="submitted" id="submitted" value="true" />
			
		</form>
	
	</article>
	<!-- end page content -->

	<?php endwhile; endif; ?>
		
	</section>
	<!-- end .main .blog -->
	
	<?php if (!is_page_template('template-page-full.php')) { ?>
	
	<?php get_sidebar(); ?>
	
	<?php } ?>
	
</div>

	<?php get_template_part('footer', 'widgets') ?>

<?php get_footer(); ?>