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
use App\Models\Page;
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

        $banners = Gallery::type('banner');
        $services = Gallery::type('service');
        $informations = Gallery::type('information');
        $facilities = Gallery::type('facility');
        $pages = Page::orderBy("id", "DESC")->limit(3)->get();


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
        
        return view('web.index', compact('banners', 'services', 'pages', 'facilities', 'informations'));
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

        $banners = Gallery::type('banner');
        $workers = Gallery::type('worker');
        $helpers = Gallery::type('helper');
        return view('web.about', compact('banners', 'workers', 'helpers'));
    }

    public function pages() {
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

        $pages = Page::orderBy("id", "desc")->paginate(9);
        $banners = Gallery::type('banner');

        return view('web.pages', compact('pages', 'banners'));
    }

    public function page($slug) {
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

        $page = Page::where("slug", $slug)->first();
        return view('web.page', compact('page'));
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
        
        $galleries = Gallery::type('gallery');
        $banners = Gallery::type('banner');


        return view('web.gallery', compact('galleries', 'banners'));

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
        
        $attachments = Gallery::type('attachment');
        $banners = Gallery::type('banner');


        return view('web.attachment', compact('attachments', 'banners'));

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
