<main role="main" class="m-auto px-5 main">
  <div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1 class="h2">Classes</h1>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal">
        Create a New Class +
      </button>
  </div>

<div class="pl-3 pr-3 mb-5 d-float bd-highlight">
  <form action="" method="post">
    <div class="input-group mt-4 d-flex justify-content-center">
      <div class="input-group-prepend">
        <!-- <label class="input-group-text" for="inputGroupSelect01">Select a Grade</label> -->
      </div>
            <select class="" id="inputGroupSelect01" name="value">
                <option class="" selected>Select a grade...</option>
                <option value="1" class="font-weight-bold">1</option>
                <option value="2" class="font-weight-bold">2</option>
                <option value="3" class="font-weight-bold">3</option>
                <option value="4" class="font-weight-bold">4</option>
                <option value="5" class="font-weight-bold">5</option>
                <option value="6" class="font-weight-bold">6</option>
                <option value="7" class="font-weight-bold">7</option>
                <option value="8" class="font-weight-bold">8</option>
            </select>
            <div class="input-group-append">
            <button name="submit" type="submit" class="btn btn-confirm">Confirm</button>
            </div>
        </form>
      </div>
    </div>


    <div>
      <div class="d-flex flex-wrap bd-highlight justify-content-center pl-3">
    <?php 
    $filter = $data['class'];
    if(is_array($filter) || is_object($filter)) {
    foreach($filter as $flt): ?>
        <a href="Admin/class_details&class=<?php echo $flt->id_cl; ?>">
            <div class="card m-0 main-card animated mb-3 p-2 bd-highlight">
              <div class="card-body text-center m-0">
                <span><i class="material-icons card-icon">school</i></span>
              </div>
              <div class="card-footer bg-transparent text-center">
                <h3><?php echo $flt->class; ?></h3>
              </div>
              <div class="card-footer bg-transparent text-center">
               <form action="" method="post">
                 <div class="">
                  <input type="hidden" name="id_cl" value="<?= $flt->id_cl;?>">
                  <input type="submit" name="delete" value="Delete this class" id="delete" class="btn btn-delete btn-sm">
                </div>
              </form> 
              </div>
              
           </div>
        </a>
    <?php endforeach;
    }?>
    </div>
  </div>
</main>

    
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title text-dark" id="exampleModalLabel">Create a New Class</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group">
                <label for="inputState">Grade</label>
                <select id="inputState" class="form-control" name="class_year" required>
                  <option selected>Choose a grade...</option>
                  <option value="1">I</option>
                  <option value="2">II</option>
                  <option value="3">III</option>
                  <option value="4">IV</option>
                  <option value="5">V</option>
                  <option value="6">VI</option>
                  <option value="7">VII</option>
                  <option value="8">VIII</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputState">Class Name</label>
                <select id="inputState" class="form-control" name="class_name" required>
                  <option selected>Choose a Class Name...</option>
                  <option value="a">a</option>
                  <option value="b">b</option>
                  <option value="c">c</option>
                  <option value="d">d</option>
                  <option value="e">e</option>
                  <option value="f">f</option>
                  <option value="g">g</option>
                  <option value="h">h</option>
                </select>
              </div>
              <button name="addNew" type="submit" class="btn btn-add">Submit</button>
            </form>
          </div>
      </div>
    </div>
  </div>