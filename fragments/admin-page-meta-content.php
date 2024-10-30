<?php

$srcpt_meta     = get_option( "srcpt_meta" );
$srcpt_opt_meta = get_option( "srcpt_opt_meta" );


///////
$ctp_mapper_main_bg = 'ctp_mapper_main_bg';     // Getting classes in variables
$ctp_mapper_wrapper = 'ctp_mapper_wrapper';
$ctp_mapper_heading = 'ctp_mapper_heading';
$ctp_mapper_btn = 'ctp_mapper_btn';
$ctp_mapper_left_card = 'ctp_mapper_left_card'; 
$ctp_mapper_block = 'ctp_mapper_block';
$ctp_mapper_title =  'ctp_mapper_title';
$ctp_mapper_title_text = 'ctp_mapper_title_text'; 
$ctp_mapper_title_slug_text = 'ctp_mapper_title_slug_text';
$removeblock = 'removeblock';
$editposttypes = 'editposttypes';
$ctp_mapper_body = 'ctp_mapper_body';
$ctp_mapper_label = 'ctp_mapper_label';
$ctp_mapper_field = 'ctp_mapper_field';
$ctp_mapper_right_card = 'ctp_mapper_right_card';
$clear_both = 'clear_both';
$ctp_mapper_submit = 'ctp_mapper_submit';
?>
<section class="<?php echo esc_attr( $ctp_mapper_main_bg ); ?>">
	<div class="<?php echo esc_attr( $ctp_mapper_wrapper ); ?>">
		<div class="<?php echo esc_attr( $ctp_mapper_heading ); ?>"><?php _e( "Add Meta Fields", "cpt-mapper" ); ?></div>
		<button class="<?php echo esc_attr( $ctp_mapper_btn ); ?>" id="ctp_mapper_text" ><?php _e( "Add Meta Box", "cpt-mapper" ); ?></button>
		<form method="post" action="options.php">
			<?php settings_fields( 'meta-mapper-settings' ); ?>
	        <?php do_settings_sections( 'meta-mapper-settings' ); ?>
	        <div class="<?php echo esc_attr( $ctp_mapper_left_card ); ?>">
	        <input type="hidden" id="srcpt-metaoffset" name="srcpt-metaoffset" value="<?php if(is_array( $srcpt_meta )){ echo count($srcpt_meta) ; }else{ echo "0";}  ?>">	
	        	<?php
	        	if ( ! empty( $srcpt_meta ) ) {
	        		for ( $i=0; $i < count( $srcpt_meta )  ; $i++ ) { 
	        		?>
	        		<div class="<?php echo esc_attr( $ctp_mapper_block ); ?>">
		        		<div class="<?php echo esc_attr( $ctp_mapper_title ); ?>">
		        			<span class="<?php echo esc_attr( $ctp_mapper_title_text ); ?>"><?php echo  "Name : ".$srcpt_meta[$i]['mname']; ?></span>		
		        		</div>	
			        	<span class="<?php echo esc_attr( $removeblock ); ?>"><?php _e( "Remove", "cpt-mapper" ); ?></span>
			        	<span class="<?php echo esc_attr( $editposttypes ); ?>"><?php _e( "Edit Meta Box", "cpt-mapper" ); ?></span>
			        	<div class="ctp_mapper_body">
			        		<div>
			        			<label class='<?php echo esc_attr( $ctp_mapper_label ); ?>' ><?php _e( "Name of Meta Box:", "cpt-mapper" ); ?></label>
			        			<div>
			        				<input type='text' name='srcpt_meta[<?php echo $i; ?>][mname]' class="<?php echo esc_attr( $ctp_mapper_field ); ?>"  value='<?php echo $srcpt_meta[$i]['mname']; ?>' required>
			        			</div>
			        		</div>
			        		<div>
			        			<label class='<?php echo esc_attr( $ctp_mapper_label ); ?>' ><?php _e( "ID of Meta Box:", "cpt-mapper" ); ?></label>
			        			<div>
			        				<input type='text' name='srcpt_meta[<?php echo $i; ?>][mid]' class="<?php echo esc_attr( $ctp_mapper_field ); ?>"  value='<?php echo $srcpt_meta[$i]['mid']; ?>' required>
			        			</div>
			        		</div>
			        		<div>
			        			<label class='<?php echo esc_attr( $ctp_mapper_label ); ?>' ><?php _e( "Meta Box Screen:", "cpt-mapper" ); ?></label>
			        			<div>
			        				<input type='text' name='srcpt_meta[<?php echo $i; ?>][mscreen]' class="<?php echo esc_attr( $ctp_mapper_field ); ?>" value='<?php echo $srcpt_meta[$i]['mscreen']; ?>' required>
			        				<div>Note: Saperate names for post types with comma e.g  postone,posttwo </div>
			        			</div>
			        		</div>
			        		<div>
			        			<label class='<?php echo esc_attr( $ctp_mapper_label ); ?>' ><?php _e( "Context:", "cpt-mapper" ); ?></label>
			        			<div>
			        				<input type='text' name='srcpt_meta[<?php echo $i; ?>][mcontext]' class="<?php echo esc_attr( $ctp_mapper_field ); ?>" value='<?php echo $srcpt_meta[$i]['mcontext']; ?>' required>
			        			</div>
			        		</div>
			        		<div>
			        			<label class='<?php echo esc_attr( $ctp_mapper_label ); ?>' ><?php _e( "Priority:", "cpt-mapper" ); ?></label>
			        			<div>
			        				<input type='text' name='srcpt_meta[<?php echo $i; ?>][mpriority]' class="<?php echo esc_attr( $ctp_mapper_field ); ?>" value='<?php echo $srcpt_meta[$i]['mpriority']; ?>' required>
			        			</div>
			        		</div>
			        		<div>
			        			<label class='<?php echo esc_attr( $ctp_mapper_label ); ?>' ><?php _e( "Type:", "cpt-mapper" ); ?></label>
			        			<div>
			        				<input type='text' name='srcpt_meta[<?php echo $i; ?>][mtype]' class="<?php echo esc_attr( $ctp_mapper_field ); ?>" value='<?php echo $srcpt_meta[$i]['mtype']; ?>' required>
			        			</div>
			        		</div>
			        		<?php
			        		if (  ( $srcpt_meta[$i]['mtype'] == "radio" ) || ( $srcpt_meta[$i]['mtype'] == "select" ) || ( $srcpt_meta[$i]['mtype'] == "checkbox" )  ) {
			        			$conditional_display = "display: block;" ;	
			        		} else {
			        			$conditional_display = "display: none;" ;
			        		}
			        		?>
			        	
			        		<div style="<?php echo esc_attr( $conditional_display ); ?>">
			        			<?php 	
			        			for ($j=0; $j < count( $srcpt_opt_meta[$i] ); $j++) { 
			        			    $k = $j+1;	
			        			?>
			        				<div>
			        					<label class='<?php echo esc_attr( $ctp_mapper_label ); ?>'>
			        						<?php echo "Option ".$k ; ?>
			        					</label>
			        					<div>
			        						<input type='text'  name='srcpt_opt_meta[<?php echo $i; ?>][<?php echo $j; ?>]' class='<?php echo esc_attr( $ctp_mapper_field ); ?>'' value='<?php echo $srcpt_opt_meta[$i][$j]; ?>'>
			        					</div>
			        				</div>	
			        			<?php
			        			}

			        			?>
			        		</div>	
			        		
			        	</div>			        		
		        	</div>		
	        		<?php
	        		}	
	        	}
	    		?>
	    	</div>
	        <div class="<?php echo esc_attr( $ctp_mapper_right_card ); ?>">
	        	<div id="metafieldappend"></div>
	        </div>
			<div class="<?php echo esc_attr( $clear_both ); ?>">
			<input type="submit" class="<?php echo esc_attr( $ctp_mapper_submit ); ?>"   name="metasub" value="Save Changes">	
			</div>
		</form>		
	</div>
	<div class="ctp_mapper_size_msg ctp_mapper_notice">
		<span><?php _e( "Your screen width must be 867px!", "srcpt-post-mapper" ); ?></span>
	</div>	
</section>


