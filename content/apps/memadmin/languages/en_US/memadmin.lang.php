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
	'title' => "MemAdmin",
	'info' 	=> "A GUI Administration for memcached",
	'help' 	=> "Help",
	'exit' 	=> "Logout",
	
	//memadmin.php
	'aboutcon' 		=> "Con Analysis",
	'statsinfo' 	=> "Stats",
	'settinginfo' 	=> "Settings",
	'slabinfo' 		=> "Slabs",
	'iteminfo' 		=> "Items",
	'sizeinfo' 		=> "Sizes",
	'monitor' 		=> "Monitors",
	'statmonitor' 	=> "Statistics",
	'datamonitor' 	=> "Data",
	'hitmonitor' 	=> "Hit Rate",
	'getset' 		=> "Storage",
	'getdata' 		=> "Get",
	'setdata' 		=> "Set",
	'countcom' 		=> "Count",
	'flushallt' 	=> "Flush All",
	'exmod' 		=> "Modules",
	'itemtravt' 	=> "Traverse",
	'itemfiltravt' 	=> "Filter",
	
	//set_con.php
	'set_con_title' 	=> "Connection Settings",
	'set_con_listtit' 	=> "Connection List",
	'set_con_addcon' 	=> "Add Connection",
	'set_con_addconpool'=> "Add Connection Pool",
	'help_addcon' 		=> "Add a connection with Memcache::connect() method",
	'con_name' 			=> "Name",
	'con_host' 			=> "host", 
	'con_port' 			=> "port",
	'con_name_def' 		=> "Default connection",
	'con_more' 			=> "More",
	'con_timeout' 		=> "timeout",
	'con_pcon' 			=> "pconnect",
	'con_se' 			=> "s",
	'con_add' 			=> "Add",
	'help_addcp' 		=> "Add a connection pool with Memcache::addServer() method",
	'conp_name' 		=> "Name",
	'conp_name_def' 	=> "Default connection pool",
	'conp_consltit' 	=> "Server",
	'conp_pcon' 		=> "persistent",
	'conp_status' 		=> "status",
	'con_retry' 		=> "retry_interval",
	'con_weight' 		=> "weight",
	'add_new_con' 		=> "Add a server",
	'no_cons' 			=> "No connection list",
	'con_exist' 		=> "Exists a same parameter connection in the list",
	'no_conname' 		=> "name cannot be empty",
	'no_host' 			=> "host cannot be empty",
	'no_port' 			=> "port cannot be empty",
	'con_del' 			=> "Delete",
	'con_arg' 			=> "Parameters",
	'con_arg_pcon' 		=> "persistent",
	'con_arg_yes' 		=> "Yes",
	'con_arg_no' 		=> "No",
	'con_arg_timeout' 	=> "timeout",
	'con_arg_se' 		=> "s",
	'con_arg_default' 	=> "Default",
	'con_failhost' 		=> "Illegal character exists",
	'con_failport' 		=> "Illegal port",
	'con_failtimeout' 	=> "Illegal timeout",
	'con_havecon' 		=> "Exists a same name connection in the list",
	'con_listm' 		=> "Management",
	'con_call' 			=> "Collapse",
	'con_eall' 			=> "Expand",
	'con_clearlist' 	=> "Clear List",
	'con_savelist' 		=> "Save List",
	'con_confirm' 		=> "Really Delete?",
	'con_confirm_clear' => "Really clear the list? The information stored in cookie will be lost",
	'no_conpname' 		=> "name cannot be empty",
	'con_haveconp' 		=> "Exists a same name connection pool in the list",
	'con_failweight' 	=> "Illegal weight",
	'con_failretry' 	=> "retry_interval",
	'con_failnoconp' 	=> "No server in the connection pool",
	'con_exist_conp' 	=> "Exists a same parameter connection pool in the list",
	'conp_statusfail' 	=> "status=FALSE",
	'conp_noweight' 	=> "No",
	'con_go' 			=> "Manage",
	'con_nolist' 		=> "List Empty",
	'con_saveok' 		=> "Save successfully",
	'con_clearok' 		=> "Clear successfully",
	'con_listsavetime' 	=> "Save Time",
	'con_loadlist' 		=> "Load List",
	'con_loadnotice' 	=> "Load the list in cookie,the current list will be cleared?",
	
	//memadmin.php
	'mad_con' 		=> "Con",
	'mad_conset' 	=> "Set Con",
	'mad_conlist' 	=> "Connection List",
	
	//show_con.php
	'scon_tit' 		=> "Con Info",
	'scon_ptit' 	=> "Connection Pool Information",
	'scon_type' 	=> 'Type',
	'scon_mcon' 	=> "Memcache connect",
	'scon_mpcon' 	=> "Memcache pconnect",
	'scon_mconp' 	=> "Memcache Connection Pool",
	'scon_confun' 	=> "Connection method",
	'scon_ispcon' 	=> "is pconnect",
	'scon_condemo' 	=> "Connect Demo",
	'scon_conlist' 	=> "Server List",
	'scon_conser' 	=> "Server",
	'scon_connum' 	=> "Server num",
	'scon_nohave' 	=> "no",
	
	//debug.php
	'run_time' 		=> "Time",
	'run_memory' 	=> "Mem",
	
	//con_status.php
	'cs_tit' 	=> "STATS",
	'confail' 	=> "Server can not be connected",
	'cs_arg' 	=> "Parameter",
	'cs_value' 	=> "Value",
	'cs_desc' 	=> "Description",
	'cs_pid' 	=> "memcache process id",
	'cs_uptime' => "number of seconds since the process was started",
	'cs_time' 	=> "current time",
	
	'cs_version' 		=> "memcache version",
	'cs_libevent' 		=> "libevent version",
	'cs_pointer_size' 	=> "system pointer size ",
	
	'cs_rusage_user' 	=> "seconds the cpu has devoted to the process as the user",
	'cs_rusage_system' 	=> "seconds the cpu has devoted to the process as the system",
	'cs_curr_connections' 		=> "current number of open connections to memcached",
	'cs_total_connections' 		=> "total number of open connections to memcached",
	'cs_connection_structures' 	=> "the number of allocated connection structures",
	
	'cs_cmd_get' 		=> "total GET commands number",
	'cs_cmd_set' 		=> "total SET commands number",
	'cs_cmd_flush' 		=> "total FLUSH commands number",
	'cs_get_hits' 		=> "total GET hits number",
	'cs_get_misses' 	=> "total GET misses number",
	'cs_delete_hits' 	=> "total DELETE hits number",
	'cs_delete_misses' 	=> "total DELETE misses number",
	'cs_incr_hits' 		=> "total INCR hits number",
	'cs_incr_misses' 	=> "total INCR misses number",
	'cs_decr_hits' 		=> "total DECR hits number",
	'cs_decr_misses' 	=> "total DECR misses number",
	'cs_cas_hits' 		=> "total CAS hits number",
	'cs_cas_misses' 	=> "total CAS misses number",
	'cs_cas_badval' 	=> "number of CAS hits on this chunk where the existing value did not match",
	'cs_auth_cmds' 		=> "indicates the total number of authentication attempts.",
	'cs_auth_errors' 	=> "indicates the number of failed authentication attempts",
	'cs_bytes_read' 	=> "total number of bytes read by this server from network",
	'cs_bytes_written' 	=> "total number of bytes sent by this server to network",
	'cs_limit_maxbytes' => "number of bytes this server is allowed to use for storage（byte）",
	
	'cs_accepting_conns' 		=> "accepting connections（0/1）",
	'cs_listen_disabled_num' 	=> "number of disabled listen",
	
	'cs_threads' 		=> "number of threads",
	'cs_conn_yields' 	=> "number of times any connection yielded to another",
	'cs_bytes' 			=> "current number of bytes used by this server to store items",
	'cs_curr_items' 	=> "current number of items stored by the server",
	'cs_total_items' 	=> "total number of items stored by this server ever since it started",
	'cs_evictions' 		=> "number of valid items removed from cache to free memory for new items",
	'cs_reclaimed' 		=> "how many times memcached re-used expired items",
	'nostats' 			=> "can not get STATS information",
	'cs_scon' 			=> "Select Server",
	'cs_cmd_set_hits' 	=> "total SET hits number（Tokyo Tyrant only）",
	'cs_cmd_set_misses' => "total SET misses number（Tokyo Tyrant only）",
	'cs_cmd_delete' 	=> "total DELETE commands number（Tokyo Tyrant only）",
	
	'cs_cmd_delete_hits' 	=> "total DELETE hits number（Tokyo Tyrant only）",
	'cs_cmd_delete_misses' 	=> "total DELETE misses number（Tokyo Tyrant only）",
	'cs_cmd_get_hits' 		=> "total GET hits number（Tokyo Tyrant only）",
	'cs_cmd_get_misses' 	=> "total GET misses number（Tokyo Tyrant only）",
	'cs_reserved_fds' 		=> "number of misc fds used internally",
	'cs_cmd_touch'			=> "total TOUCH commands number",
	'cs_touch_hits' 		=> "total TOUCH hits number",
	'cs_touch_misses' 		=> "total TOUCH misses number",
	'cs_hash_power_level' 	=> "hash table level",
	'cs_hash_bytes' 		=> "size of hash table",
	'cs_hash_is_expanding' 	=> "hash table is expanding",
	'cs_expired_unfetched' 	=> "number of items which expired but never touched",
	'cs_evicted_unfetched' 	=> "number of items which evicted but never touched",
	
	//con_settings.php
	'sett_tit' 		=> "SETTINGS",
	'sett_maxbytes' => "the maximum number of bytes limited（0 no limited）",
	'sett_maxconns' => "maximum number of connections allowed",
	'sett_tcpport' 	=> "TCP port",
	'sett_udpport' 	=> "UDP port",
	'sett_inter' 	=> "IP address",
	'sett_verbosity'=> "log（0=none,1=som,2=lots）",
	'sett_oldest' 	=> "the oldest object expiration time",
	
	'sett_evictions' 		=> "LRU is available（on/off）",
	'sett_domain_socket' 	=> "Socketpath",
	'sett_umask' 			=> "socket umask",
	'sett_growth_factor' 	=> "growth factor",
	'sett_chunk_size' 		=> "chunk size（key+value+flags）",
	'sett_num_threads' 		=> "number of threads（4 default,with -t to set）",
	
	'sett_num_threads_per_udp' 	=> "number of worker threads serving each udp",
	'sett_stat_key_prefix' 		=> "character that marks a key prefix for stats",
	'sett_detail_enabled' 		=> "nonzero if we're collecting detailed stats（yes/no）",
	'sett_reqs_per_event' 		=> "maximum number of io to process on each io-event （every event）",
	'sett_cas_enabled' 			=> "CAS is able（yes/no,-C to be disabled）",
	'sett_tcp_backlog' 			=> "TCP log",
	'sett_binding_protocol' 	=> "binding protocol",
	'sett_auth_enabled_sasl' 	=> "SASL is able（yes/no）",
	'sett_item_size_max' 		=> "maximum size of item",
	'nosettings' 				=> "No SETTINGS Information can be get,no permissions or version does not support",
	'confail_tokyo_cabinet' 	=> "No SETTINGS Information can be get,maybe the connection is Tokyo Tyrant or other memcached protocol service",
	'sett_maxconns_fast' 		=> "writes an error and closes the connection when connect the maximum",
	'sett_hashpower_init' 		=> "hash table level init",
	'sett_slab_reassign' 		=> "slab can be reassigned",
	'sett_slab_automove' 		=> "slab auto reassign",
	
	//con_items.php
	'items_tit' 			=> "ITEMS",
	'noitems' 				=> "No ITEMS Information can be get,maybe there is no item in the memcached",
	'noitems_conp' 			=> "No ITEMS Information can be get,maybe there is no item in the memcached",
	'items_sslab' 			=> "Select slab:",
	'items_number' 			=> "number of items in this slab（Do not contain an expired object）",
	'items_age' 			=> "the oldest object expiration time in LRU queue",
	'items_evicted' 		=> "number of LRU release the objects",
	'items_evicted_nonzero' => "the object was evicted early and did not have an infinite expiration time",
	'items_evicted_time' 	=> "how many seconds it's been since the last item to be evicted",
	'items_outofmemory' 	=> "number of items that can not be stored",
	'items_tailrepairs' 	=> "times of repair the slabs",
	'items_reclaimed' 		=> "how many times memcached re-used expired items",
	'items_expired_unfetched' => "number of items which expired but never touched",
	'items_evicted_unfetched' => "number of items which evicted but never touched",
	
	//con_sizes.php
	'size_tit' 	=> "SIZES",
	'nosizes' 	=> "No SIZES Information can be get,maybe there is no item in the memcached",
	
	//con_slabs.php
	'slabs_tit' 		=> "SLABS",
	'noslabs' 			=> "No SLABS Information can be get",
	'slabs_sslab' 		=> "Select slab:",
	
	'slabs_active_slabs' 	=> "number of slabs",
	'slabs_total_malloced' 	=> "total memory to be malloced",
	'slabs_chunk_size' 		=> "chunk size（byte）",
	'slabs_chunks_per_page' => "chunk size of per page",
	'slabs_total_pages' 	=> "number of pages",
	'slabs_total_chunks' 	=> "total number of chunks（chunks_per_page*total_pages）",
	'slabs_used_chunks' 	=> "number of chunks that be used",
	'slabs_free_chunks' 	=> "number of chunks left",
	'slabs_free_chunks_end' => "number of free chunks at the end of the last allocated page",
	'slabs_mem_requested' 	=> "the true amount of memory of memory requested within this chunk",
	'slabs_get_hits' 		=> "GET hits number",
	'slabs_cmd_set' 		=> "SET commands number",
	'slabs_delete_hits' 	=> "DELETE hits number",
	'slabs_incr_hits' 		=> "INCR hits number",
	'slabs_decr_hits' 		=> "DECR hits number",
	'slabs_cas_hits' 		=> "CAS hits number",
	'slabs_cas_badval' 		=> "number of CAS hits on this chunk where the existing value did not match",
	'noslabs_conp' 			=> "No SLABS Information can be get",
	'noslabs_noitems' 		=> "No SLABS Information can be get,maybe there is no item in the memcached",
	'slabs_touch_hits' 		=> "TOUCH hits number",
	
	//stats_monitor.php
	'statsmo_tit' 		=> "Statistics Monitor",
	'statsmo_check' 	=> "Check",
	'statsmo_scon' 		=> "Select the server to be monitored",
	'statsmo_arg' 		=> "Select the parameters to be monitored",
	'nocheck' 			=> "Please select at least one monitoring parameter",
	'statsmo_sall' 		=> "All",
	'statsmo_call' 		=> "Cancel",
	'statsmo_oall' 		=> "Inverse",
	'statsmo_start' 	=> "Start",
	
	//show_monitor_stats.php
	'showmo_stats_tit' 		=> "Statistics Monitor",
	'showmo_stats_conptit' 	=> "Server",
	'showmo_nostats' 		=> "No STATS Information can be get,monitor stop",
	'showmo_relayout' 		=> "Resume layout",
	'showmo_aftit' 			=> "Auto Refresh",
	'showmo_afstart' 		=> "Start",
	'showmo_afstop' 		=> "Stop",
	'showmo_lasttime' 		=> "Last refresh time",
	'afsempty' 				=> "time can not be empty",
	'afsfail' 				=> "Illegal time",
	'afsjsonfail' 			=> "Refresh fail,stop monitor",
	'sautof_des' 			=> "s auto Refresh",
	
	//data_monitor.php
	'datamo_tit' 		=> "Data Monitor",
	'datamo_noitems' 	=> "There is no item in the memcached,can not be monitored",
	'datamo_arg_tit' 	=> "Memcache Data Monitor",
	'datamo_slabarg' 	=> "SLAB Parameter",
	'datamo_gloarg' 	=> "Global Parameter",
	'showmo_data_tit' 	=> "Data Information Monitor",
	'showmo_data_lostmem' => "number of memory that be wasted",
	'showmo_slab_arg' 	=> "SLAB Parameter",
	
	//hit_monitor.php
	'hm_gettit' 	=> "GET Hits",
	'hm_deletetit' 	=> "DELETE Hits",
	'hm_incrtit' 	=> "INCR Hits",
	'hm_decrtit' 	=> "DECR Hits",
	'hm_castit' 	=> "CAS Hits",
	'hm_settit' 	=> "SET Hits",
	'hm_touchtit' 	=> "TOUCH Hits",
	
	//show_monitor_hit.php
	'hitmo_tit' 		=> "Hits Monitor",
	'hitmo_cmdcount' 	=> "Requests:",
	'hitmo_hitcount' 	=> "Hits:",
	'hitmo_misscount' 	=> "Misses:",
	'hitmo_hitrate' 	=> "Hit Rate:",
	'hitmo_hittit' 		=> "Hits",
	'hitmo_nochart' 	=> "No chart",
	'hitmo_hit' 		=> "hit",
	'hitmo_miss' 		=> "miss",
	
	//mem_get.php
	'memg_tit' 			=> "GET Command",
	'memg_nokey' 		=> "Input the KEY",
	'memg_delconfirm' 	=> "Are you sure you want to delete this command?",
	'memg_unserfail' 	=> "Unserialize fail,the value can not be unserialized",
	'memg_inputnot' 	=> "more than one key,separated by space",
	'memg_notget' 		=> "No result",
	'memg_getres' 		=> "Results",
	'memg_resnot' 		=> "Auto serialize array/object,JSON after unserialize displayed as an array",
	'memg_geterror' 	=> "WRONG：can not be decompressed or unserialized,the reason the flag is wrong",
	'memg_butvalue' 	=> "Get",
	'memg_ser' 			=> "Serialize",
	'memg_unser' 		=> "Unserialize",
	'memg_tnum' 		=> "Total Num",
	'memg_updateres' 	=> "Refresh",
	'memg_reget' 		=> "charset is wrong，try to transform",
	
	//mem_set.php
	'mems_tit' 			=> "Set Command",
	'mems_noempty' 		=> "KEY or VALUE can not be empty",
	'mems_setsuss' 		=> "Set Successfully",
	'mems_settit'		=> "Set",
	'mems_consavefail' 	=> "Set Fail",
	'mems_conpsavefail' => "Set Fail，the reason may be CRC32 rules mapped to the server is unavailable",
	
	//mem_count.php
	'mems_counttit' 	=> "Count Command",
	'mems_countsuss' 	=> "Count Successfully,VALUE after count： ",
	'mems_countfail' 	=> "Count Fail,no KEY exists or the VALUE is not a number",
	'mems_valuenonum' 	=> "VALUE can only be positive number",
	'mems_countsave' 	=> "Save",
	
	//item_trav.php
	'itemt_tit' 		=> "Items Traverse",
	'itemt_nonum' 		=> "Traverse num can not be empty",
	'itemt_numonly' 	=> "positive number only",
	'itemt_numwrong' 	=> "number is too large",
	'itemt_notexist' 	=> "the item does no exists or be expired",
	'itemt_novaluetime' => "expired time",
	'itemt_loading' 	=> "Loading",
	'itemt_conpgeterror'=> "the item does no exists or be expired,or CRC32 rules mapped to the server fail",
	'itemt_getres' 		=> "Results",
	'itemt_prepage' 	=> "Previous",
	'itemt_nexpage' 	=> "Next",
	'itemt_pagenumno' 	=> "Enter the correct number of pages",
	'itemt_pagingerr' 	=> "Traverse Fail",
	'itemt_totalnum'	=> "Total Num",
	'itemt_sleslabid' 	=> "Select Slab",
	'itemt_slabtotalnum'=> "number",
	'itemt_travtit' 	=> "Get the first",
	'itemt_travtitnum' 	=> "items",
	'itemt_getbut' 		=> "Traverse",
	'itemt_numnott' 	=> "2MB max response size for csachedump",
	'itemt_moreinfo' 	=> "More",
	'itemt_closemore' 	=> "Close",
	'itemt_size' 		=> "Size",
	'itemt_expiretime' 	=> "No",
	'itemt_valuetype' 	=> "Type",
	'itemt_charsettit' 	=> "Charset",
	
	//item_filtertrav.php
	'itemft_tit' 			=> "Filter",
	'itemft_nofiltercheck' 	=> "Please limited the KEY or VALUE",
	'itemft_filterkeyemp' 	=> "the Regular Expressions of Key can not be empty",
	'itemft_filtervalueemp' => "the Regular Expressions of Value can not be empty",
	'itemft_keyfilterfail' 	=> "the Regular Expressions of Key is wrong",
	'itemft_valuefilterfail'=> "the Regular Expressions of Value is wrong",
	'itemft_noreturn' 		=> "No items",
	
	'itemft_conpcannotfilter' => "the connection pool can not visit items with CRC32 rules,can not determine whether the item is you want",
	
	'itemft_keyfiltertit' 	=> "Limited the KEY",
	'itemft_valuefiltertit' => "Limited the VALUE",
	'itemft_filter' 		=> "Regex",
	'itemft_perlonly' 		=> "Accept Perl-compatible Regex",
	'itemft_demo' 			=> "Regex Demo",
	'itemft_notforvalue' 	=> "Limited the VALUE will GET all items,serialize array/object first,then match them,please mind the extra char after serialize",
	
	'itemft_close' => "Close",
	'itemft_demo1' => "Contains abc",
	'itemft_demo2' => "Contains abc and ignore case",
	'itemft_demo3' => "Begin with abc",
	'itemft_demo4' => "End with abc",
	'itemft_demo5' => "End with digital",
	'itemft_demo6' => "Don't include letters a and b",
	
	//mem_flush.php
	'flush_tit' 	=> "Flush All",
	'flush_delnot' 	=> "Really Flush All?",
	'flush_delok' 	=> "Done",
	'flush_not' 	=> "Make all items expired,be carefully",
	'flush_but' 	=> "Flush",
	
	//追加
	'increment'			=> 'INCREMENT:',
	'key'				=> 'KEY:',
	'value'				=> 'VALUE:',
	'set'				=> 'Set',
	'decrement'			=> 'DECREMENT:',
	'notice'			=> 'Reminder:',
	'flushall_notice'	=> 'When you click on the "full" button, all of the existing elements are invalid, please use caution.',
	'write_in'			=> 'Write in',
	'pls_enter_key'		=> 'Please fill in KEY',
	'keyquery_notice'	=> 'Please input the KEY query, multiple KEY newline separated',
	'quick_search'		=> 'Fast query',
	'search_result'		=> 'Search result',
	'travnum'			=> 'Number traversal',
	'choose_parameters'	=> 'Selection parameter',
	'no_info'			=> 'We did not find any information',
	
	'label_con_name'		=> 'Name:',
	'label_scon_ispcon'		=> 'Is pconnect:',
	'label_scon_type'		=> 'Type:',
	'label_scon_confun'		=> 'Connection method:',
	'label_con_port'		=> 'Port:',
	'label_con_host'		=> 'Host:',
	'label_con_arg_timeout'	=> 'Timeout:',
	'label_itemft_keyfiltertit' 	=> "Limited the KEY:",
	'label_itemft_valuefiltertit' 	=> "Limited the VALUE:",

	'FormatFail'		=> 'Format error',
	'overview'			=> 'Overview',
	'more_info'     	=> 'More information:',
	
	'read_data_help'	=> 'Welcome to visit the ECJia intelligent background reading data pages, you can read the data operation on this page.',
	'about_read_data'	=> 'About reading data to help document',
	
	'write_data_help'	=> 'Welcome to access the ECJia intelligent background to write data pages, you can write data on this page operation.',
	'about_write_data'	=> 'Write data to help document',
	
	'count_cmd_help'	=> 'Welcome to visit the ECJia intelligent back counting command page, you can INCREMENT and DECREMENT operation on this page.',
	'about_count_cmd'	=> 'Help document on count command',
	
	'flushhall_help'	=> 'Welcome to visit all the failure of the ECJia intelligent background page, you can in this page for all the failure of the operation.',
	'about_flushall'	=> 'Help documentation for all failures',
	
	'itemtrav_help'		=> 'Welcome to visit the ECJia intelligent data traversal page, this page page can face data traversal query.',
	'about_itemtrav'	=> 'Data traversal help document',
	
	'filtertrav_help'	=> 'Welcome to visit the ECJia intelligent background conditions can traverse the page, this page page face data traversal query conditions.',
	'about_filtertrav'	=> 'About the conditions to traverse the help document',
	
	'stats_monitor_help' 	=> 'Welcome to visit the ECJia intelligent statistical information monitoring page, you can face the statistical information on this page to monitor.',
	'about_stats_monitor'	=> 'Help documentation on statistical monitoring',
	
	'data_monitor_help'		=> 'Welcome to visit the ECJia intelligent background data monitoring page, you can monitor the data in this page.',
	'about_data_monitor'	=> 'Help document on data monitoring',
	
	'hit_monitor_help'		=> 'You are welcome to visit the ECJia intelligent background hit monitoring page, you can monitor the hit on this page.',
	'about_hit_monitor'		=> 'Help document for hit monitoring',
	
	'stats_info_help'		=> 'Welcome to visit the ECJia intelligent background server STATS information page, you can view the server STATS information on this page.',
	'about_stats_info'		=> 'About server STATS information to help document',
	
	'setting_info_help'		=> 'Welcome to visit the ECJia intelligent background server SETTINGS information page, you can view the server SETTINGS information on this page.',
	'about_setting_info'	=> 'About server SETTINGS information to help document',
	
	'slabs_info_help'		=> 'Welcome to visit the ECJia intelligent background server SLABS information page, you can view the server SLABS information on this page.',
	'about_slabs_info'		=> 'About server SLABS information to help document',
	
	'items_info_help'		=> 'Welcome to visit the ECJia intelligent background server ITEMS information page, you can view the server ITEMS information on this page.',
	'about_items_info'		=> 'About server ITEMS information to help document',
	
	'sizes_info_help'		=> 'Welcome to visit the ECJia intelligent background server SIZES information page, you can view the server SIZES information on this page.',
	'about_sizes_info'		=> 'About server SIZES information to help document',
	
	'connect_info_help'		=> 'Welcome to visit the ECJia intelligent background connection information page, you can view the MemAdmin connection information on this page.',
	'about_connect_info'	=> 'Connection information to help document',
	
	'js_lang' => array(
		'keyquery_required'	=> 'Please enter the KEY to query!',
		'no_records'		=> 'Did not find any record',
		'charset'			=> 'Character set',
		'label_type'		=> 'Type:',
		'ok'				=> 'Ok',
		'cancel'			=> 'Cancel',
		'select_parameter'	=> 'Please select the parameter!',
		'startaf_required'	=> 'Refresh time can not be empty!',
		'startaf_error'		=> 'Refresh time to fill out illegal!',
		'stop'				=> 'Stop',
		'start'				=> 'Start',
		'refresh_fail'		=> 'Failed to refresh, monitor termination!',
		'hit'				=> 'Hit',
		'not_hit'			=> 'Not hit',
	)
);

//end