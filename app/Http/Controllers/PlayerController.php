<?php

namespace App\Http\Controllers;


use App\Http\Requests\Player\LoginRequest;
use App\Http\Requests\Player\RegisterRequest;
use App\Models\Player;
use App\Models\Quiz;
use App\Services\QuizService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yajra\DataTables\Facades\DataTables;


class PlayerController extends Controller
{

    //====================================================>
    public function login(Request $request)
    {
        $this->seo()->setTitle('Login And Start');
        return view('quiz.login');
    }

    //====================================================>
    public function doLogin(LoginRequest $request)
    {
        $request->validated();
        $input = $request->input();

        try {
            $player = Player::where('uuid', $input['user_id'])->firstOrFail();
            $uuid = (new QuizService)->store($player);
            return redirect()->route('quiz.step', [$uuid, 1]);
        } catch (ModelNotFoundException  $e) {
            return back()->withErrors(['user_id' => 'The entered code is invalid. Please contact the registration']);
        }
    }

    //====================================================>
    public function playerRegister()
    {
        $this->seo()->setTitle('Player Register');
        return view('quiz.register');
    }

    //====================================================>
    public function playerDoRegister(RegisterRequest $request)
    {
        $request->validated();
        $input = $request->input();
        $model = new Player;

        $model->name = $input['name'];
        $model->phone = $input['phone'];
        $model->uuid = $this->generateUniqueCode();

        if ($model->save()) {
            return view('quiz.done', ['code' => $model->uuid]);
        } else {
            return back()->withErrors(['name' => 'Error Try Another Time']);
        }
    }
    //====================================================>
    //====================================================>
    public function register(Request $request)
    {
        $this->seo()->setTitle('Register');
        return view('dashboard.player_form');
    }

    //====================================================>
    public function doRegister(RegisterRequest $request)
    {
        $request->validated();
        $input = $request->input();
        $model = new Player;

        $model->name = $input['name'];
        $model->phone = $input['phone'];
        $model->uuid = $this->generateUniqueCode();

        if ($model->save()) {
            return view('dashboard.player_code', ['code' => $model->uuid]);
        } else {
            return back()->withErrors(['name' => 'Error Try Another Time']);
        }
    }

    //====================================================>
    private function generateUniqueCode()
    {
        do {
            $code = random_int(1004, 9999);
        } while (Player::where("uuid", $code)->first());
        return $code;
    }

    //====================================================>
    public function export()
    {
        try {

            $data = Quiz::with(['Player', 'QuizAnswer'])->orderBy('score', 'desc')->get();


            $spreadsheet = new Spreadsheet();
            $spreadsheet->getProperties()->setCreator('Ahmed Elsayed Ali  +201015884959 ')
                ->setLastModifiedBy('Ahmed Elsayed Ali  +201015884959 ')
                ->setTitle('Ahmed Elsayed Ali  +201015884959 ')
                ->setSubject('Ahmed Elsayed Ali  +201015884959 ')
                ->setDescription('Ahmed Elsayed Ali  +201015884959 ')
                ->setKeywords('Ahmed Elsayed Ali  +201015884959 ')
                ->setCategory('Ahmed Elsayed Ali  +201015884959 ');


            $xlsIndex1 = $spreadsheet->setActiveSheetIndex(0);

            $xlsIndex1->setTitle('Players');

            $headerStyle = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_THIN,
                    ],
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => [
                        'rgb' => '808080',
                    ],
                ],
            ];


            $rowStyle = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_THIN,
                    ],
                ],
            ];

            $rowErrorStyle = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_THIN,
                    ],
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => [
                        'argb' => 'ffff000a',
                    ],
                ],
            ];

            $xlsIndex1->setCellValue('A1', 'Player')
                ->setCellValue('B1', 'Phone')
                ->setCellValue('C1', 'Quiz Date')
                ->setCellValue('D1', 'Score')
                ->setCellValue('E1', 'Duration')
                ->setCellValue('F1', 'Answers 1')
                ->setCellValue('G1', 'Answers 2')
                ->setCellValue('H1', 'Answers 3')
                ->setCellValue('I1', 'Answers 4')
                ->setCellValue('J1', 'Answers 4')
                ->setCellValue('K1', 'Status');

            $xlsIndex1->getStyle('A1')->applyFromArray($headerStyle);
            $xlsIndex1->getStyle('B1')->applyFromArray($headerStyle);
            $xlsIndex1->getStyle('C1')->applyFromArray($headerStyle);
            $xlsIndex1->getStyle('D1')->applyFromArray($headerStyle);
            $xlsIndex1->getStyle('E1')->applyFromArray($headerStyle);

            $xlsIndex1->getStyle('F1')->applyFromArray($headerStyle);
            $xlsIndex1->getStyle('G1')->applyFromArray($headerStyle);
            $xlsIndex1->getStyle('H1')->applyFromArray($headerStyle);
            $xlsIndex1->getStyle('I1')->applyFromArray($headerStyle);
            $xlsIndex1->getStyle('J1')->applyFromArray($headerStyle);
            $xlsIndex1->getStyle('K1')->applyFromArray($headerStyle);

            $index = 2;
            foreach ($data as $row) {
                $xlsIndex1->setCellValue('A' . $index, $row->Player->name ?? 'NULL');
                $xlsIndex1->setCellValue('B' . $index, $row->Player->phone ?? 'NULL');
                $xlsIndex1->setCellValue('C' . $index, $row->created_at->format('Y-m-d-H:i:s') ?? 'NULL');
                $xlsIndex1->setCellValue('D' . $index, $row->score ?? 'NULL');
                $xlsIndex1->setCellValue('E' . $index, $row->duration ?? 'NULL');

                foreach ($row->QuizAnswer as $ans) {

                    $boolC = false;
                    $cAns = 'INCORRECT';
                    $LET = 'F';
                    if ($ans->is_correct) {
                        $cAns = 'CORRECT';
                        $boolC = true;

                    }
                    switch ($ans->inc) {
                        case 1:
                            $LET = 'F';
                            break;
                        case 2:
                            $LET = 'G';
                            break;

                        case 3:
                            $LET = 'H';
                            break;

                        case 4:
                            $LET = 'I';
                            break;

                        case 5:
                            $LET = 'J';
                            break;
                        default:
                    }

                    $xlsIndex1->setCellValue($LET . $index, $cAns);
                    if ($boolC)
                        $xlsIndex1->getStyle($LET . $index)->applyFromArray($rowStyle);
                    else
                        $xlsIndex1->getStyle($LET . $index)->applyFromArray($rowErrorStyle);
                }

                $xlsIndex1->setCellValue('K' . $index, $row->status ? 'completed' : 'incomplete');

                $xlsIndex1->getStyle('A' . $index)->applyFromArray($rowStyle);
                $xlsIndex1->getStyle('B' . $index)->applyFromArray($rowStyle);
                $xlsIndex1->getStyle('C' . $index)->applyFromArray($rowStyle);
                $xlsIndex1->getStyle('D' . $index)->applyFromArray($rowStyle);
                $xlsIndex1->getStyle('E' . $index)->applyFromArray($rowStyle);


                if ($row->status) {
                    $xlsIndex1->getStyle('K' . $index)->applyFromArray($rowStyle);
                } else {
                    $xlsIndex1->getStyle('K' . $index)->applyFromArray($rowErrorStyle);
                }


                $index++;
            }

            $spreadsheet->setActiveSheetIndex(0);
            $spreadsheet->getDefaultStyle()->getNumberFormat()->setFormatCode('#');
            $sheet = $spreadsheet->getActiveSheet();
            foreach ($sheet->getColumnIterator() as $column) {
                $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
            }

            $filename = 'Players_' . date("Y/m/d") . '.xlsx';
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
            header('Cache-Control: cache, must-revalidate');
            header('Pragma: public');

            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');


        } catch (Exception $e) {
            abort(500);
        }
    }

    //====================================================>
    public function playerLeaderboard()
    {
        $this->seo()->setTitle('Leader Board');
        return view('home.leader', ['quiz' => null]);
    }

    //====================================================>
    public function playerLeaderboardAjax(Request $request)
    {
        if ($request->ajax()) {
            $data = Quiz::select(['id', 'player_id', 'score', 'duration'])->with([
                'Player' => function ($q) {
                    $q->select('id', 'name');
                }
            ])->orderBy('score', 'desc')->where('status', true)->get()->unique('player_id');

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function ($row) {
                    return $row->Player->name;
                })
                ->make(true);
        }
        return '';
    }
    //====================================================>


}
