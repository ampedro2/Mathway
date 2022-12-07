<html>
    <?php
        header('Content-Type: text/html; charset=utf-8');
        session_start();
        $msg="";
        $numidentificacao=$numcartao=$nome=$apelido=$perfil=$entregue='';
        include('database.php');
    ?>
    
    <head>
        <title>Math Way</title>
        <link rel="shortcut icon" href="img/car.png"/>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="CSS/fastquiz.css">
        <link rel="stylesheet" type="text/css" href="CSS/bootstrap.css">
        
        <!--<script src="JS/fastquiz.js"></script>-->
        <script src="JS/jquery.js"></script>
        <script src="JS/bootstrapjs1.js"></script>
        <script src="JS/bootstrapjs2.js"></script>
        <style>
        .example_e {
        border: none;
background: #404040;
color: #ffffff !important;
font-weight: 100;
padding: 20px;
text-transform: uppercase;
border-radius: 6px;
display: inline-block;
transition: all 0.3s ease 0s;
}
.example_e:hover {
color: #404040 !important;
font-weight: 700 !important;
letter-spacing: 3px;
background: none;
-webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
-moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
transition: all 0.3s ease 0s;
}
body{
    background-image: url("https://www.cartreat.co.uk/wp-content/uploads/2013/02/highway_body_background.jpg");
    background-repeat: no-repeat; /* Do not repeat the image */
    background-size: cover; /* Resize the background image to cover the entire container */
}


        </style>
    </head>
    <center>
    
    <body> <!-- background em php para a loja -->
       
    <div style="margin-top: 2%; margin-left: 80%; position: absolute;" class="button_cont" align="center"><a class="example_e" onclick="window.location.href='index.php'" target="_blank" rel="nofollow noopener">Voltar para o menu</a></div>  <br>     

        <h1 id="titulo" style="">Math Way</h1><br>
        <h3> Como jogar? </h3><br>
        O objetivo do jogo é o jogador acertar o maior número de perguntas no menor espaço de tempo possível.<br>
        São 15 perguntas, e a pontuação é feita a partir do número de perguntas acertadas, sendo o tempo demorado que irá desempatar os jogadores com o mesmo número de respostas certas.<br>
        O carro vai andar na estrada, e a pergunta será colocada, e o jogador terá que escolher em seguir en frente, virar à esquerda ou virar à direita.
        <br>O jogador tem 3 vidas, ou seja ao falhar 3 perguntas o jogo termina e a pontuação é submetida.<br>
        Em baixo, podemos ver o exemplo dos gifs mostrados no jogo quando o carro está a andar e quando é escolhida uma resposta à pergunta e ele vira.<br><br>


        <br>
        <img style="float:left; left: 4%; width: 20%; height: 34%; position: absolute;" SRC="http://www1.cic.pt/~usr72/remat/start/mathway/gif/normal.gif">
        <img style="float:left; left: 28%; width: 20%; height: 34%; position: absolute;" SRC="http://www1.cic.pt/~usr72/remat/start/mathway/gif/esquerda.gif">
        <img style="float:left; left: 52%; width: 20%; height: 34%; position: absolute;" SRC="http://www1.cic.pt/~usr72/remat/start/mathway/gif/direita.gif">
        <img style="float:left; left: 74%; width: 20%; height: 34%; position: absolute;" SRC="http://www1.cic.pt/~usr72/remat/start/mathway/gif/erro.gif">

</html>