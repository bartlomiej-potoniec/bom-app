<?php require_once APP_ROOT . '/Views/templates/header.php' ?>

    <table>
        <thead>
            <tr>
                <th>Numer części</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Cena jednostkowa</th>
                <th>Opcje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['parts'] as $part): ?>
                <tr>
                    <td><a href="<?= URL_ROOT . '/parts/edit/' . $part->getId() ?>"><?= $part->getNumber() ?></a></td>
                    <td><?= $part->getName() ?></td>
                    <td><?= $part->getDescription() === null ? 'Brak opisu' : $part->getDescription() ?></td>
                    <td><?= $part->getPrice() === null ? 'Brak ceny' : $part->getPrice() . 'zł.' ?></td>
                    <td>
                        <a href="<?= URL_ROOT . '/parts/details/' . $part->getId() ?>">Szczegóły</a>
                        <a href="<?= URL_ROOT . '/parts/edit/' . $part->getId() ?>">Edytuj</a>
                        <a href="<?= URL_ROOT . '/parts/delete/' . $part->getId() ?>">Usuń</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php require_once APP_ROOT . '/Views/templates/footer.php' ?>