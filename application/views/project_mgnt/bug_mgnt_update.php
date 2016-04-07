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

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">

	</script>
    <![endif]-->
</head>
<body>


<div class="container">
    <h2>Update Bug Entry</h2>
    <form class="form-horizontal" role="form" action="/cs673group2/index.php/bug/data_update" method="post">
	
	
         <div class="form-group">
            <label class="control-label col-sm-2" for="text">Bug Id:</label>
            <div class="col-sm-10">
			 <input class="form-control col-sm-2" for="text" id="updateBugId" name="updateBugId" value=<?php echo $bugindex[0]->bug_id; ?> disabled>           
            </div>
        </div>
		
		
        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Project Id:</label>
            <div class="col-sm-10">
            
                <select class="form-control" id="updateBugProjectId" name="updateBugProjectId" placeholder="Enter Bug owner">
				     <option value="<?php echo $bugindex[0]->project_id ?>"><?php echo $bugindex[0]->project_id; ?></option>
                    <?php
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
            <label class="control-label col-sm-2" for="text">Bug Description:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="updateBugDescription" name="updateBugDescription" value=<?php echo $bugindex[0]->bug_description; ?>>
            </div>
        </div>

          <div class="form-group">
                <label class="control-label col-sm-2" for="text">Bug Assigned to:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="updateBugOwner" name="updateBugOwner" placeholder="Enter Bug owner">
					    <option value="<?php echo $bugindex[0]->bug_assigned_to ?>"><?php echo $bugindex[0]->bug_assigned_to; ?></option>
                        <option value="Kali">Kali</option>
                        <option value="Gilbert">Gilbert</option>
                        <option value="Terry">Terry</option>
                        <option value="Joe">Joe</option>
                        <option value="Haan">Haan</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="text">Bug Severity to:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="updateBugSeverity" name="updateBugSeverity" placeholder="Enter Bug Severity">
					   <option value="<?php echo $bugindex[0]->bug_severity ?>"><?php echo $bugindex[0]->bug_severity; ?></option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="text">Bug Status:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="updateBugStatus" name="updateBugStatus" placeholder="Enter Bug Status">
					  <option value="<?php echo $bugindex[0]->bug_status ?>"><?php echo $bugindex[0]->bug_status; ?></option>
                        <option value="Open">Open</option>
                        <option value="Pending">Pending</option>
                        <option value="Close">Close</option>
                    </select>
                </div>
            </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Bug Due Date:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="updateBugDueDate" name="updateBugDueDate" placeholder="Enter Due  Date" value="<?php echo $bugindex[0]->bug_due_date;?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
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