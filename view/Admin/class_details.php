<main role="main" class="m-auto px-5 main">
    <div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1 class="h2">
      <?php
      $results = $data["class"];
      if(empty($results))
        echo "";
      else {
        echo "Class: " . $results[0]->{'class'};}?></h1>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <div class="pl-3 pr-3 input-group mb-3 col-12  pl-0 pr-0">
      <div class="input-group-prepend d-block col-12 pl-0 pr-0">
         <!-- Button trigger modal -->
         <button type="button" class="btn btn-add float-right" data-toggle="modal" data-target="#exampleModal">
            Add a Student to This Class +
          </button>
          <a href="Admin/classes_admin" class="btn-back float-left" role="button">Back</a>
      </div>
      </div>
    </div>

    <div class="pl-3 pr-3 mb-5">
    <div class="table-responsive">
    <table class="table">
      <thead class="thead-custom">
              <tr>
              <th scope="col">ID</th>
              <th scope="col">Student Name</th>
              <th scope="col">Student Surname</th>
              <th scope="col">Unique ID No</th>
              <th scope="col">Parent Name</th>
              <th scope="col">Parent Username</th>
              <th scope="col">Parent Password</th>
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
              <th scope="row"><?= $result->id;?></th>
               <td><?= $result->name;?></td>
                <td><?= $result->surname;?></td>
                <td><?= $result->jmbg;?></td>
                <td><?= $result->pname . " " . $result->psurname;?></td>
                <td><?= $result->username;?></td>
                <td><?= $result->password;?></td>
                <td>
                <form action="" method="post">
                    <div>

                      <button type="button" class="btn btn-update" data-toggle="modal" data-target="#updateModal">
                         Update
                        </button>
                        <input type="hidden" name="id" value="<?= $result->id;?>">
                      <input type="submit" name="delete" value="Delete" id="delete" class="btn btn-delete">
                    </div>
                  </form>
                </td>
              </tr>
          <?php } ?>
          </tbody>
        </div>
      </div>
    </table>
    <nav aria-label="pagination">
      <ul class="pagination pg-blue justify-content-center">
        <?php
        for($i=1; $i<=$numberOfPages; $i++){?>
        <li class='page-item'><a class="page-link" href="Admin/class_details&class=<?=$results[0]->{'id_cl'}; ?>&page=<?=$i?>"><?= $i ?></a></li>
        <?php } ?>
      </ul>
    </nav>
  </main>



<!-- MODAL ADD -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title text-dark" id="exampleModalLabel">Add a Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="exampleInputPassword1">Student Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Student First Name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Student Surname</label>
            <input name="surname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Student Surname">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Student Unique ID No</label>
            <input name="jmbg" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Student Unique ID Number">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Parent Name</label>
            <input name="pname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Parent Name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Parent Surname</label>
            <input name="psurname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Parent Surname">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Parent Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Parent Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Parent Password</label>
            <input name="password" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Parent Password">
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
          <h5 class="modal-title text-dark" id="exampleModalLabel">Update Information About This Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Id</label>
            <input name="id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?=$result->id;?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Student Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?=$result->name;?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Student Surname</label>
            <input name="surname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?=$result->surname;?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Student Unique ID Number</label>
            <input name="jmbg" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?=$result->jmbg;?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Parent Name</label>
            <input name="pname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?=$result->pname;?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Parent Surname</label>
            <input name="psurname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?=$result->psurname;?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Parent Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?=$result->username;?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Parent Password</label>
            <input name="password" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?=$result->password;?>" required>
          </div>

          </div>
          <div class="ml-3 mb-3">
            <input type="hidden">
            <input type="submit" value="Update" name="update" id="updatebtn" class="btn btn-update">
          </div>
          </form>
          </div>
      </div>
    </div>
  </div>



