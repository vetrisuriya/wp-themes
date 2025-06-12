// Live Wire Count Update
jQuery(document).ready(function($) {
    $('.read-more-button').click(function(e) {
        e.preventDefault(); // Prevent default link behavior

        var postId = $(this).data('post-id'); // Assuming you have a data attribute with post ID

        // console.log(ajaxScripts.ajaxUrl);

        $.ajax({
            url: ajaxScripts.ajaxUrl,
            type: 'post',
            data: {
                action: 'update_read_count',
                post_id: postId
            },
            success: function(response) {
                console.log(response); // Handle success message (optional)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown); // Handle errors
            }
        });
    });
});

// Single Post Share & Count
jQuery(document).ready(function($) {
    $('.ts-block-social-list .social-share-button').click(function() {
        
        var social_media = $(this).data('social-media');
        var post_id = $(this).data('post-id');

        $.ajax({
            url: ajaxScripts.ajaxUrl,
            type: 'post',
            data: {
                action: 'update_share_count',
                post_id: post_id,
                social_media: social_media
            },
            success: function(response) {
                $sp = $('[data-social-media="'+social_media+'"]');
                $sp.find("span").text(response);
            }
        });
    });
});