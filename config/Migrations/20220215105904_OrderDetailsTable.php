<?php
declare(strict_types=1);

use Migrations\AbstractMigration;
use Cake\Datasource\ConnectionManager;

class OrderDetailsTable extends AbstractMigration
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
        $conn->execute("CREATE TABLE `order_details`  (
            `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'uuid gen auto in code',
            `product_detail_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
            `order_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
            `quantity` int NULL DEFAULT NULL,
            `created_at` timestamp(0) NULL DEFAULT NULL,
            `updated_at` timestamp(0) NULL DEFAULT NULL,
            `price` decimal(10, 2) NULL DEFAULT NULL,
            PRIMARY KEY (`id`) USING BTREE,
            INDEX `order_details_product_detail_id_index`(`product_detail_id`) USING BTREE,
            INDEX `order_details_order_id_index`(`order_id`) USING BTREE
          ) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;");
    }
}
