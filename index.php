<?php get_header(); ?>
              
	<?php if (have_posts()) { ?>
	
			
    <div id="entries">
    
        <?php while (have_posts()) : the_post(); ?>
        
            <div class="entry">
        
            
           	 <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
            
                <div class="entry-content">
                    <?php the_content('Read more...'); ?>
                </div>
            
            </div>
        
        <?php endwhile; ?>
    
    
    </div>
	      
    <?php } ?>          
    
<?php get_footer(); ?>