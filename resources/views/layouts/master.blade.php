<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{!!config("ayarlar.aciklama") !!}">
    <meta name="keywords" content="{!! config("ayarlar.keywords") !!}">
    <meta name="author" content="{!! config("ayarlar.author") !!}">

    <title>{!!config("ayarlar.baslik") !!}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset("vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href={{asset("css/iziToast.min.css")}} rel="stylesheet">
    <link href={{asset("css/bootstrap-toggle.min.css" )}}rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{asset("vendor/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="{{asset("css/clean-blog.css")}}" rel="stylesheet">
    <link href="{{asset("css/custom.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src={{asset("https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js")}}></script>
    <script src={{asset("https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js")}}></script>
    <![endif]-->
    <script>
        window.csrfToken = "{{ csrf_token() }}"
    </script>


</head>

<body data-status="{{Session::get("durum")}}">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
   <div class="col-md-12 ">
    <div class="container-fluid text-align: right;" id="topbar" >
        <div class="row">
            <div style="float:right!important">
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="/"><i class="fa fa-home"></i>Anasayfa</a></li>
                    @if(Auth::guest())
                    <li><a href="/login" class="uyelik-tus"><i class="fa fa-sign-in"></i>Üye Girisi</a></li>
                    <li><a href="/register" class="uyelik-tus"><i class="fa fa-users"></i>Üye ol</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                @if(Auth::user()->yetkisi_var_mi("admin"))
                                    <li><a href="{{ url('/site-ayarlari') }}"><i class="fa fa-btn fa-wrench"></i>Site Ayarları</a></li>
                                    <li><a href="{{ url('/user') }}"><i class="fa fa-btn fa-users"></i>Kullanıcılar</a></li>
                                    <li><a href="{{ url('/kategori') }}"><i class="fa fa-btn fa-cube"></i>Kategoriler</a></li>
                                    <li><a href="{{ url('/makale') }}"><i class="fa fa-btn fa-list-ol"></i>Tüm Makaleler</a></li>
                                    <li><a href="{{ url('/talep') }}"><i class="fa fa-btn fa-envelope-o"></i>Yazarlık Talepleri</a></li>
                                    <li class="divider"></li>
                                @endif
                                @if(Auth::user()->yetkisi_var_mi("author"))
                                    <li><a href="{{ url('/makalem') }}"><i class="fa fa-btn fa-list"></i>Makalelerim</a></li>
                                    <li><a href="{{ url('/makalem/create') }}"><i class="fa fa-btn fa-plus"></i>Yeni Makale Ekle</a></li>
                                @endif
                                @if(!Auth::user()->yetkisi_var_mi("admin") && !Auth::user()->yetkisi_var_mi("author"))
                                    <li><a href="{{ url('/yazarlik-talebi') }}"><i class="fa fa-btn fa-envelope"></i>Yazarlık Talebi</a></li>
                                @endif
                                    <li>
                                        <a href="#"
                                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                            <i class="fa fa-btn fa-sign-out"></i>Çıkış
                                        </a>
                                        <form id="logout-form"
                                              action="{{ route("logout") }}"
                                              method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="col-md-12"></div>
        <a class="navbar-brand" href="/">{!!config("ayarlar.baslik") !!}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="">PHP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">HTML</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">LARAVEL</a>

                </li>
            </ul>
        </div>
    </div>
   </div>
</nav>

@yield('icerik')
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="{!! config("ayarlar.twitter") !!}">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{!! config("ayarlar.facebook") !!}">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{!! config("ayarlar.github") !!}">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
            </div>
        </div>
    </div>
</footer>




<!-- jQuery -->
<script src="{{asset("vendor/jquery/jquery.min.js")}}"></script>

<!-- Bootstrap Core JavaScript -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset("js/switch.js")}}"></script>

<!-- Theme JavaScript -->
<script src="{{asset("js/summernote.min.js")}}"></script>
<script src="{{asset("js/summernote-bs4.js")}}"></script>
<script src="https://unpkg.com/popper.js@^1"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="{{asset("js/laravel-delete.js")}}"></script>
<script src="{{asset("js/clean-blog.js")}}"></script>
<script src={{asset("js/custom.js")}}></script>
<link href={{asset("js/bootstrap-toggle.min.js" )}}rel="stylesheet">
<script src="{{asset("js/summernote-tr-TR.js")}}"></script>
<script src={{asset("ckeditor/ckeditor.js")}}></script>



</body>



