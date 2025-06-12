#### Important Notes:


## Web Stories
(Remove the aria-label attribute when web stories plugin shows ARIA performance issue)
- web-stories\includes\Renderer\Stories\Carousel_Renderer.php
    ```
    <div tabindex="0" aria-label="<?php esc_attr_e( 'Previous', 'web-stories' ); ?>" class="glider-prev"></div>
    <div tabindex="0" aria-label="<?php esc_attr_e( 'Next', 'web-stories' ); ?>" class="glider-next"></div>
    <div tabindex="0" class="glider-prev"></div>
    <div tabindex="0" class="glider-next"></div>
    ```




### Live changes noted here
- Removed header coin market cap
- removed web stories
- removed price analysis section trading view
- remove the main style reference in header file