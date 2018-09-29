<!DOCTYPE html>
<html>
<!-- Head -->

<head>
    <title>修改密码表单</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="application/x-javascript">
    addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

    function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <!-- //Meta-Tags -->
    <!-- Style -->
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all">
    <style type="text/css">
    .active {
        border: solid 1px #2bf666;
    }

    .error {
        border: solid 1px red;
    }

    .remind {
        display: none;
        font-size: 12px;
        color: #aaa;
    }
    </style>
</head>
<!-- //Head -->
<!-- Body -->

<body>
    <h1>修改密码</h1>
    <div class="container w3layouts agileits">
        <div class="register w3layouts agileits">
            <h2>@if(Session::has('success')) {{Session::get('success')}} @endif @if(Session::has('error')) {{Session::get('error')}} @endif</h2>
            <form action="/pass" method="post">
                {{ csrf_field() }}
                <div>
                    <input type="password" Name="oldpass" placeholder="旧密码" autocomplete="off"><span class="remind"></span></div>
                <div>
                    <input type="password" Name="password" placeholder="新密码"><span class="remind"></span> </div>
                <div>
                    <input type="password" Name="repassword" placeholder="重复新密码"><span class="remind"></span>
                    <div class="send-button w3layouts agileits">
                        <input type="submit" class="submit" value="提交">
                    </div>
            </form>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
</body>
<!-- //Body -->

</html>