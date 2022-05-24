<?php
$total = getTotalProducts();
?>

<div class="container">
    <div class="row">
        <div class="col p-5">
            <div class="card border-success text-center mb-3" style="max-width: 18rem;">
                <div class="card-header">PRODUCTS</div>
                <div class="card-body text-success">
                    <h5 class="card-title">CURRENT</h5>
                    <p class="card-text"><?php echo $total; ?></p>
                </div>
            </div>
        </div>
        <div class="col p-5">
            <div class="card border-success text-center  mb-3" style="max-width: 18rem;">
                <div class="card-header">USERS</div>
                <div class="card-body text-success">
                    <h5 class="card-title">CURRENT USERS</h5>
                    <p class="card-text">0</p>
                </div>
            </div>
        </div>
    </div>
</div>