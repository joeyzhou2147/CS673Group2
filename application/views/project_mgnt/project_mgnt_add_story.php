<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/15
 * Time: 18:45
 */
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

      <link rel="stylesheet" href="<?php echo base_url("assets/stylesheets/bootstrap.min.css"); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/stylesheets/project_mgnt.css"); ?>">

    <title>New Story</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>





   <div class="container">
     <h2>Add New Story</h2>
     <form class="form-horizontal" role="form" action="/cs673group2/index.php/story/add_story" method="post">


         <div class="form-group">
           <label class="control-label col-sm-2" for="text">Project name:</label>
           <div class="col-sm-10">
             <select class="form-control" id="addProjectId" name="addProjectId" placeholder="Enter project Id">

               <?php
               // A sample product array

               // Iterating through the product array
               foreach($projectindex as $row){
                 ?>
                 <option value="<?php echo $row->project_id ?>"><?php echo $row->project_name; ?></option>
                 <?php
               }
               ?>
             </select>
           </div>
         </div>


	   <div class="form-group">
         <label class="control-label col-sm-2" for="text">Story Description :</label>
         <div class="col-sm-10">
           <input type="text" class="form-control" id="addStoryDescription" name="addStoryDescription" placeholder="Enter Description: (Max 512) " maxlength="512" size="512">
         </div>
       </div>

       <div class="form-group">
         <label class="control-label col-sm-2" for="text">story owner:</label>
         <div class="col-sm-10">
           <select class="form-control" id="addStoryUser" name="addStoryUser" placeholder="Enter Story owner">

             <?php
               foreach($owners as $item){
               ?>
               <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
               <?php
             }
             ?>
           </select>
         </div>
       </div>

       <div class="form-group">
         <label class="control-label col-sm-2" for="text">story status:</label>
         <div class="col-sm-10">
           <select class="form-control" id="addStoryStatus" name="addStoryStatus" placeholder="Enter project Id">>

             <?php
             foreach($status as $item){
               ?>
               <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
               <?php
             }
             ?>
           </select>
         </div>
       </div>

       <div class="form-group">        
         <div class="col-sm-offset-2 col-sm-10">
           <button type="submit" class="btn btn-default">Submit</button>
         </div>
       </div>
     </form>
   </div>



  
  </body>
</html>