<div class="ts-grid-box widgets tag-list tag-widget">
    <h3 class="widget-title">Tags</h3>
    <ul>
        <?php
        $tag_args = array(
            'orderby' => 'count', // Order by usage count
            'order' => 'DESC',  // Order descending (most used first)
            'number' => 10,    // Number of tags to retrieve (adjust as needed)
        );
        
        $tags = get_tags($tag_args);

        if(!empty($tags)) {
            foreach($tags as $tag) {
        ?>
                <li><a href="<?php echo esc_attr(get_tag_link($tag->term_id)); ?>"><?php echo __($tag->name); ?></a></li>
        <?php
            }
        }
        ?>
    </ul>
</div>