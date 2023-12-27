<?php
 
namespace Lwwcas\LaravelCountries\Database\Seeders\Countries;

use Illuminate\Database\Seeder;
use Lwwcas\LaravelCountries\Database\Seeders\Builder;

class WS_Samoa extends Seeder
{
 
    /**
     * Attribute that defines the language of countries
     *
     * @var string
     */
    public $lang = 'en';
 
    /**
     * Attribute that defines the language of countries
     *
     * @var string
     */
    public $region = 'oceania';
 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->name = 'Samoa';
        $this->official_name = 'Independent State of Samoa';
        $this->iso_alpha_2 = 'WS';
        $this->iso_alpha_3 = 'WSM';
        $this->iso_numeric = '882';
        $this->international_phone = '685';
 
        $this->languages = ['sm','en'];
        $this->tld = ['.ws'];
        $this->wmo = 'ZM';
        $this->geoname_id = '4034894';
 
        $this->emoji = [
            'img' => '🇼🇸',
            'uCode' => 'U+1F1FC U+1F1F8',
        ];
        $this->color = [
            'hex' => [
                '#ff0000',
                '#ffffff',
                '#0000ff',
            ],
            'rgb' => [
                '255,0,0',
                '255,255,255',
                '0,0,255',
            ],
        ];
        $this->coordinates = [
            'latitude' => [
                'classic' => '13 35 S',
                'desc' => '-13.668972969055176',
            ],
            'longitude' => [
                'classic' => '172 20 W',
                'desc' => '-172.322021484375',
            ],
        ];
        $this->coordinates_limit = [
            'latitude' => [
                'max' => '-13.433333',
                'min' => '-14.05',
            ],
            'longitude' => [
                'max' => '-171',
                'min' => '-172.816667',
            ],
        ];
 
        $this->geographical = json_decode($this->geographical(), true);
 
        Builder::country($this);
    }
 
    public function geographical()
    {
        return '{"type":"FeatureCollection","features":[{"type":"Feature","properties":{"cca2":"ws"},"geometry":{"type":"MultiPolygon","coordinates":[[[[-171.429749,-14.019724],[-171.441986,-14.057503],[-171.465271,-14.05278],[-171.47998,-14.050556],[-171.516663,-14.047779],[-171.524445,-14.047779],[-171.546112,-14.05028],[-171.588928,-14.052502],[-171.648376,-14.05028],[-171.768097,-14.03583],[-171.911133,-14.0125],[-172.04837,-13.91445],[-172.052826,-13.91056],[-172.056976,-13.906113],[-172.060028,-13.900278],[-172.064758,-13.88194],[-172.064758,-13.87444],[-172.061707,-13.869165],[-172.0578,-13.86472],[-172.030853,-13.84111],[-172.027802,-13.839443],[-171.906708,-13.80667],[-171.883911,-13.805555],[-171.822266,-13.807503],[-171.748077,-13.83167],[-171.619141,-13.87861],[-171.446136,-13.9825],[-171.44223,-13.98639],[-171.431976,-13.99944],[-171.429443,-14.005281],[-171.42865,-14.012779],[-171.429749,-14.019724]]],[[[-172.285858,-13.48639],[-172.222504,-13.563055],[-172.203064,-13.591946],[-172.193359,-13.613335],[-172.168884,-13.677502],[-172.167816,-13.68444],[-172.167816,-13.69139],[-172.210541,-13.80528],[-172.214172,-13.80778],[-172.225037,-13.808889],[-172.251953,-13.807503],[-172.257538,-13.80584],[-172.262268,-13.80195],[-172.393341,-13.79167],[-172.482788,-13.80667],[-172.489197,-13.80695],[-172.508911,-13.80667],[-172.51947,-13.80528],[-172.527222,-13.80389],[-172.532501,-13.800835],[-172.574432,-13.76584],[-172.590027,-13.73972],[-172.691101,-13.62611],[-172.75,-13.575832],[-172.753387,-13.57222],[-172.772827,-13.549999],[-172.779724,-13.53972],[-172.780609,-13.53333],[-172.780304,-13.53],[-172.77948,-13.52722],[-172.775024,-13.519445],[-172.77005,-13.515556],[-172.758087,-13.511112],[-172.753082,-13.509445],[-172.741699,-13.5075],[-172.736115,-13.509445],[-172.728638,-13.51333],[-172.655273,-13.51917],[-172.596497,-13.509113],[-172.551941,-13.49722],[-172.475281,-13.47972],[-172.391113,-13.464169],[-172.36084,-13.460556],[-172.348358,-13.46139],[-172.311401,-13.469168],[-172.304443,-13.47111],[-172.29892,-13.474169],[-172.289734,-13.481943],[-172.285858,-13.48639]]]]}}]}';
    }
}