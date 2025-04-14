<div class="sidebar">
    <div class="sidebar-header">
        <h2>CIDY Bibliotecas</h2>
        <p class="subtitle">Sistema de Gestión Bibliotecaria</p>
    </div>
    
    <nav class="sidebar-nav">
        <div class="nav-section">
            <h3>Principal</h3>
            <ul>
                <li>
                    <?php $controladorObj->inicio(); ?>
                </li>
                <li>
                    <?php $controladorObj->catalogo(); ?>
                </li>
            </ul>
        </div>

        <div class="nav-section">
            <h3>Gestión</h3>
            <ul>
                <li>
                    <?php $controladorObj->prestamos(); ?>
                </li>
                <li>
                    <?php $controladorObj->estudiantes(); ?>
                </li>
            </ul>
        </div>

        <div class="nav-section">
            <h3>Recursos</h3>
            <ul>
                <li>
                    <?php $controladorObj->recursos(); ?>
                </li>
                <li>
                    <?php $controladorObj->calendario(); ?>
                </li>
            </ul>
        </div>
    </nav>

    <div class="sidebar-footer">
        <div class="user-info">
            <i class="fas fa-user-circle"></i>
            <span><?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Usuario'; ?></span>
        </div>
        <?php $controladorObj->logout(); ?>
    </div>
</div>
