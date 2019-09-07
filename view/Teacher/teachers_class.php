<div class="pt-3 pb-2 mb-3 border-bottom text-center">
    <h1 class="h2">Choose a class</h1>
</div>

<div class="pt-5 d-flex flex-wrap  justify-content-center">
<?php 
$classes = $data['class'];
foreach($classes as $class): ?>
    <a href="Teacher/classes&class=<?php echo $class->id_cl; ?>">
    <div class="card m-0 main-card animated mb-2 p-2 bd-highlight">
        <div class="card-body text-center m-0">
        <span><i class="material-icons card-icon">school</i></span>
        </div>
        <div class="card-footer bg-transparent text-center">
        <h3><?php echo $class->class; ?></h3>
        </div>
    </div>
    </a>
<?php endforeach;
?>
</div>

</main>
