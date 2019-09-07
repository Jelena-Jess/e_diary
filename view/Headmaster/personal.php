<main role="main" class="m-auto px-5 main">
  <div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1 class="h2">Your Personal Data</h1>
  </div>
  <div class="ml-3">
  <?php $head = $data['head'];?>
    <p>Name: <?= $head[0]->{'name'};?></p>
    <p>Surname: <?= $head[0]->{'surname'};?></p>
    <p>Username: <?= $head[0]->{'username'};?></p>
    <a class="btn btn-add" href="Headmaster/change_password">Change your Password</a>
  </div>
</main>