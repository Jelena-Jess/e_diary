<main role="main" class="m-auto px-5 main">
    <div class="pt-3 pb-2 mb-3 border-bottom text-center">

        <h2>
        <?php
        $results = $data['timetable'];
        if(empty($results)) echo "";
        else { echo "Timetable for Class ". $results[0]->{'class'};} ?></h2>

    </div>

    <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div class="mb-3 col-12  pl-0 pr-0">
      <div class="input-group-prepend d-block col-12 pl-0 pr-0">
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-add float-right" data-toggle="modal" data-target="#exampleModal">
        Add +
        </button>
        <a href="Admin/timetable_admin" class="btn-back float-left" role="button">Back</a>
      </div>
      </div>
    </div>

<div class="card-timetable card-deck d-flex justify-content-between">
<div class="d-flex flex-column card border-timetable text-light mb-4" style="max-width: 20rem;">
  <div class="card-header">Monday</div>
  <div class="card-body text-dark">
  <table class="table d-flex flex-row justify-content-around">
        <tbody>
        <?php
        $mon = $data['mon'];
        foreach($mon as $m) { ?>
        <tr>
            <td scope="col"><?= $m->lesson;?></td>
            <td scope="col"><?= $m->subject;?></td>
            <td scope="col"><?= $m->tname . " " . $m->tsurname; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
  </div>
</div>
<div class="d-flex flex-column card border-timetable text-light mb-4" style="max-width: 20rem;">
  <div class="card-header">Tuesday</div>
  <div class="card-body text-dark">
  <table class="table d-flex flex-row justify-content-around">
        <tbody>
        <?php
        $tue = $data['tue'];
        foreach($tue as $t) { ?>
        <tr>
            <td scope="col"><?= $t->lesson;?></td>
            <td scope="col"><?= $t->subject;?></td>
            <td scope="col"><?= $t->tname . " " . $t->tsurname; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
  </div>
</div>
<div class="d-flex flex-column card border-timetable text-light mb-4" style="max-width: 20rem;">
  <div class="card-header">Wednesday</div>
  <div class="card-body text-dark">
  <table class="table d-flex flex-row justify-content-aroundm">
        <tbody>
        <?php
        $wed = $data['wed'];
        foreach($wed as $w) { ?>
        <tr>
            <td scope="col"><?= $w->lesson;?></td>
            <td scope="col"><?= $w->subject;?></td>
            <td scope="col"><?= $w->tname . " " . $w->tsurname; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
  </div>
</div>
<div class="d-flex flex-column card border-timetable text-light mb-4" style="max-width: 20rem;">
  <div class="card-header">Thursday</div>
  <div class="card-body text-dark">
  <table class="table d-flex flex-row justify-content-around">
        <tbody>
        <?php
        $thu = $data['thu'];
        foreach($thu as $th) { ?>
        <tr>
            <td scope="col"><?= $th->lesson;?></td>
            <td scope="col"><?= $th->subject;?></td>
            <td scope="col"><?= $th->tname . " " . $th->tsurname; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
  </div>
</div>
<div class="d-flex flex-column card border-timetable text-light mb-4" style="max-width: 20rem;">
  <div class="card-header">Friday</div>
  <div class="card-body text-dark">
  <table class="table d-flex flex-row justify-content-around">
        <tbody>
        <?php
        $fri = $data['fri'];
        foreach($fri as $f) { ?>
        <tr>
            <td scope="col"><?= $f->lesson;?></td>
            <td scope="col"><?= $f->subject;?></td>
            <td scope="col"><?= $f->tname . " " . $f->tsurname; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
  </div>
</div>
</div>


    <!-- The list of all the inserts -->
    <div class="pl-3 pr-3 mb-5">
    <div class="table-responsive">
    <table class="table">
          <thead class="thead-custom">
              <th scope="col">ID</th>
              <th scope="col">Day</th>
              <th scope="col">Lesson No</th>
              <th scope="col">Subject</th>
              <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
           $perPage = 8;
           $page = isset($_GET['page']) ? intval($_GET['page']-1) : 0;
           $numberOfPages = intval(count($results)/$perPage)+1;
           foreach(array_slice($results, $page*$perPage, $perPage) as $result) { ?>

          <tr>
              <th scope="row"><?= $result->id_time;?></th>
              <td><?= $result->day;?></td>
               <td><?= $result->lesson;?></td>
                <td><?= $result->subject;?></td>
                <td>
                <form action="" method="post">
                    <div class="input-group">
                      <input type="hidden" name="id_time" value="<?= $result->id_time;?>">
                      <input type="submit" name="delete" value="Delete" id="delete" class="btn btn-delete">
                    </div>
                  </form>
                </td>
              </tr>
          <?php } ?>

          </tbody>
          </table>
          </div>
          </div>
          <nav aria-label="pagination">
            <ul class="pagination pg-blue justify-content-center">
             <?php
              for($i=1; $i<=$numberOfPages; $i++){?>
              <li class='page-item'><a class="page-link" href="Admin/timetable_add&class=<?= $results[0]->{'id_cl'};?>&page=<?=$i?>"><?= $i ?></a></li>
             <?php } ?>
            </ul>
          </nav>
        </main>

<!-- MODAL ADD -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title text-dark" id="exampleModalLabel">Add a New Timetable Insert</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
        <form action="" method="post">

        <div class="form-group">
            <label for="exampleInputEmail1">Day</label>
            <select class="form-control" name="day">
            <?php 
            $day = $data['day'];
            foreach($day as $d) { ?>
            <option value="<?=$d->id_days; ?>"><?=$d->day; ?></option>
            <?php } ?>
          </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Lesson</label>
            <select class="form-control" name="lesson">
              <?php 
              $lessons = $data['lesson'];
              foreach($lessons as $l) { ?>
              <option value="<?=$l->id_l; ?>"><?=$l->lesson; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Subject</label>
            <select class="form-control" name="subj">
              <?php
               $subj=$data['subj'];
              foreach($subj as $s) { ?>
              <option value="<?=$s->id_subj; ?>"><?=$s->subject; ?></option>
              <?php } ?>
            </select>
          </div>

          <input type="submit" name="submit" value="Add" class="btn btn-add" onclick="return message();">
        </form>
          </div>
      </div>
    </div>
  </div>

 

