<nav class="container-fluid border border-dark">
    <div class="row align-items-center">
        <div class="col p-3">
            <!-- logo -->
            <a href="<?=  site_url('/') ?>">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="CigBurger Logo">
            </a>
        </div>
        <div class="col p-3 pe-5 d-flex flex-row justify-content-end">
            <div><a href="<?=  site_url('/') ?>" class="nav-link ms-5">Início</a></div>
            <div><a href="<?=  site_url('products') ?>" class="nav-link ms-5">Produtos</a></div>
            <div><a href="<?=  site_url('where') ?>" class="nav-link ms-5">Onde Encontrar?</a></div>
        </div>
    </div>
</nav>