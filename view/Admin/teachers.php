<main role="main" class="ml-sm-auto px-4 main">
    <div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1 class="h2">Teacher - Subject - Class</h1>
  </div>


  <div class="pl-3 pr-3 mb-5">
    <div class="table-responsive">
    <table class="table">
      <thead class="thead-custom">
            <tr>
            <th scope="col">Teacher</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
          $perPage = 8;
          $page = isset($_GET['page']) ? intval($_GET['page']-1) : 0;
          $dat = $data['teach'];
          $numberOfPages = intval(count($dat)/$perPage)+1;

        if(is_array($data) || is_object($data)) {
          foreach(array_slice($dat, $page*$perPage, $perPage) as $teacher) { ?>
        <tr>
              <td><?= $teacher->tname . " " . $teacher->tsurname;?></td>
            
              <td>
              <a href="Admin/teacher_subjects&teacher=<?php echo $teacher->id; ?>"  class="btn btn-a btn-add">Subjects</a>
              <a href="Admin/teacher_classes&teacher=<?php echo $teacher->id; ?>"  class="btn btn-a btn-add">Classes</a>
              </td>
            </tr>
        <?php }
        } ?>
        
      </tbody>
      </table>
      <nav aria-label="pagination">
        <ul class="pagination pg-blue justify-content-center">
          <?php 
          for($i=1; $i<=$numberOfPages; $i++){?>
          <li class='page-item'><a class="page-link" href="Admin/teachers_admin&page=<?=$i?>"><?= $i ?></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>  
    </div>
  </div>
</main>
  
     
