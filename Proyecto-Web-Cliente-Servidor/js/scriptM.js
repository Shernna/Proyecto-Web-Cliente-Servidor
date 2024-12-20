const contenedorMedico = document.getElementById("contenedorMedico");

// Obtener datos de la API
async function obtenerDatos() {
    const medicosResponse = await fetch('medicosApi.php?action=medicos');
    const medicos = await medicosResponse.json();

    const agendasResponse = await fetch('medicosApi.php?action=agendas');
    const agendas = await agendasResponse.json();

    renderMedicos(medicos, agendas);
}

function renderMedicos(medicos, agendas) {
    medicos.forEach(medico => {
        const medicoDiv = document.createElement("div");
        medicoDiv.classList.add("container");

        medicoDiv.innerHTML = `
            <h3>${medico.nombre}</h3>
            <p>${medico.especialidad.charAt(0).toUpperCase() + medico.especialidad.slice(1)}</p>
            <p>Ubicación: ${medico.ubicacion.charAt(0).toUpperCase() + medico.ubicacion.slice(1)}</p>
        `;
        
        const citas = agendas[medico.nombre];
        if (citas && citas.length > 0) {
            const citasList = document.createElement("ul");

            citas.forEach((cita, index) => {
                const citaItem = document.createElement("li");
                citaItem.textContent = `${cita.fecha} - ${cita.nombre} - ${cita.descripcion}`;
                
                const deleteBtn = document.createElement('button');
                deleteBtn.textContent = 'Eliminar';
                deleteBtn.classList.add('delete-btn');
                deleteBtn.addEventListener('click', function() {
                    eliminarCita(medico.nombre, index);
                    citaItem.remove(); 
                });

                citaItem.appendChild(deleteBtn);
                citasList.appendChild(citaItem);
            });

            const citasTitulo = document.createElement("h6");
            citasTitulo.textContent = "Lista de Citas:";
            medicoDiv.appendChild(citasTitulo);
            medicoDiv.appendChild(citasList);
        } else {
            const noCitasMsg = document.createElement("p");
            noCitasMsg.textContent = "No hay citas disponibles.";
            medicoDiv.appendChild(noCitasMsg);
        }

        contenedorMedico.appendChild(medicoDiv);
    });
}

obtenerDatos();



/*const medicos = [
    { nombre: "Dr. Adrian Rojas", especialidad: "dermatologia", ubicacion: "san_jose" },
    { nombre: "Dra. Rachel Cortes", especialidad: "odontologia", ubicacion: "heredia" },
    { nombre: "Dr. Alejandro Arguedas", especialidad: "pediatria", ubicacion: "alajuela" },
    { nombre: "Dra. Shernna Corrales", especialidad: "psicologia", ubicacion: "cartago" },
    { nombre: "Dr. Luis Martinez", especialidad: "cardiologia", ubicacion: "cartago" },
];


const agendas = {
    "Dr. Adrian Rojas": [
        { nombre: "Oscar Barquero", fecha: "2024-11-22", descripcion: "Cita Dermatología" },
        { nombre: "Laura Gutierrez", fecha: "2024-11-23", descripcion: "Consulta General" },
        { nombre: "Mario Pérez", fecha: "2024-11-24", descripcion: "Control de Presión" }
    ],
    "Dra. Rachel Cortes": [
        { nombre: "Andrés Ulate", fecha: "2024-11-25", descripcion: "Limpieza Dental" },
        { nombre: "Sofía Jiménez", fecha: "2024-11-26", descripcion: "Extracción de Muelas" }
    ],
    "Dr. Alejandro Arguedas": [
        { nombre: "Lucía Quesada", fecha: "2024-11-27", descripcion: "Control de Vacunas" },
        { nombre: "Carlos Rojas", fecha: "2024-11-28", descripcion: "Consulta Pediátrica" }
    ],
    "Dra. Shernna Corrales": [
        { nombre: "María López", fecha: "2024-11-29", descripcion: "Terapia de Ansiedad" },
        { nombre: "José Martínez", fecha: "2024-11-30", descripcion: "Consulta de Evaluación" }
    ],
    "Dr. Luis Martinez": [
        { nombre: "Ana Vargas", fecha: "2024-12-01", descripcion: "Consulta de Presión Alta" },
        { nombre: "Juan Solano", fecha: "2024-12-02", descripcion: "Electrocardiograma" }
    ]
};

function renderMedico(medico) {
    const medicoDiv = document.getElementById("contenedorMedico");

    medicoDiv.innerHTML = `
        <h3>${medico.nombre}</h3>
        <p>${medico.especialidad.charAt(0).toUpperCase() + medico.especialidad.slice(1)}</p>
        <p>Ubicación: ${medico.ubicacion.charAt(0).toUpperCase() + medico.ubicacion.slice(1)}</p>
    `;

    const citas = agendas[medico.nombre];
    if (citas && citas.length > 0) {
        const citasList = document.createElement("ul");
        
        citas.forEach(cita => {
            const citaItem = document.createElement("li");
            citaItem.textContent = ` ${cita.nombre} - ${cita.fecha} - ${cita.descripcion}`;
            citasList.appendChild(citaItem);
        });

        medicoDiv.appendChild(document.createElement("h6")).textContent = "Lista de Citas:";
        medicoDiv.appendChild(citasList);
    } else {
        medicoDiv.appendChild(document.createElement("p")).textContent = "No hay citas disponibles.";
    }
}

const contenedorMedico = document.getElementById("contenedorMedico");

medicos.forEach(medico => {
    const medicoDiv = document.createElement("div");
    medicoDiv.classList.add("container");

    medicoDiv.innerHTML = `
        <h3>${medico.nombre}</h3>
        <p>${medico.especialidad.charAt(0).toUpperCase() + medico.especialidad.slice(1)}</p>
        <p>Ubicación: ${medico.ubicacion.charAt(0).toUpperCase() + medico.ubicacion.slice(1)}</p>
    `;
    const citas = agendas[medico.nombre];
    if (citas && citas.length > 0) {
        const citasList = document.createElement("ul");

        citas.forEach((cita, index) => {
            const citaItem = document.createElement("li");
            citaItem.textContent = `${cita.fecha} - ${cita.nombre} - ${cita.descripcion}`;
            
            const deleteBtn = document.createElement('button');
            deleteBtn.textContent = 'Eliminar';
            deleteBtn.classList.add('delete-btn');
            deleteBtn.addEventListener('click', function() {
                eliminarCita(medico.nombre, index);
                citaItem.remove(); 
            });

            citaItem.appendChild(deleteBtn);
            citasList.appendChild(citaItem);
        });

        const citasTitulo = document.createElement("h6");
        citasTitulo.textContent = "Lista de Citas:";
        medicoDiv.appendChild(citasTitulo);
        medicoDiv.appendChild(citasList);
    } else {
        const noCitasMsg = document.createElement("p");
        noCitasMsg.textContent = "No hay citas disponibles.";
        medicoDiv.appendChild(noCitasMsg);
    }

    contenedorMedico.appendChild(medicoDiv);
});

function eliminarCita(doctor, index) {
    if (agendas[doctor]) {
        agendas[doctor].splice(index, 1);
        console.log(`Cita eliminada de la agenda de ${doctor}`);
    } else {
        console.log(`No se encontró al doctor ${doctor} en las agendas.`);
    }
}

function actualizarFechaCita(agendas, doctor, paciente, nuevaFecha) {
    if (agendas[doctor]) {
        const cita = agendas[doctor].find(c => c.nombre === paciente);
        
        if (cita) {
            cita.fecha = nuevaFecha;
            mostrarModal(`La fecha de la cita de ${paciente} con el ${doctor} ha sido actualizada a ${nuevaFecha}.`);
        } else {
            mostrarModal(`No se encontró una cita para el paciente ${paciente} con el ${doctor}.`);
        }
    } else {
        mostrarModal(`No se encontró al doctor ${doctor} en las agendas.`);
    }
}



function mostrarModal(mensaje) {
    document.getElementById("modalMensaje").textContent = mensaje;
        document.getElementById("modalConfirmacion").style.display = "block";
}
function cerrarModal() {
    document.getElementById("modalConfirmacion").style.display = "none";
}



const nombreID = document.getElementById('nombre');
const fechaID = document.getElementById('fecha');
const descripcionID = document.getElementById('descripcion');

document.getElementById('EditarCita').addEventListener('click', function() {
    const nombre = nombreID.value.trim();
    const fecha = fechaID.value.trim();
    const descripcion = descripcionID.value.trim();
    
    if (nombre && fecha && descripcion) {
        const doctorSelect = document.getElementById('doctor'); 
        const doctor = doctorSelect ? doctorSelect.value : null;

        if (doctor) {
            actualizarFechaCita(agendas, doctor, nombre, fecha);
        } else {
            mostrarModal("Por favor, selecciona un doctor.");
        }
    } else {
        mostrarModal("Por favor, completa todos los campos antes de editar la cita.");
    }
});
*/

