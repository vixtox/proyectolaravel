<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">

<head>
    <title>Login</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/resources/css/login.css') }}"
        th:href="@{/resources/css/login.css}">


    <style>
        body {
            background-image: url('{{ asset('img/fondo.jpg') }}');
            background-size: cover;
            background-position: center;
        }

        .main-section {
            margin: 0 auto;
            margin-top: 25%;
            padding: 0;
        }

        .modal-content {
            background-color: #3b4652;
            opacity: .85;
            padding: 0 20px;
            box-shadow: 0px 0px 3px #848484;
        }

        .user-img {
            margin-top: -50px;
            margin-bottom: 35px;
        }

        .user-img img {
            width: 100xp;
            height: 100px;
            box-shadow: 0px 0px 3px #848484;
            border-radius: 50%;
        }

        .form-group input {
            height: 42px;
            font-size: 18px;
            border: 0;
            padding-left: 54px;
            border-radius: 5px;
        }

        .form-group::before {
            font-family: "Font Awesome\ 5 Free";
            position: absolute;
            left: 28px;
            font-size: 22px;
            padding-top: 4px;
        }

        .form-group#user-group::before {
            content: "\f007";
        }

        .form-group#contrasena-group::before {
            content: "\f023";
        }

        button {
            width: 60%;
            margin: 5px 0 25px;
        }

        .forgot {
            padding: 5px 0;
        }

        .forgot a {
            color: white;
        }

        label {
            color: white;
        }
    </style>

</head>

<body>

    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="{{ asset('img/user.png') }}" th:src="@{{ asset('/public/img/user.png') }}" />

                </div>
                <form action="{{ route('login') }}" method="post" class="col-12">
                    @csrf
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" name="email" />
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" />
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login </button>
                </form>
        
                <div class="col-12 forgot">
                    <a href="{{ route('recuperarClave') }}">Olvide contraseña</a>
                    <br><br>
                    {{-- <input type="checkbox" name="recordar">
                    <label>Recordar usuario</label> --}}
                </div>

            </div>
        </div>
    </div>
    </div>
</body>

</html>
