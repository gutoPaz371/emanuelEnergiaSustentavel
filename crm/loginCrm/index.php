<?php
	include '../../crud/config/conexao.php';
$av=false;
	if(isset($_POST['send'])){
		$pass=$_POST['pass'];
		
		if(isset($_POST['key'])){
			$key=$_POST['key'];
			$keyBD=mysqli_fetch_assoc($cn->query("SELECT senha FROM crm"));
			$keyBD=$keyBD['senha'];
			if(superHash($pass,$key)===$keyBD){
				session_start();
				$_SESSION['login']=true;
				header('location:../public/home.php');
				#echo 'usuario Logado';  
			}else{
				$av=true;
			}
		}else{
			$lodin=false;
			$av=true;
		}
		
	}else{
		$lodin=false;
	}
	function superHash($pass,$key){
		$y=0;
		while($y<$key){
			$pass=md5($pass);
			$y=$y+1;
		}return $pass;
	}//superHash(null,12);

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Administração <br>Franquias Emanuel</h3>
				  
		      	<form action="" class="signin-form" method="post">
	            <div class="form-group" style="text-align:center;">
	              <input id="password" name="pass" style="text-align:center;" type="password" class="form-control" placeholder="*****"><br>
				  <input id="password" name="key" style="text-align:center;" type="password" class="form-control" placeholder="*****">
				  <label  id="txt" <?php if(!$av)echo 'hidden';$av=false; ?> style="color:red ;">Acesso Negado!!!</label>
	            </div>
	            <div class="form-group">
	            	<button name="send" type="submit" class="form-control btn btn-primary submit px-3">Entrar</button>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>
	<script>
		

  	function logi(){
		let txt=document.getElementById('spinner');
		txt.hidden=false;
	}

  function verifiPass(st,msg,cor){
			let pass=document.getElementById('password');
			let txt=document.getElementById('txt');
			if(st){
				txt.innerHTML=msg;
				txt.style.color=cor;
				pass.style.borderColor=cor;
				txt.hidden=false;
				st=false;
				return true;
				console.log('ok');
			}else{
				console.log('else');
			}
		}//verifiPass(true,'teste','red');
		const toastTrigger = document.getElementById('liveToastBtn')
			const toastLiveExample = document.getElementById('liveToast')
			if (toastTrigger) {
			toastTrigger.addEventListener('click', () => {
				const toast = new bootstrap.Toast(toastLiveExample)

				toast.show()
			})
			}
	</script>
	<?php
		function x(){
			echo "<script>logi();</script>";
		}
	?>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

	</body>
</html>

