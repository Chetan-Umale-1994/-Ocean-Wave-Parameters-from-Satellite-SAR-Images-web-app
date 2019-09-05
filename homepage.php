<html>
 <head>
  <title>Ocean wave parameters</title>
  <style>
div.gallery {
  margin: 67px;
  border: 1px solid #ccc;
  float: left;
  width: 500px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
}

div.desc {
  padding: 15px;
  text-align: center;
  color: grey;
}

.image-container{
	width:100%;
	
}
</style>
 </head>

 
 <body>  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                 
<nav style="margin-bottom: 0px !important;" class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Ocean Wave Parameters from Satellite (SAR) Images</a>
    </div>
    <form class="navbar-form navbar-left"  method="post">
      <div class="input-group">
        <input type="text"  id="datepicker" class="form-control" placeholder="Enter Date" name="image_date">
        <div class="input-group-btn">
          <button type="button" class="btn btn-primary" id="search_btn">Search Image</button>        </div>
      </div>
    </form>
  </div>
</nav>
 <div style="background-image: url(http://paperlief.com/images/ocean-waves-wallpaper-wallpaper-2.jpg);width: 100%;height:3000px;background-repeat: repeat;" class="container" style="padding-left: 28%;">

 <div style="display:none" class="alert alert-success" role="alert">
  Image found. Please select image from dropdown list below!
</div>
<div style="display:none" class="alert alert-danger" role="alert">
  No Image found! Data available only for June  2019!
</div>
 
 <div style="padding-top: 18px; padding-left: 34.5%;display:none" class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Image List
<span class="caret"></span></button>
<ul id="ul-container" style=" position: relative !important;float: none;width: 65%;display:relative" class="dropdown-menu" >
</ul>
</div>

<div class="image-container" style="display:none">
<div class="gallery">
  <a class="satellite-img" target="_blank" href="img_5terre.jpg">
    <img title='satellite_image' src="" alt="Cinque Terre" width="600" height="400">
  </a>
  <div class="desc"><font color="yellow"><b>Raw satellite image</b></font></div>
</div>
<div class="gallery">
  <a class="screenshot-img" target="_blank" href="img_forest.jpg">
    <img title='screenshot' src="" alt="Forest" width="600" height="400">
  </a>
  <div class="desc"><font color="yellow"><b>Location</b></font></div>
</div>

<div class="gallery">
  <a class="period-img" target="_blank">
    <img title='period_map' src="" alt="Mountains" width="600" height="400">
  </a>
  <div class="desc"><font color="yellow"><b>Wave period map</b></font></div>
</div>

<div class="gallery">
  <a class="height-img" target="_blank" href="img_mountains.jpg">
    <img title='height_map' src="" alt="Mountains" width="600" height="400">
  </a>
  <div class="desc"><font color="yellow"><b>Wave height map</b></b></font></div>
</div>

</div>
</div>
<script>
$(document).ready(function(){
$("#ul-container").on("click", "li", function(event){
	debugger;
	var imgName = event.target.innerText
	$.ajax({
		type: 'get',
		url: 'get_image_path.php',
		data: {'name': imgName },
		success: function(d){
		debugger;
			
			var path_arr = d.split("#");

			$(".image-container").css({'display':'block'});
			path_arr[0] = path_arr[0].replace("-","");			
			$("img[title='satellite_image']").attr({src: path_arr[0]});
			$(".satellite-img").attr({href: path_arr[0]});
			
			$("img[title='screenshot']").attr({src: path_arr[1]});
			$(".screenshot-img").attr({href: path_arr[1]});
			
			$("img[title='period_map']").attr({src: path_arr[2]});
			$(".period-img").attr({href: path_arr[2]});
			
			$("img[title='height_map']").attr({src: path_arr[3]});
			$(".height-img").attr({href: path_arr[3]});
			
			
		}
		
		})
})
		
		$("#search_btn").click(function(){
		debugger;
		$.ajax({
		type: 'get',
		url: 'get_image_name.php',
		data: {'date': $( "#datepicker").val() },
		success: function(d){
			if(d.length  > 1){
			$(".alert-success").css({'display':'block'});
			$(".alert-danger").css({'display':'none'});
			$(".dropdown").css({'display':'block'});
			$("#ul-container").html(d);
			}
			else{
				$(".alert-danger").css({'display':'block'});
				$(".alert-success").css({'display':'none'});
				$(".dropdown").css({'display':'none'});
			$(".image-container").css({'display':'none'});
			}
		}
		
		})
		
		});
		
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: "dd-mm-y"});
  } );
  } );
  </script>  
 </body>
</html>
