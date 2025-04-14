<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h1>CIDY Bibliotecas</h1>
            <p>Sistema de Gestión Bibliotecaria</p>
        </div>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <?php 
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>

        <form action="index.php?controlador=usuarios&accion=login" method="POST" class="auth-form">
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" required>
            </div>

            <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <div class="password-input">
                    <input type="password" id="contraseña" name="contraseña" required>
                    <i class="fas fa-eye toggle-password"></i>
                </div>
            </div>

            <button type="submit" class="btn-primary">
                <i class="fas fa-sign-in-alt"></i>
                Iniciar Sesión
            </button>
        </form>

        <div class="auth-footer">
            <p>¿No tienes una cuenta? <a href="#" id="showRegister">Regístrate</a></p>
        </div>
    </div>

    <!-- Modal de Registro -->
    <div class="modal" id="registerModal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <div class="auth-header">
                <h2>Registro de Usuario</h2>
                <p>Completa el formulario para crear tu cuenta</p>
            </div>

            <form action="index.php?controlador=usuarios&accion=registro" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="reg-nombre">Nombre</label>
                    <input type="text" id="reg-nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="reg-apellido">Apellido</label>
                    <input type="text" id="reg-apellido" name="apellido" required>
                </div>

                <div class="form-group">
                    <label for="reg-correo">Correo Electrónico</label>
                    <input type="email" id="reg-correo" name="correo" required>
                </div>

                <div class="form-group">
                    <label for="reg-contraseña">Contraseña</label>
                    <div class="password-input">
                        <input type="password" id="reg-contraseña" name="contraseña" required>
                        <i class="fas fa-eye toggle-password"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="reg-confirmar">Confirmar Contraseña</label>
                    <div class="password-input">
                        <input type="password" id="reg-confirmar" name="confirmar_contraseña" required>
                        <i class="fas fa-eye toggle-password"></i>
                    </div>
                </div>

                <button type="submit" class="btn-primary">
                    <i class="fas fa-user-plus"></i>
                    Registrarse
                </button>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal functionality
        const modal = document.getElementById('registerModal');
        const showRegister = document.getElementById('showRegister');
        const closeModal = document.querySelector('.close-modal');

        showRegister.onclick = function(e) {
            e.preventDefault();
            modal.classList.add('active');
        }

        closeModal.onclick = function() {
            modal.classList.remove('active');
        }

        window.onclick = function(e) {
            if (e.target == modal) {
                modal.classList.remove('active');
            }
        }

        // Password toggle functionality
        document.querySelectorAll('.toggle-password').forEach(function(toggle) {
            toggle.addEventListener('click', function() {
                const input = this.previousElementSibling;
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    });
    </script>
    <script src="/mvc/vistas/js/auth.js"></script>