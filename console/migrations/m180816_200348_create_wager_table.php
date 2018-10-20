<?php

use yii\db\Migration;

/**
 * Handles the creation of table `wager`. // еще в работе.
 */
class m180816_200348_create_wager_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        // cтавка
        $this->createTable('wager',[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->comment("user id "),
            'playlist_id' => $this->integer()->null()->comment("playlist id  может и не быть плейслисты создвются в кабинете или в форме"),
            'total' => $this->money()->notNull()->comment("сумма общая"),
            'coef' => $this->float()->notNull()->comment("Коофициент общий  висчитивать из wagerelements - coef+coef+coef..."),
            'select_coef' => $this->float()->notNull()->comment("Коофищиент выбраный из дропа"),
            'comment' => $this->text()->null()->comment("Коментарий пользователя"),
            'status' => $this->integer()->notNull()->comment("(общее) Только что создана пустая -1 Статут 0 - закрыто, 1-открыто, 2-истекла 3-блокировано, 4-зайшла 5 не зайшла"),
            'is_private'=>$this->integer()->notNull()->comment('это приватная ставка? 0-1'),
           // 'status_result' => $this->integer()->notNull()->comment(" 2-истекла 3-блокировано, 4-зайшла 5 не зайшла"),
            'created_at'=>$this->dateTime(),
        ]);


//        const  STATUS_CREATE=-1;
//        const  STATUS_NEW=0;
//        const  STATUS_OPEN=1;
//        const  STATUS_CLOSE=2;
//        const  STATUS_C0NFIRM=3;
//        const  STATUS_EXPIRED=4;
//        const  STATUS_BLOCKED=5;
//        const  STATUS_ENTERED=6;
//        const  STATUS_NOT_ENTERD=7;
//        const  STATUS_RETURN=8;

//        $arr=[self::STATUS_CREATE=>'Етап создания',
//            self::STATUS_CLOSE=>'Закрыта',
//            self::STATUS_NEW=>'Новая',
//            self::STATUS_OPEN=>'Открыта',
//            self::STATUS_C0NFIRM=>'Подтверждена',
//            self::STATUS_EXPIRED=>'Прострочена',
//            self::STATUS_BLOCKED=>'Заблокинована',
//            self::STATUS_ENTERED=>'Прошла',
//            self::STATUS_NOT_ENTERD=>'Не прошла',
//            self::STATUS_RETURN=>'Возврат',
//        ];

        $this->createTable('wagerelements',[
            'id' => $this->primaryKey(),
            'wager_id' => $this->integer()->notNull()->comment("user id"),
            'coef' => $this->float()->notNull()->comment("Коофициент конкретно "),
            'event_id' => $this->string()->null()->comment("ид категории из парсера таблица Bets -> cтрочное ид на случай создание своих ставок "),
            'outcome_id' => $this->string()->null()->comment("ид outcome_id  из парсера таблица Bets находится в outcames  -> cтрочное ид на случай создание своих ставок "),
            'sport_id' => $this->integer()->null()->comment("ИД  спорта"),
            'sport_name' => $this->string()->null()->comment("Название спорта"),

            'country_id' => $this->string()->null()->comment("ИД cтраны может гдето и некая категория"),
            'country_name' => $this->string()->null()->comment("Название cтраны может гдето и некая категория"),


            'category_id' => $this->string()->null()->comment("ид категории"),
            'category_name' => $this->string()->null()->comment("Категории имя из парсере"),

            'sub_category_id' => $this->string()->null()->comment("ID ПодКатегория"),
            'sub_category_name' => $this->string()->null()->comment("ПодКатегория имя из парсере"),
            'name' => $this->string()->null()->comment("Имя outcome"),

            'info_main_cat_name' => $this->string()->null()->comment("Имя из корзины (победа)"),
            'info_name' => $this->string()->null()->comment("Название (Ничья)"),
            'info_name_full' => $this->string()->null()->comment("Название (Олимпик Донецк - ФК Львов)"),
            'info_cat_name' => $this->string()->null()->comment("Название (1 Тайм)"),

            'status' => $this->integer()->notNull()->comment("-1 Етап создания  0 Новая  1 Закрыта 2 Новая  3 Подтверждена 4 Прострочена  5 Заблокинована 6 Прошла 7 Не прошл 8 Возврат"),
           // 'status_end' => $this->integer()->notNull()->comment("Статут 1- открыта   2- закрыта"),
//            'is_private'=>$this->integer()->notNull()->comment('это приватная ставка? 0-1'),


            'created_at'=>$this->dateTime(),
        ]);

        // cвязь   wagerelements принадлежыт  wager // может удалить каскадом или спрятать (уточнить)
        $this->addForeignKey('wagerelements_wager_id__wager_id_fk', '{{%wagerelements}}', 'wager_id', '{{%wager}}', 'id', 'NO ACTION', 'CASCADE');


//        $this->createTable('wager',[
//            'id' => $this->primaryKey(),
//            'user_id' => $this->integer()->notNull()->comment("user id "),
//            'playlist_id' => $this->integer()->null()->comment("playlist id  может и не быть плейслисты создвются в кабинете или в форме"),
//            'playlist' => $this->integer()->null()->comment("playlist id  может и не быть плейслисты создвются в кабинете или в форме"),
//            'total' => $this->money()->notNull()->comment("сумма"),
//            'coef' => $this->float()->notNull()->comment("Коофициент"),
//            'event_id' => $this->string()->null()->comment("ид категории из парсера таблица Bets -> cтрочное ид на случай создание своих ставок "),
//            'outcome_id' => $this->string()->null()->comment("ид outcome_id  из парсера таблица Bets находится в outcames  -> cтрочное ид на случай создание своих ставок "),
//            'category_name' => $this->string()->null()->comment("Категории имя из парсере"),
//            'sub_category_name' => $this->string()->null()->comment("ПодКатегория имя из парсере"),
//            'name' => $this->string()->null()->comment("Имя outcome"),
//            'comment' => $this->text()->null()->comment("Коментарий пользователя"),
//            'status' => $this->integer()->notNull()->comment("Статут 0 - не подтвердили(новая), 1-подтвердили, 2-зайшла 3-не зайшла 4-закрытая 5-блокировано"),
//        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('wagerelements');
        $this->dropTable('wager');
    }
}
