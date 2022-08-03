(function() {
	function filterCoordinacionZona(municipioId) {
		const url = `/municipio/${municipioId}/coordinazionZona`
		fetch(url)
			.then(response => response.json())
			.then(data => {
				const coordinacionZonaSelect = document.querySelector("#coordinacionZona")
				coordinacionZonaSelect.innerHTML = ""
				const {municipio: municipioSelected} = data
				let {coordinacion_zonas} = municipioSelected
				let coodinacionZona = ""
				coordinacion_zonas.unshift({id: -1, nombre: "Seleccione una opción"});
				for(const m of coordinacion_zonas) {
					coodinacionZona +=`<option value="${m.id}">${m.nombre}</option>`	
				}
				coordinacionZonaSelect.innerHTML = coodinacionZona
			})
	}

	const municipioSelect = document.querySelector("#municipio")
	if(municipioSelect)
		municipioSelect.addEventListener("change", e => {
			filterCoordinacionZona(event.target.value)
		})
})()