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
        <script src="JS/jquery1.js"></script>
        <script src="JS/jquery2.js"></script>
        <script src="JS/jquery3.js"></script>
        <style>
        h2 {display: inline;}
        p {display: inline;}
        b { font-weight: bold; }
        
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
        <br>
        <div id="voltarmenu1" style="margin-top: 1%; margin-left: 80%; position: absolute; display: none;" class="button_cont" align="center"><a class="example_e" onclick="window.location.href='index.php'" target="_blank" rel="nofollow noopener">Voltar para o menu</a></div>  <br>     

        <p hidden id="nomeee">Ola</p>
        <h1 id="titulo">Math Way</h1>

        <button id="jogar" onclick="jogar();">
        <div style="margin-top: 60%;" class="button_cont" align="center"><a class="example_e" target="_blank" rel="nofollow noopener">Iniciar o jogo</a></div>  <br>

        </button>
        <div id="jogar1" class="button_cont" align="center"><a class="example_e" onclick="window.location.href='index.php'" target="_blank" rel="nofollow noopener">Voltar ao menu</a></div>  <br>
    <div id="area_jogo" style="display: none;">


        <h5 hidden id="idpergunta" class="card-title">Pergunta número (id em php)</h5>
        <h4 style="display: inline;" id="txtpergunta" class="card-text">Pergunta em php</h4><br>
        <div id="fotoperguntaaa"><img style="position: absolute; text-align: center; top: 25%; right: 10%; height: auto; width: 350px;" id="fotoperguntaa"></div>
        
        <br>
    
        <button style="font-size: 16px; background-color: #f44336;width: 230px;height: 70px;" onclick="clicou(this.id); frente(); this.disabled=true;" id="pergunta1" class="button">Texto 1</button><br><br>
        <button style="font-size: 16px; background-color: #f44336;width: 230px;height: 70px;;" onclick="clicou(this.id); esquerda(); this.disabled=true;" id="pergunta2" class="button">Texto 2</button>&nbsp;&nbsp;&nbsp;
        <img id="gifjogo" style="text-align: center; width: 27%; height: 40%" SRC="gif/normal.gif">
        &nbsp;<button style="font-size: 16px; background-color: #f44336;width: 230px;height: 70px;" onclick="clicou(this.id); direita(); this.disabled=true;" id="pergunta3" class="button">Texto 3</button>
        <br><br>
        <div >
        <p id="tempoo" style="font-size: 30px;"> Tempo: 00:00 </p>&nbsp;&nbsp;&nbsp;<p style="font-size: 30px;"> Vidas: </p><img id="vida1" style="width: 4%; height: 10%;" src="img/vida.png"><img id="vida2" style="width: 4%; height: 10%;" src="img/vida.png"><img id="vida3" style="width: 4%; height: 10%;" src="img/vida.png">
        <br>
        <h2> Certas: <p id="certas">0</p> </h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h2> Restantes: <p id="restantes">15</p> </h2>
        </div>
    </div>
    <div id="area_final" style="display: none;">

    </div>
    </body>
    </center>
<script type="text/javascript">
    
    /*vetor perguntas
        0 -> pergunta
        1 -> resposta 1
        2 -> resposta 2
        3 -> resposta 3
        4 -> resposta 4
        5 -> resposta certa
        6 -> ajuda
        7 -> tipoajuda
        8 -> imagem
        9 -> dificuldade
        10 -> topico
        11 -> id
    */
    
    let seconds = 0;
    let minutes = 0;
    let displaySeconds = 0;
    let displayMinutes = 0;
    let interval = null;
    var temp = new Array();
	var dif0 = new Array();
	var dif1 = new Array();
	var dif2 = new Array();

    <?php
    $query="SELECT pergunta,r1,r2,r3,rCerta,ajuda,tipoajuda,imagem,dificuldade,topico,id FROM tbl_jogo WHERE topico='casos' ORDER BY id ASC";
    $state=$ms->query($query);
    while($row = $state->fetch_array()) { 
    ?>
        temp.push("<?php echo $row["pergunta"]; ?>");
        temp.push("<?php echo $row["r1"]; ?>");
        temp.push("<?php echo $row["r2"]; ?>");
        temp.push("<?php echo $row["r3"]; ?>");
        temp.push("<?php echo $row["rCerta"]; ?>");
        temp.push("<?php echo $row["ajuda"]; ?>");
        temp.push("<?php echo $row["tipoajuda"]; ?>");
        temp.push("<?php echo $row["imagem"]; ?>");
        temp.push("<?php echo $row["dificuldade"]; ?>");
        temp.push("<?php echo $row["topico"]; ?>");
        temp.push("<?php echo $row["id"]; ?>");
        dif0.push(temp);
        temp = [];
        <?php
    } 
    $state->free();
    ?>
   
    shuffle(dif0);
    shuffle(dif1);
    shuffle(dif2);
    console.log(dif0);
    console.log(dif1);
    console.log(dif2);
        
    function shuffle(array) {
        var currentIndex = array.length, temporaryValue, randomIndex;
        while (0 !== currentIndex) {
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
        }
        return array;
    }
        
    var comecou=false;
    function jogar(){
        comecou=true;
        document.getElementById("voltarmenu1").style.display="";
        document.getElementById("jogar").style.display="none";
        document.getElementById("jogar1").style.display="none";
        document.getElementById("area_jogo").style.display="";
        interval = window.setInterval(stopWatch, 1000);
        prox();
    }

    var certas=0;
    var feitas=0
    var timer;
    var vidas = 3;
    let status = "";
    function stopWatch(){
        if(status!="stopped"){
            seconds++;
            if(seconds / 60 === 1){
                seconds = 0;
                minutes++;
            }
            if(seconds < 10){
                displaySeconds = "0" + seconds.toString();
             }
            else{
                displaySeconds = seconds;
            } 

            if(minutes < 10){
                displayMinutes = "0" + minutes.toString();
            }
            else{
                displayMinutes = minutes;
            }
            document.getElementById("tempoo").innerHTML = "Tempo: " + displayMinutes + ":" + displaySeconds;
            }
    }   

    var esc;
    var acertouinterrogacao;
    document.getElementById("area_final").innerHTML +="<h2> Resumo de jogo </h2><br><br>";
    document.getElementById("area_final").innerHTML +="<p style='font-size: 30px;' id='tempofinal'> </p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    document.getElementById("area_final").innerHTML +="<p style='font-size: 30px;'> Respostas Certas: <p style='font-size: 30px;' id='certasfinal'> </p></p><br><br>";
    document.getElementById("area_final").innerHTML +="<h2> Perguntas erradas: </h2><br><br>";
    function clicou(id){
        
        if (comecou && document.getElementById("gifjogo").src == "http://www1.cic.pt/~usr72/remat/start/mathway/gif/normal.gif"){
            //alert(id);
            
            esc=document.getElementById(id).innerHTML;
            acertouinterrogacao = 0;
            
            feitas++;
            if (esc==dif0[c-1][4]){ //pergunta certa
                acertouinterrogacao = 1;
                certas++;
                document.getElementById("certas").innerHTML=certas;
            }
            else{

                if (dif0[c-1][7]!=""){
                    var imagemm="<img style='height: auto; width: 200px;' src='../../upload/" + dif0[c-1][7] + "'/><br>";
                }
                else{
                    var imagemm="";
                }

                document.getElementById("area_final").innerHTML+="<div style='background-color: white; display: inline-block; width: 600px; padding: 20px;'><h3>Pergunta "+ feitas + "</h3> <b>Pergunta: </b>"+ dif0[c-1][0] +"<br>" + imagemm + "<b>Tua resposta: </b>"+ esc +" &nbsp;&nbsp;&nbsp;<b>Resposta certa: </b> "+ dif0[c-1][4] +"<br><b>Ajuda: </b><a href="+ dif0[c-1][5] +" target='_blank'>Link</a></div><br><br><br>";
                
                //imagem
                
                sleep(1000).then(() => {
                    document.getElementById("gifjogo").src = "gif/erro.gif";
                });
                sleep(1800).then(() => {
                    document.getElementById("gifjogo").src = "gif/normal.gif";
                });
                /*document.getElementById("area_final").innerHTML+="Tua resposta: "+ esc +" Resposta certa: "+ dif0[c][4] +"<br>Ajuda: "+ dif0[c][5] +"<br><br><br>";
                document.getElementById("area_final").innerHTML+="</div>";*/
                sleep(1800).then(() => {
                if(vidas == 1){
                    vidas--;
                    document.getElementById("vida1").style.visibility="hidden";
                }
                if(vidas == 2){
                    vidas--;
                    document.getElementById("vida2").style.visibility="hidden";
                }
                if(vidas == 3){
                    vidas--;
                    document.getElementById("vida3").style.visibility="hidden";
                }
                if(vidas == 0){
                    feitas=15;
                }
            });
            }
            document.getElementById("restantes").innerHTML=15-feitas;
            
            //alert(feitas);
            sleep(1800).then(() => {
            document.getElementById('pergunta1').disabled=false;
            document.getElementById('pergunta2').disabled=false;
            document.getElementById('pergunta3').disabled=false;
            if (feitas >=15){
                status = "stopped";
                var tempofinal = document.getElementById("tempoo").innerHTML;
                document.getElementById("tempofinal").innerHTML= tempofinal;
                var certasfinal = document.getElementById("certas").innerHTML;
                document.getElementById("certasfinal").innerHTML= certasfinal;
                temposfinal = displayMinutes + ":" + displaySeconds;
                recorde('<?php echo $_SESSION["nome"]; ?>','<?php echo $_SESSION["user"]; ?>',certasfinal,temposfinal);
                registar(3, '<?php echo $_SESSION["user"]; ?>' , certasfinal, "")
                acabou();
            }
            else{
                prox();
            }
        });
        }
        
    }

    var time = 2000;
    var resolve = 0;
    var olaa = document.getElementById("gifjogo").src;
    function sleep (xd) {
        return new Promise((resolve) => setTimeout(resolve, xd));
    }

    function frente(){
        if (document.getElementById("gifjogo").src == "http://www1.cic.pt/~usr72/remat/start/mathway/gif/normal.gif") 
            {
            document.getElementById("gifjogo").src = "gif/frente.gif";
            if(acertouinterrogacao == 1){
                sleep(1000).then(() => {
                    document.getElementById("gifjogo").src = "gif/normal.gif";
                });
            }
            
        }
    }

    function esquerda(){
    if (document.getElementById("gifjogo").src == "http://www1.cic.pt/~usr72/remat/start/mathway/gif/normal.gif") 
        {
            document.getElementById("gifjogo").src = "gif/esquerda.gif";
            if(acertouinterrogacao == 1){
                sleep(1000).then(() => {
                    document.getElementById("gifjogo").src = "gif/normal.gif";
                });
            }
        }
    }

    function direita(){
    if (document.getElementById("gifjogo").src == "http://www1.cic.pt/~usr72/remat/start/mathway/gif/normal.gif") 
        {
            document.getElementById("gifjogo").src = "gif/direita.gif";
            if(acertouinterrogacao == 1){
                sleep(1000).then(() => {
                    document.getElementById("gifjogo").src = "gif/normal.gif";
                });
            }
        }
    }

    function acabou(){
        comecou=!comecou;
        
        document.getElementById("area_jogo").style.display="none";
        document.getElementById("area_final").style.display="";
        document.getElementById("area_final").innerHTML+="";
    }
    
    var c=0;
    function prox(){
        rand();
        
        document.getElementById(nums[0]).innerHTML=dif0[c][1]; //pergunta 1
        document.getElementById(nums[1]).innerHTML=dif0[c][2]; //pergunta 2
        document.getElementById(nums[2]).innerHTML=dif0[c][3]; //pergunta 3
        if(dif0[c][7]!= ""){
            document.getElementById("fotoperguntaaa").style.visibility="visible";
            document.getElementById("fotoperguntaa").src = "../../upload/" + dif0[c][7];
        }
        else{
            document.getElementById("fotoperguntaaa").style.visibility="hidden";
        }
        document.getElementById("idpergunta").innerHTML="Pergunta número " + dif0[c][10]; //id
        document.getElementById("txtpergunta").innerHTML= dif0[c][0]; //pergunta
        c++;
    }

    var nums = [];
    function rand() {
        nums = [];
        var random;
        do {
            random = Math.floor(Math.random() * 3) + 1;
            if (!nums.includes(random)) {
                nums.push(random);
            }
        } while (nums.length < 3)
        
        nums[0]="pergunta"+nums[0];
        nums[1]="pergunta"+nums[1];
        nums[2]="pergunta"+nums[2];
    }

    function recorde(nome, numero, certasfinal, temposfinal){
        $.ajax({
            
            type: "POST",
            url: "regista_recorde.php",
            data: {
                nome: nome,
                numero: numero,
                pontos: certasfinal,
                tempo: temposfinal,
            },
            cache: false,
            success: function(data) {
                console.log(data);
            },
            error: function(err){
                console.log(err);
            }

        });
        return false;
    }
    function registar(idjogo, idjogador, pontos, local) {
        var str="";

        str="idjogo=" + idjogo + "&idjogador=" + idjogador + "&pontos=" + pontos + "&link=" + local;
        //alert(str);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "../nucleo.php?op=regista&" + str);
        xmlhttp.send();

    }
    </script>
</html>