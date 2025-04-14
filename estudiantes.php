<div class="estudiantes-container">
    <div class="estudiantes-header">
        <h1>Gestión de Estudiantes</h1>
        <p>Administración de usuarios de la biblioteca</p>
    </div>

    <div class="estudiantes-actions">
        <button class="btn-primary" id="nuevoEstudiante">
            <i class="fas fa-user-plus"></i>
            Nuevo Estudiante
        </button>
        <div class="search-bar">
            <input type="text" id="searchEstudiante" placeholder="Buscar estudiante...">
            <i class="fas fa-search"></i>
        </div>
    </div>

    <div class="estudiantes-filters">
        <select id="filterGrado">
            <option value="todos">Todos los grados</option>
            <option value="1">Primer Grado</option>
            <option value="2">Segundo Grado</option>
            <option value="3">Tercer Grado</option>
            <option value="4">Cuarto Grado</option>
            <option value="5">Quinto Grado</option>
        </select>
        <select id="filterEstado">
            <option value="todos">Todos los estados</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
    </div>

    <div class="estudiantes-list">
        <table id="estudiantesTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Grado</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Préstamos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="estudiantesTableBody">
                <!-- Data will be populated via JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para nuevo/editar estudiante -->
<div class="modal" id="estudianteModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Nuevo Estudiante</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <form id="estudianteForm">
                <div class="form-group">
                    <label for="nombre">Nombre Completo:</label>
                    <input type="text" id="nombre" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="grado">Grado:</label>
                        <select id="grado" required>
                            <option value="">Seleccionar grado...</option>
                            <option value="1">Primer Grado</option>
                            <option value="2">Segundo Grado</option>
                            <option value="3">Tercer Grado</option>
                            <option value="4">Cuarto Grado</option>
                            <option value="5">Quinto Grado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="grupo">Grupo:</label>
                        <input type="text" id="grupo" maxlength="1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <textarea id="direccion" rows="2"></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-primary">Guardar</button>
                    <button type="button" class="btn-secondary" id="cancelarEstudiante">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>