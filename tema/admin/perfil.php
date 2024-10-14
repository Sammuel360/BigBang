    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil - Fiscal Cidadão</title>
        <link rel="stylesheet" href="perfil.css"> <!-- Ajuste o caminho conforme necessário -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Para ícones -->
    </head>

    <body>
        <div class="menu-toggle" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>

        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Fiscal Cidadão</h3>
            </div>
            <ul class="list-unstyled components">
                <li><a href="dahsboard.php">🏠 Início</a></li>
                <li><a href="status.php">📊 Status</a></li>
                <li><a href="notificacoes.php">🔔 Notificações</a></li>
                <li><a href="recompensas.php">🎁 Recompensas</a></li>
                <li><a href="perfil.php">👤 Perfil</a></li>
                <li><a href="configuracoes.php">⚙️ Configurações</a></li>
                <li><a href="ajuda.php">❓ Ajuda</a></li>
                <li><a href="chamados.php">📝 Chamados</a></li>
            </ul>
        </nav>

        <div class="content">
            <h1>Meu Perfil</h1>
            <div class="profile-container">
                <div class="profile-header">
                    <div class="profile-picture">
                        <img src="path_to_your_image.jpg" alt="Profile Picture">
                        <button class="upload-btn">Upload new image</button>
                    </div>
                    <div class="account-details">
                        <h2>Detalhes da Conta</h2>
                        <form>
                            <div class="form-group">
                                <label for="username">Nome de usuário:</label>
                                <input type="text" id="username" name="username" value="username" required>
                            </div>
                            <div class="form-group">
                                <label for="first-name">Primeiro Nome:</label>
                                <input type="text" id="first-name" name="first-name" value="Valerie" required>
                            </div>
                            <div class="form-group">
                                <label for="last-name">Sobrenome:</label>
                                <input type="text" id="last-name" name="last-name" value="Luna" required>
                            </div>
                            <div class="form-group">
                                <label for="location">Localização:</label>
                                <input type="text" id="location" name="location" value="San Francisco, CA">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" id="email" name="email" value="name@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Telefone:</label>
                                <input type="text" id="phone" name="phone" value="555-123-4567">
                            </div>
                            <div class="form-group">
                                <label for="birthday">Aniversário:</label>
                                <input type="date" id="birthday" name="birthday" value="1988-06-10">
                            </div>
                            <button type="submit" class="save-btn">Salvar alterações</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>