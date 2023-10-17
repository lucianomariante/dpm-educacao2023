/* eslint-disable no-undef */
$(function() {
  $("#formulario").hide();
  $("#divAviso").hide();
  $("#pessoajuridica").validate({
    rules: {
      pj_cnpj: { required: true },
      pj_nome: { required: true, minlength: 3 },
      pj_email: { required: true, email: true },
      pj_tipo_logradouro: { required: true },
      pj_logradouro: { required: true },
      pj_numero: { required: true },
      pj_bairro: { required: true },
      pj_estado: { required: true },
      pj_cidade: { required: true },
      pj_cep: { required: true },
      pj_telefone: { required: true }
    },
    messages: {
      pj_cnpj: { required: "Insira o CNPJ" },
      pj_nome: {
        required: "Insira o nome do Município/Autarquia",
        minlength: "O nome deve possuir no mínimo 3 letras"
      },
      pj_email: {
        required: "Insira o E-mail",
        email:
          "O formato de email está incorreto. Exemplo correto: seuemail@seuemail.com"
      },
      pj_tipo_logradouro: { required: "Selecione o Tipo de Logradouro" },
      pj_logradouro: {
        required: "Insira o nome do Logradouro(Rua / Avenida / etc..)"
      },
      pj_numero: { required: "Insira o número do Logradouro" },
      pj_bairro: { required: "Insira o Bairro" },
      pj_estado: { required: "Selecione o Estado" },
      pj_cidade: { required: "Selecione a Cidade" },
      pj_cep: { required: "Insira o CEP" },
      pj_telefone: { required: "Insira o Telefone" }
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
      const dados = $("#pessoajuridica").serialize();
      enviarCadastro(dados);
    }
  });

  $("#inscricao-curso").validate({
    rules: {
      vSCLIRAZAOSOCIAL: { required: true },
      vSALUCPF: { required: true },
      vSALUNOME: { required: true, minlength: 3 },
      vSALUCARGO: { required: true },
      vSALULOTACAO: { required: true },
      vSALUEMAIL: { required: true, email: true },
      vSALUFONE: { required: true }
    },
    messages: {
      vSCLIRAZAOSOCIAL: { required: "Insira o nome do Município/Autarquia" },
      vSALUCPF: { required: "Insira o CPF" },
      vSALUNOME: {
        required: "Insira o Nome",
        minlength: "O nome deve possuir no mínimo 3 letras"
      },
      vSALUCARGO: { required: "Insira o Cargo" },
      vSALULOTACAO: { required: "Insira a Lotação/Departamento" },
      vSALUEMAIL: {
        required: "Insira o E-mail",
        email:
          "O formato de email está incorreto. Exemplo correto: seuemail@seuemail.com"
      },
      vSALUFONE: { required: "Insira o Telefone" }
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
        swal(
          "Ops..",
          "Você deve marcar o campo Declaração de Autorização Superior!",
          "warning"
        );
      }
    }
  });
});

const curso_id = document.getElementById("vICURCODIGO").value;

if (document.getElementById("pj_estado")) {
  document.getElementById("pj_estado").addEventListener("change", function() {
    if (this.value) {
      findCidadeByEstado(this.value, "J");
    } else {
      swal("Ops..", "Selecione um Estado para listar suas cidades", "warning");
    }
  });
}

const cpf = document.getElementById("vSALUCPF");
cpf.addEventListener(
  "blur",
  function() {
    console.log("aqui 2");

    let nrodocumento = this.value;
    if (nrodocumento) {
      let isValido = validateCPF(somenteNumeros(nrodocumento));
      if (isValido) {
        console.log("sucesso 3");
        getDadosAlunoByCPF(nrodocumento);
      } else {
        console.log("erro 3");

        swal("Ops..", "Número de documento inválido!", "error");
      }
    }
  },
  true
);

const cnpj = document.getElementById("cnpj");
if (cnpj) {
  const btnCnpj = document.getElementById("btnCnpj");
  btnCnpj.addEventListener(
    "click",
    function() {
      console.log("cliente-sem-login-e-senha");
      if (cnpj.value) {
        let isValido = validateCNPJ(cnpj.value);

        if (isValido) {
          getDadosClienteByCNPJ(cnpj.value);
        } else {
          swal("Ops..", "O número de CNPJ está incorreto!", "error");
        }
      } else {
        swal("Ops..", "Informe o número do CNPJ!", "warning");
      }
    },
    true
  );
}

function enviarIncricao() {
  const dados = $("#inscricao-curso").serialize();
  console.log("aqui");

  $.ajax({
    type: "POST",
    url: "enviar-inscricao.php",
    data: dados,
    dataType: "json",
    success: function(data) {
      if (data[0]) {
        swal("", data[1], "success");
        // window.location.href = 'inscricao-concluida/${data[2]}/curso/${curso_id}';
        window.location.href = `inscricao-concluida/${
          data[2]
        }/curso/${curso_id}`;
        // window.location.href = '/inscricao-concluida/${ data[2]}/curso/${curso_id}';
      } else {
        swal("", data[1], "error");
      }

      document.getElementById("inscricao-curso").reset();
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
      console.log(data);

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
        console.log("sucesso 1");
        swal("", "Não contamos com seu CPF em nosso banco de dados. Por favor, clique em OK e prossiga com o preenchimento dos dados para fins de efetivação da inscrição.", "warning");
      }
    },
    error: function(data) {

      console.log(data);
      console.log("erro 4");
      swal(
        "",
        "Não foi possível localizar registro com o CPF inserido!",
        "error"
      );
      return false;
    }
  });
}

function getDadosClienteByCNPJ(nrodocumento) {
	 console.log(nrodocumento);
  $.ajax({
    type: "GET",
    url: "transaction/transactionClientes.php",
    data: {
      metodo: "findByCNPJ",
      vSCLICNPJ: nrodocumento
    },
    dataType: "json",
    success: function(res) {
		 console.log(res);

      const nro_registros = res.quantidadeRegistros;
      const cliente = res.dados;

		if (res.especial === 'S'){
		   var CLICODIGO = res.dados.CLICODIGO
		   var CLINOMEFANTASIA  = res.dados.CLINOMEFANTASIA;
			document.querySelector('#lblCliente').textContent = CLINOMEFANTASIA;
			document.querySelector('#lblCliente2').textContent = CLINOMEFANTASIA;
			$("#divAviso").show();
			 $("#divAvisoEspecial").show();

			 $("#divInadimplente").hide();
			 $("#msgComCadastro").hide();
			 $("#msgSemCadastro").hide();
			  $("#msgAvulso").hide();
			 $("#msgBloqueio").hide();
			 $("#pessoafisica").hide();
			  $("#pessoajuridica").hide();
		  }  else if (res.bloqueio === 'S'){

			$("#search_contract").hide();
			$("#divBloqueio").show();
			$("#divInadimplente").hide();
			$("#pessoajuridica").hide();
			$("#has_contract").hide();
			$("#formulario").hide();
		  } else if (res.inadimplente === 'S'){
			var CLICODIGO = res.dados.CLICODIGO
			   var CLINOMEFANTASIA  = res.dados.CLINOMEFANTASIA;
			document.querySelector('#lblCliente3').textContent = CLINOMEFANTASIA;
			//$("#search_contract").hide();
			$("#divAviso").show();
			$("#divBloqueio").hide();
			$("#divInadimplente").show();
			$("#msgComCadastro").hide();
			 $("#msgSemCadastro").hide();
			 $("#msgAvulso").hide();
			 $("#msgBloqueio").hide();
			$("#divAvisoEspecial").hide();
			$("#pessoajuridica").hide();
			$("#has_contract").hide();
			$("#formulario").hide();
		  } else if (res.contrato === 'S'){
		   var CLICODIGO = res.dados.CLICODIGO
		   var CLINOMEFANTASIA  = res.dados.CLINOMEFANTASIA;
		     $("#vICLICODIGO").val(CLICODIGO);
			 $("#vSCLIRAZAOSOCIAL").val(CLINOMEFANTASIA);
			 $("#divAviso").show();
			 $("#divAvisoEspecial").hide();
			 $("#divInadimplente").hide();
			 $("#msgComCadastro").hide();
			 $("#msgSemCadastro").hide();
			  $("#msgAvulso").hide();
			 $("#msgBloqueio").show();
			 $("#pessoafisica").hide();
			  $("#pessoajuridica").hide();
			  $("#formulario").show();
		  } else if (res.quantidadeRegistros > 0) {
			 $("#divInadimplente").hide();
		   $("#oid_cliente").val(res.dados.CLICODIGO);
		   $("#divAdicionais").hide();
		   $("#divAviso").show();
		   $("#msgAvulso").show();
		   $("#divAvisoEspecial").hide();
		   $("#msgComCadastro").show();
		   $("#msgSemCadastro").hide();
		   $("#msgBloqueio").hide();
		   $("#pessoafisica").hide();
		   $("#pj_cnpj").val(nrodocumento);
		   $("#pj_nome").val(res.dados.CLINOMEFANTASIA);
		   $("#pessoajuridica").show();
		  } else {
			$("#oid_cliente").val('');
			$("#divAdicionais").show();
			  $("#divAviso").show();
			  $("#msgAvulso").show();
			  $("#divAvisoEspecial").hide();
			$("#msgSemCadastro").show();
			$("#msgComCadastro").hide();
			 $("#divInadimplente").hide();
			 $("#msgBloqueio").hide();
			$("#pessoafisica").hide();
			$("#pj_cnpj").val(nrodocumento);
			$("#pessoajuridica").show();
		  }

    },
    error: function() {
      swal(
        // console.log("here to stay");
        "ERRO: ",
        "Não foi possível localizar registro com o CNPJ inserido!",
        "error"
      );
      return false;
    }
  });
}

function enviarCadastro(dados) {
  $.ajax({
    type: "POST",
    url: "cadastrar-cliente.php",
    data: dados,
    dataType: "json",
    success: function(res) {
      if (res.status == "success") {
        document.getElementById("pessoajuridica").reset();

        window.location.href = `/sem-vinculo-com-cadastro/${
          res.id
        }/curso/${curso_id}`;
      } else {
        swal("", res.msg, res.status);
      }
    },
    error: function() {
      swal("", "Não foi possível enviar sua mensagem!", "error");
    }
  });
}

function findCidadeByEstado(estcodigo, tipo_pessoa) {
  $.ajax({
    type: "GET",
    url: "../transaction/transactionEnderecos.php",
    data: {
      metodo: "findCidade",
      vIESTCODIGO: estcodigo
    },
    dataType: "json",
    success: function(cidades) {
      if (cidades) {
        var option = new Array(); //resetando a variável

        if (tipo_pessoa === "J") {
          resetaCombo("pj_cidade");
        }
        if (tipo_pessoa === "F") {
          resetaCombo("pf_cidade");
        }

        $.each(cidades, function(i, obj) {
          option[i] = document.createElement("option"); //criando o option
          $(option[i]).attr({ value: obj.codigo }); //colocando o value no option
          $(option[i]).append(obj.descricao); //colocando o 'label'

          //jogando um à um os options no próximo combo
          if (tipo_pessoa === "J") {
            $("#pj_cidade").append(option[i]);
          }
          if (tipo_pessoa === "F") {
            $("#pf_cidade").append(option[i]);
          }
        });
      }
    },
    error: function() {
      swal("", "Não foi possível recuperar a lista de Cidades!", "error");
    }
  });
}

function resetaCombo(el) {
  $("#" + el + "").empty(); //retira os elementos antigos
  var option = document.createElement("option");
  $(option).attr({ value: "" });
  $(option).append("Selecione a Cidade");
  $("#" + el + "").append(option);
}
