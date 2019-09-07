<main role="main" class="m-auto px-5 main">
    <div class="pt-3 pb-2 mb-3 border-bottom text-center">
    <h1 class="">Users</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal">
      Add New User +
    </button>
    </div>

    <div class="pl-3 pr-3 mb-5 d-float bd-highlight">
  <form action="" method="post">
    <div class="input-group mt-4 mb-4 d-flex justify-content-center">
     <div class="input-group-prepend">
      <!-- <label class="input-group-text" for="inputGroupSelect01">View Users</label> -->
    </div>
        <select name="status_display" id="" class="">
        <option value="admin">Select user role...</option>
          <option value="admin">Admin</option>
          <option value="headmaster">Headmaster</option>
          <option value="teacher">Teacher</option>
        </select>
        <div class="input-group-append">
        <button name="displayRole" type="submit" class="btn btn-confirm float-right">View</button>
        </div>
    </form>
  </div>

  <div class="table-responsive">
    <table class="table">
      <thead class="thead-custom">
        <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $results = $data['user'];
      if(is_array($results) || is_object($results)) {
        foreach($results as $result): ?>
        <tr>
            <th scope="row"><?= $result->id;?></th>
              <td><?= ($_POST['status_display'] == 'teacher') ? $result->tname : (($_POST['status_display'] == 'parent') ? $result->pname : $result->name); ?></td>
              <td><?= ($_POST['status_display'] == 'teacher') ? $result->tsurname : (($_POST['status_display'] == 'parent') ? $result->psurname : $result->surname); ?></td>
              <td><?= $result->username;?></td>
              <td><?= $result->password;?></td>
              <td>
                <form action="" method="post">
                  <div>
                    <button type="button" class="btn btn-update" data-toggle="modal" data-target="#updateModal">
                      Update
                      </button>
                    <input type="hidden" name="id" value="<?php echo $result->id; ?>">
                    <input type="submit" name="delete" value="Delete" id="delete" class="btn btn-delete">
                  </div>
                </form>
              </td>
            </tr>
        <?php endforeach;
        }?>

      </tbody>
    </table>
  </div>
</main>



<!-- ADD NEW USER MODALS -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title text-dark" id="exampleModalLabel">Add New User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" method="post">

          <div class="form-group">
            <label for="exampleInputEmail1">Select Role</label>
            <select name="status" class="form-control">
              <option value="">Choose...</option>
              <option value="admin">Admin</option>
              <option value="headmaster">Headmaster</option>
              <option value="teacher">Teacher</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter First Name" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Last Name</label>
            <input name="surname" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Last Name" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputPassword1" placeholder="Username" required>
            <small id="passwordHelpInline" class="form-text text-muted mb-1" required>
            The username can consist of letters and numbers.
          </small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
          </div>
          <input type="submit" name="submit" value="Add" class="btn btn-add" required>
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
          <h5 class="modal-title text-dark" id="exampleModalLabel">Update This User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" method="post">
        <div class="form-group">
        <label for="exampleInputEmail1">Select Role</label>
            <select name="status" class="form-control">
              <option value="">Choose...</option>
              <option value="admin">Admin</option>
              <option value="headmaster">Headmaster</option>
              <option value="teacher">Teacher</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Id</label>
            <input name="id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?=$result->id;?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= ($_POST['status_display'] == 'teacher') ? $result->tname : (($_POST['status_display'] == 'parent') ? $result->pname : $result->name); ?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Last Name</label>
            <input name="surname" type="text" class="form-control" id="exampleInputPassword1" placeholder="<?= ($_POST['status_display'] == 'teacher') ? $result->tsurname : (($_POST['status_display'] == 'parent') ? $result->psurname : $result->surname); ?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputPassword1" placeholder="<?=$result->username;?>" required>
            <small id="passwordHelpInline" class="form-text text-muted mb-1" required>
            The username can consist of letters and numbers.
          </small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="text" class="form-control" id="exampleInputPassword1" placeholder="<?=$result->password;?>" required>
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
