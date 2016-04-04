<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="../bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./bug_tracker.css">

    <title>Bug Tracker Module</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
  
 
   <div class="container">
     <h2>Report New Bug</h2>
     <form class="form-horizontal" role="form">
	 
	
	   <div class="col-md-12">
         <label class="control-label" for="text">Title Summary</label>
                <input type="text" class="form-control" id="inputdefault" placeholder="Enter Bug Summary">
        </div>
	
	 <div class="row">
	   <div class="col-md-4">
         <label class="control-label" for="text">Project Name:</label>
         <input type="text" class="form-control" id="inputdefault" placeholder="Enter Project Name">
         
       </div>
	   <div class="col-md-4">
         <label class="control-label" for="text">Assigned To:</label>
         
           <input type="text" class="form-control" id="inputdefault" placeholder=" Assignee Name">
         
       </div>
	   <div class="col-md-4 dropdown">
         <label class="control-label" for="text">Priority:</label>
         <select class="form-control" id="selectBugPriority">
			
				<option>Critical</option>
				<option>High</option>
				<option>Medium</option>
				<option>Low</option> 
		  </select> 
		   
		</div>
	   </div>
	   
	   
         
       <div class="row">
	   <div class="col-md-4">
         <label>Due Date:</label>
			<input type="text" id="bugDueDate_datepicker" class="form-control datepicker hasDatepicker" onkeydown="return false;"placeholder=" Complete Date">
           <!--input type="text" class="form-control" id="inputdefault" placeholder=" Complete Date"-->
         
       </div>
	   
	  
	   <div class="col-md-4">
         <label class="control-label " for="text">Title:</label>
         
           <input type="text" class="form-control" id="inputdefault" placeholder=" Feature/Bug">
         </div>
		
	   <div class="col-md-4">
         <label class="control-label " for="text">Priority:</label>

           <input type="text" class="form-control" id="inputdefault" placeholder=" Complete Date">
         </div>
		 </div>
       
	   <div class="col-md-4">
         <label class="control-label " for="text">Status:</label>
        
           <input type="text" class="form-control" id="inputdefault" placeholder="Unassigned">
         </div>

	   <div class="row">
	   <div class="col-md-10">
         <label class="control-label " for="text">Description :</label>
        
           <input type="text" class="form-control" id="inputdefault" placeholder=" Enter Bug Details Here">
         
       </div>
	   </div>
	    
       <div class="form-group">  
		<div class="row">
         <div class="col-md-6">
           <button type="submit" class="btn btn-primary">Create</button>
         </div>
		 <div class="col-md-6">
           <button type="submit" class="btn btn-primary">Cancel</button>
         </div>
		 </row>
       </div>
     </form>
   </div>

  
  </body>
</html>