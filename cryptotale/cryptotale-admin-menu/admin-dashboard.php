<div class="wrap">
    <h1>Cryptotale Dashboard</h1>
    <br>
    
    <style>
        /* Custom CSS for the dashboard */
        .dashboard-container {
            display: flex;
            margin-top: 20px;
        }
        .dashboard-widget {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 20px;
            width: 25%;
            box-sizing: border-box;
        }
        .dashboard-widget h1 {
            background: #fed7aa;
            margin: 0px 0px 20px 0px;
            text-align: center;
            padding: 5px;
            font-weight: 500;
        }
        .dashboard-widget h2 {
            margin-top: 0;
        }
    </style>


    <div class="dashboard-container">
        <div class="dashboard-widget">
            <h1>Posts</h1>
            <h2>Posts</h2>
            <?php
            // Get counts of published, draft, and trashed posts
            $post_counts = wp_count_posts();

            // Total published posts count
            $published_count = $post_counts->publish;
            // Total draft posts count
            $draft_count = $post_counts->draft;
            // Total trashed posts count
            $trashed_count = $post_counts->trash;
            // Get counts of private posts (you might need additional logic based on your definition of "private")
            $private_count = count(get_posts(array('post_status' => 'private', 'numberposts' => -1)));

            // Calculate total count of all posts (including all statuses)
            $total_count = $published_count + $draft_count + $trashed_count + $private_count;

            // Output the counts
            echo "Total Published Posts: " . $published_count . "<br>";
            echo "Total Draft Posts: " . $draft_count . "<br>";
            echo "Total Trashed Posts: " . $trashed_count . "<br>";
            echo "Total Private Posts: " . $private_count . "<br>";
            echo "Total Posts (including all statuses): " . $total_count . "<br>";
            ?>
            <hr>
            <h2>Category</h2>
            <?php
            // Get total count of categories
            $total_categories_count = wp_count_terms('category');

            echo "Total Categories: " . $total_categories_count . "<br>";

            // Get categories with their respective post counts
            $categories = get_categories(array(
                'orderby' => 'name',
                'order'   => 'ASC',
                'hide_empty' => false, // Include empty categories as well
            ));

            foreach ($categories as $category) {
                echo "Category: " . $category->name . " (ID: " . $category->term_id . ") - Post Count: " . $category->count . "<br>";
            }
            ?>
            <hr>
            <h2>Tags</h2>
            <?php
            // Get total count of tags
            $total_tags_count = wp_count_terms('post_tag');

            echo "Total Tags: " . $total_tags_count . "<br>";

            // Get tags with their respective post counts
            $tags = get_tags(array(
                'orderby' => 'name',
                'order'   => 'ASC',
                'hide_empty' => false, // Include empty tags as well
            ));

            foreach ($tags as $tag) {
                echo "Tag: " . $tag->name . " (ID: " . $tag->term_id . ") - Post Count: " . $tag->count . "<br>";
            }
            ?>
        </div>
        <div class="dashboard-widget">
            <h1>Live Wire</h1>
            <h2>Posts</h2>
            <?php
            // Custom post type slug
            $custom_post_type = 'live_wire';

            // Get counts of published, draft, and trashed posts
            $post_counts = wp_count_posts($custom_post_type);

            // Total published posts count
            $published_count = $post_counts->publish;
            // Total draft posts count
            $draft_count = $post_counts->draft;
            // Total trashed posts count
            $trashed_count = $post_counts->trash;

            // Calculate total count of all posts (including all statuses)
            $total_count = $published_count + $draft_count + $trashed_count;

            // Output the counts
            echo "Total Published Posts: " . $published_count . "<br>";
            echo "Total Draft Posts: " . $draft_count . "<br>";
            echo "Total Trashed Posts: " . $trashed_count . "<br>";
            echo "Total Posts (including all statuses): " . $total_count . "<br>";
            ?>
        </div>
        <div class="dashboard-widget">
            <h1>Web Stories</h1>
            <h2>Posts</h2>
            <?php
            // Custom post type slug
            $custom_post_type = 'live_wire';

            // Get counts of published, draft, and trashed posts
            $post_counts = wp_count_posts($custom_post_type);

            // Total published posts count
            $published_count = $post_counts->publish;
            // Total draft posts count
            $draft_count = $post_counts->draft;
            // Total trashed posts count
            $trashed_count = $post_counts->trash;

            // Calculate total count of all posts (including all statuses)
            $total_count = $published_count + $draft_count + $trashed_count;

            // Output the counts
            echo "Total Published Posts: " . $published_count . "<br>";
            echo "Total Draft Posts: " . $draft_count . "<br>";
            echo "Total Trashed Posts: " . $trashed_count . "<br>";
            echo "Total Posts (including all statuses): " . $total_count . "<br>";
            ?>
        </div>
    </div>

</div>