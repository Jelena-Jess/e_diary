<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>

<div id="mySidebar" class="sidebar">
<div class="mobile side-nav fixed d-lg-none d-xl-none pt-3 mt-5">

    <ul class="custom-scrollbar nav flex-column text-left ml-auto mr-auto sidebar-nav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="far fa-window-close fa-sm"></i></a>

        <li class="nav-item">
            <a class="nav-link active" href="Teacher/teachers_dashboard">
            <span><i class="fas fa-home sidebar-icon"></i></span>
            Home
            </a>
        </li>
        <li class="nav-item hvr-underline-from-center">
            <a class="nav-link" href="Teacher/teachers_class">
            <span><i class="material-icons sidebar-icon">school</i></span>
            Grades
            </a>
        </li>
            <li class="nav-item">
            <a class="nav-link" href="Teacher/teachers_timetable">
                <span><i class="material-icons sidebar-icon">schedule</i></span>
            Timetable
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Teacher/messages">
                <span><i class="material-icons sidebar-icon">forum</i></span>
            Messages
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Teacher/teachers_opendoor">
                <span><i class="material-icons sidebar-icon">people</i></span>
            Open Door
            </a>
        </li>
        <hr class="sidebar-hr">
        <li class="nav-item">
        <a class="nav-link" href="Teacher/personal">
        <span><i class="material-icons sidebar-icon">person</i></span>
        Your Profile
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="Users/logout">
        <span><i class="material-icons sidebar-icon">power_settings_new</i></span>
        Sign out
        </a>
    </li>
    </ul>
</div>
</div> 
    
