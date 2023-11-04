<?php

namespace App\Http\Controllers;


use App\Models\Player;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    //====================================================>
    public function index()
    {
        $this->seo()->setTitle('Dashboard Home');
        return view('dashboard.index');
    }

    //====================================================>
    public function leader()
    {

        $this->seo()->setTitle('Leader Board');
        return view('dashboard.leader', ['quiz' => null]);
    }

    //====================================================>
    public function leaderAjax(Request $request)
    {
        if ($request->ajax()) {
            $data = Quiz::select(['id', 'player_id', 'score', 'duration'])->with([
                'Player' => function ($q) {
                    $q->select('id', 'name','phone','uuid');
                },
                'QuizAnswer'
            ])->orderBy('score', 'desc')->where('status',true)->get();//->unique('player_id');

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function ($row) {
                    return $row->Player->name;
                })
                ->editColumn('phone', function ($row) {
                    return $row->Player->phone ?? '';
                })
                ->editColumn('code', function ($row) {
                    return $row->Player->uuid ?? '';
                })

/*
                ->addColumn('scorex', function ($row) {
                    $total = 0;
                    $correct = 0;
                    $correct_reward = 900000;

                    foreach ($row->QuizAnswer as $ans) {
                        if (!$ans->is_correct)
                            continue;

                        $interval = $ans->end_datetime->diff($ans->start_datetime);
                        $totalMS = 0;
                        $totalMS += $interval->m * 2630000000;
                        $totalMS += $interval->d * 86400000;
                        $totalMS += $interval->h * 3600000;
                        $totalMS += $interval->i * 60000;
                        $totalMS += $interval->s * 1000;

                        $total += $totalMS;
                        $correct++;
                    }

                    if($total >= 600000){
                        $total = 600000;
                    }

                    $score = (($correct * $correct_reward) - $total) / 1000;

                    if($score < 0){
                        $score = 0;
                    }
                    return $score;

                })
*/
                ->make(true);
        }
        return '';
    }
    //====================================================>
    public function players()
    {

        $this->seo()->setTitle('Players');
        return view('dashboard.players');
    }

    //====================================================>
    public function playersAjax(Request $request)
    {
        if ($request->ajax()) {

            $data = Player::with([
                'Quiz' => function($q){
                    $q->select('player_id','score')->orderBy('score', 'desc');
                }
            ]);//->get();

            return Datatables::of($data)

                ->filter(function ($query){
                    if (request()->has('search')) {
                        $query->where(function ($wQuery) {
                            $wQuery->where('name', 'like', '%' . request('search')['value'] . '%');
                            $wQuery->orWhere('phone', "%" . request('search')['value'] . "%");
                        });
                    }
                })



                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a data-code="'.$row->uuid.'" href="javascript:void(0)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline show-code">Code</a>';
                })
                ->rawColumns(['action'])

                ->addColumn('max_score', function ($row) {
                    return $row->Quiz[0]->score ?? 0;
                })
                ->addColumn('quiz_count', function ($row) {
                   return count($row->Quiz) ?? 0;
                })
                ->make(true);
        }
        return '';
    }
    //====================================================>
    public function deleteAll(Request $request)
    {
        //$returnArray['success'] = false;

        Quiz::truncate();
        QuizAnswer::truncate();
        //Player::truncate();

        $returnArray['success'] = true;
        return Response::json($returnArray);
    }
    //====================================================>

    //====================================================>


}
