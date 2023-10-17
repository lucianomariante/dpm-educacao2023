/* eslint-disable no-undef */
$(document).ready(function() {
  smoothScrollFade();
  smoothScrollAnimate();
  $(".select").selectpicker({
    container: "body",
    liveSearch: true,
    showTick: true
  });

  $("#frmlogin").validate({
    rules: {
      txtlogin: { required: true },
      txtsenha: { required: true }
    },
    messages: {
      txtlogin: { required: "Insira o seu nome de Usuário" },
      txtsenha: { required: "Insira a sua Senha" }
    },
    errorPlacement: function(error, element) {
      element.prop("placeholder", error.text());
      element.prop("title", error.text());
      element
        .children("option")
        .first()
        .text(error.text());
      return false;
    },
    submitHandler: function(e) {
      e.preventDefault();
      $("#frmlogin").submit();
    }
  });
});

function myMap() {
  var mapOptions = {
    center: new google.maps.LatLng(60.5, -0.12),
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.HYBRID
  };
  var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}

window.addEventListener("load", function() {
  var gallery = document.querySelector(".gallery::before");

  $(".gallery").slick({
    arrows: true,
    nextArrow: '<i class="fas fa-chevron-right"></i>',
    prevArrow: '<i class="fas fa-chevron-left"></i>',
    dots: false,
    infinite: true,
    speed: 300,
    autoplay: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  $(".gallery::before").click(function() {
    $(".slider").slickPrev();
  });
});

// Smoth Scroll Fade
function smoothScrollFade() {
  $(window).scroll(function() {
    if ($(this).scrollTop() > 300) {
      $(".back-top").fadeIn();
    } else {
      $(".back-top").fadeOut();
    }
  });
}

// Smooth Scroll Animate
function smoothScrollAnimate(event) {
  jQuery(".back-top").click(function(event) {
    event.preventDefault();
    jQuery("html, body").animate({ scrollTop: 0 }, 1000);
    return false;
  });
}

const mod11 = num => num % 11;
const NOT = x => !x;
const isEqual = a => b => b === a;
const mergeDigits = (num1, num2) => `${num1}${num2}`;
const getTwoLastDigits = cpf => `${cpf[9]}${cpf[10]}`;
const getCpfNumeral = cpf => cpf.substr(0, 9).split("");

const isRepeatingChars = str => str.split("").every(elem => elem === str[0]);

const toSumOfProducts = multiplier => (result, num, i) =>
  result + num * multiplier--;

const getSumOfProducts = (list, multiplier) =>
  list.reduce(toSumOfProducts(multiplier), 0);

const getValidationDigit = multiplier => cpf =>
  getDigit(mod11(getSumOfProducts(cpf, multiplier)));

const getDigit = num => (num > 1 ? 11 - num : 0);

const isRepeatingNumbersCpf = isRepeatingChars;

const isValidCPF = cpf => {
  const CPF = getCpfNumeral(cpf);
  const firstDigit = getValidationDigit(10)(CPF);
  const secondDigit = getValidationDigit(11)(CPF.concat(firstDigit));

  return isEqual(getTwoLastDigits(cpf))(mergeDigits(firstDigit, secondDigit));
};

const validateCPF = CPF => NOT(isRepeatingNumbersCpf(CPF)) && isValidCPF(CPF);

const somenteNumeros = string => string.replace(/[^0-9]+/g, "");

$(".aside-menu ul li a").on("click", function(e) {
  e.preventDefault();
  let anchor = $(this).attr("href");
  $("html, body").animate(
    {
      scrollTop: $(anchor).offset().top
    },
    1000
  );
});

function validateCNPJ(s) {
  let cnpj = s.replace(/[^\d]+/g, "");

  // Valida a quantidade de caracteres
  if (cnpj.length !== 14) return false;

  // Elimina inválidos com todos os caracteres iguais
  if (/^(\d)\1+$/.test(cnpj)) return false;

  // Cáculo de validação
  let t = cnpj.length - 2,
    d = cnpj.substring(t),
    d1 = parseInt(d.charAt(0)),
    d2 = parseInt(d.charAt(1)),
    calc = x => {
      let n = cnpj.substring(0, x),
        y = x - 7,
        s = 0,
        r = 0;

      for (let i = x; i >= 1; i--) {
        s += n.charAt(x - i) * y--;
        if (y < 2) y = 9;
      }

      r = 11 - (s % 11);
      return r > 9 ? 0 : r;
    };

  return calc(t) === d1 && calc(t + 1) === d2;
}
