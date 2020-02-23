<?php

    require "dbconnection.php";
    session_start();
    if(isset($_POST['add-site']))
    {
        $name = $_POST['name'];
        $location = $_POST['location'];
        $type = $_POST['type'];
        $region = $_POST['region'];
        $date = $_POST['date'];
        $tag = $_POST['tag'];
        $coordinate = $_POST['coordinate'];



        $sql = "SELECT * FROM site_or_event WHERE name = '$name'";

        $result = $mysql_conn->query($sql);

        $user_present = $result->num_rows;

        if($user_present > 0)
        {
            echo ("<script> 
               window.alert('Username Already Exists');
                window.location.href='';
                </script>");
        }

        else
        {
            $myArray = explode(',', $coordinate);
            $latitude = $myArray[0];
            $longitude = $myArray[1];

            $sql = "INSERT INTO site_or_event(name, location, type, region, date, latitude, longitude, tag) VALUES('$name','$location', '$type','$region','$date','$latitude', '$longitude','$tag')";

            $mysql_conn->query($sql);
            if($mysql_conn)
            {
                echo "<script>
                window.alert('Site Added');
                window.location.href='';
                </script>";
            }
            else
            {
                echo "<script>
                window.alert('An error occured while adding site.');
                </script>";
            }
        }
        
        
    }

   
   
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/icon.png">
    <title>Pinas | Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/map.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>     
<body>
<center><div id="loader-base" class="loader-base"><div class="loader"></div><img style="position: static; margin-top: -150px;" src="images/icon.png" width="75"><br><br>Loading Please Wait....</div></center>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header" style="background-color: #fff !important">
            <h3><img src="images/logo1.png" width="200"></h3>
            <strong><img src="images/icon.png" height="40"></strong>
        </div>
        <center>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="main-maintenance" class="active">
                    <i class="fas fa-globe"></i>
                    <span>Geo Informatics</span>
                </a>
            
            </li>
            <li>
                <a href="">
                    <i class="fas fa-chart-pie"></i>
                    <span>Statistical Summary</span>
                </a>
                <!-- <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-copy"></i>
                    <span>Pages</span>
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul> -->
            </li>
            <li>
                <a href="main-maintenance.php">
                    <i class="fas fa-image"></i>
                    <span>Reconstruction</span>
                </a>
            </li>
            <li>
                <a href="main.php">
                    <i class="fas fa-calendar"></i>
                    <span>Event</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-paper-plane"></i>
                    <span>Recommendation</span>
                </a>
            </li>
        </ul>
        </center>
        <ul class="list-unstyled CTAs">
            <li>
                <a href="download.html" class="download">Download App</a>
            </li>
            <li>
                <a href="logout.php" class="article">Logout</a>
            </li>
        </ul>
    </nav>

<!-- Page Content  -->
<div id="content">
<nav class="navbar navbar-default" style="background: #ffb618; top: 0px !important">
    <div class="container-fluid">
        <div id="sidebarCollapse" style="cursor: pointer !important">
            <h4 id="sidebarCollapse" class="fas fa-align-justify" style="color: #fff; margin-left: 5%;"></h4>
        </div>
    </div>
</nav>

<div id="map" style="margin-top: -40px; height: 585px"></div>
<script>
function initMap() {
setTimeout(function(){
var culturalPlace = [];
var mapMarkers = [];
var placeName = [];

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {

    var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
    };
    var latLng = {lat: pos.lat, lng: pos.lng}; 
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom  : 10, //14
        center: latLng,
        disableDefaultUI: true
    });
    setMarkers(map);
    var geocoder = new google.maps.Geocoder();
    var yourPlace = {
        url: 'images/move.png',
        size: new google.maps.Size(30, 30),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(0, 23),
    };
    var currentLoc = new google.maps.Marker({
            position: latLng,
            map : map,
            animation: google.maps.Animation.DROP,
            icon : yourPlace,
            zIndex : 5000
            });
    var yourLocation = new google.maps.InfoWindow({
          content: "You Are Here"
        });
    currentLoc.addListener('click', function() {
        yourLocation.open(map, currentLoc);
    });
    
});

var ajax = new XMLHttpRequest();
var method = "GET";
var url = "get-data-event.php";
var asynchronous = true;

ajax.open(method, url, asynchronous);
ajax.send();

ajax.onreadystatechange = function()
{
    if (this.readyState == 4 && this.status == 200)
    {
        //alert();
        var data = JSON.parse(this.responseText);
        //console.log(data);

        var html = "";
        
        for(var a = 0; a < data.length; a++)
        {
            var name = data[a].name;
            var latitude = data[a].latitude;
            var longitude = data[a].longitude;
            var distance = data[a].distance;
            culturalPlace[a] = [name,latitude,longitude, distance];
            
        }
        console.log(distance);

    }
}

var ajax2 = new XMLHttpRequest();
var method2 = "GET";
var url2 = "get-nearby.php";
var asynchronous2 = true;

ajax2.open(method2, url2, asynchronous2);
ajax2.send();

ajax2.onreadystatechange = function()
{
    if (this.readyState == 4 && this.status == 200)
    {
        //alert();
        var data = JSON.parse(this.responseText);
        //console.log(data);

        var html = "";
        
        for(var a = 0; a < data.length; a++)
        {
            if(distance<=30){
                var name = data[a].name;
                var distance = data[a].distance;
                getNearby[a] = [name, distance];
                console.log(getNearby[a]);
            }
        }
        

    }
}


var heritage = {
        url: 'images/event.png',
        size: new google.maps.Size(30, 30),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(0, 23),
    };

function setMarkers(map){
    for (var i = 0; i < culturalPlace.length; i++) {
        var lati = parseInt(culturalPlace[i][1]);
        var long = parseInt(culturalPlace[i][2]);
        
        var marker = new google.maps.Marker({
        position: {lat: lati , lng: long},
        map: map,
        icon: heritage,
        title: culturalPlace[i][0],
        zIndex: i+2000
        });
        placeName.push(culturalPlace[i][0]);

    var placeDetail = new google.maps.InfoWindow({
        content: '<center class="tiny">'+ culturalPlace[i][0] + "<br><div style='font-size: 8px;'>" + "</div></center>",
        });


    placeDetail.open(map, marker);

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
    return function() {
        var rating = [];
        var commento = []
        var ajax = new XMLHttpRequest();
        var method = "GET";
        var url = "get-rate-npl.php";
        var asynchronous = true;
        ajax.open(method, url, asynchronous);
        ajax.send();

        ajax.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            var data = JSON.parse(this.responseText);
            //console.log(data);
            var html = "";
                for(var a = 0; a < data.length; a++){
                        if(culturalPlace[i][0] == data[a].place){
                           var rate = data[a].rate;
                           var comment = data[a].comment;
                           rating[a] = [parseInt(rate)];
                           commento[a] = [comment];
                        }
                }console.log(rating);
                var sum = rating[0].reduce((previous, current) => current += previous);
                var avg = sum / rating.length;
                avg = avg.toFixed(2);
                str_comment = commento.toString();
                console.log(avg);
                document.getElementById("rate").innerHTML = avg + " (" + rating.length + ")";
                document.getElementById("commentNLP").innerHTML = str_comment;
            }
        }

        

        document.getElementById("setName").innerHTML = culturalPlace[i][0];
        $("#floating-panel2").removeClass("hide");    
        }
    })(marker, i));

}


google.maps.event.addListener(map, 'click', function(event) {
    clickMarker.setPosition(event.latLng);
    document.getElementById('coordinates').value = event.latLng;
    var newEvacuation = document.getElementById('coordinates').value;
    newEvacuation = newEvacuation.replace(/[()]/g, ''); 
    document.getElementById("coordinates").value = newEvacuation;
    $("#floating-panel2").addClass("hide");
});
var clickMarker = new google.maps.Marker({
        position: null,
        icon: heritage,
        map: map
});


}
        
} else {
    handleLocationError(false);
}
   }, 3000); 
}


</script>

<!-- GOOGLE MAPS -->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgy7g_-tnXK4PrUG2NBktUETaojPxBqyQ&callback=initMap">
</script>
<div id="floating-panel">
    <b>Add Historical Sites</b>
    <form method="POST">
        <div class="input-group" style="margin-bottom: -15px">
            <input id="address" type="search" class="form-control form-control-sm" placeholder="Search Places...">
            <div class="input-group-btn">
                <input class="btn btn-default btn-sm" id="submit" type="button" value="Search">
            </div>
        </div>
            <div class="input-group inline-inputs" style="margin-top: 15px;">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                    <input type="text" id="incidentName" class="form-control form-control-sm" name="name" placeholder="Name" required>

            </div>
            <div class="input-group inline-inputs" >
                    <input type="text" class="form-control form-control-sm" name="location" placeholder="Location" required>
            </div>
            <div class="input-group inline-inputs" >
                    <input type="text" class="form-control form-control-sm" name="type" placeholder="Type" >
                    <input type="text" class="form-control form-control-sm" name="region" placeholder="Region" required>
            </div>
            <div class="input-group inline-inputs" >
                    <input type="text" class="form-control form-control-sm" name="date" placeholder="Date" >
                    <input type="text" class="form-control form-control-sm" name="tag" placeholder="Tag" required>
            </div>
            <div class="input-group inline-inputs">
                    <input type="text" id="coordinates" class="form-control form-control-sm" name="coordinate" placeholder="Coordinates" >
            </div>
            <input type="submit" id="saveIncident" class="btn btn-default btn-sm" name="add-site" value="Add Site">
    </form>
</div>

<div id="floating-panel2" class="hide">
    <b id="setName">Place Name</b>
    
    <h4 id="rate"></h4>
        <img src="images/good.png" width="50">
    <div class="rating" style="font-size: 25px !important; ">
    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
    </div>
    <div class="form-group">
    <textarea class="form-control form-control-sm" rows="3" id="comment" placeholder="Comment / Suggestion"></textarea>
    </div> 

</div>


<div class="floating-panel-dashboard">
<div class="wrapperContainer">
    <div class="boxPanel" style="background-color: #ffca39;">
        <i class="fas fa-cog"></i><br>
        <span>Button 2</span>
    </div>
    <div class="boxPanel" style="background-color: #fe9f3b;">
        <i class="fas fa-cog"></i>
        <span>Button 2</span>
    </div>
    <div class="boxPanel" style="background-color: #7ac943;">
        <i class="fas fa-cog"></i>
        <span>Button 3</span>
    </div>
    <div class="boxPanel" style="background-color: #f6383f;">
        <i class="fas fa-cog"></i>
        <span>Button 4</span>
    </div>
</div>
</div>

</div> <!-- CONTENT -->
<center><div id="loader-base" class="loader-base"><div class="loader"></div><img style="position: static; margin-top: -500px;" src="images/icon.png" width="75"><br><br>Loading Please Wait....</div></center>

</div> <!-- WRAPPER -->

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
    $("#loader-base").addClass("hide");

    $('#btn_check').on('click', function () {
        $('#commentNLP').removeClass('hide');
    });
});
</script>
</body>
</html>
