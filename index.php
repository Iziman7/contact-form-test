<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	<title>Тестове завдання</title>
	<style type="text/css">
    * {
			 background: #e3f2fd;
		  }
    </style>
</head>
  <body>
    <div class="row">
      <div class="col">
        <h2 class="text-center py-3">Контактна форма</h2>
        </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-sm-10 offset-md-2 offset-sm-1">
        <div class="msg"></div>
        <div id="form-success" class="alert alert-success" style="display: none;">
          Дякуємо, Ви успішно зареєстровані!
        </div>
        <form method="POST" id="contact-form" class="needs-validation">
          	<div class="form-group">
	            <label for="firstname">Ім'я</label>
	            <input type="text" class="form-control mt-1 mb-1" id="firstname" name="firstname" placeholder="Ваше ім'я">
	            <div class="invalid-feedback">Будь ласка, введіть Ваше ім'я.</div>
        	</div>
        	<div class="form-group">
	            <label class="mt-3" for="lastname">Прізвище</label>
	            <input type="text" class="form-control mt-1 mb-1" id="lastname" name="lastname" placeholder="Ваше прізвище">
	            <div class="invalid-feedback">Будь ласка, введіть Ваше прізвище.</div>
        	</div>
          <div class="form-group">
            <label class="mt-3" for="email">E-mail:</label>
            <input type="email" class="form-control mt-1 mb-1" id="email" name="email" placeholder="name@example.com">
            <div class="invalid-feedback">Будь ласка, введіть валідний email.</div>
        	</div>
          <div class="form-group">
            <label class="mt-3" for="password">Пароль</label>
            <input type="password" class="form-control mt-1 mb-1" name="password" id="password" placeholder="Пароль" required>
            <div class="invalid-feedback">Будь ласка, введіть пароль.</div>
        </div>
          <div class="form-group">
            <label class="mt-3" for="confirmpassword">Повторення пароля</label>
            <input type="password" class="form-control mt-1 mb-1" name="confirmpassword" id="confirmpassword" placeholder="Повторіть пароль">
            <div class="form-text invalid-feedback confirm-message">Будь ласка, повторіть пароль</div>
          </div>
          <div class="text-center mt-3">
          	<input type="submit" name="submit" class="btn btn-primary bt" value="Відправити">
          </div>
        </form>
      </div> 
    </div>

    <script type="text/javascript">
     jQuery("#contact-form").on('submit', function(e){
      e.preventDefault();
       jQuery.ajax({
        url: 'form.php',
        type: 'POST',
        dataType: 'html',
        data: $(this).serialize(),
        success: function(data){
          if(data.indexOf("alert") != -1){
            $('.msg').html(data);
          }else{
            $('.msg').html(data);
            $('#contact-form').hide('slow');
            $('#form-success').show('slow');
          }
        },
         error:function(){
          $('.msg').html('<p>Виникла помилка</p>');
        }
       });
     });
    </script>
  </body>
</html>