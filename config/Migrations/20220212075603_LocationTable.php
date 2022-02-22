<?php
declare(strict_types=1);

use Migrations\AbstractMigration;
use Cake\Datasource\ConnectionManager;

class LocationTable extends AbstractMigration
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
        $conn->execute("CREATE TABLE `locations`  (
            `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
            `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
            `parent_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
            `created_at` timestamp(0) NULL DEFAULT NULL,
            `updated_at` timestamp(0) NULL DEFAULT NULL,
            `id` int NOT NULL AUTO_INCREMENT,
            PRIMARY KEY (`id`) USING BTREE,
            INDEX `locations_parent_code_index`(`parent_code`) USING BTREE
          ) ENGINE = InnoDB AUTO_INCREMENT = 11372 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;
        ");
    }
}
