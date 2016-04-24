<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created b00000000y PhpStorm.
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

    <title>Update Project</title>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>


<div class="container">
    <h2>Update Project</h2>
    <form class="form-horizontal" role="form" action="/cs673group2/index.php/project/updateProjectData" method="get">



        <div class="form-group" style="display: none">
            <label class="control-label col-sm-2" for="text">Project Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="updateProjectId" name="updateProjectId" value=<?php echo $projectindex[0]->project_id; ?> maxlength="100">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Project Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="updateProjectName" name="updateProjectName" value=<?php echo $projectindex[0]->project_name; ?> maxlength="100">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Group Id:</label>
            <div class="col-sm-10">

                <select class="form-control" id="updateProjectGroupId" name="updateProjectGroupId" placeholder="updateProjectGroupId">
                    <option value="<?php echo $projectindex[0]->group_id ?>"><?php echo $projectindex[0]->group_id; ?></option>
                    <?php
                    // Iterating through the product array
                    foreach($groupIndex as $row){
                        ?>
                        <option value="<?php echo $row->group_id ?>"><?php echo $row->group_name; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Project Length:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="updateProjectLength" name="updateProjectLength" value=<?php echo $projectindex[0]->project_length; ?> min="1" max="365">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Project Start Date:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="updateProjectStartDate" name="updateProjectStartDate" placeholder="Enter Project Start Date" value="<?php echo $projectindex[0]->project_start_date;?>"
                       min="2016-01-01" max="2018-01-01">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Project End Date:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="updateProjectEndDate" name="updateProjectEndtDate" placeholder="Enter Project Start Date" value="<?php echo $projectindex[0]->project_end_date;?>"
                       min="2016-01-01" max="2019-01-01">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Project Status:</label>
            <div class="col-sm-10">
                <select class="form-control" id="updateProjectStatus" name="updateProjectStatus" placeholder="Enter Project Status">
                    <option value="<?php echo $projectindex[0]->project_status ?>"><?php echo $projectindex[0]->project_status; ?></option>
                    <option value="Open">Open</option>
                    <option value="Pending">Pending</option>
                    <option value="Close">Close</option>
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


<div>
    <p align="center" style="color:red;"><?php if(isset($message)){echo $message;}?></p>
</div>











</body>
</html>











</body>
</html>