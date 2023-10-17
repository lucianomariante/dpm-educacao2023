// Load data from file hoteis-detalhes.json
function getHoteis(localidade) {
  $.ajax({
    type: "GET",
    url: "../transaction/transactionHoteis.php",
    data: {
      metodo: "getHoteis",
      vSLOCALIDADE: localidade
    },
    dataType: "json",
    success: function(data) {
      if (data) {
        $("div.detalhes-hoteis")
          .removeClass("disable")
          .addClass("active");
        $("#hotel").html(gerarListaHoteis(data));
      }
    },
    error: function(data) {
      swal("", "Não foi possível encontrar hotéis!", "error");
    }
  });
}

function findHotelByCodigo(codhotel) {
  $.ajax({
    type: "GET",
    url: "../transaction/transactionHoteis.php",
    data: {
      metodo: "findByCodigo",
      vIHOTCODIGO: codhotel
    },
    dataType: "json",
    success: function(data) {
      if (data) {
        $(".informacoes").html(gerarListaInformacoesHotel(data));
        $(".taxes")
          .find("table")
          .addClass("table");
        $(".taxes")
          .find("table thead tr")
          .addClass("table-orange");
      }
    },
    error: function(data) {
      swal("", "Não foi possível recuperar informações do hotel!", "error");
    }
  });
}

const hotelLocalidade = document.getElementById("hotel_localidade");
hotelLocalidade.addEventListener("change", function(e) {
  if (hotelLocalidade.value) {
    getHoteis(hotelLocalidade.value);
  }
});

$(document).on("click", "ul#hotel>li", function() {
  let id_select_hotel = $(this).data("id");
  if (id_select_hotel) {
    findHotelByCodigo(id_select_hotel);
    $(document).scrollTo(document.getElementById("hotelinformacoes"), 800);
    //window.location = '#divAncora';
    //window.location.href = "./cursos/area/"+pIAREA;
  }
});

const getNumeroFax = fax => (fax ? fax : "Não Informado.");

function gerarListaHoteis(hoteis) {
  const hoteisHtml = [...hoteis]
    .map(
      ({ codigo, nome }) => `<li data-id="${codigo}">
            <i class="fa fa-check" aria-hidden="true"></i>
            <span class="item-name roboto-regular">${nome}
            </span>
        </li>`
    )
    .join("");

  return hoteisHtml;
}

function gerarListaInformacoesHotel(data) {
  const infohotel = [...data]
    .map(
      ({
        nome,
        texto,
        tarifario,
        site,
        localizacao,
        telefone,
        email,
        fax,
        mapa
      }) => `
            <div class="informacoes-title" id="divAncora">
                <span>${nome}</span>
                <a href="${site}" target="_blank">Acesse o site do hotel</a>
            </div>
            <div class="localization">
                <i class="fas fa-map-marker-alt text-orange-theme"></i><span class="localization-title">Localização</span>
            </div>
            <span class="localization-street">${localizacao}</span>
            <div class="map-localization">
                <div class="map-responsive">
                    <iframe src="${mapa}" width="730" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="service-hotel">
                <div class="service-hotel-header">
                    <i class="fa fa-coffee" aria-hidden="true"></i>
                    <span class="service-hotel-title">Serviço<small> (O Hotel Oferece)</small></span>
                </div>
                <div class="service-hotel-list">
                    <ul>${texto}</ul>
                </div>
            </div>
            <div class="taxes">
                <div class="taxes-header">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                    <span class="taxes-title">Tarifário</span>
                </div>
                <div class="taxes-table table-responsive">
                    ${tarifario}
                </div>
            </div>
            <div class="contact">
                <div class="contact-header">
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                    <span class="contact-title">Contato</span>
                </div>
                <span class="contact-tel">Fone: ${telefone}</span>
                <span class="contact-tel">Fax: ${getNumeroFax(fax)}</span>
                <span class="contact-email">Reservas: <a href="mailto:${email}">${email}</a></span>
            </div>
        `
    )
    .join("");

  return infohotel;
}
