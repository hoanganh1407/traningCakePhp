<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
/**
 * Users seed.
 */
class LocationSeeds extends AbstractSeed
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
        // dd(1);
        // $this->Model->query('TRUNCATE TABLE table_name_in_mysql;');
        $conn = ConnectionManager::get('default');
        $conn->execute("TRUNCATE TABLE locations;");
        $data = json_decode(file_get_contents('config/database/db.json'), true);
        $DB = TableRegistry::getTableLocator()->get('Locations')->query();
        // $arrayProvince = $data['province'];
        // dd($arrayProvince);
        $arrayProvince = $data['province'];
        $arrayDistrict = $data['district'];
        $arrayCommune = $data['commune'];
        
        // dd($arrayProvince);
        $array1 = [];
        $array2 = [];
        $array4 = [];
        foreach ($arrayProvince as $province) {
            $array1[] = [
                'name' => $province['name'],
                'code' => $province['idProvince'],
            ];
        // dd($array1[1]['name']);
          
        }
        foreach($array1 as $value){
            $DB->insert(['name', 'code'])
            ->values($value)
            ->execute();
        }
        
        // \DB::table('locations')->insert($array1);
        // $conn->insert('locations', $array1);
        // $DB->insert(['name', 'code'])
        //     ->values($array1)
        //     ->execute();
        foreach ($arrayDistrict as $district) {
            // $parentId = $array[$district['idProvince']];
            $array2[] = [
                'name' => $district['name'],
                'code' => $district['idDistrict'],
                'parent_code' => $district['idProvince'],
            ];
            
            
        }
        foreach($array1 as $value){
            $DB->insert(['name', 'code', 'parent_code'])
            ->values($value)->execute();
        }
        
        // $conn->insert('locations', $array2);
        // \DB::table('locations')->insert($array2);
        // foreach($array2 as $value){
        //     dd($value);
        // }
        foreach ($arrayCommune as $commune) {
            // $parentId = $array3[$commune['idDistrict']];
            $array4[] = [
                'name' => $commune['name'],
                'code' => $commune['idCommune'],
                'parent_code' => $commune['idDistrict'],
            ];

            
        }
        
        foreach (array_chunk($array4, 3000) as $item){
            // \DB::table('locations')->insert($item);
            // $conn->insert('locations', $item);
            $DB->insert(['name', 'code', 'parent_code'])
            ->values($array4)->execute();
        }
        
    }
    
}