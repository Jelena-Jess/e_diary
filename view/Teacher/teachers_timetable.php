<div class="pt-3 pb-2 mb-3 border-bottom text-center">

        <h2 class="h2">
        <?php
        $results = $data['timetable'];
        if(empty($results)) echo "";
        else { echo "Timetable for: ". $results[0]->{'tname'} . " " . $results[0]->{'tsurname'};} ?></h2>
    </div>

<div class="card-timetable card-deck d-flex justify-content-between">
  <div class="d-flex flex-column card border-timetable text-light mb-3" style="max-width: 20rem;">
  <div class="card-header">Monday</div>
  <div class="card-body text-dark">
  <table class="table d-flex flex-row justify-content-around">
        <tbody>
        <?php
         $mon = $data['mon'];
        foreach($mon as $m) { ?>
        <tr>
            <td><?= $m->lesson;?></td>
            <td><?= $m->subject;?></td>
            <td><?= $m->class;?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
  </div>
  </div>
  <div class="d-flex flex-column card border-timetable text-light mb-3" style="max-width: 20rem;">
  <div class="card-header">Tuesday</div>
  <div class="card-body text-dark">
  <table class="table d-flex flex-row d-flex justify-content-around">
        <tbody>
        <?php
         $tue = $data['tue'];
        foreach($tue as $t) { ?>
        <tr>
            <td><?= $t->lesson;?></td>
            <td><?= $t->subject;?></td>
            <td><?= $t->class;?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
  </div>
  </div>
  <div class="d-flex flex-column card border-timetable text-light mb-3" style="max-width: 20rem;">
  <div class="card-header">Wednesday</div>
  <div class="card-body text-dark">
  <table class="table d-flex flex-row justify-content-around">
        <tbody>
        <?php
         $wed = $data['wed'];
        foreach($wed as $w) { ?>
        <tr>
            <td><?= $w->lesson;?></td>
            <td><?= $w->subject;?></td>
            <td><?= $w->class;?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
  </div>
  </div>
  <div class="d-flex flex-column card border-timetable text-light mb-3" style="max-width: 20rem;">
  <div class="card-header">Thursday</div>
  <div class="card-body text-dark">
  <table class="table d-flex flex-row justify-content-around">
        <tbody>
        <?php
         $thu = $data['thu'];
        foreach($thu as $th) { ?>
        <tr>
            <td><?= $th->lesson;?></td>
            <td><?= $th->subject;?></td>
            <td><?= $th->class;?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
  </div>
  </div>
  <div class="d-flex flex-column card border-timetable text-light mb-3" style="max-width: 20rem;">
  <div class="card-header">Friday</div>
  <div class="card-body text-dark">
  <table class="table d-flex flex-row justify-content-around">
        <tbody>
        <?php
         $fri = $data['fri'];
        foreach($fri as $f) { ?>
        <tr>
            <td><?= $f->lesson;?></td>
            <td><?= $f->subject;?></td>
            <td><?= $f->class;?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
  </div>
</div>
</div>
</main>