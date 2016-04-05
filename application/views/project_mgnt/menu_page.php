<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="/cs673group2/assets/stylesheets/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/cs673group2/assets/stylesheets/project_mgnt.css">
	
    <title>Navigation Menu bar</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>

  <nav id="nav_hor">
    <a href="<?php echo base_url("index.php/welcome/home"); ?>" target="main_page">Home</a> |
    <a href="<?php echo base_url("index.php/project"); ?>" target="main_page">Project Management</a> |
    <a href="/cs673group2/index.php/project/project_mgnt_add" target="main_page">Project Add</a> |
    <a href="<?php echo base_url("index.php/story"); ?>" target="main_page">Stories</a> |
	<a href="<?php echo base_url("index.php/welcome/about"); ?>" target="main_page">About</a> |
	<a href="<?php echo base_url("index.php/welcome/contact"); ?>" target="main_page">Contact</a>
   </nav>

   

  </body>
</html>