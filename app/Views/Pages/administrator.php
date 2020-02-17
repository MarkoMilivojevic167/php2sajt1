<div class="relative" id="adminPanel">
            <div class="omotac">
            <ul>
                <li><button onclick="openCity(event, 'kontakt')" id="kontaktButton" id="defaultOpen" class="tablinks">Kontakt</button></li>
                <li><button  onclick="openCity(event, 'Products')" id="ProductsButton" class="tablinks">Products</button></li>
                <li><button  onclick="openCity(event, 'addProduct')" id="addProductButton" class="tablinks">Add Product</button></li>
                <li><button onclick="openCity(event, 'User')" id="UserButton" class="tablinks">User</button></li>
                <li><button onclick="openCity(event, 'reservation')" id="UserButton" class="tablinks">Reservation</button></li>
                <li><button onclick="openCity(event, 'Log')" id="LogButton" class="tablinks">Log file</button></li>
                <li><button onclick="openCity(event, 'crud')" id="crudButton" class="tablinks">Activity</button></li>
            </ul>

            <div class="tabcontent" id="kontakt">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Text</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="contactAdmin">
                        <?php foreach($contact as $item): ?>
                        <tr>
                            <td><?= $item->name?></td>
                            <td><?= $item->email?></td>
                            <td><?= $item->phone?></td>
                            <td><?= $item->text?></td>
                            <td><button class="delete deleteContact" data-idcontact=<?=$item->idContact?>>x</button></td>
                            <!--<td><a class="delete" href="index.php?page=delete-contact&idContact=<?=$item->idContact?>">x</a></td>-->
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="tabcontent" id="Products">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="productsAdmin">
                    <?php foreach($products as $item): ?>
                        <tr>
                            <td><?= $item->name?></td>
                            <td><?= $item->price?></td>
                            <td><?= $item->categories?></td>
                            <td><a class="delete" href="index.php?page=edit-product&idProducts=<?=$item->idProducts?>"><i class="fa fa-cog"></i></a></td>
                            <td><button class="delete deleteProducts" data-idproduct=<?=$item->idProducts?>>x</button></td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <div class="tabcontent" id="addProduct">
                <div class="menuText">
                <form method="POST" action="index.php?page=administrator" enctype="multipart/form-data">
                    <ul class="contactForm adminProduct marginForm">
                        <li>
                            <input type="hidden" name="idSkriveno" />
                            <button type="button" onclick="document.getElementById('profilePhoto').click()" class="dugmeFile">Add photo</button>
                            <span id="profilePhotoValue"></span>
                            <input class="prod" type="file" name="image" id="profilePhoto" style="display:none;" onchange="document.getElementById('profilePhotoValue').innerHTML=this.value;"/>
                        </li>
                        <li><input class="prod" id="alt" name="alt" type="text" placeholder="Alt..."></li>
                        <li><input class="prod" id="productName" name="productName" type="text" placeholder="Name"></li>
                        <li><input class="prod" id="productPrice" name="productPrice" type="text" placeholder="Price"></li>
                        <input type="hidden" name="user" value=<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']->idUsers;}?>/>
                        <li>
                            <select class="prod" id="productCategory" name="productCategory" >
                                <option value="0">Choose...</option>
                            <?php foreach($data['category'] as $item): ?>
                                <option value=<?= $item->idCategories?>><?= $item->name?></option>
                            <?php endforeach; ?>
                            </select>
                        </li>
                        <li><input class="prod" id="productsText" name="productsText" type="textarea" rows="7" maxlength="1000" placeholder="Text..."></li>
                        
                        <li><button type="submit" name="addProduct">SUBMIT</button></li>
                    </ul>
                    </form>
                </div>
            </div>
            <div class="tabcontent" id="User">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="usersAdmin">
                    <?php foreach($users as $item): ?>
                        <tr>
                            <td><?= $item->name?></td>
                            <td><?= $item->lastName?></td>
                            <td><?= $item->email?></td>
                            <td><?= $item->level?></td>
                            <td><a class="edit" href="index.php?page=edit-user&idUser=<?=$item->idUsers?>"><i class="fa fa-cog"></i></a></td>
                            <td><button class="delete deleteUsers" data-idusers=<?=$item->idUsers?>>x</button></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="tabcontent" id="reservation">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Indication</th>
                            <th>Date Reservation</th>
                            <th>Time Reservation</th>
                            <th>People Number</th>
                            <th>User Name</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="reservationAdmin">
                    <?php foreach($reservation as $item): ?>
                        <tr>
                            <td><?=$item->Indication?></td>
                            <td><?=$item->dateReservation?></td>
                            <td><?=$item->timereservation?></td>
                            <td><?=$item->peoplenumber?></td>
                            <td><?=$item->Name." ".$item->lastName?></td>
                            <td><button class="delete deleteReservation" data-idreservation=<?=$item->idReservation?>>x</button></td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

            <div class="tabcontent" id="Log">
                <table class="table tableSlider">
                    <thead>
                        <tr>
                            <th>Url adress</th>
                            <th>Ip adress</th>
                            <th>Date</th>
                            <th>Page</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($log as $item=>$value):
                        $explode=explode(SEPARTOR,$value); ?>
                        <tr>
                            <td><?= $explode[0]?></td>
                            <td><?= $explode[1]?></td>
                            <td><?= $explode[2]?></td>
                            <td><?= $explode[3]?></td>

                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

            <div class="tabcontent" id="crud">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Table Name</th>
                            <th>CRUD</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($crud as $item): ?>
                        <tr>
                            <td><?=$item->name?></td>
                            <td><?=$item->date?></td>
                            <td><?=$item->tableName?></td>
                            <td><?=$item->crud?></td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

            



        </div>
    </div>
    
    <script type="text/javascript" src="app/Assets/Js/administrator.js"></script>
    <script type="text/javascript" src="app/Assets/Js/header.js"></script>
    <script type="text/javascript" src="app/Assets/Js/validation.js"></script>
