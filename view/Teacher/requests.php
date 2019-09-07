<div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1 class="h2">Your Open Door Parent Requests</h1>
    </div>
      <div class="pb-5">
          <a href="Teacher/teachers_opendoor" class="ml-3 float-left btn-back" role="button">Back</a>
      </div>

  <div class="pt-5 d-flex flex-wrap  justify-content-center">
  <?php 
  $responses = $data['opendoor'];
  foreach($responses as $response) { ?>
   <div class="m-3 bd-highlight card text-center" style="width: 35rem;">
    <div class="card-header text-white">
      Open Door Meeting
    </div>
    <div class="card-body ">
      <h4 class="card-title mb-2">Scheduled for <?= $response->day . " at ". $response->hour . " : " . $response->min." ".$response->period; ?></h4>
      <p class="card-text"> Student: <?=$response->name . " " . $response->surname;?></p>
      <p class="card-text">Parent: <?=$response->pname . " " . $response->psurname; ?></p>
      <p class="card-text text-muted">Sent: <?=$response->timestamp; ?></p>

      <form action="" method="post" >
        <input type="hidden" name="id_o" value="<?= $response->id_o;?>">
        <button name="accept" type="submit" class="btn btn-add" onclick="return accepted();">Accept</button>
        <input type="hidden" name="id_o" value="<?= $response->id_o;?>">
        <button name="decline" type="submit" class="btn btn-delete" onclick="return declined();">Decline</button>
      </form>

    </div>
    </div>      
  <?php } ?>
</div>
</main>



