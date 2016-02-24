<?php
/**
 * MyBB 1.8 English Language Pack
 * Copyright 2014 MyBB Group, All Rights Reserved
 *
 */

$l['task_manager'] = "任务管理";
$l['add_new_task'] = "添加任务";
$l['add_new_task_desc'] = "您可以在这里添加由论坛系统自动运行的计划任务。";
$l['edit_task'] = "编辑任务";
$l['edit_task_desc'] = "您可以在下面为该计划任务编辑各种设置。";
$l['task_logs'] = "任务日志";
$l['view_task_logs'] = "查看任务日志";
$l['view_task_logs_desc'] = "当启用日志时，每个任务运行时产生的任何结果或错误都将列在下表中。系统会自动删除30天前的记录。";
$l['scheduled_tasks'] = "计划任务";
$l['scheduled_tasks_desc'] = "这里您可以管理论坛的自动运行任务，点击任务右侧的图标可立即运行该任务。";

$l['title'] = "标题";
$l['short_description'] = "简短描述";
$l['task_file'] = "任务文件";
$l['task_file_desc'] = "选择本任务要执行的任务文件。";
$l['time_minutes'] = "时间：分";
$l['time_minutes_desc'] = "输入用“,”（英文标点符号）分割的分钟(0-59)列表，以设置在哪些分钟执行本任务。如果要每分钟运行本任务，请输入“*”";
$l['time_hours'] = "时间：小时";
$l['time_hours_desc'] = "输入用“,”（英文标点符号）分割的小时(0-23)列表，以设置在哪些小时执行本任务。如果要每小时运行本任务，请输入“*”";
$l['time_days_of_month'] = "时间：天";
$l['time_days_of_month_desc'] = "输入用“,”（英文标点符号）分割的天(1-31)列表，以设置在哪些天执行本任务。 如果要每天运行本任务或者你想在下面设置中指定某些工作日运行，请输入“*”";
$l['every_weekday'] = "每周";
$l['sunday'] = "星期天";
$l['monday'] = "星期一";
$l['tuesday'] = "星期二";
$l['wednesday'] = "星期三";
$l['thursday'] = "星期四";
$l['friday'] = "星期五";
$l['saturday'] = "星期六";
$l['time_weekdays'] = "时间：工作日";
$l['time_weekdays_desc'] = "选择那些工作日运行本程序。按住CTRL键可同时选取多个工作日。如果要每个工作日或者已经在上面填入了某个预定义的特殊日子，请选择“每周”。";
$l['every_month'] = "每月";
$l['time_months'] = "时间：月";
$l['time_months_desc'] = "选择那些月份运行本程序。按住CTRL键选取多个月份。如果要每个月份都运行本任务，请选择“每月”。";
$l['enabled'] = "是否启用任务？";
$l['enable_logging'] = "启用日志?";
$l['save_task'] = "保存任务";
$l['task'] = "任务";
$l['date'] = "时间";
$l['data'] = "数据";
$l['no_task_logs'] = "暂无计划任务日志。";
$l['next_run'] = "下次运行";
$l['run_task_now'] = "现在运行本任务";
$l['disable_task'] = "禁用任务";
$l['run_task'] = "运行任务";
$l['enable_task'] = "启用任务";
$l['delete_task'] = "删除任务";

$l['error_invalid_task'] = "指定任务不存在。";
$l['error_missing_title'] = "你没有填写计划任务标题。";
$l['error_missing_description'] = "你没有填写计划任务简短描述。";
$l['error_invalid_task_file'] = "你选择的任务文件不存在。";
$l['error_invalid_minute'] = "你输入的分钟无效。";
$l['error_invalid_hour'] = "你输的小时无效。";
$l['error_invalid_day'] = "你输入的天无效。";
$l['error_invalid_weekday'] = "你选择的工作日无效。";
$l['error_invalid_month'] = "你选择的月份无效。";

$l['success_task_created'] = "任务创建成功。";
$l['success_task_updated'] = "选中任务更新成功。";
$l['success_task_deleted'] = "选中任务删除成功。";
$l['success_task_enabled'] = "选中任启用成功。";
$l['success_task_disabled'] = "选中任务禁用成功。";
$l['success_task_run'] = "选中任务运行成功。";

$l['confirm_task_deletion'] = "确定删除这个计划任务？";
$l['confirm_task_enable'] = "<strong>警告:</strong> 您即将启用一个cron计划任务 (请查看 <a href=\"http://docs.mybb.com/Help-Task_System.html\" target=\"_blank\">MyBB Docs</a> 以获取更多内容). 是否继续?";
$l['no_tasks'] = "您的论坛当前没有任何计划任务";

