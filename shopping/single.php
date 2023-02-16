<?php require('../includes/header.php'); ?>
<?php require('../config/config.php'); ?>

<?php

if (isset($_POST['submit'])) {

    $pro_id = $_POST['pro_id'];
    $pro_name = $_POST['pro_name'];
    $pro_image = $_POST['pro_image'];
    $pro_price = $_POST['pro_price'];
    $pro_amount = $_POST['pro_amount'];
    $pro_file = $_POST['pro_file'];
    $user_id = $_POST['user_id'];

    $insert = $conn->prepare("INSERT INTO panier (pro_id, pro_name, pro_image, pro_price, pro_amount, pro_file, user_id) VALUES (:pro_id, :pro_name, :pro_image, :pro_price, :pro_amount, :pro_file, :user_id)");
        $insert->execute([
            ':pro_id'    => $pro_id,
            ':pro_name'       => $pro_name,
            ':pro_image'  => $pro_image,
            ':pro_price'  => $pro_price,
            ':pro_amount'  => $pro_amount,
            ':pro_file'  => $pro_file,
            ':user_id'  => $user_id,
        ]);
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $row = $conn->query("SELECT * FROM products WHERE status = 1 AND id = '$id'");
    $row->execute();

    $product = $row->fetch(PDO::FETCH_OBJ);
} else {
    echo "404";
}

?>

<div class="row d-flex justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <div class="images p-3">
                        <div class="text-center p-4"> <img id="main-image" src="<?php echo bookstore; ?>/images/<?php echo $product->image; ?>" width="250" /> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center"> <a href="<?php echo bookstore; ?>" class="ml-1 btn btn-primary"><i class="fa fa-long-arrow-left"></i> Retour</a> </div> <i class="fa fa-shopping-cart text-muted"></i>
                        </div>
                        <div class="mt-4 mb-3">
                            <h5 class="text-uppercase"><?php echo $product->name; ?></h5>
                            <div class="price d-flex flex-row align-items-center"> <span class="act-price">$<?php echo $product->price; ?></span>
                            </div>
                        </div>
                        <p class="about"><?php echo $product->description; ?></p>

                        <form action="" method="post" id="form-data">
                            <div class="">
                                <input type="text" name="pro_id" class="form-control" value="<?php echo $product->id; ?>" name="email">
                            </div>
                            <div class="">
                                <input type="text" name="pro_name" class="form-control" value="<?php echo $product->name; ?>" name="email">
                            </div>
                            <div class="">
                                <input type="text" name="pro_image" class="form-control" value="<?php echo $product->image; ?>" name="email">
                            </div>
                            <div class="">
                                <input type="text" name="pro_price" class="form-control" value="<?php echo $product->price; ?>" name="email">
                            </div>
                            <div class="">
                                <input type="text" name="pro_amount" class="form-control" value="1" name="email">
                            </div>
                            <div class="">
                                <input type="text" name="pro_file" class="form-control" value="<?php echo $product->file; ?>" name="email">
                            </div>
                            <div class="">
                                <input type="text" name="user_id" class="form-control" value="<?php echo $_SESSION['user_id']; ?>" name="email">
                            </div>

                            <div class="cart mt-4 align-items-center">
                                <button type="submit" name="submit" class="btn btn-primary text-uppercase mr-2 px-4"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('../includes/footer.php'); ?>

<script>
    $(document).ready(function() {
        $(document).on("submit", function(e) {
            var formdata = $("#form-data").serialize()+"&submit=submit";
            $.ajax({
                type: "post",
                url: "single.php?id=<?php echo $id; ?>",
                data: formdata,
                success: function(){
                    alert('ajouté au panier avec succes');
                }
            });
        })
    });
</script>