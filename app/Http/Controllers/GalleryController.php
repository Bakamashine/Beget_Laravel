<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\UploadedFile;
use robertogallea\LaravelPython\Services\LaravelPython;

class GalleryController extends Controller
{
    
    /**
     * Вывод всех картинок на главной странице галереии
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function up(Request $request) {
        if (!isset($request->name)) {
            $request->name = "image";
        }
        $data = Gallery::whereLike("type" , "%$request->name%");
        return  view("admin.gallery", ['files' => $data->paginate(6)])->with(['mes' => $request->name]);
    }



    /**
     * Выгрузка файлов из формы и загрузка их по указанному пути\
     * TODO: Возможно, придётся написать валидатор (принимаемое кол-во файлов, размер файлов)
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Gallery $gallery
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Gallery $gallery) {
        
        if ($request->hasFile('files')) {
                foreach ($request->file("files") as $file)             {
                    $MIMEtype = explode("/", $file->getClientMimeType())[0];
                
                    // Загрузка изображений
                    if ($MIMEtype == "image") {
                        $this->loadFilePublic($file, "images", $gallery);
                    }
                
                    
                    // Загрузка видео
                    elseif($file->getClientMimeType() == "application/octet-stream") {
                        $this->loadFilePublic($file, "video", $gallery);
                    }
                
                    elseif($MIMEtype == "video") {
                        $this->loadFilePublic($file, 'video', $gallery);
                    }
                
                    // Загрузка файлов
                    else {
                        $this->loadFilePublic($file, "files", $gallery);
                    }
            }
        }
            return redirect()->route("gallery");
    }
    
    /**
     * Загрузка фотографий по указанному пути
     * @param \Illuminate\Http\UploadedFile $file
     * @param mixed $path
     * @param \App\Models\Gallery $gallery
     * @return void
     */
    private function loadFilePublic(UploadedFile $file, $path, Gallery $gallery) {
        $FULL_path = "/storage/" . $file->store($path, 'public');
            $gallery::create([
                "path" => $FULL_path,
                'type' => $file->getClientMimeType(),
                "name" => basename($FULL_path)
            ]);
    }
    
    // Не работает
    public function generate(Request $request) {
      
        // $request->header("Content-Type: multipart/form-data");
    //     $api_key = "sk-Ak30QERa2Bl0l0XAkgpKQnzZRWa6AuBzuVfdCZPiFuL3kG7G";
    //     $text = $request->text;
    //     if (!isset($text)) {
    //         $text = "The Cheshire cat is a monster";
    //     }

    //     $data = [
    //         "files" => [
    //             "none" => ""
    //         ],
    //         "data" => [
    //             "prompt"  => $text,
    //             "output_format" => "jpeg",
    //         ]
    //     ];
        
    //     $response = HTTP::withHeaders([
    //             "authorization" => "Bearer $api_key",
    //             "accept" => "image/*",
    //    ])
    //    ->post("https://api.stability.ai/v2beta/stable-image/generate/sd3",$data);
    //     if ($response->successful()) {
    //         $data = $response->json();
    //         var_dump($response->status());
    //     }
        
    // }
    
    $service = new LaravelPython();
    $parametres = [$request->text, "storage/images/"];
    $result =  $service->run("python/generate.py", $parametres);
    var_dump($result);
    }
}