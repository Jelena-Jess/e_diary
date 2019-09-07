<main role="main" class="m-auto px-5 main">
    <div class="pt-3 pb-2 mb-3 border-bottom text-center">
    <h2 class="h2">
    <?php
        $results = $data['grade'];
        if(empty($results)) echo "";
        else { echo "Grades: ". $results[0]->{'name'} . " " . $results[0]->{'surname'};} ?></h2>
    </div>
    <div class="pl-3 pr-3 mb-5">
    <div class="table-responsive">
    <table class="table">
      <thead class="thead-custom">
            <tr>
            
            <th scope="col">Subject</th>
            <th scope="col">Teacher</th>
            <th scope="col">Term 1</th>
            <th scope="col">Term 2</th>
            <th scope="col">Half-Term Final Grade</th>
            <th scope="col">Term 3</th>
            <th scope="col">Term 4</th>
            <th scope="col">End-Year Final Grade</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($results as $result): ?>
        <tr>
        
            <td><?= $result->subject;?></td>
            <td><?= $result->tname.' '. $result->tsurname;?></td>
            <td><?= $result->term1;?></td>
            <td><?= $result->term2;?></td>
            <td><?= $result->final1;?></td>
            <td><?= $result->term3;?></td>
            <td><?= $result->term4;?></td>
            <td><?= $result->final2;?></td>
        
            </tr>
            <?php endforeach; ?>
        

        </tbody>
    </table>
</div>
</div>
</main>

