// Función para mostrar/ocultar el menú en dispositivos móviles
function toggleMenu() {
    const nav = document.querySelector('nav');
    nav.style.display = nav.style.display === 'block' ? 'none' : 'block';
}

document.addEventListener("DOMContentLoaded", () => {
    console.log("Página cargada correctamente.");

    // Datos de los socios
    const socios = [
        {
            nombre: "Escuela de Educación Básica Ángel de la Guarda",
            categoria: "sierra",
            imagen: "https://via.placeholder.com/200x150?text=Angel-de-la-Guarda",
            enlace: "https://www.facebook.com/angeldelaguardaciag/?locale=es_LA"
        },
        {
            nombre: "Colegio Johannes Kepler",
            categoria: "amazonia",
            imagen: "https://via.placeholder.com/200x150?text=Johannes-Kepler",
            enlace: "https://www.jkepler.edu.ec/"
        },
        {
            nombre: "Colegio Particular Batalla de Jambelí",
            categoria: "sierra",
            imagen: "https://via.placeholder.com/200x150?text=Batalla-de-Jambeli",
            enlace: "https://www.facebook.com/ColegioBatalladeJambeli/?locale=es_LA"
        }
        // Puedes agregar más socios aquí
    ];

    // Selección de filtros
    const sociosContainer = document.querySelector('.grid-container');
    const categoryFilter = document.querySelector('select');
    const searchFilter = document.querySelector('input');
    const sortFilter = document.querySelector('select:last-of-type');

    // Función para renderizar los socios
    const renderSocios = () => {
        const categoryValue = categoryFilter.value;
        const searchValue = searchFilter.value.toLowerCase();
        const sortValue = sortFilter.value;

        // Filtrar los socios
        let filteredSocios = socios.filter(socio => {
            const matchesCategory = categoryValue === "todas" || socio.categoria === categoryValue;
            const matchesSearch = socio.nombre.toLowerCase().includes(searchValue);
            return matchesCategory && matchesSearch;
        });

        // Ordenar los socios
        if (sortValue === "titulo") {
            filteredSocios.sort((a, b) => a.nombre.localeCompare(b.nombre));
        }

        // Vaciar el contenedor de socios y mostrar los filtrados
        sociosContainer.innerHTML = '';
        filteredSocios.forEach(socio => {
            const card = document.createElement("div");
            card.className = "card";
            card.innerHTML = `
                <img src="${socio.imagen}" alt="${socio.nombre}">
                <div class="card-content">
                    <h3>${socio.nombre}</h3>
                    <a href="${socio.enlace}" target="_blank">Ver más</a>
                </div>
            `;
            sociosContainer.appendChild(card);
        });
    };

    // Ejecutar 
