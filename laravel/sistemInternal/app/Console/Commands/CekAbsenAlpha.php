<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CekAbsenAlpha extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cek-absen-alpha';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \App\Services\AbsenServices\AbesenService::cekAbsenAlpha();
        $this->info('Cek absen alpha selesai dijalankan.');
    }
}
