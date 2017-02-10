<?php
include('../../../../wp-config.php');
$count=5;
$offSet=$_GET['page_value'];
$offSet = ( $offSet - 1 ) * $count; 
$args = array ( 'post_type' => 'post','ORDER' => 'DESC','showposts'=>$count,'offset'=>$offSet  );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?><script>
	jQuery('.cvr').each(function(){  
     var $columns = jQuery('.post_info_dtls',this);
     var $image = jQuery('.abcd',this);
	 console.log($image);
	 //var image_id =	jQuery(this).attr("data-id");
	 //console.log(image_id);
     var maxHeight = Math.max.apply(Math, $columns.map(function(){
         return jQuery(this).height();
     }).get());
	 var dataList = jQuery(".abcd").map(function() {
		return jQuery(this).data("id");
	}).get();	 
     $columns.height(maxHeight);
     $image.height(maxHeight+24);
	
});</script>
	<div class="cvr postcvr">
		<div class="date1">
		<?php the_time('d') ?><span><?php the_time('M') ?></span></div>
		<div class="post_image">
		<?php if ( has_post_thumbnail() ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blogimage' );
		?>
		<img src="<?php echo $image[0]; ?>" class="abcd" id="<?php echo $post->ID; ?>" data-id="<?php echo $post->ID; ?>"/>
		<?php } else { ?>
		<img src="http://placehold.it/438x348&amp;text=No image found" alt="<?php the_title(); ?>" />
		<?php } ?>
		</div>
		<div class="post_info_dtls" data-id=<?php echo $post->ID; ?> >
			<h3><?php
				$thetitle = $post->post_title; /* or you can use get_the_title() */
				$getlength = strlen($thetitle);
				$thelength = 35; 
				echo substr($thetitle, 0, $thelength);
				if ($getlength > $thelength) echo "...";
				?>
			</h3>
			<ul>
				<li><i class="fa fa-calendar"></i>
					<?php the_time('jS F, Y') ?>
				</li>
				<li><i class="fa fa-calendar"></i>
					<?php the_time('h : i A') ?>
				</li>
				<li><i class="fa fa-user"></i>
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a>
				</li>
				<li><i class="fa fa-comments" aria-hidden="true"></i>
				<a href="<?php comment_link(); ?>" rel="category tag">
					<?php comments_number('No Comment', '1 Comment', '%'); ?>
				</a>
			</li>
			</ul>
			<p>
			 <?php  $content = get_the_content(); echo wp_trim_words( $content , '22' ); ?>
			</p>
			<a class="rd_more" href="<?php the_permalink(); ?>">read more</a>
			<span class="tags"> <i class="fa fa-tags"></i> <?php $tag = wp_get_post_tags($post->ID);
			if(!empty($tag)){	
			foreach($tag as $nreone) 
			{ ?>		
			<a href="<?php echo get_tag_link($nreone->term_id); ?>"><?php echo $nreone->name; ?></a>
		<?php }
			}else{
				
				echo"No Tags";
			}		?>
			</span>
		</div>
	</div>
	<?php	
endwhile;
wp_reset_query();
?>