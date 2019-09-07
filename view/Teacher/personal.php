<div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1>Your Personal Data</h1>
</div>
<div class="ml-3"> 
  <?php $teacher = $data['teacher'];?>
    <p>Name: <?= $teacher[0]->{'tname'};?></p>
    <p>Surname: <?= $teacher[0]->{'tsurname'};?></p>
    <p>Username: <?= $teacher[0]->{'username'};?></p>
    <a class="btn btn-add" href="Teacher/change_password">Change your Password</a>
</div>
</main>