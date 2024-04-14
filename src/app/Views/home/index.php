<?php foreach($data['parts'] as $part): ?>
    <div>
        <p>Numer części: <?= $part->number ?>
        <p>Nazwa: <?= $part->name ?>
        <p>Opis: <?= $part->description ?>
        <p>Cena jednostkowa: <?= $part->price ?>
    </div>
<?php endforeach; ?>