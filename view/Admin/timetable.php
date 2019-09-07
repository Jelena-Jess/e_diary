<main role="main" class="m-auto px-5 main">
    <div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1 class="h2">Timetables</h1>
    </div>

  <div class="pl-3 pr-3 mb-5 d-float bd-highlight">
  <form action="" method="post">
    <div class="input-group mt-4 d-flex justify-content-center">
      <div class="input-group-prepend">
        <!-- <label class="input-group-text" for="inputGroupSelect01">Select a Grade</label> -->
      
          <select id="inputGroupSelect01" name="value">
              <option selected>Select a grade...</option>

              <option value="1" class="font-weight-bold">1</option>
              <option value="2" class="font-weight-bold">2</option>
              <option value="3" class="font-weight-bold">3</option>
              <option value="4" class="font-weight-bold">4</option>
              <option value="5" class="font-weight-bold">5</option>
              <option value="6" class="font-weight-bold">6</option>
              <option value="7" class="font-weight-bold">7</option>
              <option value="8" class="font-weight-bold">8</option>

          </select>
        </div>
          <div class="input-group-append">
          <button name="submit" type="submit" class="btn btn-confirm">Confirm</button> 
          </div>
      </form>
    </div>
  </div>

     <div class="">
      <div class="d-flex flex-wrap bd-highlight justify-content-center pl-3">
  <?php 
  $filter = $data["filter"];
  if(is_array($filter) || is_object($filter)) {
  foreach($filter as $flt): ?>
      <a href="Admin/timetable_add&class=<?php echo $flt->id_cl; ?>">
      <div class="card m-0 main-card classes_card mb-3 p-2 bd-highlight">
              <div class="card-body text-center m-0">
              <span><i class="material-icons card-icon">schedule</i></span>
              </div>
              <div class="card-footer bg-transparent text-center">
                  <h3><?php echo $flt->class; ?></h3>
              </div>
          </div>
      </a>
  <?php endforeach; 
  }?>
  </div>
</div>
</main>



