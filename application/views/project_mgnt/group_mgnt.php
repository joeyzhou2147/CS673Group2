<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url("assets/stylesheets/bootstrap.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/stylesheets/project_mgnt.css"); ?>">

    <title>Group Management</title>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>


<body>

<br />
<br />

<div class="container">
    <h2>Group Lists</h2>
    <p>All of your projects are here and you can add or subtract the lists</p>
    <table class="table table-hover">
        <thead>
        <tr>

            <th>group_id</th>
            <th>group_name</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach($groupindex as $groups)
        {?>
            <tr>
                <td>
                    <?php echo $groups -> group_id;?>
                </td>
                <td>
                    <?php echo $groups->group_name ;?>
                </td>
               
            </tr>
        <?php  }?>
        </tbody>
    </table>



    <div class="btn-group" role="group" aria-label="...">
        <br />
        <br />


        <button type="button" class="btn btn-default btn-lg"
                onclick="location.href='<?php echo site_url('index.php/group/data_in');?>'">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>

        <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button>
    </div>

</div>
