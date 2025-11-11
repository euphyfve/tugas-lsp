<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @yield('linkcss')
    <title>@yield('judul') - AgraFlight</title>
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">

    <!-- Modern Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <h2 class="text-2xl font-bold text-slate-800">
                        Agra<span class="text-red-500">Flight</span>
                    </h2>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-1">
                    @if (Auth::check())
                        <a href="{{ route('home.index') }}" 
                           class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                  {{ Request::is('home*') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Home
                        </a>

                        @if ( Auth::user()->role == 'admin' or Auth::user()->role == 'maskapai' )
                            <a href="{{ route('penerbangan.index') }}" 
                               class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                      {{ Request::is('penerbangan*') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                Penerbangan
                            </a>
                            <a href="{{ route('bandara.index') }}" 
                               class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                      {{ Request::is('bandara*') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                Bandara
                            </a>
                            <a href="{{ route('dakun.index') }}" 
                               class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                      {{ Request::is('dakun*') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                Daftar Akun
                            </a>
                        @endif

                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('conf.index') }}" 
                               class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                      {{ Request::is('confirmation*') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                Confirmation
                            </a>
                        @endif

                        @if (Auth::user()->role == 'user')
                            <a href="{{ route('transaksi.index') }}" 
                               class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                      {{ Request::is('transaksi*') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                Transaksi
                            </a>
                            <a href="{{ route('cekot.index') }}" 
                               class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                      {{ Request::is('checkout*') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                Checkout
                            </a>
                        @endif

                        <a href="{{ route('history.index') }}" 
                           class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                  {{ Request::is('history*') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            History
                        </a>

                        <!-- User Dropdown -->
                        <button onclick="logout()" 
                                class="ml-4 px-4 py-2 rounded-lg text-sm font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition-all duration-200 flex items-center gap-2">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                    @else
                        <a href="{{ route('regis.index') }}" 
                           class="px-6 py-2 rounded-lg text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-all duration-200 shadow-sm hover:shadow-md">
                            Join Now
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16 min-h-screen">
        @yield('main-content')
    </main>

    <!-- Scripts -->
    <script>
        function login() {
            window.location.href = "register";
        }

        function logout() {
            Swal.fire({
                title: "Yakin Ingin Logout?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3b82f6",
                cancelButtonColor: "#ef4444",
                confirmButtonText: "Ya, Logout!",
                cancelButtonText: "Batal"
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
