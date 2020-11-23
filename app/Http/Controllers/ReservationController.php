<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Calendar;

class ReservationController extends Controller
{
    
    public function getReservation(Request $request)
    {   
       
        $data = new Reservation();
        $list = Reservation::all();
        return view('calendar.reservation', ['list' => $list,'data' => $data]);
    }
    public function getReservationId($id)
    {
        
        $data = new Reservation();
        if (isset($id)) {
            $data = Reservation::where('id', '=', $id)->first();
        } 
        $list = Reservation::all();
        return view('calendar.reservation', ['list' => $list, 'data' => $data]);
    }
    public function postReservation(Request $request)
    {
        
        $validatedData = $request->validate([
            'day' => 'required|date_format:Y-m-d',
            'customer_name' => 'required',
            'menu'=>'required'
        ]);
        
        if (isset($request->id)) {
            $reservation = Reservation::where('id', '=', $request->id)->first();
            $reservation->day = $request->day;
            $reservation->instant = $request->instant;
            $reservation->menu = $request->menu;
            $reservation->customer_name = $request->customer_name;
            $reservation->save();
        } else {
            $reservation = new Reservation(); 
            $reservation->day = $request->day;
            $reservation->instant = $request->instant;
            $reservation->menu = $request->menu;
            $reservation->customer_name = $request->customer_name;
            $reservation->save();
        }
        
        $data = new Reservation();
        $list = Reservation::all();
        return view('calendar.reservation', ['list' => $list, 'data' => $data]);
    }
    
    public function index(Request $request) {
        
        $list = Reservation::all();
        
        $cal = new Calendar($list);
        $tag = $cal->showCalendarTag($request->month, $request->year);
        
        return view('calendar.index', ['cal_tag'=>$tag]);
    }
    
    public function deleteReservation(Request $request) {
        if (isset($request->id)) {
            $reservation = Reservation::where('id', '=', $request->id)->first();        
            $reservation->delete();
        }
        
        $data = new Reservation();
        $list = Reservation::all();
        return view('calendar.reservation', ['list' => $list, 'data' => $data]);
    }
    
    
}
