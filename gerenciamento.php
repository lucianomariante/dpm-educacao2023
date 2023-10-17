<?php
require_once 'include/constantes.php';

$url        = $_GET['url'];
$url        = rtrim($url, '/');
$parametros = explode('/', $url);
$arquivo    = $parametros[0];

// print_r($parametros[2]);exit;

if ($arquivo != '') {
    if ($arquivo == 'blog' && !empty($parametros[1])) {
        require_once 'blog-post.php';
    } elseif ($arquivo == 'cliente-com-login-e-senha') {
        require_once 'cliente-com-login-e-senha.php';
    } elseif ($arquivo == 'cliente-sem-login-e-senha' && !empty($parametros[1])) {
        require_once 'cliente-sem-login-e-senha.php';
    } elseif ($arquivo == 'cliente-sem-vinculacao' && !empty($parametros[1])) {
        require_once 'cliente-sem-vinculacao.php';
    } elseif ($arquivo == 'sem-vinculo-com-cadastro' && !empty($parametros[1]) && $parametros[2] == 'curso' && !empty($parametros[3])) {
        require_once 'entidades-empresas-sem-vinculacao-com-cadastro.php';
    } elseif ($arquivo == 'confirmacao-inscricao') {
        require_once 'confirmacao-inscricao.php';
    } elseif ($arquivo == 'corpo-docente' && !empty($parametros[1])) {
        require_once 'corpo-docente-detalhe.php';
    } elseif ($arquivo == 'corpo-docente') {
        require_once 'corpo-docente.php';
    } elseif ($arquivo == 'cursos' && $parametros[1] == 'area' && !empty($parametros[2])) {
        require_once 'cursos-por-area-tecnica.php';
    } elseif ($arquivo == 'cursos' && $parametros[1] == 'impressao' && !empty($parametros[2])) {
        require_once 'curso-detalhe-impressao.php';
    } elseif ($arquivo == 'cursos' && $parametros[1] == 'lista-espera' && !empty($parametros[2])) {
        require_once 'curso-lista-espera.php';
    } elseif ($arquivo == 'cursos' && !empty($parametros[1])) {
        require_once 'curso-detalhe.php';
    } elseif ($arquivo == 'cursos-in-company') {
        require_once 'cursos-in-company.php';

    } elseif ($arquivo == 'cursos-inscricao' && $parametros[1] == 'clientes' && empty($parametros[3])) {
        // require_once 'manutencaoTemp.php';
        require_once 'cursos-inscricao-clientes-logados.php';
    } elseif ($arquivo == 'cursos-inscricao' && $parametros[1] == 'clientes' && $parametros[3] == 'admin') {
        require_once 'cursos-inscricao-clientes-logados.php';

    } elseif ($arquivo == 'cursos-inscricao' && $parametros[1] == 'nao-cadastrado' && empty($parametros[2])) {
        // require_once 'manutencaoTemp.php';
        require_once 'inscricao-cliente-nao-cadastrado.php';    
    } elseif ($arquivo == 'cursos-inscricao' && $parametros[1] == 'nao-cadastrado' && $parametros[2] == 'admin') {
        require_once 'inscricao-cliente-nao-cadastrado.php';    

    } elseif ($arquivo == 'fale-conosco') {
        require_once 'fale-conosco.php';

    } elseif ($arquivo == 'identificacao-acesso' && empty($parametros[2])) {
        // require_once 'manutencaoTemp.php';
        require_once 'identificacao-acesso.php';
    } elseif ($arquivo == 'identificacao-acesso' && $parametros[2] == 'admin') {
        require_once 'identificacao-acesso.php';
    } elseif ($arquivo == 'inscricao-concluida' && !empty($parametros[1]) && $parametros[2] == 'curso') {
        require_once 'inscricao-concluida.php';
    } elseif ($arquivo == 'informacoes') {
        require_once 'informacoes.php';
    
    } elseif ($arquivo == 'login') {
        require_once 'login-cliente-cadastrado.php';
    
    } elseif ($arquivo == 'nossos-numeros') {
        require_once 'nossos-numeros.php';
    } elseif ($arquivo == 'politica-privacidade') {
        require_once 'politica-privacidade.php';
    } elseif ($arquivo == 'quem-somos') {
        require_once 'quem-somos.php';
    } elseif ($arquivo == 'trabalhe-conosco') {
        require_once 'trabalhe-conosco.php';
    } elseif ($arquivo == 'home') {
        require_once 'index.php';
    } elseif (is_file($arquivo . '.php')) {
        require_once $arquivo . '.php';
	} else if ((strpos($arquivo, '.pdf') === false) || (strpos($arquivo, '.docx') === false) ) { // note: três sinais iguais
		//
    } else {
        require_once 'index.php';
    }
} else {
    require_once 'index.php';
}