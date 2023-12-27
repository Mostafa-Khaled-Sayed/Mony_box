<?php
 
namespace Lwwcas\LaravelCountries\Database\Seeders\Countries;

use Illuminate\Database\Seeder;
use Lwwcas\LaravelCountries\Database\Seeders\Builder;

class PA_Panama extends Seeder
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
    public $region = 'americas';
 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->name = 'Panama';
        $this->official_name = 'Republic of Panama';
        $this->iso_alpha_2 = 'PA';
        $this->iso_alpha_3 = 'PAN';
        $this->iso_numeric = '591';
        $this->international_phone = '507';
 
        $this->languages = ['es'];
        $this->tld = ['.pa'];
        $this->wmo = 'PM';
        $this->geoname_id = '3703430';
 
        $this->emoji = [
            'img' => '🇵🇦',
            'uCode' => 'U+1F1F5 U+1F1E6',
        ];
        $this->color = [
            'hex' => [
                '#0000ff',
                '#ffffff',
                '#ff0000',
            ],
            'rgb' => [
                '0,0,255',
                '255,255,255',
                '255,0,0',
            ],
        ];
        $this->coordinates = [
            'latitude' => [
                'classic' => '9 00 N',
                'desc' => '8.646247863769531',
            ],
            'longitude' => [
                'classic' => '80 00 W',
                'desc' => '-80.50607299804688',
            ],
        ];
        $this->coordinates_limit = [
            'latitude' => [
                'max' => '9.65',
                'min' => '7.213333',
            ],
            'longitude' => [
                'max' => '-77.283333',
                'min' => '-82.95',
            ],
        ];
 
        $this->geographical = json_decode($this->geographical(), true);
 
        Builder::country($this);
    }
 
    public function geographical()
    {
        return '{"type":"FeatureCollection","features":[{"type":"Feature","properties":{"cca2":"pa"},"geometry":{"type":"MultiPolygon","coordinates":[[[[-81.77862,7.2763880000001],[-81.79445,7.225555],[-81.797501,7.2258330000001],[-81.80112,7.22944],[-81.805557,7.23861],[-81.818619,7.27],[-81.819168,7.272499],[-81.819168,7.286944],[-81.818619,7.29],[-81.81612,7.291111],[-81.81361,7.291111],[-81.78778,7.285277],[-81.77862,7.2763880000001]]],[[[-81.205841,7.486666],[-81.243622,7.480833],[-81.245834,7.48167],[-81.2489,7.48555],[-81.24972,7.48833],[-81.24806,7.493333],[-81.24335,7.4991660000001],[-81.22307,7.51667],[-81.21695,7.52083],[-81.13583,7.563333],[-81.09611,7.5786100000001],[-81.093613,7.579166],[-81.086945,7.578888],[-81.03973,7.575],[-81.036957,7.57417],[-81.033615,7.570833],[-81.045837,7.5486110000001],[-81.047501,7.5466660000001],[-81.05084,7.543056],[-81.06612,7.5344440000001],[-81.205841,7.486666]]],[[[-81.649445,7.384166],[-81.636124,7.3838880000001],[-81.63223,7.387221],[-81.631958,7.3902770000001],[-81.63028,7.391944],[-81.627502,7.3925],[-81.622223,7.3908330000001],[-81.608337,7.3775],[-81.59807,7.3636100000001],[-81.589737,7.334444],[-81.58917,7.331666],[-81.59084,7.3266660000001],[-81.62472,7.31861],[-81.6339,7.3180550000001],[-81.650558,7.321944],[-81.74445,7.345833],[-81.751114,7.34972],[-81.76222,7.358889],[-81.843338,7.4291660000001],[-81.84889,7.437222],[-81.85335,7.446666],[-81.87418,7.49111],[-81.87695,7.504167],[-81.8739,7.5149990000001],[-81.758621,7.634166],[-81.73891,7.6391630000001],[-81.72362,7.616944],[-81.71028,7.555555],[-81.70113,7.4938890000001],[-81.707779,7.486666],[-81.710556,7.479166],[-81.71584,7.45167],[-81.715286,7.441944],[-81.71362,7.436666],[-81.680557,7.389999],[-81.676392,7.387221],[-81.649445,7.384166]]],[[[-81.103897,7.71778],[-81.10779,7.714722],[-81.11,7.71528],[-81.12167,7.72111],[-81.14111,7.732778],[-81.14473,7.735833],[-81.14917,7.741666],[-81.129181,7.7575],[-81.12695,7.75889],[-81.124176,7.75889],[-81.10556,7.745],[-81.103058,7.740555],[-81.101395,7.7319440000001],[-81.10112,7.725277],[-81.103897,7.71778]]],[[[-81.16528,7.82278],[-81.16917,7.816388],[-81.17361,7.818055],[-81.17445,7.82361],[-81.16779,7.838055],[-81.16446,7.84139],[-81.16139,7.84167],[-81.160568,7.838888],[-81.16223,7.83028],[-81.16528,7.82278]]],[[[-82.340561,8.0875],[-82.36195,8.086943],[-82.364731,8.087221],[-82.366394,8.0888880000001],[-82.36612,8.091389],[-82.343903,8.12611],[-82.339447,8.128332],[-82.31973,8.136665],[-82.3175,8.135555],[-82.31612,8.133333],[-82.31612,8.128887],[-82.320007,8.099165],[-82.32751,8.091389],[-82.337784,8.0880550000001],[-82.340561,8.0875]]],[[[-82.21335,8.1974980000001],[-82.26167,8.1888890000001],[-82.27806,8.1899990000001],[-82.29529,8.193609],[-82.30057,8.19528],[-82.30389,8.19861],[-82.313904,8.21278],[-82.31334,8.218887],[-82.3114,8.22055],[-82.308624,8.221388],[-82.28389,8.227777],[-82.27806,8.228054],[-82.274445,8.226944],[-82.260559,8.224722],[-82.23222,8.214998],[-82.21362,8.20611],[-82.210007,8.202776],[-82.20946,8.200554],[-82.21085,8.198332],[-82.21335,8.1974980000001]]],[[[-77.98695,8.242222],[-77.98834,8.24],[-78.002792,8.246666],[-78.003891,8.248888],[-78.003067,8.25111],[-77.99806,8.251665],[-77.99223,8.25055],[-77.98834,8.24722],[-77.98695,8.242222]]],[[[-82.3325,8.23361],[-82.38806,8.207222],[-82.401672,8.224443],[-82.403625,8.25305],[-82.37001,8.28167],[-82.36584,8.284443],[-82.363617,8.285276],[-82.3389,8.2925],[-82.336121,8.2925],[-82.333618,8.291388],[-82.329727,8.28861],[-82.31612,8.2763880000001],[-82.31418,8.271666],[-82.31418,8.268888],[-82.3325,8.23361]]],[[[-79.10695,8.201111],[-79.110001,8.2008320000001],[-79.124725,8.231388],[-79.118896,8.28611],[-79.11584,8.29305],[-79.108902,8.30361],[-79.10529,8.306944],[-79.097504,8.309166],[-79.095001,8.308887],[-79.091125,8.305832],[-79.076675,8.285276],[-79.058334,8.255833],[-79.05585,8.251389],[-79.05695,8.24972],[-79.10335,8.2041660000001],[-79.10695,8.201111]]],[[[-79.0764,8.36972],[-79.07861,8.36833],[-79.117233,8.391388],[-79.118622,8.39361],[-79.11945,8.39944],[-79.11806,8.41166],[-79.114456,8.415277],[-79.10834,8.4194430000001],[-79.10556,8.419998],[-79.07806,8.409721],[-79.07584,8.408609],[-79.075012,8.40611],[-79.07223,8.3863890000001],[-79.07223,8.3830550000001],[-79.07417,8.374443],[-79.0764,8.36972]]],[[[-78.851395,8.28861],[-78.92223,8.2705550000001],[-78.95723,8.2908330000001],[-78.95917,8.292221],[-78.96194,8.29639],[-78.963348,8.433054],[-78.962234,8.442221],[-78.96028,8.4472220000001],[-78.95612,8.449999],[-78.95084,8.45167],[-78.883621,8.4638880000001],[-78.87167,8.456944],[-78.85612,8.441111],[-78.85001,8.43361],[-78.83195,8.402222],[-78.831116,8.4],[-78.829727,8.3883320000001],[-78.83029,8.3361110000001],[-78.834732,8.319721],[-78.843338,8.294443],[-78.84639,8.29055],[-78.851395,8.28861]]],[[[-82.01501,9.12639],[-82.02,9.124722],[-82.023056,9.12528],[-82.02751,9.127499],[-82.04167,9.137777],[-82.04918,9.144165],[-82.051117,9.149166],[-82.051117,9.155277],[-82.04723,9.1741660000001],[-82.04584,9.17639],[-82.043335,9.1775000000001],[-82.04056,9.176943],[-82.02473,9.165],[-82.023056,9.163055],[-82.01056,9.147778],[-82.004456,9.139999],[-82.005,9.1375],[-82.01501,9.12639]]],[[[-82.224457,9.335],[-82.22612,9.33417],[-82.22862,9.335],[-82.229446,9.3375],[-82.229446,9.343611],[-82.22639,9.350832],[-82.22473,9.3525],[-82.222504,9.35111],[-82.222549,9.349541],[-82.22195,9.3463880000001],[-82.22362,9.337776],[-82.224457,9.335]]],[[[-82.079178,9.284443],[-82.124451,9.271944],[-82.20668,9.338333],[-82.208344,9.343611],[-82.20639,9.348331],[-82.204453,9.35],[-82.200287,9.352777],[-82.19751,9.353611],[-82.194458,9.353333],[-82.1925,9.351665],[-82.192047,9.349541],[-82.16446,9.34111],[-82.13417,9.328609],[-82.091675,9.309444],[-82.08639,9.304722],[-82.07584,9.287498],[-82.077225,9.2850000000001],[-82.079178,9.284443]]],[[[-82.23918,9.3302760000001],[-82.245285,9.33],[-82.24918,9.3327770000001],[-82.32223,9.4036100000001],[-82.32501,9.407776],[-82.314453,9.42472],[-82.28195,9.435276],[-82.27139,9.435276],[-82.26529,9.43444],[-82.26445,9.43361],[-82.258347,9.429165],[-82.25528,9.425278],[-82.232788,9.388887],[-82.229446,9.381943],[-82.22835,9.376665],[-82.22835,9.36972],[-82.235001,9.333055],[-82.23918,9.3302760000001]]],[[[-79.46306,9.5680540000001],[-79.247787,9.54],[-79.162231,9.5405540000001],[-79.07585,9.54222],[-79.05362,9.545277],[-79.035278,9.547499],[-78.99501,9.547777],[-78.962234,9.543888],[-78.95946,9.54333],[-78.95862,9.5405540000001],[-78.960007,9.538055],[-78.963058,9.534443],[-78.96529,9.533054],[-78.98862,9.521944],[-78.99474,9.5213870000001],[-79.004456,9.522221],[-79.02501,9.522221],[-79.044174,9.5175],[-79.0614,9.5],[-79.06612,9.49444],[-79.06807,9.4894430000001],[-79.0675,9.46361],[-79.066956,9.460833],[-79.058899,9.431665],[-79.05724,9.429998],[-79.052505,9.4275],[-79.04945,9.426943],[-79.007782,9.423332],[-79.005,9.423332],[-78.70361,9.431944],[-78.554733,9.429165],[-78.54945,9.4275],[-78.499176,9.404165],[-78.45195,9.381388],[-78.41223,9.35833],[-78.36667,9.3352780000001],[-78.23584,9.286665],[-78.152237,9.2597220000001],[-78.03862,9.230833],[-78.035568,9.23],[-78.03168,9.22722],[-77.94417,9.1430550000001],[-77.882965,9.096295],[-77.84889,9.083611],[-77.80695,9.049444],[-77.80334,9.045832],[-77.747787,8.976944],[-77.74667,8.975],[-77.738068,8.9541660000001],[-77.746399,8.9488890000001],[-77.7489,8.94444],[-77.74834,8.941387],[-77.746399,8.936666],[-77.70473,8.8791660000001],[-77.70306,8.87694],[-77.701401,8.875277],[-77.658066,8.84],[-77.643616,8.83],[-77.631668,8.830555],[-77.631668,8.837221],[-77.630569,8.839443],[-77.62834,8.840832],[-77.625,8.840832],[-77.622513,8.839722],[-77.54279,8.763611],[-77.53723,8.72],[-77.539169,8.714998],[-77.536957,8.710554],[-77.53445,8.707222],[-77.5314,8.70333],[-77.52444,8.696665],[-77.51083,8.68611],[-77.49362,8.675278],[-77.48584,8.672777],[-77.44585,8.660831],[-77.4375,8.658609],[-77.42723,8.658333],[-77.377228,8.6638870000001],[-77.374725,8.66416],[-77.37112,8.6675],[-77.36667,8.674999],[-77.37195,8.6461110000001],[-77.43861,8.566666],[-77.450562,8.558611],[-77.4539,8.555277],[-77.472229,8.532221],[-77.47528,8.525],[-77.47778,8.51361],[-77.480011,8.4916650000001],[-77.47835,8.479721],[-77.474731,8.4697210000001],[-77.47139,8.46611],[-77.468903,8.464998],[-77.465561,8.464998],[-77.45917,8.465555],[-77.450562,8.470833],[-77.44334,8.47361],[-77.43028,8.474443],[-77.42445,8.4730550000001],[-77.418335,8.468887],[-77.41362,8.463333],[-77.406677,8.453054],[-77.4014,8.444443],[-77.376114,8.400833],[-77.3739,8.396387],[-77.368622,8.364166],[-77.36806,8.33722],[-77.365005,8.29278],[-77.36389,8.286943],[-77.36195,8.2822210000001],[-77.35918,8.278055],[-77.34889,8.267776],[-77.29611,8.215832],[-77.275558,8.201944],[-77.27167,8.19528],[-77.243896,8.1452770000001],[-77.216675,8.093332],[-77.214172,8.082499],[-77.19833,7.99944],[-77.21556,7.937222],[-77.285,7.910832],[-77.294174,7.906388],[-77.29834,7.90361],[-77.30334,7.898611],[-77.3114,7.88694],[-77.37195,7.786111],[-77.37195,7.78],[-77.36806,7.773889],[-77.343903,7.743055],[-77.335007,7.734444],[-77.332306,7.733306],[-77.32806,7.7277770000001],[-77.32584,7.723332],[-77.324722,7.720833],[-77.324722,7.7175],[-77.32613,7.709167],[-77.32861,7.7047210000001],[-77.333344,7.698889],[-77.56946,7.52778],[-77.5739,7.525277],[-77.577225,7.525],[-77.58917,7.526667],[-77.593338,7.52944],[-77.59668,7.53305],[-77.603058,7.5425],[-77.60751,7.551944],[-77.610291,7.562499],[-77.624176,7.603333],[-77.662231,7.677777],[-77.66556,7.68111],[-77.732788,7.723611],[-77.74167,7.7241660000001],[-77.74667,7.722221],[-77.755,7.71],[-77.758896,7.6930550000001],[-77.759445,7.66722],[-77.759445,7.638055],[-77.758896,7.628611],[-77.756393,7.6172220000001],[-77.75279,7.60722],[-77.73639,7.579166],[-77.730835,7.570833],[-77.72751,7.567222],[-77.72278,7.558332],[-77.72029,7.548055],[-77.719727,7.54139],[-77.72084,7.53222],[-77.72307,7.524166],[-77.72473,7.518888],[-77.729172,7.5097220000001],[-77.733337,7.503611],[-77.74167,7.49139],[-77.74667,7.485833],[-77.750565,7.482778],[-77.77112,7.4761100000001],[-77.78029,7.47472],[-77.798889,7.4761100000001],[-77.80945,7.478611],[-77.810837,7.48],[-77.889725,7.228889],[-77.89389,7.229166],[-77.90834,7.231667],[-77.91528,7.2358330000001],[-78.008621,7.33111],[-78.16251,7.508055],[-78.16862,7.53972],[-78.16695,7.544722],[-78.16528,7.56555],[-78.16667,7.57111],[-78.23473,7.6461110000001],[-78.2814,7.707222],[-78.2764,7.7125],[-78.27362,7.720277],[-78.273056,7.726666],[-78.275558,7.737778],[-78.34418,7.866944],[-78.35918,7.8797220000001],[-78.363617,7.88194],[-78.37556,7.89083],[-78.38583,7.901667],[-78.38972,7.908055],[-78.410004,7.959167],[-78.41389,7.969166],[-78.43251,8.045832],[-78.43306,8.051943],[-78.431122,8.067221],[-78.42778,8.07778],[-78.42445,8.085],[-78.420288,8.09111],[-78.413071,8.097776],[-78.4064,8.101387],[-78.40334,8.1008320000001],[-78.4014,8.09944],[-78.40085,8.096388],[-78.400284,8.07361],[-78.40224,8.068054],[-78.40056,8.066111],[-78.377228,8.061388],[-78.371399,8.060276],[-78.3264,8.057777],[-78.31473,8.05972],[-78.29861,8.0675],[-78.290558,8.0730550000001],[-78.25723,8.10194],[-78.238617,8.138332],[-78.23695,8.14389],[-78.235001,8.155832],[-78.238068,8.17639],[-78.24084,8.183611],[-78.243896,8.1874980000001],[-78.26556,8.207222],[-78.279175,8.214722],[-78.285004,8.219166],[-78.30307,8.245554],[-78.30278,8.249166],[-78.301392,8.25111],[-78.29834,8.25305],[-78.262222,8.269444],[-78.183334,8.3261110000001],[-78.18251,8.328609],[-78.150284,8.394444],[-78.143616,8.40167],[-78.13917,8.403889],[-78.133621,8.403055],[-78.12834,8.397778],[-78.04501,8.31111],[-78.03112,8.271012],[-78.025864,8.251736],[-77.99519,8.232459],[-77.96715,8.234211],[-77.96146,8.24604],[-77.8925,8.233889],[-77.88501,8.2308330000001],[-77.876678,8.2252770000001],[-77.84084,8.1955550000001],[-77.80695,8.159166],[-77.78528,8.130278],[-77.779175,8.154999],[-77.868896,8.234999],[-77.889175,8.24611],[-77.91217,8.25222],[-77.983337,8.266666],[-78.003067,8.2675],[-78.01083,8.2705550000001],[-78.01611,8.275276],[-78.045288,8.3386100000001],[-78.10751,8.455832],[-78.12056,8.439165],[-78.218613,8.3797210000001],[-78.23334,8.3774990000001],[-78.23834,8.3797210000001],[-78.24695,8.3849980000001],[-78.2489,8.3863890000001],[-78.255,8.3941650000001],[-78.25667,8.39944],[-78.25473,8.407776],[-78.359451,8.394444],[-78.38,8.33833],[-78.38417,8.335833],[-78.387512,8.3361110000001],[-78.39778,8.34587],[-78.411957,8.3430540000001],[-78.414169,8.34417],[-78.49223,8.449999],[-78.493057,8.455832],[-78.49139,8.483332],[-78.489456,8.492222],[-78.48556,8.501944],[-78.485291,8.505278],[-78.50723,8.6169430000001],[-78.538345,8.63694],[-78.564728,8.652222],[-78.60362,8.66222],[-78.60667,8.662777],[-78.608612,8.66416],[-78.6575,8.700277],[-78.70973,8.74667],[-78.742233,8.791666],[-78.89723,8.906944],[-78.907501,8.913887],[-78.91223,8.916111],[-79.00973,8.960833],[-79.02,8.964443],[-79.025848,8.9655550000001],[-79.038071,8.96417],[-79.05307,8.966665],[-79.06235,9.001554],[-79.068344,9.005888],[-79.071342,9.009055],[-79.072174,9.014221],[-79.067673,9.052888],[-79.03778,9.1086100000001],[-79.02501,9.109165],[-79.0164,9.1111110000001],[-79.0139,9.1119440000001],[-78.98279,9.132221],[-78.978058,9.138054],[-78.97696,9.141109],[-78.97862,9.1427760000001],[-79.00667,9.135832],[-79.039734,9.125832],[-79.108902,9.085],[-79.12357,9.05744],[-79.12024,9.05461],[-79.116898,9.04961],[-79.11656,9.04794],[-79.116898,9.035777],[-79.117233,9.031943],[-79.118233,9.028944],[-79.120064,9.026443],[-79.12857,9.0162760000001],[-79.13174,9.0132770000001],[-79.13507,9.01228],[-79.138733,9.01228],[-79.218903,9.003054],[-79.238068,9.00861],[-79.25557,9.015554],[-79.2614,9.016666],[-79.2814,9.018055],[-79.36584,9.0161090000001],[-79.390289,9.013611],[-79.433899,9.008055],[-79.47557,8.99861],[-79.48029,8.99611],[-79.52139,8.961943],[-79.52389,8.957499],[-79.531403,8.933332],[-79.526947,8.923887],[-79.523056,8.9177760000001],[-79.52501,8.903889],[-79.57613,8.880278],[-79.579178,8.879721],[-79.63945,8.873888],[-79.697784,8.86666],[-79.73584,8.834999],[-79.738892,8.831388],[-79.75723,8.7977770000001],[-79.75917,8.7925000000001],[-79.76028,8.7833330000001],[-79.76056,8.770277],[-79.75639,8.750832],[-79.75111,8.73222],[-79.748337,8.7280540000001],[-79.739731,8.722776],[-79.73695,8.71889],[-79.73695,8.71583],[-79.739731,8.704721],[-79.781113,8.6058330000001],[-79.952789,8.450832],[-80.016113,8.407499],[-80.02649,8.401541],[-80.07056,8.3830550000001],[-80.099457,8.367498],[-80.13528,8.341389],[-80.14195,8.3375],[-80.22446,8.295832],[-80.22696,8.294722],[-80.33694,8.287498],[-80.36974,8.28861],[-80.375,8.289999],[-80.376404,8.292221],[-80.37668,8.294443],[-80.389725,8.29028],[-80.42334,8.265833],[-80.42529,8.2638870000001],[-80.468903,8.21833],[-80.47362,8.21278],[-80.4789,8.196943],[-80.48222,8.1552770000001],[-80.48195,8.1488880000001],[-80.475281,8.090555],[-80.481125,8.0847210000001],[-80.48167,8.081665],[-80.449722,8.031387],[-80.4425,8.02111],[-80.43861,8.018055],[-80.40334,8.004999],[-80.3925,8.001665],[-80.38209,7.998969],[-80.37807,7.9988880000001],[-80.356674,7.995832],[-80.3539,7.9950000000001],[-80.350281,7.991944],[-80.34611,7.985555],[-80.32584,7.9511110000001],[-80.31723,7.9158330000001],[-80.158615,7.755555],[-80.060287,7.643888],[-79.991119,7.521667],[-79.989731,7.51611],[-79.99556,7.478055],[-79.99695,7.4725],[-80.00334,7.464999],[-80.01334,7.45805],[-80.024734,7.45167],[-80.09584,7.430277],[-80.16223,7.412222],[-80.215012,7.41694],[-80.23695,7.420833],[-80.243057,7.421944],[-80.25029,7.428611],[-80.254456,7.431389],[-80.256958,7.4319440000001],[-80.281403,7.430277],[-80.30833,7.416389],[-80.3564,7.38361],[-80.36223,7.37583],[-80.36473,7.3677770000001],[-80.365005,7.364444],[-80.37584,7.309722],[-80.429169,7.247222],[-80.433334,7.2444440000001],[-80.4425,7.243333],[-80.593903,7.236388],[-80.63415,7.23492],[-80.63695,7.231388],[-80.64973,7.227221],[-80.68333,7.216389],[-80.7139,7.209167],[-80.798065,7.206111],[-80.85112,7.210278],[-80.88251,7.22028],[-80.925293,7.25],[-80.929169,7.253333],[-80.93085,7.258333],[-80.913895,7.316111],[-80.908066,7.320277],[-80.89473,7.324166],[-80.88751,7.330555],[-80.88501,7.335],[-80.88612,7.3475000000001],[-80.912506,7.444166],[-80.948624,7.55778],[-80.97584,7.604722],[-80.98029,7.611111],[-80.98695,7.6180550000001],[-81.005844,7.633611],[-81.015839,7.64139],[-81.03723,7.67667],[-81.054733,7.74722],[-81.05751,7.828888],[-81.05806,7.87333],[-81.12834,7.839722],[-81.152817,7.8505710000001],[-81.17886,7.85499],[-81.17591,7.842216],[-81.18132,7.825016],[-81.18034,7.815187],[-81.17168,7.800833],[-81.19223,7.691388],[-81.19112,7.6461110000001],[-81.19112,7.63917],[-81.19196,7.636389],[-81.19446,7.63194],[-81.212234,7.611944],[-81.21779,7.60722],[-81.22084,7.606944],[-81.271118,7.629722],[-81.312225,7.649444],[-81.35806,7.665555],[-81.36111,7.66639],[-81.43028,7.6830550000001],[-81.49695,7.69861],[-81.57223,7.75722],[-81.58778,7.792222],[-81.590012,7.80028],[-81.600006,7.8705550000001],[-81.60861,7.940277],[-81.61473,7.968888],[-81.618622,7.97667],[-81.62178,7.9775240000001],[-81.631958,7.969999],[-81.65112,7.980277],[-81.68224,8.01861],[-81.70668,8.06528],[-81.679733,8.062498],[-81.677231,8.062777],[-81.675,8.0675],[-81.698624,8.11611],[-81.70361,8.124998],[-81.73862,8.162498],[-81.95251,8.18861],[-82.09529,8.214722],[-82.142227,8.18111],[-82.191956,8.19444],[-82.194458,8.1955550000001],[-82.2139,8.213888],[-82.2164,8.21833],[-82.216675,8.221388],[-82.21806,8.272499],[-82.24695,8.29278],[-82.287231,8.3133320000001],[-82.345001,8.3049980000001],[-82.37862,8.29055],[-82.40306,8.285276],[-82.405838,8.284721],[-82.46945,8.274721],[-82.493057,8.271387],[-82.502792,8.270832],[-82.50835,8.2722210000001],[-82.527237,8.280832],[-82.55612,8.289999],[-82.61195,8.306944],[-82.65861,8.318333],[-82.67445,8.32],[-82.72168,8.317221],[-82.77945,8.30278],[-82.80751,8.29305],[-82.83139,8.2822210000001],[-82.84029,8.277222],[-82.847778,8.270832],[-82.85196,8.264721],[-82.86974,8.2300000000001],[-82.872787,8.2194440000001],[-82.87529,8.1908320000001],[-82.875,8.18083],[-82.86835,8.109165],[-82.865005,8.10222],[-82.86029,8.096388],[-82.85583,8.087221],[-82.849731,8.062777],[-82.85028,8.059999],[-82.864182,8.022778],[-82.86584,8.02083],[-82.872223,8.020555],[-82.89885,8.025669],[-82.894455,8.03083],[-82.89111,8.0411110000001],[-82.88695,8.07194],[-82.88667,8.0786090000001],[-82.88583,8.100277],[-82.886124,8.1033330000001],[-82.93085,8.254721],[-82.93584,8.260277],[-82.94751,8.269165],[-82.952515,8.271387],[-82.97084,8.276943],[-82.973343,8.27583],[-83.005,8.291111],[-83.03029,8.310555],[-83.01779,8.340277],[-82.952515,8.39944],[-82.93306,8.414444],[-82.925,8.416666],[-82.91556,8.41722],[-82.889175,8.4219440000001],[-82.87834,8.4249990000001],[-82.87195,8.429165],[-82.866394,8.433887],[-82.82993,8.47465],[-82.825562,8.57],[-82.83195,8.626665],[-82.83446,8.63444],[-82.84029,8.642776],[-82.877502,8.6880550000001],[-82.881668,8.690832],[-82.89667,8.71],[-82.91446,8.733889],[-82.91612,8.739166],[-82.91612,8.742777],[-82.91446,8.762777],[-82.88112,8.824165],[-82.877792,8.8275],[-82.860565,8.8413890000001],[-82.8564,8.844166],[-82.81334,8.862499],[-82.76807,8.8758320000001],[-82.757782,8.879444],[-82.749725,8.884998],[-82.719864,8.9108240000001],[-82.714737,8.9158330000001],[-82.711121,8.922222],[-82.71085,8.9311100000001],[-82.73889,8.975555],[-82.74167,8.97972],[-82.74695,8.984444],[-82.88223,9.067221],[-82.93047,9.06312],[-82.931122,9.19944],[-82.93472,9.471666],[-82.86446,9.585554],[-82.845,9.606667],[-82.843063,9.608332],[-82.833069,9.61222],[-82.829727,9.611666],[-82.81418,9.606667],[-82.754181,9.586111],[-82.7489,9.584166],[-82.74556,9.5808320000001],[-82.718903,9.54666],[-82.684723,9.509998],[-82.68028,9.5075],[-82.637787,9.4883330000001],[-82.63473,9.487778],[-82.61223,9.4891660000001],[-82.607788,9.4916650000001],[-82.5614,9.53555],[-82.563568,9.5628760000001],[-82.55945,9.564444],[-82.55267,9.560125],[-82.538071,9.550833],[-82.53029,9.544998],[-82.363617,9.40722],[-82.37001,9.320833],[-82.381668,9.28583],[-82.32472,9.188332],[-82.27528,9.1033330000001],[-82.24861,9.006943],[-82.23695,8.9977760000001],[-82.105835,8.941387],[-82.060287,8.930832],[-81.983337,8.944721],[-81.81639,8.94528],[-81.78807,9.0033320000001],[-81.86,9.062498],[-81.91389,9.112499],[-81.91112,9.164444],[-81.91028,9.16722],[-81.907501,9.17111],[-81.905563,9.172499],[-81.89696,9.174721],[-81.89029,9.1749990000001],[-81.883896,9.174444],[-81.87418,9.170277],[-81.86584,9.164165],[-81.751404,9.04722],[-81.70862,9.000555],[-81.6689,8.9558320000001],[-81.643341,8.919443],[-81.61639,8.883888],[-81.609726,8.87694],[-81.563904,8.8330550000001],[-81.554733,8.8252770000001],[-81.516678,8.7977770000001],[-81.51028,8.79361],[-81.50528,8.79139],[-81.49695,8.789721],[-81.27362,8.78528],[-81.220596,8.784559],[-81.21194,8.78194],[-81.19612,8.780277],[-81.153061,8.7874980000001],[-81.089737,8.8025000000001],[-80.97084,8.831944],[-80.96167,8.84],[-80.948624,8.85111],[-80.940567,8.85667],[-80.88362,8.878611],[-80.874451,8.8791660000001],[-80.86945,8.8766650000001],[-80.867233,8.875277],[-80.86168,8.8741660000001],[-80.84862,8.874998],[-80.83974,8.87694],[-80.83,8.880833],[-80.80501,8.903889],[-80.801392,8.9075],[-80.77917,8.936943],[-80.756958,8.966389],[-80.74695,8.976944],[-80.6364,9.041666],[-80.60196,9.05861],[-80.535843,9.085833],[-80.40834,9.13278],[-80.40279,9.13416],[-80.315567,9.150276],[-80.26083,9.158054],[-80.24695,9.16166],[-80.15472,9.19278],[-80.11751,9.206944],[-80.09668,9.2172220000001],[-80.08862,9.2230550000001],[-80.051392,9.258888],[-80.00446,9.306665],[-79.988068,9.328609],[-79.970001,9.351944],[-79.965286,9.354166],[-79.9489,9.35833],[-79.945847,9.35861],[-79.806122,9.4002760000001],[-79.74861,9.432499],[-79.74028,9.4380550000001],[-79.68779,9.4891660000001],[-79.686676,9.4916650000001],[-79.66972,9.532221],[-79.66779,9.54611],[-79.670288,9.546944],[-79.67223,9.548611],[-79.67334,9.551109],[-79.67361,9.554165],[-79.6714,9.5588870000001],[-79.62584,9.594166],[-79.599457,9.6024990000001],[-79.535568,9.619999],[-79.53334,9.620277],[-79.46306,9.5680540000001]]]]}}]}';
    }
}
