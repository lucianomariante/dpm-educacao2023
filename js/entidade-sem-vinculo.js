/* eslint-disable no-undef */
$(function() {
  $("#formulario").hide();
  $("#inscricao-curso").validate({
    rules: {
      vSCLIRAZAOSOCIAL: { required: true },
      vSALUCPF: { required: true },
      vSALUNOME: { required: true, minlength: 3 },
      vSALUCARGO: { required: true, minlength: 3 },
      vSALULOTACAO: { required: true, minlength: 3 },
      vSALUEMAIL: { required: true, email: true },
      vSALUFONE: { required: true },
      tipo_pagamento: { required: true },
      retencao: { required: true },
      chk_ciente: { required: true }
    },
    messages: {
      vSCLIRAZAOSOCIAL: { required: "Insira o nome do Município/Autarquia" },
      vSALUCPF: { required: "Insira o CPF" },
      vSALUNOME: {
        required: "Insira o Nome",
        minlength: "O nome deve possuir no mínimo 3 letras"
      },
      vSALUCARGO: {
        required: "Insira o Cargo",
        minlength: "O Cargo deve possuir no mínimo 3 letras"
      },
      vSALULOTACAO: {
        required: "Insira a Lotação/Departamento",
        minlength: "O Departamento deve possuir no mínimo 3 letras"
      },
      vSALUEMAIL: {
        required: "Insira o E-mail",
        email:
          "O formato de email está incorreto. Exemplo correto: seuemail@seuemail.com"
      },
      vSALUFONE: { required: "Insira o Telefone" },
      tipo_pagamento: { required: "Marque a forma de pagamento" },
      retencao: { required: "Marque o campo retenção" },
      chk_ciente: {
        required: "Você deve marcar o campo Declaração de Autorização Superior!"
      }
    },
    errorPlacement: function(error, element) {
      if (element.is(":radio") || element.is(":checkbox")) {
        error.prependTo(element.parent().parent());
      }
      element.prop("placeholder", error.text());
      element.prop("title", error.text());
      element
        .children("option")
        .first()
        .text(error.text());
      return false;
    },
    submitHandler: function() {
      if ($("#chk_ciente").prop("checked")) {
        enviarIncricao();
      } else {
        swal("Ops..", "", "warning");
      }
    }
  });
});

const curso_id = document.getElementById("vICURCODIGO").value;
console.log("curso_id= "+curso_id);

const ret_diversa = null;
const tipo_cliente = document.getElementById("tipo_cliente");
if (tipo_cliente == 'J')
  ret_diversa = document.getElementById("ret_diversa");
console.log("ret_diversa= "+ret_diversa);

if (ret_diversa != null)
  ret_diversa.addEventListener("click", function() {
    lblpercentual.toggleAttribute("hidden");
    ret_percentual.toggleAttribute("hidden");
    ret_percentual.toggleAttribute("disabled");
  });

const lblpercentual = document.getElementById("lblpercentual");
const ret_percentual = document.getElementById("ret_diversa_percentual");

const cpf = document.getElementById("vSALUCPF");
cpf.addEventListener(
  "blur",
  function() {
    console.log("aqui 1");
    let nrodocumento = this.value;
    if (nrodocumento) {
      let isValido = validateCPF(somenteNumeros(nrodocumento));
      if (isValido) {
        console.log("teste 3");
        getDadosAlunoByCPF(nrodocumento);
      } else {
        console.log("teste 4");
        swal("Ops..", "Número de documento inválido!", "error");
      }
    }
  },
  true
);

function enviarIncricao() {
  const dados = $("#inscricao-curso").serialize();
  $.ajax({
    type: "POST",
    url: "enviar-inscricao-sem-vinculo.php",
    data: dados,
    dataType: "json",
    success: function(res) {
      if (res.status) {
        document.getElementById("inscricao-curso").reset();
        // window.location.href = `/inscricao-concluida/${
        window.location.href = `inscricao-concluida/${
          res.id
        }/curso/${curso_id}`;
      } else {
        swal("", res.msg, "warning");
      }
    },
    error: function() {
      swal("", "Não foi possível enviar sua mensagem!", "error");
    }
  });
}

function getDadosAlunoByCPF(nrodocumento) {
  $.ajax({
    async: false,
    type: "GET",
    // url: "../transaction/transactionAlunos.php",
    url: "transaction/transactionAlunos.php",
    data: {
      metodo: "findByCPF",
      vIALUCPF: nrodocumento
    },
    dataType: "JSON",
    success: function(data) {
      const nro_registros = data.quantidadeRegistros;
      const aluno = data.dados[0];
      if (nro_registros > 0) {
        const {
          vIALUCODIGO,
          vSALUNOME,
          vSALUEMAIL,
          vSALUCELULAR,
          vSALUFONE,
          vSALUEMAILALTERNATIVO,
          vSALUCARGO,
          vSALULOTACAO
        } = aluno;

        document.getElementById("vIALUCODIGO").value = vIALUCODIGO;
        document.getElementById("vSALUNOME").value = vSALUNOME;
        document.getElementById("vSALUCARGO").value = vSALUCARGO;
        document.getElementById("vSALUEMAIL").value = vSALUEMAIL;
        document.getElementById(
          "vSALUEMAILALTERNATIVO"
        ).value = vSALUEMAILALTERNATIVO;
        document.getElementById("vSALUFONE").value = vSALUFONE;
        document.getElementById("vSALUCELULAR").value = vSALUCELULAR;
        document.getElementById("vSALULOTACAO").value = vSALULOTACAO;
      } else {
        console.log("teste 4");
        swal("", "Não contamos com seu CPF em nosso banco de dados. Por favor, clique em OK e prossiga com o preenchimento dos dados para fins de efetivação da inscrição.", "warning");
        $("#vSALUNOME").focus();
      }
    },
    error: function(data) {
      swal(
        "",
        "Não foi possível localizar registro com o CPF inserido!",
        "error"
      );
      console.log("error: "+data);
      return false;
    }
  });
}
