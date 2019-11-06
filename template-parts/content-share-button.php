<?php
  $share_url   = get_permalink();
  $share_title = get_the_title();
?>
<ul class="share-btn-ul">

    <!--Facebookボタン--> 
    <li class="li-icon-facebook">
        <a href="//www.facebook.com/sharer.php?src=bm&u=<?=$share_url?>&t=<?=$share_title?>" title="Facebookでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=600');return false;">
            <i class="icon-facebook"></i>
        </a>
    </li>

    <!-- Twitter -->
    <li class="li-icon-twitter">
        <a href="//twitter.com/share?text=<?=$share_title?>&url=<?=$share_url?>" title="Twitterでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;">
            <i class="icon-twitter"></i>
        </a>
    </li>

    <!-- Google+ -->
    <li class="li-icon-googleplus">
        <a href="//plus.google.com/share?url=<?=$share_url?>" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;" title="Google+で共有">
            <i class="icon-googleplus"></i>
        </a>
    </li>

    <!-- はてな -->
    <li class="li-icon-hatena">
        <a href="//b.hatena.ne.jp/add?mode=confirm&url=<?=$share_url?>" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=1000');return false;" title="はてなブックマークに登録">
            <i class="icon-hatena"></i>
        </a>
    </li>

    <!-- ポケット -->
    <li class="li-icon-pocket">
        <a href="//getpocket.com/edit?url=<?=$share_url?>&title=<?=$share_title?>" target="_blank" title="Pocketに保存する">
            <i class="icon-pocket"></i>
        </a>
    </li>

    <!-- LINE -->
    <li class="li-icon-line">
        <a href="//line.me/R/msg/text/?<?=$share_title.'%0A'.$share_url?>" target="_blank" title="LINEに送る">
            <i class="icon-line"></i>
        </a>
    </li>

</ul>