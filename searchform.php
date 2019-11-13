<div class="sidebar__contents search-bar">
    <label for="s" class="sidebar-title">
        <h3><span>検索フォーム</span></h3>
    </label>
    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
        <input type="search" id="s" name="s" placeholder="キーワードで検索" />
        <button type="submit" id="searchsubmit" ><?php _e('Search','bonestheme'); ?></button>
    </form>
</div>