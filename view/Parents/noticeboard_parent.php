<main role="main" class="m-auto px-5 main">
    <div class="pt-3 pb-2 mb-3 border-bottom text-center">
        <h1 class="h2">Noticeboard</h1>
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
            <h4 class="card-title text-center text-light mb-0"><?= $result->title ?></h4>
          </div>
          <div class="card-body">
            <p class="mb-3 d-block text-muted">Posted on: <?=  $result->date ?></p>
            <p class="card-text text-truncate"><?= $result->message ?></p>
            <a href="Parents/noticeboard_details&id=<?= $result->id_news; ?>" class="btn btn-confirm btn-wide">Read More</a>
          </div>
          </div>
      <?php } ?>
      </div>
    </div>
</main>
