<x-layout>
        <main>
        <div class="slider-bg">
        <ul class="slider">
        <li class="opacity silder-item"><a href="{{ route('gallery.index') }}"><span class="mask"><img src="{{ asset('images/img_07.jpg') }}" alt="01">
            <span class="cap">ギャラリー  作品を見に行く<button class="slider-btn">詳しく見る</button></span></span></a></li> 
        <li class="opacity slider-item"><a href="{{ route('artist.exhibition') }}"><span class="mask"><img src="{{ asset('images/img_07.jpg') }}" alt="02">
            <span class="cap">展覧会情報 詳しく見に行く<button class="slider-btn">詳しく見る</button></span></span></a></li>
        <li class="opacity slider-item"><a href="{{ route('gallery.index') }}"><span class="mask"><img src="{{ asset('images/img_07.jpg') }}" alt="03">
            <span class="cap">ギャラリー  作品を見に行く<button class="slider-btn">詳しく見る</button></span></span></a></li>
        <li class="opacity slider-item"><a href="{{ route('artist.exhibition') }}"><span class="mask"><img src="{{ asset('images/img_07.jpg') }}" alt="04">
            <span class="cap">展覧会情報 詳しく見に行く<button class="slider-btn">詳しく見る</button></span></span></a></li>
        <li class="opacity slider-item"><a href="{{ route('gallery.index') }}"><span class="mask"><img src="{{ asset('images/img_07.jpg') }}" alt="05">
            <span class="cap">ギャラリー  作品を見に行く<button class="slider-btn">詳しく見る</button></span></span></a></li>
    <!--/slider--></ul>
</div><!----slider-bg--->
            

    <div class="news">
        <div class="news-area">
            <h2 class="home-title">お知らせ<br>
            <span>information</span></h2>
            <div class="news-text wrapper">
                <ul class="slider-2">
                    <li class="text-area"><a href="{{ route('artist.news') }}"><span>2021.11.01</span>1 つめのニュースの記事です。</a></li>
                    <li class="text-area"><a href="{{ route('artist.news') }}"><span>2021.11.02</span>2 つめのニュースの記事です。</a></li>
                    <li class="text-area"><a href="{{ route('artist.news') }}"><span>2021.11.03</span>3 つめのニュースの記事です。</a></li>
                </ul>
            </div><!-----/.news-text---->
        </div><!------/.news-area--------->
    </div><!-------------/.news------------------>

    <section>
        <div class="topic">
            <div class="wrapper">
        <h2 class="home-title">特集<br>
            <span>feature</span></h2>
            <div class="wrapper grid">
                <div class="item">
                    <a href="{{ route('gallery.index') }}"><img src="{{ asset('images/img_07.jpg') }}" alt="01"></a>
                </div>

                <div class="item">
                    <a><img src="{{ asset('images/img_07.jpg') }}" alt="01"></a>
                </div>

                <div class="item">
                    <img src="{{ asset('images/img_07.jpg') }}" alt="01">
                </div>

                <div class="item">
                    <img src="{{ asset('images/img_07.jpg') }}" alt="01">
                </div>

                <div class="item">
                    <img src="{{ asset('images/img_07.jpg') }}" alt="01">
                </div>

                <div class="item">
                    <img src="{{ asset('images/img_07.jpg') }}" alt="01">
                </div>
            </div>
            </div>
    </section>

    <section>
    <div id="add-date">
        <div class="wrapper">
        <div class="calendar">
            <p class="bg-title">calendar</p>
        <h2 class="home-title">calendar</h2>
        </div>
            <div id="calendar" class="date"></div>
        </div><!---/.wrapper-->
    </div><!---/#add-date--->
    </section>

    <!--/main--></main>
</x-layout>