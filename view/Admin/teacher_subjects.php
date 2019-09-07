<main role="main" class="m-auto px-5 main">
  <div class="pt-3 pb-2 mb-3 border-bottom text-center">
    <h2 class="h2"> 
    <?php 
    $results=$data['get'];
    if(empty($results))
    echo "";
    else { 
    echo "Teacher: ". $results[0]->{'tname'} . " " . $results[0]->{'tsurname'} ;
    }
    ?></h2>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <div class="pl-3 pr-3 input-group mb-3 col-12  pl-0 pr-0">
      <div class="input-group-prepend d-block col-12 pl-0 pr-0">
         <!-- Button trigger modal -->
         <button type="button" class="btn btn-add float-right" data-toggle="modal" data-target="#exampleModal">
            Add Subject +
          </button>
          <a href="Admin/teachers_admin" class="float-left btn-back" role="button">Back</a>
      </div>
      </div>
    </div>
      
    <div class="pl-3 pr-3 mb-5">
    <div class="table-responsive">
    <table class="table">
      <thead class="thead-custom">
            <tr>
            <th scope="col">Subject</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $result): ?>
            <tr>
              <td><?= $result->subject;?></td>
              <td>
                <form action="" method="post">
                  <div class="input-group">
                    <input type="hidden" name="id" value="<?= $result->id_ts;?>">
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


<!-- Modal ADD -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title text-dark" id="exampleModalLabel">Add a Subject to This Teacher</h5>
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
               $subjects=$data['subject'];
              foreach($subjects as $subj) { ?>
              <option value="<?=$subj->id_subj; ?>"><?=$subj->subject; ?></option>
              <?php } ?>
            </select>
          </div>

          <input type="submit" name="submit" value="Add" class="btn btn-add" onclick="return message();">
        </form>
          </div>

      </div>
    </div>
  </div>


