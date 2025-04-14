document.addEventListener('DOMContentLoaded', function() {
    const calendarioGrid = document.getElementById('calendarioGrid');
    const currentMonthElement = document.getElementById('currentMonth');
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');

    let currentDate = new Date();

    function generarCalendario(date) {
        const firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        
        currentMonthElement.textContent = date.toLocaleString('es-ES', { month: 'long', year: 'numeric' });
        
        calendarioGrid.innerHTML = '';

        // Agregar días de la semana
        const diasSemana = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];
        diasSemana.forEach(dia => {
            const diaElement = document.createElement('div');
            diaElement.className = 'calendario-dia dia-semana';
            diaElement.textContent = dia;
            calendarioGrid.appendChild(diaElement);
        });

        // Agregar espacios vacíos antes del primer día
        for(let i = 0; i < firstDay.getDay(); i++) {
            const emptyDay = document.createElement('div');
            emptyDay.className = 'calendario-dia empty';
            calendarioGrid.appendChild(emptyDay);
        }

        // Agregar días del mes
        for(let i = 1; i <= lastDay.getDate(); i++) {
            const diaElement = document.createElement('div');
            diaElement.className = 'calendario-dia';
            if(i === currentDate.getDate() && date.getMonth() === currentDate.getMonth()) {
                diaElement.classList.add('today');
            }
            
            const numeroElement = document.createElement('div');
            numeroElement.className = 'dia-numero';
            numeroElement.textContent = i;
            
            diaElement.appendChild(numeroElement);
            calendarioGrid.appendChild(diaElement);
        }
    }

    prevMonthBtn.addEventListener('click', () => {
        currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1);
        generarCalendario(currentDate);
    });

    nextMonthBtn.addEventListener('click', () => {
        currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1);
        generarCalendario(currentDate);
    });

    // Generar calendario inicial
    generarCalendario(currentDate);
});