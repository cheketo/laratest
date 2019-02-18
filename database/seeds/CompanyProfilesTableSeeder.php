<?php

use Illuminate\Database\Seeder;

use App\Models\CompanyProfile;

class CompanyProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $companyProfile = new CompanyProfile();
        $companyProfile->name = 'Persona/Profesional';
        $companyProfile->status = 'A';
        $companyProfile->save();

        $companyProfile = new CompanyProfile();
        $companyProfile->name = 'Minorista';
        $companyProfile->status = 'A';
        $companyProfile->save();

        $companyProfile = new CompanyProfile();
        $companyProfile->name = 'Mayorista';
        $companyProfile->status = 'A';
        $companyProfile->save();

        $companyProfile = new CompanyProfile();
        $companyProfile->name = 'Distribuidor';
        $companyProfile->status = 'A';
        $companyProfile->save();

    }
}
