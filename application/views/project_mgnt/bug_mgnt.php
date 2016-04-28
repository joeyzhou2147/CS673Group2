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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/stylesheets/custom.css"); ?>">

    <title>Bug Management</title>
    <script src="/CS673Group2/assets/javascripts/sorttable.js"></script>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script type="text/javascript" language="JavaScript">
        window.onload = function () {

            var myTH = document.getElementsByTagName("th")[0];
            sorttable.innerSortFunction.apply(myTH, []);
            //alert("loded");
            // code here
        };
        var xmlhttp;

        function showBugByBugId(bugID) {
            url = "/cs673group2/index.php/bug/detailview" + bugID;
            xmlhttp = null;
            if (window.XMLHttpRequest) {// code for IE7, Firefox, Mozilla, etc.
                xmlhttp = new XMLHttpRequest();
            }
            else if (window.ActiveXObject) {// code for IE5, IE6
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            if (xmlhttp != null) {
                window.location.href = "/cs673group2/index.php/bug/detailview?bugID=" + bugID;
                xmlhttp.onreadystatechange = onResponse(projectId);
                xmlhttp.open("GET", url, true);
                xmlhttp.send(null);
            }
            else {
                alert("Your browser does not support XMLHTTP.");
            }
        }

        function getdateDiff(dbDate) {
            var date1 = new Date();

            // GET YYYY, MM AND DD FROM THE DATE OBJECT
            //var yyyy = date.getFullYear().toString();
            //var mm = (date.getMonth()+1).toString();
            //var dd  = date.getDate().toString();

            // CONVERT mm AND dd INTO chars
            //var mmChars = mm.split('');
            //var ddChars = dd.split('');

            // CONCAT THE STRINGS IN YYYY-MM-DD FORMAT
            //var datestring = yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
            //var date1 = new Date("1/13/2016");
            var date2 = new Date(dbDate);
            var timeDiff = Math.abs(date1.getTime() - date2.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            document.write("" + diffDays);
            //document.write(dbDate);

        }
        function updateBug(bugId) {
            url = "/cs673group2/index.php/bug/data_in_update" + bugId;
            xmlhttp = null;
            if (window.XMLHttpRequest) {// code for IE7, Firefox, Mozilla, etc.
                xmlhttp = new XMLHttpRequest();
            }
            else if (window.ActiveXObject) {// code for IE5, IE6
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            if (xmlhttp != null) {
                //window.location.href = "/cs673group2/index.php/bug/data_in_update?bugId=" + bugId + "&storyId=" + storyId;
                window.location.href = "/cs673group2/index.php/bug/data_in_update?bugId=" + bugId;
                xmlhttp.onreadystatechange = onResponse(bugId);
                xmlhttp.open("GET", url, true);
                xmlhttp.send(null);
            }
            else {
                alert("Your browser does not support XMLHTTP.");
            }
        }
    </script>
    <!--[if IE]>
    
    <![endif]-->


    <script type="text/javascript" language="JavaScript">


    </script>
</head>


<body>

<br/>
<br/>

<div class="container">
    <h2>Bug Lists</h2>

    <p>All of your bugs are here and you can add or subtract the lists</p>
    <table class="sortable" id="BugTable">
        <thead>
        <tr>

            <th>Story description</th>
            <th>Project Name</th>
            <th>Bug Description</th>
            <th>Owner</th>
            <th>Severity</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Found Date</th>
            <th>Days open</th>
            <th>update</th>


        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($bugindex as $bugs) {
            ?>
            <tr>
                <td onclick="showBugByBugId('<?php echo $bugs->bug_id; ?>')" style="cursor: pointer;">
                    <?php echo $bugs->story_description; ?>
                </td>
                <td onclick="showBugByBugId('<?php echo $bugs->bug_id; ?>')" style="cursor: pointer;">
                    <?php echo $bugs->project_name; ?>
                </td>
                <td onclick="showBugByBugId('<?php echo $bugs->bug_id; ?>')" style="cursor: pointer;">
                    <?php echo $bugs->bug_description; ?>
                </td>
                <td onclick="showBugByBugId('<?php echo $bugs->bug_id; ?>')" style="cursor: pointer;">
                    <?php echo $bugs->bug_assigned_to; ?>
                </td>

                <td onclick="showBugByBugId('<?php echo $bugs->bug_id; ?>')" style="cursor: pointer;">
                    <?php echo $bugs->bug_severity; ?>
                </td>
                <td onclick="showBugByBugId('<?php echo $bugs->bug_id; ?>')" style="cursor: pointer;">
                    <?php echo $bugs->bug_status; ?>
                </td>
                <td onclick="showBugByBugId('<?php echo $bugs->bug_id; ?>')" style="cursor: pointer;">
                    <?php echo $bugs->bug_due_date; ?>
                </td>

                <td onclick="showBugByBugId('<?php echo $bugs->bug_id; ?>')" style="cursor: pointer;">
                    <?php echo $bugs->bug_found_date; ?>
                </td>
                <td onclick="showBugByBugId('<?php echo $bugs->bug_id; ?>')" style="cursor: pointer;">
                    <SCRIPT type="text/javascript">{
                            {
                                getdateDiff('<?php echo $bugs->bug_found_date ;?>');
                            }
                        }</SCRIPT>
                </td>

                <td onclick="updateBug('<?php echo $bugs->bug_id; ?>')" style="cursor: pointer;"
                <a href="#">
                    <img src="/cs673group2/assets/images/available_updates.png" height="18" width="18"/>
                </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


    <div class="btn-group" role="group" aria-label="...">
        <br/>
        <br/>


        <button type="button" class="btn btn-default btn-lg"
                onclick="location.href='/cs673group2/index.php/bug/add_bug'">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default btn-lg" style="display: none">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button>
    </div>
    <div>
        <p align="center" style="color:red;"><?php if (isset($message)) {
                echo $message;
            } ?></p>
    </div>

</div>
