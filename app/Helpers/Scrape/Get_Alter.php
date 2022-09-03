<?php

namespace App\Helpers\Scrape;

use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Http;

class Get_Alter
{
    public static function site_like_scrape($domain)
    {

        $sourceDomain = 'https://www.sitelike.org/similar/' . $domain . '/';

        $html = Browsershot::url($sourceDomain)
        ->userAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36')
        ->noSandbox()
        ->bodyHtml();
        
        
        $response = new \DOMDocument();
        libxml_use_internal_errors(true); //disable libxml errors

        $response->loadHTML($html);
        libxml_clear_errors(); //remove errors for yucky html

        $response->preserveWhiteSpace = false;
        $response->saveHTML();

        $response_xpath = new \DOMXPath($response);

        $alternative_urls = $response_xpath->query('//*[@id="MainContent_pnlMain"]/div[5]/div[1]/div[*]/div/div[2]/a[2]/@href');

        if (!empty($alternative_urls->length)) {

            foreach ($alternative_urls as $alternative_url) {
                $alternatives['alter'][] = $alternative_url->nodeValue;
            }
            $alternatives['status'] = "OK";
            return $alternatives;
        } else {
            $alternatives['status'] = 'fail';
            return $alternatives;
        }
    }
}
