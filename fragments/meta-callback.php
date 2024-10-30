<?php 
// This page is content of callback function of metabox it displays content depending on type of metabox 
$ctp_mapper_label = 'ctp_mapper_label';
$ctp_mapper_field = 'ctp_mapper_field';

wp_nonce_field( 'cpt_mapper_nonce', 'cpt_mapper_nonce' );        
?>
<section>
<?php
	switch ( $metabox['args']['type'] ) {
	    
	    case "checkbox":
	      	?>
	      	<div>
			<?php

			// Below block of code is content of checkbox it gets array of checked values and check all values of array for all checkboxes using loop one by one   
			
			$name = get_post_meta($post->ID, $metabox['args']['metaid'], true);
			for ($i=0; $i < count( $metabox['args'][ 'opt' ] ) ; $i++) { 
				if ( ! empty( $metabox['args'][ 'opt' ][ $i ] ) ) {
				?>	
					<div><label class="<?php echo esc_attr( $ctp_mapper_label ); ?>"><?php echo  $metabox['args'][ 'opt' ][$i] ?></label><input type="checkbox" value="<?php echo $metabox['args'][ 'opt' ][$i]; ?>" name="<?php echo $metabox['args']['metaid']; ?>[]" <?php if ( is_array( $name ) ) { foreach ($name as $key => $value) { if( $value == $metabox['args'][ 'opt' ][$i] ){ echo 'checked'; } } }  ?> ></div>
				<?php
				}
			}
			?>	 			
 			</div>
	      	<?php  
	        break;
	    
	    case "select":
	        ?>
	        <div>
			 	<select name="<?php echo $metabox['args'][ 'metaid' ]; ?>">
			 		<option><?php _e( "Select", "cpt-mapper" ); ?></option>
				<?php
				for ($i=0; $i < count( $metabox['args'][ 'opt' ] ) ; $i++) { 
					if ( ! empty( $metabox['args'][ 'opt' ][ $i ] ) ) {	
					?>	
						<option value="<?php echo  $metabox['args'][ 'opt' ][ $i ]; ?>" <?php if( get_post_meta($post->ID, $metabox['args']['metaid'], true) == $metabox['args'][ 'opt' ][ $i ] ){ echo 'selected'; } ?> > <?php echo  $metabox['args'][ 'opt' ][ $i ]; ?></option>
					<?php
					}	
				}
				?>
				</select>
			</div>
	        <?php
	        break;
	    
	    case "radio":
	        ?>
	        <div>
				<?php
				for ($i=0; $i < count( $metabox['args'][ 'opt' ] ) ; $i++) { 
					if ( ! empty( $metabox['args'][ 'opt' ][$i] ) ) {
						?>
						<div><label class="<?php echo esc_attr( $ctp_mapper_label ); ?>"><?php echo $metabox['args'][ 'opt' ][ $i ]; ?></label><input type="radio" name="<?php echo $metabox['args'][ 'metaid' ]; ?>" value="<?php echo $metabox['args'][ 'opt' ][ $i ]; ?>"  <?php if( get_post_meta($post->ID, $metabox['args']['metaid'], true) == $metabox['args'][ 'opt' ][ $i ] ){ echo 'checked'; } ?> ></div>
						<?php
					}
				}
				?>	 			
		 	</div>
	        <?php
	        break;
	    
	    case "text":
	    	?>
	    	<div>
				<?php
				echo "<div><input type='text' name='".$metabox['args'][ 'metaid' ]."' class='".esc_attr( $ctp_mapper_field )."' value='".get_post_meta( $post->ID, $metabox['args']['metaid'], true )."' ></div>";
				?>
			</div>
	    	<?php
	    	break;
	    
	    case "textarea":
	    	?>
	    	<div>
				<?php
				echo "<div><textarea rows='4' cols='50'  name='".$metabox['args'][ 'metaid' ]."' value='".get_post_meta($post->ID, $metabox['args']['metaid'], true)."' >".esc_textarea( get_post_meta($post->ID, $metabox['args']['metaid'], true) )."</textarea></div>";
				?>
			</div>
	    	<?php
	    	break;   
	    default:
	        echo "Please select meta type!";
	}

?>
</section>