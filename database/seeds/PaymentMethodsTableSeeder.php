<?php

use Illuminate\Database\Seeder;

use App\Models\PaymentMethod;

class PaymentMethodsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

				$paymentMethod 							= new PaymentMethod();
				$paymentMethod->name 				= 'Efectivo';
				$paymentMethod->status 			= 'A';
				$paymentMethod->save();

				$paymentMethod 							= new PaymentMethod();
				$paymentMethod->name 				= 'Tarjeta de Débito';
				$paymentMethod->status 			= 'A';
				$paymentMethod->save();

				$paymentMethod 							= new PaymentMethod();
				$paymentMethod->name 				= 'Tarjeta de Crédito';
				$paymentMethod->status 			= 'A';
				$paymentMethod->save();

				$paymentMethod 							= new PaymentMethod();
				$paymentMethod->name 				= 'Transferencia Bancaria';
				$paymentMethod->status 			= 'A';
				$paymentMethod->save();

				$paymentMethod 							= new PaymentMethod();
				$paymentMethod->name 				= 'Cheque';
				$paymentMethod->status 			= 'A';
				$paymentMethod->save();

    }

}
