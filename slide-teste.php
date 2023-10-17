<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
 
<script>
    
window.location = "#wall-1";    
</script>
    
<style>
.container{
    width: 150px;
    height: 150px;
}

.wall{
    display: none;
    width: 100%;
    height: 100%;
}

/* Corzinha de fundo para diferenciar */
.wall-1{ background-color: #f00; }
.wall-2{ background-color: #0f0; }
.wall-3{ background-color: #00f; }

.wall:target{
    display: block;
}    
    
</style>    
    
</head>

<body>
     
    
    
    
<div class="container">
    <div class="wall wall-1" id="wall-1">
        <a href="#wall-3">Voltar</a>
                                 <div class="row pt-2 mb-3" style="border-bottom: 1px solid #d9d9d9; padding-bottom: 2rem !important;">
                              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0"><img src="imgs/noticia-01.jpg" width="100%" alt=""/></div>
                            
                              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pt-0 text-justify">
                                  <div class="text-sub-title-20 roboto-bold text-blue-theme pb-2 xs-pt-20 xxs-pt-20"  style="line-height: 22px">DPM Educação realiza palestra aos servidores municipais de Alegrete/RS</div>

                                  <div class="text-sub-title-15 pb-3 roboto-regular" style="line-height: 18px">      
                                  Na última sexta-feira (dia 25/10/2019) o Diretor Técnico da DPM Educação, Profº. Júlio César Fucilini Pause, esteve presente no Município de Alegrete/RS proferindo palestra aos servidores municipais com o tema “A Nova Previdência Pública”.
                                  </div>

                                  <a href="noticias.php" class="btn-primary text-sub-title-13" style="margin-top: 10px; padding: 5px; border-radius: 5px; text-decoration: none">Leia a íntegra</a>      
                              </div>
                        </div>
        
        
        
        <a href="#wall-2">Avançar</a>
    </div>

    <div class="wall wall-2" id="wall-2">
        <a href="#wall-1">Voltar</a>
        <h1>carrosel numero - 2</h1>
        <a href="#wall-3">Avançar</a>
    </div>

    <div class="wall wall-3" id="wall-3">
        <a href="#wall-2">Voltar</a>
        <h1>carrosel numero - 3</h1>
        <a href="#wall-1">Avançar</a>
    </div>
</div> 
    
</body>
</html>