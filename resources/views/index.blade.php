<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Steam DB status</title>

        <!-- Custom fonts for this template-->
        <link href="{{ mix('css/all.css') }}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ mix('css/sb-admin-2.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

    </head>

    <body id="page-top">
        @if (Auth::check())
            <script>
                window.Laravel = {!!json_encode([
                'isLoggedin' => true,
                'user' => Auth::user()
            ])!!}
            </script>
        @else
            <script>
                window.Laravel = {!!json_encode([
                'isLoggedin' => false
            ])!!}
            </script>
        @endif
        <div id="app">
            <div id="wrapper">

                <!-- Sidebar -->
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                    <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="fas fa-laugh-wink"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3">Steam DB</div>
                    </a>

                    <li class="nav-item">
                        <router-link class="nav-link" to="/">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </router-link>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle" @click="$router.go(-1)"></button>
                    </div>

                </ul>
                <!-- End of Sidebar -->
                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">
                    <!-- Main Content -->
                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
<script>

    export default {

        name: "App",
        data() {
            return {
                isLoggedIn: false,
                userName: '',
            }
        },
        created() {
            if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }

            if (window.Laravel.user) {
                this.userName = window.Laravel.user.name
            }

        },
        methods: {
            logout(e) {
                e.preventDefault()
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('/api/logout')
                        .then(response => {
                            if (response.data.success) {
                                window.location.href = "/"
                            } else {
                                console.log(response)
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                })
            }
        },
    }
</script>
