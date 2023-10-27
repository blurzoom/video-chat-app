<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\Style\Paragraph;
use PhpOffice\PhpWord\TemplateProcessor;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('create-doc', function (Request $request) {
    $response = Http::get('http://pfu-app.test/api/search/' . $request->search . '/1');
    if ($response->ok()) {
        $nc = new \nomelodic\NCL\NCLNameCaseUa();
        $paragraph = new Paragraph('');
        $paragraph->setIndentation(['left' => 4534]);//mm*5.668 800
        $paragraphFirstLine = new Paragraph(['align' => 'both', 'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0]);
        $paragraphFirstLine->setIndentation(['left' => 0]);//mm*5.668 800
        $paragraphFirstLine->setIndentation(['firstline' => 708.5]);
        $paragraphFirstLine->setAlignment('both');
        $templateProcessor = new TemplateProcessor(storage_path('/app') . '/template.docx');
        $fullName = preg_split('/[\s]/', $request->correspondent);
        if (count($fullName) == 3) {
            $request->correspondent = $nc->qFullName($fullName[0], $fullName[1], $fullName[2], null, 2, 'S N');
        }
        $correspondent = new TextRun();
        $correspondent->setParagraphStyle($paragraph);
        $correspondent->addText($request->correspondent, ['bold' => true, 'italic' => false, 'color' => 'black', 'lang' => 'uk-UA']);
        $templateProcessor->setComplexValue('correspondent', $correspondent);

        $user = new TextRun();
        $user->setParagraphStyle($paragraph);
        $user->addText('Аліна Вільховик 56-56-56', ['bold' => false, 'italic' => false, 'color' => 'black', 'lang' => 'uk-UA', 'size' => 10, 'name' => 'Times New Roman']);
        $templateProcessor->setComplexValue('user', $user);
        $address = new TextRun();
        $address->setParagraphStyle($paragraph);
        $address->addText($request->address, ['bold' => true, 'italic' => false, 'color' => 'black', 'lang' => 'uk-UA']);
        $templateProcessor->setComplexValue('address', $address);
        if (!$request->fromDate) {
            $request->fromDate = '___________';
        }
        $fromDate = new TextRun();
        $fromDate->setParagraphStyle($paragraph);
        $fromDate->addText($request->fromDate, ['bold' => false, 'underline' => 'single', 'color' => 'black', 'lang' => 'uk-UA', 'size' => 10]);
        $templateProcessor->setComplexValue('fromDate', $fromDate);

        if (!$request->fromNumber) {
            $request->fromNumber = '_____________';
        }
        $fromNumber = new TextRun();
        $fromNumber->setParagraphStyle($paragraph);
        $fromNumber->addText($request->fromNumber, ['bold' => false, 'underline' => 'single', 'color' => 'black', 'lang' => 'uk-UA', 'size' => 10]);
        $templateProcessor->setComplexValue('fromNumber', $fromNumber);

        $replacements = [
            ['line' => 'На виконання постанови про відкриття виконавчого провадження від 29.08.2023 року ВП № 72627164 повідомляємо. '],
            ['line' => 'На виконання рішення Полтавського окружного адміністративного суду по справі № 440/9846/22 гр. Паська Вячеслава Володимировича нарахована заборгованість по виплаті грошової допомоги до 5 травня за 2022 рік у розмірі п’яти мінімальних пенсій за віком, з урахуванням попередньо виплаченої суми в розмірі 8 179,00 грн, яка облікована в органах Пенсійного фонду України.'],
        ];
        $templateProcessor->cloneBlock('lines', 0, true, false, $replacements);
        $templateProcessor->cloneBlock('block_name', 0, true, true);
        $rightTabStyleName = 'rightTab';
        $replacements_sign = [
            ['line' => 'Перший заступник начальника '],
            ['line' => '${boss_name}'],
        ];
        $templateProcessor->cloneBlock('sign', 0, true, false, $replacements_sign);
        $templateProcessor->saveAs(storage_path() . '/app/template2.docx');
        $templateProcessor2 = new TemplateProcessor(storage_path('/app') . '/template2.docx');
        $boss_name = new TextRun();
        $paragraphTab = new Paragraph(['tabs' => [new \PhpOffice\PhpWord\Style\Tab('right', 9090)]]);
        $boss_name->addText(('Головного управління</w:t><w:tab/><w:t>Володимир НОСЕНКО'), ['bold' => true, 'italic' => false, 'color' => 'black', 'size' => 14, 'name' => 'Times New Roman', 'lang' => 'uk-UA'], $paragraphTab);
        $templateProcessor2->setComplexValue('boss_name', $boss_name);
        $templateProcessor2->saveAs(storage_path() . '/app/template2.docx');

        $file = Storage::get('template2.docx');
        $file_contents = ($file);
        return response($file_contents)
            ->header('Cache-Control', 'no-cache private')
            ->header('Content-Description', 'File Transfer')
            ->header('Content-Type', 'application/msword'/*$file->type*/)
            ->header('Content-length', strlen($file_contents))
            ->header('Content-Disposition', 'attachment; filename=' . 'test.docx' /*$file->name*/)
            ->header('Content-Transfer-Encoding', 'binary');
//        return response()-> json(array_merge($request->all(), $response->json()));
    }

});
