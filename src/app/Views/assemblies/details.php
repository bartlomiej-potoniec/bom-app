<?php require_once APP_ROOT . '/Views/templates/header.php' ?>

    <h2>Szczegóły dla <?= $data['assembly']->getName() ?></h2>

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
            <?php foreach($data['assemblyParts'] as $part): ?>
                <tr>
                    <td><a href="#"><?= $part->getNumber() ?></a></td>
                    <td><?= $part->getName() ?></td>
                    <td><?= $part->getDescription() === null ? 'Brak opisu' : $part->getDescription() ?></td>
                    <td><?= $part->getPrice() === null ? 'Brak ceny' : $part->getPrice() . 'zł.' ?></td>
                    <td>
                        <a href="#" class="delete-link">Usuń ze złożenia</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <hr>

    <h3>Dodaj część do złożenia</h3>

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
            <?php foreach($data['unasignedParts'] as $part): ?>
                <tr>
                    <td><a href="#"><?= $part->getNumber() ?></a></td>
                    <td><?= $part->getName() ?></td>
                    <td><?= $part->getDescription() === null ? 'Brak opisu' : $part->getDescription() ?></td>
                    <td><?= $part->getPrice() === null ? 'Brak ceny' : $part->getPrice() . 'zł.' ?></td>
                    <td>
                        <a href="#" class="delete-link">Dodaj do złożenia</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


<?php require_once APP_ROOT . '/Views/templates/footer.php' ?>