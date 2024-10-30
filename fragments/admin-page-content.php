<?php
$srcpt_cpt =  get_option("srcpt_cpt");    // getting saved settings

///////
 $ctp_mapper_main_bg = 'ctp_mapper_main_bg';  // classes as a variables
 $ctp_mapper_wrapper = 'ctp_mapper_wrapper';
 $ctp_mapper_heading = 'ctp_mapper_heading';
 $ctp_mapper_btn = 'ctp_mapper_btn';
 $ctp_mapper_notice = 'ctp_mapper_notice';
 $ctp_mapper_left_card = 'ctp_mapper_left_card'; 
 $ctp_mapper_block = 'ctp_mapper_block';
 $ctp_mapper_title = 'ctp_mapper_title';
 $ctp_mapper_title_text = 'ctp_mapper_title_text';
 $ctp_mapper_title_slug_text = 'ctp_mapper_title_slug_text';
 $removeblock = 'removeblock';
 $editposttypes = 'editposttypes';
 $ctp_mapper_body = 'ctp_mapper_body';
 $ctp_mapper_field = 'ctp_mapper_field';
 $ctp_mapper_right_card = 'ctp_mapper_right_card';
 $ctp_mapper_submit = 'ctp_mapper_submit';
 $clear_both = 'clear_both';
?>


<section class="<?php echo esc_attr( $ctp_mapper_main_bg ); ?>">
	<div class="<?php echo esc_attr( $ctp_mapper_wrapper ); ?>">
		<div class="<?php echo esc_attr( $ctp_mapper_heading ); ?>"> <?php _e( "Add Custom Post Type", "srcpt-mapper" ); ?></div>
		<div>
			<button class="<?php echo esc_attr( $ctp_mapper_btn ); ?>" id="addpostfield"><?php _e( "Add New Post Type", "srcpt-mapper" ); ?></button>
		</div>
		<div class="<?php echo esc_attr( $ctp_mapper_notice ); ?>">
			<span>
				<?php
				_e( "Note : After registeration of new post type go to site Settings > Permalinks and click save button leaving everything unchanged", "srcpt-mapper" );
				?>
			</span>
		</div>
		<form method="post"  action="options.php">
			<?php settings_fields( 'cpt-mapper-settings' ); ?>
	        <?php do_settings_sections( 'cpt-mapper-settings' ); ?>
	        <div class="<?php echo esc_attr( $ctp_mapper_left_card ); ?>">
	        <input type="hidden" id="srcpt-offset" name="srcpt-offset" value="<?php if(is_array( $srcpt_cpt )){ echo count($srcpt_cpt) ; }else{ echo "0";}  ?>">	
	        <?php
	        if ( ! empty($srcpt_cpt) ) {
	        	for ($i=0; $i <= count($srcpt_cpt) ; $i++) { 
	        		if ( ! empty( $srcpt_cpt[$i] ) ) {
	        		?>
		        	<div class="<?php echo esc_attr( $ctp_mapper_block ); ?>">
		        		<div class="<?php echo esc_attr( $ctp_mapper_title); ?>">
		        			<span class="<?php echo esc_attr( $ctp_mapper_title_text ); ?>"><?php echo  "Name : ".$srcpt_cpt[$i]['name']; ?></span>
		        			<span class="<?php echo esc_attr( $ctp_mapper_title_slug_text ); ?>">Slug: <?php  echo  $srcpt_cpt[$i]['slug']; ?> </span>
		        		</div>	
		        		
		        		<span class="<?php echo esc_attr( $removeblock ); ?>"><?php _e( "Remove", "srcpt-mapper" ); ?></span>
		        		<span class="<?php echo esc_attr( $editposttypes ); ?>"><?php _e( "Edit Post Type", "srcpt-mapper" ); ?></span>
		        		
		        		<div class="<?php echo esc_attr( $ctp_mapper_body ); ?>">
		        			<div>
		        				<label><?php _e( "Name of Post Type:", "srcpt-mapper" ); ?></label>
		        				<div>
		        					<input type='text' name='srcpt_cpt[<?php echo $i; ?>][name]' class="<?php echo esc_attr( $ctp_mapper_field ); ?>" value='<?php echo $srcpt_cpt[$i]['name']; ?>' required>
		        				</div>
		        			</div>
		        			<div>
		        				<label><?php _e( "Menu Icon:", "srcpt-mapper" ); ?></label>
		        				<div>
		        					<input type='text' name='srcpt_cpt[<?php echo $i; ?>][icon]' class="<?php echo esc_attr( $ctp_mapper_field ); ?>" value='<?php echo $srcpt_cpt[$i]['icon']; ?>' >
		        				</div>
		        			</div>
		        			<div>
		        				<label><?php _e( "Post Slug:", "srcpt-mapper" ); ?></label>
		        				<div>
		        					<input type='text' value='<?php echo $srcpt_cpt[$i]['slug']; ?>' class="<?php echo esc_attr( $ctp_mapper_field ); ?>" name='srcpt_cpt[<?php echo $i; ?>][slug]' required>
		        				</div>
		        			</div>

		        			<div class="standard-padding">
		        				<?php _e( "Support:", "srcpt-mapper" ); ?>		
		        			</div>
	        				
	        				<label><?php _e( "Title", "srcpt-mapper" ); ?></label>
	        				
	        				<input type='checkbox' value='title' name='srcpt_cpt[<?php echo $i; ?>][title]' <?php if ( is_array( $srcpt_cpt ) && !empty($srcpt_cpt[$i]['title']) ) { if(  $srcpt_cpt[$i]['title'] == 'title' ){ echo 'checked'; } }  ?> >
	        				
	        				<label><?php _e( "Editor", "srcpt-mapper" ); ?></label>

							<input type='checkbox' value='editor' name="srcpt_cpt[<?php echo $i; ?>][editor]" <?php if( is_array( $srcpt_cpt ) && !empty($srcpt_cpt[$i]['editor']) ) { if( $srcpt_cpt[$i]['editor'] == 'editor' ){ echo 'checked'; } }  ?>>
							
							<label><?php _e( "Author", "srcpt-mapper" ); ?></label>
							
							<input type='checkbox' value='author' name="srcpt_cpt[<?php echo $i; ?>][author]"  <?php if( is_array( $srcpt_cpt ) && !empty($srcpt_cpt[$i]['author']) ) { if( $srcpt_cpt[$i]['author'] == 'author' ){ echo 'checked'; } }  ?>>
							
							<label><?php _e( "Thumbnail", "srcpt-mapper" ); ?></label>
							
							<input type='checkbox' value='thumbnail' name='srcpt_cpt[<?php echo $i; ?>][thumbnail]' <?php if( is_array( $srcpt_cpt ) && !empty($srcpt_cpt[$i]['thumbnail']) ) { if( $srcpt_cpt[$i]['thumbnail'] == 'thumbnail' ){ echo 'checked'; } } ?>>
							
							<label><?php _e( "Excerpt", "srcpt-mapper" ); ?></label>
							
							<input type='checkbox' value='excerpt' name='srcpt_cpt[<?php echo $i; ?>][excerpt]' <?php if( is_array( $srcpt_cpt ) && !empty($srcpt_cpt[$i]['excerpt']) ) { if( $srcpt_cpt[$i]['excerpt'] == 'excerpt' ){ echo 'checked'; }  } ?>>
							
							<label><?php _e( "Comments", "srcpt-mapper" ); ?></label>
							
							<input type='checkbox' value='comments' name='srcpt_cpt[<?php echo $i; ?>][comments]' <?php if( is_array( $srcpt_cpt ) && !empty($srcpt_cpt[$i]['comments']) ) { if( $srcpt_cpt[$i]['comments'] == 'comments' ){ echo 'checked'; } } ?>>

		        		</div>
		        	</div>
	        		<?php
	        		}
	        	}
	        }
	        ?>
	    	</div>
	        <div class="<?php echo esc_attr( $ctp_mapper_right_card ); ?>">
	        	<div id="srcpt-cptappend"></div>
	        </div>
			<div class="<?php echo esc_attr( $clear_both ); ?>">
				<input type="submit" class="<?php echo esc_attr( $ctp_mapper_submit ); ?>"   name="sub" value="Save Changes">	
			</div>
		</form>
	</div>	
	<div class="ctp_mapper_size_msg ctp_mapper_notice">
		<span><?php _e( "Your screen width must be 867px!", "srcpt-mapper" ); ?></span>
	</div>	
</section>

