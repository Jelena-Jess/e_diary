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
            <a class="nav-link active" href="Headmaster/dashboard_admin">
            <span><i class="fas fa-home  sidebar-icon"></i></span>
            Home
            </a>
        </li>
        <li class="nav-item hvr-underline-from-center">
            <a class="nav-link" href="Headmaster/classes">
            <span><i class="material-icons sidebar-icon">school</i></span>
                Statistics By Classes
            </a>
        </li>
        <li class="nav-item hvr-underline-from-center">
        <a class="nav-link" href="Headmaster/school_statistics">
        <span><i class="material-icons sidebar-icon">open_in_browser</i></span>
                School Statistics
        </a>
    </li>
     <hr class="sidebar-hr">
    <li class="nav-item">
        <a class="nav-link" href="Headmaster/personal">
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
    
