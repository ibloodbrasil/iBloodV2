<?= $this->extend('layouts/layout_main') ?>

<?= $this->section('conteudo') ?>

<section class="container-fluid border border-dark">
    <div class="row">
        <div class="col text-center p-5">
            <div class="mb-5">
                <img src="<?= base_url('assets/images/main_burger_01.png') ?>" alt="The best burger in the world" class="img-fluid">
            </div>
            <div class="text-center">
                <h3 class="mb-5">Deliciosos e com grandes descontos!</h3>
                <a class="btn-products" href="<?=  site_url('products') ?>">Produtos</a>
            </div>
        </div>
        <div class="col text-center p-5">
            <img src="<?= base_url('assets/images/main_burger_02.png') ?>" alt="The best burger in the world">
        </div>
    </div>
</section>

<?= $this->endSection() ?>