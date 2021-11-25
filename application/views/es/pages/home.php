<div class="container">
	<div class="row justify-content-center align-items-center vh-100">

	<div class="col-md-4 col-12 bg-green rounded" id="login_form">

		<form id="login-form" class="fw-bolder p-2">

			<div class="row justify-content-center my-4" style="height: 10%;">
				<div class="col-12">
					<div style="display:none" id="login-messages" class="alert alert-danger" role="alert">
					</div>
				</div>
			</div>

			<div class="form-group mt-4">
				<h4 class="fw-bolder text-blue">Iniciar Sesión</h4>
			</div>

			<div class="form-group mt-4">
				<label for="inlineFormInputGroupEmail">Correo electrónico</label>
				<input type="text" id="login_email" name="login_email" class="form-control" id="inlineFormInputGroupEmail" placeholder="Correo electrónico">		
			</div>

			<div class="form-group mt-4">
				<label for="inlineFormInputGroupPassword">Contraseña</label>
				<input type="password" id="login_password" name="login_password" class="form-control" id="inlineFormInputGroupPassword" placeholder="Contraseña">
			</div>

			<div class="form-group w-25 pb-2 mt-4">
				<button type="submit" class="btn btn-sm bg-blue my-1" style="width: 100%;font-weight: bold;margin-bottom:20px !important;">Entrar</button>
			</div>

		</form>

	</div>

	<div class="col-md-2 col-12 text-center">
		<h2 class="fw-bolder">O</h2>
	</div>

	<div class="col-md-4 col-12 bg-blue rounded" id="register_form">
		<form id="register-form" class="fw-bolder p-2">
			<div class="row justify-content-center my-4" style="height: 10%;">
				<div class="col-12 " style="text-align: center;">
					<div style="display:none;" id="register-messages" class="alert alert-danger" role="alert">
					</div>
				</div>
			</div>

			<div class="form-group mt-4">
				<h4 class="fw-bolder text-green">Registrarse</h4>
			</div>

			<div class="form-group mt-4">
				<label for="RegisterInputGroupUsername">Nombre</label>
				<input type="text" id="register_name" name="register_name" class="form-control" id="RegisterInputGroupUsername" placeholder="Nombre">
			</div>

			<div class="form-group mt-4">
				<label for="RegisterInputGroupEmail">Correo electrónico</label>
				<input type="email" id="register_email" name="register_email" class="form-control" id="RegisterInputGroupEmail" placeholder="Correo electrónico">
			</div>

			<div class="form-group mt-4">
				<label for="RegisterInputGroupPassword">Contraseña</label>
				<input type="password" id="register_password" name="register_password" class="form-control" id="RegisterInputGroupPassword" placeholder="Contraseña">
			</div>

			<div class="form-group mt-4">
				<label for="RegisterInputGroupConfPassword">Confirmar contraseña</label>
				<input type="password" id="register_password_confirm" name="register_password_confirm" class="form-control" id="RegisterInputGroupConfPassword" placeholder="Confirmar contraseña">
			</div>

			<div class="form-group mt-4">
				<input type="checkbox" class="form-check-input" id="auto-login" name="auto-login" checked>
				<label class="form-check-label" for="exampleCheck1">Iniciar Sesión Automáticamente</label>
			</div>

			<div class="form-group w-25 pb-4 mt-4">
				<button type="submit"  class="btn btn-sm bg-green" style="width: 100%;font-weight: bold;">Registrar</button>
			</div>

		</form>
		

	</div>
	</div>

	<div class="row justify-content-center align-items-center vh-100">
		<div class="col-md-8 col-6">
			<video id="video" src="<?=base_url();?>assets/videos/presentacion.mp4" poster="<?=base_url();?>assets/img/logo_paper.png" controls playsinline></video>
			<style>
				#video{
					width:100%;
					height:100%;
				}
			</style>
		</div>
	</div>
	
</div>

<script>
$(document).ready(function(){
	$('#login-form').submit(function(e){
		e.preventDefault();
		var login_email = $('#login_email').val();
		var login_password = $('#login_password').val();
		$.ajax({
			method:'POST',
			url:'<?= site_url('users/login');?>',
			dataType:'json',
			data:{
				login_email:login_email,
				login_password:login_password
			},
			success: function(data){ 
				if ( data['error'] == true ){	
				var text = "";
				$.each(data , function(key,value){
					if (key != 'error' && value != ''){
						text += value;
						text += ' | ';
						$(`#${key}`).css('border','1px solid red');
					}
					else if (value == ''){
						$(`#${key}`).css('border','1px solid #ced4da');
					}
				});
				$('#login-messages').css('display','block');
				$('#login-messages').removeClass('alert-success').addClass('alert-danger');
				$('#login-messages').text( text.substr(0,text.length-3) );
				setTimeout(function(){
					$('input').css('border','1px solid #ced4da');
					$('#login-messages').fadeOut('slow');
				},5000);
				}
				else{
					$('#login-form input').css('border','1px solid #ced4da');
					$('#login-messages').css('display','block');
					if ( 'login_success' in data ){
						$('#login-messages').removeClass('alert-danger').addClass('alert-success');
						$('#login-messages').text(data['login_success']);
						window.location.replace( '<?=$url;?>/dashboard' );
						}
					else if ( 'login_failed' in data ){
						$('#login-messages').removeClass('alert-success').addClass('alert-danger');
						$('#login-messages').text(data['login_failed']);
						$('#fofo').css('height' , '650px');
						setTimeout(function(){
							$('input').css('border','1px solid #ced4da');
							$('#login-messages').fadeOut('slow');
						},5000);
					}
				}
			},
			error : function(xhr, status, error){
				$('#login-messages').css('display','block');
				$('#login-messages').removeClass('alert-success').addClass('alert-danger');
				$('#login-messages').text('Encontramos un problema');
				$('#fofo').css('height' , '650px');
				setTimeout(function(){
					$('input').css('border','1px solid #ced4da');
					$('#login-messages').fadeOut('slow');
				},5000);
			}
		});
	});
});


$(document).ready(function(){
	$('#register-form').submit(function(e){
		e.preventDefault();
		var auto_login =  $('#auto-login').is(':checked');
		var register_name  = $('#register_name').val();
		var register_email = $('#register_email').val();
		var register_password = $('#register_password').val();
		var register_password_confirm = $('#register_password_confirm').val();
		$.ajax({
			method:'POST',
			url:'<?= site_url('users/register'); ?>',
			dataType:'json',
			
			data:{
				register_name:register_name,
				register_email:register_email,
				register_password:register_password,
				register_password_confirm:register_password_confirm,
				auto_login : auto_login
			},
			
			success: function(data){ 
				if ( data['error'] == true ){
					var text = "";
					$.each(data , function(key,value){
						if (key != 'error' && value != ''){
							text += value;
							text += ' | ';
							$(`#${key}`).css('border','1px solid red');
						}
						else if (value == ''){
							$(`#${key}`).css('border','1px solid #ced4da');
						}
					});
					$('#register-messages').css('display','block');
					$('#register-messages').removeClass('alert-success').addClass('alert-danger');
					$('#register-messages').text( text.substr(0,text.length-3) );
					$('#register_div').css('height','750px');
					setTimeout(function(){
						$('input').css('border','1px solid #ced4da');
						$('#register-messages').fadeOut('slow');
					},5000);
					setTimeout(function(){
						$('#register_div').css('height','620px');
					},5700);
				}
				else{
					$('#register-form input').css('border','1px solid #ced4da');
					$('#register-messages').css('display','block');
					$('#register-messages').removeClass('alert-danger').addClass('alert-success');
					$('#register-messages').text(data['register_success']);
					$('#register_div').css('height','750px');
					if ( 'auto_login' in data ){
						window.location.replace( '<?=$url;?>/dashboard' );
					}
					setTimeout(function(){
						$('input').css('border','1px solid #ced4da');
						$('#register-messages').fadeOut('slow');
					},5000);
					setTimeout(function(){
						$('#register_div').css('height','620px');
					},5700);
				}
				
			},
			error : function(xhr, status, error){
				$('#register-messages').css('display','block');
				$('#register-messages').removeClass('alert-success').addClass('alert-danger');
				$('#register-messages').text('Encontramos un problema');
				setTimeout(function(){
					$('input').css('border','1px solid #ced4da');
					$('#register-messages').fadeOut('slow');
				},5000);
				setTimeout(function(){
					$('#register_div').css('height','620px');
				},5700);
			}
		});
	}); 
});
	

</script>