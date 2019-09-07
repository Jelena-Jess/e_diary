<main role="main" class="ml-sm-auto px-4 main">
  <div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1 class="h2">Your Personal Data</h1>
  </div>
  <div class="ml-3">
  <?php $parent = $data['parent'];?>
    <p>Student name: <?= $parent[0]->{'name'};?></p>
    <p>Student surname: <?= $parent[0]->{'surname'};?></p>
    <p>Student unique ID number: <?= $parent[0]->{'jmbg'};?></p>
    <p>Parent name: <?= $parent[0]->{'pname'};?></p>
    <p>Parent surname: <?= $parent[0]->{'psurname'};?></p>
    <p>Parent username: <?= $parent[0]->{'username'};?></p>
    <a class="btn btn-add" href="Parents/change_password">Change your Password</a>
  </div>
</main>