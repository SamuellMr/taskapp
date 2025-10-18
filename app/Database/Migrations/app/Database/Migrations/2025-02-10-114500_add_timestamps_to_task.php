<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsTotask extends Migration
{
    public function up()
    {
        $this->forge->addColumn('task',[ 
            'created_at' => [ 
                'type'      =>'DATETIME',
                'null'      =>true,
                'default'   =>null,
            ],
            'update_at' => [
                'type'     =>'DATETIME',
                'null'     => true,
                'default'  => null
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('task','update_at');
        $this->forge->dropColumn('task','created_at');
    }


}