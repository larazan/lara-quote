@extends('frontend.layout')

@section('content')

<main class="pt-[60px] md:pt-[80px] min-h-screen pt-162 h-full bg-white">

    <div class="max-w-5xl mx-auto">
            
        @include('frontend.components._search')

       

        <div class="px-6 py-2 mb-5 space-y-4">
            <div>

                <div class="py-10  columns-1 md:columns-2 lg:columns-3 ">

                    @foreach($fontFamily as $f)
                    <a class="mb-4 rounded bg-white border group flex flex-col overflow-hidden justify-center shadow-md items-center cursor-zoom-in" href="/">
                        <div class="flex-grow py-2 lg:py-4 md:py-4 px-4">
                            <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.293 16.233c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.743-1.336.234-.46.647-.773.951-1.167.318-.383.752-.638 1.096-.956.337-.333.779-.499 1.13-.733.368-.21.688-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.09.27-.43.08-.887.297-1.397.494-.504.225-1.086.377-1.628.738-.545.345-1.173.634-1.727 1.096-.537.477-1.185.89-1.663 1.496-.522.567-1.038 1.162-1.439 1.84-.464.646-.779 1.355-1.112 2.057-.3.701-.543 1.418-.74 2.115a19.112 19.112 0 0 0-.608 3.859 19.722 19.722 0 0 0 .044 2.766c.024.323.068.636.1.853l.04.266.04-.01a7.125 7.125 0 1 0 6.967-8.616Zm17.417 0c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.742-1.336.235-.46.648-.773.952-1.167.318-.383.752-.638 1.095-.956.338-.333.78-.499 1.131-.733.367-.21.687-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.091.27-.43.08-.887.297-1.396.494-.502.227-1.087.377-1.628.74-.545.345-1.173.633-1.728 1.096-.536.476-1.184.89-1.662 1.494-.523.567-1.039 1.162-1.44 1.84-.463.646-.778 1.355-1.11 2.057a17.313 17.313 0 0 0-.742 2.115 19.108 19.108 0 0 0-.608 3.859 19.713 19.713 0 0 0 .044 2.766c.024.323.069.636.1.853l.04.266.041-.01a7.126 7.126 0 1 0 6.967-8.616Z" fill="#FF6D42"></path>
                            </svg>
                            <p 
                                class="leading-tight md:leading-snug text-black text-center text-base md:text-xl  font-medium group-hover:text-sky-700 transition"
                                style="font-family: {{ $f }} "
                            >
                                {{ $quote->words }}
                            </p>
                            <div class=" px-2 py-4 flex justify-between">
                                <div>
                                  <span>{{ $f }}</span>
                                </div>
                                <button class=" flex justify-between space-x-6 md:space-x-2">
                                    <div class="flex space-x-2 ">
                                        <span class="flex items-center justify-center text-sm text-[#171717BF] font-semibold">
                                            {{ $author }}
                                        </span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </a>
                    @endforeach

                </div>

            </div>


        </div>
    </div>

    @include('frontend.components._subscribe_form')

</main>

@endsection

@push('style')

<style>
    @font-face {
    font-family: 'Mont-Regular';
    src: local('Mont-Regular'), url(../../fonts/Mont-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Mont-Bold';
    src: local('Mont-Bold'), url(../../fonts/Mont-Bold.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Mont-Heavy';
    src: local('Mont-Heavy'), url(../../fonts/Mont-Heavy.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Aelten';
    src: local('Aelten'), url(../../fonts/Aelten.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Alphakind';
    src: local('Alphakind'), url(../../fonts/Alphakind.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Amellis';
    src: url(../../fonts/Amellis-Path.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Mollusca';
    src: local('Mollusca'), url(../../fonts/Baby-Mollusca.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Bajurie';
    src: local('Bajurie'), url(../../fonts/Bajurie.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Banda-Aceh';
    src: local('Banda-Aceh'), url(../../fonts/Banda-Aceh.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Barokah';
    src: local('Barokah'), url(../../fonts/Barokah.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Bitcrusher';
    src: local('Bitcrusher'), url(../../fonts/Bitcrusher.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Blue_highway_cd';
    src: local('Blue_highway_cd'), url(../../fonts/Blue_highway_cd.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Borg';
    src: local('Borg'), url(../../fonts/Borg.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Bright-Dreams';
    src: local('Bright-Dreams'), url(../../fonts/Bright-Dreams.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Browie';
    src: local('Browie'), url(../../fonts/Browie.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Chandella';
    src: local('Chandella'), url(../../fonts/Chandella.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Chinese-Rocks';
    src: local('Chinese-Rocks'), url(../../fonts/Chinese-Rocks.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Cokobi';
    src: local('Cokobi'), url(../../fonts/Cokobi.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Colombia';
    src: local('Colombia'), url(../../fonts/Colombia.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'ConcreteWall';
    src: local('ConcreteWall'), url(../../fonts/ConcreteWall.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Coolvetica';
    src: local('Coolvetica'), url(../../fonts/Coolvetica.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Dakwart';
    src: local('Dakwart'), url(../../fonts/Dakwart.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'DAGOCA';
    src: local('DAGOCA'), url(../../fonts/DAGOCA.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Dealerplate-California';
    src: local('Dealerplate-California'), url(../../fonts/Dealerplate-California.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Dream-Orphans';
    src: local('Dream-Orphans'), url(../../fonts/Dream-Orphans.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Elliane-Regular';
    src: local('Elliane-Regular'), url(../../fonts/Elliane-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Engebrechtre';
    src: local('Engebrechtre'), url(../../fonts/Engebrechtre.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'ENGINE';
    src: local('ENGINE'), url(../../fonts/ENGINE.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Foo';
    src: local('Foo'), url(../../fonts/Foo.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Gnuolane';
    src: local('Gnuolane'), url(../../fonts/Gnuolane.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Gratise';
    src: local('Gratise'), url(../../fonts/Gratise.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Groomer';
    src: local('Groomer'), url(../../fonts/Groomer.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Halmera';
    src: local('Halmera'), url(../../fonts/Halmera.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'HappyGarden';
    src: local('HappyGarden'), url(../../fonts/HappyGarden.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Hellohowareyou';
    src: local('Hellohowareyou'), url(../../fonts/Hellohowareyou.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Helsinki';
    src: local('Helsinki'), url(../../fonts/Helsinki.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Inter-Regular';
    src: local('Inter-Regular'), url(../../fonts/Inter-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Jreeng';
    src: local('Jreeng'), url(../../fonts/Jreeng.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'JustSmile';
    src: local('JustSmile'), url(../../fonts/JustSmile.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Kaylafiz';
    src: local('Kaylafiz'), url(../../fonts/Kaylafiz.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Kimberley';
    src: local('Kimberley'), url(../../fonts/Kimberley.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'LazySunday';
    src: local('LazySunday'), url(../../fonts/LazySunday.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Leorio';
    src: local('Leorio'), url(../../fonts/Leorio.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Limejuice';
    src: local('Limejuice'), url(../../fonts/Limejuice.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Lovetle';
    src: local('Lovetle'), url(../../fonts/Lovetle.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Lynoselt';
    src: local('Lynoselt'), url(../../fonts/Lynoselt.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'MatSaleh';
    src: local('MatSaleh'), url(../../fonts/MatSaleh.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'MelocheBook';
    src: local('MelocheBook'), url(../../fonts/MelocheBook.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'MightyKingdom';
    src: local('MightyKingdom'), url(../../fonts/MightyKingdom.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Monofonto';
    src: local('Monofonto'), url(../../fonts/Monofonto.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Morganite-Light';
    src: local('Morganite-Light'), url(../../fonts/Morganite-Light.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'MorningMiow';
    src: local('MorningMiow'), url(../../fonts/MorningMiow.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Mounets';
    src: local('Mounets'), url(../../fonts/Mounets.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'NoVirus';
    src: local('NoVirus'), url(../../fonts/NoVirus.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'NugoSansLight';
    src: local('NugoSansLight'), url(../../fonts/NugoSansLight.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Oaklevin';
    src: local('Oaklevin'), url(../../fonts/Oaklevin.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Ontel';
    src: local('Ontel'), url(../../fonts/Ontel.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Peace';
    src: local('Peace'), url(../../fonts/Peace.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'PeachyRose';
    src: local('PeachyRose'), url(../../fonts/PeachyRose.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Pouline';
    src: local('Pouline'), url(../../fonts/Pouline.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Pretender';
    src: local('Pretender'), url(../../fonts/Pretender.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'QuickCount';
    src: local('QuickCount'), url(../../fonts/QuickCount.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Rakesly';
    src: local('Rakesly'), url(../../fonts/Rakesly.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Rennoya';
    src: local('Rennoya'), url(../../fonts/Rennoya.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'ROLAND';
    src: local('ROLAND'), url(../../fonts/ROLAND.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Saolice';
    src: local('Saolice'), url(../../fonts/Saolice.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'SimpalaExtended';
    src: local('SimpalaExtended'), url(../../fonts/SimpalaExtended.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'SingleSleeve';
    src: local('SingleSleeve'), url(../../fonts/SingleSleeve.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'StraightlerRegular';
    src: local('StraightlerRegular'), url(../../fonts/StraightlerRegular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'SweetSomeday';
    src: local('SweetSomeday'), url(../../fonts/SweetSomeday.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Tahu';
    src: local('Tahu'), url(../../fonts/Tahu.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Thruster-Regular';
    src: local('Thruster-Regular'), url(../../fonts/Thruster-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'VirusKiller';
    src: local('VirusKiller'), url(../../fonts/VirusKiller.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'WallabysJunior';
    src: local('WallabysJunior'), url(../../fonts/WallabysJunior.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'WanitaCantik';
    src: local('WanitaCantik'), url(../../fonts/WanitaCantik.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'ZZYZX';
    src: local('ZZYZX'), url(../../fonts/ZZYZX.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'WhereTheCookies';
    src: local('WhereTheCookies'), url(../../fonts/WhereTheCookies.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'WKSimple';
    src: local('WKSimple'), url(../../fonts/WKSimple.ttf) format('truetype');
  }
  
  
  @font-face {
    font-family: 'Arvo-Regular';
    src: local('Arvo-Regular'), url(../../fonts/Arvo-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Cinzel-Regular';
    src: local('Cinzel-Regular'), url(../../fonts/Cinzel-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Domine-Regular';
    src: local('Domine-Regular'), url(../../fonts/Domine-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'LiberationSerif-Regular';
    src: local('LiberationSerif-Regular'), url(../../fonts/LiberationSerif-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Lustria-Regular';
    src: local('Lustria-Regular'), url(../../fonts/Lustria-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Mohave-Regular';
    src: local('Mohave-Regular'), url(../../fonts/Mohave-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Montserrat-Regular';
    src: local('Montserrat-Regular'), url(../../fonts/Montserrat-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'NotoSans-Regular';
    src: local('NotoSans-Regular'), url(../../fonts/NotoSans-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Promesh_Regular';
    src: local('Promesh_Regular'), url(../../fonts/Promesh_Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Raleway-Regular';
    src: local('Raleway-Regular'), url(../../fonts/Raleway-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Rubik-Regular';
    src: local('Rubik-Regular'), url(../../fonts/Rubik-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Zaio';
    src: local('Zaio'), url(../../fonts/Zaio.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Antonio-Regular';
    src: local('Antonio-Regular'), url(../../fonts/Antonio-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'Bitter-Regular';
    src: local('Bitter-Regular'), url(../../fonts/Bitter-Regular.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'CrimsonText-Roman';
    src: local('CrimsonText-Roman'), url(../../fonts/CrimsonText-Roman.ttf) format('truetype');
  }
  
  @font-face {
    font-family: 'COBAISSI';
    src: local('COBAISSI'), url(../../fonts/COBAISSI.ttf) format('truetype');
  }
  
</style>
@endpush