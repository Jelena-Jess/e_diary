<div class="pt-3 pb-2 mb-3 text-center">
    <?php
    $name = $data['teach']; 
    if(isset($_SESSION['user_id'])) : ?>
        <h1 class="h2 text-center main-heading border-bottom pt-4 pb-3">Welcome <?php echo $name[0]->{'tname'} . " " . $name[0]->{'tsurname'} ; ?></h1>
    <?php endif; ?>
<div class="pt-5 d-flex flex-wrap  justify-content-center"> 
    <h4><?php echo date('l jS \of F Y h:i A');?></h4>
</div>
<div class="d-block p-5">
    <div id="calendar" class="dycalendar-container"></div>
</div>
</div>
</main>

   