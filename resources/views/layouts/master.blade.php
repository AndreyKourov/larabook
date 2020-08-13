
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @section('menu')
        <div class="container-fluid mb-3">
            <div class="row">
                <nav class="mainmenu col-12">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a href="{{url('topic/index')}}" class="nav-link {{$page === 'Main page' ? 'active' : ''}}">Main
                                page</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('block/create')}}" class="nav-link {{$page === 'Forms' ? 'active' : ''}}">Content
                                control</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    @show

    <div class="container">
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>

    @section('footer')
        <div class='container-fluid bg-primary mt-5 py-3 footer'>
            <div class='row'>
                <div class='col-12 text-center'>
                    Footer 2020
                </div>
            </div>
        </div>
    @show

    {{-- Директивы движка blade
        @section  - открывает(создает) именованную секцию
        @show - закрывает именованную секцию, открытую директивой @section и сразу выводит ее содержимое
        @endsection - закрывает именованную секцию, без возможности ее дополнения
        @append - закрывает секцию и добавляет ее содержимое к существующей секции
        @overwrite - закрывает секцию, перезаписывая содержимое с таким же именем
        @yield - выводит содержимое именованной секции, по ее имени
    --}}



    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
