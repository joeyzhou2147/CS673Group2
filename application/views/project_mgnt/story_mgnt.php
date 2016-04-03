<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <link href="<?php echo base_url("assets/stylesheets/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url("assets/stylesheets/project_mgnt.css"); ?>" rel="stylesheet" type="text/css" />

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

          <th>story_id</th>
          <th>project_id</th>
          <th>story_owner</th>
          <th>story_description</th>
          <th>story_last_update_time</th>
          <th>story_status</th>

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
                <?php echo $stories ->project_id ;?>
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
















<br />
<br />


  <div id="footer">
  www.BUPatriots.com
  </div>  


  </body>
</html>