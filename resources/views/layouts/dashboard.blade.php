<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <!-- link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /-->
       
        <link href=" {{ asset('css/table-style.css') }}" rel="stylesheet" />
        <link href=" {{ asset('css/styles.css') }}" rel="stylesheet" />
       
        <!--script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script -->
        <script src="{{ asset('js/all.min.js') }}"></script>
        
        <style>
            .frame{
            background-color: white;
            margin: 10px;
            padding: 5px 5px 5px 5px;
            border-radius: 3px;
            border-top: 3px solid #d2d6de;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            
            
                  }

            .frame h1{
                
                text-align: center;
                color: #333333;
                background: #FFFFFF;
                text-shadow: 2px 2px 0px #FFFFFF, 5px 4px 0px rgba(0,0,0,0.15);   
            
            }

            .frame h2{
                color: olive;
                text-align: left;
            }

            .frame h3{
                    text-align: center;
                    font-size: 48px;
                    color: #333333;
                    background: #FFFFFF;
                    text-shadow: 2px 2px 0px #FFFFFF, 5px 4px 0px rgba(0,0,0,0.15);

            }

        </style>
   
    </head>
    

    
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark " style="background-color: #3c8dbc;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ route('estudiante.index') }}">SIA Connect</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> 
                       {{ Auth::user()->name }}
                     </a>
                   
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                       
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Salir') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" style="background-color: #1e2c33;" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Principal</div>
                            <a class="nav-link" href="{{route('panel.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Panel de control
                            </a>
                            <div class="sb-sidenav-menu-heading">Administración</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Servicios de aula
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('recurso.index') }}">Recursos y lab's</a>
                                    <a class="nav-link" href="{{ route('biblioteca.index') }}">Biblioteca</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRapido" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Repositorio rápido
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseRapido" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('home.index') }}">Cargar archivo</a>
                                    
                                </nav>
                            </div>
                            
                            
                            <div class="sb-sidenav-menu-heading">Servicios de Aula virtual</div>
                            <a class="nav-link" href="/moodle/moodle">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Ir al aula Moodle
                            </a>
                            
                            <a class="nav-link" href="{{ route('estudiante.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Ir a los servicios SIA
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Bienvenido:</div>
                        Administrador
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content" style="background-color: #ecf0f5">
                
                <main>
                    @yield('content')
                </main>

                    
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script-->
        
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        
        <!-- script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script-->
        <!-- script src="assets/demo/chart-area-demo.js"></script-->
        <!-- script src="assets/demo/chart-bar-demo.js"></script-->
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
        <script src="{{ asset('js/simple-datatables@latest.js') }}" crossorigin="anonymous"></script>
        
        </body>
</html>
