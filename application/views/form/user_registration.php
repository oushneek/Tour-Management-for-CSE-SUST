<div class="row show-grid">
  <div class="col-lg-8" style="padding-left: 8%;padding-top: 2%;">
      
        
        <?php //echo validation_errors('<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
        <legend>Registration Form</legend>

        <ul class="nav nav-tabs">
  <li class="active"><a href="#student" data-toggle="tab">Student</a></li>
  <li class=""><a href="#teacher" data-toggle="tab">Teacher</a></li>
  <li class=""><a href="#alumni" data-toggle="tab">Alumni</a></li>
  <li class=""><a href="#guest" data-toggle="tab">Guest</a></li>

</ul>
<div id="myTabContent" class="tab-content">


  <div class="tab-pane fade active in" id="student" >
    <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('register/student_process', $attributes);
    ?>
    <fieldset>
        <div class="form-group">
          <?php echo form_error('student_name','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="student_name" class="col-lg-2 control-label">Full Name*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo set_value('student_name'); ?>" placeholder="Type your Full Name according to your ID Card">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('student_pass','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="student_pass" class="col-lg-2 control-label">Password*</label>
          <div class="col-lg-10">
            <input type="password" class="form-control" id="student_pass" name="student_pass" value="<?php echo set_value('student_pass'); ?>">
          </div>
        </div>


        <div class="form-group">
          <?php echo form_error('student_reg','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="student_reg" class="col-lg-2 control-label">Reg No*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="student_reg" name="student_reg" value="<?php echo set_value('student_reg'); ?>" placeholder="Type your SUST Registration No">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('student_email','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="student_email" class="col-lg-2 control-label">Email*</label>
          <div class="col-lg-10">
            <input type="student_email" class="form-control" id="student_email" name="student_email"  value="<?php echo set_value('student_email'); ?>" placeholder="Type your Email ID">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('student_mobile','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="student_mobile" class="col-lg-2 control-label">Mobile*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="student_mobile" name="student_mobile"  value="<?php echo set_value('student_mobile'); ?>" placeholder="Type your Mobile Number">
          </div>
        </div>

         <div class="form-group">
          <?php echo form_error('student_home_mobile','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="student_home_mobile" class="col-lg-2 control-label">Home Phone*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="student_home_mobile" name="student_home_mobile"  value="<?php echo set_value('student_home_mobile'); ?>" placeholder="Type your Home Phone">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('student_t_shirt','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="student_t_shirt" class="col-lg-2 control-label">T-Shirt Size</label>
          <div class="col-lg-10">
            <select class="form-control" id="student_t_shirt" name="student_t_shirt">
              <option value="">Select</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
            </select>
            </div>
        </div>



        <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </div>
      </fieldset>
    </form>
  </div>
  <div class="tab-pane fade" id="teacher">
    <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('register/teacher_process', $attributes);
    ?>
    <fieldset>
        <div class="form-group">
          <?php echo form_error('teacher_name','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="teacher_name" class="col-lg-2 control-label">Full Name*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="teacher_name" name="teacher_name" value="<?php echo set_value('teacher_name'); ?>" placeholder="Type your Full Name according to your ID Card">
          </div>
        </div>


        <div class="form-group">
          <?php echo form_error('teacher_pass','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="teacher_pass" class="col-lg-2 control-label">Password*</label>
          <div class="col-lg-10">
            <input type="password" class="form-control" id="teacher_pass" name="teacher_pass" value="<?php echo set_value('teacher_pass'); ?>" >
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('teacher_email','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="teacher_email" class="col-lg-2 control-label">Email*</label>
          <div class="col-lg-10">
            <input type="email" class="form-control" id="teacher_email" name="teacher_email"  value="<?php echo set_value('teacher_email'); ?>" placeholder="Type your Email ID">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('teacher_mobile','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="teacher_mobile" class="col-lg-2 control-label">Mobile*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="teacher_mobile" name="teacher_mobile"  value="<?php echo set_value('teacher_mobile'); ?>" placeholder="Type your Mobile Number">
          </div>
        </div>

         <div class="form-group">
          <?php echo form_error('teacher_home_mobile','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="teacher_home_mobile" class="col-lg-2 control-label">Home Phone*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="teacher_home_mobile" name="teacher_home_mobile"  value="<?php echo set_value('teacher_home_mobile'); ?>" placeholder="Type your Home Phone">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('teacher_t_shirt','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="teacher_t_shirt" class="col-lg-2 control-label">T-Shirt Size</label>
          <div class="col-lg-10">
            <select class="form-control" id="teacher_t_shirt" name="teacher_t_shirt">
              <option value="">Select</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
            </select>
            </div>
        </div>



        <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </div>
      </fieldset>
    </form>
  </div>
  <div class="tab-pane fade" id="alumni">
    <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('register/alumni_process', $attributes);
    ?>
    <fieldset>
        <div class="form-group">
          <?php echo form_error('alumni_name','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="alumni_name" class="col-lg-2 control-label">Full Name*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="alumni_name" name="alumni_name" value="<?php echo set_value('alumni_name'); ?>" placeholder="Type your Full Name according to your ID Card">
          </div>
        </div>


        <div class="form-group">
          <?php echo form_error('alumni_pass','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="alumni_pass" class="col-lg-2 control-label">Password*</label>
          <div class="col-lg-10">
            <input type="password" class="form-control" id="alumni_pass" name="alumni_pass" value="<?php echo set_value('student_pass'); ?>" >
          </div>
        </div>


        <div class="form-group">
          <?php echo form_error('alumni_reg','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="alumni_reg" class="col-lg-2 control-label">Reg No*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="alumni_reg" name="alumni_reg" value="<?php echo set_value('alumni_reg'); ?>" placeholder="Type your SUST Registration No">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('alumni_email','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="alumni_email" class="col-lg-2 control-label">Email*</label>
          <div class="col-lg-10">
            <input type="email" class="form-control" id="alumni_email" name="alumni_email"  value="<?php echo set_value('alumni_email'); ?>" placeholder="Type your Email ID">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('alumni_mobile','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="alumni_mobile" class="col-lg-2 control-label">Mobile*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="alumni_mobile" name="alumni_mobile"  value="<?php echo set_value('alumni_mobile'); ?>" placeholder="Type your Mobile Number">
          </div>
        </div>

         <div class="form-group">
          <?php echo form_error('alumni_home_mobile','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="alumni_home_mobile" class="col-lg-2 control-label">Home Phone*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="alumni_home_mobile" name="alumni_home_mobile"  value="<?php echo set_value('alumni_home_mobile'); ?>" placeholder="Type your Home Phone">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('alumni_t_shirt','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="teacher_t_shirt" class="col-lg-2 control-label">T-Shirt Size</label>
          <div class="col-lg-10">
            <select class="form-control" id="alumni_t_shirt" name="alumni_t_shirt">
              <option value="">Select</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
            </select>
            </div>
        </div>



        <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </div>
      </fieldset>
    </form>
  </div>
  <div class="tab-pane fade" id="guest">
    <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('register/guest_process', $attributes);
    ?>
    <fieldset>
        <div class="form-group">
          <?php echo form_error('guest_name','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="guest_name" class="col-lg-2 control-label">Full Name*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="guest_name" name="guest_name" value="<?php echo set_value('guest_name'); ?>" placeholder="Type your Full Name according to your ID Card">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('guest_pass','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="guest_pass" class="col-lg-2 control-label">Password*</label>
          <div class="col-lg-10">
            <input type="password" class="form-control" id="guest_pass" name="guest_pass" value="<?php echo set_value('student_pass'); ?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('guest_email','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="guest_email" class="col-lg-2 control-label">Email*</label>
          <div class="col-lg-10">
            <input type="email" class="form-control" id="guest_email" name="guest_email"  value="<?php echo set_value('guest_email'); ?>" placeholder="Type your Email ID">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('guest_mobile','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="guest_mobile" class="col-lg-2 control-label">Mobile*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="guest_mobile" name="guest_mobile"  value="<?php echo set_value('guest_mobile'); ?>" placeholder="Type your Mobile Number">
          </div>
        </div>

         <div class="form-group">
          <?php echo form_error('guest_home_mobile','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="guest_home_mobile" class="col-lg-2 control-label">Home Phone*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="guest_home_mobile" name="guest_home_mobile"  value="<?php echo set_value('guest_home_mobile'); ?>" placeholder="Type your Home Phone">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('guest_t_shirt','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="guest_t_shirt" class="col-lg-2 control-label">T-Shirt Size</label>
          <div class="col-lg-10">
            <select class="form-control" id="guest_t_shirt" name="guest_t_shirt">
              <option value="">Select</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
            </select>
            </div>
        </div>



        <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </div>
      </fieldset>
    </form>
  </div>


</div>
  
  </div>
    <div class="col-lg-4" style="padding-top: 4%;padding-right: 2%;">
      <div class="panel panel-default">
      <div class="panel-heading">Registration Intruction</div>
      <div class="panel-body">
        <ol>
          <li>You must have to be a Student of SUST</li>
        </ol>
        </div>
      </div>
    </div>
  </div>