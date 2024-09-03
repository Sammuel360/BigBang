<?php include_once '../app/views/layout/header.php'; ?>
<h2>Detalhes do Relato</h2>
<p><strong>Descrição:</strong> <?= $data['description']; ?></p>
<p><strong>Localização:</strong> <?= $data['location']; ?></p>
<p><strong>Status:</strong> <?= $data['status']; ?></p>
<img src="/images/<?= $data['image']; ?>" alt="Imagem do Problema">
<?php include_once '../app/views/layout/footer.php'; ?>
