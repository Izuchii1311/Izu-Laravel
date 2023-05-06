<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand me-5" href="/">Izuchii Website.</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "home")? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "posts")? 'active' : '' }}" href="/posts">Postingan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "categories")? 'active' : '' }}" href="/categories">Kategory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "about")? 'active' : '' }}" href="/about">About</a>
          </li>
        </ul>
        {{-- ul untuk login --}}
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
              <a class="nav-link {{ ($active === "login")? 'active' : '' }}" href="/login" class="nav-link">Login <i class="bi bi-box-arrow-in-right"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>