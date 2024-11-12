function Volver()
{
	window.location.href = "./IniciarSesion.html"
}

const medicos = [
    { nombre: "Dr. Adrian Rojas", especialidad: "dermatologia", ubicacion: "san_jose" },
    { nombre: "Dra. Rachel Córtes", especialidad: "odontologia", ubicacion: "heredia" },
    { nombre: "Dr. Alejandro Arguedas", especialidad: "pediatria", ubicacion: "alajuela" },
    { nombre: "Dra. Shernna Corrales", especialidad: "psicologia", ubicacion: "cartago" },
    { nombre: "Dr. Luis Martínez", especialidad: "cardiologia", ubicacion: "cartago" },
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