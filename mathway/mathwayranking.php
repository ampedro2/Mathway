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
        .content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 60%;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  text-align: center;
}

.content-table thead tr {
  background-color: black;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
  text-align: center;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody{
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid black;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: orange;
}

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

.imagem1{
    float: left;
}
img{display:block;}

        </style>
    </head>
    <center>
    
    <body> <!-- background em php para a loja -->
    <div style="margin-top: 2%; margin-left: 80%; position: absolute;" class="button_cont" align="center"><a class="example_e" onclick="window.location.href='index.php'" target="_blank" rel="nofollow noopener">Voltar para o menu</a></div>  <br>     

    <br><br><h1 id="titulo" style="">Math Way</h1><br>
    <table class='content-table'>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Posição</th>
      <th scope="col">Nome do Jogador</th>
      <th scope="col">Número</th>
      <th scope="col">Certas</th>
      <th scope="col">Tempo</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $query="SELECT nome, numero, pontos, tempo FROM carcrash_recordes ORDER BY pontos DESC, tempo ASC;";
  $state=$ms->query($query);

  $s = 1;

  while($row = $state->fetch_array() and $s<=10) {
    echo "<tr>";
    echo "<td>" . $s . ".º" . "</td>";
    echo "<td>" . $row["nome"] . "</td>";
    echo "<td>" . $row["numero"] . "</td>";
    echo "<td>" . $row["pontos"] . "</td>";
    echo "<td>" . $row["tempo"] . "</td>";
    echo "</tr>";
    $s++;
    }

  $state->free();

?>
</tbody>
</table>
</body>  
</html>