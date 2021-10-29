<?php include 'db_connect.php' ?>
<style>
   span.float-right.summary_icon {
    font-size: 3rem;
    position: absolute;
    right: 1rem;
    top: 0;
}
.imgs{
		margin: .5em;
		max-width: calc(100%);
		max-height: calc(100%);
	}
	.imgs img{
		max-width: calc(100%);
		max-height: calc(100%);
		cursor: pointer;
	}
	#imagesCarousel,#imagesCarousel .carousel-inner,#imagesCarousel .carousel-item{
		height: 60vh !important;background: black;
	}
	#imagesCarousel .carousel-item.active{
		display: flex !important;
	}
	#imagesCarousel .carousel-item-next{
		display: flex !important;
	}
	#imagesCarousel .carousel-item img{
		margin: auto;
	}
	#imagesCarousel img{
		width: auto!important;
		height: auto!important;
		max-height: calc(100%)!important;
		max-width: calc(100%)!important;
	}
	.vid-item{
		cursor: pointer;
		position: relative;
	}
	.watch{
		position: absolute;
		top: 0;
		left: 0;
		height: calc(100%);
		width: calc(100%);
		opacity: 0;
	    background: #00000052;
	}
	.vid-item:hover .watch{
		opacity: 1;
	}
</style>
<head>
	 
</head>
<div class="containe-fluid">
	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
							<?php  
								$where = '';
								if(isset($_GET['s'])){
									$search = strtolower($_GET['s']);
									$where = " where LOWER(title) LIKE '%$search%' or LOWER(description) LIKE '%$search%' ";
								}
								$qry = $conn->query("SELECT * FROM uploads $where order by rand()");
								if($qry->num_rows > 0):
								while($row=$qry->fetch_assoc()):
							?>
							<div class="col-md-3 py-2">
								<div class="card bg-dark">
								  <a class="card-img-top d-flex justify-content-center bg-dark border-dark img-thumbnail w-100 p-0 vid-item" href="index.php?page=watch&code=<?php echo $row['code'] ?>">
									<video id="<?php echo $row['code'] ?>" class="img-fluid" <?php echo !empty($row['thumbnail_path']) ? "poster='assets/uploads/thumbnail/".$row['thumbnail_path']."'" : '' ?> muted>
										<source src="<?php echo !empty($row['video_path']) ? "assets/uploads/videos/".$row['video_path'] : '' ?>">
									</video>
									<div class="watch d-flex align-items-center justify-content-center"><h3><span class="fa fa-play text-white"></span></h3></div>
								</a>
								  <div class="card-body">
								    <h6 class="card-title text-white"><?php echo ucwords($row['title']) ?></h6>
								    <p class="card-text truncate text-white"><?php echo $row['description'] ?></p>
								  </div>
								</div>
							</div>
							<?php endwhile; ?>
							<?php else: ?>
								<center><b><h6>No video or clip to display.</h6></b></center>
							<?php endif; ?>
						</div>
                    </div>
                </div>
            </div>      			
        </div>
    </div>
</div>

<script>
	$('#upload').click(function(){
		uni_modal("<i class='fa fa-video'></i> Upload Video","upload.php","large")
	})
	$('.vid-item').click(function(){
		location.href = "index.php?page=watch&code="+$(this).attr('data-id')
	})
	$('.vid-item').hover(function(){
		var vid = $(this).find('video')
		var id = vid.get(0).id;
			setTimeout(function(){
				vid.trigger('play')
				document.getElementById(id).playbackRate = 2.0
			},500)
	})
	$('.vid-item').mouseout(function(){
		var vid = $(this).find('video')
			setTimeout(function(){
				vid.trigger('pause')
			},500)
	})
</script>
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyBJZiVVq9MBp7pKNlEsqWFMuNi4E_Llrsg",
    authDomain: "kointube.firebaseapp.com",
    projectId: "kointube",
    storageBucket: "kointube.appspot.com",
    messagingSenderId: "733608596478",
    appId: "1:733608596478:web:6c64b4da10e571e02a66af",
    measurementId: "G-DX1PYSWED5"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
