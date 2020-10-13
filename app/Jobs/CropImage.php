<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\Facades\Image as InterventionImage;
use App\Models\Image;

class CropImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $task_id;
    public $original_file_path;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($task_id, $original_file_path)
    {
        $this->task_id = $task_id;
        $this->original_file_path = $original_file_path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = '/storage/images/';
        $img = InterventionImage::make($this->original_file_path);
        $img->resize(640*2, 480*2)->save(public_path($path) . $d_path = $this->task_id . '_desktop.jpg');
        $img->resize(640, 480)->save( public_path($path) . $m_path = $this->task_id . '_mobile.jpg');
        Image::updateOrCreate(['task_id' => $this->task_id],
            [
                'desktop_path' => $path . $d_path,
                'mobile_path' => $path . $m_path,
                'task_id' => $this->task_id
            ]);
    }
}
