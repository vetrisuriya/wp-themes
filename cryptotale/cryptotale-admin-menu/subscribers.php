<div class="wrap">
    <h1>Subscribers List</h1>
    <br>
    <?php
    global $wpdb;
    $table_name = $wpdb->prefix . 'subscribers';

    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    if ($results) {
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr><th>ID</th><th>Email</th><th>Subscribed</th></tr></thead>';
        echo '<tbody>';
            foreach ($results as $row) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['date_subscribed'] . '</td>';
                echo '</tr>';
            }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'No data found.';
    }
    ?>
</div>