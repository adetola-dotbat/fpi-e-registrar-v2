<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Xmee | Login and Register Form Html Templates</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/login_assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/login_assets/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/login_assets/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="/login_assets/font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/login_assets/style.css">
</head>

<body>
    <section class="fxt-template-animation fxt-template-layout4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-12 fxt-bg-wrap">
                    <div class="fxt-bg-img" data-bg-image="/login_assets/img/figure/bg4-l.jpg">
                        <div class="fxt-header">
                            <div class="fxt-transformY-50 fxt-transition-delay-1">
                                <a href="login-4.html" class="fxt-logo"><img src="/login_assets/img/logo-4.png"
                                        alt="Logo"></a>
                            </div>
                            <div class="fxt-transformY-50 fxt-transition-delay-2">
                                <h1>Welcome To Our xmee</h1>
                            </div>
                            <div class="fxt-transformY-50 fxt-transition-delay-3">
                                <p>Grursus mal suada faci lisis Lorem ipsum dolarorit more ametion consectetur elit.
                                    Vesti at bulum nec odio aea the dumm ipsumm ipsum that dolocons rsus mal suada and
                                    fadolorit to the dummy consectetur elit the Lorem Ipsum genera.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="fxt-form">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="input-label">Email Address</label>
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="demo@federalpolyilaro.edu.ng" required="required">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="fxt-btn-fill">Send Password Reset Link</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jquery-->
    <script src="/login_assets/js/jquery.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/login_assets/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="/login_assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="/login_assets/js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="/login_assets/js/main.js"></script>

</body>


</html>
