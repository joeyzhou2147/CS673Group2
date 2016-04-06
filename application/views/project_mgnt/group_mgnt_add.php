<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/cs673group2/assets/stylesheets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/cs673group2/assets/stylesheets/project_mgnt.css">

    <title>Group Add</title>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>


<div class="container">
    <h2>Add New Group</h2>
    <form class="form-horizontal" role="form" action="/cs673group2/index.php/group/add_group" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Grioup Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="addGroupName" name="addGroupName" placeholder="Enter Group Name">
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