<main role="main" class="m-auto px-5 main">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div class="input-group mb-3 col-12  pl-0 pr-0">
      <div class="input-group-prepend d-block col-12 pl-0 pr-0">
        <a href="Admin/noticeboard_admin" class="p-2 ml-3 btn-back float-left" role="button">Back</a>
      </div> 
    </div>
    </div>
    
    <div>
      <div>
      <div class="w-75 ml-auto mr-auto card custom-card border-dark mb-4">
          <div class="card-header card-header-notice">
            <?php $results=$data["notice"]; ?>
            <h4 class="card-title text-center text-light mb-0"><?php echo $results->{'title'}; ?></h4>
          </div>
            <div class="card-body">
            <small class="mb-3 d-block text-muted">Posted on: <?php echo $results->{'date'}; ?></small>
              <hr>
              <p class="card-text"><?php echo $results->{'message'}; ?></p>
            </div>
          </div>
      </div>
    </div>
</main>
