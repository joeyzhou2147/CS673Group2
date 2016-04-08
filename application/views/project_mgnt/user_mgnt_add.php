<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url("assets/stylesheets/bootstrap.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/stylesheets/project_mgnt.css"); ?>">

    <title>User Add</title>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>


<div class="container">
    <h2>Add New Group</h2>
    <form class="form-horizontal" role="form" action="/cs673group2/index.php/user/add_user_group" method="post">

        <div class="form-group">
            <label class="control-label col-sm-2" for="text">User Name:</label>
            <div class="col-sm-10">
                <select class="form-control" id="addUserId" name="addUserId" placeholder="Enter User Name">

                    <?php
                    // A sample product array

                    // Iterating through the product array
                    foreach($userindex as $row){
                        ?>
                        <option value="<?php echo $row->user_id ?>"><?php echo $row->first_name; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Project Name:</label>
            <div class="col-sm-10">
                <select class="form-control" id="addGroupId" name="addGroupId" placeholder="Enter Project Name">

                    <?php
                    // A sample product array

                    // Iterating through the product array
                    foreach($groupindex as $row){
                        ?>
                        <option value="<?php echo $row->group_id ?>"><?php echo $row->group_name; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="text">User Role:</label>
            <div class="col-sm-10">
                <select class="form-control" id="addUserRole" name="addUserRole" placeholder="Enter User Role">


                    <option value="Admin">Admin</option>
                    <option value="Product">Product</option>
					<option value="Business Lead">Business Lead</option>
					<option value="Developer">Developer</option>
					<option value="Tester">Tester</option>
					<option value="Documentation">Documentation</option>
                    <option value="Visitor">Visitor</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="text">User Status:</label>
            <div class="col-sm-10">
                <select class="form-control" id="addUserStatus" name="addUserStatus" placeholder="Enter User Status">

                    <option value="Active">Active</option>
                    <option value="InActive">InActive</option>

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
