<title>SUST CSE Tour 2014 ~ <?php echo $title; ?></title>

<link href="<?php echo base_url(); ?>design/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>design/css/bootswatch.min.css" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url(); ?>design/js/jquery-1.10.2.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>design/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>design/js/bootswatch.js" ></script>

<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <?php 
            $tour_obj=new Tour_table();
            $tour_obj->where('status',2);
            $tour_obj->get();
            
            $default_tour=$tour_obj->tour_title;
            ?>
          <a href="<?php echo base_url(); ?>" class="navbar-brand"><?php echo $default_tour;?></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
           
           		<?php
           		if($this->session->userdata('logged_in')){
           			if($this->session->userdata('user_type_id') == 4){
           				$this->view("menu/admin");
           			}
           			else if($this->session->userdata('user_type_id') == 6){
           				$this->view("menu/organizer");
           			}
                else{
                  $this->view("menu/other_users");
                }
           		}
           		else{
                $this->view("menu/common");
           		}

           		?>
          </ul>


          <ul class="nav navbar-nav navbar-right">
           
            <?php 
            if($this->session->userdata('logged_in')){
                echo "<li><a href=".base_url()."logout>Logout</a></li>";
            }
            else{
                echo "<li><a href=".base_url()."login>Login</a></li>";
                echo "<li><a href=".base_url()."register>Register</a></li>";
            }
            ?>
          </ul>

        </div>
      </div>
    </div>


