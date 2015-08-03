<?php require_once('inc/config.php') ; ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo TITLE; ?></title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    
    <meta content='<?php echo TITLE; ?>' property='og:site_name'/>
	<meta content='<?php echo AUTHOR; ?>' property='og:author'/>
	<meta content='<?php echo DESCRIPCION; ?>' property='og:description'/>
	<meta content='<?php echo THUMBFB; ?>' property='og:image'/>
    	
	<?php if(ANALYTICS!=''){ ?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', '<?php echo ANALYTICS; ?>', 'auto');
		  ga('send', 'pageview');
		
		</script>
	<?php } ?>
	
