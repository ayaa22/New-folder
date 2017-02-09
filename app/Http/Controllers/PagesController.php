<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Symfony\Component\HttpFoundation\Response;


class PagesController extends Controller {

	public function getIndex() {
		return view('pages.welcome');
	}

 	public function getValidation(Request $request) {

        $this->validate($request,array(
            'start'   =>'required',
            'number'  =>'required',
            'session'=>'required'
            ));

        $day = $request->number;
        $days=explode(",",$day);

        $session = $request->session;

        $dates = $request->start;
        $date=explode("/",$dates);

        $totalsessions = 30*($session);
        

        for( $j=0; $j<=count($days); $j++) {

            if($j == count($days)-1) {
                $diff[count($days)-1] = $days[0]-0+1;
                break;
            }

            $diff[$j] = $days[$j+1] - $days[$j];
        }

        $newdate[0]= $dates;
        
        $k=1;

     for($j=$k; $j<$totalsessions; $j++) {
       
        for($i=0; $i<=count($diff); $i++) {

        if($k== $totalsessions) {
            break;
        }

        elseif($i==(count($diff))) {
            break;
        }

        elseif($date[1]==1||$date[1]==3||$date[1]==5||$date[1]==7||$date[1]==8||$date[1]==10||$date[1]==12) {

             $date[0] = $date[0]+ $diff[$i];
             
             if($date[0] > 31 && $date[1] != 12) {
                $date[0]= $date[0] - 31;
                $date[1]+=1;
                $d=$date[0]."/".$date[1]."/".$date[2];
                $newdate[$k]=$d;
                $k+=1;

             } 
             elseif($date[1]==12 && $date[0] > 31) {
                $date[0]= $date[0] - 31;
                $date[1]=1;
                $date[2]+=1;
                $d=$date[0]."/".$date[1]."/".$date[2];
                $newdate[$k]=$d;
                $k+=1;

             } else {

                $d=$date[0]."/".$date[1]."/".$date[2];
                $newdate[$k]=$d;
                $k+=1;
             }
        }

        elseif($date[1]==4||$date[1]==6||$date[1]==9||$date[1]==11) {

             $date[0] = $date[0]+ $diff[$i];
             
             if($date[0] > 30 && $date[1] !=12) {
                $date[0]= $date[0] - 30;
                $date[1]+=1;
                $d=$date[0]."/".$date[1]."/".$date[2];
                $newdate[$k]=$d;
                $k+=1;

             } else {

                $d=$date[0]."/".$date[1]."/".$date[2];
                $newdate[$k]=$d;
                $k+=1;
             }
        }

        elseif($date[1]==2) {

             $date[0] = $date[0]+ $diff[$i];
             
             if($date[0] > 28) {
                $date[0]= $date[0] - 28;
                $date[1]+=1;
                $d=$date[0]."/".$date[1]."/".$date[2];
                $newdate[$k]=$d;
                $k+=1;

             } else {

                $d=$date[0]."/".$date[1]."/".$date[2];
                $newdate[$k]=$d;
                $k+=1;
             }
        }
     }
    }
    
    return response(view('pages.dashboard',array('Sessions'=>$newdate)),200, ['Content-TYpe' => 'application/json']);
     }
	
}