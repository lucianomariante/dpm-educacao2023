/* eslint-disable no-undef */
$(function() {
  $("#formulario").hide();
  $("#divAviso").hide();    
  $("#pessoajuridica").validate({
    rules: {
      pj_cnpj: { required: true },
      pj_nome: { required: true },
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
      pj_nome: { required: "Insira o nome do Município/Autarquia" },
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

  $("#pessoafisica").validate({
    rules: {
      pf_cpf: { required: true },
    pf_nome: { required: true, minlength: 3 },
      pf_email: { required: true, email: true },
      pf_tipo_logradouro: { required: true },
      pf_logradouro: { required: true },
      pf_numero: { required: true },
      pf_bairro: { required: true },
      pf_estado: { required: true },
      pf_cidade: { required: true },
      pf_cep: { required: true },
      pf_telefone: { required: true }
    },
    messages: {
      pf_cpf: { required: "Insira o seu CPF" },
      pf_nome: {
        required: "Insira o seu Nome",
      minlength: "O nome deve possuir no mínimo 3 letras"
      },
      pf_email: {
        required: "Insira o E-mail",
        email:
          "O formato de email está incorreto. Exemplo correto: seuemail@seuemail.com"
      },
      pf_tipo_logradouro: { required: "Selecione o Tipo de Logradouro" },
      pf_logradouro: {
        required: "Insira o nome do Logradouro(Rua / Avenida / etc..)"
      },
      pf_numero: { required: "Insira o número do Logradouro" },
      pf_bairro: { required: "Insira o Bairro" },
      pf_estado: { required: "Selecione o Estado" },
      pf_cidade: { required: "Selecione a Cidade" },
      pf_cep: { required: "Insira o CEP" },
      pf_telefone: { required: "Insira o seu Telefone" }
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
    submitHandler: function() {
      const dados = $("#pessoafisica").serialize();
      enviarCadastro(dados);
    }
  });
});

const curso_id = document.getElementById("vICURCODIGO").value;

document.getElementById("pj_estado").addEventListener("change", function() {
  if (this.value) {
    findCidadeByEstado(this.value, "J");
  } else {
    swal("Ops..", "Selecione um Estado para listar suas cidades", "warning");
  }
});

document.getElementById("pf_estado").addEventListener("change", function() {
  if (this.value) {
    findCidadeByEstado(this.value, "F");
  } else {
    swal("Ops..", "Selecione um Estado para listar suas cidades", "warning");
  }
});

const cnpj = document.getElementById("cnpj");
const btnCnpj = document.getElementById("btnCnpj");
btnCnpj.addEventListener(
  "click",
  function() {
    console.log("silent hill");
    if (cnpj.value) {
      let isValido = validateCNPJ(cnpj.value);

      if (isValido) {
        getDadosClienteByCNPJ(cnpj.value);
      } else {
        swal("Ops..", "O número de CNPJ é inválido!", "error");
      }
    } else {
      swal("Ops..", "Informe o número do CNPJ!", "warning");
    }
  },
  true
);

const cpf = document.getElementById("cpf");
const btnCpf = document.getElementById("btnCpf");
btnCpf.addEventListener(
  "click",
  function() {
    if (cpf.value) {
      let isValido = validateCPF(somenteNumeros(cpf.value));
      if (isValido) {
        getDadosClienteByCPF(cpf.value);
      } else {
        swal("Ops..", "O Número do CPF é inválido!", "error");
      }
    } else {
      swal("Ops..", "Informe o número do CPF!", "warning");
    }
  },
  true
);

function getDadosClienteByCPF(nrodocumento) {

  $.ajax({
    async: false,
    type: "GET",
    // url: "../transaction/transactionClientes.php",
    url: "transaction/transactionClientes.php",
    data: {
      metodo: "findByCPF",
      vSCLICPF: nrodocumento
    },
    dataType: "JSON",
    success: function(res) {
    console.log(res);
    
    const nro_registros = res.quantidadeRegistros;
    console.log("nro_registros = "+nro_registros);

	  if (res.quantidadeRegistros > 0) {
		  $("#pessoajuridica").hide();
      $("#pf_cpf").val(nrodocumento);
      $("#pessoafisica").show();		  
		  $("#oid_cliente").val(res.dados.CLICODIGO);
		  $("#pf_nome").val(res.dados.CLINOMEFANTASIA); 
		  $("#divAdicionais2").hide();
		  $("#divAviso").hide();   
		  $("#msgComCadastro").hide();  
		  $("#msgSemCadastro").hide();		   
		  $("#msgAvulso2").show(); 
		  $("#msgComCadastro2").show();  
		  $("#msgSemCadastro2").hide();
		  $("#msgBloqueio").hide();		   
    } 
    else { 
		  $("#oid_cliente").val('');
		  $("#divAdicionais2").show();
		  $("#divAviso").hide();    
		  $("#msgAvulso2").show(); 
		  $("#msgComCadastro").hide();  
		  $("#msgSemCadastro").hide();		  
		  $("#msgSemCadastro2").show();  
		  $("#msgComCadastro2").hide();
		  $("#msgBloqueio").hide();
      $("#pessoajuridica").hide();
      $("#pf_cpf").val(nrodocumento);
      $("#pessoafisica").show();
      } 	      
    },
    error: function(res) {
      console.log(res); 
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
  $.ajax({
    type: "GET",
    // url: "../transaction/transactionClientes.php",
    url: "transaction/transactionClientes.php",
    data: {
      metodo: "searchVinculo",
      vSCLICNPJ: nrodocumento
    },
    dataType: "json",
    success: function(res) {
	  console.log(res);	
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
	  }  else if (res.inadimplente === 'S'){	
		 var CLICODIGO = res.dados.CLICODIGO
		   var CLINOMEFANTASIA  = res.dados.CLINOMEFANTASIA;		 
		document.querySelector('#lblCliente3').textContent = CLINOMEFANTASIA;
		 $("#divAviso").show();    
		  $("#divInadimplente").show();   
		$("#divAvisoEspecial").hide(); 		  
		 $("#msgComCadastro").hide();  
		 $("#msgSemCadastro").hide();
		  $("#msgAvulso").hide(); 
		 $("#msgBloqueio").hide();
		 $("#pessoafisica").hide();
		  $("#pessoajuridica").hide();  
			
	  } else if (res.contrato === 'S'){	
		   var CLICODIGO = res.CLICODIGO
		   var CLINOMEFANTASIA  = res.CLINOMEFANTASIA;
		   
		 $("#divAviso").show();    
		 $("#divAvisoEspecial").hide(); 
		 $("#divInadimplente").hide();   
		 $("#msgComCadastro").hide();  
		 $("#msgSemCadastro").hide();
		  $("#msgAvulso").hide(); 
		 $("#msgBloqueio").show();
		 $("#pessoafisica").hide();
		  $("#pessoajuridica").hide(); 
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
        "",
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
    console.log("teste ubistart 5");	
    
      if (res.status == "success") {
        document.getElementById("pessoajuridica").reset();
        document.getElementById("pessoafisica").reset();
        // window.location.href = `/sem-vinculo-com-cadastro/${
        window.location.href = `sem-vinculo-com-cadastro/${
          res.id
        }/curso/${curso_id}`;
      } else {
        swal("", res.msg, "error");
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
    // url: "../transaction/transactionEnderecos.php",
    url: "transaction/transactionEnderecos.php",
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