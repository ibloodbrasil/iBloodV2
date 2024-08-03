<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $this->renderSection('title') ?> | <?=env('app.name')?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?= $this->renderSection('pageStyles') ?>
    <?= link_tag('assets/css/root.css?' . asset_version()); ?>
</head>

<body class="body-public">
    <main role="main" class="container">
        <?= $this->renderSection('main') ?>
    </main>
<?= $this->renderSection('pageScripts') ?>
<?= script_tag('assets/js/main.js?' . asset_version()); ?>
</body>
</html>
