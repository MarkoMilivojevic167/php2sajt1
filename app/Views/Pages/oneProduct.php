<div class="indexMenu relative ">
            <div class="menuImage">
                <p><?=$oneProduct->categories?></p>
                <img src='<?=$oneProduct->path?>' alt='<?=$oneProduct->alt?>'/>
            </div>
            <div class="menuText oneProductText">
                <ul>
                <?php 
                    echo "<li class='productHeader'>$oneProduct->name - $$oneProduct->price</li>";
                ?>
                <li><hr class="oneProductLine"></li>
                <li><?=$oneProduct->textProduct?></li>
                </ul>
            </div>
        </div>
        <script type="text/javascript" src="app/Assets/Js/header.js"></script>
