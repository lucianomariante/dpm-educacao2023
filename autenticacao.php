<?php

$arrUrl = explode('/', $_SERVER['REQUEST_URI']);
$pageName = $arrUrl[1];
$curcodigo = end(explode("/", $_SERVER['REQUEST_URI']));

if (empty($_SESSION['sICLICODIGO_SITE'])) {
    header("Location:/login/{$curcodigo}");
} else {
    switch ($pageName) {
        case "cursos":
        case "cursos-detalhes":
        case "cursos-inscricao":
        case "cursos-inscricao-clientes":
            // header("Location:/cursos-inscricao/clientes/{$curcodigo}");
            header("Location:cursos-inscricao/clientes/{$curcodigo}");
            break;
        case "curso-lista-espera":
            header("Location:/cursos/lista-espera/{$curcodigo}");
            break;
        default:
            header("Location:/identificacao-acesso/{$curcodigo}");
            break;
    }
}