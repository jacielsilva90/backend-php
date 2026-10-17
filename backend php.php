
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>titulo</title>
</head>
<body link="blue" alink="green" vlink="red">
	<!-- Navbar -->
	<nav class="">
		<div class="container">
			aaa
		</div>
	</nav>
	<header class="" style=";">
		<div class="container">
			<h1 class="">Bem-vindo</h1>
			<p class=""><h3>Site social</h3> </p>
		</div>
	</header>
	<main class="container">

<?php
/*
A função echo exibe dados no html

As variáveis ​​superglobais do PHP são usadas para dados de formulário. $_GET $_POST

$_SERVER["PHP_SELF"] é uma variável superglobal que retorna o nome do arquivo do script 
que está sendo executado no momento. Deve ser colocada no atributo action html.
o sistema $_SERVER["PHP_SELF"]envia os dados do formulário preenchido para a própria página.


Conectando PHP ao MySQL:
-MySQLi (MySQL aprimorado): Com o MySQLi você precisará reescrever todo o código para mudar o banco.
-PDO (Objetos de Dados PHP): se você precisar migrar seu projeto para outro banco de dados, 
 você só precisa alterar a string de conexão.
 
<?php //-------orientado a objetos - new mysqli
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$conn->close(); //---fechar a conexao
?>

<?php //-------processual - mysqli_connect
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydb";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn); //---fechar a conexao
?>

<?php  //-------pdo
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydb";
try {
  $conn = new PDO("mysql:host=$servername;dbname=,$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$conn = null; //---fechar a conexao
?>

*/
?>


<!--requisiçao ajax php. salvar como html-->
<p><b>comece com nome:</b></p>
<form action="">
  <label for="fname">First name:</label>
  <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)" />
</form>
<p>Suggestions: <span id="txtHint"></span></p>
<?php
/* <!--requisiçao ajax php-->
arquivo gethint.php
$a[] = "Anna";
$a[] = "Brit";
$a[] = "Cind";
$a[] = "Diana";
$a[] = "Eva";
//obter parametro q da url
$q = $_REQUEST["q"];
$hint = "";
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}
echo $hint === "" ? "no suggestion" : $hint;
*/
?>
	<script >
		//requisiçao ajax php
		function showHint(str) { //função mostrar dica. str armazena o input fname
		  if (str.length == 0) {
			document.getElementById("txtHint").innerHTML = "";
			return;
		  } else {
			var xmlhttp = new XMLHttpRequest(); //cria um Objeto request
			xmlhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtHint").innerHTML = this.responseText;
			  }
			};
			xmlhttp.open("GET", "gethint.php?q=" + str, true); //request enviada para gethint.php no servidor
			xmlhttp.send();
		  }
		}
	</script>


<!--Banco de dados ajax. salvar como html-->
<form>
	<select name="users" onchange="showUser(this.value)">
		<option value="">Select a person:</option>
		<option value="1">Peter Griffin</option>
		<option value="2">Lois Griffin</option>
		<option value="3">Joseph Swanson</option>
		<option value="4">Glenn Quagmire</option>
	</select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>
<?php
/*
//Banco de dados ajax
//family.php
$q = intval($_GET['q']);
$con = mysqli_connect('localhost','peter','abc123'); //conexao com o servidor mysql
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM user WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);
echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "<td>" . $row['Age'] . "</td>";
  echo "<td>" . $row['Hometown'] . "</td>";
  echo "<td>" . $row['Job'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
*/
?>
	<script>
		//Banco de dados ajax
		function showUser(str) {
		  if (str == "") {
			document.getElementById("txtHint").innerHTML = "";
			return;
		  } else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtHint").innerHTML = this.responseText;
			  }
			};
			xmlhttp.open("GET","family.php?q="+str,true); //request enviada para family.php no servidor
			xmlhttp.send();
		  }
		}
	</script>
	
	</main>
	<footer><p>rrr</p></footer>
</body>
</html>
