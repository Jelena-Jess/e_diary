<main role="main" class="m-auto px-5 main">
  <div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1 class="h2">Your Personal Data</h1>
  </div>
  <div class="input-group mb-3 col-12  pl-0 pr-0">
      <div class="input-group-prepend d-block col-12 pl-0 pr-0">
        <a href="Admin/personal" class="btn-back float-left" role="button">Back</a>
      </div> 
    </div>

  <?php $admin = $data['admin'];?>
    <p>Name: <?= $admin[0]->{'name'};?></p>
    <p>Surname: <?= $admin[0]->{'surname'};?></p>
    <p>Username: <?= $admin[0]->{'username'};?></p>
    <br>
    <div class="border-top p-2">
    <h5 class="mt-3">Change Your Password</h5>
    <p class="text-muted">&#40;It's a good idea to use a strong password that you're not using elsewhere&#41;</p>
    <div>
 
    <form class="form form-horizontal" method="post">
      <div class="form-group row">
        <label for="current_pass" class="col-sm-2 col-form-label text-white">Current</label>
        <div class="col-md-5">
          <input name="current_pass" type="text" class="form-control mb-3" id="current_pass" placeholder="Enter Your Current Password" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="new_pass" class="col-sm-2 col-form-label text-white">New</label>
        <div class="col-md-5">
          <input name="new_pass" type="password" class="form-control mb-3" id="new_pass" placeholder="Enter Your New Password" required>
          <small id="passwordHelpInline" class="form-text text-muted mb-1" required>
            Your new password must consist of numbers and letters only.
          </small>
        </div>
        </div>
        <div class="form-group row">
          <label for="new_pass_check" class="col-sm-2 col-form-label text-white">Re-Type New</label>
          <div class="col-md-5">
            <input name="new_pass_check" type="password" class="form-control mb-3" id="new_pass_check" placeholder="Re-Type Your New Password" required>
          <div class="form-group row">
        </div>
        </div>
        <div class="col-sm-10">
        <button type="submit"  name="submit" class="btn btn-confirm float-left" onclick="return msg_password();">Save Changes</button>
      </div>
    </div>
    </div>
  </form>
  </main>

  

      