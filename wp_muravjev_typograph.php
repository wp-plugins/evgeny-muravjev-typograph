<?php
/*
Plugin Name: Evgeny Muravjev Typograph
Plugin URI: http://mdash.ru
Description: Инструмент для форматирования текста с использованием норм, правил и специфики русского языка и экранной типографики. Его можно подключать ко всем редакторам текста, движкам и блогам.
Version: 3.4
Author: Evgeny Muravjev (typograph), Vladimir Sokolov (plugin)
Author URI: http://mdash.ru
*/

function init_muravjev_typograph() {
	if (function_exists('load_plugin_textdomain')) {
		load_plugin_textdomain('wp_muravjev_typograph', false, basename( dirname( __FILE__ ) ) . '/lang' );
	}
}
add_action('plugins_loaded', 'init_muravjev_typograph');

require_once("EMT.php");

function muravjev_typograph_add_option_pages() {
	if (function_exists('add_options_page')) {
	    add_options_page('Evgeny Muravjev Typograph', 'Muravjev Typograph', 8, basename(__FILE__), 'get_muravjev_typograph_form');
	}		
}
// Все настройки в массив типа опция, переменная, значение по умолчанию, описание
function set_defaults() {
	update_option('Quote_quotes', 							false);
	update_option('Quote_quotation', 						false);
	update_option('Dash_all', 								true);
	update_option('Nobr_super_nbsp', 						true);
	update_option('Nobr_phone_builder', 					true);
	update_option('Nobr_ip_address', 						true);
	update_option('Nobr_spaces_nobr_in_surname_abbr', 		true);
	update_option('Nobr_nbsp_celcius', 						true);
	update_option('Nobr_nowrap', 							true);
	update_option('Symbol_replace', 						true);
	update_option('Symbol_apostrophe', 						true);
	update_option('Symbol_degree_inches', 					true);
	update_option('Symbol_arrows_symbols', 					true);
	update_option('Punctmark_auto_comma', 					true);
	update_option('Punctmark_hellip', 						true);
	update_option('Punctmark_fix_pmarks', 					true);
	update_option('Punctmark_fix_excl_quest_marks', 		true);
	update_option('Punctmark_dot_on_end', 					true);
	update_option('Number_minus_between_nums', 				true);
	update_option('Number_auto_times_x', 					true);
	update_option('Number_simple_fraction', 				true);
	update_option('Number_math_chars', 						true);
	update_option('Number_thinsp_between_number_triads', 	true);
	update_option('Number_thinsp_between_no_and_number', 	true);
	update_option('Number_thinsp_between_sect_and_number',	true);
	update_option('Date_years_month', 						true);
	update_option('Date_nobr_year_in_date', 				true);
	update_option('Space_many_spaces_to_one', 				true);
	update_option('Space_clear_percent', 					true);
	update_option('Space_clear_before_after_punct', 		true);
	update_option('Space_autospace_after', 					false);
	update_option('Space_bracket_fix',						true);
	update_option('Abbr_nbsp_money_abbr', 					true);
	update_option('Abbr_nobr_vtch_itd_itp', 				true);
	update_option('Abbr_nobr_sm_im', 						true);
	update_option('Abbr_nobr_acronym', 						true);
	update_option('Abbr_nobr_locations', 					true);
	update_option('Abbr_nobr_abbreviation', 				true);
	update_option('Abbr_ps_pps', 							true);
	update_option('Abbr_nbsp_org_abbr', 					true);
	update_option('Abbr_nobr_gost', 						true);
	update_option('Abbr_nobr_before_unit_volt', 			true);
	update_option('Abbr_nbsp_before_unit', 					true);
	update_option('OptAlign_all',							true);
	update_option('Text_paragraphs', 						false);
	update_option('Text_breakline', 						false);
	update_option('Text_auto_links_email', 					true);
	update_option('Text_no_repeat_words', 					true);
}

function get_muravjev_typograph_form() {
	
	set_defaults();

	if (isset($_POST['set_defaults'])) {
		echo '<div id="message" class="updated fade"><p><strong>';

		set_defaults();

		_e('Loaded with the default options.', 'wp_muravjev_typograph');
		echo '</strong></p></div>';

	} else if (isset($_POST['muravjev_typograph_update'])) {

		echo '<div id="message" class="updated fade"><p><strong>';

		update_option('Quote_quotes', 					(bool)$_POST["Quote_quotes"]);
		update_option('Quote_quotation', 				(bool)$_POST["Quote_quotation"]);
		update_option('Dash_all', 						(bool)$_POST["Dash_all"]);
		update_option('Nobr_super_nbsp', 				(bool)$_POST["Nobr_super_nbsp"]);
		update_option('Nobr_phone_builder', 			(bool)$_POST["Nobr_phone_builder"]);
		update_option('Nobr_ip_address', 				(bool)$_POST["Nobr_ip_address"]);
		update_option('Nobr_spaces_nobr_in_surname_abbr', (bool)$_POST["Nobr_spaces_nobr_in_surname_abbr"]);
		update_option('Nobr_nbsp_celcius', 				(bool)$_POST["Nobr_nbsp_celcius"]);
		update_option('Nobr_nowrap', 					(bool)$_POST["Nobr_nowrap"]);
		update_option('Symbol_replace', 				(bool)$_POST["Symbol_replace"]);
		update_option('Symbol_apostrophe', 				(bool)$_POST["Symbol_apostrophe"]);
		update_option('Symbol_degree_inches', 			(bool)$_POST["Symbol_degree_inches"]);
		update_option('Symbol_arrows_symbols', 			(bool)$_POST["Symbol_arrows_symbols"]);
		update_option('Punctmark_auto_comma', 			(bool)$_POST["Punctmark_auto_comma"]);
		update_option('Punctmark_hellip', 				(bool)$_POST["Punctmark_hellip"]);
		update_option('Punctmark_fix_pmarks', 			(bool)$_POST["Punctmark_fix_pmarks"]);
		update_option('Punctmark_fix_excl_quest_marks', (bool)$_POST["Punctmark_fix_excl_quest_marks"]);
		update_option('Punctmark_dot_on_end', 			(bool)$_POST["Punctmark_dot_on_end"]);
		update_option('Number_minus_between_nums', 		(bool)$_POST["Number_minus_between_nums"]);
		update_option('Number_auto_times_x', 			(bool)$_POST["Number_auto_times_x"]);
		update_option('Number_simple_fraction', 		(bool)$_POST["Number_simple_fraction"]);
		update_option('Number_math_chars', 				(bool)$_POST["Number_math_chars"]);
		update_option('Number_thinsp_between_number_triads', (bool)$_POST["Number_thinsp_between_number_triads"]);
		update_option('Number_thinsp_between_no_and_number', (bool)$_POST["Number_thinsp_between_no_and_number"]);
		update_option('Number_thinsp_between_sect_and_number', (bool)$_POST["Number_thinsp_between_sect_and_number"]);
		update_option('Date_years_month', 				(bool)$_POST["Date_years_month"]);
		update_option('Date_nobr_year_in_date', 		(bool)$_POST["Date_nobr_year_in_date"]);
		update_option('Space_many_spaces_to_one', 		(bool)$_POST["Space_many_spaces_to_one"]);
		update_option('Space_clear_percent', 			(bool)$_POST["Space_clear_percent"]);
		update_option('Space_clear_before_after_punct', (bool)$_POST["Space_clear_before_after_punct"]);
		update_option('Space_autospace_after', 			(bool)$_POST["Space_autospace_after"]);
		update_option('Space_bracket_fix', 				(bool)$_POST["Space_bracket_fix"]);
		update_option('Abbr_nbsp_money_abbr', 			(bool)$_POST["Abbr_nbsp_money_abbr"]);
		update_option('Abbr_nobr_vtch_itd_itp', 		(bool)$_POST["Abbr_nobr_vtch_itd_itp"]);
		update_option('Abbr_nobr_sm_im', 				(bool)$_POST["Abbr_nobr_sm_im"]);
		update_option('Abbr_nobr_acronym', 				(bool)$_POST["Abbr_nobr_acronym"]);
		update_option('Abbr_nobr_locations', 			(bool)$_POST["Abbr_nobr_locations"]);
		update_option('Abbr_nobr_abbreviation', 		(bool)$_POST["Abbr_nobr_abbreviation"]);
		update_option('Abbr_ps_pps', 					(bool)$_POST["Abbr_ps_pps"]);
		update_option('Abbr_nbsp_org_abbr', 			(bool)$_POST["Abbr_nbsp_org_abbr"]);
		update_option('Abbr_nobr_gost', 				(bool)$_POST["Abbr_nobr_gost"]);
		update_option('Abbr_nobr_before_unit_volt', 	(bool)$_POST["Abbr_nobr_before_unit_volt"]);
		update_option('Abbr_nbsp_before_unit', 			(bool)$_POST["Abbr_nbsp_before_unit"]);
		update_option('OptAlign_all', 					(bool)$_POST["OptAlign_all"]);
		update_option('Text_paragraphs', 				(bool)$_POST["Text_paragraphs"]);
		update_option('Text_breakline', 				(bool)$_POST["Text_breakline"]);
		update_option('Text_auto_links_email', 			(bool)$_POST["Text_auto_links_email"]);
		update_option('Text_no_repeat_words', 			(bool)$_POST["Text_no_repeat_words"]);
		
		_e('Configuration updated.', 'wp_muravjev_typograph');
		echo '</strong></p></div>';

	} ?>

<div class=wrap>
	<h2><?php _e('Evgeny Muravjev Typograph', 'wp_muravjev_typograph'); ?></h2> 
	
	<div style="padding: 0 0 0 30px;">
		<p><?php _e('A tool to format the text using the rules, regulations and the specifics of the Russian language and screen typography. It can be connected to all text editors, engine and blogs.', 'wp_muravjev_typograph'); ?></p>
	</div>
	
	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
	<input type="hidden" name="muravjev_typograph_update" id="muravjev_typograph_update" value="true" />

	<h3><?php _e('Кавычки и дефисы', 'wp_muravjev_typograph'); ?></h3>

	<div style="padding: 0 0 0 32px">
		<input type="checkbox" name="Quote_quotes" value="checkbox" <?php if (get_option('Quote_quotes')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Расстановка «кавычек-елочек» первого уровня', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Quote_quotation" value="checkbox" <?php if (get_option('Quote_quotation')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Внутренние кавычки-лапки', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Dash_all" value="checkbox" <?php if (get_option('Dash_all')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Расстановка дефисов', 'wp_muravjev_typograph'); ?>
	</div>
	
	<h3><?php _e('Неразрывные конструкции', 'wp_muravjev_typograph'); ?></h3>
	
	<div style="padding: 0 0 0 32px">
		<input type="checkbox" name="Nobr_super_nbsp" value="checkbox" <?php if (get_option('Nobr_super_nbsp')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Привязка союзов и предлогов', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Nobr_phone_builder" value="checkbox" <?php if (get_option('Nobr_phone_builder')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Объединение в неразрывные конструкции номеров телефонов', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Nobr_ip_address" value="checkbox" <?php if (get_option('Nobr_ip_address')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Объединение IP-адресов', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Nobr_spaces_nobr_in_surname_abbr" value="checkbox" <?php if (get_option('Nobr_spaces_nobr_in_surname_abbr')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Привязка инициалов к фамилиям', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Nobr_nbsp_celcius" value="checkbox" <?php if (get_option('Nobr_nbsp_celcius')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Привязка градусов к числу', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Nobr_nowrap" value="checkbox" <?php if (get_option('Nobr_nowrap')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Отмена переносов', 'wp_muravjev_typograph'); ?>
	</div>
	
	<h3><?php _e('Специальные символы', 'wp_muravjev_typograph'); ?></h3>
	
	<div style="padding: 0 0 0 32px">
		<input type="checkbox" name="Symbol_replace" value="checkbox" <?php if (get_option('Symbol_replace')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Замена (tm), (R) и (c) на символы', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Symbol_apostrophe" value="checkbox" <?php if (get_option('Symbol_apostrophe')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Расстановка правильного апострофа в текстах', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Symbol_degree_inches" value="checkbox" <?php if (get_option('Symbol_degree_inches')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Градусы по Фаренгейту и дюймы', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Symbol_arrows_symbols" value="checkbox" <?php if (get_option('Symbol_arrows_symbols')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Замена стрелок вправо-влево на html-коды', 'wp_muravjev_typograph'); ?>
	</div>

	<h3><?php _e('Пунктуация и знаки препинания', 'wp_muravjev_typograph'); ?></h3>
	
	<div style="padding: 0 0 0 32px">
		<input type="checkbox" name="Punctmark_auto_comma" value="checkbox" <?php if (get_option('Punctmark_auto_comma')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Расстановка запятых перед а, но', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Punctmark_hellip" value="checkbox" <?php if (get_option('Punctmark_hellip')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Замена трех точек на знак многоточия', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Punctmark_fix_pmarks" value="checkbox" <?php if (get_option('Punctmark_fix_pmarks')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Замена сдвоенных знаков препинания на одинарные', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Punctmark_fix_excl_quest_marks" value="checkbox" <?php if (get_option('Punctmark_fix_excl_quest_marks')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Замена восклицательного и вопросительного знаков местами', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Punctmark_dot_on_end" value="checkbox" <?php if (get_option('Punctmark_dot_on_end')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Точка в конце текста, если её там нет', 'wp_muravjev_typograph'); ?>
	</div>	
	
	<h3><?php _e('Числа, дроби, математические знаки', 'wp_muravjev_typograph'); ?></h3>
	
	<div style="padding: 0 0 0 32px">
		<input type="checkbox" name="Number_minus_between_nums" value="checkbox" <?php if (get_option('Number_minus_between_nums')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Расстановка знака минус между числами', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Number_auto_times_x" value="checkbox" <?php if (get_option('Number_auto_times_x')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Замена x на символ × в размерных единицах', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Number_simple_fraction" value="checkbox" <?php if (get_option('Number_simple_fraction')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Замена дробей 1/2, 1/4, 3/4 на соответствующие символы', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Number_math_chars" value="checkbox" <?php if (get_option('Number_math_chars')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Математические знаки больше/меньше/плюс минус/неравно', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Number_thinsp_between_number_triads" value="checkbox" <?php if (get_option('Number_thinsp_between_number_triads')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Объединение триад чисел полупробелом', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Number_thinsp_between_no_and_number" value="checkbox" <?php if (get_option('Number_thinsp_between_no_and_number')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Пробел между символом номера и числом', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Number_thinsp_between_sect_and_number" value="checkbox" <?php if (get_option('Number_thinsp_between_sect_and_number')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Пробел между параграфом и числом', 'wp_muravjev_typograph'); ?>
	</div>

	<h3><?php _e('Даты и дни', 'wp_muravjev_typograph'); ?></h3>
	
	<div style="padding: 0 0 0 32px">
		<input type="checkbox" name="Date_years_month" value="checkbox" <?php if (get_option('Date_years_month')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Расстановка тире при годах, месяцах и днях', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Date_nobr_year_in_date" value="checkbox" <?php if (get_option('Date_nobr_year_in_date')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Привязка года к дате', 'wp_muravjev_typograph'); ?>
	</div>
	
	<h3><?php _e('Расстановка и удаление пробелов', 'wp_muravjev_typograph'); ?></h3>
	
	<div style="padding: 0 0 0 32px">
		<input type="checkbox" name="Space_many_spaces_to_one" value="checkbox" <?php if (get_option('Space_many_spaces_to_one')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Удаление лишних пробельных символов и табуляций', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Space_clear_percent" value="checkbox" <?php if (get_option('Space_clear_percent')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Удаление пробела перед символом процента', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Space_clear_before_after_punct" value="checkbox" <?php if (get_option('Space_clear_before_after_punct')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Удаление пробелов перед и после знаков препинания в предложении', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Space_autospace_after" value="checkbox" <?php if (get_option('Space_autospace_after')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Расстановка пробелов после знаков препинания', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Space_bracket_fix" value="checkbox" <?php if (get_option('Space_bracket_fix')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Удаление пробелов внутри скобок, а также расстановка перед скобками', 'wp_muravjev_typograph'); ?>
	</div>
	
	<h3><?php _e('Сокращения', 'wp_muravjev_typograph'); ?></h3>
	
	<div style="padding: 0 0 0 32px">
		<input type="checkbox" name="Abbr_nbsp_money_abbr" value="checkbox" <?php if (get_option('Abbr_nbsp_money_abbr')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Форматирование денежных сокращений', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Abbr_nobr_vtch_itd_itp" value="checkbox" <?php if (get_option('Abbr_nobr_vtch_itd_itp')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Объединение сокращений и т.д., и т.п., в т.ч.', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Abbr_nobr_sm_im" value="checkbox" <?php if (get_option('Abbr_nobr_sm_im')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Расстановка пробелов перед сокращениями см., им.', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Abbr_nobr_acronym" value="checkbox" <?php if (get_option('Abbr_nobr_acronym')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Расстановка пробелов перед сокращениями гл., стр., рис., илл., ст., п.', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Abbr_nobr_locations" value="checkbox" <?php if (get_option('Abbr_nobr_locations')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Расстановка пробелов в сокращениях г., ул., пер., д.', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Abbr_nobr_abbreviation" value="checkbox" <?php if (get_option('Abbr_nobr_abbreviation')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Расстановка пробелов перед сокращениями dpi, lpi', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Abbr_ps_pps" value="checkbox" <?php if (get_option('Abbr_ps_pps')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Объединение сокращений P.S., P.P.S.', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Abbr_nbsp_org_abbr" value="checkbox" <?php if (get_option('Abbr_nbsp_org_abbr')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Привязка сокращений форм собственности к названиям организаций', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Abbr_nobr_gost" value="checkbox" <?php if (get_option('Abbr_nobr_gost')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Привязка сокращения ГОСТ к номеру', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Abbr_nobr_before_unit_volt" value="checkbox" <?php if (get_option('Abbr_nobr_before_unit_volt')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Установка пробельных символов в сокращении вольт', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Abbr_nbsp_before_unit" value="checkbox" <?php if (get_option('Abbr_nbsp_before_unit')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Замена символов и привязка сокращений в размерных величинах', 'wp_muravjev_typograph'); ?>
	</div>

	<h3><?php _e('Текст и абзацы', 'wp_muravjev_typograph'); ?></h3>
	
	<div style="padding: 0 0 0 32px">
		<input type="checkbox" name="OptAlign_all" value="checkbox" <?php if (get_option('OptAlign_all')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Оптическое выравнивание', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Text_paragraphs" value="checkbox" <?php if (get_option('Text_paragraphs')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Простановка параграфов', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Text_breakline" value="checkbox" <?php if (get_option('Text_breakline')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Простановка переносов строк', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Text_auto_links_email" value="checkbox" <?php if (get_option('Text_auto_links_email')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Выделение ссылок и эл. почты из текста', 'wp_muravjev_typograph'); ?>
		<br />
		<input type="checkbox" name="Text_no_repeat_words" value="checkbox" <?php if (get_option('Text_no_repeat_words')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<?php _e('Удаление повторяющихся слов', 'wp_muravjev_typograph'); ?>
	</div>
	
	<div class="submit">
		<input type="submit" name="set_defaults" value="<?php _e('Restore defaults', 'wp_muravjev_typograph'); ?> &raquo;" />
		<input type="submit" name="muravjev_typograph_update" value="<?php _e('Save', 'wp_muravjev_typograph'); ?> &raquo;" />
	</div>

	</form>
</div>
<?php
}

global $theTypograph;
$theTypograph = new EMTypograph();

function change_to_on_or_off($variable) {
	$variable_text = ((bool)$variable) ? 'on' : 'off';
	return $variable_text;
}

function typographFilter($text){
	global $theTypograph;
	
	//Кавычки
	$options['Quote.quotes'] 			= change_to_on_or_off(get_option('Quote_quotes'));
	$options['Quote.quotation'] 		= change_to_on_or_off(get_option('Quote_quotation'));
	//Расстановка дефисов
	$options['Dash.to_libo_nibud'] 		= change_to_on_or_off(get_option('Dash_all'));
	$options['Dash.iz_za_pod'] 			= change_to_on_or_off(get_option('Dash_all'));
	$options['Dash.ka_de_kas'] 			= change_to_on_or_off(get_option('Dash_all'));
	//Неразрывные конструкции
	$options['Nobr.super_nbsp'] 		= change_to_on_or_off(get_option('Nobr_super_nbsp'));
	$options['Nobr.nbsp_in_the_end'] 	= change_to_on_or_off(get_option('Nobr_super_nbsp'));
	$options['Nobr.phone_builder'] 		= change_to_on_or_off(get_option('Nobr_phone_builder'));
	$options['Nobr.ip_address'] 		= change_to_on_or_off(get_option('Nobr_ip_address'));
	$options['Nobr.spaces_nobr_in_surname_abbr'] = change_to_on_or_off(get_option('Nobr_spaces_nobr_in_surname_abbr'));
	$options['Nobr.nbsp_celcius'] 		= change_to_on_or_off(get_option('Nobr_nbsp_celcius'));
	$options['Nobr.hyphen_nowrap_in_small_words'] = change_to_on_or_off(get_option('Nobr_nowrap'));
	$options['Nobr.hyphen_nowrap'] 		= change_to_on_or_off(get_option('Nobr_nowrap'));
	$options['Nobr.nowrap'] 			= change_to_on_or_off(get_option('Nobr_nowrap'));
	//Специальные символы
	$options['Symbol.tm_replace'] 		= change_to_on_or_off(get_option('Symbol_replace'));
	$options['Symbol.r_sign_replace'] 	= change_to_on_or_off(get_option('Symbol_replace'));
	$options['Symbol.copy_replace'] 	= change_to_on_or_off(get_option('Symbol_replace'));
	$options['Symbol.apostrophe'] 		= change_to_on_or_off(get_option('Symbol_apostrophe'));
	$options['Symbol.degree_f'] 		= change_to_on_or_off(get_option('Symbol_degree_inches'));
	$options['Symbol.arrows_symbols'] 	= change_to_on_or_off(get_option('Symbol_arrows_symbols'));
	$options['Symbol.no_inches'] 		= change_to_on_or_off(get_option('Symbol_degree_inches'));
	//Пунктуация и знаки препинания
	$options['Punctmark.auto_comma'] 	= change_to_on_or_off(get_option('Punctmark_auto_comma'));
	$options['Punctmark.hellip'] 		= change_to_on_or_off(get_option('Punctmark_hellip'));
	$options['Punctmark.fix_pmarks'] 	= change_to_on_or_off(get_option('Punctmark_fix_pmarks'));
	$options['Punctmark.fix_excl_quest_marks'] 	= change_to_on_or_off(get_option('Punctmark_fix_excl_quest_marks'));
	$options['Punctmark.dot_on_end'] 	= change_to_on_or_off(get_option('Punctmark_dot_on_end'));
	//Числа, дроби, математические знаки
	$options['Number.minus_between_nums'] 		= change_to_on_or_off(get_option('Number_minus'));
	$options['Number.minus_in_numbers_range'] 	= change_to_on_or_off(get_option('Number_minus'));
	$options['Number.auto_times_x'] 	= change_to_on_or_off(get_option('Number_auto_times_x'));
	$options['Number.simple_fraction'] 	= change_to_on_or_off(get_option('Number_simple_fraction'));
	$options['Number.math_chars'] 		= change_to_on_or_off(get_option('Number_math_chars'));
	$options['Number.thinsp_between_number_triads'] = change_to_on_or_off(get_option('Number_thinsp_between_number_triads'));
	$options['Number.thinsp_between_no_and_number'] = change_to_on_or_off(get_option('Number_thinsp_between_no_and_number'));
	$options['Number.thinsp_between_sect_and_number'] = change_to_on_or_off(get_option('Number_thinsp_between_sect_and_number'));
	//Даты и дни
	$options['Date.years'] 				= change_to_on_or_off(get_option('Date_years_month'));
	$options['Date.mdash_month_interval'] 	= change_to_on_or_off(get_option('Date_years_month'));
	$options['Date.nbsp_and_dash_month_interval'] 	= change_to_on_or_off(get_option('Date_years_month'));
	$options['Date.nobr_year_in_date'] 	= change_to_on_or_off(get_option('Date_nobr_year_in_date'));
	//Расстановка и удаление пробелов
	$options['Space.many_spaces_to_one'] = change_to_on_or_off(get_option('Space_many_spaces_to_one'));
	$options['Space.clear_percent'] 	= change_to_on_or_off(get_option('Space_clear_percent'));
	$options['Space.clear_before_after_punct'] 	= change_to_on_or_off(get_option('Space_clear_before_after_punct'));
	$options['Space.autospace_after'] 	= change_to_on_or_off(get_option('Space_autospace_after'));
	$options['Space.bracket_fix'] 		= change_to_on_or_off(get_option('Space_bracket_fix'));
	//Сокращения
	$options['Abbr.nbsp_money_abbr'] 	= change_to_on_or_off(get_option('Abbr_nbsp_money_abbr'));
	$options['Abbr.nobr_vtch_itd_itp'] 	= change_to_on_or_off(get_option('Abbr_nobr_vtch_itd_itp'));
	$options['Abbr.nobr_sm_im'] 		= change_to_on_or_off(get_option('Abbr_nobr_sm_im'));
	$options['Abbr.nobr_acronym'] 		= change_to_on_or_off(get_option('Abbr_nobr_acronym'));
	$options['Abbr.nobr_locations'] 	= change_to_on_or_off(get_option('Abbr_nobr_locations'));
	$options['Abbr.nobr_abbreviation'] 	= change_to_on_or_off(get_option('Abbr_nobr_abbreviation'));
	$options['Abbr.ps_pps'] 			= change_to_on_or_off(get_option('Abbr_ps_pps'));
	$options['Abbr.nbsp_org_abbr'] 		= change_to_on_or_off(get_option('Abbr_nbsp_org_abbr'));
	$options['Abbr.nobr_gost'] 			= change_to_on_or_off(get_option('Abbr_nobr_gost'));
	$options['Abbr.nobr_before_unit_volt'] 	= change_to_on_or_off(get_option('Abbr_nobr_before_unit_volt'));
	$options['Abbr.nbsp_before_unit'] 	= change_to_on_or_off(get_option('Abbr_nbsp_before_unit'));
	//Текст и абзацы
	$options['OptAlign.all'] 			= change_to_on_or_off(get_option('OptAlign_all'));
	$options['Text.paragraphs'] 		= change_to_on_or_off(get_option('Text_paragraphs'));
	$options['Text.breakline'] 			= change_to_on_or_off(get_option('Text_breakline'));
	$options['Text.auto_links'] 		= change_to_on_or_off(get_option('Text_auto_links_email'));
	$options['Text.email'] 				= change_to_on_or_off(get_option('Text_auto_links_email'));
	$options['Text.no_repeat_words'] 	= change_to_on_or_off(get_option('Text_no_repeat_words'));
	
	$theTypograph->setup($options);
	$theTypograph->set_text($text);
	return $theTypograph->apply();
}

// Интерфейс плагина
if (isset($wp_version)) {
   // Удаляем переопределения фильтров Texturize, чтобы не было конфликта с TypographMachine
   /*remove_filter('category_description', 'wptexturize');
   remove_filter('list_cats', 'wptexturize');
   remove_filter('comment_author', 'wptexturize');
   remove_filter('comment_text', 'wptexturize');
   remove_filter('single_post_title', 'wptexturize');
   remove_filter('the_title', 'wptexturize');
   remove_filter('the_content', 'wptexturize');
   remove_filter('the_excerpt', 'wptexturize');*/
   remove_filter('the_content', 'wptexturize');
   remove_filter('the_content_rss', 'wptexturize');
   remove_filter('comment_text','wptexturize');

   // Переопределяем фильтры с приоритетом 10 (как и Texturize).
   // Сюда же можно добавить и другие необходимые переопределения
   //(фильтры WordPress – http://codex.wordpress.org/Plugin_API/Filter_Reference)
   /*add_filter('category_description', 'typographFilter', 10);
   add_filter('list_cats', 'typographFilter', 10);
   add_filter('comment_author', 'typographFilter', 10);
   add_filter('comment_text', 'typographFilter', 10);
   add_filter('single_post_title', 'typographFilter', 10);
   add_filter('the_title', 'typographFilter', 10);
   add_filter('the_content', 'typographFilter', 10);
   add_filter('the_excerpt', 'typographFilter', 10);*/
   add_filter('the_content', 'typographFilter', 10);
   add_filter('the_content_rss', 'typographFilter', 10);
   add_filter('comment_text','typographFilter', 10);
}

add_action('admin_menu', 'muravjev_typograph_add_option_pages');
?>