<div class="prestamos-container">
    <div class="prestamos-header">
        <h1>Gestión de Préstamos</h1>
        <p>Administración de préstamos de libros</p>
    </div>

    <div class="prestamos-actions">
        <button class="btn-primary" id="nuevoPrestamo">
            <i class="fas fa-plus"></i>
            Nuevo Préstamo
        </button>
        <div class="search-bar">
            <input type="text" id="searchPrestamo" placeholder="Buscar préstamo...">
            <i class="fas fa-search"></i>
        </div>
    </div>

    <div class="prestamos-filters">
        <select id="filterStatus">
            <option value="todos">Todos los estados</option>
            <option value="activo">Activos</option>
            <option value="vencido">Vencidos</option>
            <option value="devuelto">Devueltos</option>
        </select>
        <select id="filterPeriod">
            <option value="todos">Todos los períodos</option>
            <option value="hoy">Hoy</option>
            <option value="semana">Esta semana</option>
            <option value="mes">Este mes</option>
        </select>
    </div>

    <div class="prestamos-list">
        <table id="prestamosTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estudiante</th>
                    <th>Libro</th>
                    <th>Fecha Préstamo</th>
                    <th>Fecha Devolución</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="prestamosTableBody">
                <!-- Data will be populated via JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para nuevo préstamo -->
<div class="modal" id="prestamoModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Nuevo Préstamo</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <form id="prestamoForm">
                <div class="form-group">
                    <label for="estudiante">Estudiante:</label>
                    <select id="estudiante" required>
                        <option value="">Seleccionar estudiante...</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="libro">Libro:</label>
                    <select id="libro" required>
                        <option value="">Seleccionar libro...</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fechaPrestamo">Fecha de Préstamo:</label>
                    <input type="date" id="fechaPrestamo" required>
                </div>
                <div class="form-group">
                    <label for="fechaDevolucion">Fecha de Devolución:</label>
                    <input type="date" id="fechaDevolucion" required>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-primary">Guardar</button>
                    <button type="button" class="btn-secondary" id="cancelarPrestamo">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>