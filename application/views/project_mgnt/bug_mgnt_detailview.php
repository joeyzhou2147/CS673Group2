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

    <title>Bug Update</title>

    <script type="text/javascript" language="JavaScript">
        function onButtonClick()
        {
            
        }
    </script>
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">

	</script>
    <![endif]-->
</head>
<body>


<div class="container">
    <h2>View Bug Entry</h2>
    <form class="form-horizontal" role="form">
	
	
         <div class="form-group">
            <label class="control-label col-sm-2" for="text">Bug Id:</label>
            <div class="col-sm-10">
			 <input class="form-control col-sm-2" for="text" id="updateBugId" name="updateBugId" value=<?php echo $bugindex[0]->bug_id; ?> disabled>           
            </div>
        </div>
		
		
        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Story Name:</label>
            <div class="col-sm-10">
            
                <select class="form-control" id="updateBugProjectId" name="updateBugProjectId" placeholder="Enter Bug owner">
				     <option value="<?php echo $bugindex[0]->story_id ?>"><?php echo $bugindex[0]->story_id; ?></option>

                </select>
            </div>
        </div>  
        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Bug Description:</label>
            <div class="col-sm-10">
                <textarea disabled style="resize: none;" type="text" maxlength="512" class="form-control" id="updateBugDescription" name="updateBugDescription" value=""><?php echo $bugindex[0]->bug_description; ?></textarea>
            </div>
        </div>

          <div class="form-group">
                <label class="control-label col-sm-2" for="text">Bug Assigned to:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="updateBugOwner" name="updateBugOwner" placeholder="Enter Bug owner">
					    <option value="<?php echo $bugindex[0]->bug_assigned_to ?>"><?php echo $bugindex[0]->bug_assigned_to; ?></option>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="text">Bug Severity to:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="updateBugSeverity" name="updateBugSeverity" placeholder="Enter Bug Severity">
					   <option value="<?php echo $bugindex[0]->bug_severity ?>"><?php echo $bugindex[0]->bug_severity; ?></option>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="text">Bug Status:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="updateBugStatus" name="updateBugStatus" placeholder="Enter Bug Status">
					  <option value="<?php echo $bugindex[0]->bug_status ?>"><?php echo $bugindex[0]->bug_status; ?></option>

                    </select>
                </div>
            </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Bug Due Date:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="updateBugDueDate" name="updateBugDueDate" placeholder="Enter Due  Date" value="<?php echo $bugindex[0]->bug_due_date;?>" disabled>
            </div>
        </div>

       
    </form>
</div>


<div>
    <p align="center" style="color:red;"><?php if(isset($message)){echo $message;}?></p>
</div>











</body>
</html>











</body>
</html>