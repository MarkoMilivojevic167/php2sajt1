$(document).ready(function() {
  $(document).on('click', '.deleteContact', deleteContact);
  $(document).on('click', '.deleteProducts', deleteProducts);
  $(document).on('click', '.deleteUsers', deleteUsers);
  $(document).on('click', '.deleteReservation', deleteReservation);

    document.querySelector("#kontaktButton").addEventListener("click",openCity(event, 'kontakt'));
    document.querySelector("#ProductsButton").addEventListener("click",openCity(event, 'Products'));
    document.querySelector("#addProductButton").addEventListener("click",openCity(event, 'addProduct'));
    document.querySelector("#UserButton").addEventListener("click",openCity(event, 'User'));
});

    


function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
  
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

 
  function deleteContact(){
    let id = $(this).data('idcontact');

    $.ajax({
        url: 'index.php?page=delete-ajax-contact',
        method: 'POST',
        data: {
            id: id
        },
        success: function(data){
            refreshContact();
        }, 
        error: ajaxError
    })

}
function refreshContact(){
  $.ajax({
      url: 'index.php?page=get-ajax-contact',
      method: 'GET',
      dataType: 'json',
      success: function(data){
          printContact(data.contact);
      }, 
      error: ajaxError
  })
  }

function printContact(data){
  let html = "";
  for(let item of data){
    html += contact(item);
  }   
  $("#contactAdmin").html(html);
}

function contact(item){
  return `<tr>
            <td>${ item.name }</td>
            <td>${ item.email }</td>
            <td>${ item.phone }</td>
            <td>${ item.text }</td>
            <td><button class="delete deleteContact" data-idcontact="${item.idContact}">x</button></td>
          </tr>`;
}



function deleteProducts(){
  let id = $(this).data('idproduct');

  $.ajax({
      url: 'index.php?page=delete-ajax-product',
      method: 'POST',
      data: {
          id: id
      },
      success: function(data){
          refreshProducts();
      }, 
      error: ajaxError
  })

}
function refreshProducts(){
$.ajax({
    url: 'index.php?page=get-ajax-product',
    method: 'GET',
    dataType: 'json',
    success: function(data){
        printProducts(data.product);
    }, 
    error: ajaxError
})
}

function printProducts(data){
let html = "";
for(let item of data){
  html += products(item);
}   
$("#productsAdmin").html(html);
}

function products(item){
return `<tr>
<td>${item.name}</td>
<td>${item.price}</td>
<td>${item.categories}</td>
<td><a class="delete" href="index.php?page=edit-product&idProducts=${item.idProducts}"><i class="fa fa-cog"></i></a></td>
<td><button class="delete deleteProducts" data-idproduct=${item.idProducts}>x</button></td>
</tr>`;
}


function deleteUsers(){
  let id = $(this).data('idusers');

  $.ajax({
      url: 'index.php?page=delete-ajax-users',
      method: 'POST',
      data: {
          id: id
      },
      success: function(data){
          refreshUsers();
      }, 
      error: ajaxError
  })

}
function refreshUsers(){
$.ajax({
    url: 'index.php?page=get-ajax-users',
    method: 'GET',
    dataType: 'json',
    success: function(data){
        printUsers(data.users);
    }, 
    error: ajaxError
})
}

function printUsers(data){
let html = "";
for(let item of data){
  html += Users(item);
}   
$("#usersAdmin").html(html);
}

function Users(item){
return `<tr>
<td>${item.name}</td>
<td>${item.lastName}</td>
<td>${item.email}</td>
<td>${item.level}</td>
<td><a class="edit" href="index.php?page=edit-user&idUser=${item.idUsers}"><i class="fa fa-cog"></i></a></td>
<td><button class="delete deleteUsers" data-idusers=${item.idUsers}>x</button></td>
</tr>`;
}


function deleteReservation(){
  let id = $(this).data('idreservation');

  $.ajax({
      url: 'index.php?page=delete-ajax-reservation',
      method: 'POST',
      data: {
          id: id
      },
      success: function(data){
          refreshReservation();
      }, 
      error: ajaxError
  })

}
function refreshReservation(){
$.ajax({
    url: 'index.php?page=get-ajax-reservation',
    method: 'GET',
    dataType: 'json',
    success: function(data){
        printReservation(data.reservation);
    }, 
    error: ajaxError
})
}

function printReservation(data){
let html = "";
for(let item of data){
  html += Reservation(item);
}   
$("#reservationAdmin").html(html);
}

function Reservation(item){
return `<tr>
<td>${item.Indication}</td>
<td>${item.dateReservation}</td>
<td>${item.timereservation}</td>
<td>${item.peoplenumber}</td>
<td><button class="delete deleteReservation" data-idreservation=${item.idReservation}>x</button></td>
</tr>`;
}

  function ajaxError(greska, status, statusText){
    console.error('GRESKA AJAX: ');
    console.log(status);
    console.log(statusText);
    if(greska.status == 500){
        console.log(greska.parseJSON);
        alert(greska.parseJSON.poruka);
    }
    else if(greska.status == 400){
        alert('Niste poslali ispravno parametre!')
    } 
  }  
