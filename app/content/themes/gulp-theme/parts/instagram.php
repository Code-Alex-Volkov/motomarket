<ul class="instagram-box">
    <?
        $token = 'IGQVJWaUtqaUl2X1dta01yX2tGc2lqYW9jcmQ2T2RZAcWFZAYkp2bHpFWlF4TzNOM0NXd2w5Ym9vSzZA6NmpZATTFhbmUyME81NEoxVThfazhHNWlFUWJXVGN5U09GOUItZA1ZAVNzFSTUd3VV92WXdUbDZAhXwZDZD';
        $inst = new Instagram($token);
        $instPosts = $inst->getInstagramPosts();
        $numbersPosts = 4;
        foreach ( $instPosts['data'] as $key => $instPost ) : 
    ?>
    <?php if($key == $numbersPosts) break; ?>

        <li class="instagram-post">
            <a href="<?php echo $instPost['permalink']; ?>" target="_blank">
                <img class="instagram-img" src="<?php echo $instPost['media_url']; ?>" alt="<?php echo $instPost['username']; ?>">
            </a>
        </li>
    
    <?php endforeach; ?>
</ul>