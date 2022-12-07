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
       
        
        <br><br>
        <h1 id="titulo" style="padding-top: 10%">Math Way</h1>
        <br>
        
        <div class="button_cont" align="center"><a class="example_e" style="width: 220px;" onclick="window.location.href='mathwayjogo.php'" target="_blank" rel="nofollow noopener">Jogar</a></div>  <br>     
        <div class="button_cont" align="center"><a class="example_e" style="width: 220px;" onclick="window.location.href='mathwayranking.php'" target="_blank" rel="nofollow noopener">Ranking</a></div>     <br>   
        <div class="button_cont" align="center"><a class="example_e" style="width: 220px;" onclick="window.location.href='mathwayajuda.php'" target="_blank" rel="nofollow noopener">Como jogar?</a></div>   <br>        
        <div class="button_cont" align="center"><a class="example_e" style="width: 220px;" onclick="window.location.href='../index.php'" target="_blank" rel="nofollow noopener">Voltar para o REMAT</a></div>        
    <div id="area_jogo" style="display: none;">

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4" style="visibility: collapse;">
                        <img src="..." class="card-img" alt="imagem em php">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 id="idpergunta" class="card-title">Pergunta número (id em php)</h5>
                            <p id="txtpergunta" class="card-text">Pergunta em php</p>
                        </div>
                    </div>
                </div>
            </div>
        
        <br>
        <table id="tabela_jogo">
            <tr>
                <td>
                    <button onclick="clicou(this.id);" id="pergunta1" class="button">Texto 1</button>
                </td>
                <td>
                    <button onclick="clicou(this.id);" id="pergunta2" class="button">Texto 2</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button onclick="clicou(this.id);" id="pergunta3" class="button">Texto 3</button>
                </td>
            </tr>
        </table>
        
        <br>
        <progress id="barra_tempo" value="150" max="150"></progress>
        <br><br>
        <table id="stats">
            <tr>
                <th>Certas</th>
                <th>Restantes</th>
                <th>Tempo</th>
            </tr>
            <tr>
                <td id="certas">0</td>
                <td id="restantes">10</td>
                <td id="tempo">1</td>
            </tr>
        </table>
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
    
    
    var temp = new Array();
	var dif0 = new Array();
	var dif1 = new Array();
	var dif2 = new Array();

        
    <?php
    $query="SELECT pergunta,r1,r2,r3,rCerta,ajuda,tipoajuda,imagem,dificuldade,topico,id FROM tbl_jogo ORDER BY id ASC";
    $state=$ms->query($query);
    while($row = $state->fetch_array()) { 
    ?>
        temp.push("<?php echo utf8_encode($row["pergunta"]); ?>");
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
    
        if(<?php echo $row['dificuldade'] ?> == 0){
            dif0.push(temp);
	    }
	    else if(<?php echo $row['dificuldade'] ?> == 1){
            dif1.push(temp);
	    }
	    else if(<?php echo $row['dificuldade'] ?> == 2){
            dif2.push(temp);
	    }
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
        document.getElementById("jogar").style.display="none";
        document.getElementById("area_jogo").style.display="";
        prox();
        contagem();
    }

    var certas=0;
    var feitas=0
    var timer;
    function contagem(){
        var reverse_counter = 150;
        timer = setInterval(function(){
            document.getElementById("barra_tempo").value = reverse_counter;
            if(reverse_counter <= 0){
                clearInterval(timer);
                contagem();
                prox();
            }
            reverse_counter -= 1;
        },100);
    }
    
    var esc;
    function clicou(id){
        if (comecou){
            //alert(id);
            esc=document.getElementById(id).innerHTML;
            clearInterval(timer);
            
            feitas++;
            
            if (esc==dif0[c][4]){ //pergunta certa
                certas++;
                document.getElementById("certas").innerHTML=certas;
                
                document.getElementById("area_final").innerHTML+="<h2>Pergunta "+ feitas +": CERTA</h2> Pergunta: "+ dif0[c][0] +"<br>";
                
                //imagem
                if (dif0[c][8]!=""){
                    document.getElementById("area_final").innerHTML+="<img src='"+ dif0[c][7] +"' />";
                }
                
                document.getElementById("area_final").innerHTML+="Tua resposta: "+ esc +"<br><br><br>";
            }
            else{
                document.getElementById("area_final").innerHTML+="<h2>Pergunta "+ feitas +": ERRADA</h2> Pergunta: "+ dif0[c][0] +"<br>";
                
                //imagem
                if (dif0[c][8]!=""){
                    document.getElementById("area_final").innerHTML+="<img src='"+ dif0[c][7] +"' />";
                }
                
                document.getElementById("area_final").innerHTML+="Tua resposta: "+ esc +" Resposta certa: "+ dif0[c][4] +"<br>Ajuda: "+ dif0[c][5] +"<br><br><br>";
            }
            document.getElementById("restantes").innerHTML=10-feitas;
            
            //alert(feitas);
            
            if (feitas >=10){
                acabou();
            }
            else{
                contagem();
                prox();
            }
        }
    }

    function acabou(){
        comecou=!comecou;
        alert("acabou");
        
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
        document.getElementById("idpergunta").innerHTML="Pergunta número " + dif0[c][11]; //id
        document.getElementById("txtpergunta").innerHTML="Pergunta número " + dif0[c][0]; //pergunta
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
    </script>
</html>