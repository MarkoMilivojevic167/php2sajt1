<div class="indexMenu relative ">
            <div class="menuImage">
                <p>Edit</p>
                <img src="app/Assets/Images/Website-Menu-Image.jpg" alt="marco restaurant"/>
            </div>
            <div class="menuText">
                <form method="POST" action="index.php?page=edit-user">
                    <ul class="contactForm marginForm">
                        <li><input type="hidden" name="id" value=<?=$oneUser->idUsers?>></li>
                        <li><input type="text" name="name" placeholder="Name" value=<?=$oneUser->name?>></li>
                        <li><input type="text" name="lastName" placeholder="Last name" value=<?=$oneUser->lastName?>></li>
                        <li><input type="email" name="email" placeholder="Email" value=<?=$oneUser->email?>></li>
                        <li><select name="level">
                            <?php foreach($userLevel as $item):?>
                            <option value=<?=$item->idUserLevel?>><?=$item->name?></option>
                            <?php endforeach; ?>
                        </select></li>
                        <li><button name="editUser" type="submit">SUBMIT</button></li>
                    </ul>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="app/Assets/Js/header.js"></script>
