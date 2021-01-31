<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Jacket</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $jacket['pictures']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $jacket['name']; ?></h5>
                            <p class="card-text"><b>Price : </b>Rp.<?= $jacket['product_price']; ?></p>
                            <p class="card-text"><b>Code : </b><?= $jacket['product_code']; ?></small></p>
                            <p class="card-text"><b>Details :</b>
                            <ul>
                                <li>Full zip with storm flap</li>
                                <li>94% nylon, 6% elastane ripstop</li>
                                <li>Long hooded jacket</li>
                                <li>Chest zip pocket</li>
                                <li>Front pockets</li>
                            </ul>
                            </p>

                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                            <br><br>
                            <a href="/jacket">back to the jacket list</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>