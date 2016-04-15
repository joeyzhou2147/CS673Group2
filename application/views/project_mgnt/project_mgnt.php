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
	
    <title>Project Management</title>

      <script type="text/javascript" language="JavaScript">
          var xmlhttp;

          function showStoryByProjectId(projectId){
              url = "/cs673group2/index.php/story?"+projectId;
              xmlhttp=null;
              if (window.XMLHttpRequest)
              {// code for IE7, Firefox, Mozilla, etc.
                  xmlhttp=new XMLHttpRequest();
              }
              else if (window.ActiveXObject)
              {// code for IE5, IE6
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              if (xmlhttp!=null)
              {
                  window.location.href="/cs673group2/index.php/story?projectId="+projectId;
                  xmlhttp.onreadystatechange=onResponse(projectId);
                  xmlhttp.open("GET",url,true);
                  xmlhttp.send(null);
              }
              else
              {
                  alert("Your browser does not support XMLHTTP.");
              }
          }

          function projectUpdate(projectId){
              url = "/cs673group2/index.php/project/updateProjectDataIn"+projectId;
              xmlhttp=null;
              if (window.XMLHttpRequest)
              {// code for IE7, Firefox, Mozilla, etc.
                  xmlhttp=new XMLHttpRequest();
              }
              else if (window.ActiveXObject)
              {// code for IE5, IE6
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              if (xmlhttp!=null)
              {
                  window.location.href="/cs673group2/index.php/project/updateProjectDataIn?projectId="+projectId;
                  xmlhttp.onreadystatechange=onResponse(projectId);
                  xmlhttp.open("GET",url,true);
                  xmlhttp.send(null);
              }
              else
              {
                  alert("Your browser does not support XMLHTTP.");
              }
          }

          function deleteProjectById(projectId){
              url = "/cs673group2/index.php/project/delete?"+projectId;
              xmlhttp=null;
              if (window.XMLHttpRequest)
              {// code for IE7, Firefox, Mozilla, etc.
                  xmlhttp=new XMLHttpRequest();
              }
              else if (window.ActiveXObject)
              {// code for IE5, IE6
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              if (xmlhttp!=null)
              {
                  window.location.href="/cs673group2/index.php/project/delete?projectId="+projectId;
                  //xmlhttp.onreadystatechange=onResponse(projectId);
                  //xmlhttp.open("GET",url,true);
                  //xmlhttp.send(null);
              }
              else
              {
                  alert("Your browser does not support XMLHTTP.");
              }
          }

          function onResponse(projectId)
          {
              if(xmlhttp.readyState!=4) return;
              if(xmlhttp.status!=200)
              {
                  alert("Problem retrieving XML data");
                  return;
              }
          }

      </script>

    <!--[if IE]>
    <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js">
    </script>
    <![endif]-->

  </head>


  <body>

  <br />
  <br />

  <div class="container">
      <h2>Project Lists</h2>
      <p>All of your projects are here and you can add or subtract the lists</p>
      <table class="table table-hover">
          <thead>
          <tr>


              <th>Project Name</th>
              <th>Duration</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Status</th>
              <th>update</th>


          </tr>
          </thead>
          <tbody>
          <?php
          foreach($projectindex as $projects)
          {?>
              <tr>
                
                  <td onclick="showStoryByProjectId('<?php echo $projects->project_id ;?>')" style="cursor: pointer;">
                      <?php echo $projects -> project_name;?>
                  </td>
                  <td onclick="showStoryByProjectId('<?php echo $projects->project_id ;?>')" style="cursor: pointer;">
                      <?php echo $projects -> project_length;?>
                  </td>
                  <td onclick="showStoryByProjectId('<?php echo $projects->project_id ;?>')" style="cursor: pointer;">
                      <?php echo $projects -> project_start_date;?>
                  </td>
                  <td onclick="showStoryByProjectId('<?php echo $projects->project_id ;?>')" style="cursor: pointer;">
                      <?php echo $projects -> project_end_date;?>
                  </td>
                  <td onclick="showStoryByProjectId('<?php echo $projects->project_id ;?>')" style="cursor: pointer;">
                      <?php echo $projects -> project_status;?>
                  </td>

                  <td onclick="projectUpdate('<?php echo $projects->project_id ;?>')" style="cursor: pointer;">
                      <a href="#">
                          <img src="/cs673group2/assets/images/available_updates.png" height="18" width="18" />
                      </a>
                  </td>
              
              </tr>
          <?php  }?>
          </tbody>
      </table>



      <div class="btn-group" role="group" aria-label="...">
          <br />
          <br />


          <button type="button" class="btn btn-default btn-lg"
                  onclick="location.href='/cs673group2/index.php/project/project_mgnt_add'">
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
