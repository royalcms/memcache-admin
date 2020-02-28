<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    {* 提示您：调用js_languages.lbi.php *}{include file='library/js_languages.lbi.php'}
    <script type="text/javascript">
        var timeout = {($refresh_rate_timeout * 1000)};
        var page = 'index.php?m=memadmin&c=monitor&a=data&cluster={$cluster}';
        setTimeout("ajax(page, 'stats')", {($refresh_rate_timeout * 1000)});
    </script>
</head>

<body>
{* 提示您：调用page_header.lbi.php *}{include file='library/page_header.lbi.php'}

<div class="content">
    <div class="float-right">
            <!-- {if $ur_here}{$ur_here}{/if} -->
            {if $configure_url}
            <a class="btn btn-outline-dark plus_or_reply" href="{$configure_url.href}" id="sticky_a"><i class="fontello-icon-plus"></i>{$configure_url.text}</a>
            {/if}
    </div>
    <div class="clearfix"></div>
    <div class="heading"></div>
    <div class="row-fluid edit-page">
        <div class="span12 memcache">
            <div style="width:100%;float:left;">
                <div class="sub-header corner  padding">Live <span class="green">{lang key='memadmin::memadmin.stats'}</span></div>

                {if $refresh_rate_timeout gt $refresh_rate }
                <div class="container corner" style="padding:9px;">
                    发现连接错误，为了防止任何问题，刷新率增加了
                    {$refresh_delay} 秒.
                </div>
                {/if}

                <div class="full-size padding" style="padding: 3px 0px 3px 0px">
                    <br/>
                    <span class="live">{lang key='memadmin::memadmin.act_look'} {$cluster_select} {lang key='memadmin::memadmin.stats'}</span>
                    <pre id="stats" class="live" >
                    {$wait_tips}
            </pre>
                </div>
                <div class="container corner full-size padding">
                    <div class="line">
                        <span class="left setting">SIZE</span>
                        {lang key='memadmin::memadmin.cachesize_info'}
                    </div>
                    <div class="line">
                        <span class="left setting">%MEM</span>
                        {lang key='memadmin::memadmin.cachesize_per'}
                    </div>
                    <div class="line">
                        <span class="left setting">%HIT</span>
                        {lang key='memadmin::memadmin.hit_info'}
                    </div>
                    <div class="line">
                        <span class="left setting">TIME</span>
                        {lang key='memadmin::memadmin.time_info'}
                    </div>
                    <div class="line">
                        <span class="left setting">REQ/s</span>
                        {lang key='memadmin::memadmin.req_info'}
                    </div>
                    <div class="line">
                        <span class="left setting">CONN</span>
                        {lang key='memadmin::memadmin.conn_info'}
                    </div>
                    <div class="line">
                        <span class="left setting">GET/s, SET/s, DEL/s</span>
                        {lang key='memadmin::memadmin.gsd_info'}
                    </div>
                    <div class="line">
                        <span class="left setting">EVI/s</span>
                        {lang key='memadmin::memadmin.evi_info'}
                    </div>
                    <div class="line">
                        <span class="left setting">READ/s</span>
                        {lang key='memadmin::memadmin.read_info'}
                    </div>
                    <div class="line">
                        <span class="left setting">WRITE/s</span>
                        {lang key='memadmin::memadmin.write_info'}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{* 提示您：调用page_footer.lbi.php *}{include file='library/page_footer.lbi.php'}

</body>
</html>