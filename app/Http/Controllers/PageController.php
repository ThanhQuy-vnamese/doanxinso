<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabslide;
use Alert;

class PageController extends Controller
{
    public function pagehome()
	{
		$slide = tabslide::all();
		return view('Backend.managerdisplay.home',['slide'=>$slide]);
	}
	
	public function themslider()
	{
		return view('Backend.managerdisplay.slider');
	}
	
	public function postthemslider(Request $rq)
    {
        $tabslide = new tabslide;
		$tabslide->tenslider = $rq->tenslider;
		if($rq->hasFile('hinhanh')) 
 		{
		  
		  $file = $rq->file('hinhanh');
		  $name = $file->getClientOriginalName();
		  $hinh = str_random(4)."_".$name;
		  while(file_exists("images/".$hinh))
		  {
		      $hinh = str_random(4)."_".$name;
		  }
		  $file->move("images",$hinh);
		  $tabslide->hinhanhslide = $hinh;
    	}
		else
		{
            $tabslide->hinhanhslide = "";
		}
		$tabslide->tieude = $rq->tieudeslider;
		$tabslide->mota = $rq->motaslider;
		$tabslide->trangthai = $rq->trangthai;
		$tabslide->save();
		return redirect()->route('pagehome'); 
    }
    
    public function capnhatslide($id)
	{
		$slide = tabslide::where("id","=",$id)->first();
		return view('Backend.managerdisplay.updateslider',['slide'=>$slide]);
	}
	
	public function chucnangxoaslide($id)
	{
		$deleteslide = tabslide::find($id)->first();
		$deleteslide->delete();
		return view('Backend.managerdisplay.home');
	}
	
	public function postcapnhatslider(Request $rq, $id)
	{
		$tabslide = tabslide::find($id);
		$tabslide->tenslider = $rq->tenslider;
		if($rq->hasFile('hinhanh')) 
 		{
		  
		  $file = $rq->file('hinhanh');
		  $name = $file->getClientOriginalName();
		  $hinh = str_random(4)."_".$name;
		  while(file_exists("images/".$hinh))
		  {
		      $hinh = str_random(4)."_".$name;
		  }
		  $file->move("images",$hinh);
		  if($tabslide->hinhanhslide!=NULL)
		  {
		      unlink("images/".$tabblog->hinhanh);
		  }
		  $tabslide->hinhanhslide = $hinh;
    	}
		$tabslide->tieude = $rq->tieudeslider;
		$tabslide->mota = $rq->motaslider;
		$tabslide->trangthai = $rq->trangthai;
		$tabslide->save();

		Alert::success('Đã cập nhật', 'Thành công')->persistent(false,true)->autoClose(4000);
		return redirect()->route('pagehome');
	}
    
}
