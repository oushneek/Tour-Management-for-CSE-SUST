<div class="row show-grid">
  <div class="col-lg-8" style="padding-left: 8%;padding-top: 2%;">
      
        <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('message/process', $attributes);
        ?>
        <fieldset>
        <?php //echo validation_errors('<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
        <legend>Send Message</legend>

        <div class="form-group">
          <?php echo form_error('message','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="message" class="col-lg-2 control-label">Message*</label>
          <div class="col-lg-10">
            <textarea  class="form-control" id="message" name="message"  value="" placeholder="Type your Message"></textarea>
          </div>
        </div>

      
  
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
    </div>
  </fieldset>
</form>
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