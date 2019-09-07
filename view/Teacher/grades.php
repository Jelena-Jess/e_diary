 <div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h2 class="h2">
      <?php 
      $grades = $data['grades'];
      if(empty($grades))
      echo "";
      else {
      echo "Student: ". $grades[0]->{'name'} . " " . $grades[0]->{'surname'} ;
      }
      ?></h2>
    </div>
        
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="mb-3 col-12 pl-0 pr-0">
      <div class="">
         <!-- Button trigger modal -->
         <button type="button" class="mr-3 btn btn-add float-right" data-toggle="modal" data-target="#exampleModal">
            Add Subject And Grades +
          </button>
          <a href=
          <?php if(empty($grades)) {
            echo "Teacher/teachers_class";
          } else {
            echo "Teacher/classes&class=". $grades[0]->{'id_cl'};
          };
      ?> 
      class="ml-3 btn-back float-left" role="button">Back</a>
      </div>
      </div>
    </div>

    <div class="pl-3 pr-3 mb-5">
    <div class="table-responsive">
    <table class="table">
          <thead class="thead-custom">
              <tr>
              <th scope="col">Id</th>
              <th scope="col">Subject</th>
              <th scope="col">Term 1</th>
              <th scope="col">Term 2</th>
              <th scope="col">Half Term Final Grade </th>
              <th scope="col">Term 3</th>
              <th scope="col">Term 4</th>
              <th scope="col">End Year Final Grade</th>
              <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
             <?php foreach($grades as $grade): ?>
             <tr>
                <td><?= $grade->id_g;?></td>
                <td><?= $grade->subject;?></td>
                <td><?= $grade->term1;?></td>
                <td><?= $grade->term2;?></td>
                <td><?= $grade->final1;?></td>
                <td><?= $grade->term3;?></td>
                <td><?= $grade->term4;?></td>
                <td><?= $grade->final2;?></td>
                <td>
                  <form action="" method="post">
                    <div>
                      <button type="button" class="btn btn-update" data-toggle="modal" data-target="#updateModal">
                         Add Grades
                        </button>
                        <input type="hidden" name="id_g" value="<?= $grade->id_g;?>">
                       <input type="submit" name="delete" value="Delete" id="delete" class="btn btn-delete">
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


<!-- MODAL UPDATE -->
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title text-dark" id="exampleModalLabel">Add New Grades</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" method="post">
         <div class="form-group">
            <label for="exampleInputEmail1">Id</label>
            <input name="id" value="<?php $grade->id_g; ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= $grade->id_g; ?>" value="<?= $grade->id_g; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Term 1</label>
            <input name="term1" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= $grade->term1; ?>" value="<?= $grade->term1; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Term 2</label>
            <input name="term2" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= $grade->term2; ?>" value="<?= $grade->term2; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Half-Term Final Grade</label>
            <input name="final1" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= $grade->final1; ?>" value="<?= $grade->final1; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Term 3</label>
            <input name="term3" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= $grade->term3; ?>" value="<?= $grade->term3; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Term 4</label>
            <input name="term4" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= $grade->term4; ?>" value="<?= $grade->term4; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">End-Year Final Grade</label>
            <input name="final2" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= $grade->final2; ?>" value="<?= $grade->final2; ?>">
          </div>
          <div class="mb-3">
            <input type="hidden">
            <input type="submit" value="Update" name="update" id="updatebtn" class="btn btn-update"  onclick="return message();">
          </div>
          </form>
          </div>
      </div>
    </div>
  </div>


<!-- Modal ADD -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title text-dark" id="exampleModalLabel">Add a Subject and Grades</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Subject</label>
            <select name="subject">
              <?php 
              $subjects = $data['subj'];
              foreach($subjects as $subject) { ?>
              <option value="<?=$subject->id_subject; ?>"><?=$subject->subject; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Term 1</label>
            <input name="term1" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Grades For Term 1" >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Term 2</label>
            <input name="term2" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Grades For Term 2" >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Half-Term Final Grade</label>
            <input name="final1" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Half-Term Final Grade" >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Term 3</label>
            <input name="term3" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Grades For Term 3" >
          </div> <div class="form-group">
            <label for="exampleInputPassword1">Term 4</label>
            <input name="term4" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Grades For Term 4" >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">End-Year Final Grade</label>
            <input name="final2" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter End-Year Final Grade">
          </div>

          <input type="submit" name="submit" value="Add" class="btn btn-add" onclick="return message();">
        </form>
          </div>

      </div>
    </div>
  </div>


