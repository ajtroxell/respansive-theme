    <ul class="social">
      <?php
        $options = get_option('respansive_options');
        if ($options['input-amazon']) {
          echo "<li><a href='".$options['input-amazon']."/'><i class='metro-amazon'></i></a></li>";
        }
        if ($options['input-bitbucket']) {
          echo "<li><a href='".$options['input-bitbucket']."'><i class='metro-bitbucket'></i></a></li>";
        }
        if ($options['input-calendar']) {
          echo "<li><a href='".$options['input-calendar']."'><i class='metro-calendar'></i></a></li>";
        }
        if ($options['input-chat']) {
          echo "<li><a href='".$options['input-chat']."'><i class='metro-chat'></i></a></li>";
        }
        if ($options['input-delicious']) {
          echo "<li><a href='https://delicious.com/".$options['input-delicious']."'><i class='metro-delicious'></i></a></li>";
        }
        if ($options['input-deviantart']) {
          echo "<li><a href='http://".$options['input-deviantart'].".deviantart.com'><i class='metro-deviantart'></i></a></li>";
        }
        if ($options['input-disqus']) {
          echo "<li><a href='http://disqus.com/".$options['input-disqus']."/'><i class='metro-disqus'></i></a></li>";
        }
        if ($options['input-dribbble']) {
          echo "<li><a href='http://dribbble.com/".$options['input-dribbble']."'><i class='metro-dribbble'></i></a></li>";
        }
        if ($options['input-earphones']) {
          echo "<li><a href='".$options['input-earphones']."'><i class='metro-earphones'></i></a></li>";
        }
        if ($options['input-evernote']) {
          echo "<li><a href='".$options['input-evernote']."'><i class='metro-evernote'></i></a></li>";
        }
        if ($options['input-excel']) {
          echo "<li><a href='".$options['input-excel']."'><i class='metro-excel'></i></a></li>";
        }
        if ($options['input-flickr']) {
          echo "<li><a href='".$options['input-flickr']."'><i class='metro-flickr'></i></a></li>";
        }
        if ($options['input-github']) {
          echo "<li><a href='".$options['input-github']."'><i class='metro-github'></i></a></li>";
        }
        if ($options['input-githubsolid']) {
          echo "<li><a href='".$options['input-githubsolid']."'><i class='metro-githubsolid'></i></a></li>";
        }
        if ($options['input-googleplus']) {
          echo "<li><a href='".$options['input-googleplus']."'><i class='metro-googleplus'></i></a></li>";
        }
        if ($options['input-facebook']) {
          echo "<li><a href='".$options['input-facebook']."'><i class='metro-facebook'></i></a></li>";
        }
        if ($options['input-lastfm']) {
          echo "<li><a href='http://www.last.fm/user/".$options['input-lastfm']."'><i class='metro-lastfm'></i></a></li>";
        }
        if ($options['input-linkedin']) {
          echo "<li><a href='http://www.linkedin.com/in/".$options['input-linkedin']."/'><i class='metro-linkedin'></i></a></li>";
        }
        if ($options['input-mail']) {
          echo "<li><a href='mailto:".$options['input-mail']."'><i class='metro-mail'></i></a></li>";
        }
        if ($options['input-marketplace']) {
          echo "<li><a href='".$options['input-marketplace']."'><i class='metro-marketplace'></i></a></li>";
        }
        if ($options['input-office']) {
          echo "<li><a href='".$options['input-office']."'><i class='metro-office'></i></a></li>";
        }
        if ($options['input-one-note']) {
          echo "<li><a href='".$options['input-one-note']."'><i class='metro-one-note'></i></a></li>";
        }
        if ($options['input-phone']) {
          echo "<li><a href='tel:".$options['input-phone']."'><i class='metro-phone'></i></a></li>";
        }
        if ($options['input-rss']) {
          echo "<li><a href='".$options['input-rss']."'><i class='metro-rss'></i></a></li>";
        }
        if ($options['input-skydrive']) {
          echo "<li><a href='".$options['input-skydrive']."'><i class='metro-skydrive'></i></a></li>";
        }
        if ($options['input-skype']) {
          echo "<li><a href='skype:".$options['input-skype']."?call'><i class='metro-skype'></i></a></li>";
        }
        if ($options['input-soundcloud']) {
          echo "<li><a href='https://soundcloud.com/".$options['input-soundcloud']."'><i class='metro-soundcloud'></i></a></li>";
        }
        if ($options['input-spotify']) {
          echo "<li><a href='http://open.spotify.com/user/".$options['input-spotify']."'><i class='metro-spotify'></i></a></li>";
        }
        if ($options['input-steam']) {
          echo "<li><a href='".$options['input-steam']."'><i class='metro-steam'></i></a></li>";
        }
        if ($options['input-stumbleupon']) {
          echo "<li><a href='http://www.stumbleupon.com/stumbler/".$options['input-stumbleupon']."/likes'><i class='metro-stumbleupon'></i></a></li>";
        }
        if ($options['input-stumbleuponold']) {
          echo "<li><a href='http://www.stumbleupon.com/stumbler/".$options['input-stumbleuponold']."/likes'><i class='metro-stumbleuponold'></i></a></li>";
        }
        if ($options['input-tumblr']) {
          echo "<li><a href='".$options['input-tumblr']."'><i class='metro-tumblr'></i></a></li>";
        }
        if ($options['input-twitter']) {
          echo "<li><a href='https://twitter.com/".$options['input-twitter']."'><i class='metro-twitter'></i></a></li>";
        }
        if ($options['input-vimeo']) {
          echo "<li><a href='".$options['input-vimeo']."'><i class='metro-vimeo'></i></a></li>";
        }
        if ($options['input-word']) {
          echo "<li><a href='".$options['input-word']."'><i class='metro-word'></i></a></li>";
        }
        if ($options['input-wordpress']) {
          echo "<li><a href='".$options['input-wordpress']."'><i class='metro-wordpress'></i></a></li>";
        }
        if ($options['input-xbox']) {
          echo "<li><a href='https://live.xbox.com/en-US/Profile?pp=0&GamerTag=".$options['input-xbox']."'><i class='metro-xbox'></i></a></li>";
        }
        if ($options['input-youtube']) {
          echo "<li><a href='http://www.youtube.com/".$options['input-youtube']."'><i class='metro-youtube'></i></a></li>";
        }
      ?>
    </ul>