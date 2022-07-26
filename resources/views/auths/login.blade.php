<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Pondok Yatim dan Dhuafa Yasin As-Salam</title>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset('asset1/assets/img/logo-favicon.png')}}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <div class="logo text-center my-4"><a href="/"><img src="{{asset('asset1/assets/img/logo.png')}}" width="150px"  alt="Logo Viana" class="img-responsive logo" width="200"></a></div>
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">
                                        @if (session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session()->get('success')}}
                                            </div>
                                        @endif
                                        @if (session()->has('error'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('error')}}
                                            </div>
                                        @endif
                                        <form action="/user_login" method="post">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputName" type="text" name="name" placeholder="Username" />   
                                                <label for="inputEmail">Username</label>
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>    
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="text-center mt-4 mb-0">
                                            {{-- <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a> --}}
                                                <div class="d-grid">
                                                    <a> <button class="btn btn-primary" type="submit">Login</button></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/register">Belum punya akun? Register disini!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Pondok Yatim & Dhuafa Yasssin As-Salam</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
