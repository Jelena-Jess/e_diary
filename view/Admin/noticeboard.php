<main role="main" class="m-auto px-5 main">
    <div class="pt-3 pb-2 mb-3 border-bottom text-center">
        <h1 class="h2">Noticeboard</h1>
        <button type="button" class="btn btn-add" data-toggle="modal" data-target="#noticeboard">
          Add New Notice +
        </button>
    </div>
    <div>
      <div>
      <?php 
       $perPage = 8;
       $page = isset($_GET['page']) ? intval($_GET['page']-1) : 0;
       $results = $data['notice'];
       $numberOfPages = intval(count($results)/$perPage)+1;
       foreach(array_slice($results, $page*$perPage, $perPage) as $result) { ?>
        <div class="w-75 ml-auto mr-auto card custom-card border-dark mb-4">
          <div class="card-header card-header-notice">
            <h4 class="card-title text-center text-light mb-0"><?php echo $result->title ?></h4>
          </div>
            <div class="card-body">
            <p class="mb-3 d-block text-muted">Posted on: <?php echo $result->date ?></p>
            <p class="card-text text-truncate"><?php echo $result->message ?></p>
          </div>
            <div class="input-group p-3 d-flex justify-content-between
            ">
            <a href="Admin/noticeboard_details&id=<?php echo $result->id_news; ?>" class="btn btn-confirm">Read More</a>
            <form action="" method="post">
              <input type="hidden" name="id_news" value="<?= $result->id_news;?>">
              <input type="submit" name="delete" value="Delete" id="delete" class="btn btn-delete">
            </form>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  <nav aria-label="pagination">
    <ul class="pagination pg-blue justify-content-center">
      <?php 
      for($i=1; $i<=$numberOfPages; $i++){?>
      <li class='page-item'><a class="page-link" href="Admin/noticeboard_admin&page=<?=$i?>"><?= $i ?></a></li>
      <?php } ?>
    </ul>
  </nav>
</main>

<!-- ADD NEW NOTICE MODAL -->
<div class="modal fade" id="noticeboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title text-dark" id="noticeboar">Add a New Notice</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Notice Title</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Notice Title" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Notice Content</label>
            <textarea name="message" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="7" placeholder="Write notice content here..."></textarea>
          </div>
            <input type="submit" name="submit" value="Add" class="btn btn-add" onclick="return message();">
          </form>
          </div>
          </div>
    </div>
  </div>


