<?php
if (!defined('ABSPATH')) {
	exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', 'mir_theme_option', 'Настройки темы')
	->add_tab('Туры на главной', array(
		Field::make('complex', 'complex_tours', 'Туры')
			->add_fields(array(
				Field::make('image', 'complex_tours_img', 'Фото')
					->set_width(20),
				Field::make('text', 'complex_tours_title', 'Заголовок')
					->set_width(30),
				Field::make('text', 'complex_tours_date', 'Дата тура')
					->set_width(20),
				Field::make('text', 'complex_tours_price', 'Стоимость тура')
					->set_width(10),
				Field::make('text', 'complex_tours_link', 'Ссылка')
					->set_width(30),
				Field::make('text', 'complex_tours_more_link', 'Текст ссылки подробнее')
					->set_width(30),
				Field::make('text', 'complex_tours_sticker', 'Стикер')
					->set_width(30),
				Field::make('text', 'complex_tours_qty_days', 'Количество дней')
					->set_width(30),
				Field::make('text', 'complex_tours_place', 'Место пребывания')
					->set_width(30),
				Field::make( 'checkbox', 'complex_tou_version', 'Показать вторую версию' )
				
			))
	))->add_tab('Контакты и соцсети', array(
		Field::make('text', 'email_send', 'Email для отправки')->set_width(30),
		Field::make('text', 'vk_lnk', 'Ссылка на Vk')->set_width(30),
		Field::make('text', 'inst_lnk', 'Ссылка на Instagram')->set_width(30),
		Field::make('text', 'mkad_map_point', 'Центр карты')->set_width(30),
	))->add_tab('Текст на главной', array(
		Field::make('rich_text', 'main_text', 'Текст на главной')->set_width(30),
	))->add_tab('Бегущая строка', array(
		Field::make('rich_text', 'merque_text', 'Текст бегущей строки')->set_width(30),
	))->add_tab('Отзывы', array(
		Field::make('complex', 'complex_reviews', 'Отзывы')
			->add_fields(array(
				Field::make('image', 'img', 'Фото')
					->set_width(30),
				Field::make('text', 'name', 'Имя')
					->set_width(30),
				Field::make('textarea', 'text', 'Текст отзыва')
					->set_width(50),
				Field::make('text', 'link', 'Ссылка на отзыв в Вконтакте')
					->set_width(50),

			))
	))->add_tab('Слайдер на главной', array(
		Field::make('complex', 'slide_complex', 'Слайдер на главной')
			->add_fields(array(
				Field::make('image', 'img', 'Фото')
					->set_width(20),
				Field::make('image', 'img_m', 'Фото мобильного слайдера')
					->set_width(20),

				Field::make('text', 'link', 'Ссылка')
					->set_width(20),
				Field::make('text', 'title', 'Alt (title)')
					->set_width(20),
				Field::make('rich_text', 'text', 'Текст')
					->set_width(60),
				Field::make('rich_text', 'text_m', 'Текст мобильного слайдера')
					->set_width(60),
			)),
		Field::make('complex', 'btn_complex', 'Кнопки')
			->add_fields(array(
				Field::make('text', 'link', 'Ссылка')
					->set_width(30),
				Field::make('image', 'img', 'Иконка')
					->set_width(30),
				Field::make('text', 'text', 'Текст')
					->set_width(20),
				Field::make('text', 'class', 'Класс')
					->set_width(20),
			)),
	))->add_tab('Прием групп в Курске', array(
		Field::make('rich_text', 'group_kursk_text', 'Текст с слева'),
	))->add_tab('Расписание рейсов', array(
		Field::make('complex', 'reis_to_calc_krasnodar', 'Рейсы в Краснодар')
			->add_fields(array(
				Field::make('text', 'viezd', 'Выезд')->set_width(50),
				Field::make('text', 'vozvrashenie', 'Возвращение')->set_width(50),
				Field::make('text', 'june_day_count', 'Кол-во дней в июне')->set_width(25),
				Field::make('text', 'july_day_count', 'Кол-во дней в июле')->set_width(25),
				Field::make('text', 'august_day_count', 'Кол-во дней в августе')->set_width(25),
				Field::make('text', 'september_day_count', 'Кол-во дней в сентябре')->set_width(25),
			)),

		Field::make('complex', 'reis_to_calc_krasnodar_second', 'Рейсы в Краснодар, второе направление')
			->add_fields(array(
				Field::make('text', 'viezd', 'Выезд')->set_width(50),
				Field::make('text', 'vozvrashenie', 'Возвращение')->set_width(50),
				Field::make('text', 'june_day_count', 'Кол-во дней в июне')->set_width(25),
				Field::make('text', 'july_day_count', 'Кол-во дней в июле')->set_width(25),
				Field::make('text', 'august_day_count', 'Кол-во дней в августе')->set_width(25),
				Field::make('text', 'september_day_count', 'Кол-во дней в сентябре')->set_width(25),
			)),

		Field::make('complex', 'reis_to_calc_krim', 'Рейсы в Крым')
			->add_fields(array(
				Field::make('text', 'viezd', 'Выезд')->set_width(50),
				Field::make('text', 'vozvrashenie', 'Возвращение')->set_width(50),
				Field::make('text', 'june_day_count', 'Кол-во дней в июне')->set_width(25),
				Field::make('text', 'july_day_count', 'Кол-во дней в июле')->set_width(25),
				Field::make('text', 'august_day_count', 'Кол-во дней в августе')->set_width(25),
				Field::make('text', 'september_day_count', 'Кол-во дней в сентябре')->set_width(25),
			))
	))
	->add_tab('Сквозное годирование', array(
		Field::make('text', 'skvoznoye_godir', 'Введите год'),
	))
	->add_tab('Цены на проезд', array(
		Field::make('complex', 'complex_fare_prices', 'Таблица')
			->add_fields(array(
				Field::make('text', 'fare_prices_city', 'Город')->set_width(25),
				Field::make('text', 'one_way_price', 'Цена в одну сторону')->set_width(25),
				Field::make('text', 'both_sides_price', 'Цена в обе стороны')->set_width(25),
			))
	));

Container::make('post_meta', 'blog_custom_post', 'Доп поля')
	->show_on_template(array('page-turkey.php', 'page-fire.php', 'page-z-strana.php', 'page-z-goryashie.php'))
	->add_fields(array(
		Field::make('image', 'turkey_flag', 'Флаг страны')
			->set_width(30),
		Field::make('text', 'turkey_sort', 'Порядок сортировки')
			->set_width(20),
		Field::make('text', 'turkey_anchor_link', 'Анкор ссылки на страницу Курортов страны')
			->set_width(30),
		Field::make('text', 'turkey_day', 'Число дней')
			->set_width(20),
		Field::make('text', 'resort_city', 'Города')
			->set_width(30),
		Field::make('text', 'turkey_price', 'Цена')
			->set_width(20),
		Field::make('textarea', 'tyrkey_script_1', 'Скрипт поиска'),
		Field::make('textarea', 'turkey_script', 'Скрипт'),
		Field::make('text', 'turkey_cantry', 'Идекс страны по Турвизору'),
		Field::make('rich_text', 'turkey_text', 'Текст под скриптом'),
		Field::make('rich_text', 'turkey_text_smile', 'Текст над скриптом'),
		Field::make('image', 'turkey_banner', 'Фото баннера'),
	));
Container::make('post_meta', 'page_mesto_custom_post', 'Доп поля')
	// ->show_on_template('page-mesto.php')
	// ->show_on_template('page-resort.php')
	// ->show_on_template(array('page-turkey.php', 'page-fire.php'))
	// ->where('post_template', '=', 'page-mesto.php')
	->add_fields(array(
		Field::make('checkbox', 'close_tour_1', 'Закрыто')->set_width(30),
	));
Container::make('post_meta', 'blog_custom_post', 'Доп поля (z)')
	->show_on_template(array('page-abroad.php', 'page-z-online-poisk.php'))
	->add_fields(array(
		Field::make('image', 'turkey_banner', 'Фото баннера'),
		Field::make('textarea', 'abroad_code', 'Код'),
	));
Container::make('post_meta', 'excurs_post', 'Доп поля')
	->show_on_template('page-excurs.php')
	->add_fields(array(
		Field::make("checkbox", "checkbox_empty_card", "Не отображать ссылку на страницу")->set_width(50),
		Field::make('complex', 'complex_price', 'Варианты цены')
			->add_fields(array(
				Field::make('text', 'comprice', 'Цена')
					->set_width(33),
				Field::make('text', 'clarif', 'Пояснение')
					->set_width(33),
			)),
		Field::make('image', 'otel_banner', 'Фото баннера')->set_width(50),
		Field::make("checkbox", "checkbox_pay_exc", "Выводить цену")
			->help_text('Активирует кнопку "Купить on-line"')
			->set_width(50),
		Field::make('text', 'day_count', 'Количество дней')
			->set_width(30),
		Field::make('text', 'price', 'Цена')
			->set_width(30),
		Field::make('text', 'tur_date', 'Дата')
			->set_width(30),
		Field::make('text', 'where', 'Где')
			->set_width(30),
		Field::make('text', 'excurs_tours_sticker', 'Стикер')
			->set_width(30),
		Field::make('complex', 'gallery_excurs', 'Фото')
			->add_fields(array(
				Field::make('image', 'image', 'Фото'),
				Field::make('text', 'alt', 'Подпись (alt,title)')
			)),
		Field::make('rich_text', 'excurs_vd', 'Вставка видео'),
	));

Container::make('post_meta', 'scool_news_post', 'Доп поля')
	->show_on_template('page-school-news.php')
	->add_fields(array(
		Field::make('image', 'otel_banner', 'Фото баннера')->set_width(100),
		Field::make('text', 'day_count', 'Количество дней')
			->set_width(30),
		Field::make('text', 'price', 'Цена')
			->set_width(30),
		Field::make('text', 'tur_date', 'Дата')
			->set_width(30),
		Field::make('text', 'where', 'Где')
			->set_width(30),
		Field::make('complex', 'gallery_excurs', 'Фото')
			->add_fields(array(
				Field::make('image', 'image', 'Фото'),
				Field::make('text', 'alt', 'Подпись (alt,title)')
			)),
		Field::make('rich_text', 'excurs_vd', 'Вставка видео'),
	));

Container::make('post_meta', 'blog_custom_post', 'Баннер')
	->show_on_template('page-sanatorii.php')
	->add_fields(array(
		Field::make('image', 'otel_banner', 'Фото баннера'),
	));

Container::make('post_meta', 'otel_calc', 'Калькулятор')
	->show_on_template('page-otel.php')
	->add_fields(
		array(
			Field::make('text', 'before_5_price', 'Цена для детей до 5 лет')
				->set_width(50),
			Field::make('text', 'before_12_price', 'Тцена для детей до 12 лет (%)')
				->set_width(50),
			Field::make('complex', 'hotel_number_pricing', 'Цены за номера')
				->add_fields(array(
					Field::make('text', 'number_type', 'Тип номера')->set_width(100),
					Field::make('text', 'june_night_price', 'Цена ночи в июне')->set_width(25),
					Field::make('text', 'july_night_price', 'Цена ночи в июле')->set_width(25),
					Field::make('text', 'august_night_price', 'Цена ночи в августе')->set_width(25),
					Field::make('text', 'september_night_price', 'Цена ночи в сентябре')->set_width(25),
				)),

			Field::make('select', 'calc_reis_type', 'Тип рейса для расчета')
				->add_options(array(
					'0' => 'Рейс в краснодарский край',
					'1' => 'Рейсы в краснодарский край (2 направление)',
					'2' => 'Рейс в Крым'
				))


		)
	);

Container::make('post_meta', 'blog_custom_post', 'Доп поля (туры на море отели)')
	->show_on_template(array('page-otel.php', 'page-avtobusnye-tury-kursk-yalta.php'))
	->add_fields(array(
		Field::make('image', 'otel_banner', 'Фото баннера')->set_width(50),
		Field::make('text', 'otel_close', 'Сообщение о закрытии')->set_width(50),
		Field::make('complex', 'otel_gallery', 'Галерея')
			->add_fields(array(
				Field::make('image', 'image', 'Фото')
					->set_width(30),
				Field::make('text', 'text', 'Заголовок')
					->set_width(30),
			)),
		Field::make('rich_text', 'otel_price', 'Цена')
			->set_width(50),
		Field::make('rich_text', 'otel_schedule', 'График заездов')
			->set_width(50),
		Field::make('rich_text', 'otel_serv', 'В цену входит')
			->set_width(50),
		Field::make('text', 'otel_map', 'Расположение (Центр карты)')
			->set_width(50),
	));
Container::make('post_meta', 'resort_city', 'Доп. поля')
	->show_on_template('page-z-kurort.php')
	->add_fields(array(
		Field::make('text', 'resort_anchor_link_resort', 'Анкор ссылки на страницу Курортов')
			->set_width(30),
		Field::make('text', 'resort_page_id', 'ID страницы')
			->set_width(30),
		Field::make('image', 'resort_banner', 'Фото баннера'),
		Field::make('textarea', 'resort_script', 'Скрипт'),
		Field::make('text', 'resort_cantry', 'Индекс страны по Турвизору'),
		Field::make('text', 'resort_resort', 'Индекс курорта по Турвизору'),
		Field::make('textarea', 'resort_weather_forecast', 'Прогноз погоды'),
	));

Container::make('post_meta', 'Доп поля для отзывов')
	->show_on_template('single-otz.php')
	->add_fields(array(
		Field::make('text', 'otz_lnk', 'Ссылка на отзыв')->set_width(30),
	));

Container::make('post_meta', 'Доп поля для школьных туров')
	->show_on_template('single-school.php')
	->add_fields(array(
		Field::make('text', 'school_ops_lnk', 'Ссылка на страницу описания тура')->set_width(30),
	));

Container::make('post_meta', 'custom_post', 'Доп поля')
	->show_on_template('page-avtobusnye-tury-kursk-yalta.php')
	->add_fields(array(
		Field::make('textarea', 'accommod_script', 'Скрипт'),
	));
Container::make('post_meta', 'custom_tour_post', 'Стоимость тура')
	->show_on_template('page-avtobusnye-tury-kursk-yalta.php')
	->add_fields(array(
		Field::make('text', 'bus_tour_one_way', 'В одну сторону')->set_width(50),
		Field::make('text', 'bus_tour_roundtrip', 'Туда и обратно')->set_width(50),
	));
Container::make('post_meta', 'custom_our_buses', 'Наши автобусы')
	->show_on_template('page-avtobusnye-tury-kursk-yalta.php')
	->add_fields(array(
		Field::make('complex', 'our_buses', 'Автобусы тура')
			->add_fields(array(
				Field::make('image', 'our_buses_img', 'Фото автобуса')
					->set_width(50),
			)),
	));

