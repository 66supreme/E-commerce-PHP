   <?php require('includes/header.php'); ?>
   <?php require('./config/config.php'); ?>

   <?php

    $row = $conn->query("SELECT * FROM products WHERE status = 1");
    $row->execute();

    $allRow = $row->fetchAll(PDO::FETCH_OBJ);

    ?>

   <div class="row mt-5">

       <?php foreach ($allRow as $produt) : ?>

           <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
               <div class="card">
                   <img height="213px" class="card-img-top" src="images/<?php echo $produt->image ?>">
                   <div class="card-body">
                       <h5 class="d-inline"><b><?php echo $produt->name ?></b> </h5>
                       <h5 class="d-inline">
                           <div class="text-muted d-inline">($<?php echo $produt->price ?>/item)</div>
                       </h5>
                       <p><?php echo $produt->description ?></p>
                       <a href="#" class="btn btn-primary w-100 rounded my-2"> More<i class="fas fa-arrow-right"></i> </a>
                   </div>
               </div>
           </div>
       <?php endforeach; ?>
   </div>
   <?php require('includes/footer.php'); ?>