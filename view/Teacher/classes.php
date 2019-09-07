<div class="pt-3 pb-2 mb-3 border-bottom text-center">
    <h1 class="h2"> 
        <?php 
        $results = $data['class'];
        if(empty($results)) echo "";
        else { echo "Class: ". $results[0]->{'class'};}
        ?>
    </h1>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <div class="input-group mb-3 col-12  pl-0 pr-0">
          <a href="Teacher/teachers_class" class="ml-3 btn-back float-left" role="button">Back</a>
      </div>
    </div>

    <div class="pl-3 pr-3 mb-5">
    <div class="table-responsive">
    <table class="table">
      <thead class="thead-custom">
          <thead class="thead-custom">
              <tr>
              <th scope="col">Student</th>
              <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $perPage = 8;
          $page = isset($_GET['page']) ? intval($_GET['page']-1) : 0;
         // $classes = $data['class'];
          $numberOfPages = intval(count($results)/$perPage)+1;
          foreach(array_slice($results, $page*$perPage, $perPage) as $result) { ?>
          <tr>
                <td><?= $result->name . " " . $result->surname;?></td>

                <td>
                <a href="Teacher/grades&student=<?php echo $result->id; ?>"  class="btn btn-a btn-add">Grades</a>

                </td>
              </tr>
          <?php } ?>

          </tbody>
        </table>
      </div>
    </div>

    <nav aria-label="pagination">
      <ul class="pagination pg-blue justify-content-center">
        <?php
        for($i=1; $i<=$numberOfPages; $i++){?>
        <li class='page-item'><a class="page-link" href="/Teacher/classes&class=<?=$results[0]->{'id_cl'};?>&page=<?=$i?>"><?= $i ?></a></li>
        <?php } ?>
      </ul>
    </nav>
</main>




