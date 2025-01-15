(() => {
    if (navigator.geolocation) 
    {
      navigator.geolocation.getCurrentPosition(success, error);
    } 
    else 
    {
      alert("Navegador não suporta Geolocation");
    }    
  })();

  function success(position) 
  {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    getMap(latitude, longitude);
  }
  function error() 
  {
    alert("Informação de localização indisponível.");
  }

  function getMap(latitude, longitude) 
  {//inicializa o map nas cordenadas
    //mapa do openstreetmap
    const map = L.map("map").setView([latitude, longitude], 5);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);
    L.marker([latitude, longitude]).addTo(map);
    const endereco = {
        pais: "Brasil",
        estado: "Rio Grande do Sul",
        cidade: "Pelotas",
        rua: "Av. Ferreira Viana, 1526 - Areal",
        cep: "96085-000"
    };
    
    // Verifica se o país está especificado no objeto
    if (endereco.pais) {
        // Monta a URL da API usando os valores do objeto
        //precisa ser crase pra funcionar 
        fetch(`https://nominatim.openstreetmap.org/search?country=${endereco.pais}&state=${endereco.estado}&city=${endereco.cidade}&street=${endereco.rua}&postalcode=${endereco.cep}&format=json`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    const destLatitude = parseFloat(data[0].lat);
                    const destLongitude = parseFloat(data[0].lon);
                    
                    // Adiciona o marcador no mapa
                    L.marker([destLatitude, destLongitude]).addTo(map)
                        .bindPopup(`${endereco.rua}, ${endereco.cidade}, ${endereco.estado}, ${endereco.pais}`)
                        .openPopup();
                    
                    // Define a linha entre o ponto atual e o destino
                    const latlngs = [
                        [latitude, longitude], // Substitua por suas coordenadas atuais
                        [destLatitude, destLongitude]
                    ];
                    const polyline = L.polyline(latlngs, { color: 'red' }).addTo(map);
                    
                    // Ajusta o mapa para exibir o percurso completo
                    map.fitBounds(polyline.getBounds());
                } else {
                    alert("Endereço não encontrado. Por favor, tente novamente.");
                }
            })
            .catch(() => {
                alert("Falha ao recuperar as coordenadas do endereço.");
            });
    }
  }    