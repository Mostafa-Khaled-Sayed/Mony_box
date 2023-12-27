<?php
 
namespace Lwwcas\LaravelCountries\Database\Seeders\Countries;

use Illuminate\Database\Seeder;
use Lwwcas\LaravelCountries\Database\Seeders\Builder;

class TV_Tuvalu extends Seeder
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
        $this->name = 'Tuvalu';
        $this->official_name = 'Tuvalu';
        $this->iso_alpha_2 = 'TV';
        $this->iso_alpha_3 = 'TUV';
        $this->iso_numeric = '798';
        $this->international_phone = '688';
 
        $this->languages = ['en'];
        $this->tld = ['.tv'];
        $this->wmo = 'TV';
        $this->geoname_id = '2110297';
 
        $this->emoji = [
            'img' => '🇹🇻',
            'uCode' => 'U+1F1F9 U+1F1FB',
        ];
        $this->color = [
            'hex' => [
                '#76d7ea',
                '#ffff66',
                '#ffffff',
            ],
            'rgb' => [
                '118,215,234',
                '255,255,102',
                '255,255,255',
            ],
        ];
        $this->coordinates = [
            'latitude' => [
                'classic' => '8 00 S',
                'desc' => '-7.471305847167969',
            ],
            'longitude' => [
                'classic' => '178 00 E',
                'desc' => '178.6740264892578',
            ],
        ];
        $this->coordinates_limit = [
            'latitude' => [
                'max' => '-5.65',
                'min' => '-10.75',
            ],
            'longitude' => [
                'max' => '179.883333',
                'min' => '176.116667',
            ],
        ];
 
        $this->geographical = json_decode($this->geographical(), true);
 
        Builder::country($this);
    }
 
    public function geographical()
    {
        return '{"type":"FeatureCollection","features":[{"type":"Feature","properties":{"cca2":"tv"},"geometry":{"type":"MultiPolygon","coordinates":[[[[179.222366,-8.554146],[179.213226,-8.561292],[179.198151,-8.46999],[179.200928,-8.46482],[179.203705,-8.46244],[179.206879,-8.464428],[179.218384,-8.48189],[179.225143,-8.49222],[179.231094,-8.50492],[179.232285,-8.51842],[179.231491,-8.5335],[179.228317,-8.543427],[179.222366,-8.554146]]],[[[178.366913,-8.06278],[178.364136,-8.066666],[178.358002,-8.06611],[178.355804,-8.06139],[178.359955,-8.045],[178.366058,-8.030834],[178.36969,-8.0275],[178.374969,-8.028889],[178.37439,-8.03639],[178.366913,-8.06278]]],[[[178.397766,-8.015278],[178.392761,-8.016666],[178.390259,-8.0125],[178.39151,-8],[178.394135,-7.995555],[178.397766,-7.99278],[178.403046,-7.99139],[178.40802,-7.993333],[178.406921,-8],[178.406647,-8.00361],[178.401642,-8.011946],[178.397766,-8.015278]]],[[[178.700531,-7.48222],[178.695801,-7.48417],[178.690247,-7.48278],[178.687469,-7.47889],[178.686096,-7.47333],[178.687469,-7.468056],[178.690796,-7.464445],[178.700531,-7.468611],[178.702759,-7.47194],[178.703308,-7.47806],[178.700531,-7.48222]]],[[[177.158875,-7.18778],[177.156647,-7.19194],[177.150543,-7.191388],[177.146362,-7.18861],[177.143585,-7.18444],[177.141663,-7.179722],[177.142212,-7.17361],[177.150543,-7.175],[177.158875,-7.18778]]],[[[176.310242,-6.28556],[176.306366,-6.28833],[176.300812,-6.286944],[176.296631,-6.28333],[176.295258,-6.278056],[176.295258,-6.271111],[176.299988,-6.2625],[176.303589,-6.25889],[176.308868,-6.2575],[176.311646,-6.26167],[176.314423,-6.276112],[176.313019,-6.281389],[176.310242,-6.28556]]],[[[177.295807,-6.11389],[177.290253,-6.11444],[177.284698,-6.11333],[177.278046,-6.10639],[177.278046,-6.099444],[177.281372,-6.089444],[177.308868,-6.09889],[177.308014,-6.105],[177.304688,-6.10833],[177.300537,-6.11167],[177.295807,-6.11389]]],[[[176.139709,-5.69056],[176.136383,-5.69389],[176.130249,-5.69333],[176.125244,-5.68444],[176.126617,-5.679167],[176.129395,-5.675],[176.135529,-5.67555],[176.13916,-5.68444],[176.139709,-5.69056]]],[[[176.08136,-5.665277],[176.077454,-5.66806],[176.070526,-5.6675],[176.066376,-5.665277],[176.068573,-5.66056],[176.079407,-5.65778],[176.083588,-5.66056],[176.08136,-5.665277]]]]}}]}';
    }
}
