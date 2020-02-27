<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    {* 提示您：调用js_languages.lbi.php *}{include file='library/js_languages.lbi.php'}
    <script type="text/javascript">

    </script>
</head>

<body>
{* 提示您：调用page_header.lbi.php *}{include file='library/page_header.lbi.php'}

<div class="content">
    <div class="float-right" >
        <!-- {if $ur_here}{$ur_here}{/if} -->
        {if $configure_url}
        <a class="btn btn-outline-dark plus_or_reply data-pjax" href="{$configure_url.href}" id="sticky_a"><i
                    class="fontello-icon-reply"></i>{$configure_url.text}</a>
        {/if}
    </div>
    <div class="clearfix"></div>
    <div class="row-fluid edit-page">
        <div class="span12">
            <div class="sub-header corner padding">Live Stats
                <span class="green">{lang key='memadmin::memadmin.configuration'}</span>
            </div>
            <form class="form-horizontal" method="post" action="{$live_stats}" name="live_stats">
                <h3 class="heading">
                    {lang key='memadmin::memadmin.alert_refresh'}</h3>
                <fieldset>
                    <div class="form-group row">
                        <label class="control-label"> {lang key='memadmin::memadmin.refresh_rate'}<br>（EVI/s）</label>
                        <div class="controls">
                                <input class="form-control" type="text" name="refresh_rate" value="{$refresh_rate}"/>
                                <span class="form-text" id="noticesmtp_host">{lang key='memadmin::memadmin.req_info'}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label">{lang key='memadmin::memadmin.memory_alert'}<br>（%MEM）</label>
                        <div class="controls">
                            <input class="form-control" type="text" name="memory_alert" value="{$memory_alert}"/>
                            <span class="form-text" id="noticesmtp_host">{lang key='memadmin::memadmin.cachesize_per'}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label">{lang key='memadmin::memadmin.hit_rate_alert'}<br>（%HIT）</label>
                        <div class="controls">
                            <input class="form-control" type="text" name="hit_rate_alert" value="{$hit_rate_alert}"/>
                            <span class="form-text" id="noticesmtp_host">{lang key='memadmin::memadmin.hit_info'}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label">{lang key='memadmin::memadmin.eviction_alert'}<br>（EVI/s）</label>
                        <div class="controls">
                            <input class="form-control" type="text" name="eviction_alert" value="{$eviction_alert}"/>
                            <span class="form-text" id="noticesmtp_host">{lang key='memadmin::memadmin.evi_info'}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <button class="btn btn-primary" type="button">{lang key='memadmin::memadmin.mems_countsave'}</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <div class="sub-header corner padding">Miscellaneous
            <span class="green">{lang key='memadmin::memadmin.configuration'}</span>
        </div>
        <form class="form-horizontal" method="post" action="{$miscellaneous}" name="miscellaneous">
            <fieldset>
                <div class="heading">
                    <h3>{lang key='memadmin::memadmin.server_connection_timeout'}</h3>
                </div>
                <div class="form-group row">
                    <label class="control-label">{lang key='memadmin::memadmin.timeout'}<br>（TIME）</label>
                    <div class="controls">
                        <input class="form-control" type="text" name="connection_timeout" value="{$connection_timeout}"/>
                        <span class="form-text" id="noticesmtp_host">{lang key='memadmin::memadmin.time_info'}</span></div>
                </div>
                <div class="form-group row">
                    <label class="control-label">{lang key='memadmin::memadmin.max_items'}</label>
                    <div class="controls">
                        <input class="form-control" type="text" name="max_item_dump" value="{$max_item_dump}"/>
                        <span class="form-text" id="noticesmtp_host">{lang key='memadmin::memadmin.max_items_info'}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <button class="btn btn-primary" type="button">{lang key='memadmin::memadmin.mems_countsave'}</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <script type="text/javascript">
        ecjia.admin.admin_monitor.init();
        ecjia.admin.admin_monitor.api();
    </script>
</div>

{* 提示您：调用page_footer.lbi.php *}{include file='library/page_footer.lbi.php'}

</body>
</html>