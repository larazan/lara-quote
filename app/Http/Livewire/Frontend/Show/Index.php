<?php

namespace App\Http\Livewire\Frontend\Show;

use App\Models\Quote;
use Livewire\Component;

class Index extends Component
{
    public $bgselect;
    public $colorselect;
    public $fontselect;
    public $alignselect;
    public $sizeselect;
    
    // public $id;
    public $type;
    public $quote;
    public $author;
    public $tags;
    
    public $fontColor;
    public $fontSize;
    public $fontAlign = 'center';
    public $justify = 'center';
    public $fontFamily;
    public $bgColor;

    public $fontSizes = [
        ['name' => 'Small', 'value' => 'sm'],
        ['name' => 'Medium', 'value' => 'base'],
        ['name' => 'Large', 'value' => 'lg'],
        ['name' => 'Xtra large', 'value' => 'xl'],
        ['name' => 'Double xl', 'value' => '2xl'],
        ['name' => 'Triple xl', 'value' => '3xl'],
        ['name' => '4xl', 'value' => '4xl'],
        ['name' => '5xl', 'value' => '5xl'],
    ];

    public $styles = [
        [ 'font' => "Aelten", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#000', 'fontColor' => '#fff' ],
        [ 'font' => "Alphakind", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ead59e', 'fontColor' => '#000' ],
        [ 'font' => "Bajurie", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ee905f', 'fontColor' => '#fff' ],
        [ 'font' => "Banda-Aceh", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f49f91', 'fontColor' => '#fff' ],
        [ 'font' => "Bitcrusher", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#011528', 'fontColor' => '#fff' ],
        [ 'font' => "Blue_highway_cd", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#c04d9a', 'fontColor' => '#fff' ],
        [ 'font' => "Bright-Dreams", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f7f7f7', 'fontColor' => '#000' ],
        [ 'font' => "Chandella", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e9dcd3', 'fontColor' => '#000' ],
        [ 'font' => "Chinese-Rocks", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f4e4d0', 'fontColor' => '#000' ],
        [ 'font' => "Cokobi", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#90c9cf', 'fontColor' => '#000' ],
        [ 'font' => "Colombia", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffffeb', 'fontColor' => '#000' ],
        [ 'font' => "ConcreteWall", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#4cc1bc', 'fontColor' => '#fff' ],
        [ 'font' => "Coolvetica", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#468bdb', 'fontColor' => '#fff' ],
        [ 'font' => "Dakwart", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#212331', 'fontColor' => '#fff' ],
        [ 'font' => "DAGOCA", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f1d265', 'fontColor' => '#fff' ],
        [ 'font' => "Dealerplate-California", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#efb4d2', 'fontColor' => '#000' ],
        [ 'font' => "Dream-Orphans", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ebdddc', 'fontColor' => '#000' ],
        [ 'font' => "Elliane-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e4c8c4', 'fontColor' => '#000' ],
        [ 'font' => "Engebrechtre", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#009492', 'fontColor' => '#fff' ],
        [ 'font' => "ENGINE", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e3d1cf', 'fontColor' => '#000' ],
        [ 'font' => "Foo", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#2d2c31', 'fontColor' => '#fff' ],
        [ 'font' => "Gnuolane", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e8e29e', 'fontColor' => '#000' ],
        [ 'font' => "Gratise", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f49f91', 'fontColor' => '#fff' ],
        [ 'font' => "Groomer", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e96379', 'fontColor' => '#000' ],
        [ 'font' => "Halmera", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e8d7f7', 'fontColor' => '#000' ],
        [ 'font' => "HappyGarden", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ee725a', 'fontColor' => '#fff' ],
        [ 'font' => "Hellohowareyou", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#b3d3d8', 'fontColor' => '#000' ],
        [ 'font' => "Helsinki", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#27215f', 'fontColor' => '#fff' ],
        [ 'font' => "Inter-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f69b00', 'fontColor' => '#fff' ],
        [ 'font' => "Jreeng", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f69b00', 'fontColor' => '#000' ],
        [ 'font' => "Kaylafiz", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f6e9d7', 'fontColor' => '#fc9598' ],
        [ 'font' => "Kimberley", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f6e9d7', 'fontColor' => '#ff8459' ],
        [ 'font' => "Leorio", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f6e9d7', 'fontColor' => '#dbba0c' ],
        [ 'font' => "Limejuice", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f6e9d7', 'fontColor' => '#95c9a8' ],
        [ 'font' => "Lovetle", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f6e9d7', 'fontColor' => '#425fa6' ],
        [ 'font' => "Lynoselt", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f6e9d7', 'fontColor' => '#a5abe4' ],
        [ 'font' => "MatSaleh", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#a5abe4', 'fontColor' => '#fff' ],
        [ 'font' => "MelocheBook", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc0ca', 'fontColor' => '#a088f6' ],
        [ 'font' => "MightyKingdom", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc0ca', 'fontColor' => '#93caaa' ],
        [ 'font' => "Monofonto", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc0ca', 'fontColor' => '#000' ],
        [ 'font' => "MorningMiow", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#429eda', 'fontColor' => '#fff' ],
        [ 'font' => "Mounets", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f7f8f0', 'fontColor' => '#000' ],
        [ 'font' => "NoVirus", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fffefc', 'fontColor' => '#000' ],
        [ 'font' => "Oaklevin", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fff0d9', 'fontColor' => '#000' ],
        [ 'font' => "Ontel", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffe1e7', 'fontColor' => '#fa8764' ],
        [ 'font' => "Peace", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fbe3c0', 'fontColor' => '#99b84e' ],
        [ 'font' => "Pouline", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fbe3c0', 'fontColor' => '#fc8c47' ],
        [ 'font' => "Pretender", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ff8a77', 'fontColor' => '#febe96' ],
        [ 'font' => "Rakesly", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ff8a77', 'fontColor' => '#fef5e4' ],
        [ 'font' => "Rennoya", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ff8a77', 'fontColor' => '#dbf0d3' ],
        [ 'font' => "ROLAND", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#dac757', 'fontColor' => '#ffe6f2' ],
        [ 'font' => "Saolice", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#dac757', 'fontColor' => '#ffffb3' ],
        [ 'font' => "SimpalaExtended", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#dac757', 'fontColor' => '#df775a' ],
        [ 'font' => "SingleSleeve", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e1ca42', 'fontColor' => '#436460' ],
        [ 'font' => "StraightlerRegular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#bd6c3e', 'fontColor' => '#f7b1ab' ],
        [ 'font' => "SweetSomeday", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#bd6c3e', 'fontColor' => '#d8c338' ],
        [ 'font' => "Tahu", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fbf4e4', 'fontColor' => '#f2c4c4' ],
        [ 'font' => "Thruster-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fbf4e4', 'fontColor' => '#8eb19c' ],
        [ 'font' => "VirusKiller", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fbf4e4', 'fontColor' => '#d4c058' ],
        [ 'font' => "WallabysJunior", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fbf4e4', 'fontColor' => '#f9c095' ],
        [ 'font' => "ZZYZX", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f0ffeb', 'fontColor' => '#ffa8d5' ],
        [ 'font' => "WhereTheCookies", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f0ffeb', 'fontColor' => '#c3ae0b' ],
        [ 'font' => "WKSimple", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f0ffeb', 'fontColor' => '#86c8f4' ],
        [ 'font' => "Arvo-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f0ffeb', 'fontColor' => '#ff9752' ],
        [ 'font' => "Cinzel-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f29b8f', 'fontColor' => '#fef5e4' ],
        [ 'font' => "Domine-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f29b8f', 'fontColor' => '#da6737' ],
        [ 'font' => "LiberationSerif-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f2e1f7', 'fontColor' => '#223679' ],
        [ 'font' => "Lustria-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f2e1f7', 'fontColor' => '#cda0c6' ],
        [ 'font' => "Mohave-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f2e1f7', 'fontColor' => '#fd9e7e' ],
        [ 'font' => "Montserrat-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f2e1f7', 'fontColor' => '#227a65' ],
        [ 'font' => "NotoSans-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f2e1f7', 'fontColor' => '#8ba4dd' ],
        [ 'font' => "Promesh_Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f09d5e', 'fontColor' => '#fdf4e0' ],
        [ 'font' => "Raleway-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#d4bf42', 'fontColor' => '#70723d' ],
        [ 'font' => "Rubik-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f09d60', 'fontColor' => '#fff' ],
        [ 'font' => "Zaio", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f09d60', 'fontColor' => '#406653' ],
        [ 'font' => "Antonio-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc7a3', 'fontColor' => '#e26b46' ],
        [ 'font' => "Bitter-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc7a3', 'fontColor' => '#3b86c4' ],
        [ 'font' => "COBAISSI", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc7a3', 'fontColor' => '#a5442c' ],
        [ 'font' => "CrimsonText-Roman", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc7a3', 'fontColor' => '#1c4255' ],
    ];

    public $fonts = [
        'Aelten',
        'Alphakind',
        'Bajurie',
        'Banda-Aceh',
        'Bitcrusher',
        'Blue_highway_cd',
        'Bright-Dreams',
        'Chandella',
        'Chinese-Rocks',
        'Cokobi',
        'Colombia',
        'ConcreteWall',
        'Coolvetica',
        'Dakwart',
        'DAGOCA',
        'Dealerplate-California',
        'Dream-Orphans',
        'Elliane-Regular',
        'Engebrechtre',
        'ENGINE',
        'Foo',
        'Gnuolane',
        'Gratise',
        'Groomer',
        'Halmera',
        'HappyGarden',
        'Hellohowareyou',
        'Helsinki',
        'Inter-Regular',
        'Jreeng',
        'Kaylafiz',
        'Kimberley',
        'Leorio',
        'Limejuice',
        'Lovetle',
        'Lynoselt',
        'MatSaleh',
        'MelocheBook',
        'MightyKingdom',
        'Monofonto',
        'MorningMiow',
        'Mounets',
        'NoVirus',
        'Oaklevin',
        'Ontel',
        'Peace',
        'Pouline',
        'Pretender',
        'Rakesly',
        'Rennoya',
        'ROLAND',
        'Saolice',
        'SimpalaExtended',
        'SingleSleeve',
        'StraightlerRegular',
        'SweetSomeday',
        'Tahu',
        'Thruster-Regular',
        'VirusKiller',
        'WallabysJunior',
        'ZZYZX',
        'WhereTheCookies',
        'WKSimple',
        'Arvo-Regular',
        'Cinzel-Regular',
        'Domine-Regular',
        'LiberationSerif-Regular',
        'Lustria-Regular',
        'Mohave-Regular',
        'Montserrat-Regular',
        'NotoSans-Regular',
        'Promesh_Regular',
        'Raleway-Regular',
        'Rubik-Regular',
        'Zaio',
        'Antonio-Regular',
        'Bitter-Regular',
        'COBAISSI',
        'CrimsonText-Roman',
    ];

    public $bgs = [
        '#000',
        '#ead59e',
        '#ee905f',
        '#f49f91',
        '#011528',
        '#c04d9a',
        '#f7f7f7',
        '#e9dcd3',
        '#f4e4d0',
        '#90c9cf',
        '#ffffeb',
        '#4cc1bc',
        '#468bdb',
        '#212331',
        '#f1d265',
        '#efb4d2',
        '#ebdddc',
        '#e4c8c4',
        '#009492',
        '#e3d1cf',
        '#2d2c31',
        '#e8e29e',
        '#f49f91',
        '#e96379',
        '#e8d7f7',
        '#ee725a',
        '#b3d3d8',
        '#27215f',
        '#f69b00',
        '#f6e9d7',
        '#a5abe4',
        '#ffc0ca',
        '#429eda',
        '#f7f8f0',
        '#fffefc',
        '#fff0d9',
        '#ffe1e7',
        '#fbe3c0',
        '#ff8a77',
        '#dac757',
        '#e1ca42',
        '#bd6c3e',
        '#fbf4e4',
        '#f0ffeb',
        '#f29b8f',
        '#f2e1f7',
        '#f09d5e',
        '#d4bf42',
        '#f09d60',
        '#ffc7a3',
    ];

    public $colors = [
        '#fff',
        '#000',
        '#fc9598',
        '#ff8459',
        '#dbba0c',
        '#95c9a8',
        '#425fa6',
        '#a5abe4',
        '#a088f6',
        '#93caaa',
        '#fa8764',
        '#99b84e',
        '#fc8c47',
        '#febe96',
        '#fef5e4',
        '#dbf0d3',
        '#ffe6f2',
        '#ffffb3',
        '#df775a',
        '#436460',
        '#f7b1ab',
        '#d8c338',
        '#f2c4c4',
        '#8eb19c',
        '#d4c058',
        '#f9c095',
        '#ffa8d5',
        '#c3ae0b',
        '#86c8f4',
        '#ff9752',
        '#fef5e4',
        '#da6737',
        '#223679',
        '#cda0c6',
        '#fd9e7e',
        '#227a65',
        '#8ba4dd',
        '#fdf4e0',
        '#70723d',
        '#406653',
        '#e26b46',
        '#3b86c4',
        '#a5442c',
        '#1c4255',
    ];

    public function mount( $type, $quote, $author, $tags, $bgColor, $fontColor, $fontFamily,) 
    {
        // $this->id = $id;
        $this->type = $type;
        $this->quote = $quote;
        $this->author = $author;
        $this->tags = $tags;

        $this->bgColor = $bgColor;
        $this->fontColor = $fontColor;
        $this->fontFamily = $fontFamily;
        $this->fontSize = '2xl';
        $this->fontAlign = 'center';
    }

    public function updated()
    {
        $this->bgColor = $this->bgselect ? $this->bgselect : $this->bgColor;
        $this->fontColor = $this->colorselect ? $this->colorselect : $this->fontColor;
        $this->fontFamily = $this->fontselect ? $this->fontselect : $this->fontFamily;
        $this->fontSize = $this->sizeselect ? $this->sizeselect : $this->fontSize;
    }

    public function changeAlign($align)
    {
        $this->fontAlign = $align;
        switch ($align) {
            case 'left':
                $this->justify = 'start';
                break;
            case 'right':
                $this->justify = 'end';
                break;
            default:
                $this->justify = 'center';
                break;
        }
    }

    public function resetFilters()
    {
        $this->reset([
            'bgColor',
            'fontColor',
            'fontFamily',
        ]);

        $this->bgColor = $this->bgColor;
        $this->fontColor = $this->fontColor;
        $this->fontFamily = $this->fontFamily;
    }

    public function render()
    {
        return view('livewire.frontend.show.index');
    }
}
