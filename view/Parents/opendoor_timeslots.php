<main role="main" class="m-auto px-5 main">
    <div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1 class="h2">Send an Open Door Request</h1>
  </div>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
   <div class="input-group-prepend d-block col-12 pl-0 pr-0">
       <a href="Parents/opendoor_parent" class="ml-3 float-left btn-back" role="button">Back</a>
   </div>
 </div>

 <div class="pl-3 pr-3 mb-5">
    <div class="table-responsive">
    <table class="table">
      <thead class="thead-custom">
          <tr>
          <th scope="col">Teacher</th>
          <th scope="col">Day</th>
          <th scope="col">Time</th>
          <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
      <?php 
      $results = $data['opendoor'];
      foreach($results as $result): ?>
      <tr>
        <td><?=$result->tname . " " . $result->tsurname;?></td>
        <td><?= $result->day;?></td>
        <td><?= $result->hour . " : " . $result->min . " " . $result->period;?></td>
        <td>
        <form action="" method="post" >
          <div class="input-group-append">
          <input type="hidden" value="<?= $result->id_tos;?>">
          <button onclick="request(<?= $result->id_tos; ?>)" type="button" id="<?= $result->id_tos; ?>" value = "<?= $result->id_tos;?>" class="btn btn-add button float-right">Send Request</button>
          </div>
        </form>
        </td>
      </tr>
      <?php endforeach; ?>
      </tbody>
  </table>
</div></div>
</main>
