<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <h1 class="nav_logo">
    <a class="navbar-brand" href="/note/">Saba note</a>
  </h1>
  <img src="/assets/img/masaba.png" class="logo">
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーションの切替">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="Navber">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/note/">HOME <span class="sr-only">(現位置)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/note/archives/">ARCHIVES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/note/gallery/">GALLERY</a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          MENU
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">メニュー1</a>
          <a class="dropdown-item" href="#">メニュー2</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">その他</a>
        </div>
      </li>
    </ul>

    <form action="/note/" id="searchform" class="searchform form-inline my-2 my-lg-0">
      <input type="text" name="s" id="s" class="form-control mr-sm-2" placeholder="検索..." aria-label="検索...">
      <button type="submit" id="searchsubmit" class="btn btn-secondary my-2 my-sm-0">検索</button>
    </form>

  </div><!-- /.navbar-collapse -->
</nav>
