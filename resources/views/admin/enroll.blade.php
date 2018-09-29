<!DOCTYPE html>
<html>
<!-- Head -->

<head>
    <title>注册表单</title>
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
         .active{
            border:solid 1px #2bf666;
        }

        .error{
            border:solid 1px red;
        }

        .remind{
            display:none;
            font-size:12px;
            color:#aaa;
        }
    </style>
</head>
<!-- //Head -->
<!-- Body -->

<body>
    <h1>注册表单</h1>
    <div class="container w3layouts agileits">
        <div class="register w3layouts agileits">
            <h2>注 册</h2>
            <form action="/enroll" method="post">
                {{ csrf_field() }}
                <div><input type="text" Name="name" placeholder="用户名" autocomplete="off"><span class="remind"></span></div>
                <div><input type="password" Name="password" placeholder="密码"><span class="remind"></span> </div>               
                <div><input type="password" Name="repass" placeholder="重复密码"><span class="remind"></span>
                <div class="send-button w3layouts agileits">
                <input type="submit" class="submit" value="免费注册">
                </div>
            </form>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
   
    <script type="text/javascript">
        var CUSER = false;
        var CPASS = false;
        var CREPASS = false;

        //用户名
        $('input[name=name]').focus(function(){
            //边框颜色
            $(this).addClass('active');
            //提示语显示
            $(this).next().show().html('输入8~18位字母数字下划线');
        }).blur(function(){
            //移出激活状态的class active
            $(this).removeClass('active');
            //正则判断
            var v = $(this).val();
            //声明正则
            var reg = /^\w{6,16}$/;
            //判断
            if(!reg.test(v)){
                //边框
                $(this).addClass('error');
                //文字提醒
                $(this).next().html('<span style="color:red">格式不正确</span>').show();
                CUSER = false;
            }else{
                var input = $(this);
                //发送 AJAX 请求检测用户名是否已经存在
                // $.post('./check-user-exists.php', {username: v}, function(data){
                // })

                $.ajax({
                    url: '/check-user-exists.php',
                    type: 'post',
                    data: {name: v},
                    success: function(data){
                        if(data != '1'){
                            //边框
                            input.addClass('error');
                            //文字提醒
                            input.next().html('<span style="color:red">该用户名太受欢迎, 请换一个!!</span>').show();
                            CUSER = false;
                        }else{
                            input.removeClass('error');
                            input.next().html('<span style="color:green;font-size:16px;font-weight:bold">&nbsp;&nbsp;√</span>').show();
                            CUSER = true;
                        }
                    },
                    async: false
                })               
            }
        })
        $('input[name=password]').focus(function(){
            //边框颜色
            $(this).addClass('active');
            //提示语显示
            $(this).next().show().html('6~20非空白字符');
        }).blur(function(){
            $(this).removeClass('active');
            //获取用户的输入值
            var v = $(this).val();
            //正则
            var reg = /^\S{6,20}$/;

            if(!reg.test(v)) {
                //边框
                $(this).addClass('error');
                //文字提醒
                $(this).next().html('<span style="color:red">格式不正确</span>').show();
                CPASS = false;
            }else{
                //边框
                $(this).removeClass('error');
                //文字提醒
                $(this).next().html('<span style="color:green;font-size:16px;font-weight:bold">&nbsp;&nbsp;√</span>').show();
                CPASS = true;

            }
        })

        //确认密码
        $('input[name=repass]').focus(function(){
            //边框颜色
            $(this).addClass('active');
            //提示语显示
            $(this).next().show().html('再次输入密码');
        }).blur(function(){
            $(this).removeClass('active');
            //获取用户的输入值
            var v = $(this).val();

            if(v != $('input[name=password]').val()) {
                //边框
                $(this).addClass('error');
                //文字提醒
                $(this).next().html('<span style="color:red">两次密码不一致</span>').show();
                CREPASS = false;
            }else{
                //边框
                $(this).removeClass('error');
                //文字提醒
                $(this).next().html('<span style="color:green;font-size:16px;font-weight:bold">&nbsp;&nbsp;√</span>').show();
                CREPASS = true;

            }
        })


      //表单的提交事件
        $('form').submit(function(){
            //触发错误提醒
            $('input').trigger('blur');
            console.log(CUSER);
            //判断输入值是否都正确
            if(CUSER  && CPASS && CPHONE && CREPASS && CEMAIL) {
                return true;
            }else{
                return false;
            }
        });
    </script>
</body>
<!-- //Body -->

</html>