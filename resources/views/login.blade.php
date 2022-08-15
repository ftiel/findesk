<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/login.css">
    <title>Login - ITHELPDESK</title>
    
</head>
<body>
    <div id="id01" class="modal">
        <form class="modal-content animate" action="/login" method="post">
            {{ csrf_field() }}

            <div class="imgcontainer">
                <img src="/images/user-icon.jpg" alt="Avatar" class="avatar">
                <h1>Welcome to MYFINDESK.</h1>
                @if(isset($error))
                    <div class="alert alert-danger" id="error-container">
                        <span><strong>{{ $error }}</strong>. Incorrect <strong>username</strong> or <strong>password.  <a href="javascript:void(0)" id="alert-dismiss" onclick="closeError()">&times;</a></strong></span>
                    </div>
                @endif 
            </div>
      
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>
            
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                    
                <button type="submit">Login</button>
                {{-- <label>
                    <input type="checkbox" name="remember"> Remember me
                </label> --}}
            </div>
        
            <div class="container login-bottom" style="background-color:#e4e4e4">
                <button type="reset" class="cancelbtn">Clear</button>
                {{-- <span class="psw">Forgot <a href="#">password?</a></span> --}}
            </div>
        </form>
    </div>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script>
        function closeError() {
            $('#error-container').hide()
            console.log('WEWEW')
        }
    </script>
</body>
</html>