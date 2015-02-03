<?php
!defined('EMLOG_ROOT') && exit('Access deined!');

function plugin_setting(){
    if($_REQUEST['istyle']) {
        return file_put_contents(EMLOG_ROOT . '/content/plugins/breadcrumbs/breadcrumbs.css', $_REQUEST['istyle']);
    }
    return false;
}
?>
<div class="grid_4"><div class="da-panel">
    <div class="da-panel-header">
	<span class="da-panel-title">
		<img src="./views/images/icons/computer_imac.png" alt="" />
			Хлебные крошки
	</span>
    </div>
    <div class="da-panel-content" style="border-bottom:none;">
<?php
function plugin_setting_view() {
    if (isset($_GET['setting'])) {
        echo '<div class="actived da-message success">Настройки успешно сохранены</div>';
    }
    else if (isset($_GET['error'])) {
        echo '<div class="actived da-message error">Изменение настроек не удалось: Недостаточно прав, или строка записи пустая</div>';
    }
    $css = file_get_contents(EMLOG_ROOT.'/content/plugins/breadcrumbs/breadcrumbs.css');
    ?>
    </div>
    <div class="da-panel-content with-padding">
        <form action="plugin.php?plugin=breadcrumbs&action=setting" method="post">
            <h3>CSS</h3>
            <textarea name="istyle" id="istyle" style="width:510px;height:200px"><?php echo $css ?></textarea>
            <br/><br/>
            <input type="submit" value="Сохранить" class="da-button green"></form>

        <br><br>
        <h3>Инструкция к установке:</h3>
        После добавления плагина на сайт вам нужно добавить код отображения в ваш шаблон (по умолчанию default)<br>
        в файле <b>/content/templates/default/echo_log.php</b> перед заголовком статьи добавить следующие 3 строки<br>
        Они отвечают за отображение хлебных крошек в статьях.<br><br>
<pre style="font-size:14px;background:#000;color:#f8f8f8">&lt;div id="content">
&lt;div id="contentleft">
    // начало добавления
    &lt;?php<span style="color:#e28964"> if</span>(<span style="color:#dad085">function_exists</span>(<span style="color:#65b042">'setBreadCrimbs'</span>)){
        setBreadCrimbs(<span style="color:#3e87e3">$log_title</span>, <span style="color:#3e87e3">$logid</span>);
    } ?>
    // конец добавления
    &lt;h2>&lt;?php topflg(<span style="color:#3e87e3">$top</span>); ?>&lt;?php <span style="color:#dad085">echo</span> <span style="color:#3e87e3">$log_title</span>; ?>&lt;/h2>
</pre>
        Для отображения хлебных крошек в тэгах и категориях вам нужно добавить в файл <br>
        <b>/content/templates/default/log_list.php</b> следующие 3 строки<br><br>
        <pre style="font-size:14px;background:#000;color:#f8f8f8">&lt;div id="content">
&lt;div id="contentleft">
&lt;?php doAction(<span style="color:#65b042">'index_loglist_top'</span>); ?>
    // начало добавления
    &lt;?php<span style="color:#e28964"> if</span>(<span style="color:#dad085">function_exists</span>(<span style="color:#65b042">'setBreadCrimbs'</span>)){
        setBreadCrimbs(<span style="color:#3e87e3">$sort</span>[<span style="color:#65b042">'sortname'</span>] ? <span style="color:#3e87e3">$sort</span>[<span style="color:#65b042">'sortname'</span>] : <span style="color:#3e87e3">$tag</span>);
    } ?>
    // конец добавления
&lt;?php
<span style="color:#e28964">if</span> (<span style="color:#e28964">!</span><span style="color:#dad085">empty</span>(<span style="color:#3e87e3">$logs</span>)):
</pre>
        Если в будущем вы отключите хлебные крошки, то это никак не повиляет на работу блога.


    </div></div></div>
<?php } ?>