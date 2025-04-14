<div class="calendario-container">
    <div class="calendario-header">
        <h1>Calendario de CIDY Bibliotecas</h1>
        <p>Gestión de eventos, préstamos y devoluciones</p>
    </div>

    <div class="calendario-controls">
        <button class="btn-control" id="prevMonth">
            <i class="fas fa-chevron-left"></i>
        </button>
        <h2 id="currentMonth">Mes Actual</h2>
        <button class="btn-control" id="nextMonth">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>

    <div class="calendario-grid" id="calendarioGrid">
        <!-- Calendar will be generated via JavaScript -->
    </div>

    <div class="eventos-lista">
        <h3>Eventos del Día</h3>
        <div id="eventosDia" class="eventos-container">
            <!-- Events will be populated via JavaScript -->
        </div>
    </div>

    <div class="calendario-actions">
        <button class="btn-action" id="addEvento">
            <i class="fas fa-plus"></i>
            Nuevo Evento
        </button>
        <button class="btn-action" id="verPrestamos">
            <i class="fas fa-book"></i>
            Ver Préstamos
        </button>
    </div>
</div>