<main role="main" class="m-auto px-5 main">
    <div class="pt-3 pb-2 mb-3 border-bottom text-center">
    <h1 class="h2">Subjects</h1>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal">
      Add New Subject +
    </button>
    </div>

    <div class="pl-3 pr-3 mb-5">
    <div class="table-responsive">
    <table class="table">
      <thead class="thead-custom">
          <tr>
          <th>Id</th>
          <th>Subject</th>
          <th>Action</th>
          </tr>
      </thead>
      <tbody>
    
        
      <?php
        $perPage = 8;
        $page = isset($_GET['page']) ? intval($_GET['page']-1) : 0;
        $dat = $data['subj'];
        $numberOfPages = intval(count($dat)/$perPage)+1;

        foreach(array_slice($dat, $page*$perPage, $perPage) as $result) { ?>
      <tr>
          <th scope="row"><?= $result->id_subj;?></th>
            <td><?= $result->subject;?></td>
            <td>
              <form action="" method="post">
                <div>
                
                  <button type="button" class="btn btn-update" data-toggle="modal" data-target="#updateModal">
                      Update
                    </button>
                    <input type="hidden" name="id_subj" value="<?= $result->id_subj;?>">
                  <input type="submit" name="delete" value="Delete" id="delete" class="btn btn-delete">
                </div>
              </form>
            </td>
          </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>

      <nav aria-label="pagination">
        <ul class="pagination pg-blue justify-content-center">
          <?php 
          for($i=1; $i<=$numberOfPages; $i++){?>
          <li class='page-item'><a class="page-link" href="Admin/subjects_admin&page=<?=$i?>"><?= $i ?></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
</main>




<!-- Modal ADD -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Add a New Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Subject</label>
          <input name="subject" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Subject" required>
        </div>

        <input type="submit" name="submit" value="Add" class="btn btn-add" onclick="return message();">
      </form>
        </div>
        
    </div>
  </div>
</div>


<!-- MODAL UPDATE -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title text-dark" id="exampleModalLabel">Update This Subject</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Id</label>
            <input name="id_subj" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?=$result->id_subj;?>" required>
          <div class="form-group">
            <label for="exampleInputEmail1">Subject</label>
            <input name="subject" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?=$result->subject;?>" required>
          </div>

          <div class="input-group mb-3">
            <input type="hidden">
            <input type="submit" value="Update" name="update" id="updatebtn" class="btn btn-update">
          </div>

          </form>
          </div>
      </div>
    </div>
  </div>
</div>



