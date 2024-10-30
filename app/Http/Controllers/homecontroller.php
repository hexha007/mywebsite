<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kompetensi;
use App\Models\divisi;
use App\Models\kategori;
use App\Models\berita;
use App\Models\download;
use App\Models\tag;
use App\Models\galleri;
use App\Models\album;
use App\Models\profil;

class homecontroller extends Controller
{
    //
    public function index(){
        $data['kompetensi']=kompetensi::all();
        $data['divisi']=divisi::all();
        $data["berita"]=berita::with(['user'])
        ->orderBy('tanggal_post', 'desc')
        ->paginate(10);
        $data['gallerys']=galleri::paginate(10);
        return view('front.page.index',$data);
    }

    public function profil(){
        $data['title']='Profil';
        $data['profil']=profil::get()->first();
        $data['divisi']=divisi::all();
        return view('front.page.profil',$data);
     }

     public function divisi( $uid){
        // echo $uid;
        $data['title']='Divisi';
        $data['divisi']=divisi::where('uid',$uid)->firstOrFail();
        // echo"hallo";
        return view('front.page.divisi',$data);
    }


    public function kompetensi($uid){
        $data['title']='Kompetensi';
        $data['kompetensi']=kompetensi::where('uid',$uid)->first();
        return view('front.page.kompetensi',$data);
    }

    public function download(){
        $data['title']='download';
        $data['kategori']=kategori ::all();
        $data["archives"] = berita::select(DB::raw('DATE_FORMAT(tanggal_post, "%M %Y") as month_year'), DB::raw('count(*) as count'))
        ->groupBy('month_year')
        ->orderBy('month_year', 'desc')
        ->get();
        $data["download"]=download::orderBy('tanggal_post', 'desc')
        ->take(5)
        ->paginate(10);
        $data["tag"]=tag::all();
        return view('front.page.download',$data);
    }

    public function news(){
        $data['title']='Berita Kami';
        $data['kategori']=kategori ::all();
        $data["archives"] = berita::select(DB::raw('DATE_FORMAT(tanggal_post, "%M %Y") as month_year'), DB::raw('count(*) as count'))
        ->groupBy('month_year')
        ->orderBy('month_year', 'desc')
        ->get();
        $data["download"]=download::orderBy('tanggal_post', 'desc')
        ->take(5)
        ->paginate(10);
        $data["berita"]=berita::with(['user'])
        ->orderBy('tanggal_post', 'desc')
        ->take(10)
        ->paginate(10);
        $data["tag"]=tag::all();
        return view('front.page.news',$data);
    }

    

    public function gallery(){
        $data['gallerys']=galleri::paginate(10);
        $data['album']=album::all();
        $data['title']='Gallery';
        return view('front.page.gallery',$data);
    }


    public function newsearch(Request $request){
        return view('comingsoon.soon');
    }

    public function kategori($uid){
        $data['title']='Berita Kami';
        $data['kategori']=kategori ::all();
        $data["archives"] = berita::select(DB::raw('DATE_FORMAT(tanggal_post, "%M %Y") as month_year'), DB::raw('count(*) as count'))
        ->groupBy('month_year')
        ->orderBy('month_year', 'desc')
        ->get();
        $data["download"]=download::orderBy('tanggal_post', 'desc')
        ->take(5)
        ->paginate(10);
        $carikat=kategori::where('uid',$uid)->first();
        $data["beritas"]=berita::with(['user'])
        ->where('id_kategori',$carikat->id)
        ->orderBy('tanggal_post', 'desc')
        ->take(10)
        ->paginate(10);
        $data["tag"]=tag::all();
        return view('front.page.berita',$data);
    }


    public function detail_news($uid){
        $data['title']='Berita Kami';
        $data['kategori']=kategori ::all();
        $data["archives"] = berita::select(DB::raw('DATE_FORMAT(tanggal_post, "%M %Y") as month_year'), DB::raw('count(*) as count'))
        ->groupBy('month_year')
        ->orderBy('month_year', 'desc')
        ->get();
        $data["download"]=download::orderBy('tanggal_post', 'desc')
        ->take(5)
        ->paginate(10);
        $data["beritas"]=berita::with(['user','kategori'])
        ->where('uid',$uid)->first();
        $data["tag"]=tag::all();
        return view('front.page.detail_berita',$data);
    }


    public function tag($uid){
        $data['title']='Berita Kami';
        $data['kategori']=kategori ::all();
        $data["archives"] = berita::select(DB::raw('DATE_FORMAT(tanggal_post, "%M %Y") as month_year'), DB::raw('count(*) as count'))
        ->groupBy('month_year')
        ->orderBy('month_year', 'desc')
        ->get();
        $data["download"]=download::orderBy('tanggal_post', 'desc')
        ->take(5)
        ->paginate(10);
        $data["beritas"]=berita::with(['user'])
        ->where('tag',$uid)
        ->orderBy('tanggal_post', 'desc')
        ->take(10)
        ->paginate(10);
        $data["tag"]=tag::all();
        return view('front.page.berita',$data);
    }



    public function archive($id){
        return view('comingsoon.soon');
    }

    


}
