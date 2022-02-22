<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Cake\Datasource\ConnectionManager;
/**
 * Users seed.
 */
class UserSeeds extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $conn = ConnectionManager::get('default');
        $conn->execute("
        INSERT INTO `users` VALUES ('1B84C045-6DEA-4D57-AA1B-6429A5268C38', 'Admin', 'admin@gmail.com','123456', 1, 0, NULL, '2022-01-24 08:15:48', '2022-02-07 04:30:40', '01', '001', '00013', '0354411826', NULL)
            ");
    }
    
}