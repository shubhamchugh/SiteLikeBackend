<?php

namespace App\Http\Controllers\DataConvert;

use App\Http\Controllers\Controller;
use App\Models\SeoAnalyzer;
use Illuminate\Http\Request;

class SeoAnalyzerDataConvert extends Controller
{
    public function keywords()
    {
        $long_data = SeoAnalyzer::where('keywords_status','pending')->first();

        if (empty($long_data['keywords'])) {
            $long_data->update([
                'keywords_status' => 'done'
            ]);
            echo "Null Found";
            die;
        }else {
            print_r(array_slice($long_data['keywords'],0, 4,true));            
            $long_data->update([
                'keywords' => array_slice($long_data['keywords'],0, 4,true)
            ]);
            $long_data->update([
                'keywords_status' => 'done'
            ]);
            echo "<br>Saved only First 4 Array";
            die;
        }
    }

    public function long_tail_keywords()
    {
        $long_data = SeoAnalyzer::where('longTailKeywords_status','pending')->first();
        
        if (empty($long_data['longTailKeywords'])) {
            $long_data->update([
                'longTailKeywords_status' => 'done'
            ]);
            echo "Null Found";
            die;
        }else {
            print_r(array_slice($long_data['longTailKeywords'],0, 4,true));
            $long_data->update([
                'longTailKeywords' => array_slice($long_data['longTailKeywords'],0, 4,true)
            ]);
            $long_data->update([
                'longTailKeywords_status' => 'done'
            ]);
            echo "<br>Saved only First 4 Array";
            die;
        }
    }


    public function links()
    {
        $long_data = SeoAnalyzer::where('links_status','pending')->first();
        
        if (empty($long_data['links']['links'])) {
            $long_data->update([
                'links_status' => 'done'
            ]);
            echo "Null Found";
            die;
        }else {
            print_r(array_slice($long_data['links']['links'],0, 4,true));
            $long_data->update([
                'links' => array_slice($long_data['links']['links'],0, 4,true)
            ]);
            $long_data->update([
                'links_status' => 'done'
            ]);
            echo "<br>Saved only First 4 Array";
            die;
        }
    }


    public function images()
    {
        $long_data = SeoAnalyzer::where('images_status','pending')->first();   

        if (empty($long_data['images']['images'])) {
            $long_data->update([
                'images_status' => 'done'
            ]);
            echo "Null Found";
            die;
        }else {
            print_r(array_slice($long_data['images']['images'],0, 4,true));
            $long_data->update([
                'images' => array_slice($long_data['images']['images'],0, 4,true)
            ]);
            $long_data->update([
                'images_status' => 'done'
            ]);
            echo "<br>Saved only First 4 Array";
            die;
        }
    }

}
