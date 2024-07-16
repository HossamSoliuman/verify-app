<?php

namespace App\Http\Controllers;

use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class TempFileController extends Controller
{
    public function store(Request $request)
    {
        $this->deleteOldFiles();

        $file = $request->file('file');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $date = time();
        $fileName = str_replace(' ', '_', $originalName) . '_' . $date . '.' . $file->extension();
        $file->storeAs('temp', $fileName);
        TempFile::create([
            'file_name' => $fileName
        ]);
        return $fileName;
    }

    private function deleteOldFiles()
    {
        $files = Storage::files('temp');
        $oneHourAgo = Carbon::now()->subHour();

        foreach ($files as $file) {
            $lastModified = Carbon::createFromTimestamp(Storage::lastModified($file));
            if ($lastModified->lessThan($oneHourAgo)) {
                Storage::delete($file);
                TempFile::where('file_name', basename($file))->delete();
            }
        }
    }
}
