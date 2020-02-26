<?php
//
//    ______         ______           __         __         ______
//   /\  ___\       /\  ___\         /\_\       /\_\       /\  __ \
//   \/\  __\       \/\ \____        \/\_\      \/\_\      \/\ \_\ \
//    \/\_____\      \/\_____\     /\_\/\_\      \/\_\      \/\_\ \_\
//     \/_____/       \/_____/     \/__\/_/       \/_/       \/_/ /_/
//
//   上海商创网络科技有限公司
//
//  ---------------------------------------------------------------------------------
//
//   一、协议的许可和权利
//
//    1. 您可以在完全遵守本协议的基础上，将本软件应用于商业用途；
//    2. 您可以在协议规定的约束和限制范围内修改本产品源代码或界面风格以适应您的要求；
//    3. 您拥有使用本产品中的全部内容资料、商品信息及其他信息的所有权，并独立承担与其内容相关的
//       法律义务；
//    4. 获得商业授权之后，您可以将本软件应用于商业用途，自授权时刻起，在技术支持期限内拥有通过
//       指定的方式获得指定范围内的技术支持服务；
//
//   二、协议的约束和限制
//
//    1. 未获商业授权之前，禁止将本软件用于商业用途（包括但不限于企业法人经营的产品、经营性产品
//       以及以盈利为目的或实现盈利产品）；
//    2. 未获商业授权之前，禁止在本产品的整体或在任何部分基础上发展任何派生版本、修改版本或第三
//       方版本用于重新开发；
//    3. 如果您未能遵守本协议的条款，您的授权将被终止，所被许可的权利将被收回并承担相应法律责任；
//
//   三、有限担保和免责声明
//
//    1. 本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的；
//    2. 用户出于自愿而使用本软件，您必须了解使用本软件的风险，在尚未获得商业授权之前，我们不承
//       诺提供任何形式的技术支持、使用担保，也不承担任何因使用本软件而产生问题的相关责任；
//    3. 上海商创网络科技有限公司不对使用本产品构建的商城中的内容信息承担责任，但在不侵犯用户隐
//       私信息的前提下，保留以任何方式获取用户信息及商品信息的权利；
//
//   有关本产品最终用户授权协议、商业授权与技术服务的详细内容，均由上海商创网络科技有限公司独家
//   提供。上海商创网络科技有限公司拥有在不事先通知的情况下，修改授权协议的权力，修改后的协议对
//   改变之日起的新授权用户生效。电子文本形式的授权协议如同双方书面签署的协议一样，具有完全的和
//   等同的法律效力。您一旦开始修改、安装或使用本产品，即被视为完全理解并接受本协议的各项条款，
//   在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反本
//   授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。
//
//  ---------------------------------------------------------------------------------
//
defined('IN_ECJIA') or exit('No permission resources.');

/**
 * ECJIA memadmin管理语言文件
 */

return array(
    //phpmyadmin

    'title' => "MemAdmin",
    'info'  	=> "可视化的Memcache管理工具",

    //phpmyadmin
    'stats'     => "统计",
    'hitinfo'   => "命中",
    'missinfo'  =>  "未命中",
    'rateinfo'  =>  "比率",
    'totalinfo' =>  "总量",
    'deletedata'   =>  "删除数据",
    'badvalue'     => "坏值",
    'configuration'     => "配置",
    'list' => '列表',
    'maxconns_errors'  => "最大错误连接数",
    'maxthreads'    =>  "最大线程数",
    'sett_reqs_per'  	=> "最大IO吞吐量 Ops/Event",
    'cachesize'     =>  "Cache大小",
    'graphicinfo'   =>  "图表",
    'reassign_automove'     =>  "重新分配和自动重载",
    'usedinfo'  =>  "使用",
    'wastedinfo'    =>  "废弃",
    'hashtable'     =>  "Hash 表",
    'levelinfo'     =>  "等级",
    'hash_bytes' 	 	=> "大小",
    'hash_is_expanding'  	=> "是否正在扩大",
    'path_domain_socket'     =>  "Socket域路径",
    'eviction_rate'     =>  "释放率",
    'reclaimed_rate'    =>  "回收率",
    'REQs'  =>  "请求/秒",
    'GETs'  =>  "存取/秒",
    'SETs'  =>  "写入/秒",
    'DELs'  =>  "删除/秒",
    'EVLs'  =>  "",
    'cachesize_info'    =>  "服务器上的总缓存大小",
    'cachesize_per'     =>  "服务器上使用的总缓存大小的百分比",
    'hit_info'  => "服务器上的全局命中百分比",
    'time_info'     =>  "连接到服务器并继续请求所需的时间，较高的值可能表示延迟或服务器问题",
    'req_info'  =>  "发给服务器的每秒总请求数（获取，设置，删除，增量...）",
    'conn_info'     =>  "当前连接，监视此数值不会太接近服务器最大连接设置",
    'gsd_info'  =>  "获取，设置或删除每秒发给服务器的命令",
    'evi_info'  =>  "具有明确过期时间设置的项目在过期之前每秒必须被释放的次数",
    'read_info'     =>  "服务器从网络每秒读取的总字节数",
    'write_info'     =>  "服务器每秒发送到网络的总字节数",
    'act_look'  =>  '实时监控：关于',
    'stats'     =>  '状态',
    'console'  =>   '终端',
    'Execute_pre'   =>  '预定义执行',
    'Execute_ser'   =>  "在Memcached服务器上执行命令",
    'Available_com'     =>  "可执行的命令",
    'choose_command'    => "选择命令",
    'Execute_tel'   =>  "执行Telnet",
    'telnet_ser'    =>  "在Memcached服务器上执行Telnet命令",
    'telnet_ser2'   =>  "你可以用这个东西在Memcached服务器上执行Telnet命令",
    'telnet_ser3'  =>  "它将连接到服务器，执行命令并将其返回控制台",
    'telnet_ser4'   =>  "更多关于Memcached命令信息，请查看Memcached协议",
    'search'    =>  "搜索",
    'search_ser'    =>  "在Memcached服务器上搜索关键字",
    'warning'   =>  "警告",
    'search_ser2'   =>  "这个功能只用于调试问题，不要在生产环境中使用它，因为它可能会锁定或影响您Memcached服务器性能。",
    'search_ser3'   =>  "另外请记住，它没有列出所有的键。它列出了达到特定缓冲区大小（1或2MB）的密钥，并列出了过期的密钥。",
    'search_ser4'   =>  "您也可以使用PCRE正则表达式",
    'detail_lev'    =>  "详细程度",
    'action'    =>  "动作",
    'search_show_keys'  =>  "查询和显示Key",
    'search_delete_keys'  =>  "查询和删除Key",
    'show_keys_expiration_Size'     =>  "显示Key，过期和大小",
    'show_keys'     =>  "显示Key",
    'get_info'  =>  "检索一个关键值",
    'set_info'  =>  "设置一个键值",
    'del_info'  =>  "删除特定的密钥",
    'inc_info'  =>  "增加数字键值",
    'dec_info'  =>  "递减数字键值",
    'flush_info'  =>  "清空Memcached服务器数据",
    'clear'		=>  "清空终端",
    'hide'			=>  "隐藏终端",
    'execute_cmd'		=>  "执行命令",
    'execute_telnet'			=>  "执行Telnet命令",
    'execute_search'		=>  "执行查询命令",
    'stats_err' =>  "检索或计算数据时出现了一个错误",
    'clusters'   =>  "集群管理",
    'monitor_configure' => "监控系统配置",
    'alert_refresh' => "实时统计的警报和刷新率",
    'refresh_rate' => "刷新率（单位：秒）",
    'memory_alert' => "内存警报",
    'hit_rate_alert' => "命中率警报",
    'eviction_alert' => "释放警报",
    'temp_path' => "缓存路径",
    'server_connection_timeout' => "服务器连接超时和其他",
    'timeout' => "超时（单位：秒）",
    'max_items' => "最大items",
    'max_items_info' => "允许最大的items数量",
    'save_live_configure' => "保存在线设置",
    'save_api_configure' => "保存API设置",
    'servers_list' =>  "服务器列表",
    'default_hostname_port' =>  "服务器名称默认填入 主机名：端口",
    'cluster' =>  "集群",
    'cluster_name' =>  "名称（选项）",
    'cluster_ip_hostname' =>  "IP地址/主机名",
    'cluster_port' =>  "端口",
    'cluster_delete' =>  "删除",
    'cluster_add_server_cluster' =>  "将新服务器添加到集群",
    'cluster_delete_cluster' =>  "删除集群",
    'cluster_add_server' =>  "添加新集群",
    'save_server_configure' => "保存服务器设置",
    'slab_title' => "服务器SLAB信息",
    'item_title' => "服务器ITEM信息",









    //memadmin.php
    'aboutcon' 	 	=> "服务器信息",
    'statsinfo'  	=> "统计信息",
    'settinginfo'  	=> "设置信息",
    'slabinfo' 	 	=> "区块统计",
    'iteminfo' 	 	=> "数据项统计",
    'sizeinfo' 	 	=> "对象数量统计",
    'monitor' 	 	=> "性能监控",
    'statmonitor'  	=> "统计监控",
    'datamonitor'  	=> "数据监控",
    'hitmonitor' 	=> "命中监控",
    'getset' 	 	=> "数据存取",
    'getdata' 	 	=> "读取数据",
    'setdata' 	 	=> "写入数据",
    'countcom' 	 	=> "计数命令",
    'flushallt'  	=> "全部失效",
    'exmod' 	 	=> "扩展功能",
    'itemtravt'  	=> "数据遍历",
    'itemfiltravt'  => "条件遍历",
    'command'       =>  "终端控制台",


    //set_con.php
    'set_con_title'  	=> "服务器连接设置",
    'set_con_listtit'  	=> "服务器连接列表",
    'set_con_addcon'  	=> "添加服务器连接",
    'set_con_addconpool'=> "添加服务器连接池",
    'help_addcon' 	 	=> "Memcache::connect()方法添加一个服务器连接",
    'con_name' 		 	=> "名称",
    'con_host' 		 	=> "host",
    'con_port' 		 	=> "port",
    'con_name_def' 	 	=> "默认连接",
    'con_more' 		 	=> "高级参数",
    'con_timeout' 	 	=> "连接超时时间(timeout)",
    'con_pcon' 		 	=> "持久化连接(pconnect)",
    'con_se' 		 	=> "秒",
    'con_add' 		 	=> "添加",
    'help_addcp' 	 	=> "Memcache::addServer()方法添加一个服务器连接池",
    'conp_name' 	 	=> "连接池名称",
    'conp_name_def'  	=> "默认连接池",
    'conp_consltit'  	=> "服务器",
    'conp_pcon' 	 	=> "持久化连接(persistent)",
    'conp_status' 	 	=> "status",
    'con_retry' 	 	=> "retry_interval",
    'con_weight' 	 	=> "权重(weight)",
    'add_new_con' 	 	=> "加入一台服务器",
    'no_cons' 		 	=> "无服务器连接",
    'con_exist' 	 	=> "列表中已经存在一个参数相同的连接",
    'no_conname' 	 	=> "名称不能为空",
    'no_host' 		 	=> "host不能为空",
    'no_port' 		 	=> "端口不能为空",
    'con_del' 		 	=> "删除",
    'con_arg' 		 	=> "连接参数",
    'con_arg_pcon' 	 	=> "持久连接",
    'con_arg_yes' 	 	=> "是",
    'con_arg_no' 	 	=> "否",
    'con_arg_timeout'  	=> "超时时间",
    'con_arg_se' 	 	=> "秒",
    'con_arg_default'  	=> "默认",
    'con_failhost' 	 	=> "存在非法字符",
    'con_failport' 	 	=> "端口非法",
    'con_failtimeout'  	=> "连接超时时间输入非法",
    'con_havecon' 	 	=> "存在一个同名的连接",
    'con_listm' 	 	=> "管理",
    'con_call' 		 	=> "收起所有",
    'con_eall' 		 	=> "展开所有",
    'con_clearlist'  	=> "清空列表",
    'con_savelist' 	 	=> "保存列表",
    'con_confirm' 	 	=> "确定删除?",
    'con_confirm_clear' => "确定清空列表 ? 保存在cookie中的信息将全部清空",
    'no_conpname' 	 	=> "连接池名称不能为空",
    'con_haveconp' 	 	=> "存在一个同名的连接池",
    'con_failweight'  	=> "权重输入非法",
    'con_failretry'  	=> "retry_interval",
    'con_failnoconp'  	=> "连接池中无服务器",
    'con_exist_conp'  	=> "列表中已经存在一个参数相同的连接池",
    'conp_statusfail'  	=> "status=FALSE",
    'conp_noweight'  	=> "无",
    'con_go' 		 	=> "开始管理",
    'con_nolist' 	 	=> "列表为空",
    'con_saveok' 	 	=> "列表保存成功",
    'con_clearok' 	 	=> "列表已清空",
    'con_listsavetime'  	=> "列表保存时间",
    'con_loadlist' 	 	=> "读取列表",
    'con_loadnotice'  	=> "载入保存在cookie中的列表，已有列表将被清空，确定载入？",

    //memadmin.php
    'mad_con' 	 	=> "连接",
    'mad_conset'  	=> "连接设置",
    'mad_conlist'  	=> "连接列表",

    //show_con.php
    'scon_tit' 	 	=> "连接信息",
    'scon_ptit'  	=> "连接池信息",
    'scon_type'  	=> '类型',
    'scon_mcon'  	=> "Memcache连接",
    'scon_mpcon'  	=> "Memcache持久连接",
    'scon_mconp'  	=> "Memcache连接池",
    'scon_confun'  	=> "连接函数",
    'scon_ispcon'  	=> "是否持久连接",
    'scon_condemo'  	=> "连接示例",
    'scon_conlist'  	=> "服务器列表",
    'scon_conser'  	=> "服务器",
    'scon_connum'  	=> "服务器数",
    'scon_nohave'  	=> "无",
    'lastupdate'    =>  "最后更新时间",

    //debug.php
    'run_time' 	 	=> "耗时",
    'run_memory'  	=> "内存",

    //con_status.php
    'cs_tit'  	=> "服务器STATS信息",
    'confail'  	=> "服务器无法连接",
    'cs_arg'  	=> "参数",
    'cs_value'  	=> "值",
    'cs_desc'  	=> "描述",
    'cs_pid'  	=> "memcache服务器进程ID",
    'cs_uptime' => "服务器已运行时间",
    'cs_time'  	=> "服务器当前Unix时间戳",
    'cs_version' 		 	=> "Memcached版本",
    'cs_libevent' 		 	=> "libevent版本",
    'cs_pointer_size' 	 	=> "操作系统指针大小",
    'cs_rusage_user' 	 	=> "进程累计用户时间",
    'cs_rusage_user_seconds'                => "进程累计用户时间（秒）",
    'cs_rusage_user_microseconds'                => "进程累计用户时间（微秒）",
    'cs_rusage_system' 	 	=> "进程累计系统时间",
    'cs_rusage_system_seconds'              => "进程累计系统时间（秒）",
    'cs_rusage_system_microseconds'              => "进程累计系统时间（微妙）",
    'cs_curr_connections'  	=> "当前连接数量",
    'cs_total_connections'  	=> "运行以来连接总数",
    'cs_connection_structures' => "Memcached分配的连接结构数量",
    'cs_cmd_get' 	 	=> "get命令请求次数",
    'cs_cmd_set' 	 	=> "set命令请求次数",
    'cs_cmd_flush' 	 	=> "flush命令请求次数",
    'cs_get_hits' 	 	=> "get命令命中次数",
    'cs_get_misses'  	=> "get命令未命中次数",
    'cs_delete_hits'  	=> "delete命令命中次数",
    'cs_delete_misses'  	=> "delete命令未命中次数",
    'cs_incr_hits' 	 	=> "incr命令命中次数",
    'cs_incr_misses'  	=> "incr命令未命中次数",
    'cs_decr_hits' 	 	=> "decr命令命中次数",
    'cs_decr_misses'  	=> "decr命令未命中次数",
    'cs_cas_hits' 	 	=> "cas命令命中次数",
    'cs_cas_misses'	 	=> "cas命令未命中次数",
    'cs_cas_badval'  	=> "使用擦拭次数",
    'cs_auth_cmds' 	 	=> "认证命令处理的次数",
    'cs_auth_errors'  	=> "认证失败数目",
    'cs_bytes_read'  	=> "读取总字节数",
    'cs_bytes_written'  	=> "发送总字节数",
    'cs_limit_maxbytes' => "分配的内存总大小（字节）",

    'cs_accepting_conns' 	 	=> "是否接受新的连接",
    'cs_listen_disabled_num'  	=> "失效的监听数",

    'cs_threads' 	 	=> "当前线程数",
    'cs_conn_yields'  	=> "连接操作主动放弃数目",
    'cs_bytes' 		 	=> "当前存储占用的字节数",
    'cs_curr_items'  	=> "当前存储的数据总数",
    'cs_total_items'  	=> "运行以来存储的数据总数",
    'cs_evictions' 	 	=> "LRU释放的对象数目",
    'cs_reclaimed' 	 	=> "再回收数据数目",
    'nostats' 		 	=> "无法获取STATS信息，可能由于版本不支持所致",
    'cs_scon' 		 	=> "选择服务器",
    'cs_cmd_set_hits'  	=> "set命令命中次数（Tokyo Tyrant服务特有）",
    'cs_cmd_set_misses' => "set命令未命中次数（Tokyo Tyrant服务特有）",
    'cs_cmd_delete'  	=> "delete命令请求次数（Tokyo Tyrant服务特有）",

    'cs_cmd_delete_hits'  	=> "delete命令未命中次数（Tokyo Tyrant服务特有）",
    'cs_cmd_delete_misses'  	=> "delete命令未命中次数（Tokyo Tyrant服务特有）",
    'cs_cmd_get_hits'	 	=> "get命令命中次数（Tokyo Tyrant服务特有）",
    'cs_cmd_get_misses'  	=> "get命令未命中次数（Tokyo Tyrant服务特有）",
    'cs_reserved_fds' 	 	=> "内部使用的FD数",
    'cs_cmd_touch' 		 	=> "touch命令请求次数",
    'cs_touch_hits' 	 	=> "touch命令命中次数",
    'cs_touch_misses' 	 	=> "touch命令未命中次数",
    'cs_hash_power_level'  	=> "Hash表等级",
    'cs_hash_bytes' 	 	=> "当前hash表大小",
    'cs_hash_is_expanding'  	=> "hash表正在扩展",
    'cs_expired_unfetched'  	=> "已过期但未获取的对象数目",
    'cs_evicted_unfetched'  	=> "已释放但未获取的对象数目",
    'cs_max_connections'    => "最大并发连接数",
    'cs_rejected_connections'   => "因为最大客户端数量限制而被拒绝的连接请求数量",
    'cs_get_expired'    => "已请求但已过期的项目数",
    'cs_get_flushed'    => "对已请求但已刷新通过项目数",
    'cs_time_in_listen_disabled_us'     => "记录并报告在listen_disabled上花费的时间",
    'cs_slab_reassign_rescues'  => "在页移动中从清除中解救的项目",
    'cs_slab_reassign_chunk_rescues'   => "在页面移动过程中被救出的项目的各个部分",
    'cs_slab_reassign_evictions_nomem'     => "在页面移动过程中被清除的有效项目",
    'cs_slab_reassign_busy_items'   => "在页面移动期间忙的项目, 需要在页面移动前重试",
    'cs_slab_reassign_busy_deletes'     => "在页面移动期间繁忙的项目, 需要删除之前的页面可以移动",
    'cs_slab_reassign_running'  => "正在动的slab页",
    'cs_slabs_moved'    => "已移动的Slab页总数",
    'cs_lru_crawler_running'    => "/",
    'cs_lru_crawler_starts'    => "启动LRU crawler",
    'cs_lru_maintainer_juggles'     => "LRU bg线程唤醒的次数",
    'cs_malloc_fails'   => "/",
    'cs_log_worker_dropped'     => "由于缓存区已满而不能写入的日志",
    'cs_log_worker_written'     => "记录线程写的日记",
    'cs_log_watcher_skipped'    => "日志没有发送到wathcer",
    'cs_log_watcher_sent'   => "日志写入watcher",
    'cs_slab_global_page_pool'  => "将页面返回到全局池以重新分配给其他板块类",
    'cs_evicted_active'     => "LRU最近被命中但没有跳到LRU顶部的数据",
    'cs_crawler_reclaimed'  => "LRU Crawler释放的项目总数",
    'cs_crawler_items_checked'  => "LRU Crawler检查的总项目",
    'cs_lrutail_reflocked'  => "数项发现是引用计数锁在LRU tail",
    'cs_moves_to_cold'  => "从HOT或者WARM到CLOD的项目数量",
    'cs_moves_to_warm'  => "从CLOD到WARM的项目数量",
    'cs_moves_within_lru'   => "活动项目在HOT或WARM中碰撞的次数",
    'cs_direct_reclaims'    => "时间工作线程必须直接回收和退出的项目",
    'cs_lru_bumps_dropped'  => "/",
    'cs_slab_reassign_inline_reclaim'   => "内部统计计数器",

    //con_settings.php
    'sett_tit' 	 	=> "服务器SETTINGS信息",
    'sett_maxbytes' => "最大字节数限制",
    'sett_maxconns' 	=> "允许最大连接数",
    'sett_tcpport'  	=> "TCP端口",
    'sett_udpport'  	=> "UDP端口",
    'sett_inter'  	=> "IP地址",
    'sett_verbosity'=> "日志（0=none,1=som,2=lots）",
    'sett_oldest'  	=> "最老对象过期时间",
    'sett_evictions'=> "LRU是否可用",

    'sett_domain_socket'  	=> "Socketpath",
    'sett_umask' 		 	=> "Socket域掩码",
    'sett_growth_factor'  	=> "Chunk增长因子",
    'sett_chunk_size' 	 	=> "Chunk大小",
    'sett_num_threads' 	 	=> "线程数（默认4,可通过-t参数设置）",
    'sett_num_threads_per_udp' => "每UDP Socket中的工作线程数",
    'sett_stat_key_prefix'  	=> "stats分隔符",
    'sett_detail_enabled'  	=> "显示Stats细节信息",
    'sett_reqs_per_event'  	=> "最大IO吞吐量（每event）",
    'sett_cas_enabled' 	 	=> "是否启用CAS",
    'sett_tcp_backlog' 	 	=> "TCP监控日志",
    'sett_binding_protocol' => "绑定协议",
    'sett_auth_enabled_sasl'=> "是否启用SASL验证",
    'sett_item_size_max'  	=> "数据最大尺寸",
    'nosettings' 		 	=> "无法获取SETTINGS信息，可能由于无权限或版本不支持（若需支持，请安装PHP memcache扩展2.2.6版本）",
    'confail_tokyo_cabinet' => "无法获取信息，可能由于该连接为支持 Memcache 协议的其他服务（如 Tokyo Tyrant 等）",
    'sett_maxconns_fast'  	=> "达到最大连接时是否报错并关闭连接",
    'sett_hashpower_init'  	=> "初始hash表等级",
    'sett_slab_reassign'  	=> "是否开启Slab重分配",
    'sett_slab_automove'  	=> "Slab自动重分配",
    'sett_slab_automove_ratio' 	=> "Slab自动重分配（比率）",
    'sett_slab_automove_window' 	=> "Slab自动重分配（窗口）",
    'sett_slab_chunk_max' 	=> "指定 Slab 的最大大小",
    'sett_lru_crawler' 	=> "是否清除已过期的项目的 Slab 类",
    'sett_lru_crawler_sleep' 	=> "LRU爬虫线程工作时的休眠间隔（微秒）",
    'sett_lru_crawler_tocrawl' 	=> "LRU爬虫检查每条LRU队列中的多少个item",
    'sett_tail_repair_time' 	=> "存储时间距离",
    'sett_flush_enabled' 	=> "是否允许客户端的flush_all命令",
    'sett_dump_enabled' 	=> "是否启用转储",
    'sett_hash_algorithm' 	=> "指定哈希算法",
    'sett_lru_maintainer_thread' 	=> "是否启用maintainer线程",
    'sett_lru_segmented' 	=> "是否启用LRU分段工作",
    'sett_hot_lru_pct' 	=> "HOT_LRU队列的item比例阀值",
    'sett_warm_lru_pct' 	=> "WARM_LRU队列的item比例阀值",
    'sett_hot_max_factor' 	=> "设置空闲时HOT_LRU队列为cold的空闲时间",
    'sett_warm_max_factor' 	=> "设置WARM_LRU队列为cold的空闲时间",
    'sett_temp_lru' 	=> "是否启用临时LRU功能",
    'sett_temporary_ttl' 	=> "TTL小于设置值会标记为临时",
    'sett_idle_timeout' 	=> "在要求关闭客户端之前，允许客户端保持空闲的最短秒数",
    'sett_watcher_logbuf_size' 	=> "每个watcher写入缓冲区的大小",
    'sett_worker_logbuf_size' 	=> "每个worker-thread写入缓冲区的大小",
    'sett_track_sizes' 	=> "显示每个Slab组已用的大小",
    'sett_inline_ascii_response' 	=> "如果yes，则存储来自value的响应",


    //con_items.php
    'items_tit'  	=> "服务器ITEMS信息",
    'noitems' 	 	=> "无法获取ITEMS信息，可能由于 Memcache 中暂无数据",
    'noitems_conp'  	=> "无法获取ITEMS信息，可能由于 Memcache 中暂无数据或无法连接",
    'items_sslab'  	=> "选择内存区块：",
    'items_number'  	=> "该slab中对象数（不包含过期对象）",
    'items_age'  	=> "LRU队列中最老对象的过期时间",
    'items_evicted' => "LRU释放对象数",

    'items_evicted_nonzero' => "设置了非0时间的LRU释放对象数",
    'items_evicted_time'  	=> "最后一次LRU释放的对象存在时间",

    'items_outofmemory' => "不能存储对象次数",
    'items_tailrepairs' => "修复slabs次数",
    'items_reclaimed'  	=> "使用过期对象空间存储对象次数",

    'items_expired_unfetched' => "已过期但未获取的对象数目",
    'items_evicted_unfetched' => "已释放但未获取的对象数目",

    //con_sizes.php
    'size_tit'  	=> "服务器SIZES信息",
    'nosizes'  	=> "无法获取SIZES信息，可能由于 Memcache 中暂无数据",
    'size_size' 	=> "大小",
    'size_count' 	=> "参数",

    //con_slabs.php
    'slabs_tit'  	=> "服务器SLABS信息",
    'noslabs' 	 	=> "无法获取SLABS信息",
    'slabs_sslab'  	=> "选择内存区块：",

    'slabs_active_slabs'  	=> "Slab数量",
    'slabs_total_malloced'  	=> "总内存数量",
    'slabs_chunk_size' 	 	=> "chunk大小（byte）",
    'slabs_chunks_per_page' => "每个page的chunk数量",
    'slabs_total_pages'  	=> "page数量",
    'slabs_total_chunks'  	=> "chunk总数量（chunks_per_page*total_pages）",
    'slabs_used_chunks'  	=> "已被分配的chunk数量",
    'slabs_free_chunks'	  	=> "过期数据空出的chunk数",
    'slabs_free_chunks_end' => "从未被使用过的chunk数",
    'slabs_mem_requested'  	=> "请求存储的字节数",

    'slabs_get_hits'  	=> "get命令命中数",
    'slabs_cmd_set'  	=> "set命令请求数",
    'slabs_delete_hits' => "delete命令命中数",
    'slabs_incr_hits'  	=> "incr命令命中数",
    'slabs_decr_hits'  	=> "decr命令命中数",
    'slabs_cas_hits'  	=> "cas命令命中数",
    'slabs_cas_badval' => "cas数据类型错误数",
    'noslabs_conp' 	 	=> "无法获取SLABS信息",
    'noslabs_noitems'  	=> "无法获取SLABS信息，可能由于 Memcache 中暂无数据",
    'slabs_touch_hits'  	=> "touch命令命中数",

    //stats_monitor.php
    'statsmo_tit'  	=> "统计信息监控",
    'statsmo_check' => "选择",
    'statsmo_scon'  	=> "选择要监控的服务器",
    'statsmo_arg'  	=> "选择要监控的参数",
    'nocheck' 	 	=> "请选择至少一个监控参数",
    'statsmo_sall'  	=> "全选",
    'statsmo_call'  	=> "取消",
    'statsmo_oall'  	=> "反选",
    'statsmo_start' => "开始监控",

    //show_monitor_stats.php
    'showmo_stats_tit'  	=> "统计信息监控",
    'showmo_stats_conptit' => "中的服务器",
    'showmo_nostats'  	=> "无法获取STATS信息，监控终止",
    'showmo_relayout'  	=> "恢复布局",
    'showmo_aftit' 	 	=> "自动刷新",
    'showmo_afstart'  	=> "开始",
    'showmo_afstop'  	=> "停止",
    'showmo_lasttime'  	=> "上次刷新时间",
    'afsempty' 		 	=> "刷新时间不能为空",
    'afsfail' 		 	=> "刷新时间填写非法",
    'afsjsonfail' 	 	=> "刷新失败，监控终止",
    'sautof_des' 	 	=> "秒自动刷新",

    //data_monitor.php
    'datamo_tit' 		 	=> "数据监控",
    'datamo_noitems' 	 	=> "Memcache 中暂无数据，无法进行监控",
    'datamo_arg_tit' 	 	=> "Memcache 服务器数据状态监控",
    'datamo_slabarg' 	 	=> "SLAB 参数",
    'datamo_gloarg' 	 	=> "全局参数",
    'showmo_data_tit' 	 	=> "数据信息监控",
    'showmo_data_lostmem'  	=> "被浪费内存数",
    'showmo_slab_arg' 	 	=> "SLAB 参数",

    //hit_monitor.php
    'hm_gettit'  	=> "GET 命中情况",
    'hm_deletetit'  	=> "DELETE 命中情况",
    'hm_incrtit'  	=> "INCR 命中情况",
    'hm_decrtit'  	=> "DECR 命中情况",
    'hm_castit'  	=> "CAS 命中情况",
    'hm_settit'  	=> "SET 命中情况",
    'hm_touchtit'  	=> "TOUCH 命中情况",

    //show_monitor_hit.php
    'hitmo_tit' 	 	=> "命中情况监控",
    'hitmo_cmdcount'  	=> "请求总数：",
    'hitmo_hitcount'  	=> "命中次数：",
    'hitmo_misscount'  	=> "未命中次数：",
    'hitmo_hitrate'  	=> "命中率",
    'hitmo_hittit' 	 	=> "命中情况",
    'hitmo_nochart'  	=> "暂无统计图",
    'hitmo_hit' 	 	=> "命中",
    'hitmo_miss' 	 	=> "未命中",

    //mem_get.php
    'memg_tit' 		 	=> "读取数据",
    'memg_nokey' 	 	=> "请输入要查询的KEY",
    'memg_delconfirm'  	=> "确定从Memcached中立即删除？",
    'memg_unserfail'  	=> "反序列化失败，非序列化字符串",
    'memg_inputnot'  	=> "查询多个KEY以 空格 分隔",
    'memg_notget' 	 	=> "未查到",
    'memg_getres' 	 	=> "查询结果",
    'memg_resnot' 	 	=> "数组/对象 序列化后显示，JSON字符串反序列化后以数组形式显示",
    'memg_geterror'  	=> "错误：无法解压缩或反序列化，原因可能为设置了对应的flags位，但内容为非有效的压缩或序列化格式",
    'memg_butvalue'  	=> "查询",
    'memg_ser' 		 	=> "序列化",
    'memg_unser' 	 	=> "反序列化",
    'memg_tnum' 	 	=> "获取总数",
    'memg_updateres'  	=> "刷新",
    'memg_reget' 	 	=> "编码指定错误，尝试转换编码中",

    //mem_set.php
    'mems_tit' 		 	=> "写入数据",
    'mems_noempty' 	 	=> "KEY或VALUE不能为空",
    'mems_setsuss' 	 	=> "数据写入成功",
    'mems_settit' 	 	=> "数据存储",
    'mems_consavefail'  	=> "保存失败",
    'mems_conpsavefail' => "保存记录失败，原因可能为连接池根据CRC32规则映射到的服务器不可用",

    //mem_count.php
    'mems_counttit'  	=> "计数命令",
    'mems_countsuss'  	=> "设置成功，修改后的VALUE值： ",
    'mems_countfail'  	=> "设置失败，无该KEY或VALUE不为数值",
    'mems_valuenonum'  	=> "VALUE只能为正整数",
    'mems_countsave'  	=> "保存",

    //item_trav.php
    'itemt_tit' 	 	=> "数据遍历",
    'itemt_nonum' 	 	=> "遍历数目不能为空",
    'itemt_numonly'  	=> "只能为正整数",
    'itemt_numwrong'  	=> "数目填写过大，不能超过记录总数",
    'itemt_notexist'  	=> "该条记录不存在或已失效",
    'itemt_novaluetime' => "失效时间",
    'itemt_loading'  	=> "数据载入中",
    'itemt_conpgeterror'=> "该记录不存在或已失效，或连接池无法根据CRC32规则访问该记录，如需遍历请单独对该台服务器进行遍历",
    'itemt_getres' 	 	=> "遍历结果",
    'itemt_prepage'  	=> "上一页",
    'itemt_nexpage'  	=> "下一页",
    'itemt_pagenumno'  	=> "输入正确的页数",
    'itemt_pagingerr'  	=> "遍历失败，可能由于该页元素已失效或数据量太大",
    'itemt_totalnum'  	=> "记录总数",
    'itemt_sleslabid'  	=> "选择区块",
    'itemt_slabtotalnum'=> "区块内共有记录",
    'itemt_travtit'  	=> "遍历前",
    'itemt_travtitnum'  	=> "条记录",
    'itemt_getbut' 	 	=> "获取数据",
    'itemt_numnott'  	=> "由于Memcached源码对cachedump命令的限制，最多遍历2M的key",
    'itemt_moreinfo'  	=> "更多",
    'itemt_closemore'  	=> "收起",
    'itemt_size' 	 	=> "大小",
    'itemt_expiretime'  	=> "永久有效",
    'itemt_valuetype'  	=> "类型",
    'itemt_charsettit'  	=> "字符集",

    //item_filtertrav.php
    'itemft_tit' 		 	=> "条件遍历",
    'itemft_nofiltercheck'  	=> "请对KEY或VALUE进行限定",
    'itemft_filterkeyemp'  	=> "限定KEY的正则表达式不能为空",
    'itemft_filtervalueemp' => "限定VALUE的正则表达式不能为空",
    'itemft_keyfilterfail'  	=> "限定KEY的正则表达式输入错误",
    'itemft_valuefilterfail'=> "限定VALUE的正则表达式输入错误",
    'itemft_noreturn' 	 	=> "未查到符合条件的记录",

    'itemft_conpcannotfilter' => "连接池无法根据CRC32规则访问该记录，无法确定该记录是否满足VALUE限定条件，请单独遍历该台服务器",

    'itemft_keyfiltertit'  	=> "对 KEY 限定条件",
    'itemft_valuefiltertit' => "对 VALUE 限定条件",
    'itemft_filter' 	 	=> "正则表达式",
    'itemft_perlonly' 	 	=> "仅支持 Perl兼容正则表达式",
    'itemft_demo' 		 	=> "正则表达式示例",
    'itemft_notforvalue'  	=> "对VALUE进行条件限定会遍历所有数据，消耗较大，对于数组/对象等结构先序列化后匹配，请考虑序列化过程产生的额外字符对结果的影响",

    'itemft_close' => "关闭",
    'itemft_demo1' => "包含abc",
    'itemft_demo2' => "包含abc且不区分大小写",
    'itemft_demo3' => "以abc开头",
    'itemft_demo4' => "以abc结尾",
    'itemft_demo5' => "以数字结尾",
    'itemft_demo6' => "不包含字母a和b",

    //mem_flush.php
    'flush_tit'  	=> "全部失效",
    'flush_delnot'  	=> "确定使全部记录失效吗？",
    'flush_delok'  	=> "操作成功",
    'flush_not'  	=> "立即使所有已经存在的元素失效，请谨慎使用",
    'flush_but'  	=> "全部失效",

    //追加
    'increment'		 	=> 'INCREMENT：',
    'key'			 	=> 'KEY：',
    'value'			 	=> 'VALUE：',
    'set'			 	=> '设置',
    'decrement'		 	=> 'DECREMENT：',
    'notice'		 	=> '温馨提示：',
    'flushall_notice' 	=> '当点击“全部失效”按钮之后，所有已经存在的元素失效，请谨慎使用',
    'write_in'		 	=> '写入',
    'pls_enter_key'	 	=> '请填写KEY',
    'keyquery_notice' 	=> '请输入要查询的KEY，查询多个KEY以换行分隔',
    'quick_search'	 	=> '快速查询',
    'search_result'	 	=> '搜索结果',
    'travnum'		 	=> '遍历数量',
    'choose_parameters' 	=> '选择参数',
    'no_info'		 	=> '没有找到任何信息',

    'label_con_name'	 	=> '名称：',
    'label_scon_ispcon'	 	=> '是否持久连接：',
    'label_scon_type'	 	=> '类型：',
    'label_scon_confun'	 	=> '连接函数：',
    'label_con_port'	 	=> 'Port：',
    'label_con_host'	 	=> 'Host：',
    'label_con_arg_timeout' 	=> '超时时间：',
    'label_itemft_keyfiltertit'  	=> "对 KEY 限定条件：",
    'label_itemft_valuefiltertit'  	=> "对 VALUE 限定条件：",

    'FormatFail'	 	=> '格式错误',
    'overview'		 	=> '概述',
    'more_info'      	=> '更多信息：',

    'read_data_help' 	=> '欢迎访问ECJia智能后台读取数据页面，可以在此页面进行读取数据操作。',
    'about_read_data' 	=> '关于读取数据帮助文档',

    'write_data_help' 	=> '欢迎访问ECJia智能后台写入数据页面，可以在此页面进行写入数据操作。',
    'about_write_data' 	=> '关于写入数据帮助文档',

    'count_cmd_help' 	=> '欢迎访问ECJia智能后台计数命令页面，可以在此页面进行INCREMENT和DECREMENT操作。',
    'about_count_cmd' 	=> '关于计数命令帮助文档',

    'flushhall_help' 	=> '欢迎访问ECJia智能后台全部失效页面，可以在此页面进行全部失效操作。',
    'about_flushall' 	=> '关于全部失效帮助文档',

    'itemtrav_help'	 	=> '欢迎访问ECJia智能后台数据遍历页面，可以在此页面页面对数据进行遍历查询。',
    'about_itemtrav' 	=> '关于数据遍历帮助文档',

    'filtertrav_help' 	=> '欢迎访问ECJia智能后台条件遍历页面，可以在此页面页面对数据进行条件遍历查询。',
    'about_filtertrav' 	=> '关于条件遍历帮助文档',

    'stats_monitor_help'  	=> '欢迎访问ECJia智能后台统计信息监控页面，可以在此页面对统计信息进行监控。',
    'about_stats_monitor' 	=> '关于统计监控帮助文档',

    'data_monitor_help'	 	=> '欢迎访问ECJia智能后台数据监控页面，可以在此页面对数据进行监控。',
    'about_data_monitor' 	=> '关于数据监控帮助文档',

    'hit_monitor_help'	 	=> '欢迎访问ECJia智能后台命中监控页面，可以在此页面对命中进行监控。',
    'about_hit_monitor'	 	=> '关于命中监控帮助文档',

    'stats_info_help'	 	=> '欢迎访问ECJia智能后台服务器STATS信息页面，可以在此页面查看服务器STATS信息。',
    'about_stats_info'	 	=> '关于服务器STATS信息帮助文档',

    'setting_info_help'	 	=> '欢迎访问ECJia智能后台服务器SETTINGS信息页面，可以在此页面查看服务器SETTINGS信息。',
    'about_setting_info' 	=> '关于服务器SETTINGS信息帮助文档',

    'slabs_info_help'	 	=> '欢迎访问ECJia智能后台服务器SLABS信息页面，可以在此页面查看服务器SLABS信息。',
    'about_slabs_info'	 	=> '关于服务器SLABS信息帮助文档',

    'items_info_help'	 	=> '欢迎访问ECJia智能后台服务器ITEMS信息页面，可以在此页面查看服务器ITEMS信息。',
    'about_items_info'	 	=> '关于服务器ITEMS信息帮助文档',

    'sizes_info_help'	 	=> '欢迎访问ECJia智能后台服务器SIZES信息页面，可以在此页面查看服务器SIZES信息。',
    'about_sizes_info'	 	=> '关于服务器SIZES信息帮助文档',

    'connect_info_help'	 	=> '欢迎访问ECJia智能后台连接信息页面，可以在此页面查看MemAdmin的连接信息。',
    'about_connect_info' 	=> '关于连接信息帮助文档',

    'js_lang' => array(
        'keyquery_required' 	=> '请输入要查询的KEY！',
        'no_records'	 	=> '没有找到任何记录',
        'charset'		 	=> '字符集',
        'label_type'	 	=> '类型：',
        'ok'			 	=> '确定',
        'cancel'		 	=> '取消',
        'select_parameter' 	=> '请先选择参数！',
        'startaf_required' 	=> '刷新时间不能为空！',
        'startaf_error'	 	=> '刷新时间填写非法！',
        'stop'			 	=> '停止',
        'start'			 	=> '开始',
        'refresh_fail'	 	=> '刷新失败，监控终止！',
        'hit'			 	=> '命中',
        'not_hit'		 	=> '未命中',
        'show'		=>  "显示终端",
        'hide'			=>  "隐藏终端",
    )
);

//end

