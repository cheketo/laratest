<?php

use Illuminate\Database\Seeder;

use App\Models\CompanyType;

class CompanyTypesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $companyType = new CompanyType();
        $companyType->name = 'IVA Responsable Inscripto';
        $companyType->status = 'A';
        $companyType->save();

        $companyType = new CompanyType();
        $companyType->name = 'IVA Responsable no Inscripto';
        $companyType->status = 'A';
        $companyType->save();

        $companyType = new CompanyType();
        $companyType->name = 'IVA no Responsable';
        $companyType->status = 'A';
        $companyType->save();

        $companyType = new CompanyType();
        $companyType->name = 'IVA Sujeto Exento';
        $companyType->status = 'A';
        $companyType->save();

        $companyType = new CompanyType();
        $companyType->name = 'Consumidor Final';
        $companyType->status = 'A';
        $companyType->save();

        $companyType = new CompanyType();
        $companyType->name = 'Responsable Monotributo';
        $companyType->status = 'A';
        $companyType->save();

        $companyType = new CompanyType();
        $companyType->name = 'Sujeto no Categorizado';
        $companyType->status = 'A';
        $companyType->save();

        $companyType = new CompanyType();
        $companyType->name = 'Proveedor del Exterior';
        $companyType->status = 'A';
        $companyType->save();

        $companyType = new CompanyType();
        $companyType->name = 'Cliente del Exterior';
        $companyType->status = 'A';
        $companyType->save();

        $companyType = new CompanyType();
        $companyType->name = 'IVA Liberado - Ley N° 19.640';
        $companyType->status = 'A';
        $companyType->save();

        $companyType = new CompanyType();
        $companyType->name = 'IVA Responsable Inscripto - Agente de Percepción';
        $companyType->status = 'A';
        $companyType->save();

        $companyType = new CompanyType();
        $companyType->name = 'Pequeño Contribuyente Eventual';
        $companyType->status = 'A';
        $companyType->save();

        $companyType = new CompanyType();
        $companyType->name = 'Monotributista Social';
        $companyType->status = 'A';
        $companyType->save();

        $companyType = new CompanyType();
        $companyType->name = 'Pequeño Contribuyente Eventual Social';
        $companyType->status = 'A';
        $companyType->save();

    }

}
