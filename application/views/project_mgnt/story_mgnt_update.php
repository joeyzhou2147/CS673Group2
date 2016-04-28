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

    <title>Story Update</title>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">

    </script>
    <![endif]-->
</head>
<body>


<div class="container">
    <h2>Update Story Entry</h2>

    <form class="form-horizontal" role="form" action="/cs673group2/index.php/story/updateStoryData" method="post">


        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Story Id:</label>

            <div class="col-sm-10">
                <input class="form-control col-sm-2" for="text" id="" name=""
                       value=<?php echo $storyindex[0]->story_id; ?> disabled>
                <input class="form-control col-sm-2" style="display: none;" for="text" id="updateStoryId"
                       name="updateStoryId" value=<?php echo $storyindex[0]->story_id; ?>>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Project Name:</label>

            <div class="col-sm-10">

                <select class="form-control" id="updateStoryProjectId" name="updateStoryProjectId"
                        placeholder="Enter Story owner">
                    <?php
                    // Iterating through the product array
                    foreach ($projectindex as $project) {
                        ?>
                        <option
                            value="<?php echo $project->project_id ?>" <?php if ($project->project_id == $storyindex[0]->project_id) {
                            echo ' selected="selected" ';
                        }?>>
                            <?php echo $project->project_name; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Story Description:</label>

            <div class="col-sm-10">
                <textarea style="resize: none;" type="text" maxlength="512" class="form-control"
                          id="updateStoryDescription" name="updateStoryDescription"
                          value=""><?php echo $storyindex[0]->story_description; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Story Assigned to:</label>

            <div class="col-sm-10">
                <select class="form-control" id="updateStoryOwner" name="updateStoryOwner"
                        placeholder="Enter Story Owner">
                    <option
                        value="<?php echo $storyindex[0]->story_owner ?>"><?php echo $storyindex[0]->story_owner; ?></option>
                    <option value="Kali">Kali</option>
                    <option value="Gilbert">Gilbert</option>
                    <option value="Terry">Terry</option>
                    <option value="Joe">Joe</option>
                    <option value="Haan">Haan</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Story Status:</label>

            <div class="col-sm-10">
                <select class="form-control" id="updateStoryStatus" name="updateStoryStatus"
                        placeholder="Enter Story Status">
                    <option
                        value="<?php echo $storyindex[0]->story_status ?>"><?php echo $storyindex[0]->story_status; ?></option>
                    <option value="Open">Open</option>
                    <option value="Pending">Pending</option>
                    <option value="Close">Close</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Story Update Date:</label>

            <div class="col-sm-10">
                <input type="date" class="form-control" id="" name="updateStoryDueDate"
                       placeholder="Enter Due  Date" value="<?php echo date("Y-m-d"); ?>" disabled>
                <input type="date" class="form-control" style="display: none;" id="updateStoryDueDate" name="updateStoryDueDate"
                       placeholder="Enter Due  Date" value="<?php echo date("Y-m-d"); ?>" >
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
    <p align="center" style="color:red;"><?php if (isset($message)) {
            echo $message;
        } ?></p>
</div>


</body>
</html>


</body>
</html>