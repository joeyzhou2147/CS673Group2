<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <link href="<?php echo base_url("assets/stylesheets/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/stylesheets/project_mgnt.css"); ?>" rel="stylesheet" type="text/css" />

    <title>New Story</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>

  
  
  
  
 
   <div class="container">
     <h2>Add New Story</h2>
     <form class="form-horizontal" role="form">
	   <div class="form-group">
         <label class="control-label col-sm-2" for="text">Story ID :</label>
         <div class="col-sm-10">
           <input type="number" class="form-control" id="storyid" value=<?=$storyid; ?>>
         </div>
       </div>
	   
	   <div class="form-group">
         <label class="control-label col-sm-2" for="text">Project ID:</label>
         <div class="col-sm-10">
           <select>
             <option selected="selected">Choose one</option>
             <?php
             // A sample product array

             // Iterating through the product array
             foreach($projectindex as $item){
               ?>
               <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
               <?php
             }
             ?>
           </select>
         </div>
       </div>
       <div class="form-group">
         <label class="control-label col-sm-2" for="text">Story create time :</label>
         <input type="datetime" name="cTime">
       </div>
	   <div class="form-group">
         <label class="control-label col-sm-2" for="text">Story Description :</label>
         <div class="col-sm-10">
           <input type="text" class="form-control" id="inputdefault" placeholder="Enter Project Name">
         </div>
       </div>
       <div class="form-group">
         <label class="control-label col-sm-2" for="text">story update time:</label>
         <input type="datetime" name="uTime">
       </div>
       <div class="form-group">
         <label class="control-label col-sm-2" for="text">story owner:</label>
         <div class="col-sm-10">
           <select>
             <option selected="selected">Choose one</option>
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
           <select>
             <option selected="selected">Choose one</option>
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