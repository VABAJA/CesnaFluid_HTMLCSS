// GUARDA LA INFORMACIÓN DE VACUM EN JSON



// GRÁFICAS 
const ctx = document.getElementById('myChart');

const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets: [{
            label: 'Litros Consumidos',
            data: [12, 19, 3, 5, 2, 3, 10, 17, 1, 2, 9, 10],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)'

            ],
            borderColor: [
                'rgba(54, 162, 235, 1)'

            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

