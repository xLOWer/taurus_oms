
<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <?php require 'includes.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ORDER MANAGEMENT SYSTEM</title>
  </head>
  <body>
    <?php require 'top-menu.php'; ?>
    <form>
      <div class="form-floating mb-3">            
          <input id="floatingEmail" type="email" class="form-control">
          <label for="floatingEmail">Адрес электронной почты</label>
      </div>
      <div class="form-floating mb-3">
          <input id="floatingPassword" type="password" class="form-control">
          <label for="floatingPassword">Пароль. От 8 символов (латиница, цифры). Без пробелов и специальных символов</label>
      </div>
      <div class="input-group">
          <span class="input-group-text">ФИО</span>
          <input type="lastname" class="form-control" placeholder="Фамилия">
          <input type="text" class="form-control" placeholder="Имя">
          <input id="patronymic" type="text" class="form-control" placeholder="Отчество">
      </div>
    </form>
    <?php require 'footer.php'; ?>
  </body>
</html>