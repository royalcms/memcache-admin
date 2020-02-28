<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="data-spm" content="a219a" />
    <title>Memcache Admin</title>
    <link href="{$theme_url}statics/style/bootstrap.min.css" rel="stylesheet">
    <link href="{$theme_url}statics/style/view.css" rel="stylesheet">
    <script src="{$theme_url}statics/script/jquery.min.js" ></script>
    <script src="{$theme_url}statics/script/bootstrap.bundle.min.js" ></script>
    <script src="{$theme_url}statics/script/index.js" ></script>
</head>

<script type="text/javascript">
$(function(){
    $("[data-hide]").on("click", function(){
        $("." + $(this).attr("data-hide")).hide();
        $("." + $(this).attr("data-hide")).hide();
        $(this).closest("." + $(this).attr("data-hide")).hide();
    });
});
</script>

<body>
<div class="index" style="">
    <!-- nav -->
    <div class="container" >
        {$error}
        <div class="pb-2 mt-4 mb-2 border-bottom">
            <h3>欢迎使用Memcache Admin</h3>
        </div>
    </div>

    <div id="login" class="pull-right" style="display: none">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form class="form-horizontal" method="post" action='{RC_Uri::url("memadmin/index/signin/")}'>
                    <span class="heading">Memcache服务器登录</span>
                    <div class="form-group">
                        <input type="text" class="form-control" name='host' id="host" placeholder="请输入服务器IP地址" required >
                        <div class="invalid-feedback">
                            请输入公网IP地址
                        </div>
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name='port' id="port" placeholder="请输入服务器端口号" value="11211" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/" required>
                        <div class="invalid-feedback">
                            请输入5位数以内端口号，仅限数字
                        </div>
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="signin" value="登陆" class="btn btn-default">登录</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {* 提示您：调用page_footer.lbi.php *}{include file='library/page_footer.lbi.php'}

</div>
<script type="text/javascript">

</script>
</body>
</html>