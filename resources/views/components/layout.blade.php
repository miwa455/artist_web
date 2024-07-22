<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta name="description" content="絵描きのメディアサイト">
        <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0,
        maximum-scale=1.0, minimum-scale=1.0">
        <!----css-->
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
        <link href="https://fonts.googleapis.com/css2?family=Yuji+Syuku&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <!------font--------------------->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
        <!---------script--------------->
        <script type="text/javascript" src="https://postcode-jp.com/js/postcodejp.js" charset="utf-8"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!---<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

        <title>{{ $title ?? 'artist info' }}</title>
        @stack('css')
    </head>

    <body class="bg-gray-50">
        <div class="bg-color">
            <div class="openbtn"><span></span><span></span><span></span></div>
        <header id="header" class="wrapper">
            <a href="/artist"><h1 class="logo text-4xl">Artist<span>Info</span></h1></a>
            <nav id="g-navi">
            <ul>
            <li><a href="{{ route('artist.index') }}">Home</a></li>
            <li><a href="{{ route('artist.news') }}">News</a></li>
            <li class="has-child"><a>Gallery</a>
                <ul class="acm-ul">
                    <li><a href="{{ route('gallery.index') }}">作者一覧</a></li>
                    <li><a href="{{ route('gallery.index') }}">作品一覧</a></li>
                </ul>
            </li>
            <li><a href="{{ route('artist.exhibition') }}">Exhibition</a></li>
            <li><a href="{{ route('artist.contact.index') }}">お問い合わせ</a></li>
            </ul>
            </nav>
            </header>
        
        <!--<div class="login-area wrapper">
        <a href="#" class="gradient4">ログイン</a>
        <a href="#" class="gradient4">会員登録</a>
        </div>-->
    </div>
            {{ $slot }}

        <footer id="footer">
            <nav class="footer-nav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#area-1">News</a></li>
                    <li><a href="#area-2">Gallery</a></li>
                    <li><a href="#area-3">Exhibition</a></li>
                    <li><a href="#">お問い合わせ</a></li>
                    <li><a href="#">利用規約</a></li>
                </ul>
            </nav>
        <small><p>&copy; copyright.</p></small> 
        </footer>
        
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js"></script>
    <!--自作のJS-->
    <script src="{{ asset('js/index.js') }}"></script>
    <script type='module'>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                droppable: true,
                height: 'auto',
                dayCellClassNames: function(arg) {
                    var dayOfWeek = arg.date.getDay();
                    if (dayOfWeek === 0) {
                        return 'sunday-cell';
                    } else if (dayOfWeek === 6) {
                        return 'saturday-cell';
                    } else {
                        return '';
                    }
                }, 
                views: {
                dayGridMonth: {
                dayHeaderClassNames: function(arg) {
                            var headerOfWeek = arg.date.getDay(); // ヘッダーの曜日を取得
                            if (headerOfWeek === 0) {
                                return 'sunday-header'; // 日曜日の場合
                            } else if (headerOfWeek === 6) {
                                return 'saturday-header'; // 土曜日の場合
                            }
                        }
                    }
                },
                headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            eventSources: '/artist',
                noEventsContent: 'イベントはありません',
                eventMouseEnter: function(info) {
                    $(info.el).popover({
                        title: info.event.title,
                        content: info.event.extendedProps.description,
                        trigger: 'hover',
                        placement: 'top',
                        container: 'body',
                        html: true
                    });
                }
            });
            calendar.render();
        });
    </script>
    </body>
</html>