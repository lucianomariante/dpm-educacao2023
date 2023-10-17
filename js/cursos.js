const filterInputCursos = document.getElementById('filter_input_cursos');

filterInputCursos.addEventListener('keyup', filterNamesCursos);

function filterNamesCursos()
{
    const filterValue = document.getElementById('filter_input_cursos').value.toUpperCase();
	var nTamanho = filterValue.length;
	if (nTamanho > 3) {
		$.ajax({
			type: "GET",
			url: "../transaction/transactionCursos.php",
			data: {
			  metodo: "getCursos",
			  vSCURNOME: filterValue
			},
			dataType: "json",
			success: function(data) {
			  if (data) {
				/*$("div.detalhes-hoteis")
				  .removeClass("disable")
				  .addClass("active");*/
				$("#retCursos").html(data);
			  }
			},
			error: function(data) {
			  swal("", "Não foi possível encontrar cursos!", "error");
			}
		  });	
	}
}

function directArea(pIAREA)
{
	window.location.href = "./cursos/area/"+pIAREA;
}	