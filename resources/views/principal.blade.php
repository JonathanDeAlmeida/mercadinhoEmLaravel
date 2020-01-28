<html>
<head>
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <style>
        .alert {
            position: fixed;
            bottom: 0;
            right: 10px;
            padding: 5px 10px;
        }
        button {
            text-transform: uppercase;
        }
        strong {
            display: block;
            font-size: 20px;
            font-weight: bold;
            padding: 10px 0;
        }
        input {
            display: inline-block;
            margin-bottom: 10px;
            width: 100%;
        }
        select {
            width: 50%;
            height: 30px;
        }
        p {
            text-align: center;
        }
        a {
            color: white;
            text-decoration: none !important;
            padding: 0 20px;
            text-transform: uppercase;
        }
        a:hover {
            color: white;
        }
        .linkCadastro {
            font-size: 11px;
            color: black;
            font-weight: bold;
        }
        .linkCadastro:hover {
            color: #17a2b8;
        }
        .linkLogin {
            font-size: 16px;
            color: black;
            font-weight: bold;
        }
        .linkLogin:hover {
            color: #17a2b8;
        }
    </style>
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
</html>
