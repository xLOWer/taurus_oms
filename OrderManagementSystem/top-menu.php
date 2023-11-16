<nav id="main-nav-menu" class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TAURUS OMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="http://localhost/OrderManagementSystem/#">Главная</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Списки</a>
          <ul class="dropdown-menu"> 
            <li><a class="dropdown-item" href="#">Клиенты</a></li>
            <li><a class="dropdown-item" href="#">Операции</a></li>
            <li><a class="dropdown-item" href="#">Заказы</a></li>
            <li><a class="dropdown-item" href="#">Услуги</a></li> 
            <li><a class="dropdown-item" href="#">Группы услуг</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Адреса</a></li>
            <li><a class="dropdown-item" href="#">Чеки</a></li>
            <li><a class="dropdown-item" href="#">Устройства</a></li>
            <li><a class="dropdown-item" href="#">Типы устройств</a></li>
            <li><a class="dropdown-item" href="#">Телефоны</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="http://localhost/OrderManagementSystem/view/users/">Пользователи</a></li>
            <li><a class="dropdown-item" href="#">Права польз-лей</a></li>
            <li><a class="dropdown-item" href="#">Группы прав</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Быстрые действия</a>
          <ul class="dropdown-menu">
            <li><a  class="dropdown-item"href="#">Создать заказ</a></li>
            <li><a  class="dropdown-item"href="#">Добавить клиента</a></li>

          </ul>
        </li>


      </ul>
    </div>
  </div>
  <button class="btn btn-dark" type="button" onclick="window.location.href='auth.php';">Войти</button>
</nav>