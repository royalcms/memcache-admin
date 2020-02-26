<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    {* 提示您：调用js_languages.lbi.php *}{include file='statics/library/js_languages.lbi.php'}
    <script type="text/javascript">

    </script>
</head>

<body>
{* 提示您：调用page_header.lbi.php *}{include file='statics/library/page_header.lbi.php'}
<div class="content">
    <div class="row-fluid edit-page">
        <ul class="nav nav-tabs">
            <!-- {foreach $clusterlists as $value => $key} -->
            {if $key eq $cluster}
            <li class="nav-item">
                <a class="nav-link active">{$key}</a>
            {else}
                <a class="nav-link data" href='{RC_Uri::url("memadmin/server/init/")}&cluster={$key}'>{$key}</a>
            {/if}
            </li>
            <!-- {/foreach} -->
        </ul>
        <div class="span12 memcache">
            <div class="step"></div>
            <div>
                {$cluster_list}
            </div>

            {if isset($stats) && $stats === false || $stats eq array()}
            <div class="header corner padding" style="margin-top:10px;text-align:center;">

                <!-- Asking server of cluster stats-->
                {if isset($cluster)}
                {$error_server} 的服务器没有回应 !
                <!-- All servers stats-->
                {else}
                服务器没有回应 !
                {/if}
            </div>
            <div class="container corner full-size padding" style="line-height: 200%">
                <p><strong>错误信息</strong></p>

                {if isset($server)}
                <p>服务器没有回应 !</p>
                <p>{$last_error}</p>
                {else}
                <p>所有来自 {$error_server} 的服务器没有回应 !</p>
                <p>当前集群不可用 !</p>
                <p>{$last_error}</p>
                {/if}

                请检查上面的错误信息，你的 <a href='{RC_Uri::url("memadmin/clusters/init/")}&cluster={$cluster}' class="green">设置</a> 或你的服务器状态并重试
            </div>

            <!--# No slabs used-->
            {elseif isset($slabs) && $slabs === false}

            <div class="header corner full-size padding" style="margin-top:10px;text-align:center;">
                此服务器没用使用 slabs!
            </div>
            <div class="container corner full-size padding">
                <span class="left">错误信息</span>
                <br/>
                也许这个服务器没有使用，检查你的 <a href='{RC_Uri::url("memadmin/clusters/init/")}&cluster={$cluster}' class="green">设置</a> 或你的服务器状态并重试
            </div>

            <!--# No Items in slab-->
            {elseif isset($items) && $items === false}

            <div class="header corner full-size padding" style="margin-top:10px;text-align:center;">
                没有 item 在这个 slab !
            </div>
            <div class="container corner full-size padding">
                <span class="left">错误消息</span>
                <br/>
                这个 slab 已经被分配, 但是是空的
                <br/>
                <br/>
            </div>
            {/if}
        </div>
    </div>
</div>

{* 提示您：调用page_footer.lbi.php *}{include file='statics/library/page_footer.lbi.php'}
</body>