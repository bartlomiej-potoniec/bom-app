<?php require_once APP_ROOT . '/Views/templates/header.php' ?>

    <h2>Details for "<?= $data['part']->getName() ?>"</h2>

    <ul>
        <li>Numer części: <?= $data['part']->getNumber() ?></li>
        <li>Nazwa części: <?= $data['part']->getName() ?></li>
        <li>Pełny Opis: <?= $data['part']->getDescription() === null ? 'Brak opisu' : $data['part']->getDescription() ?></li>
        <li>Cena jednostkowa: <?= $data['part']->getPrice() === null ? 'Brak ceny' : $data['part']->getPrice() ?></li>
    </ul>

<?php require_once APP_ROOT . '/Views/templates/footer.php' ?>