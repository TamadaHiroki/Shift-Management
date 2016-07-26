<!DOCTYPE html>
<html>
<head>
    <title>シフトマネージャー</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="/css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- ヘッダー -->
@include('admin.layouts.header')

<!-- サイドバー -->

<div class="page-content">
    <div class="row">
        {{--@include('layouts.sidebar') --}}

        <!-- コンテンツが入る -->
        @yield('content')

    </div>
</div>

<!-- フッター -->
@include('admin.layouts.footer')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/js/custom.js"></script>
</body>
</html>