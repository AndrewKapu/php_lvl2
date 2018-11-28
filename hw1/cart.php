<?php
    /**
     * Класс корзины магазина
     */
    class Cart
    {
        //Кол-во товаров в корзине
        protected $countGoods = null;
        //Общая сумма на которую пользователь купил товаров
        protected $amount = null;
        //Хранит товары
        protected $goods = [];
        private $userId;          

        /**
         * __construct
         * @param  int $userId Идентификатор пользователя для БД                 
         * @return void
         */
        public function __construct($userId = null)
        {                       
            $this->userId = $userId;
        }

        /**
         * getCart Получает корзину        
         * @param  int $userId         
         * @return void
         */
        public function getCart($userId)
        {            
           //Получает корзину и ставит её параметры в разные свойства нашего объекта
        }

        /**
         * getCart  Добавляет товар в корзину                        
         * @return void
         */
        public function addItem()
        {            

        }

        /**
         * updateCount удаляет товар корзины               
         * @return void
         */
        protected function deleteItem()
        {
            
        }

        /**
         * updatePrice Обновляет ифнормацию о корзине               
         * @return void
         */
        public function updateCart()
        {
            updateCount();
            updateAmount();
        }

        /**
         * updateCount Обновляет кол-во товаров в корзине               
         * @return void
         */
        protected function updateCount()
        {
            
        }

        /**
         * updateCount Обновляет цену корзины               
         * @return void
         */
        protected function updateAmount()
        {
            
        }

        /**
         * Оформляет заказ              
         * @return void
         */
        protected function proceedToCheckout()
        {
            
        }
    }
?>    