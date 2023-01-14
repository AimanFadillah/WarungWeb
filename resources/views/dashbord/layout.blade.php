<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WarungTukang</title>
    {{-- bosstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
  <body >

    {{-- navbar --}}
    <nav class="navbar navbar-dark fixed-top p-3" style="background-color: #DC0000" >
        <div class="container-fluid">
          <a class="navbar-brand fw-bold"  href="/">Warung<span style="color: #F5EA5A" >Tukang</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" style="background-color: #DC0000 " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title fs-3 text-light" id="offcanvasNavbarLabel">Warung<span style="color: #F5EA5A" >Tukang</span></h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is("beranda") ? 'active' : '' }} " aria-current="page" href="/beranda">Beranda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is("tentang") ? 'active' : '' }} "  href="/tentang">Tentang</a>
                </li>
                @auth
                <li class="nav-item">
                  <a class="nav-link {{ Request::is("dashbord/barang") ? 'active' : '' }} "  href="/dashbord/barang">Dashbord</a>
                </li>
                <li class="nav-item mt-3">
                  <form action="/logout" method="POST" >
                    @csrf
                    <button type="submit" class="text-danger fw-bold btn btn-light p-2"  >Logout</button>
                  </form>
                </li>
                @else
                <li class="nav-item">
                  <a class="nav-link {{ Request::is("login*") ? 'active' : '' }}  " href="/login" >Operator</a>
                </li>
                @endauth
                {{-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li> --}}
                
              </ul>
              {{-- <form class="d-flex mt-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form> --}}
            </div>
          </div>
        </div>
      </nav>

    {{-- main --}}
    <div class="container" style="margin-top: 100px" > 
        @yield('main')
    </div>

    {{-- footer --}}
    <svg style="margin-top: 200px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#820000" fill-opacity="1" d="M0,96L21.8,80C43.6,64,87,32,131,53.3C174.5,75,218,149,262,192C305.5,235,349,245,393,229.3C436.4,213,480,171,524,133.3C567.3,96,611,64,655,48C698.2,32,742,32,785,74.7C829.1,117,873,203,916,229.3C960,256,1004,224,1047,202.7C1090.9,181,1135,171,1178,144C1221.8,117,1265,75,1309,74.7C1352.7,75,1396,117,1418,138.7L1440,160L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>

    {{-- bosstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>