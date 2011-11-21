<?php get_template_part( 'header' ); ?>

	    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="#">Wxr Fxr</a>
          <ul class="nav">
            <!-- <li class="active"><a href="#">Home</a></li> -->
            <!-- <li><a href="#about">About</a></li> -->
            <!-- <li><a href="#contact">Contact</a></li> -->
          </ul>
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Wxr Fxr!</h1>
 			<div class="row margin20">
				<div class="span4">
					<p>Upload your massive WordPress export and let us split it into pieces for you. Don't crash that nice shiny new site!</p>
				</div>
				<form class="span7 form-stacked shadows" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post" enctype="multipart/form-data">
					<label for="bigfile">Filename:</label>
					<input type="file" name="bigfile" id="file"><br>
					<input class="btn primary large" type="submit" name="submit" value="Submit">
				</form>
			</div>
				<?php wxr_handle_uploads(); ?>
	
				
	
	</div>
	
		<?php // get_template_part( 'tabs' ); ?>
 

	
      <!-- Example row of columns -->


      <footer>
        <p>&copy; Company 2011</p>
      </footer>

    </div> <!-- /container -->

<?php get_template_part( 'footer' ); ?>
