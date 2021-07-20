<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabcity;
use App\tabprovince;
use App\tabwards;
use App\tabfeeship;

class DeliveryController extends Controller
{
    public function phivanchuyen()
    {
      $city = tabcity::orderby('matp','ASC')->get();
    	return view('Backend.pagesorder.formdelivery')->with(compact('city'));
    }

    public function selectdelivery(Request $rq)
    {
        $data = $rq->all();
        if($data['action'])
        {
            $output = '';
            if($data['action']=="city")
            {
                $selectprovince = tabprovince::where('matp',$data['maid'])->orderby('maqh','ASC')->get();
                $output.='<option>--Chọn quận huyện--</option>';
                foreach($selectprovince as $province)
                {
                    $output.='<option value="'.$province->maqh.'">'.$province->namequanhuyen.'</option>';
                }
            }
            else
            {
                $selectwards = tabwards::where('maqh',$data['maid'])->orderby('xaid','ASC')->get();
                $output.='<option>--Chọn xã phường--</option>';
                foreach($selectwards as $wards)
                {
                    $output.='<option value="'.$wards->xaid.'">'.$wards->namexaphuong.'</option>';
                }
            }
        }
        echo $output;
    }

    public function insertdelivery(Request $rq)
    {

        $data = tabfeeship::where([
                ['feematp','like','%'.$rq->city.'%'],
                ['feemaqh','like','%'.$rq->province.'%'],
                ['feexaid','like','%'.$rq->wards.'%'],
          ])->first();
        if($data==0)
        {
          $feeship = new tabfeeship;
          $feeship->feematp = $rq->city;
          $feeship->feemaqh = $rq->province;
          $feeship->feexaid = $rq->wards;
          $feeship->feefeeship = $rq->fee_ship;
          $feeship->save();
          
        }
        if($feeship){
            return response()->json(true);
          }
        
    }
    
    public function selectfeeship()
    {
        $feeship = tabfeeship::orderby('feeid','DESC')->get();
        $output = '';
        $output.='
            <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Phí vận chuyển</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right value1" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default btn1"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
              <div class="search1">
                <table class="table table-bordered table-hover text-nowrap">
                  <thead>                  
                    <tr>
                      <th>Tên thành phố</th>
                      <th>Tên quận huyện</th>
                      <th>Tên xã phường</th>
                      <th>Phí ship</th>
                    </tr>
                  </thead>
                  <tbody>
                  ';
                foreach($feeship as $fee)
                {
                    $output.= '
                    <tr>
                      <td>'.$fee->city->nametinhthanhpho.'</td>
                      <td>'.$fee->province->namequanhuyen.'</td>
                      <td>'.$fee->wards->namexaphuong.'</td>
                      <td contenteditable data-feeship_id="'.$fee->feeid.'" class="fee_feeship_edit">'.number_format($fee->feefeeship,0,',','.').'$</td>
                    </tr>
                    ';
                }
        $output.= '
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
        ';
        echo $output;
    }
    
    public function updatedelivery(Request $rq)
    {

        //$data = $rq->all();
        $feeship = tabfeeship::find($rq->feeship_id);
        $fees_value =  rtrim($rq->feeship_value,'.');
        $feeship->feefeeship =  $fees_value;
        $feeship->save();
        
        if($feeship){
            return response()->json(true);
        }
    }
    
    // public function timkiemvanchuyen(Request $rq)
    // {
    //     $feeship = DB::table('tabfeeships')->whereIn('feematp',function ($query) use($rq) {
    //                                 $query->select('matp')->from('tabtinhthanhphos')
    //                                 ->Where('nametinhthanhpho','like','@'.$rq->value.'%');
                     
    //                             })->get();
    //     $output = '';
    //     $output.='
    //             <table class="table table-bordered table-hover text-nowrap">
    //               <thead>                  
    //                 <tr>
    //                   <th>Tên thành phố</th>
    //                   <th>Tên quận huyện</th>
    //                   <th>Tên xã phường</th>
    //                   <th>Phí ship</th>
    //                 </tr>
    //               </thead>
    //               <tbody>
    //               ';
    //             foreach($feeship as $fee)
    //             {
    //               if($rq->value == "")
    //                 $output.= '
    //                 <tr>
    //                   <td>'.$fee->city->nametinhthanhpho.'</td>
    //                   <td>'.$fee->province->namequanhuyen.'</td>
    //                   <td>'.$fee->wards->namexaphuong.'</td>
    //                   <td contenteditable data-feeship_id="'.$fee->feeid.'" class="fee_feeship_edit">'.number_format($fee->feefeeship,0,',','.').'$</td>
    //                 </tr>
    //                 ';
    //             }
    //     $output.= '
    //               </tbody>
    //             </table>
    //     ';
    //     echo $output;
    // }
}
