<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>       
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Books Library</title>
        <link rel="canonical" href="{{ url('/') }}"/>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
</head>
<body>
    <header class="header">
        <a class="title" href="/">Books Library</a>
        <form id="query1" method="get" action="{{ url('/') }}" onsubmit="return false;">
            <input type="search" id="query-input" name="query" placeholder="Search your Book">       
        </form>
    </header>
    
    <div class="main-warpper">
        <div class="demo-ribbon banner"></div>
        <div class="row">
            <div class="col-2 col-s-2 menu"></div>
            <main class="col-8 col-s-8">
                <article id="main-info" class="col- main" @if(!empty($results) && count($results) > 0 ) hidden= @endif >
                         <h1>Search Books</h1>
                    <h4>TNTSearch is a fully featured full text search engine written in PHP</h4>
                </article>   
            </main>
            <div class="col-2 col-s-2"></div>
        </div>
    </div>

    <footer class="footer">
        <script type="text/javascript" src="{{ asset('js/app.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#query1').on('keyup', function (e) {
                    e.preventDefault();
                    var query_input = $('#query-input').val();
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/') }}",
                        data: {
                            'query_input': query_input,
                        },
                        success: function (data) {
                            $('.book').remove();
                            $('#main-info').hide();
                            $.each(data.results, function (key, result) {
                                trHTML = "<article class='col-12 main book'><h4>" + result.title + "</h4></article>";
                                $('#main-info').after(trHTML);
                            });
                        },
                        error: function (xhr, ajaxOptions, c) {
//                            alert(xhr.status);
                            document.write(xhr.responseText);
//                            alert(thrownError);
//                            document.write(thrownError);
                        }
                    });
                });
            });
        </script>
    </footer>
</body>
</html>