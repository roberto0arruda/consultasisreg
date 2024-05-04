<?php

namespace App\Console\Commands;

use App\Models\Place;
use App\Services\SisReg\Facades\SisReg;
use Illuminate\Console\Command;

class SisRegImportPlaces extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sisreg:sync-places';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to import places from SisReg';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->withProgressBar(SisReg::places()->get(), function ($place) {
            Place::firstOrCreate(['name' => $place->name]);
        });
    }
}
