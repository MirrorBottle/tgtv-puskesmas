<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebInboxRequest;
use App\Models\Elderly;
use App\Models\ElderlyRecord;
use App\Models\Experience;
use App\Models\Gallery;
use App\Models\Inbox;
use App\Models\Mission;
use App\Models\Order;
use App\Models\Vehicle;
use App\Models\Visitor;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Agent;
use Artesaos\SEOTools\Facades\SEOTools;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEOTools::setTitle(setting('app_name'));
        SEOTools::setDescription(setting('about_description'));
        SEOTools::opengraph()->setUrl(url('/'));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addImage(asset(setting('about_image')), [
            'height' => 500,
            'width' => 800
        ]);
        SEOTools::setCanonical(url('/'));
        SEOTools::twitter()->setSite(setting('app_name'));
        SEOTools::twitter()->setDescription(setting('about_description'));
        SEOTools::twitter()->setImage(asset(setting('about_image')));
        SEOTools::jsonLd()->addImage(asset(setting('about_image')));

        $galleries = Gallery::active();

        $agent = new Agent();
        $ip = request()->ip();
        $device = $agent->platform() . ', ' . $agent->browser();
        $check = Visitor::exist($ip);
        if (!$check) {
            Visitor::create([
                'ip_address' => $ip,
                'device' => $device,
                'visitor' => 1
            ]);
        }
        
        return view('web.index', compact('galleries'));
    }

    public function about() {
        SEOTools::setTitle(setting('app_name') . " - Tentang");
        SEOTools::setDescription(setting('about_description'));
        SEOTools::opengraph()->setUrl(url('/'));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addImage(asset(setting('about_image')), [
            'height' => 500,
            'width' => 800
        ]);
        SEOTools::setCanonical(url('/'));
        SEOTools::twitter()->setSite(setting('app_name'));
        SEOTools::twitter()->setDescription(setting('about_description'));
        SEOTools::twitter()->setImage(asset(setting('about_image')));
        SEOTools::jsonLd()->addImage(asset(setting('about_image')));


        return view('web.about');

    }

    public function gallery() {
        SEOTools::setTitle(setting('app_name') . " - Galeri");
        SEOTools::setDescription(setting('about_description'));
        SEOTools::opengraph()->setUrl(url('/'));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addImage(asset(setting('about_image')), [
            'height' => 500,
            'width' => 800
        ]);
        SEOTools::setCanonical(url('/'));
        SEOTools::twitter()->setSite(setting('app_name'));
        SEOTools::twitter()->setDescription(setting('about_description'));
        SEOTools::twitter()->setImage(asset(setting('about_image')));
        SEOTools::jsonLd()->addImage(asset(setting('about_image')));
        
        return view('web.gallery');

    }

    public function attachment() {
        SEOTools::setTitle(setting('app_name') . " - Lampiran");
        SEOTools::setDescription(setting('about_description'));
        SEOTools::opengraph()->setUrl(url('/'));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addImage(asset(setting('about_image')), [
            'height' => 500,
            'width' => 800
        ]);
        SEOTools::setCanonical(url('/'));
        SEOTools::twitter()->setSite(setting('app_name'));
        SEOTools::twitter()->setDescription(setting('about_description'));
        SEOTools::twitter()->setImage(asset(setting('about_image')));
        SEOTools::jsonLd()->addImage(asset(setting('about_image')));
        
        return view('web.attachment');

    }

    public function elderly(Request $request) {
        SEOTools::setTitle(setting('app_name') . " - Hasil Pemeriksaan Lansia");
        SEOTools::setDescription(setting('about_description'));
        SEOTools::opengraph()->setUrl(url('/'));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addImage(asset(setting('about_image')), [
            'height' => 500,
            'width' => 800
        ]);
        SEOTools::setCanonical(url('/'));
        SEOTools::twitter()->setSite(setting('app_name'));
        SEOTools::twitter()->setDescription(setting('about_description'));
        SEOTools::twitter()->setImage(asset(setting('about_image')));
        SEOTools::jsonLd()->addImage(asset(setting('about_image')));

        $data = null;
        $elderly = null;
        if($request->has('nik') && $request->has('month') && $request->has('year')) {

            $nik = $request->nik;
            $month = $request->month;
            $year = $request->year;

            $elderly = Elderly::where('nik', $nik)->first();

            if($elderly) {
                $data = ElderlyRecord::where('elderly_id', $elderly->id);
    
                if($month != "all") {
                    $data->whereMonth("recorded_at", $month);
                }
    
                if($year != "all") {
                    $data->whereYear("recorded_at", $year);
                }
    
                $data = $data->get();
            }
        }
        return view('web.elderly', compact('data', 'elderly'));
    }
}
