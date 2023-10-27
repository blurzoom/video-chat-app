<?php

namespace App\Livewire;

use App\Events\CounterAdd;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use nomelodic\NCL\lib\NCL;
use nomelodic\NCL\NCLNameCaseUa;
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style\Paragraph;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\Style;


class Counter extends Component
{
    public $count = 1;
    public $file;
    public $fio;
protected $listeners=[];
    public function increment()
    {
        $this->count++;
        // sleep(rand(1, 3));
        event(new CounterAdd('some message'));
    }

    public function mount()
    {
        $nc = new NCLNameCaseUa();
//        dd($this->fio = $nc->q("Герасименко Олексій Анатолійович", null, NCL::$MAN));
//        $this->fio = $nc->q('Герасименко Олексій Анатолійович', 1)->getFormatted(1,'S');
        $this->fio = $nc->fullReset()->setFullName('Герасименко', 'Олексій', 'Анатолійович')->getFormatted(1,'S N');
//        $this->fio = $nc->qSecondName('Герасименко', 1, 1);
//        $this->fio = $nc->qFullName('Герасименко', null, 'Анатолійович', null, 6 ,'S');
        $this->download();
    }

    public function decrement()
    {
        $this->count--;
        sleep(rand(1, 10));

    }

    public function download()
    {
        $paragraph = new Paragraph('');
        $paragraph->setIndentation(['left' => 4534]);//mm*5.668 800

        $paragraphFirstLine = new Paragraph(['align' => 'both', 'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0]);
        $paragraphFirstLine->setIndentation(['left' => 0]);//mm*5.668 800
        $paragraphFirstLine->setIndentation(['firstline' => 708.5]);
        $paragraphFirstLine->setAlignment('both');
        $templateProcessor = new TemplateProcessor(storage_path('/app') . '/template.docx');
        $korespondent = new TextRun();
        $korespondent->setParagraphStyle($paragraph);
        $korespondent->addText('Олексій ГЕРАСИМЕНКО', ['bold' => true, 'italic' => false, 'color' => 'black', 'lang' => 'uk-UA']);
        $templateProcessor->setComplexValue('korespondent', $korespondent);
        $user = new TextRun();
        $user->setParagraphStyle($paragraph);
        $user->addText('Аліна Вільховик 56-56-56', ['bold' => false, 'italic' => false, 'color' => 'black', 'lang' => 'uk-UA', 'size' => 10, 'name' => 'Times New Roman']);
        $templateProcessor->setComplexValue('user', $user);
        $adress = new TextRun();
        $adress->setParagraphStyle($paragraph);
        $adress->addText('вул. Красіна, 77, кв .13, м. Полтава, 36023', ['bold' => true, 'italic' => false, 'color' => 'black', 'lang' => 'uk-UA']);
        $templateProcessor->setComplexValue('adress', $adress);
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

    }

    public function render()
    {
        return view('livewire.counter');
    }

    public function addSign($boss, $name)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $multipleTabsStyleName = 'multipleTab';
        $phpWord->addParagraphStyle(
            $multipleTabsStyleName,
            [
                'tabs' => [
                    new \PhpOffice\PhpWord\Style\Tab('left', 1550),
                    new \PhpOffice\PhpWord\Style\Tab('center', 3200),
                    new \PhpOffice\PhpWord\Style\Tab('right', 5300),
                ],
            ]
        );

        $rightTabStyleName = 'rightTab';
        $phpWord->addParagraphStyle($rightTabStyleName, ['tabs' => [new \PhpOffice\PhpWord\Style\Tab('right', 9090)]]);
        $leftTabStyleName = 'centerTab';
        $phpWord->addParagraphStyle($leftTabStyleName, ['tabs' => [new \PhpOffice\PhpWord\Style\Tab('center', 4680)]]);
        $section = $phpWord->addSection();
//        $section->addText("Multiple Tabs:\tOne\tTwo\tThree", null, $multipleTabsStyleName);
        $section->addText("${boss}\t${name}", null, $rightTabStyleName);
//        $section->addText("\tCenter Aligned", null, $leftTabStyleName);
        return $section;
    }
}
