<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="<?php echo site_url("assets/stylesheets/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url("assets/stylesheets/project_mgnt.css"); ?>" rel="stylesheet" type="text/css" />

    <title>Bug Management</title>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>


<body>

<br />
<br />

<div class="container">
    <h2>Bug Lists</h2>
    <p>All of your projects are here and you can add or subtract the lists</p>
    <table class="table table-hover">
        <thead>
        <tr>

            <th>bug_id</th>
            <th>project_id</th>
            <th>bug_description</th>
            <th>bug_assigned_to</th>
            <th>bug_severity</th>
            <th>bug_status</th>
            <th>bug_due_date</th>
            <th>bug_complete_date</th>
            <th>days_open</th>




        </tr>
        </thead>
        <tbody>
        <?php
        foreach($bugindex as $bugs)
        {?>
            <tr>
                <td>
                    <?php echo $bugs -> bug_id;?>
                </td>
                <td>
                    <?php echo $bugs -> project_id;?>
                </td>
                <td>
                    <?php echo $bugs -> bug_description;?>
                </td>
                <td>
                    <?php echo $bugs->bug_assigned_to;?>
                </td>

                <td>
                    <?php echo $bugs -> bug_severity;?>
                </td>
                <td>
                    <?php echo $bugs -> bug_status;?>
                </td>
                <td>
                    <?php echo $bugs -> bug_due_date;?>
                </td>

                <td>
                    <?php echo $bugs -> bug_complete_date;?>
                </td>
                <td>
                    <?php echo "12";?>
                </td>


            </tr>
        <?php  }?>
        </tbody>
    </table>



    <div class="btn-group" role="group" aria-label="...">
        <br />
        <br />


        <button type="button" class="btn btn-default btn-lg"
                onclick="location.href='/cs673group2/index.php/bug/add_bug'">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        <script>
            function onInsertStory()
            {
                <?php echo base_url('index.php/story/data_in'); ?>
            }
        </script>
        <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button>
    </div>

</div>
