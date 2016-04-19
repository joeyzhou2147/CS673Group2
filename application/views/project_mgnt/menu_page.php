<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/15
 * Time: 18:45
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="<?php echo base_url("assets/stylesheets/bootstrap.min.css"); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/stylesheets/project_mgnt.css"); ?>">
	
    <title>Navigation Menu bar</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>

  <nav id="nav_hor">
    <a href="/cs673group2/index.php/welcome/home">Home</a> |
    <a href="/cs673group2/index.php/project">Project Management</a> |
    <a href="/cs673group2/index.php/project/project_mgnt_add">Project Add</a> |
   
	<a href="/cs673group2/index.php/about.php">About</a> |
	<a href="/cs673group2/index.php/contact.php">Contact</a>
   </nav>

   

  </body>
</html>