<?php
/**
 * Created by PhpStorm.
 * User: KJanardhanan119545
 * Date: 4/1/2016
 * Time: 11:25 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <link href="<?php echo base_url("assets/stylesheets/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/stylesheets/project_mgnt.css"); ?>" rel="stylesheet" type="text/css" />

    <title>New Story</title>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
      <div class="row">
          <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
              <legend>Add Employee Details</legend>
              <?php
                  $attributes = array("class" => "form-horizontal", "id" => "employeeform", "name" => "employeeform");
              echo form_open("employee/index", $attributes);?>
              <fieldset>

                  <div class="form-group">
                      <div class="row colbox">

                          <div class="col-lg-4 col-sm-4">
                              <label for="storyid" class="control-label">Story Id</label>
                          </div>
                          <div class="col-lg-8 col-sm-8">
                              <input id="storyid" name="storyid"  type="number" class="form-control"  value="<?php echo set_value('storyid',$storyid); ?>" />

                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="row colbox">
                          <div class="col-lg-4 col-sm-4">
                              <label for="projectid" class="control-label">Project Id</label>
                          </div>
                          <div class="col-lg-8 col-sm-8">

                              <?php
                              $attributes = 'class = "form-control" id = "projectid"';
                              echo form_dropdown('projectid',$projectindex,set_value('projectid'),$projectindex);?>
                            
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="row colbox">
                          <div class="col-lg-4 col-sm-4">
                              <label for="designation" class="control-label">Designation</label>
                          </div>
                          <div class="col-lg-8 col-sm-8">

                              <?php
                              $attributes = 'class = "form-control" id = "designation"';
                              echo form_dropdown('designation',$designation, set_value('designation'), $attributes);?>

                              <span class="text-danger"><?php echo form_error('designation'); ?></span>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="row colbox">
                          <div class="col-lg-4 col-sm-4">
                              <label for="hireddate" class="control-label">Hired Date</label>
                          </div>
                          <div class="col-lg-8 col-sm-8">
                              <input id="hireddate" name="hireddate" placeholder="hireddate" type="text" class="form-control"  value="<?php echo set_value('hireddate'); ?>" />
                              <span class="text-danger"><?php echo form_error('hireddate'); ?></span>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="row colbox">
                          <div class="col-lg-4 col-sm-4">
                              <label for="salary" class="control-label">Salary</label>
                          </div>
                          <div class="col-lg-8 col-sm-8">
                              <input id="salary" name="salary" placeholder="salary" type="text" class="form-control" value="<?php echo set_value('salary'); ?>" />
                              <span class="text-danger"><?php echo form_error('salary'); ?></span>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                          <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Insert" />
                          <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancel" />
                      </div>
                  </div>
              </fieldset>
              <?php echo form_close(); ?>
              <?php echo $this->session->flashdata('msg'); ?>
          </div>
      </div>
  </div>
  </body>
