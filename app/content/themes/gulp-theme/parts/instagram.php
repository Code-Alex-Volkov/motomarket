<ul class="instagram-box">
    <?
        $token = 'IGQVJXMzJRQk5tSjllYXE2RHJ0OVdqOXJKNHJONVdaclhxeFJUTnJDLWh2b1hEek9UQjJkZAjVrUE42NVlDVDlPWGRhb3RLUlg1WjFjYU5Fd2J2cTZAhWGVMeExrM2lzNl9kUlk0b0t0SjFnZAmdQSkxldwZDZD';
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