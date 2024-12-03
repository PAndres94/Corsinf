document.addEventListener("DOMContentLoaded", () => {
    console.log("Página cargada correctamente.");

    // Datos de los socios
    const socios = [
        {
            nombre: "Escuela de Educación Básica Ángel de la Guarda",
            categoria: "sierra",
            imagen: "images/Angel-de-la-Guarda.png",
            enlace: "https://www.facebook.com/angeldelaguardaciag/?locale=es_LA"
        },
        {
            nombre: "Colegio Johannes Kepler",
            categoria: "amazonia",
            imagen: "images/Johannes-Kepler.png",
            enlace: "https://www.jkepler.edu.ec/"
        },
        {
            nombre: "Colegio Particular Batalla de Jambelí",
            categoria: "sierra",
            imagen: "images/Batalla-de-Jambeli.png",
            enlace: "https://www.facebook.com/ColegioBatalladeJambeli/?locale=es_LA"
        }
        // Puedes agregar más socios aquí
    ];

    // Seleccionar los filtros
    const sociosContainer = document.getElementById("socios-container");
    const categoryFilter = document.getElementById("category-filter");
    const searchFilter = document.getElementById("search-filter");
    const sortFilter = document.getElementById("sort-filter");

    // Función para renderizar los socios
    const renderSocios = () => {
        const categoryValue = categoryFilter.value;
        const searchValue = searchFilter.value.toLowerCase();
        const sortValue = sortFilter.value;

        // Filtrar socios según la categoría seleccionada y el texto de búsqueda
        let filteredSocios = socios.filter(socio => {
            const matchesCategory = categoryValue === "todas" || socio.c
