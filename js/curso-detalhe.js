$("ul.listalink li a").on('click', function(event){
    event.preventDefault()
    const link = $(this).attr('href');
    $('html, body').animate({
        scrollTop: $(link).offset().top
    }, 1000);
})

function imprimir()
{
	const conteudo = document.querySelector('.printable').innerHTML,
	tela_impressao = window.open('about:blank');
	tela_impressao.document.write(conteudo);
	tela_impressao.window.print();
	tela_impressao.window.close();
}