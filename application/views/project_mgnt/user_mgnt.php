<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url("assets/stylesheets/bootstrap.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/stylesheets/project_mgnt.css"); ?>">

    <title>User Management</title>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>


<body>

<br />
<br />

<div class="container">
    <h2>User Lists</h2>
    <p>Configure your user and group Settings here</p>
    <table class="table table-hover">
        <thead>
        <tr>

            <th>user_id</th>
            <th>username</th>
            <th style="display: none">project_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>register_date</th>


        </tr>
        </thead>
        <tbody>
        <?php
        foreach($userindex as $users)
        {?>
            <tr>
                <td>
                    <?php echo $users -> user_id;?>
                </td>
                <td>
                    <?php echo $users->username ;?>
                </td>
                <td>
                    <?php echo $users -> first_name;?>
                </td>
                <td>
                    <?php echo $users -> last_name;?>
                </td>
                <td>
                    <?php echo $users -> register_date;?>
                </td>
                
            </tr>
        <?php  }?>
        </tbody>
    </table>



    <div class="btn-group" role="group" aria-label="...">
        <br />
        <br />


        <button type="button" class="btn btn-default btn-lg"
                onclick="location.href='<?php echo site_url('index.php/user/data_in');?>'">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
       
        <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button>
    </div>

    <div>
        <p align="center" style="color:red;"><?php if(isset($message)){echo $message;}?></p>
    </div>

</div>
