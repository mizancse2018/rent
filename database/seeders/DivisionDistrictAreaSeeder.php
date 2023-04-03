<?php



namespace Database\Seeders;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use App\Models\Division;
use App\Models\District;
use App\Models\Area;



class DivisionDistrictAreaSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {
        /*Chittagong Division Data*/
        $division = Division::create(['name' => 'Chittagong']);
            $district = District::create(['division_id' => $division->id, 'name' => 'chittagong']);
                Area::create(['district_id' => $district->id, 'name' => 'chittagong sadar']);
                Area::create(['district_id' => $district->id, 'name' => 'anowara']);
                Area::create(['district_id' => $district->id, 'name' => 'fatikchhari']);
                Area::create(['district_id' => $district->id, 'name' => 'hathazari']);
                Area::create(['district_id' => $district->id, 'name' => 'karnafuli']);
                Area::create(['district_id' => $district->id, 'name' => 'patiya']);
                Area::create(['district_id' => $district->id, 'name' => 'sitakund']);
            $district = District::create(['division_id' => $division->id, 'name' => 'comilla']);
                Area::create(['district_id' => $district->id, 'name' => 'comilla sadar']);
                Area::create(['district_id' => $district->id, 'name' => 'barura']);
                Area::create(['district_id' => $district->id, 'name' => 'chandina']);
                Area::create(['district_id' => $district->id, 'name' => 'daudkandi']);
                Area::create(['district_id' => $district->id, 'name' => 'debidwar']);
                Area::create(['district_id' => $district->id, 'name' => 'homna']);
                Area::create(['district_id' => $district->id, 'name' => 'laksham']);


        /*Dhaka Division Data*/
        $division = Division::create(['name' => 'Dhaka']);
            $district = District::create(['division_id' => $division->id, 'name' => 'dhaka']);
                Area::create(['district_id' => $district->id, 'name' => 'adabar']);
                Area::create(['district_id' => $district->id, 'name' => 'airport']);
                Area::create(['district_id' => $district->id, 'name' => 'badda']);
                Area::create(['district_id' => $district->id, 'name' => 'cantonment']);
                Area::create(['district_id' => $district->id, 'name' => 'dhanmondi']);
                Area::create(['district_id' => $district->id, 'name' => 'gulshan']);
                Area::create(['district_id' => $district->id, 'name' => 'jattrabari']);
                Area::create(['district_id' => $district->id, 'name' => 'khilgaon']);
                Area::create(['district_id' => $district->id, 'name' => 'mirpur']);
                Area::create(['district_id' => $district->id, 'name' => 'motijheel']);
                Area::create(['district_id' => $district->id, 'name' => 'ramna']);
                Area::create(['district_id' => $district->id, 'name' => 'savar']);
                Area::create(['district_id' => $district->id, 'name' => 'tejgaon']);
                Area::create(['district_id' => $district->id, 'name' => 'uttara']);
            $district = District::create(['division_id' => $division->id, 'name' => 'gazipur']);
                Area::create(['district_id' => $district->id, 'name' => 'gazipur sadar']);
                Area::create(['district_id' => $district->id, 'name' => 'kaliakair']);
                Area::create(['district_id' => $district->id, 'name' => 'sreepur']);
            $district = District::create(['division_id' => $division->id, 'name' => 'narayanganj']);
                Area::create(['district_id' => $district->id, 'name' => 'narayanganj sadar']);
                Area::create(['district_id' => $district->id, 'name' => 'araihazar']);
                Area::create(['district_id' => $district->id, 'name' => 'sonargaon']);
                Area::create(['district_id' => $district->id, 'name' => 'rupganj']);

        /*Rajshahi Division Data*/
        $division = Division::create(['name' => 'Rajshahi']);
            $district = District::create(['division_id' => $division->id, 'name' => 'rajshahi']);
                Area::create(['district_id' => $district->id, 'name' => 'rajshahi sadar']);
                Area::create(['district_id' => $district->id, 'name' => 'boalia']);
                Area::create(['district_id' => $district->id, 'name' => 'paba']);
                Area::create(['district_id' => $district->id, 'name' => 'puthia']);
                Area::create(['district_id' => $district->id, 'name' => 'tanore']);
            $district = District::create(['division_id' => $division->id, 'name' => 'bogra']);
                Area::create(['district_id' => $district->id, 'name' => 'bogra sadar']);
                Area::create(['district_id' => $district->id, 'name' => 'gabtali']);
                Area::create(['district_id' => $district->id, 'name' => 'sherpur']);

    }

}
