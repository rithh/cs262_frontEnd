<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // include DB Class
use Illumniate\Support\Facades\Auth;
use App\Models\Bus;
use App\Models\admin_tbl;

class PageController extends Controller
{
    
    function home(Request $request)
    {
        $depart = $request['depart'] ?? "";
        $arrive = $request['arrive'] ?? "";
        if(($depart && $arrive) != "")
        {
            $bus_db = DB::table('bus_tbl')
                    ->where([
                        ['depart_from', '=',$depart],
                        ['arrive_at', '=', $arrive]
                        ])
                    ->orderBy('depart_time', 'asc')
                    ->get();
        }
        else
        {
        $bus_db = DB::table('bus_tbl')
            ->orderBy('depart_time', 'asc')
            ->get(); // Query SQL
        }
        return view("home", ["tpl_bus" => $bus_db]);

    }
    function home_fastest(Request $request)
    {

        $bus_db = DB::table('bus_tbl')
            ->orderBy('time_diff', 'asc')
            ->get(); // Query SQL

        return view("home", ["tpl_bus" => $bus_db]);

    }
    function home_cheapest()
    {

        $bus_db = DB::table('bus_tbl')
            ->orderBy('price', 'asc')
            ->get(); // Query SQL

        return view("home", ["tpl_bus" => $bus_db]);
    }

    function search(Request $request)
    {
        $depart = $request['depart'] ?? "";
        $arrive = $request['arrive'] ?? "";
        $bus_db = DB::table('bus_tbl');
        return view("home", ["tpl_bus" => $bus_db]);
    }

    function ticket_detail(Request $request)
    {
        if (\Auth::check()) {
            $bus_id = $request->id;

            $bus_db = DB::table('bus_tbl')
                ->where('id', '=', $bus_id)
                ->get();
        }
        return view("ticket_detail", ["tpl_bus" => $bus_db]);
    }

    public function add_cart(Request $request, $id)
    {
        if (\Auth::check()) {
            $bus_id = $request->id;
            $bus=Bus::find($id);
            
            $check = $bus->seat_avail - $request->booked;
            if($check<0)
            {
                session()->flash('message', 'Unable to book ticket');
                return redirect()->back();
            }
            else{
                $user=\Auth::user();

                $cart=new admin_tbl;
                $cart->username = $user->name;
                $cart->op_name = $bus->op_name;
                $cart->depart_from = $bus->depart_from;
                $cart->depart_time = $bus->depart_time;
                $cart->arrive_at = $bus->arrive_at;
                $cart->booked_seats = $request->booked;
                $cart->price = $bus->price;
                $cart->total = $bus->price*$request->booked;
                $cart->save();
                DB::table('bus_tbl')
                ->where('id', '=', $bus_id)
                ->decrement('seat_avail', $request->booked);
            }            
            return redirect('/');
        }

    }

    function newPage()
    {
        if (\Auth::check()) {
            $user = \Auth::user()->name;

            $admin = DB::table('admin_tbls')
                ->where('username', '=', $user)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        return view("newPage", ["tpl_admin" => $admin]);
    }
}