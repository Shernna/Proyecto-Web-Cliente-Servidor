$(document).ready(function () {
    // Crear
    $('#calcularBtn').on('click', function () {
        const salarioBruto = $('#salarioInput').val();
        if (salarioBruto) {
            const salarioNeto = salarioBruto * 0.10; 
            $('#resultado').text(`El salario neto es: ${salarioNeto.toFixed(2)}`);
        } else {
            alert('Por favor, ingrese un salario bruto válido.');
        }
    });

    $('.delete-btn').on('click', function (e) {
        e.preventDefault(); // Evita el envío del formulario
        if (confirm('¿Estás seguro de que deseas eliminar esta solicitud?')) {
            const id = $(this).data('id');
            $.post('eliminar.php', { id: id }, function (response) {
                alert('Solicitud eliminada correctamente.');
                location.href = 'index.php';
            }).fail(function () {
                alert('Error al eliminar la solicitud.');
            });
        }
    });
    
});
