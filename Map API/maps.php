<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- FONT AWESOME FOR ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- TEMPORARY BOOTSTRAP LINK FILE -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- TOMTOM MAPS API  -->
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/maps/maps.css'>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/maps/maps-web.min.js'></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/services/services-web.min.js'></script>

    <!-- LINKED JS FILE -->
    <script src='maps.js'></script>
</head>
<body class="bg-dark text-light">

    <!-- SEARCH BAR AND SEARCH BUTTON -->
     <section class="text-center">
        <h1 class="center CP text-light" style="padding-top: 30px;">Bakery Locator</h1>        
            <form class="d-inline-flex tt-search">
                <input id="locator" type="text" class="form-control" placeholder="Enter Municipality or City"/>
                <button id="search-location" onclick="searchLocation()" class="btn btn-primary" type="button" style="background: var(--yellow);width: 66px;height: 52px;"><i class="fa fa-search fa-2x"></i></button>
            </form>
            
            <!-- TOO LAZY TO DESIGN -->
            <br> <br>
            <br> <br>
            <br> <br>
            <br> <br>
            <br> <br>
            <br> <br>
       

            <!-- SECTION WHERE LOCATION DETAILS WILL SHOW -->
            <section class="map-clean" id='mapApi'>
                <div class="container" id="hardware-info" style="margin-top: -220px;">         
                    <h2 class="text-center"></h2>
                        <div>
                            <p class="text-left text-light" id="hw-desc"> </p>
                        </div>   
                </div>                             
            </section>
        


</body>
</html>