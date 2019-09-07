<main role="main" class="ml-sm-auto px-4 main">
  <div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1 class="h2">Your Personal Data</h1>
  </div>
  <div class="ml-3">
  <div class="input-group mb-3 pl-0 pr-0">
      <div class="input-group-prepend d-block pl-0 pr-0">
        <a href="Parents/personal" class="button btn-back float-left" role="button">Back</a>
      </div> 
    </div>

  <?php $parent = $data['parent'];?>
    <p>Student name: <?= $parent[0]->{'name'};?></p>
    <p>Student surname: <?= $parent[0]->{'surname'};?></p>
    <p>Student unique ID number: <?= $parent[0]->{'jmbg'};?></p>
    <p>Parent name: <?= $parent[0]->{'pname'};?></p>
    <p>Parent surname: <?= $parent[0]->{'psurname'};?></p>
    <p>Parent username: <?= $parent[0]->{'username'};?></p>
    <br>
    <div class="border-top p-2">
    <h5 class="mt-3">Change Your Password</h5>
    <p class="text-muted">&#40;It's a good idea to use a strong password that you're not using elsewhere&#41;</p>
    <div>
 
    <form class="form form-horizontal" method="post">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label text-white">Current</label>
        <div class="col-md-5">
          <input name="current_pass" type="text" class="form-control mb-3" id="inputEmail3" placeholder="Enter Your Current Password" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label text-white">New</label>
        <div class="col-md-5">
          <input name="new_pass" type="password" class="form-control mb-3" id="inputPassword3" placeholder="Enter Your New Password" required>
          <small id="passwordHelpInline" class="form-text text-muted mb-1">
          Your new password must consist of numbers and letters only.
          </small>
        </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label text-white">Re-Type New</label>
          <div class="col-md-5">
            <input name="new_pass_check" type="password" class="form-control mb-3" id="inputPassword3" placeholder="Re-Type Your New Password" required>
          <div class="form-group row">
        </div>
        </div>
        <div class="col-sm-10">
        <button type="submit"  name="submit" class="btn btn-update float-left" onclick="return msg_password();">Save Changes</button>
      </div>
    </div>
    </div>
  </form>
  </div>
  </main>

  

      