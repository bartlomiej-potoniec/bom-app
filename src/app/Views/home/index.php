
<table>
    <thead>
        <tr>
            <th>Numer złożenia</th>
            <th>Nazwa</th>
            <th>Opis</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['parts'] as $part): ?>
            <tr>
                <td><?= $part->getNumber() ?></td>
                <td><?= $part->getName() ?></td>
                <td><?= $part->getDescription() ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>