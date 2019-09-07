<main role="main" class="m-auto px-5 main">
<div class="pt-3 pb-2 mb-3 text-center">
    <?php 
     $name = $data['par']; 
    if(isset($_SESSION['user_id'])) : ?>
        <h1 class="h2 text-center main-heading border-bottom pt-4 pb-3">Welcome <?php echo $name[0]->{'pname'} . " " . $name[0]->{'psurname'} ; ?></h1>
    <?php endif; ?>
    <div class="pt-5 d-flex flex-wrap  justify-content-center"> 
     <h4><?php echo date('l jS \of F Y h:i A');?></h4>
    </div>
    <div class="pt-5 d-flex flex-wrap  justify-content-center">
    <a href=Parents/subjects_parent>
    <div class="card m-0 main-card animated bounceIn bounce-delay_first classes_card" style="width: 25rem;">
            <div class="card-body text-center m-2">
                <span><i class="material-icons card-icon" style="color:#82ccdd;">school</i></span>
            </div>
            <div class="card-footer bg-transparent text-center">
                <h3>Grades</h3>
            </div>
        </div>
    </a>
    <a href=Parents/timetable>
        <div class="card m-0 float-left main-card animated bounceIn bounce-delay_second classes_card" style="width: 25rem;">
            <div class="card-body text-center m-2">
                <span><i class="material-icons card-icon" style="color:#b8e994;">schedule</i></span>
            </div>
            <div class="card-footer bg-transparent text-center">
                <h3>Timetable</h3>
            </div>
        </div>
    </a>
    <a href=Parents/messages>
        <div class="card m-0 float-left main-card animated bounceIn bounce-delay_third classes_card" style="width: 25rem;">
            <div class="card-body text-center m-2">
                <span><i class="material-icons card-icon" style="color:#25CCF7;">forum</i></span>
            </div>
            <div class="card-footer bg-transparent text-center">
                <h3>Messages</h3>
            </div>
        </div>
    </a>
    <a href=Parents/opendoor_parent>
        <div class="card m-0 float-left main-card animated bounceIn bounce-delay_fourth classes_card" style="width: 25rem;">
            <div class="card-body text-center m-2">
                <span><i class="material-icons card-icon" style="color:#ffeaa7;">people</i></span>
            </div>
            <div class="card-footer bg-transparent text-center">
                <h3>Open Door</h3>
            </div>
        </div>
    </a>
    <a href=Parents/noticeboard_parent>
        <div class="card m-0 float-left main-card animated bounceIn bounce-delay_fifth classes_card" style="width: 25rem;">
            <div class="card-body text-center m-2">
                <span><i class="material-icons card-icon" style="color:#FEA47F;">info</i></span>
            </div>
            <div class="card-footer bg-transparent text-center">
                <h3>Noticeboard</h3>
            </div>
        </div>
    </a>
    </div>
</main>