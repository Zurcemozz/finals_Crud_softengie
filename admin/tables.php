<div class="row">
    <div class="col-sm-8  shadow-sm p-3 mb-5 bg-white rounded ">

        <div class="d-flex justify-content-between align-items-center ">
            <h3>Products</h3>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Product
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="model.php" method="POST" enctype="multipart/form-data">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" name="product_name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Price</label>
                                    <input type="number" name="product_price" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Description</label>
                                    <input type="text" name="product_desc" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="product_image" accept=".jpg, .png , .svg" required class="form-control productImage">
                                </div>
                                <button type="submit" name="addProduct" class="btn btn-primary">Add Product</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>



        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $sql->fetch_assoc()) { ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td> <?php echo $row['product_name']; ?> </td>
                            <td> <?php echo $row['product_price'] ?> </td>
                            <td><img class="product_Image" src="<?php echo '../products/' . $row['product_image']; ?> " alt="" srcset=""></td>
                            <td>
                                <a class="btn editBTN btn-primary" href="?edit=<?php echo $row['id'] ?>">Edit</a>
                                <button class="btn btn-danger" onclick="confirm_rem(<?php echo $row['id'] ?>)">Delete</button>
                            </td>

                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
            </table>
        </div>



        <div class="modal fade" id="editproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="model.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" id="editname" name="product_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Price</label>
                                <input type="number" min="1" id="editprice" name="product_price" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Product Description</label>
                                <textarea class="form-control " id="editdesc" required name="product_desc" aria-label="With textarea"></textarea>
                            </div>

                            <img src="" id="editimg" height="100" class=" p-2" alt="">
                            <div class="input-group ">
                                <label class="input-group-text">Image</label>
                                <input type="file" name="image" accept=".jpg, .png , .svg" class="form-control">
                            </div>
                            <input type="hidden" name="editid" id="editid">

                        </div>

                        <div class="modal-footer">`

                            <button type="submit" name="editproduct" class="btn btn-primary">Edit </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-sm-4 shadow-sm p-3 mb-5 bg-white rounded">
        <h3>Users</h3>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<?php
if (isset($_GET['edit']) && $_GET['edit'] > 0) {
    $con = connection();
    $sql = $con->query("SELECT * FROM product_table WHERE `id`='$_GET[edit]' ");
    $row = $sql->fetch_assoc();
    echo
    "<script>
        var editproduct = new bootstrap.Modal(document.getElementById('editproduct'), {
            keyboard: false
          })
        editproduct.show();


        document.querySelector('#editname').value=`$row[product_name]`
        document.querySelector('#editprice').value=`$row[product_price]`
        document.querySelector('#editdesc').value=`$row[product_desc]`
        document.querySelector('#editid').value=`$_GET[edit]`
        document.querySelector('#editimg').src=`./products/$row[product_image]`
  
        
   
        </script>";
}

?>

<script>
    function confirm_rem(id) {
        if (confirm("Are you sure you want to delete this item?")) {
            window.location.href = "model.php?rem=" + id;
        }

    }
</script>