<?php include( 'header.php' ); ?>

  <div id="container">
    <header>

    </header>
    <div id="main" role="main" class="shadows">
		
		<div class="text">
			<h1>WordPress XML Splitter<h1>
		</div>
	
		<div class="text">
			<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post" enctype="multipart/form-data">
				<label for="file">Filename:</label>
				<input type="file" name="bigfile" id="file"><br>
				<input type="submit" name="submit" value="Submit">
		</div>
		
		<?php wxr_handle_uploads(); ?>
		
    </div>
    <footer>
	
    </footer>
  </div> <!--! end of #container -->
<?php include( 'footer.php' ); ?>
