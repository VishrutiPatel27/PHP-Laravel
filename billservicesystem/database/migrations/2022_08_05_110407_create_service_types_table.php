<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_types', function (Blueprint $table) {
            $table->id();
            $table->string('bill');
            $table->timestamps();
        });

            
        DB::table('service_types')->insert(
            array(
                
                'id'=>'1',
                'bill'=>'AMC Bill',

            )
            );

            DB::table('service_types')->insert(
                array(
                    
                    'id'=>'2',
                    'bill'=>'Electricity Bill',
    
                )
                );
    
    
                DB::table('service_types')->insert(
                    array(
                        
                        'id'=>'3',
                        'bill'=>'Telephone  Bill',
        
                    )
                    );
        
        
                    DB::table('service_types')->insert(
                        array(
                            
                            'id'=>'4',
                            'bill'=>'Gas  Bill',
            
                        )
                        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_types');
    }
}
