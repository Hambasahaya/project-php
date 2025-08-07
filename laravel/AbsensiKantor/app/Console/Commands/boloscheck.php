<?php

namespace App\Console\Commands;

use App\Models\Absen;
use App\Models\User;
use Illuminate\Console\Command;
use Carbon\Carbon;

class boloscheck extends Command
{
    protected $signature = 'absen:cek-bolos';

    protected $description = 'Menandai pegawai yang tidak absen hari ini sebagai alpa';
    public function handle()
    {
        $tanggal = Carbon::now()->toDateString();
        $hari = Carbon::now()->isoFormat('dddd');
        if (in_array($hari, ['Saturday', 'Sunday'])) {
            $this->info("Hari ini $hari ($tanggal), tidak perlu menandai alpa.");
            return Command::SUCCESS;
        }
        $users = User::where('role', 'staff')->get();
        foreach ($users as $user) {
            $sudahAdaAbsen = Absen::where('user_id', $user->id)
                ->where('tanggal', $tanggal)
                ->exists();

            if (!$sudahAdaAbsen) {
                Absen::create([
                    'user_id' => $user->id,
                    'tanggal' => $tanggal,
                    'status' => 'alpa',
                ]);
                $this->info("User {$user->name} ditandai alpa.");
            }
        }
        $this->info('Penandaan alpa selesai.');
        return Command::SUCCESS;
    }
}
