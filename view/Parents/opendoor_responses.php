<main role="main" class="m-auto px-5 main">
  <div class="pt-3 pb-2 mb-3 border-bottom text-center">
    <h1 class="h2">Your Open Door Teacher Responses</h1>
  </div>
   <div class="input-group-prepend d-block col-12 pt-3 pb-2 mb-3">
       <a href="Parents/opendoor_parent" class="float-left btn-back" role="button">Back</a>
   </div>

   <div class="pt-5 d-flex flex-wrap justify-content-center">
  <?php 
  $responses = $data['opendoor'];
  foreach($responses as $response) { 
    if($response->status==1) { ?>
    <div class="m-3 bd-highlight card border-timetable text-center" style="width: 18rem;">

    <div class="card-header text-white">
      Open Door Meeting Response
    </div>
    <div class="card-body">
      <h4 class="card-title mb-2">Requested for: <?= $response->day . " at ". $response->hour . " : " . $response->min." ".$response->period; ?></h4>
      <p class="card-text"> Teacher <?=$response->tname . " " . $response->tsurname;?> has <strong>accepted</strong> your request.</p>
      <p class="card-text text-muted">Sent: <?=$response->timestamp; ?></p>
    </div>
    </div>     
  <?php 
  }else{?>
    <div class="m-3 bd-highlight card border-timetable text-center" style="width: 18rem;">
    <div class="card-header text-white">
      Open Door Meeting Response
    </div>
    <div class="card-body">
      <h4 class="card-title mb-2">Requested for: <?= $response->day . " at ". $response->hour . " : " . $response->min." ".$response->period; ?></h4>
      <p class="card-text"> Teacher <?=$response->tname . " " . $response->tsurname;?> has <strong>declined</strong> your request. Try choosing another timeslot.</p>
      <p class="card-text text-muted">Sent at: <?=$response->timestamp; ?></p>
    </div>
    </div>      
  <?php } } ?>
  </div>
</main>
