<?php
    $posts = $data['posts'];
    if($data['first_visit'] === 'true'){
        ?>
            <h4>Dear <span class="text-success"><?=$data['name']?></span>. Welcome To Social Media :D</h4>
        <?php
    }else{
        foreach($posts as $k=>$post){
            if($posts !== 'no-image'){
                ?>
                    <div id="id_<?=$post['id']?>" class="col-12 p-3 mt-5 rounded mb-5" style="background-color: silver;box-sizing:border-box;">
                        <span style="
                            display:inline-block;
                            width: 60px;
                            height: 60px;
                            border: 1px solid grey;
                            border-radius: 8px;
                            background-image: url('<?=isset($post["file"]) ? "../../../mvc/public/uploads/".$post['file'] : "../../../mvc/public/images/default_user.jpg"?>');
                            background-position:center;
                            background-size:cover;
                        "></span>
                        <h4>
                            
                            <a href="/mvc/user/account/<?=$post['user_id']?>#<?=$post['id']?>"><?=$post['name']?></a>
                            h# <span class='text-dark'><?=$post['title']?></span>
                        </h4>
                        <hr>
                        <p><?=$post['body']?></p>
                    </div>
                <?php
            }
            
        }
    }

    
?>