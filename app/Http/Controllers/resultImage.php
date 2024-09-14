<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;
use Intervention\Image\Typography\FontFactory;

class resultImage extends Controller
{
    public static function generate(client $client){
        $image ='';
        switch ($client->type) {
            case 'PMDD':
                $image.='r1-';
                $element['btn']='btn-1 btn-1-lg ';
                $element['color']='btn-text-green';
                break;
            case 'HormonalAcne':
                $image.='r2-';
                $element['btn']='btn-2 btn-2-lg ';
                $element['color']='btn-text-orange';
                # code...
                break;
            case 'HighTestosterone':
                $image.='r3-';
                $element['btn']='btn-3 btn-3-lg ';
                $element['color']='btn-text-pink';
                # code...
                break;
            
            default:
                # code...
                break;
        }

        switch ($client->level) {
            case 'green':
                $image.='1.png';
                break;
            case 'yellow':
                $image.='2.png';
                break;
            case 'red':
                $image.='3.png';
                break;
            default:
                # code...
                break;
        }
        
        // create new manager instance with desired driver
        $manager = new ImageManager(new Driver());
        
        // read image from filesystem
        $imgPath = public_path('images/'.$image);
        // dd($imgPath);
        $genImage = $manager->read($imgPath);

        $genImage->text($client->name,735,120,function (FontFactory $font) {
            $font->filename(public_path('fonts/mitr-regular.ttf'));
            $font->size(35);
            $font->color('fff');
            // $font->stroke('ff5500', 2);
            $font->align('left');
            $font->valign('middle');
            $font->lineHeight(1.5);
            // $font->angle(10);
            $font->wrap(250);
        });

        // dd(implode("\n", $client->symptom) );
        $genImage->text(implode("\n", $client->symptom),80,1120,function (FontFactory $font) {
            $font->filename(public_path('fonts/Kanit-Regular.ttf'));
            $font->size(24);
            $font->color('000');
            // $font->stroke('ff5500', 2);
            $font->align('left');
            $font->valign('top');
            $font->lineHeight(3);
            // $font->angle(10);
            $font->wrap(550);
        });

        $encoded = $genImage->encode(new AutoEncoder(quality: 100)); // Intervention\Image\EncodedImage
        $genImage->save('results/'.$client->id.'.jpg', progressive: true, quality: 100);
        // read image from binary data
        // $image = $manager->read(file_get_contents('images/example.jpg'));
        // echo '<img src="'.asset('results/'.$client->id.'.jpg').'" />';
        // return redirect(route('result',$client));
        // dd('test',asset('image/'.$image),$genImage);
    }
    public function makeResultImage(client $client){
        $image ='';
        switch ($client->type) {
            case 'PMDD':
                $image.='r1-';
                $element['btn']='btn-1 btn-1-lg ';
                $element['color']='btn-text-green';
                break;
            case 'HormonalAcne':
                $image.='r2-';
                $element['btn']='btn-2 btn-2-lg ';
                $element['color']='btn-text-orange';
                # code...
                break;
            case 'HighTestosterone':
                $image.='r3-';
                $element['btn']='btn-3 btn-3-lg ';
                $element['color']='btn-text-pink';
                # code...
                break;
            
            default:
                # code...
                break;
        }

        switch ($client->level) {
            case 'green':
                $image.='1.png';
                break;
            case 'yellow':
                $image.='2.png';
                break;
            case 'red':
                $image.='3.png';
                break;
            default:
                # code...
                break;
        }
        
        // create new manager instance with desired driver
        $manager = new ImageManager(new Driver());
        
        // read image from filesystem
        $imgPath = public_path('images/'.$image);
        // dd($imgPath);
        $genImage = $manager->read($imgPath);

        $genImage->text($client->name,735,120,function (FontFactory $font) {
            $font->filename(public_path('fonts/mitr-regular.ttf'));
            $font->size(50);
            $font->color('fff');
            // $font->stroke('ff5500', 2);
            $font->align('left');
            $font->valign('middle');
            $font->lineHeight(1.5);
            // $font->angle(10);
            $font->wrap(250);
        });

        // dd(implode("\n", $client->symptom) );
        $genImage->text(implode("\n", $client->symptom),80,1120,function (FontFactory $font) {
            $font->filename(public_path('fonts/Kanit-Regular.ttf'));
            $font->size(24);
            $font->color('000');
            // $font->stroke('ff5500', 2);
            $font->align('left');
            $font->valign('top');
            $font->lineHeight(2.5);
            // $font->angle(10);
            $font->wrap(550);
        });

        $encoded = $genImage->encode(new AutoEncoder(quality: 100)); // Intervention\Image\EncodedImage
        $genImage->save('results/'.$client->id.'.jpg', progressive: true, quality: 100);
        // read image from binary data
        // $image = $manager->read(file_get_contents('images/example.jpg'));
        echo '<img src="'.asset('results/'.$client->id.'.jpg').'" />';
        return redirect(route('result',$client));
        // dd('test',asset('image/'.$image),$genImage);
    }
}
