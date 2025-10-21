<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @yield('linkcss')
    <title>
        @yield('judul')
    </title>
</head>
<body class="bodys">

    <header class="headz">
        <h2 class="agra">Agra<span style="color: red">Flight</span></h2>
        <nav class="navs">

            @if (Auth::check())
                <a href="{{ route('home.index') }}" class="menugra  {{ Request::is('home*') ? 'active' : '' }}"> Home </a>

                @if ( Auth::user()->role == 'admin' or Auth::user()->role == 'maskapai' )
                    <a href="{{ route('penerbangan.index') }}" class="menugra {{ Request::is('penerbangan*') ? 'active' : '' }}"> Penerbangan </a>
                    <a href="{{ route('bandara.index') }}" class="menugra {{ Request::is('bandara*') ? 'active' : '' }}"> Bandara </a>
                    <a href="{{ route('dakun.index') }}" class="menugra {{ Request::is('dakun*') ? 'active' : '' }}"> Daftar Akun </a>
                @endif

                @if (Auth::user()->role == 'admin')
                    <a href="{{ route('conf.index') }}" class="menugra {{ Request::is('confirmation*') ? 'active' : '' }}"> Confirmation </a>
                @endif

                @if (Auth::user()->role == 'user')
                    <a href="{{ route('transaksi.index') }}" class="menugra {{ Request::is('transaksi*') ? 'active' : '' }}"> Transaksi </a>
                    <a href="{{ route('cekot.index') }}" class="menugra {{ Request::is('checkout*') ? 'active' : '' }}"> Checkout </a>
                @endif

                <a href="{{ route('history.index') }}" class="menugra {{ Request::is('history*') ? 'active' : '' }}"> History </a>

                <button onclick="logout()" class="nama-akun"> {{ Auth::user()->name }} 🔽 </button>

            @else
                <button onclick="login()" class="butoski">
                    Join
                </button>
            @endif

        </nav>
    </header>

    <div class="kesigmaanpubg">
        -
    </div>

    <main class="mainz">
        @yield('main-content')
    </main>

<script>

    function login()
    {
        window.location.href = "register";
    }

    function logout()
    {
        Swal.fire({
        title: "Yakin Ingin Logout?",
        text: "",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya!"
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href="{{ route('logout') }}";
        }
        });
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
