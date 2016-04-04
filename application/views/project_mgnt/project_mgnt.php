<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="assets/stylesheets/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/stylesheets/project_mgnt.css">
	
    <title>Project Management</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
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

              <th>group_id</th>
              <th>project_id</th>
              <th>project_name</th>
              <th>project_length</th>
              <th>project_start_date</th>
              <th>project_end_date</th>
              <th>project_status</th>

          </tr>
          </thead>
          <tbody>
          <?php
          foreach($projectindex as $projects)
          {?>
              <tr>
                  <td>
                      <?php echo $projects -> group_id;?>
                  </td>
                  <td>
                      <?php echo $projects->project_id ;?>
                  </td>
                  <td>
                      <?php echo $projects -> project_name;?>
                  </td>
                  <td>
                      <?php echo $projects -> project_length;?>
                  </td>
                  <td>
                      <?php echo $projects -> project_start_date;?>
                  </td>
                  <td>
                      <?php echo $projects -> project_end_date;?>
                  </td>
                  <td>
                      <?php echo $projects -> project_status;?>
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
