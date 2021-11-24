//AIzaSyBcm9mP5OZssDhDuF82ObXXEVOxsbKvTOY
//let lugaresInfo = [];


let map;

function initMap() {
	map = new google.maps.Map(document.getElementById("mapa"), {
		zoom: 12,
		center: { lat: 19.40529488423171, lng: -99.06971255229571 },
	});
}

let markerPersonal = new google.maps.Marker({
	position: { lat: 19.40529488423171, lng: -99.06971255229571 },
	label: "B",
	title: "Ustede esta Aqui",
});

// To add the marker to the map, call setMap();
markerPersonal.setMap(map);

var marker = new google.maps.Marker({
	position: { lat: 51.493073, lng: -0.14655 },
	label: "A",
	title: "Location Name",
});

// To add the marker to the map, call setMap();
marker.setMap(map);


/*const conseguirLugares = () => {
	fetch("https://www.datos.gov.co/resource/g373-n3yy.json")
		.then((response) => response.json())
		.then((lugares) => {
			console.log(lugares);

			lugares.forEach((lugar) => {
				let lugarInfo = {
					posicion: {
						lat: lugar.punto.coordiinates[1],
						lng: lugar.punto.coordinate[0],
					},
					nombre: lugar.nombre_sede,
				};

				lugaresInfo.push(lugarInfo);
			});
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition((usuarioUbicacion) => {
					let ubicacion = {
						lat: usuarioUbicacion.coords.latitude,
						lng: usuarioUbicacion.coords.longitude,
					};
					dibujarMapa(ubicacion);
				});
			}
		});
};*/

/*
const dibujarMapa = (obj) => {
	let mapa = new google.maps.Map(document.getElementById("mapa"), {
		center: obj,
		zoom: 8,
	});

	let marcadorusuario = new google.maps.Marker({
		position: obj,
		title: "tu ubicacion",
	});

	marcadorusuario.setMap(mapa);
	let marcadores = lugaresInfo.map((lugar) => {
		return new google.maps.Marker({
			position: lugar.posicion,
			title: lugar.nombre,
			map: mapa,
		});
	});
};
*/
