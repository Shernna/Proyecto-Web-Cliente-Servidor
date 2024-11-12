function Volver()
{
	window.location.href = "./IniciarSesion.html"
}

const medicos = [
    { nombre: "Dr. Adrian Rojas", especialidad: "dermatologia", ubicacion: "san_jose" },
    { nombre: "Dra. Rachel Cortes", especialidad: "odontologia", ubicacion: "heredia" },
    { nombre: "Dr. Alejandro Arguedas", especialidad: "pediatria", ubicacion: "alajuela" },
    { nombre: "Dra. Shernna Corrales", especialidad: "psicologia", ubicacion: "cartago" },
    { nombre: "Dr. Luis Martinez", especialidad: "cardiologia", ubicacion: "cartago" },
];


function Buscar(event) {
    event.preventDefault();


    const especialidadSeleccionada = document.getElementById("especialidad").value;
    const ubicacionSeleccionada = document.getElementById("ubicacion").value;

    const resultados = medicos.filter(medico =>
        medico.especialidad === especialidadSeleccionada &&
        medico.ubicacion === ubicacionSeleccionada
    );


    const listaMedicos = document.getElementById("listaMedicos");
    listaMedicos.innerHTML = "";

    if (resultados.length > 0) {
        resultados.forEach(medico => {
            const medicoDiv = document.createElement("div");
            medicoDiv.classList.add("medico");
            medicoDiv.innerHTML = `<strong>${medico.nombre}</strong><br>
                                   Especialidad: ${medico.especialidad}<br>
                                   Ubicacion: ${medico.ubicacion}<br><br>`;
            listaMedicos.appendChild(medicoDiv);
        });
    } else {
        listaMedicos.innerHTML = "<p>No se encontraron medicos que coincidan con los criterios seleccionados.</p>";
    }
}

function mostrarResumen(event) {

    event.preventDefault();

    const identificacion = document.getElementById('identificacion').value;
    const nombre = document.getElementById('nombre').value;
    const apellidos = document.getElementById('apellidos').value;
    const edad = document.getElementById('edad').value;
    const fecha = document.getElementById('fecha').value;

    const resumen = `
        <strong>Identificación:</strong> ${identificacion}<br>
        <strong>Nombre:</strong> ${nombre}<br>
        <strong>Apellidos:</strong> ${apellidos}<br>
        <strong>Edad:</strong> ${edad}<br>
        <strong>Fecha de la Cita:</strong> ${fecha}
    `;

    document.getElementById('resumenCita').innerHTML = resumen;
    document.getElementById('resumenModal').style.display = 'block';
}

function cerrarModal() {
    document.getElementById('resumenModal').style.display = 'none';
    document.getElementById('citaForm').reset();
}
