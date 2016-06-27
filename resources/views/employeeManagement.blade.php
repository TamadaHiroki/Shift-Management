<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
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
    <h3>従業員管理画面 登録test</h3>
    <form method="POST" action="/shift/management/register">
        {!! csrf_field() !!}
        <input class="form-control" type="text" placeholder="Store_id" name="store_id" value="{{ old('store_id') }}">
        <input class="form-control" type="text" placeholder="Username" name="username" value="{{ old('username') }}">
        <input class="form-control" type="text" placeholder="Position" name="position" value="{{ old('position') }}">
        <input class="form-control" type="text" placeholder="Email" name="email" value="{{ old('email') }}">
        <input class="form-control" type="text" placeholder="Tell" name="tell" value="{{ old('tell') }}">

        @include('common.errors')   <!-- 子の呼び出し (Errorの場合)-->
        <div class="action">
            <button class="btn btn-primary signup" type="submit">登録</button>
        </div>
    </form>
</body>
</html>