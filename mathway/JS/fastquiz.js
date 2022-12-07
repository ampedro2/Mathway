var comecou=false;
function jogar(){
    comecou=true;
    document.getElementById("jogar").style.visibility="collapse";
    document.getElementById("stats").style.visibility="visible";
    prox();
    contagem();
}

var certas=0;
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

function clicou(id){
    if (comecou){
        //alert(id);
        clearInterval(timer);
        contagem();
    
        if (document.getElementById(id).innerHTML=="texto1"){ //selecionar certa em php
            certas++;
            document.getElementById("certas").innerHTML=certas;
        }
    
        prox();
    }
}

function prox(){
    rand();
    document.getElementById(nums[0]).innerHTML="texto1"; //selecionar pergunta em PHP
    document.getElementById(nums[1]).innerHTML="texto2"; //selecionar pergunta em PHP
    document.getElementById(nums[2]).innerHTML="texto3"; //selecionar pergunta em PHP
    document.getElementById(nums[3]).innerHTML="texto4"; //selecionar pergunta em PHP
    document.getElementById("idpergunta").innerHTML="Pergunta número " + "num"; //id em php no numero
}

var nums = [];
function rand() {
    nums = [];
    var random;
    do {
        random = Math.floor(Math.random() * 4) + 1;
        if (!nums.includes(random)) {
            nums.push(random);
        }
    } while (nums.length < 4)
        
    nums[0]="pergunta"+nums[0];
    nums[1]="pergunta"+nums[1];
    nums[2]="pergunta"+nums[2];
    nums[3]="pergunta"+nums[3];
}