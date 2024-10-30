<?php
$srcpt_tax = get_option( "srcpt_tax" ); // getting taxonomy settings
/////

$ctp_mapper_main_bg = 'ctp_mapper_main_bg';
$ctp_mapper_wrapper = 'ctp_mapper_wrapper';
$ctp_mapper_heading = 'ctp_mapper_heading';
$ctp_mapper_btn = 'ctp_mapper_btn';
$ctp_mapper_notice =  'ctp_mapper_notice';
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
		<div class="<?php echo esc_attr( $ctp_mapper_heading ); ?>"><?php _e( "Add New Taxonomy", "srcpt-mapper" ); ?></div>
		<div>
			<button class="<?php echo esc_attr( $ctp_mapper_btn ); ?>" id="add_tax_field"><?php _e( "Add New Taxonomy", "srcpt-mapper" ); ?></button>
		</div>
		<div class="<?php echo esc_attr( $ctp_mapper_notice ); ?>">
			<span>
				<?php _e( "Note : After registeration of new taxonomy go to site Settings > Permalinks and click save button leaving everything unchanged", "srcpt-mapper" ); ?>
			</span>
		</div>
		<form method="post" action="options.php">
			<?php settings_fields( 'tax-mapper-settings' ); ?>
	        <?php do_settings_sections( 'tax-mapper-settings' ); ?>
	        <div class="<?php echo esc_attr( $ctp_mapper_left_card ); ?>">
	        <input type="hidden" id="srcpt-taxoffset" name="srcpt-taxoffset" value="<?php if(is_array( $srcpt_tax )){ echo count($srcpt_tax) ; }else{ echo "0";}  ?>">	
	        <?php
	        if ( ! empty( $srcpt_tax ) ) {
	        	for ( $i=0; $i <= count( $srcpt_tax )  ; $i++ ) { 
	        		if ( ! empty( $srcpt_tax[$i] ) ) {
	        		?>
	        		<div class="<?php echo esc_attr( $ctp_mapper_block ); ?>">
		        		<div class="<?php echo esc_attr( $ctp_mapper_title ); ?>">
		        			<span class="<?php echo esc_attr( $ctp_mapper_title_text ); ?>"><?php echo  "Name : ".$srcpt_tax[$i]['tname']; ?></span>
		        			<span class="<?php echo esc_attr( $ctp_mapper_title_slug_text ); ?>">Slug: <?php echo  $srcpt_tax[$i]['tslug']; ?> </span>
		        		</div>	
		        		<span class="<?php echo esc_attr( $removeblock ); ?>"><?php _e( "Remove", "srcpt-mapper" ); ?></span>
		        		<span class="<?php echo esc_attr( $editposttypes ); ?>"><?php _e( "Edit Taxonomy", "srcpt-mapper" ); ?></span>
		        		<div class="<?php echo esc_attr( $ctp_mapper_body ); ?>">
		        			<div>
		        				<label><?php _e( "Name of Taxonomy:", "srcpt-mapper" ); ?></label>
		        				<div>
		        					<input type='text' name='srcpt_tax[<?php echo $i; ?>][tname]' class="<?php echo esc_attr( $ctp_mapper_field ); ?>" value='<?php echo $srcpt_tax[$i]['tname']; ?>' required>
		        				</div>
		        			</div>
		        			<div>
		        				<label><?php _e( "Tax Slug:", "srcpt-mapper" ); ?></label>
		        				<div>
		        					<input type='text' value='<?php echo $srcpt_tax[$i]['tslug']; ?>' class="<?php echo esc_attr( $ctp_mapper_field ); ?>" name='srcpt_tax[<?php echo $i; ?>][tslug]' required>
		        				</div>
		        			</div>
		      				<div>
		      					<label><?php _e( "Associated Post Types:", "srcpt-mapper" ); ?></label>
		      					<div>
		      						<input type="text" value='<?php echo $srcpt_tax[$i]['srcpt_ptypes']; ?>' class="<?php echo esc_attr( $ctp_mapper_field ); ?>" name='srcpt_tax[<?php echo $i; ?>][srcpt_ptypes]' required>
		      					</div>
		      				</div>	
		        		</div>
		        	</div>
	        		<?php 
	        		}
	        	}
	        }	
	        ?>	
	        </div>
	        <div class="<?php echo esc_attr( $ctp_mapper_right_card ); ?>">
	        	<div id="srcpt-taxappend"></div>
	        </div>
			<div class="<?php echo esc_attr( $clear_both); ?>">
			<input type="submit" class="<?php echo esc_attr( $ctp_mapper_submit ); ?>" name="taxsub" value="Save Changes">	
			</div>
		</form>
	</div>	
	<div class="ctp_mapper_size_msg ctp_mapper_notice">
		<span><?php _e( "Your screen width must be 867px!", "srcpt-post-mapper" ); ?></span>
	</div>	
</section>



