<!DOCTYPE html>
<html>
<!-- Head -->

<head>
    <title>登录表单</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="application/x-javascript">
    addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

    function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <!-- //Meta-Tags -->
    <!-- Style -->
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all">
</head>
<!-- //Head -->
<!-- Body -->

<body>
    <h1>登录表单</h1>
    <div class="container w3layouts agileits">
        <div class="login w3layouts agileits">
            <h2>登 录</h2>
            <form action="login" method="post">
                {{ csrf_field() }}
                <input type="text" Name="name" placeholder="用户名" value="{{ old('name') }}">
                <input type="password" Name="password" placeholder="密码">
                 <div class="send-button w3layouts agileits">
                
                    <input type="submit" value="登 录">
                
            </div>
            </form>
            <div class="clear"></div>
        </div>
    </div>
</body>
<!-- //Body -->

</html>