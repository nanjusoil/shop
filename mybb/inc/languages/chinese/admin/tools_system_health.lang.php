<?php
/**
 * MyBB 1.8 English Language Pack
 * Copyright 2014 MyBB Group, All Rights Reserved
 *
 */

$l['system_health'] = "系统状况";
$l['system_health_desc'] = "这里可以查看系统状况相关信息。";
$l['utf8_conversion'] = "UTF-8转换";
$l['utf8_conversion_desc'] = "您当前正在转换一个数据库表到 UTF-8 格式。请注意，这个过程可能需要几个小时，这取决于您的论坛和这张表的大小。当过程完成后，您将返回到UTF-8转换的主页。";
$l['utf8_conversion_desc2'] = "这个工具检查数据库表是否为UTF-8格式，如果不是就允许您进行转换。";

$l['convert_all'] = "转换全部";
$l['converting_to_utf8'] = "MyBB正在将表 \"{1}\" 从 {2} 编码转换到 UTF-8 编码。";
$l['convert_to_utf8'] = "您正在将表 \"{1}\" 从 {2} 编码转换到 UTF-8 编码。";
$l['convert_all_to_utf'] = "您正在将所有表从 {1} 编码转换到 UTF-8 编码。";
$l['convert_all_to_utf8mb4'] = "您正在将所有表从 {1} 编码转换到4字节UTF-8 Unicode编码";
$l['converting_to_utf8mb4'] = "MyBB正在转换 \"{1}\" 表从 {2} 编码到4字节UTF-8 Unicode编码";
$l['please_wait'] = "请稍等...";
$l['converting_table'] = "转换表:";
$l['convert_table'] = "转换表";
$l['convert_tables'] = "转换所有表";
$l['convert_database_table'] = "转换数据库表";
$l['convert_database_tables'] = "转换所有数据库表";
$l['table'] = "列表";
$l['status_utf8'] = "UTF-8状态";
$l['status_utf8mb4'] = "4字节UTF-8支持<br />(需要MySQL 5.5.3或以上)";
$l['not_available'] = "不可用";
$l['all_tables'] = "所有表";
$l['convert_now'] = "现在转换";
$l['totals'] = "总计";
$l['attachments'] = "附件";
$l['total_database_size'] = "数据库大小";
$l['attachment_space_used'] = "附件占用空间";
$l['total_cache_size'] = "缓存大小";
$l['estimated_attachment_bandwidth_usage'] = "估计附件带宽使用";
$l['max_upload_post_size'] = "最大 上传/提交 大小";
$l['average_attachment_size'] = "附件平均大小";
$l['stats'] = "统计资料";
$l['task'] = "任务";
$l['run_time'] = "运行时间";
$l['next_3_tasks'] = "即将执行";
$l['no_tasks'] = "当前没有任何计划任务";
$l['backup_time'] = "备份时间";
$l['no_backups'] = "当前没有备份文件。";
$l['existing_db_backups'] = "已存在的数据库备份文件";
$l['writable'] = "可写";
$l['not_writable'] = "不可写";
$l['please_chmod_777'] = "请 CHMOD 为 777.";
$l['chmod_info'] = "请改变下面指定文件的 CHMOD 设置。欲了解更多有关CHMODing，看这";
$l['file'] = "文件";
$l['location'] = "位置";
$l['settings_file'] = "设置文件";
$l['config_file'] = "配置文件";
$l['file_upload_dir'] = "文件上传目录";
$l['avatar_upload_dir'] = "头像上传目录";
$l['language_files'] = "语言文件";
$l['backup_dir'] = "备份目录";
$l['cache_dir'] = "缓存目录";
$l['themes_dir'] = "主题目录";
$l['chmod_files_and_dirs'] = "CHMOD 文件和目录";

$l['notice_process_long_time'] = "这个过程可能需要几个小时，这取决于您的论坛和该表的大小。<strong>此操作不可回滚，强烈建议备份数据库</strong>";
$l['notice_mb4_warning'] = "4字节UTF-8支持需要MySQL 5.5.3或以上，您将不能导入您的数据库到低于此版本的MySQL服务器";

$l['check_templates'] = "检查模板";
$l['check_templates_desc'] = "检查所有已安装模板的安全系数";
$l['check_templates_title'] = "检查模板安全";
$l['check_templates_info'] = "此操作将检查您的模板的安全性能，并评估其对论坛和服务器可能造成的影响，如果您安装有多套主题将使用较多时间。<br /><br />启动检查，点击下方的'继续'按钮。";
$l['check_templates_info_desc'] = "以下模板匹配了已知的安全问题，请检查它们。";
$l['full_edit'] = "完整编辑";

$l['error_chmod'] = "必要的文件和目录没有适当的属性设置。";
$l['error_invalid_table'] = "指定的表不存在。";
$l['error_db_encoding_not_set'] = "您当前安装的MyBB还不能配置使用此工具，设置详情见 <a href=\"http://docs.mybb.com/Utf8_setup.html\">MyBB 文档</a>";
$l['error_not_supported'] = "您当前的数据库引擎不支持UTF-8转换工具。";
$l['error_invalid_input'] = "检查模板时出现问题，请重试或联系MyBB支持组";
$l['error_master_templates_altered'] = "主模板已更改，请联系MyBB支持组了解如何更改";
$l['error_utf8mb4_version'] = "您的MySQL版本不支持4字节UTF-8编码";


$l['warning_multiple_encodings'] = "建议不在数据库中使用不同的编码，这将导致不可预料的MySQL错误。";
$l['warning_utf8mb4_config'] = "完整的4字节UTF-8支持您需要更改<i>\$config['database']['encoding'] = 'utf8';</i> 为 <i>\$config['database']['encoding'] = 'utf8mb4';</i> 在您的 inc/config.php 文件中";

$l['success_templates_checked'] = "检查模板成功 - 没有发现安全问题！";
$l['success_all_tables_already_converted'] = "所有表已经转换为或者已经是UTF-8格式。";
$l['success_table_converted'] = "选择的表 \"{1}\" 成功转换为UTF-8格式。";
$l['success_chmod'] = "所有必要的文件和目录拥有适当的属性设置。";
