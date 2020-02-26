<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<meta name="data-spm" content="a219a" />
<title>Memcache Admin</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="{$theme_url}statics/style/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="{$theme_url}statics/style/base.css" />
<link rel="stylesheet" type="text/css" href="{$theme_url}statics/style/framework.min.css" />
<link rel="stylesheet" type="text/css" href="{$theme_url}statics/style/show_{$service}.css" />
<link rel="stylesheet" type="text/css" href="{$theme_url}statics/lib/fontello/css/fontello.css">
<script src="{$theme_url}statics/script/jquery.min.js"></script>
<script src="{$theme_url}statics/script/bootstrap.bundle.min.js"></script>
<script src="{$theme_url}statics/script/sweetalert2.all.min.js"></script>
<script src="{$theme_url}statics/script/ecjia/ecjia.js"></script>
<script src="{$theme_url}statics/script/ecjia/ecjia-admin.js"></script>
{if $service eq server}
    <script src="{$theme_url}statics/script/Highcharts/highcharts.js"></script>
{/if}
<script src="{$theme_url}statics/script/memadmin.js"></script>
<script src="{$theme_url}statics/script/memadmin_command.js"></script>
<script src="{$theme_url}statics/script/memadmin_clusters.js"></script>
<script src="{$theme_url}statics/script/memadmin_monitor.js"></script>