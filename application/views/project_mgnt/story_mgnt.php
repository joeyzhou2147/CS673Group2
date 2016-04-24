<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="<?php echo base_url("assets/stylesheets/bootstrap.min.css"); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/stylesheets/project_mgnt.css"); ?>">

      <title>Story Management</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
  
  
  <body>

  
  
<div class="container">
  <h2>Story Lists</h2>
  <p>All of your Stories are here and you can add or subtract the lists</p>            
  <table class="table table-hover">
    <thead>
      <tr>

          <th>Story Id</th>

          <th>Owner</th>
          <th>Description</th>
          <th>Last Updated</th>
          <th>Status</th>

      </tr>
    </thead>
    <tbody>
    <?php
    foreach($storyindex as $stories)
    {?>
        <tr>
            <td>
                <?php echo $stories -> story_id;?>
            </td>
           
            <td>
                <?php echo $stories -> story_owner;?>
            </td>
            <td>
                <?php echo $stories -> story_description;?>
            </td>
            <td>
                <?php echo $stories -> story_last_update_time;?>
            </td>
            <td>
                <?php echo $stories -> story_status;?>
            </td>
        </tr>
    <?php  }?>
    </tbody>
  </table>



  <div class="btn-group" role="group" aria-label="...">
      <br />
      <br />


    <button type="button" class="btn btn-default btn-lg"
            onclick="location.href='<?php echo site_url('index.php/story/data_in');?>'">
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
















<br />
<br />


  <div id="footer">
  www.BUPatriots.com
  </div>  


  </body>
</html>