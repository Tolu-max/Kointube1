
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding:10">
  <div class="container-fluid">
	    <a class="navbar-brand" href="./"><b>Kointube</b></a>
	    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
	     <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			  </div>
			  <input type="text" id="search" value="<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
			</div>
	    </div>
	    <div class="collapse navbar-collapse" id="navbarResponsive">
	        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
	            	    <div class="collapse navbar-collapse" id="navbarResponsive">
	        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.html">Subscription</a></li>
	            <?php if(isset($_SESSION['login_id'])): ?>
	            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=my_uploads">My Uploads</a></li>
	            <li class="dropdown nav-item">
                	<a href="#" class="nav-link dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucwords($_SESSION['login_firstname'].' '.$_SESSION['login_middlename']) ?> </a>
	              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
	                <a class="dropdown-item" href="index.php?page=signup&id=<?php echo $_SESSION['login_id'] ?>" id=""><i class="fa fa-cog"></i> Manage Account</a>
	                <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
	              </div>
	            </li>
	          <?php else: ?>
	            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php" id="login_now">Login</a></li>
	          <?php endif; ?>
	           
	            
	         
	        </ul>
	    </div>
	</div>
</nav>
 
<script>
  $('#login_now').click(function(){
    uni_modal("LOGIN",'login.php')
  })
  $('#search').keypress(function(e){
  	if(e.which == 13){
  		location.href = "index.php?s="+$(this).val()
  	}
  })
</script>

