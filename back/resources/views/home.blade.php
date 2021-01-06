@extends('layouts.home')

@section('content')



<div class="container-fluid" id="header">
    <div class="row">
        <div class="col-md-3 col-lg-3" id="category">
            <div style="background:palevioletred;color:#fff;font-weight:800;border:none;padding:15px;"> The Book Shop </div>
            <ul>
                <li> <a href="{{asset('#')}}"> Entrance Exam </a> </li>
                <li> <a href="{{asset('#')}}"> Literature & Fiction </a> </li>
                <li> <a href="{{asset('#')}}"> Academic & Professional </a> </li>
                <li> <a href="{{asset('#')}}"> Biographies & Auto Biographies </a> </li>
                <li> <a href="{{asset('#')}}"> Children & Teens </a> </li>
                <li> <a href="{{asset('#')}}"> Regional Books </a> </li>
                <li> <a href="{{asset('#')}}"> Business & Management </a> </li>
                <li> <a href="{{asset('#')}}"> Health and Cooking </a> </li>

            </ul>
        </div>
        <div class="col-md-6 col-lg-6">
            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                    <li data-target="#myCarousel" data-slide-to="5"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img class="img-responsive" src="{{asset('img/carousel/1.jpg')}}">
                    </div>

                    <div class="item">
                        <img class="img-responsive " src="{{asset('img/carousel/2.jpg')}}">
                    </div>

                    <div class="item">
                        <img class="img-responsive" src="{{asset('img/carousel/3.jpg')}}">
                    </div>

                    <div class="item">
                        <img class="img-responsive" src="{{asset('img/carousel/4.jpg')}}">
                    </div>

                    <div class="item">
                        <img class="img-responsive" src="{{asset('img/carousel/5.jpg')}}">
                    </div>

                    <div class="item">
                        <img class="img-responsive" src="{{asset('img/carousel/6.jpg')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3" id="offer">
            <a href=""> <img class="img-responsive center-block" src="{{asset('img/offers/1.png')}}"></a>
            <a href=""> <img class="img-responsive center-block" src="{{asset('img/offers/2.png')}}"></a>
            <a href=""> <img class="img-responsive center-block" src="{{asset('img/offers/3.png')}}"></a>
        </div>
    </div>
</div>
<div class="container-fluid text-center" id="new">
    <div class="row">
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="">
                <div class="book-block">
                    <div class="tag">New</div>
                    <div class="tag-side"><img src="{{asset('img/tag.png')}}"></div>
                    <img class="book block-center img-responsive" src="{{asset('img/new/1.jpg')}}">
                    <hr>
                    Like A Love Song <br>
                    Rs 113 &nbsp
                    <span style="text-decoration:line-through;color:#828282;"> 175 </span>
                    <span class="label label-warning">35%</span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="">
                <div class="book-block">
                    <div class="tag">New</div>
                    <div class="tag-side"><img src="{{asset('img/tag.png')}}"></div>
                    <img class="block-center img-responsive" src="{{asset('img/new/2.jpg')}}">
                    <hr>
                    General Knowledge 2017 <br>
                    Rs 68 &nbsp
                    <span style="text-decoration:line-through;color:#828282;"> 120 </span>
                    <span class="label label-warning">43%</span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="">
                <div class="book-block">
                    <div class="tag">New</div>
                    <div class="tag-side"><img src="{{asset('img/tag.png')}}"></div>
                    <img class="block-center img-responsive" src="{{asset('img/new/3.png')}}">
                    <hr>
                    Indian Family Bussiness Mantras <br>
                    Rs 400 &nbsp
                    <span style="text-decoration:line-through;color:#828282;"> 595 </span>
                    <span class="label label-warning">33%</span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="">
                <div class="book-block">
                    <div class="tag">New</div>
                    <div class="tag-side"><img src="{{asset('img/tag.png')}}"></div>
                    <img class="block-center img-responsive" src="{{asset('img/new/4.jpg')}}">
                    <hr>
                    Kiran s SSC Mathematics Chapterwise Solutions <br>
                    Rs 289 &nbsp
                    <span style="text-decoration:line-through;color:#828282;"> 435 </span>
                    <span class="label label-warning">33%</span>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="container-fluid" id="author">
    <h3 class="text-center" style="color:palevioletred;"> Who Owns this Store </h3>
    <div class="row">
        <div class="col-sm-5 col-md-3 col-lg-3">
            <a href=""><img class="img-author img-responsive center-block" src="{{asset('img/popular-author/1.jpg')}}"></a>
            <h4 class="name-author">Noor M. Albardawil</h4>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href=""><img class="img-author img-responsive center-block" src="{{asset('img/popular-author/2.jpg')}}"></a>
            <h4 class="name-author">Aya K. Omar</h4>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href=""><img class="img-author img-responsive center-block" src="{{asset('img/popular-author/3.jpg')}}"></a>
            <h4 class="name-author">Baraa SH. Redwan</h4>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href=""><img class="img-author img-responsive center-block" src="{{asset('img/popular-author/4.jpg')}}"></a>
            <h4 class="name-author">Mai Y. Allhaam</h4>
        </div>
    </div>

</div>
@endsection