<section class="cpt" id="cpt" style="display:none;">
	  <form name="cpt-add-button" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
	  <input type="hidden" name="action" value="graphw_cpt_add_button" />
	  <?php wp_nonce_field()?>
		  <div class="container">
		    <div class="submit">
		        <h5 class="title">Custom Post Types</h5><input type="submit" name="Submit" class="button-primary" value="Add New" />
		    </div>
		  </div>
	  </form>
	
	<form name="cpt_form_<?php echo $index ?>" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
		<input type="hidden" name="action" value="graphw_cpt" />
			<?php wp_nonce_field()?>
		  <div class="container">
		  <?php 
		  	function graphw_dashicons($index){
		  		//array of all dashicons
		  		$icons = [
		  								"dashicons-menu","dashicons-admin-site","dashicons-dashboard","dashicons-admin-post","dashicons-admin-media","dashicons-admin-links","dashicons-admin-page","dashicons-admin-comments","dashicons-admin-appearance","dashicons-admin-plugins","dashicons-admin-users","dashicons-admin-tools","dashicons-admin-settings","dashicons-admin-network","dashicons-admin-home","dashicons-admin-generic","dashicons-admin-collapse","dashicons-filter","dashicons-admin-customizer","dashicons-admin-multisite","dashicons-welcome-write-blog","dashicons-welcome-add-page","dashicons-welcome-view-site","dashicons-welcome-widgets-menus","dashicons-welcome-comments","dashicons-welcome-learn-more","dashicons-format-aside","dashicons-format-image","dashicons-format-gallery","dashicons-format-video","dashicons-format-status","dashicons-format-quote","dashicons-format-chat","dashicons-format-audio","dashicons-camera","dashicons-images-alt","dashicons-images-alt2","dashicons-video-alt","dashicons-video-alt2","dashicons-video-alt3","dashicons-media-archive","dashicons-media-audio","dashicons-media-code","dashicons-media-default","dashicons-media-document","dashicons-media-interactive","dashicons-media-spreadsheet","dashicons-media-text","dashicons-media-video","dashicons-playlist-audio","dashicons-playlist-video","dashicons-controls-play","dashicons-controls-pause","dashicons-controls-forward","dashicons-controls-skipforward","dashicons-controls-back","dashicons-controls-skipback","dashicons-controls-repeat","dashicons-controls-volumeon","dashicons-controls-volumeoff","dashicons-image-crop","dashicons-image-rotate","dashicons-image-rotate-left","dashicons-image-rotate-right","dashicons-image-flip-vertical","dashicons-image-flip-horizontal","dashicons-image-filter","dashicons-undo","dashicons-redo","dashicons-editor-bold","dashicons-editor-italic","dashicons-editor-ul","dashicons-editor-ol","dashicons-editor-quote","dashicons-editor-alignleft","dashicons-editor-aligncenter","dashicons-editor-alignright","dashicons-editor-insertmore","dashicons-editor-spellcheck","dashicons-editor-expand","dashicons-editor-contract","dashicons-editor-kitchensink","dashicons-editor-underline","dashicons-editor-justify","dashicons-editor-textcolor","dashicons-editor-paste-word","dashicons-editor-paste-text","dashicons-editor-removeformatting","dashicons-editor-video","dashicons-editor-customchar","dashicons-editor-outdent","dashicons-editor-indent","dashicons-editor-help","dashicons-editor-strikethrough","dashicons-editor-unlink","dashicons-editor-rtl","dashicons-editor-break","dashicons-editor-code","dashicons-editor-paragraph","dashicons-editor-table","dashicons-align-left","dashicons-align-right","dashicons-align-center","dashicons-align-none","dashicons-lock","dashicons-unlock","dashicons-calendar","dashicons-calendar-alt","dashicons-visibility","dashicons-hidden","dashicons-post-status","dashicons-edit","dashicons-trash","dashicons-sticky","dashicons-external","dashicons-arrow-up","dashicons-arrow-down","dashicons-arrow-right","dashicons-arrow-left","dashicons-arrow-up-alt","dashicons-arrow-down-alt","dashicons-arrow-right-alt","dashicons-arrow-left-alt","dashicons-arrow-up-alt2","dashicons-arrow-down-alt2","dashicons-arrow-right-alt2","dashicons-arrow-left-alt2","dashicons-sort","dashicons-leftright","dashicons-randomize","dashicons-list-view","dashicons-exerpt-view","dashicons-grid-view","dashicons-move","dashicons-share","dashicons-share-alt","dashicons-share-alt2","dashicons-twitter","dashicons-rss","dashicons-email","dashicons-email-alt","dashicons-facebook","dashicons-facebook-alt","dashicons-googleplus","dashicons-networking","dashicons-hammer","dashicons-art","dashicons-migrate","dashicons-performance","dashicons-universal-access","dashicons-universal-access-alt","dashicons-tickets","dashicons-nametag","dashicons-clipboard","dashicons-heart","dashicons-megaphone","dashicons-schedule","dashicons-wordpress","dashicons-wordpress-alt","dashicons-pressthis","dashicons-update","dashicons-screenoptions","dashicons-info","dashicons-cart","dashicons-feedback","dashicons-cloud","dashicons-translation","dashicons-tag","dashicons-category","dashicons-archive","dashicons-tagcloud","dashicons-text","dashicons-yes","dashicons-no","dashicons-no-alt","dashicons-plus","dashicons-plus-alt","dashicons-minus","dashicons-dismiss","dashicons-marker","dashicons-star-filled","dashicons-star-half","dashicons-star-empty","dashicons-flag","dashicons-warning","dashicons-location","dashicons-location-alt","dashicons-vault","dashicons-shield","dashicons-shield-alt","dashicons-sos","dashicons-search","dashicons-slides","dashicons-analytics","dashicons-chart-pie","dashicons-chart-bar","dashicons-chart-line","dashicons-chart-area","dashicons-groups","dashicons-businessman","dashicons-id","dashicons-id-alt","dashicons-products","dashicons-awards","dashicons-forms","dashicons-testimonial","dashicons-portfolio","dashicons-book","dashicons-book-alt","dashicons-download","dashicons-upload","dashicons-backup","dashicons-clock","dashicons-lightbulb","dashicons-microphone","dashicons-desktop","dashicons-laptop","dashicons-tablet","dashicons-smartphone","dashicons-phone","dashicons-index-card","dashicons-carrot","dashicons-building","dashicons-store","dashicons-album","dashicons-palmtree","dashicons-tickets-alt","dashicons-money","dashicons-smiley","dashicons-thumbs-up","dashicons-thumbs-down","dashicons-layout","dashicons-paperclip"
		  		];
		  		$output = '<div id="dashicon-selections'.$index.'" class="dashicon-selections">';
		  		foreach ($icons as $icon) {
		  			$output .= '<a href="#" class="dashicon-select-btn" data-icon="'.$icon.'" data-index="'.$index.'"><span class="dashicons '.$icon.'"></span></a>';
		  		}
		  		$output .= '</div>';

		  		echo $output;
		  	}

		  	$index = 0;
		  	$args = array( 'post_type' => 'graphw_cpt', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'ID' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); 
					$plural_cpt = get_post_meta( get_the_id(), '_plural', true );
					$single_cpt = get_post_meta( get_the_id(), '_single', true );
					$dashicon_cpt = get_post_meta( get_the_id(), '_dashicon', true );
					$public_cpt = get_post_meta( get_the_id(), '_public', true );
					$hierarchial_cpt = get_post_meta( get_the_id(), '_hierarchial', true );
					$archive_cpt = get_post_meta( get_the_id(), '_archive', true );
					$title_cpt = get_post_meta( get_the_id(), '_title', true );
					$editor_cpt = get_post_meta( get_the_id(), '_editor', true );
					$author_cpt = get_post_meta( get_the_id(), '_author', true );
					$thumbnail_cpt = get_post_meta( get_the_id(), '_thumbnail', true );
					$excerpt_cpt = get_post_meta( get_the_id(), '_excerpt', true );
					$comments_cpt = get_post_meta( get_the_id(), '_comments', true );
					$page_attributes_cpt = get_post_meta( get_the_id(), '_page-attributes', true );
					?>
			<?php if($index % 2 == 0) :?>
		    	<div class="row">
		    <?php endif;?>
		    <div class="six columns graphw_admin-card cpt_card">
		    	<h6 class="text-center" style="margin-bottom:0;"><?php echo $plural_cpt ?></h6>
		    	<hr style="margin-top:5px;">
		    	<div>
		    	<div class="six columns">
				    		<div class="cpt_input">
					    		<label for="name<?php echo $index ?>">Slug</label>
					    		<input type="text" name="name<?php echo $index ?>" value="<?php the_title(); ?>" />
				    		</div>
				    		<div class="cpt_input">
					    		<label for="plural<?php echo $index ?>">Plural Name</label>
					    		<input type="text" name="plural<?php echo $index ?>" value="<?php echo $plural_cpt ?>" />
				    		</div>

				    		<div class="cpt_input">
					    		<label for="single<?php echo $index ?>">Singular Name</label>
					    		<input type="text" name="single<?php echo $index ?>" value="<?php echo $single_cpt ?>" />
				    		</div>

				    		<div class="cpt_input">
					    		<label for="dashicon<?php echo $index ?>">Dashicon</label>
					    		<input type="hidden" name="dashicon<?php echo $index ?>" id="dashicon<?php echo $index ?>" value="<?php echo $dashicon_cpt ?>" />
					    		<span id="dashicon-display<?php echo $index ?>" class="dashicons <?php echo $dashicon_cpt ?>"></span><br><br>
					    		<a href="#" class="dashicon-open-btn button" data-index="<?php echo $index ?>">Pick an Icon</a>
					    		<?php graphw_dashicons($index) ?>
				    		</div>
				    </div>		
				   <div class="six columns">
				    		<div>
				    			<label>&nbsp;</label>
					    		<input type="checkbox" name="public<?php echo $index ?>" value="yes" <?php echo $public_cpt ?> />
					    		<label for="public<?php echo $index ?>"  class="checkbox_label" >Public?</label>
				    		</div>

				    		<div>
					    		<input type="checkbox" name="archive<?php echo $index ?>" value="yes" <?php echo $archive_cpt ?>  />
					    		<label for="archive<?php echo $index ?>"  class="checkbox_label">Has Archive?</label>
				    		</div>

				    		<div >
					    		<input type="checkbox" name="hierarchial<?php echo $index ?>" value="yes" <?php echo $hierarchial_cpt ?> />
					    		<label for="hierarchial<?php echo $index ?>"  class="checkbox_label">Is Hierarchial?</label>
				    		</div>
				    		<div class="cpt_input cpt_supports">
				    			<h6 style="margin:0; margin-top:20px;">Supports</h6>
					    		<input type="checkbox" name="title<?php echo $index ?>" value="yes" <?php echo $title_cpt ?>/>
					    		<label for="title<?php echo $index ?>" class="checkbox_label">Title</label><br>
					    		<input type="checkbox" name="editor<?php echo $index ?>" value="yes" <?php echo $editor_cpt ?>/>
					    		<label for="editor<?php echo $index ?>" class="checkbox_label">Editor</label><br>
					    		<input type="checkbox" name="author<?php echo $index ?>" value="yes" <?php echo $author_cpt ?>/>
					    		<label for="author<?php echo $index ?>" class="checkbox_label">Author</label><br>
					    		<input type="checkbox" name="thumbnail<?php echo $index ?>" value="yes" <?php echo $thumbnail_cpt ?>/>
					    		<label for="thumbnail<?php echo $index ?>" class="checkbox_label">Thubmnail</label><br>
					    		<input type="checkbox" name="excerpt<?php echo $index ?>" value="yes" <?php echo $excerpt_cpt ?>/>
					    		<label for="excerpt<?php echo $index ?>" class="checkbox_label">Excerpt</label><br>
					    		<input type="checkbox" name="comments<?php echo $index ?>" value="yes" <?php echo $comments_cpt ?>/>
					    		<label for="comments<?php echo $index ?>" class="checkbox_label">Comments</label><br>
					    		<input type="checkbox" name="page-attributes<?php echo $index ?>" value="yes" <?php echo $page_attributes_cpt ?>/>
					    		<label for="attributes<?php echo $index ?>" class="checkbox_label">Attributes</label><br>
				    		</div>
		    		</div>
		    		</div>
				    		<div class="text-center submit submit<?php echo $index ?>">
					          <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
					        </div>
		    	</div>
		    	<?php if($index % 2 == 1) :?>
		    	</div>
		    <?php endif;?>
	  <?php $index++; endwhile; ?> 
		</form>
  </div>

		    <?php 
					$index = 0;
					$args = array( 'post_type' => 'graphw_cpt', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'ID' );
					$loop = new WP_Query( $args ); 
					if($loop->have_posts()) :
					?>

 <div class="container">
	  <div class="row">
	  	<div class="four offset-by-four columns cpt_delete">
	  		<form name="cpt-delete-button" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
			  <input type="hidden" name="action" value="graphw_cpt_delete_button" />
			  <?php wp_nonce_field()?>
			    <div class="text-center" style="margin-top:30px;">
			    	<p>Select a Custom post type to be deleted</p>
			    <select name="the-id" >
			    	<option>select one</option>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<option value="<?php echo get_the_id() ?>"><?php echo get_the_title(); ?></option>
						<?php $index++; endwhile; ?> 
			    </select><br><br>
		          <input type="submit" name="Submit" class="button-warn" value="Delete" />
		        </div>
			  </form>
		  </div>
		</div>
	</div>

<?php endif; ?>
</section>