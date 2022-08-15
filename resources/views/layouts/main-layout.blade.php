<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="/css/containers.css">
    <link rel="stylesheet" href="/css/form-elements.css">
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/media-queries/small-screen.css">
    <link rel="stylesheet" href="/css/media-queries/mobile-screen.css">
    <link rel="stylesheet" href="/css/media-queries/media-queries.css">
    <script src="https://kit.fontawesome.com/5a2943b82b.js" crossorigin="anonymous"></script>
    <title>IT Help Desk V2</title>
</head>
<body>
    <nav class="main-navbar">
        <ul class="nav-list">
            <li class="nav-item home-logo">
                <a href="/"><img src="/images/logo.jpg" alt=""></a>
            </li>
            <li class="nav-item">
                <a href="/" class="{{ Request::is('/') ? 'nav-active' : '' }}">Home</a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)">About</a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" onclick="updateNotifStatus()">Contact</a>
            </li>
            @if(session('UserType') != 'SuperAdmin')
                <li class="nav-item">
                    <a href="/change-password">Change Password</a>
                </li>
            @endif
            
            
            @if(session('UserType') == 'SuperAdmin')
                <li class="nav-item">
                    <a href="/administration" class="{{ Request::is('administration') ? 'nav-active' : '' }}">Administration</a>
                </li>
            @endif

            <li class="nav-item notif-icon">
                <a href="javascript:void(0)">
                    <i class="fa-solid fa-bell"></i>
                    <span class="" id="notification-counter"></span>
                </a>
                <div class="notification-content">
                    {{-- DATA GOES HERE USING AXIOS --}}
                </div>
            </li>

            <li class="nav-item logout-form">
                <form action="/logout" method="POST">
                    {{ csrf_field() }}
                    {{-- <a href="/logout">Logout</a> --}}  
                    <button class="btn-logout" type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav>
    
    <div class="wrapper" id="wrapper">
        <div class="side"></div>
        <div class="content">
            @yield('content')
        </div>
        <div class="side"></div>
    </div>
    <footer class="main-footer">
        <p>Finden Technologies Inc. - IT Department - <i class="far fa-copyright"></i> 2022</p>
    </footer>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/axios.min.js"></script>
    <script src="/js/chart.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/custom-datatables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="/js/filesaver.js"></script>
    <script src="/js/scripts.js"></script>
    <script src="/js/reports.js"></script>
    <script src="/js/small-screen.js"></script>
</body>
</html>