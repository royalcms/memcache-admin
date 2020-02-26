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
    <div class="heading">
        <h3 class="float-right">
            <a class="btn  btn-outline-dark plus_or_reply data-pjax"
               href='{RC_Uri::url("memadmin/server/slabs/")}&cluster={$cluster}&server={$server}'>
                <i class="fontello-icon-reply"></i>看这个服务器 Slabs 统计</a>
        </h3>
        <div class="clearfix"></div>
    </div>

    <div class="row-fluid edit-page">
        <div class="step"></div>
        <div class="span12 memcache">
            <div>
                {$cluster_list}
            </div>
            <div class="sub-header corner  padding">终端</div>
            <div class="container corner  padding" id="console" style="visibility:visible;display:block;">
                <pre id="container" style="font-size:11px;overflow:auto;min-height:80px;max-height:196px;width: auto"
                     class="full-size">
                    <label id="frist-content" >点击下面一个项目的键可以看到它的内容</label>
</pre>
            </div>
            <div class="container corner padding" style="text-align:right;">
                <span class="float-left">
                    <input style="witdh:200px;" class="header loading" type="submit" id="loading"
                           value="Waiting for server response ..."/>
                </span>
                <input class="header" type="submit" onclick="javascript:executeClear('container')"
                       value="{lang key='memadmin::memadmin.clear'}"/>
                <input class="header" id="hide" type="submit"
                       onclick="javascript:executeHideShow('console', 'hide');javascript:this.blur();"
                       value="{lang key='memadmin::memadmin.hide'}">
            </div>

            <div class="sub-header corner padding">

                <!-- {if $items eq false} -->
                Items 在 Slab {$get_slab}，该Slab 被分配但是是空的
                <!-- {else} -->
                Items 在 Slab {$get_slab}, 只展示前 {$max_item_dump} 项 items
                <!-- {/if} -->

            </div>
            <div class="container corner padding">

                {$notFirst = false}

                <input type="hidden" id="request_api" value="server"/>
                <input type="hidden" id="request_command" value="get"/>
                <input type="hidden" id="request_server" value="{$server}"/>

                <!-- tems -->
                {foreach $items as $key => $data}
                <!-- Checking if first item -->

                <!-- {if $notFirst} -->
                <div  style="margin:5px;border: 0;border-bottom: 1px solid #fff;"></div>
                <!-- {/if} -->

                <a class="green item execute_command" title="{$key}" href="#" data-url="{$command_url}">{$data.format_key}</a>

                <span class="right" style="clear:right;">
                    <strong>大小</strong> : {$data.size}
                    <strong>到期时间</strong> :
                    <!-- Infinite expiration -->

                    <!-- {if $data.uptime eq $infinite} -->
                         &#8734;
                    <!-- Timestamp expiration -->
                    <!-- {else} -->
                         {$data.uptime}
                    <!-- {/if} -->

                </span>
                <!-- irst item done -->

                {$notFirst = true}
                <!-- {/foreach} -->
            </div>
        </div>
    </div>
    <script type="text/javascript">
        ecjia.admin.admin_server.execute_command();
    </script>
</div>

{* 提示您：调用page_footer.lbi.php *}{include file='statics/library/page_footer.lbi.php'}
</body>