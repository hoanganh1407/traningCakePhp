<?php
declare(strict_types=1);

use Cake\Datasource\ConnectionManager;
use Migrations\AbstractMigration;

class AttributeProductsTable extends AbstractMigration
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
        $conn->execute("CREATE TABLE `attribute_products`  (
            `id` char(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
            `attribute_id` char(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
            `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
            `product_detail_id` char(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
            `updated_at` timestamp(0) NULL DEFAULT NULL,
            `created_at` timestamp(0) NULL DEFAULT NULL,
            PRIMARY KEY (`id`) USING BTREE
          ) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;
          
        ");
    }
}
