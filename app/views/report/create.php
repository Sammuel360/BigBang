<?php include_once '../app/views/layout/header.php'; ?>
<h2>Reportar um Problema</h2>
<form action="/report/create" method="post" enctype="multipart/form-data">
    <label for="description">Descrição:</label>
    <textarea name="description" required></textarea>

    <label for="location">Localização:</label>
    <input type="text" name="location" required>

    <label for="image">Imagem:</label>
    <input type="file" name="image" accept="image/*">

    <button type="submit">Enviar</button>
</form>
<?php include_once '../app/views/layout/footer.php'; ?>
