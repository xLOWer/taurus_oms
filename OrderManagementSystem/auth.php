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
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Адрес эл. почты</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
          <label for="inputPassword5" class="form-label">Пароль</label>
          <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
      </div>
      <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i>Войти</button>
      <button id="registration" class="btn btn-secondary" onclick="window.location.href='registration.php';">Зарегистрироваться</button>
    </form>

    <?php require 'footer.php'; ?>
  </body>
</html>