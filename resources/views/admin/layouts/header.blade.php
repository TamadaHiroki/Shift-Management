

<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1> <font color="white">シフトマネージャー - 店舗管理者</font></h1>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-lg-12">

                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            @if(Auth::guard('admin')->check())
                                <button type="button" onclick="location.href='/admin/logout'" class="btn btn-lg btn-block btn-success">&nbsp; ログアウト &nbsp;</button>
                            @endif
                            <!--<a href="logout.html"><font color="white">ログアウト</font> </a>-->

                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>