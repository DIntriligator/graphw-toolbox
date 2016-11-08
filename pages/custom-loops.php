<section class="custom-loops" id="custom-loops" style="display:none;">
	<form name="add-custom-loops" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
	<input type="hidden" name="action" value="graphw_add_custom_loops" />
	<?php wp_nonce_field()?>
	<div class="container">
		 <div class="submit">
       <h5 class="title">Custom Loops</h5><input type="submit" name="Submit" class="button-primary" value="Add New" />
		  </div>
		</div>
	</form>

	<form name="custom-loops" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
	<input type="hidden" name="action" value="graphw_custom_loops" />
	<?php wp_nonce_field()?>
	<?php ?>
		<div class="container">
			<?php $loops = get_option('gw-loops'); ?>

			<?php $index = 0; foreach($loops as $loop) : ?>
				<?php if($index % 2 == 0) :?>
			    	<div class="row">
			    <?php endif;?>

			    <div class="six columns graphw_admin-card cpt_card">
			    	<h6 class="text-center" style="margin-bottom:0;"><?php echo $loop['title'] ?></h6>
		    		<hr style="margin-top:5px;">

		    		<h6 class="text-center">[gw-loop id="<?php echo $loop['id'] ?>"]</h6>

			    	<label>Loop Name: <input type="text" name="<?php echo 'post-title-' . $loop['id']?>" value="<?php echo $loop['title']?>"/></label>

			    	<label>Post Type: 
			    		<select name="<?php echo 'post-type-' . $loop['id']?>">
			    			<?php $types = get_post_types();
						    	$dont_show=['attachment', 'revision', 'nav_menu_item', 'acf', 'graphw_cpt', 'newcpt', 'nf_sub'];
						      foreach( $types as $type ) :
						      	if(!in_array($type, $dont_show)) :
						      		if($loop['post-type'] == $type) :
						     		?>
						   			<option value="<?php echo $type ?>" selected><?php echo $type ?></option>
						   			<?php else : ?>

						   			<option value="<?php echo $type ?>"><?php echo $type ?></option>
						   	<?php endif; endif; endforeach; ?>
			    		</select>
			    	</label>

			    	<label>Categories: <input type="text" name="<?php echo 'categories-' . $loop['id']?>" value="<?php echo $loop['categories']?>"/></label>

			    	<label>Tags: <input type="text" name="<?php echo 'tags-' . $loop['id']?>" value="<?php echo $loop['tags']?>"/></label>

			    	<label>Posts Per Page: <input type="text" name="<?php echo 'posts-per-page-' . $loop['id']?>" value="<?php echo $loop['posts-per-page']?>"/></label>

			    	<label>Post Order: 
			    		<select name="<?php echo 'post-order-' . $loop['id']?>">
					   		<option value="ASC">Ascending</option>
					   		<?php if($loop['post-order'] == 'DEC') : ?>
						   		<option value="DEC" selected>Decending</option>
						   	<?php else : ?>
						   		<option value="DEC">Decending</option>
						   	<?php endif; ?>
			    		</select>
			    	</label>

			    	<label>Order By: <input type="text" name="<?php echo 'order-by-' . $loop['id']?>" value="<?php echo $loop['order-by']?>"/></label>			 

			    	<label>Taxonomy Name: <input type="text" name="<?php echo 'taxonomy-name-' . $loop['id']?>" value="<?php echo $loop['taxonomy-name']?>"/></label>	

			    	<label>Taxonomy Query: <input type="text" name="<?php echo 'taxonomy-query-' . $loop['id']?>" value="<?php echo $loop['taxonomy-query']?>"/></label>

			    	<label>Loop content</label>
			    	<textarea name="<?php echo 'loop-content-' . $loop['id']?>" style="width:100%; height:200px;"><?php echo stripslashes($loop['loop-content']) ?></textarea>

  	    		<div class="text-center submit submit<?php echo $index ?>">
  		        <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
  		      </div>

					</div>

				<?php if($index % 2 == 1) :?>
			   	</div>
		    <?php endif;?>
		  <?php $index++; endforeach; ?>

		</div>

	</form>

	<div class="container">
	  <div class="row">
	  	<div class="four offset-by-four columns cpt_delete">
	  		<form name="loop-delete-button" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
			  <input type="hidden" name="action" value="graphw_delete_custom_loops" />
			  <?php wp_nonce_field()?>
			    <div class="text-center" style="margin-top:30px;">
			    	<p>Select the ID of the loop to be deleted</p>
			    <select name="the-id" >
			    	<option>select one</option>
			    	<?php foreach($loops as $loop) : ?>
							<option value="<?php echo $loop['id'] ?>"><?php echo $loop['id'] ?></option>
						<?php endforeach; ?>
			    </select><br><br>
		          <input type="submit" name="Submit" class="button-warn" value="Delete" />
		        </div>
			  </form>
		  </div>
		</div>
	</div>
</section>