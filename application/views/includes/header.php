<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>PlayGroup Reporting</title>
	<script
			  src="//code.jquery.com/jquery-2.2.2.min.js"
			  integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
			  crossorigin="anonymous"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css rel="stylesheet" crossorigin="anonymous">
	<?php echo link_tag('assets/stylesheets/datepicker.css'); ?>
	
	<script type="text/javascript" src="<?php echo base_url();?>assets/javascripts/bootstrap-datepicker.js"></script>
    
    <?php echo link_tag('assets/stylesheets/style.css'); ?>


<style type="text/css">
	.navbar-inverse {
		background-color: lightblue
	}

	h4 {
		color:green;
	}
	.datepicker{
		z-index:1151 !important;
	}

	.shadow {
  -moz-box-shadow:    .5px .5px 2px 3px #ccc;
  -webkit-box-shadow: .5px .5px 2px 3px #ccc;
  box-shadow:         .5px .5px 2px 3px #ccc;
   }
	
</style>

<script>
	$('.datepicker').datepicker(
		{format:"yyyy-mm-dd",
    
	}).on('changeDate',function(e){
    $(this).datepicker('hide')
  });
</script>

</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
	    	 
	        <div id="navbar" class="collapse navbar-collapse">
	          
	          <ul class="nav navbar-nav">
	          <li class="active"><a href="home_page">Home</a></li>
	          <li><a href="about">about</a></li>
	          <li><a href="<?php echo base_url(); ?>">Logout</a></li>
	            
	          </ul>
	        </div>
        </div>
      </div>
    </div>