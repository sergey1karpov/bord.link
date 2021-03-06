<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{$user->name}} video</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{$user->name}} video"/>
    <meta name="keywords" content="Your collection of microservices for social networks"/>

    <!-- Open Graph tags-->
    <meta property="og:title" content="{{$user->name}} video" />
    <meta property="og:url" content="http://www.bord.link" />
    <meta property="og:site_name" content="bord.link" />
    <meta property="og:description" content="{{$user->name}} video" />
    <meta property="og:image" content="{{$post->img_link ?? asset('img/logo4.png')}}"/>
    <meta property="og:type" content="website" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9bd26323f9.js" crossorigin="anonymous"></script>

    <!-- Favicon-->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">

    <!-- Bootstrap and CSS-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jaldi&display=swap" rel="stylesheet">

    <script src="{{asset('js/clipboard.min.js')}}"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;500&display=swap" rel="stylesheet">

    <!-- $user->about & $user->site font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@00&display=swap" rel="stylesheet">
</head>
<body>

{{--<div class="media-heading fixed-top d-lg-none" style="background-color: rgba(255,255,255,0.9)">--}}
{{--    <img src="{{asset('img/footer/menu.png')}}" class="img-fluid float-right  margins" width="30" data-toggle="modal" data-target="#mobileNav">--}}
{{--    --}}{{--    <small class="float-right  margins" style="margin-top: 5px"></small>--}}
{{--    <a href="{{route('profile', ['id' => $user->nickname])}}" style="color: black; text-decoration: none">--}}
{{--        <h5 class="margins mt-1" style="margin-bottom: 0">{{$user->name}}--}}
{{--            @if($user->verify)--}}
{{--                <img src="{{asset('img/verify.png')}}" class="img-fluid ml-1 mb-1" width="15px" title="???? ??????????????????!">--}}
{{--            @endif--}}
{{--        </h5>--}}
{{--    </a>--}}
{{--</div>--}}

<div class="modal fade" id="mobileNav" tabindex="-1" role="dialog" aria-labelledby="mobileNav" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h6 style="font-family: 'Roboto', sans-serif; font-size: 0.9rem; margin-bottom: 5px">???????????????????????? ???????????????? ????????????</h6>
                <form action="{{route('generateShortLink')}}" method="POST" id="generateShortLinkForm">
                    @csrf
                    <input type="hidden" name="old_link" value="{{route('allVideo', ['id' => $user->id])}}">
                    <button class="btn btn-dark btn-sm" type="submit" id="generateShortLink">Push</button>
                </form>
                <h6 id="showNewLink" class="mt-3"></h6>

                <button class="btn-clipboard btn btn-outline-dark btn-sm mb-2" data-clipboard-target="#showNewLink" style="display: none">
                    ????????????????????
                </button>

                <br>
                <h6 style="font-family: 'Roboto', sans-serif; font-size: 0.9rem; margin-bottom: 2px" >???????????????????? ?? ????????????????</h6>
                <!-- uSocial -->
                <script async src="https://usocial.pro/usocial/usocial.js?v=6.1.4" data-script="usocial" charset="utf-8"></script>
                <div class="uSocial-Share" data-pid="4de7c49aa36779d3776b505ae3bf22cd" data-type="share" data-options="round-rect,style3,default,absolute,horizontal,size32,eachCounter1,counter0,nomobile" data-social="vk,twi,fb,telegram"></div>
                <!-- /uSocial -->
                <br>


            </div>
        </div>
    </div>
</div>

<!--Navbar -->
<div class="col-12 menu left-column fixed-top sticky-top" id="menu">
    <div class="navbar navbar-dark" style="padding-left:8px; padding-right: 8px; background-color: #040404">
        <a style="text-decoration: none" href="{{route('profile', ['id' => $user->nickname])}}">
            <h1 class="display-4" style="font-family: 'Jost', sans-serif; font-size: 1.2em; margin-bottom: 0; color: #f4f4f2; text-transform: uppercase; "><b>{{$user->name}}</b>
                @if($user->verify)
                    <img src="{{asset('img/verify2.png')}}" class="img-fluid ml-1" width="16px" title="Verified Page" style="margin-bottom: 4px">
                @endif
            </h1>
        </a>
        <button style="border: none; background-color: #040404; outline: none; padding-right:0px" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="{{asset('img/footer/menu2.png')}}" class="img-fluid ml-1 " width="20px" title="Menu" style="margin-bottom: 6px">
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item mb-1 mt-1">
                    <div class="card" style="margin-bottom: 0px; background-color: #040404">
                        <div class="card-body" style="padding:0; margin-top:10px">
                            <div class="media">
                                <div>
                                    <div class="img" style="background-image: url({{$user->avatar ?? asset('img/avatar.png')}});"></div>
                                </div>
                                <div class="media-body d-none d-xl-block ml-3">

                                </div>
                                <div class="media-body d-lg-none ml-1 mr-1">
                                    <h1 style="font-family: 'Raleway', sans-serif;font-size: 1em; color: #f7f6f0;">{{$user->about}}</h1>
                                    <h1 style="font-family: 'Raleway', sans-serif;font-size: 1em; color: #f7f6f0;"><a style="color:#f4d3b0;" href="http://{{$user->site}}">{{$user->site}}</a></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @guest
                    <li class="nav-item mt-3">
                        <a style="font-family: 'Jost', sans-serif; font-size: 1.2em; color: #f4d3b0; text-transform: uppercase; padding:0" class="nav-link" href="{{ route('login') }}">{{ __('????????') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item mt-3">
                            <a style="font-family: 'Jost', sans-serif; font-size: 1.2em; color: #f4d3b0; text-transform: uppercase; padding:0" class="nav-link" href="{{ route('register') }}">{{ __('??????????????????????') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown mt-3">
                        <a style="font-family: 'Jost', sans-serif; font-size: 1.2em; color: #f7f6f0; text-transform: uppercase; padding:0" id="navbarDropdown"  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color:#040404">
                            <a style="font-family: 'Jost', sans-serif; font-size: 0.9em; color: #f7f6f0; text-transform: uppercase; padding:0" class="dropdown-item nav-item"  href="{{route('profile', ['id' => Auth::user()->nickname])}}">
                                {{ __('?????? ????????????????') }}
                            </a>
                            @if(\Auth::user()->role_id != 1)
                                <h1 class="mt-1" style="font-family: 'Jost', sans-serif; font-size: 0.9em; color: #f7f6f0; text-transform: uppercase; padding:0"><a style="color:#f4d3b0;" href="{{route('editProfile', ['id' => Auth::user()->id])}}">?????????????????????????? ??????????????</a></h1>
                                <h1 style="font-family: 'Jost', sans-serif; font-size: 0.9em; color: #f7f6f0; text-transform: uppercase; padding:0"><a style="color:#f4d3b0;" href="{{route('allVideo', ['id' => Auth::user()->id])}}">?????? ??????????????????????</a></h1>
                                <h1 style="font-family: 'Jost', sans-serif; font-size: 0.9em; color: #f7f6f0; text-transform: uppercase; padding:0"><a style="color:#f4d3b0;" href="{{route('allAlbums', ['id' => Auth::user()->id])}}">?????? ????????????</a></h1>
                                <h1 style="font-family: 'Jost', sans-serif; font-size: 0.9em; color: #f7f6f0; text-transform: uppercase; padding:0"><a style="color:#f4d3b0;" href="{{route('events', ['id' => Auth::user()->id])}}">?????? ??????????????????????</a></h1>
                                <h1 class="text-muted" style="font-family: 'Jost', sans-serif; font-size: 0.9em; text-transform: uppercase; padding:0">
                                    <a style="color:#f7f6f0" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('??????????') }}
                                    </a>
                                </h1>
                            @else
                                <h1 class="mt-1" style="font-family: 'Jost', sans-serif; font-size: 0.9em; color: #f7f6f0; text-transform: uppercase; padding:0"><a style="color:#f4d3b0;" href="{{route('editProfile', ['id' => Auth::user()->id])}}">?????????????????????????? ??????????????</a></h1>
                                <h1 style="font-family: 'Jost', sans-serif; font-size: 0.9em; color: #f7f6f0; text-transform: uppercase; padding:0"><a style="color:#f4d3b0;" href="{{route('allVideo', ['id' => $user->id])}}">?????? ??????????????????????</a></h1>
                                <h1 style="font-family: 'Jost', sans-serif; font-size: 0.9em; color: #f7f6f0; text-transform: uppercase; padding:0"><a style="color:#f4d3b0;" href="{{route('allAlbums', ['id' => $user->id])}}">?????? ????????????</a></h1>
                                <h1 style="font-family: 'Jost', sans-serif; font-size: 0.9em; color: #f7f6f0; text-transform: uppercase; padding:0"><a style="color:#f4d3b0;" href="{{route('events', ['id' => $user->id])}}">?????? ??????????????????????</a></h1>

                                <h1 class="text-muted" style="font-family: 'Jost', sans-serif; font-size: 0.9em; text-transform: uppercase; padding:0">
                                    <a style="font-family: 'Jost', sans-serif; font-size: 1.2em; color: #f7f6f0; text-transform: uppercase; padding:0" class="dropdown-item nav-item"  href="{{ route('home', ['id' => Auth::user()->id]) }}">
                                        {{ __('??????????????') }}
                                    </a>
                                </h1>
                                <h1 class="text-muted" style="font-family: 'Jost', sans-serif; font-size: 0.9em; text-transform: uppercase; padding:0">
                                    <a style="color:#f7f6f0" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('??????????') }}
                                    </a>
                                </h1>
                            @endif
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</div>
{{--<div class="container-fluid d-none d-xl-block">--}}
{{--    <nav class="navbar navbar-expand-lg navbar-light bg-light ">--}}
{{--        <a class="navbar-brand" href="/"><img src="{{asset('img/logo.png')}}" class="img-fluid mb-1" width="120px;"></a>--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555" aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent-555">--}}
{{--            <ul class="navbar-nav ml-auto nav-flex-icons">--}}
{{--                @if(Auth::check())--}}
{{--                    @if(Auth::user()->avatar)--}}
{{--                        <li class="nav-item avatar">--}}
{{--                            <a class="nav-link p-0" href="#">--}}
{{--                                --}}{{-- <img src="{{Auth::user()->avatar}}" height="35px" width="35px"> --}}
{{--                                <div class="img_avatar" style="background-image: url({{Auth::user()->avatar}});"></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                @endif--}}
{{--                @guest--}}
{{--                    <li class="nav-item">--}}
{{--                        <a style="font-family: 'Jaldi', sans-serif; font-size: 1.2rem; color: #343434; " class="nav-link header-font" href="{{route('blog.index')}}" >Blog</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a style="font-family: 'Jaldi', sans-serif; font-size: 1.2rem; color: #343434; " class="nav-link" href="{{url('/contacts')}}" >Contacts</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item ">--}}
{{--                        <a style="font-family: 'Jaldi', sans-serif; font-size: 1.2rem; color: #343434; " class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                    </li>--}}
{{--                    @if (Route::has('register'))--}}
{{--                        <li class="nav-item">--}}
{{--                            <a style="font-family: 'Jaldi', sans-serif; font-size: 1.2rem; color: #343434; " class="nav-link" href="{{ route('register') }}">{{ __('Registration') }}</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                @else--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="navbarDropdown"  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                            {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                        </a>--}}

{{--                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                            <a class="dropdown-item nav-item"  href="{{route('profile', ['id' => Auth::user()->nickname])}}">--}}
{{--                                {{ __('Profile') }}--}}
{{--                            </a>--}}
{{--                            @if(\Auth::user()->role_id != 1)--}}
{{--                                <a class="dropdown-item nav-item"  href="{{ route('logout') }}"--}}
{{--                                   onclick="event.preventDefault();--}}
{{--                            document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}
{{--                            @else--}}
{{--                                <a class="dropdown-item nav-item"  href="{{ route('home', ['id'=>Auth::user()->id]) }}">--}}
{{--                                    {{ __('Home') }}--}}
{{--                                </a>--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                   onclick="event.preventDefault();--}}
{{--                                document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                @endguest--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--</div>--}}
<!--/.Navbar -->



<div class="container mb-5 allalbums ">
    <div class="col ">
        <div class="">
            <div class="row ">

                @if($user->banner)
                    <div class="col-lg-12 d-none d-xl-block">
                        <div class="card-img card-img__max mb-4 banner img-fluid" style="background-image: url({{$user->banner}});"></div>
                    </div>
                @endif

                <!-- Right Column -->
                <div class="col-lg-12 ">
                    @if(Auth::check())
                    @if(Auth::user()->id == $user->id)
{{--                    <button type="button" class="btn-outline-dark btn-sm mb-4 d-none d-xl-block" data-toggle="modal" data-target="#exampleModalCenter">--}}
{{--                        ?????????????????? ??????????????????????--}}
{{--                    </button>--}}
                    @endif
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">???????????????? ??????????</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                <form action="{{route('addProfileVideo', ['id' => Auth::user()->id])}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input maxlength="100" style="background-color: #CEF6CE" type="text" name="title" class="form-control" placeholder="Alexander Pistoletov - I am a pirate">
                                        <small>????????????\?????????????????????? - ???????????????? ????????</small>
                                    </div>
                                    <div class="form-group">
                                        <textarea maxlength="1000" name="info" id="videoProfile" class="form-control" rows="2"></textarea>
                                        <small>?????????? ???????????????????????????? ???????????????????? ?? 1000 ????????????????</small>
                                    </div>
                                    <div class="form-group">
                                        <textarea maxlength="1000" name="audio" id="videoProfile" class="form-control" rows="2"></textarea>
                                        <small>???????? ???? ???????????? ?? ?????????? ??????????, ???????????????????? ?????????? ??????????????, ?? ?????? ???????? ???????????????? ?????? ???????????? ?? ????????????</small>
                                    </div>
                                    <div class="form-group">
                                        <textarea maxlength="150" style="background-color: #CEF6CE" name="videoProfile" id="videoProfile" class="form-control" rows="2"></textarea>
                                        <small id="emailHelp" class="form-text text-muted ml-2 mt-2">?????????????? ?????????? ?? YouTube ?? ?????????????? https://www.youtube.com/watch?v=RYnFIRc0k6E</small>
                                    </div>
                                    <h6>???????????? ???? ?????????????? ??????????????????????????\?????????????? ???????????? ??????????????</h6>
                                    <div class="form-group">
                                        <input maxlength="150" type="text" name="itunes" class="form-control" placeholder="iTunes">
                                    </div>
                                    <div class="form-group">
                                        <input maxlength="150" type="text" name="applemusic" class="form-control" placeholder="Apple Music">
                                    </div>
                                    <div class="form-group">
                                        <input maxlength="150" type="text" name="vkmusic" class="form-control" placeholder="VK">
                                    </div>
                                    <div class="form-group">
                                        <input maxlength="150" type="text" name="boom" class="form-control" placeholder="Boom">
                                    </div>
                                    <div class="form-group">
                                        <input maxlength="150" type="text" name="yandexmusic" class="form-control" placeholder="Yandex Music">
                                    </div>
                                    <div class="form-group">
                                        <input maxlength="150" type="text" name="googleplay" class="form-control" placeholder="Google Play">
                                    </div>
                                    <div class="form-group">
                                        <input maxlength="150" type="text" name="deezer" class="form-control" placeholder="Deezer">
                                    </div>
                                    <div class="form-group">
                                        <input maxlength="150" type="text" name="zvuk" class="form-control" placeholder="????????">
                                    </div>
                                    <div class="form-group">
                                        <input maxlength="150" type="text" name="amazon" class="form-control" placeholder="Amazon">
                                    </div>
                                    <div class="form-group">
                                        <input maxlength="150" type="text" name="spotify" class="form-control" placeholder="Spotify">
                                    </div>
                                    <div class="form-group">
                                        <input maxlength="150" type="text" name="soundcloud" class="form-control" placeholder="Soundcloud">
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-sm ml-2 mb-2">??????????????????</button>
                                </form>
                            </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif




                        @if($errors->any())
                            <div class="col-lg-12 alert alert-danger mb-2 text-center" style="margin: 0;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                @foreach($errors->all() as $error)
                                    <h6>{{$error}}</h6>
                                @endforeach
                            </div>
                        @endif


                    <div class="infinite-scroll" id="textpost">
                	<div class="row">
                    		@foreach($videos as $video)
                    		<div class="col-lg-4 allalbums mb-1">
                    			<div class="card">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="{!!$video->video!!}" allowfullscreen></iframe>
                                    </div>
                                    <a href="{{route('video', ['id' => $user->id, 'video' => $video->id])}}" style="text-decoration: none">
                                        <h5 style="font-family: 'Jost', sans-serif;font-size: 1.2rem; color: black;" class="mt-2 mb-2 text-center">{{$video->title}}</h5>
                                    </a>
                                    @if(Auth::check())
                                        @if(Auth::user()->id == $user->id)
{{--                                            <form class="mt-2 mb-2 mr-2 text-right" method="post" action="{{route('deleteVideo', ['id' => $video->id])}}">--}}
{{--                                                @csrf @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-outline-danger btn-sm">??????????????</button>--}}
{{--                                            </form>--}}
                                        @endif
                                    @endif
                    			</div>
                    		</div>
                    		@endforeach
                            {{$videos->links()}}
                	</div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Footer social -->
@if(Auth::check())
    <div class="container ">
        <div class="row ">
            <div class="col-lg-12 ">
                <nav class=" fixed-bottom " style="background-color: #040404">
                    <div class="row">
                        <div class="col-12 ">
                            @if($user->id == Auth::user()->id)
                                <div class="row text-center">
                                    <div class="col-6">
                                        <h6 style="margin-top:2px; font-family: 'Jost', sans-serif; font-size: 1em; margin-bottom: 0; color: #f4f4f2; text-transform: uppercase; " data-toggle="modal" data-target="#mobileNav">????????????????????</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 style="margin-top:2px; font-family: 'Jost', sans-serif; font-size: 1em; margin-bottom: 0; color: #f4f4f2; text-transform: uppercase; " data-toggle="modal" data-target="#exampleModalCenter">????????????????</h6>
                                    </div>
                                </div>
                            @endif
                            @if($user->id != Auth::user()->id)
                                <div class="row text-center">
                                    <div class="col-12">
                                        <h6 style="margin-top:2px; font-family: 'Jost', sans-serif; font-size: 1em; margin-bottom: 0; color: #f4f4f2; text-transform: uppercase; " data-toggle="modal" data-target="#mobileNav">????????????????????</h6>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endif
@if(Auth::guest())
    <div class="container ">
        <div class="row ">
            <div class="col-lg-12 ">
                <nav class=" fixed-bottom " style="background-color: #040404">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="row text-center">
                                <div class="col-12">
                                    <h6 style="margin-top:2px; font-family: 'Jost', sans-serif; font-size: 1em; margin-bottom: 0; color: #f4f4f2; text-transform: uppercase; " data-toggle="modal" data-target="#mobileNav">????????????????????</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endif
{{--<div class="container ">--}}
{{--    <div class="row ">--}}
{{--        <div class="col-lg-12 ">--}}
{{--            <nav class=" fixed-bottom " style="background-color: #e4e4e4">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12 " >--}}
{{--                        <div class="row">--}}
{{--                            <div class="col text-center" style="padding: 0">--}}
{{--                                <a href="{{route('musics')}}"><img src="{{asset('img/footer/main.png')}}" class="img-fluid " width="30"></a>--}}
{{--                            </div>--}}
{{--                            @if($user->vk)--}}
{{--                            <div class="col text-center" style="padding: 0">--}}
{{--                                <a href="{{$user->vk}}"><img src="{{asset('img/footer/vk.png')}}" class="img-fluid " width="30"></a>--}}
{{--                            </div>--}}
{{--                            @endif--}}
{{--                            @if($user->facebook)--}}
{{--                            <div class="col text-center" style="padding: 0">--}}
{{--                                <a href="{{$user->facebook}}"><img src="{{asset('img/footer/fb.png')}}" class="img-fluid  " width="30"></a>--}}
{{--                            </div>--}}
{{--                            @endif--}}
{{--                            @if($user->twitter)--}}
{{--                            <div class="col text-center" style="padding: 0">--}}
{{--                                <a href="{{$user->twitter}}"><img src="{{asset('img/footer/tw.png')}}" class="img-fluid " width="30"></a>--}}
{{--                            </div>--}}
{{--                            @endif--}}
{{--                            @if($user->insta)--}}
{{--                            <div class="col text-center" style="padding: 0">--}}
{{--                                <a href="{{$user->insta}}"><img src="{{asset('img/footer/in.png')}}" class="img-fluid  " width="30"></a>--}}
{{--                            </div>--}}
{{--                            @endif--}}
{{--                            <div class="col text-center" style="padding: 0">--}}
{{--                            @if(Auth::check())--}}
{{--                                @if(Auth::user()->id == $user->id)--}}
{{--                                    <!-- Button trigger modal -->--}}
{{--                                        <img src="{{asset('img/footer/add.png')}}" class="img-fluid" width="30" data-toggle="modal" data-target="#exampleModalCenter">--}}
{{--                                    @endif--}}
{{--                                @endif--}}
{{--                                @if(Auth::check())--}}
{{--                                    @if(Auth::user()->id != $user->id)--}}
{{--                                        <a href="{{route('profile', ['id' => Auth::user()->nickname])}}"><img class="img-footer " style="background-image: url({{Auth::user()->avatar}});"></a>--}}
{{--                                    @endif--}}
{{--                                @endif--}}
{{--                                @if(Auth::guest())--}}
{{--                                    <a href="{{route('login')}}"><img src="{{asset('img/footer/login.png')}}" class="img-fluid " width="30"></a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </nav>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- End Footer social -->

</body>
</html>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.min.js"></script>
    <script type="text/javascript">
        $('ul.pagination').hide();
        $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                debug: true,
                loadingHtml: '<img class="center-block" src="{{asset('img/loading.gif')}}" alt="Loading..." />',
                padding: 2,
                nextSelector: '.pagination li.active + li a',
                contentSelector: '.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>

<script type="text/javascript">
    var clipboard = new ClipboardJS('.btn');

    clipboard.on('success', function(e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);

        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
    });
</script>

<script>
    // Account link
    $("#copyPostLink").click(function() {
        $("#showCopyPostLink").show();
    });
</script>


<script type="text/javascript">
    $("#generateShortLink").click(function(e) {
        e.preventDefault();

        var form = $('#generateShortLinkForm').serialize();

        $.ajax({
            url: "{{route('generateShortLink')}}",
            type: "POST",
            data: form,
            success: function(data) {
                $("#showNewLink").html(data);
            },
            error: function() {
                alert('errorroror');
            },

        });

    });
</script>

<!-- Copy short link and show copy btn -->
<script type="text/javascript">
    var clipboard = new Clipboard('.btn-clipboard');
    clipboard.on('success', function(e) {
        console.info('????????????????:', e.action);
        console.info('??????????:', e.text);
        console.info('??????????????:', e.trigger);
        e.clearSelection();
    });
    clipboard.on('error', function(e) {
        console.error('????????????????:', e.action);
        console.error('??????????????:', e.trigger);
    });
</script>

<script type="text/javascript">
    $("#generateShortLink").click(function() {
        $(".btn-clipboard").show();
    })
</script>
<!--  -->
