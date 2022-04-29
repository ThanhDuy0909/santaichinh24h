<?php 

namespace App\Http\Controllers\User;

use App\Http\Controllers\La_Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends La_Controller{
    
    public function index(){

        $data['index']      = $this->getIndex();

        $data['title']      = 'Sàn Tài Chính 24h';
        
        $template           = 'user.home.index';

        return view($template,isset($data)?$data:NULL); 
    }
    public function cic()
    {
        $data['index']      = $this->getIndex();
        $data['title']      = 'Sàn Tài Chính 24h';
        $template           = 'user.check_cic.check_cic';
        return view($template,isset($data)?$data:NULL); 

    }
    public function loginCic()
    {
        $data['index']      = $this->getIndex();
        $data['title']      = 'Sàn Tài Chính 24h';
        $template           = 'user.check_cic.login_face';
        return view($template,isset($data)?$data:NULL); 

    }
    public function calculate()
    {
        $data['index']      = $this->getIndex();
        $data['title']      = 'Sàn Tài Chính 24h';
        $template           = 'user.calculate.index';
        return view($template,isset($data)?$data:NULL); 

    }
    function  loadlichsuvay(Request $request){
        $sotienvay          = $request['sotienvay'];
        $thoihan            = $request['thoihan']*12;
        $laisuat            = ($request['laisuat']/100)/12;
        $phibaohiem         = $request['phibaohiem'];
        $phithuho           = 12000;

        $html               = "";
        $tongFott           = "";

        $tongLai            = 0 ;
        $tongtrahangthang   = 0 ;
        $tongphithuho       = 0 ;
        $tongtracophithuho  = 0 ;
        if($phibaohiem != "" && $phibaohiem > 0){
            $sotienvay = $sotienvay + ($sotienvay*$phibaohiem/100);
        }

        for($i = 1 ; $i <= $thoihan; $i++){

            if($laisuat != "" && $laisuat > 0){
                $t1 = $sotienvay* $laisuat;
                $t2 = (1 + $laisuat)**$thoihan;
                $tiengopthang  =  ($t1 *  $t2)/ ($t2 - 1);
            }else{
                $tiengopthang  =  $sotienvay / $thoihan;
            }

            if($i == 1){
                $soduno[$i]     = $sotienvay;
                $solai[$i]      = $soduno[$i] * $laisuat;
                $tiengoc[$i]    = $tiengopthang - $solai[$i];
            }

            if($i > 1){
                $solai[$i]      = ($soduno[$i - 1] - $tiengoc[$i - 1] )  * $laisuat;
                $tiengoc[$i]    = $tiengopthang - $solai[$i];
                $soduno[$i]     = $soduno[$i - 1] - $tiengoc[$i];
            }
        


            if($i % 2 == 0){
                $bg = 'white';
            }else{
                $bg = 'rgba(0,0,0,0.05)';
            }

            $html .= '<tr style="background:'.$bg.'">';
            $html .= '<td> Tháng '.$i.'</td>';
            $html .= '<td>'.$this->tien($soduno[$i]).' VND </td>';
            $html .= '<td>'.$this->tien($solai[$i]).' VND </td>';
            $html .= '<td >'.$this->tien($tiengoc[$i]).' VND </td>';
            $html .= '<td>'.$this->tien($tiengopthang).' VND </td>';
            $html .= '<td>'.$this->tien($phithuho).'  VND</td>';
            $html .= '<td>'.$this->tien($tiengopthang + $phithuho).' VND</td>';
            $html .= '</tr>';

            $tongLai            += $solai[$i] ;
            $tongtrahangthang   += $tiengopthang ;
            $tongphithuho       += $phithuho ;
            $tongtracophithuho  += $tiengopthang + $phithuho;
        }

        $tongFott .= '<tr style="background:'.$bg.'">';
        $tongFott .= '<td></td>';
        $tongFott .= '<td></td>';
        $tongFott .= '<td>Tổng</td>';
        $tongFott .= '<td id="rs_interest_total">'.$this->tien($tongtrahangthang - $tongLai).' VND </td>';
        $tongFott .= '<td id="rs_total">'.$this->tien($tongtrahangthang).' VND </td>';
        $tongFott .= '<td id="rs_interest_total">'.$this->tien($tongphithuho).' VND </td>';
        $tongFott .= '<td id="rs_total">'.$this->tien($tongtracophithuho).' VND </td>';
        $tongFott .= '</tr>';

        $myObj['html']          = $html;
        $myObj['tongFott']      = $tongFott;
        $myObj['tong']          = $this->tien($tongtrahangthang);
        $myJSON                 = json_encode($myObj);
        echo $myJSON;
    }
    function tien($str)
    {
        if ($str != 0)
            return str_replace(',', '.', number_format($str));
        else
            return '0';
    }
    public function checkcic()
    {
        $data['index']      = $this->getIndex();

        $data['title']      = 'Sàn Tài Chính 24h';
        $template           = 'user.#.checkcic';
        return view($template,isset($data)?$data:NULL); 

    }
    public function data()
    {
        $data['index']      = $this->getIndex();

        $data['title']      = 'Sàn Tài Chính 24h';
        $template           = 'user.#.data';
        return view($template,isset($data)?$data:NULL); 

    }
    public function loan()
    {
        $data['index']      = $this->getIndex();

        $data['title']      = 'Sàn Tài Chính 24h';
        $template           = 'user.#.loan';
        return view($template,isset($data)?$data:NULL); 

    }
}