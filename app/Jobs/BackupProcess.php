<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Backup;

use Carbon\Carbon;

class BackupProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      //$date = date('Y-m-d_H-i-s');

      $backup=new Backup();
      $backup->status='pending';
      $backup->url='http://localhost';
      $backup->save();

      $storagePath = storage_path().'/app/public/backups/';
      $createdAt = Carbon::parse($backup->created_at)->format('Y-m-d_H-i-s');


      $command = 'mysqldump --column-statistics=0 -u root --databases inventario > '.$storagePath.$createdAt.'_inventario_backup.sql';

      exec($command, $output, $err);
      $backup->status = 'done';
      $backup->save();

    }
}
