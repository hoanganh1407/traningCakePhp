<?php
declare(strict_types=1);

use Migrations\AbstractMigration;
use Cake\Datasource\ConnectionManager;

class OrdersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $conn = ConnectionManager::get('default');
        $conn->execute("CREATE TABLE `orders`  (
            `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'uuid gen auto in code',
            `customer_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
            `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
            `status` int NULL DEFAULT 0,
            `type` tinyint NULL DEFAULT NULL,
            `shipping_cost` decimal(8, 2) NULL DEFAULT NULL,
            `created_at` timestamp(0) NULL DEFAULT NULL,
            `updated_at` timestamp(0) NULL DEFAULT NULL,
            `total_price` decimal(10, 2) NULL DEFAULT NULL,
            PRIMARY KEY (`id`) USING BTREE,
            INDEX `orders_customer_id_index`(`customer_id`) USING BTREE,
            INDEX `orders_user_id_index`(`user_id`) USING BTREE
          ) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;");
    }
}
