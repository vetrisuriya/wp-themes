<div class="ts-grid-box widgets category-widget">
    <h2 class="widget-title">Categories</h2> 
    <ul class="category-list">
        <?php
        $category_args = array(
            'taxonomy' => 'category', // Specify taxonomy (optional, defaults to 'category')
            'hide_empty' => 0,
            'fields' => 'all', // Get all category data
        );
        
        $categories = get_terms($category_args);

        if(!empty($categories)) {
            foreach($categories as $cat) {
				if($cat->name != 'Uncategorized') {
        ?>
                	<li><a href="<?php echo esc_attr(get_tag_link($cat->term_id)); ?>"><?php echo __($cat->name); ?><span class="ts-yellow-bg"><?php echo __($cat->count); ?></span></a></li>
        <?php
				}
            }
        }
        ?>
    </ul>
</div>