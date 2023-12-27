<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Datanormale;
use Illuminate\Http\Request;
use App\Models\announcement;
use App\Models\Data;
use App\Models\Game;
use App\Models\Image;
use App\Models\WithdrawOrDepositMoney;
use App\Models\Profit;
use App\Models\Score;
use App\Models\User;
use App\Models\Notification;
use App\Models\Offer_game;
use App\Models\Order_game;
use App\Models\Tax;
use App\Trait\Reward;
use Illuminate\Support\Facades\Auth;
use App\Models\racharch\RechargeCountry;
use App\Models\racharch\companyIncountry;
use App\Models\racharch\Package;
use App\Models\racharch\PackagePrice;
use App\Models\Taxrule;
use Lwwcas\LaravelCountries\Models\Country;

// use App\Trait\Reward;
class HomeController extends Controller
{
    use Reward;
    public function index()
    {
        $Mony = auth()->user()->daily_gain / (announcement::where('days', 0)->count() + 1);
        $count = announcement::where('days', 0)->count();

        $datas = Datanormale::orderBy('starting_price', 'ASC')->get();
        $onePhoto = Image::take(1)->get();
        $Photos = Image::all();
        $tax = Tax::first()->tax ?? 0;
        $users = User::with('scores')->get();
        // return($users);
        return view('web.home', compact('datas', 'count', 'Mony', 'Photos', 'tax', 'onePhoto', 'users'));
    }
    // public function step1profit($id){
    //     dd($id);
    // }
    public function step1($id)
    {
        //where('days',0)->
        $Announcements = announcement::where('days', 0)->paginate(1);
        $id = $id;
        $Mony = auth()->user()->daily_gain / (announcement::where('days', 0)->count());
        $count = announcement::where('days', 0)->count();
        $Datanormale = Datanormale::where('starting_price', auth()->user()->scores->score)->first();

        User::find(auth()->user()->id)->update([
            'datanormales_id' => Datanormale::where('starting_price', '<=', auth()->user()->scores->score)->first()->id,
        ]);
        if (isset($Datanormale)) {
            $this->firstScribe($Datanormale->starting_price);
        }
        return view('web.step1', compact('Announcements', 'Mony', 'count', 'id'));
        // dd($Announcement);
        //

    }
    public function viewAnoun(Request $request)
    {
        $userId = Auth::user()->id;

        $announcement = Announcement::findOrfail($request->id);
        $pivotRow = Auth::user()->announcements()->where('announcement_id', $request->id)->first();
        Auth::user()->scores->update(['score' => $request->myInput12]);
        $not = Notification::create([
            'status' => 'جاهزه',
            'type' => 'another',
            'user_id' => auth()->user()->id,
            "message" => $request->mony . "لقد فاز من مشاهده الاعلان"
        ]);

        Profit::create([
            'user_id' => auth()->user()->id,
            'announcement_id' => $request->annonceId,
            'datanormale_id' => $request->packageId,
            'profits' => $request->mony,
        ]);
        User::find(auth()->user()->id)->update([
            "daliy_counter_announce" => auth()->user()->daliy_counter_announce + 1,
        ]);
        if (!$pivotRow) {
            $announcement->users()->attach($userId);
            toastr()->success('add gain successful');
        }


        return back();
    }
    public function profile()
    {
        return view('web.profile');
    }
    public function history()
    {
        return view('web.history');
    }
    public function SRA()
    {
        $datas = Datanormale::select('id', 'starting_price', 'final_price', 'starting_income', 'final_income')->get();
        $autodata = Data::get();
        $Mony = auth()->user()->daily_gain / (announcement::where('days', 0)->count() + 1);
        $count = announcement::where('days', 0)->count();

        return view('web.sra', compact('datas', 'autodata', 'count', 'Mony'));
    }

    public function invite()
    {

        return view('web.invite.index');
    }

    public function about()
    {
        return view('web.about.index');
    }
    public function promation()
    {
        return view('web.promation.index');
    }
    public function rule()
    {
        return view('web.rule.index');
    }


    public function rport()
    {
        return view('web.rport.index');
    }
    public function tabra()
    {
        return view('web.tabra.index');
    }
    public function shnRaside()
    {
        $contrydata = RechargeCountry::where('status', 1)->get();
        return view('web.shnRaside.index', compact('contrydata'));
    }


    public function  sendMony()
    {
        $countries = Country::query()->where('status', '1')->get();
        $tax = Taxrule::query()->findOrFail(1);

        return view('web.sendMony.index', compact('countries', 'tax'));
    }
    public function  vodafonMony()
    {
        return view('web.sendMony.vodafonMony');
    }
    public function  vodafonSend()
    {
        return view('web.sendMony.vodafonSend');
    }
    public function create()
    {
        $user = User::with('withdrawOrDdepositMony', 'resiveMony', 'monysend')->findOrFail(auth()->user()->id);

        $dontready = WithdrawOrDepositMoney::with('user')->where('user_id', auth()->user()->id)->where('status_mony', 3)->get();
        $ready = WithdrawOrDepositMoney::with('user')->where('user_id', auth()->user()->id)->where('status_mony', 1)->get();
        $readyprofite = Profit::where('user_id', auth()->user()->id)->get();
        $wait = WithdrawOrDepositMoney::with('user')->where('user_id', auth()->user()->id)->whereIn('status_mony', ['0', '2'])->get();

        return view('web.history.index', compact('user', 'dontready', 'ready', 'wait', 'readyprofite'));
    }
    // ajax code
    public function companycharge($id)
    {
        $contrydata = companyIncountry::where('recharge_countrie_id', $id)->plucK('name', 'id');
        return $contrydata;
    }
    public function contycharge($id)
    {
        $data = companyIncountry::with('Package', 'PackagePrice')->findOrfail($id);
        return $data;
    }


    public function game()
    {
        $get_games = Game::query()->with('offers')->get();
        return view('web.game.index', compact('get_games'));
    }

    public function get_data(Request $request)
    {
        $data['offer'] = Offer_game::query()->where('id', $request->id)->with(['game'])->get();
        $data['game'] = $data['offer'][0]->game;
        $data['tax'] = Taxrule::query()->findOrFail(1);
        return response()->json(['data' => $data]);
    }
    public function post_data(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;
        $status = Order_game::query()->create($data);
        return response()->json(['status' => $status]);
    }

    public function get_wallet(Request $request)
    {
        $country = Country::query()->where('id', $request->id)->first();
        $wallet = $country->wallets;
        return response()->json(['wallet' => $wallet]);
    }


}
