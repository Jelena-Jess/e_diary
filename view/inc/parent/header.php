<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <base href="/diary/" />

    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/hamburgers.css">
    <link rel="stylesheet" href="public/css/dycalendar.min.css">
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.7.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
     
    <script src="view/Headmaster/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
    <script src="view/Headmaster/amcharts/amcharts/serial.js" type="text/javascript"></script>
    <script src="view/Headmaster/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
    <script src="view/Headmaster/amcharts/amcharts/serial.js" type="text/javascript"></script>
 
</head>

<body id="body">
<header class="header">

<div class="container-fluid d-lg-none d-xl-none">
  <div class="row row-content"> 
  <button class="openbtn navbar-toggler p-3" onclick="openNav()" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  <i class="fas fa-bars fa-lg"></i>
	</button>
  </div>
</div>


<nav class="mb-1 navbar navbar-expand-lg default-color bg-blue d-none d-sm-none d-md-none d-lg-block">
	
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto d-flex bd-highlight mb-7">
      <li class="px-2 nav-item bd-highlight nav" >
        <a class="nav-link" href="Parents/dashboard">Home
        </a>
      </li>
      <li class="px-2 nav-item bd-highlight nav">
        <a class="nav-link" href="Parents/subjects_parent">Grades</a>
      </li>
      <li class="px-2 nav-item bd-highlight nav">
        <a class="nav-link" href="Parents/timetable">Timetable</a>
      </li>
      <li class="px-2 nav-item bd-highlight nav">
        <a class="nav-link" href="Parents/messages">Messages</a>
      </li>
      <li class="px-2 nav-item bd-highlight nav">
        <a class="nav-link" href="Parents/opendoor_parent">Open Door</a>
      </li>
      <li class="px-2 nav-item bd-highlight nav">
        <a class="nav-link" href="Parents/noticeboard_parent">Noticeboard</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
    
    <li class="nav-item nav-item-personal dropdown bd-highlight nav">
        <a class="nav-link"  id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user" style></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="Parents/personal">Profile</a>
          <a class="dropdown-item" href="Users/logout">Log Out</a>
        </div>
      </li>
      </ul>
    </div>
  </nav>
</header>

