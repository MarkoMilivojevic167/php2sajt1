<div class="indexMenu relative ">
            <div class="menuImage">
                <p>editUser</p>
                <img src='<?=$editProduct->path?>' alt='<?=$editProduct->alt?>'/>
            </div>
            <div class="menuText">
                <form method="POST" action="index.php?page=edit-product">
                    <ul class="contactForm marginForm">
                    <li><input type="hidden" name="id" value=<?=$editProduct->idProducts?>></li>
                        <li><textarea name="name"><?=$editProduct->name?></textarea></li>
                        <li><textarea name="text"><?=$editProduct->textProduct?></textarea></li>
                        <li><input type="text" name="price" placeholder="Name" value=<?=$editProduct->price?>></li>
                        <li><select name="category">
                            <?php foreach($categoryProduct as $item):?>
                            <option value=<?=$item->idCategories?>><?=$item->name?></option>
                            <?php endforeach; ?>
                        </select></li>
                        <li><button name="editProducts" type="submit">SUBMIT</button></li>
                    </ul>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="app/Assets/Js/header.js"></script>
