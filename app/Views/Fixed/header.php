<header id="heder">
            
                <div id="rowHeader">
                    <div id="mySidenav" class="sidenav">
                        <a class="closebtn" id="meniLinkClose">&times;</a>
                        
                        <a id='meniHover'href='index.php?page=home'>HOME</a>
                        <a id='meniHover'href='index.php?page=products'>MENU</a>
                        <a id='meniHover'href='index.php?page=contact'>CONTACT</a>
                        <a id='meniHover'href='index.php?page=loginRegistration'>LOGIN/REGISTRATION</a>
                        <a id='meniHover'href='index.php?page=author'>AUTHOR</a>

                    
                            <?php if(isset($_SESSION['user'])){
                                if($_SESSION['user']->idUserLevel==2){
                                echo "<a id='meniHover'href='index.php?page=administrator'>ADMINISTRATOR</a>";
                                echo "<a id='meniHover' href='index.php?page=user'>User</a>";
                                $user=$_SESSION['user'];
                                $name=strtoupper($user->Name.' '.$user->lastName."</p>");
                                echo"<p id='login'><i class='fa fa-user-circle-o'></i> ";
                                echo $name;
                                echo "<a href='index.php?page=logout'>LOGOUT</a>";
                                }else{
                                    $user=$_SESSION['user'];
                                    echo "<a id='meniHover' href='index.php?page=user'>User</a>";
                                    $name=strtoupper($user->Name.' '.$user->lastName."</p>");
                                    echo"<p id='login'><i class='fa fa-user-circle-o'></i> ";
                                    echo $name;
                                    echo "<a href='index.php?page=logout'>LOGOUT</a>";
                                }
                            }
                            ?>
                        
                        
                        
                        
                    </div>

                    <div id="reservationDiv" class="reservation">
                        <div id="resrvationPadding">
                            <form method="POST" action="index.php?page=reservation"> 
                            <span id="exitButtonReservation" class="closebtn">&times;</span>
                            <h2>MAKE A RESERVATION</h2>
                            <p>Please note you will receive a confirmation email once your reservation has been successful. If you do not receive this confirmation email there may have been an error in your reservation. Please contact our reservations team on (02)92515600 if you have any queries.</p>
                            <p class="fillFields">Please fill in all fields</p>
                            <span>Indication (Not mandatory)</span>
                            
                            <input name="indication" type="text"/>
                            

                                <select name="time">
                                    <?php foreach($timereservation as $item): ?>
                                    <option value=<?=$item->idTimeReservation?>><?=$item->name?></option>
                                    <?php endforeach;?>
                                </select>

                                <select name="people">
                                <?php foreach($peoplenumber as $item): ?>
                                    <option value=<?=$item->idPeople?>><?=$item->name?></option>
                                    <?php endforeach;?>
                                </select>

                            <input name="dataTime" type="date"/>
                            <button name="sendReservation" class="homeButton" id="sendReservation"type="submit">Send</button>
                            </form>
                        </div>
                    </div>

                    <span id="meniLinkOpen">
                        <div id="hamburger">
                            <div class="hamburger"></div>
                            <div class="hamburger"></div>
                            <div class="hamburger"></div>
                        </div>
                    </span>
                    <div id="logo">
                        <a href="index.php"><img src="app/Assets/Images/logoSmall.png" alt="logo"/></a>
                    </div>
                    

                <div id="headetText">
                    <button id="filterButton"><i class="fa fa-filter"></i></button>
                    <?php
                    if(isset($_GET['page'])){
                    if($_GET['page']=="user"){
                        echo "<button id='buttonReservation'>MAKE A RESERVATION</button>";
                    }else{
                        echo"<a href='index.php?page=contact#location'>HOW TO REACH US</a>";
                    }}else{
                        echo"<a href='index.php?page=contact#location'>HOW TO REACH US</a>"; 
                    }?>
                    
                    
                </div>
            </div>
            

        </header>
        <div id="filters">
            <form id="search">
                    <input type="text" id="searchProduct" placeholder="Search..">
            </form>
            <div id="slidecontainer">
                    <input type="range" min="1" max="1000" value="1000" class="slider" id="myRange">
                    <p>prices range from 0 to <span id="demo"></span>$</p>
            </div>
        </div>

        <h1 id="h1">Marco restaurant menu food drink dessert</h1>