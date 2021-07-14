<form role="search" method="get" id="searchform" class="search-form" action="<?php echo home_url( '/' ) ?>" >
    <div class="input-group u8-input-group">
        <input type="text" class="flex-fill search-form u8-input-search-form" value="<?php echo get_search_query() ?>" name="s" id="s" />
        <button type="submit" class="btn btn-outline-secondary u8-btn-search" id="searchsubmit"><i class="fas fa-search"></i></button>
    </div>
</form>