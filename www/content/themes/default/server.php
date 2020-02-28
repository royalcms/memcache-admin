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
    <div class="row-fluid edit-page">
        <ul class="nav nav-tabs">
            <!-- {foreach $clusterlists as $value => $key} -->
            <li class="nav-item">
                {if $key eq $cluster}
                <a class="nav-link active">{$key}</a>
                {else}
                <a class="nav-link" href='{RC_Uri::url("memadmin/server/init/")}&cluster={$key}'>{$key}</a>
                {/if}
            </li>
            <!-- {/foreach} -->
        </ul>
        <div class="span12 memcache">
            <div class="step"></div>
            <div class="float-left">
                {$cluster_list}
            </div>
            <div class="float-right">
                {if $serverinfo}
                <label></label>
                <a class="btn btn-danger plus_or_reply list  data-pjax memcache" role="button"
                   href='{RC_Uri::url("memadmin/server/slabs/")}&cluster={$cluster}&server={$server}'>
                    <i ></i>看这个服务器 Slabs 统计</a>
                {/if}
            </div>

            <div class="full-size" style="margin: auto;clear:both">
                <div class="size-4" style="float:left;margin-right: 1%">
                    <div class="sub-header corner padding">Get <span class="green">Stats</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left">命中</span>
                            {$stats.get_hits}
                            <span class="right">[{$stats.get_hits_percent}%]</span>
                        </div>
                        <div class="line">
                            <span class="left">未命中</span>
                            {$stats.get_misses}
                            <span class="right">[{$stats.get_misses_percent}%]</span>
                        </div>
                        <div class="line">
                            <span class="left">比率</span>
                            {$stats.get_rate} Request/sec
                        </div>
                    </div>

                    <div class="sub-header corner padding">Set <span class="green">Stats</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left">总量</span>
                            {$stats.cmd_set}
                        </div>
                        <div class="line">
                            <span class="left">比率</span>
                            {$stats.set_rate} Request/sec
                        </div>
                    </div>

                    <div class="sub-header corner padding">Delete <span class="green">统计</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left">命中</span>
                            {$stats.delete_hits}
                            <span class="right">[{$stats.delete_hits_percent}%]</span>
                        </div>
                        <div class="line">
                            <span class="left">未命中</span>
                            {$stats.delete_misses}
                            <span class="right">[{$stats.delete_misses_percent}%]</span>
                        </div>
                        <div class="line">
                            <span class="left">比率</span>
                            {$stats.delete_rate}
                        </div>
                    </div>

                    <div class="sub-header corner padding">Cas <span class="green">统计</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left">命中</span>
                            {$stats.cas_hits}
                            <span class="right">[{$stats.cas_hits_percent}%]</span>
                        </div>
                        <div class="line">
                            <span class="left">未命中</span>
                            {$stats.cas_misses}
                            <span class="right">[{$stats.cas_misses_percent}%]</span>
                        </div>
                        <div class="line">
                            <span class="left">坏值</span>
                            {$stats.cas_badval}
                            <span class="right">[{$stats.cas_badval_percent}%]</span>
                        </div>
                        <div class="line">
                            <span class="left">比率</span>
                            {$stats.cas_rate}
                        </div>
                    </div>

                    <div class="sub-header corner padding">Increment <span class="green">统计</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left">命中</span>
                            {$stats.incr_hits}
                            <span class="right">[{$stat.incr_hits_percent}%]</span>
                        </div>
                        <div class="line">
                            <span class="left">未命中</span>
                            {$stats.incr_misses}
                            <span class="right">[{$stats.incr_misses_percent}%]</span>
                        </div>
                        <div class="line">
                            <span class="left">比率</span>
                            {$stats.incr_rate}
                        </div>
                    </div>

                    <div class="sub-header corner padding">Decrement <span class="green">统计</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left">命中</span>
                            {$stats.decr_hits}
                            <span class="right">[{$stats.decr_hits_percent}%]</span>
                        </div>
                        <div class="line">
                            <span class="left">未命中</span>
                            {$stats.decr_misses}
                            <span class="right">[{$stats.decr_misses_percent}%]</span>
                        </div>
                        <div class="line">
                            <span class="left">比率</span>
                            {$stats.decr_rate}
                        </div>
                    </div>

                    <div class="sub-header corner padding">Touch <span class="green">统计</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left">命中</span>
                            {$stats.touch_hits}
                            <span class="right">[{$stats.touch_hits_percent}%]</span>
                        </div>
                        <div class="line">
                            <span class="left">未命中</span>
                            {$stats.touch_misses}
                            <span class="right">[{$stats.touch_misses_percent}%]</span>
                        </div>
                        <div class="line">
                            <span class="left">比率</span>
                            {$stats.touch_rate}
                        </div>
                    </div>

                    <div class="sub-header corner padding">Flush <span class="green">统计</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left">总量</span>
                            {$stats.cmd_flush}
                        </div>
                        <div class="line">
                            <span class="left">比率</span>
                            {$stats.flush_rate}
                        </div>
                    </div>
                </div>

                <div class="size-2" style="float:left;margin-right: 1%">

                    <div class="sub-header corner padding">{$get_servers_cluster} <span class="green">统计</span></div>
                    <div class="container corner padding size-3cols">

                        {if $serverinfo}
                        <div class="line">
                            <span class="left setting">服务器已运行时间</span>
                            {$stats.uptime}
                        </div>
                        <div class="line" style="margin-bottom:4px;">
                            <span class="left setting">Memcached版本</span>
                            {$stats.version}
                        </div>
                        {/if}
                        <div class="line">
                            <span class="left setting">当前连接数量</span>
                            {$stats.curr_connections}
                        </div>
                        <div class="line">
                            <span class="left setting">运行以来连接总数</span>
                            {$stats.total_connections}
                        </div>
                        <div class="line">
                            <span class="left setting">最大错误连接数</span>
                            {$stats.listen_disabled_num}
                        </div>
                        <div class="line" style="margin-top:4px;">
                            <span class="left setting">当前存储的数据总数</span>
                            {$stats.curr_items}
                        </div>
                        <div class="line">
                            <span class="left setting">运行以来存储的数据总数</span>
                            {$stats.total_items}
                        </div>

                        {if $serverinfo}
                        <div class="line">
                            <span class="left setting">最老对象过期时间</span>
                            {$stats.oldest}
                        </div>
                        {/if}
                    </div>

                    <div class="sub-header corner padding">Eviction &amp; Reclaimed <span class="green">统计</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left setting">LRU是否可用</span>
                            {$stats.evictions}
                        </div>
                        <div class="line">
                            <span class="left setting">释放率</span>
                            {$stats.eviction_rate} Eviction/sec
                        </div>
                        <div class="line" style="margin-top:4px;">
                            <span class="left setting">回收率</span>
                            {$stats.reclaimed}
                        </div>
                        <div class="line">
                            <span class="left setting">Rate</span>
                            {$stats.reclaimed_rate}
                        </div>

                        <div class="line" style="margin-top:4px;">
                            <span class="left setting help" title="Internal name : expired_unfetched&#013;Items pulled from LRU that were never touched by get/incr/append/etc before expiring">已过期但未获取的对象数目</span>
                            {$stats.expired_unfetched}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : evicted_unfetched&#013;Items evicted from LRU that were never touched by get/incr/append/etc">已释放但未获取的对象数目</span>
                            {$stats.evicted_unfetched}
                        </div>
                    </div>

                    {if $serverinfo}
                    <div class="sub-header corner padding">Server <span class="green">配置</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left setting help" title="Internal name : accepting_conns&#013;Whether the server is accepting connection or not">是否接受新的连接</span>
                            {if $stats.accepting_conns}

                            {if $stats.accepting_conns}
                            yes
                            {else}
                            no
                            {/if}

                            {else}
                            {$stats.version}
                            {/if}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : maxbytes&#013;Maximum number of bytes allowed in this cache">最大字节数限制</span>
                            {$stats.maxbytes}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : maxconns&#013;Maximum number of clients allowed">最大并发连接数</span>
                            {$stats.maxconns}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : tcpport &amp; udpport&#013;TCP &amp; UDP listen port">TCP端口/UDP端口</span>
                            {$stats.port}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : inter&#013;Listen interface">IP地址</span>
                            {$stats.inter}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : evictions&#013;When Off, LRU evictions are disabled">LRU是否可用</span>
                            {$stats.evictions}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : domain_socket&#013;Path to the domain socket (if any)">Socket域路径</span>
                            {$stats.domain_socket}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : umask&#013;Umask for the creation of the domain socket">Socket域掩码</span>
                            {$stats.umask}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : chunk_size&#013;Minimum space allocated for key + value + flags">Chunk大小</span>
                            {$stats.chunk_size}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : growth_factor&#013;Chunk size growth factor">Chunk增长因子</span>
                            {$stats.growth_factor}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : num_threads&#013;Number of threads (including dispatch)">最大线程数</span>
                            {$stats.num_threads}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : detail_enabled&#013;If yes, stats detail is enabled">显示Stats细节信息</span>
                            {$stats.detail_enabled}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : reqs_per_event&#013;Max num IO ops processed within an event">最大IO吞吐量 Ops/Event</span>
                            {$stats.reqs_per_event}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : cas_enabled&#013;When no, CAS is not enabled for this server">是否启用CAS</span>
                            {$stats.cas_enabled}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : tcp_backlog&#013;TCP listen backlog">TCP监控日志</span>
                            {$stats.tcp_backlog}
                        </div>
                        <div class="line">
                            <span class="left setting help" title="Internal name : auth_enabled_sasl&#013;SASL auth requested and enabled">是否启用SASL验证</span>
                            {$stats.auth_enabled_sasl}
                        </div>
                    </div>

                    {elseif $cluster}
                    <div class="sub-header corner padding">集群 {$server} <span class="green">服务器列表</span></div>
                    <div class="container corner padding">
                        <!-- {foreach $clusterinfo as $name => $value} -->
                        <div class="line server" style="{if $displayed gt 8} display:none {else} {$displayed=$displayed+1} {/if}">
                            <span class="left setting">{if strlen($name) gt 27}{$name|truncate:27:"..."}{else}{$name}{/if}</span>
                            <span class="right" style="font-weight:bold;"><a href='{RC_Uri::url("memadmin/server/init")}&cluster={$cluster}&server={$name}' class="green">查看这个服务器统计信息</a></span>
                            <div class="line" style="margin-left:5px;">
                                {if $status.$name neq ''}
                                Memcached版本   {$status.$name}  , 服务器已运行时间 :   {$updaime}
                                {else}
                                服务器没有响应
                                {/if}
                            </div>
                        </div>
                        <!-- {/foreach} -->

                        {$remaining = $count_cluster - $displayed}
                        {if ($displayed gt 8) && ($remaining gte 0)}
                        <div class="line more">
                <span class="left" style="font-weight:bold;">
                {$remaining} Server{if $remaining gt 1} s are {else} is}{/if} not displayed</span>
                            <span class="right" style="font-weight:bold;"><a href="#" onclick="javascript:show('server');javascript:hide('more');" class="green">See all {count($cluster)}> Servers</a></span>
                        </div>
                        {/if}
                    </div>
                    {/if}
                </div>

                <div class="size-4" style="float:left;">
                    <div class="sub-header corner padding">Cache大小 <span class="green">状态</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left">使用</span>
                            {$stats.total_malloced}Bytes
                        </div>
                        <div class="line">
                            <span class="left">总量</span>
                            {$stats.limit_maxbytes}Bytes
                        </div>
                        <div class="line">
                            <span class="left">废弃</span>
                            {$stats.total_wasted}Bytes
                        </div>
                        <!--
            <div class="line">
                <span class="left">Percent</span>
                <?php echo sprintf('%.1f', $stats['bytes'] / $stats['limit_maxbytes'] * 100, 1); ?>%
            </div>
                        -->
                    </div>

                    <div class="sub-header corner padding">Cache大小 <span class="green">图表</span></div>
                    <div class="container corner">
                        <div id="cacheUsageContainer"></div>
                        <script>
                            var $limit_maxbytes = "{$stats.limit_maxbytes}";
                            var $wasted_percent = {$wasted_percent};
                            var $used_percent = {$used_percent};
                            var $free_percent = {$free_percent};
                            {literal}
                            new Highcharts.Chart({
                                chart: {
                                    backgroundColor: '#EBEBEB',
                                    plotBorderWidth: null,
                                    plotShadow: false,
                                    width: 274,
                                    height: 234,
                                    marginLeft: 0,
                                    marginRight: 0,
                                    marginTop: 0,
                                    marginBottom: 0,
                                    renderTo: 'cacheUsageContainer'
                                },
                                title: {
                                    text: '<b>' + $limit_maxbytes + 'Bytes</b>',
                                    y: 110,
                                    style: {
                                        fontSize: '12px'
                                    }
                                },
                                tooltip: {
                                    enabled: false
                                },
                                plotOptions: {
                                    pie: {
                                        borderWidth: 0,
                                        allowPointSelect: false,
                                        dataLabels: {
                                            enabled: true,
                                            color: '#000000',
                                            distance: 15,
                                            connectorWidth: 1.5,
                                            format: '<b>{point.name}</b><br/>{point.percentage:.1f} %'
                                        },
                                        center: ['50%', '50%']
                                    }
                                },
                                credits: {
                                    enabled: false
                                },
                                series: [{
                                    type: 'pie',
                                    name: 'Cache Size',
                                    size: '70%',
                                    innerSize: '55%',
                                    data: [{name: 'Wasted',
                                        y: $wasted_percent,
                                        color: '#B5463F'},
                                        {name: 'Used',
                                            y: $used_percent,
                                            color: '#2A707B'},
                                        {name: 'Free',
                                            y: $free_percent,
                                            color: '#FFFFFF'}]
                                }]
                            });
                            {/literal}
                        </script>
                    </div>

                    {if $get_servers}
                    <div class="sub-header corner padding">Hash 表 <span class="green">状态</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left help" title="Internal name : hash_power_level&#013;Current size multiplier for hash table">等级</span>
                            {$stats.hash_power_level}
                        </div>
                        <div class="line">
                            <span class="left">大小</span>
                            {$stats.hash_bytes}
                        </div>
                        <div class="line">
                            <span class="left help" title="Internal name : hash_is_expanding&#013;Indicates if the hash table is being grown to a new size">hash表正在扩展</span>
                            {$stats.hash_is_expanding}
                        </div>
                    </div>

                    {else if $get_cluster}
                    <div class="sub-header corner padding">Hash Table <span class="green">统计</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left">Size</span>
                            {$stats.hash_bytes}
                        </div>
                    </div>
                    {/if}
                    <div class="sub-header corner padding">Slab <span class="green">{lang key='memadmin::memadmin.reassign_automove'}</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left help" title="Internal name : slabs_moved&#013;Indicates how many pages have been successfully moved">{lang key='memadmin::memadmin.cs_slabs_moved'}</span>
                            {$stats.slabs_moved}
                        </div>
                        <div class="line">
                            <span  class="left help" title="Internal name : slab_reassign_running&#013;Indicates if the slab thread is attempting to move a page.&#013;It may need to wait for some memory to free up, so it could take several seconds.">{lang key='memadmin::memadmin.sett_slab_reassign'}</span>
                            {$stats.slab_reassign_running}
                        </div>
                    </div>

                    <div class="sub-header corner padding">Hit &amp; Miss Rate <span class="green">{lang key='memadmin::memadmin.graphicinfo'}</span></div>
                    <div class="container corner padding">
                        <div id="hitsContainer"></div>
                        <script>
                            var $get_hits_percent = {$get_hits_percent};
                            var $get_misses_percent = {$get_misses_percent};
                            <!-- {literal} -->
                            new Highcharts.Chart({
                                chart: {
                                    backgroundColor: '#EBEBEB',
                                    width: 274,
                                    height: 147,
                                    marginLeft: 0,
                                    marginRight: 0,
                                    marginTop: 0,
                                    marginBottom: 20,
                                    renderTo: 'hitsContainer'
                                },
                                title: {
                                    text: null
                                },
                                tooltip: {
                                    enabled: false
                                },
                                plotOptions: {
                                    column: {
                                        dataLabels: {
                                            enabled: true,
                                            format: '<b>{y} %</b>'
                                        }
                                    }
                                },
                                credits: {
                                    enabled: false
                                },
                                legend: {
                                    enabled: false
                                },
                                xAxis: {
                                    categories: ['Hits', 'Misses']
                                },
                                yAxis: {
                                    gridLineWidth: 0
                                },
                                series: [{
                                    type: 'column',
                                    name: 'Cache Size',
                                    data: [{name: 'Hits',
                                        y: $get_hits_percent,
                                        color: '#2A707B'},
                                        {name: 'Misses',
                                            y: $get_misses_percent,
                                            color: '#B5463F'}]
                                }]
                            });
                            <!-- {/literal} -->
                        </script>
                    </div>

                    <div class="sub-header corner padding">Network <span class="green">{lang key='memadmin::memadmin.stats'}</span></div>
                    <div class="container corner padding">
                        <div class="line">
                            <span class="left">{lang key='memadmin::memadmin.cs_bytes_read'}</span>
                            {$stats.bytes_read}Bytes
                        </div>
                        <div class="line">
                            <span class="left">{lang key='memadmin::memadmin.cs_bytes_written'}</span>
                            {$stats.bytes_written}Bytes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{* 提示您：调用page_footer.lbi.php *}{include file='library/page_footer.lbi.php'}

</body>
</html>
