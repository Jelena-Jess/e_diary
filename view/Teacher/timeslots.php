<div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1 class="h2">Open Door Timeslots For the Next Week</h1>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="mb-3 col-12  pl-0 pr-0">
      <div class="col-12 pl-0 pr-0">
         <!-- Button trigger modal -->
         <button type="button" class="mr-3 btn btn-add float-right" data-toggle="modal" data-target="#exampleModal">
            Add New Timeslot +
          </button>
          <a href="Teacher/teachers_opendoor" class="ml-3 float-left btn-back" role="button">Back</a>
      </div>
      </div>
    </div>

    <div class="pl-3 pr-3 mb-5">
      <div class="table-responsive">
        <table class="table">
          <thead class="thead-custom">
              <tr>
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
            <td><?=$result->day;?></td>
            <td><?=$result->hour . " : " . $result->min . " " . $result->period;?></td>
            <td>
              <form action="" method="post">
                <div class="input-group">
                  <input type="hidden" name="id_tos" value="<?= $result->id_tos;?>">
                  <input type="submit" name="delete" value="Cancel" id="delete" class="btn btn-delete">
                </div>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- MODAL ADD -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Add a New Timetable Timeslot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <form action="" method="post">

      <div class="form-group">
          <label for="exampleInputEmail1">Day</label>
          <select name="day">
            <?php 
            $days = $data['day'];
            foreach($days as $day) { ?>
            <option value="<?=$day->id_days; ?>"><?=$day->day; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Hour</label>
          <select name="time">
            <?php 
            $hours = $data['hour'];
            foreach($hours as $hour) { ?>
            <option value="<?=$hour->id; ?>"><?=$hour->hour; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Minutes</label>
          <select name="minute">
            <?php 
            $minutes = $data['minutes'];
            foreach($minutes as $min) { ?>
            <option value="<?=$min->id_min; ?>"><?=$min->min; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">AM/PM</label>
          <select name="period">
            <?php 
            $period = $data['period'];
            foreach($period as $per) { ?>
            <option value="<?=$per->id_period; ?>"><?=$per->period; ?></option>
            <?php } ?>
          </select>
        </div>
  
        <input type="submit" name="submit" value="Add" class="btn btn-add" onclick="return message();">
      </form>
      </div>
    </div>
  </div>
</div>