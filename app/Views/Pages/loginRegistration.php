<div class="indexMenu relative ">
            <div class="menuImage">
                <p>Login</p>
                <img src="app/Assets/Images/login.jpg" alt="marco restaurant"/>
            </div>
            <div class="menuText">
                <form method="POST" action="index.php?page=login">
                    <ul class="contactForm marginForm">
                        <li><input id="loginEmail" class="login" name="loginEmail" type="email" placeholder="Email"></li>
                        <li><input id="loginPassword" class="login" name="loginPassword" type="password" placeholder="Password"></li>
                        <li><button   name='login' type="submit">SUBMIT</button></li>
                    </ul>
                </form>
            </div>
        </div>

        
        <div class="indexMenu relative ">
            <div class="menuText">
            <form method="POST" action="index.php?page=registration">
                <ul class="contactForm marginForm">
                    <li><input class="reg" id="regName" type="text" name="regName" placeholder="Name"></li>
                    <li><input class="reg" id="regLastName" type="text" name="regLastName" placeholder="Last name"></li>
                    <li><input class="reg" id="regEmail" type="email" name="regEmail" placeholder="Email"></li>
                    <li><input class="reg" id="regPassword" type="password" name="regPassword" placeholder="Password"></li>
                    <li><input class="reg" id="repeatPassword" type="password" name="repeatPassword" placeholder="Repat Password"></li>
                    <li><button name='registration' type="submit">SUBMIT</button></li>
                </ul>
                </form>
            </div>
            <div class="menuImage">
                <p>Registration</p>
                <img src="app/Assets/Images/registration.jpg" alt="marco restaurant"/>
            </div>
        </div>
        <script type="text/javascript" src="app/Assets/Js/header.js"></script>
        <script type="text/javascript" src="app/Assets/Js/validation.js"></script>
