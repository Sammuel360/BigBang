<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abrir Chamado</title>
    <link rel="stylesheet" href="chama.css"> <!-- Substituir pelo seu arquivo de estilo -->
</head>

<body>
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Fiscal Cidadão</h3>
        </div>
        <ul class="list-unstyled components">
            <li><a href="graficos.php">🏠 Início</a></li>
            <li><a href="status.php">📊 Status</a></li>
            <li><a href="notificacoes.php">🔔 Notificações</a></li>
            <li><a href="recompensas.php">🎁 Recompensas</a></li>
            <li><a href="perfil.php">👤 Perfil</a></li>
            <li><a href="configuracoes.php">⚙️ Configurações</a></li>
            <li><a href="ajuda.php">❓ Ajuda</a></li>
            <li><a href="chamados.php">📝 Chamados</a></li>
        </ul>
    </nav>

    <div id="content">
        <nav class="navbar">
            <button id="sidebarCollapse" class="btn btn-info">☰</button>
            <h2>Rede Social - Fiscal Cidadão</h2>
        </nav>

        <div class="container">
            <h2 class="form-title">Abrir Novo Chamado</h2>
            <form action="index.php?c=chamado&a=inserir" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titulo">Título do Chamado:</label>
                    <input type="text" id="titulo" name="titulo" class="input-text" placeholder="Digite o título"
                        required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição do Problema:</label>
                    <textarea id="descricao" name="descricao" rows="4" class="input-text"
                        placeholder="Descreva o problema" required></textarea>
                </div>

                <div class="form-group">
                    <label for="anexo">Anexar Arquivo:</label>
                    <input type="file" id="anexo" name="anexo" class="input-file">
                </div>

                <button type="submit" class="btn-submit">Enviar Chamado</button>
            </form>
        </div>
    </div>

    <script>
    document.getElementById('sidebarCollapse').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('active');
    });
    </script>
</body>

</html>