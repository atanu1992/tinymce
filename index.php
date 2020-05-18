<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<!-- <form action="upload.php" method="POST" accept-charset="utf-8" enctype="multipart/formdata"> -->
		<textarea id="myTextarea"></textarea>
		<br>
		<!-- <input type="submit" name="submit" value="Submit"> -->
	<!-- </form> -->
	<script src="jquery.min.js" type="text/javascript"></script>
	<script src="tinymce/tinymce.min.js" type="text/javascript"></script>

		<script>
		tinymce.init({
		    selector: '#myTextarea',
		    mode: "exact",
		    plugins: 'image code',
		    toolbar: 'undo redo | image code',
		    height:"450px",
	    	// width:"600px"

		    // without images_upload_url set, Upload tab won't show up
		    images_upload_url: 'upload.php',
		    
		    // override default upload handler to simulate successful upload
		    images_upload_handler: function (blobInfo, success, failure) {
		        var xhr, formData;
		      
		        xhr = new XMLHttpRequest();
		        xhr.withCredentials = false;
		        xhr.open('POST', 'upload.php');
		      
		        xhr.onload = function() {
		            var json;
		        
		            if (xhr.status != 200) {
		                failure('HTTP Error: ' + xhr.status);
		                return;
		            }
		        
		            json = JSON.parse(xhr.responseText);
		        
		            if (!json || typeof json.location != 'string') {
		                failure('Invalid JSON: ' + xhr.responseText);
		                return;
		            }
		        
		            success(json.location);
		        };
		      
		        formData = new FormData();
		        formData.append('file', blobInfo.blob(), blobInfo.filename());
		      
		        xhr.send(formData);
		    },
		});
		</script>


<!-- 	<script type="text/javascript">
	tinymce.init({
        // selector: "textarea",
        selector : "#pageBody",
        mode: "exact",
        images_upload_url : './upload.php',
        images_upload_base_path : '/images/',
  		automatic_uploads: false, 
        plugins: "code image",
        toolbar: "undo redo | image code",
	    height:"450px",
	    // width:"600px,"
	      images_upload_handler: function (blobInfo, success, failure) {
	      	console.log('hii');
			var xhr, formData;
			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', 'upload.php');
			xhr.onload = function() {
			  var json;

			  if (xhr.status != 200) {
				failure('HTTP Error: ' + xhr.status);
				return;
			  }
			  json = JSON.parse(xhr.responseText);

			  if (!json || typeof json.location != 'string') {
				failure('Invalid JSON: ' + xhr.responseText);
				return;
			  }
			  success(json.location);
			};
			formData = new FormData();
			formData.append('file', blobInfo.blob(), fileName(blobInfo));
			xhr.send(formData);
		 }
    });
	</script> -->
</body>
</html>