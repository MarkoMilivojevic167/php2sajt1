<div id="userPage" class="relative ">
            <div id="userBody">
                <ul id="userInformation">
                    <li>User Informations:</li>
                    <li><?=$userpage->name." ".$userpage->lastName?></li>
                    <li><?=$userpage->email?></li>
                    <li><?=$userpage->level?></li>
                </ul>
                <ul class="userReservation">
                        <li>Indication</li>
                        <li>Date Reservation</li>
                        <li>Time Reservation</li>
                        <li>People Number</li>
                    </ul>
                <?php foreach($reservation as $item):?>
                    <ul class="userReservation userReservationInfo">
                        <li><?=$item->Indication?></li>
                        <li><?=$item->dateReservation?></li>
                        <li><?=$item->timereservation?></li>
                        <li><?=$item->peoplenumber?></li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
        <script type="text/javascript" src="app/Assets/Js/header.js"></script>
        <script type="text/javascript" src="app/Assets/Js/reservation.js"></script>