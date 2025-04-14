document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('prestamoModal');
    const btnNuevo = document.getElementById('nuevoPrestamo');
    const btnCancelar = document.getElementById('cancelarPrestamo');
    const span = document.getElementsByClassName('close')[0];
    const prestamoForm = document.getElementById('prestamoForm');
    const searchInput = document.getElementById('searchPrestamo');
    const filterStatus = document.getElementById('filterStatus');
    const filterPeriod = document.getElementById('filterPeriod');

    // Open modal
    btnNuevo.onclick = function() {
        modal.style.display = "block";
    }

    // Close modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    btnCancelar.onclick = function() {
        modal.style.display = "none";
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Form submission
    prestamoForm.onsubmit = function(e) {
        e.preventDefault();
        // Add your form submission logic here
        modal.style.display = "none";
    }

    // Search functionality
    searchInput.addEventListener('input', function(e) {
        // Add your search logic here
    });

    // Filters
    filterStatus.addEventListener('change', function(e) {
        // Add your status filter logic here
    });

    filterPeriod.addEventListener('change', function(e) {
        // Add your period filter logic here
    });

    // Initial load of prestamos
    loadPrestamos();
});

function loadPrestamos() {
    // Add your logic to load prestamos from the backend
    // This is where you'll make an AJAX call to your PHP backend
}

function formatDate(date) {
    return new Date(date).toLocaleDateString('es-ES');
}

function updatePrestamosList(prestamos) {
    const tbody = document.getElementById('prestamosTableBody');
    tbody.innerHTML = '';

    prestamos.forEach(prestamo => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${prestamo.id}</td>
            <td>${prestamo.estudiante}</td>
            <td>${prestamo.libro}</td>
            <td>${formatDate(prestamo.fechaPrestamo)}</td>
            <td>${formatDate(prestamo.fechaDevolucion)}</td>
            <td><span class="estado-${prestamo.estado.toLowerCase()}">${prestamo.estado}</span></td>
            <td>
                <button onclick="verPrestamo(${prestamo.id})" class="btn-action">
                    <i class="fas fa-eye"></i>
                </button>
                <button onclick="editarPrestamo(${prestamo.id})" class="btn-action">
                    <i class="fas fa-edit"></i>
                </button>
                <button onclick="devolverPrestamo(${prestamo.id})" class="btn-action">
                    <i class="fas fa-check"></i>
                </button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}