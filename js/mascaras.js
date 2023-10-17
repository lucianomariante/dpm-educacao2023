/* eslint-disable no-undef */
$(document).ready(function($) {
  //Marcara para telefone (Incluíndo 9º dígito)
  $(".telefone")
    .mask("(99) 9999-9999?9")
    .focusout(function(event) {
      var target, phone, element;
      target = event.currentTarget ? event.currentTarget : event.srcElement;
      phone = target.value.replace(/\D/g, "");
      element = $(target);
      element.unmask();

      if (phone.length > 10) {
        element.mask("(99) 99999-999?9");
      } else {
        element.mask("(99) 9999-9999?9");
      }
    });

  //Valores monetários
  $(".monetario")
    .attr("maxlength", "15")
    .keypress(function(event) {
      return digitos(event, this);
    })
    .keydown(function(event) {
      formatarMoeda(this, 20, event, 2);
    });

  //CPF
  $(".cpf").mask("999.999.999-99");

  //CNPJ
  $(".cnpj").mask("99.999.999/9999-99");

  //CEP
  $(".cep").mask("99999-999");

  //Horas
  $(".horario").mask("99:99?:99");

  //Horas
  $(".date-time").mask("99/99/999 99:99?:99");
});
