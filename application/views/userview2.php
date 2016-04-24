<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Table</h2>
  <p>The .table-responsive class creates a responsive table which will scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, there is no difference:</p>                                                                                      
  <div class="table-responsive">          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>       
        <th>email</th>
        <th>UserName</th>
      
        
      </tr>
    </thead>
    <tbody>
 <?php
	      foreach($departments as $users)
		{?>	
			<tr>
			<td>
             <?php echo $users -> user_id;?>
			</td>
			<td>
             <?php echo $users ->salt ;?>
			</td>
			<td>
             <?php echo $users -> username;?>
			</td>
			</tr>
      <?php  }?>
	
	   </tbody>
  </table>
  </div>
</div>

</body>
</html>
