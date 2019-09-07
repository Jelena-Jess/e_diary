<main role="main" class="px-4 main">
  <div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1 class="h2">Your Personal Data</h1>
  </div>
  <?php $admin = $data['admin'];?>
    <p>Name: <?= $admin[0]->{'name'};?></p>
    <p>Surname: <?= $admin[0]->{'surname'};?></p>
    <p>Username: <?= $admin[0]->{'username'};?></p>
    <a class="btn btn-add" href="Admin/change_password">Change your Password</a>
</main>