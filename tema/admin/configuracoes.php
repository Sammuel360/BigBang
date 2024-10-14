<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="conf.css">
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
        <header>
            <h1>SB Admin Pro</h1>
            <nav>
                <ul>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Billing</a></li>
                    <li><a href="#">Security</a></li>
                    <li><a href="#">Notifications</a></li>
                </ul>
            </nav>
            <div class="search-bar">
                <input type="text" placeholder="Search">
            </div>
            <div class="user-icon">
                <img src="user-icon.png" alt="User Icon">
            </div>
        </header>
        <main>
            <div class="profile-picture">
                <img src="placeholder.png" alt="Profile Picture">
                <button>Upload new image</button>
                <p>JPG or PNG no larger than 5 MB</p>
            </div>
            <div class="account-details">
                <form>
                    <label for="username">Username (how your name will appear to other users on the site)</label>
                    <input type="text" id="username" name="username" value="username">

                    <label for="first-name">First name</label>
                    <input type="text" id="first-name" name="first-name" value="Valerie">

                    <label for="last-name">Last name</label>
                    <input type="text" id="last-name" name="last-name" value="Luna">

                    <label for="organization-name">Organization name</label>
                    <input type="text" id="organization-name" name="organization-name" value="Start Bootstrap">

                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" value="San Francisco, CA">

                    <label for="email">Email address</label>
                    <input type="email" id="email" name="email" value="name@example.com">

                    <label for="phone-number">Phone number</label>
                    <input type="tel" id="phone-number" name="phone-number" value="555-123-4567">

                    <label for="birthday">Birthday</label>
                    <input type="date" id="birthday" name="birthday" value="1988-06-10">

                    <button type="submit">Save changes</button>
                </form>
            </div>
        </main>
        <footer>
            <p>Copyright © Your Website 2021</p>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
        </footer>
    </div>
</body>

</html>