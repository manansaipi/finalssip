<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Position;
use App\Models\Country;
use App\Models\Bio;
use App\Models\Post;
use App\Models\Category;
use App\Models\Building;
use App\Models\Room;
use App\Models\Ticket;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Abdul Mannan',
        //     'email' => 'abdul.saipi@stduent.president.ac.id',
        //     'password' => bcrypt('12345')
        // ]);
        User::factory(10)->create();

        Position::create([
            'name' => 'CEO',

        ]);

        Position::create([
            'name' => 'IT Employee',

        ]);

        Position::create([
            'name' => 'Employee',
        ]);
        Ticket::factory(20)->create();
        Country::create([
            'name' => 'Afganistan',
        ]);
        Country::factory(200)->create();
        $countries = [
            [
                'name' => 'Afghanistan',

            ],
            [
                'name' => 'Albania',

            ],
            [
                'name' => 'Algeria',

            ],
            [
                'name' => 'American Samoa',

            ],
            [
                'name' => 'Andorra',

            ],
            [
                'name' => 'Angola',

            ],
            [
                'name' => 'Anguilla',

            ],
            [
                'name' => 'Antarctica',

            ],
            [
                'name' => 'Antigua And Barbuda',

            ],
            [
                'name' => 'Argentina',

            ],
            [
                'name' => 'Armenia',

            ],
            [
                'name' => 'Aruba',

            ],
            [
                'name' => 'Australia',

            ],
            [
                'name' => 'Austria',

            ],
            [
                'name' => 'Azerbaijan',

            ],
            [
                'name' => 'Bahamas The',

            ],
            [
                'name' => 'Bahrain',

            ],
            [
                'name' => 'Bangladesh',

            ],
            [
                'name' => 'Barbados',

            ],
            [
                'name' => 'Belarus',

            ],
            [
                'name' => 'Belgium',

            ],
            [
                'name' => 'Belize',

            ],
            [
                'name' => 'Benin',

            ],
            [
                'name' => 'Bermuda',

            ],
            [
                'name' => 'Bhutan',

            ],
            [
                'name' => 'Bolivia',

            ],
            [
                'name' => 'Bosnia and Herzegovina',

            ],
            [
                'name' => 'Botswana',

            ],
            [
                'name' => 'Bouvet Island',

            ],
            [
                'name' => 'Brazil',

            ],
            [
                'name' => 'British Indian Ocean Territory',

            ],
            [
                'name' => 'Brunei',

            ],
            [
                'name' => 'Bulgaria',

            ],
            [
                'name' => 'Burkina Faso',

            ],
            [
                'name' => 'Burundi',

            ],
            [
                'name' => 'Cambodia',

            ],
            [
                'name' => 'Cameroon',

            ],
            [
                'name' => 'Canada',

            ],
            [
                'name' => 'Cape Verde',

            ],
            [
                'name' => 'Cayman Islands',

            ],
            [
                'name' => 'Central African Republic',

            ],
            [
                'name' => 'Chad',

            ],
            [
                'name' => 'Chile',

            ],
            [
                'name' => 'China',

            ],
            [
                'name' => 'Christmas Island',

            ],
            [
                'name' => 'Cocos (Keeling) Islands',

            ],
            [
                'name' => 'Colombia',

            ],
            [
                'name' => 'Comoros',

            ],
            [
                'name' => 'Republic Of The Congo',

            ],
            [
                'name' => 'Democratic Republic Of The Congo',

            ],
            [
                'name' => 'Cook Islands',

            ],
            [
                'name' => 'Costa Rica',

            ],
            [
                'name' => 'Cote D Ivoire (Ivory Coast)',

            ],
            [
                'name' => 'Croatia (Hrvatska)',

            ],
            [
                'name' => 'Cuba',

            ],
            [
                'name' => 'Cyprus',

            ],
            [
                'name' => 'Czech Republic',

            ],
            [
                'name' => 'Denmark',

            ],
            [
                'name' => 'Djibouti',

            ],
            [
                'name' => 'Dominica',

            ],
            [
                'name' => 'Dominican Republic',

            ],
            [
                'name' => 'East Timor',

            ],
            [
                'name' => 'Ecuador',

            ],
            [
                'name' => 'Egypt',

            ],
            [
                'name' => 'El Salvador',

            ],
            [
                'name' => 'Equatorial Guinea',

            ],
            [
                'name' => 'Eritrea',

            ],
            [
                'name' => 'Estonia',

            ],
            [
                'name' => 'Ethiopia',

            ],
            [
                'name' => 'External Territories of Australia',

            ],
            [
                'name' => 'Falkland Islands',

            ],
            [
                'name' => 'Faroe Islands',

            ],
            [
                'name' => 'Fiji Islands',

            ],
            [
                'name' => 'Finland',

            ],
            [
                'name' => 'France',

            ],
            [
                'name' => 'French Guiana',

            ],
            [
                'name' => 'French Polynesia',

            ],
            [
                'name' => 'French Southern Territories',

            ],
            [
                'name' => 'Gabon',

            ],
            [
                'name' => 'Gambia The',

            ],
            [
                'name' => 'Georgia',

            ],
            [
                'name' => 'Germany',

            ],
            [
                'name' => 'Ghana',

            ],
            [
                'name' => 'Gibraltar',

            ],
            [
                'name' => 'Greece',

            ],
            [
                'name' => 'Greenland',

            ],
            [
                'name' => 'Grenada',

            ],
            [
                'name' => 'Guadeloupe',

            ],
            [
                'name' => 'Guam',

            ],
            [
                'name' => 'Guatemala',

            ],
            [
                'name' => 'Guernsey and Alderney',

            ],
            [
                'name' => 'Guinea',

            ],
            [
                'name' => 'Guinea-Bissau',

            ],
            [
                'name' => 'Guyana',

            ],
            [
                'name' => 'Haiti',

            ],
            [
                'name' => 'Heard and McDonald Islands',

            ],
            [
                'name' => 'Honduras',

            ],
            [
                'name' => 'Hong Kong S.A.R.',

            ],
            [
                'name' => 'Hungary',

            ],
            [
                'name' => 'Iceland',

            ],
            [
                'name' => 'India',

            ],
            [
                'name' => 'Indonesia',

            ],
            [
                'name' => 'Iran',

            ],
            [
                'name' => 'Iraq',

            ],
            [
                'name' => 'Ireland',

            ],
            [
                'name' => 'Israel',

            ],
            [
                'name' => 'Italy',

            ],
            [
                'name' => 'Jamaica',

            ],
            [
                'name' => 'Japan',

            ],
            [
                'name' => 'Jersey',

            ],
            [
                'name' => 'Jordan',

            ],
            [
                'name' => 'Kazakhstan',

            ],
            [
                'name' => 'Kenya',

            ],
            [
                'name' => 'Kiribati',

            ],
            [
                'name' => 'Korea North',

            ],
            [
                'name' => 'Korea South',

            ],
            [
                'name' => 'Kuwait',

            ],
            [
                'name' => 'Kyrgyzstan',

            ],
            [
                'name' => 'Laos',

            ],
            [
                'name' => 'Latvia',

            ],
            [
                'name' => 'Lebanon',

            ],
            [
                'name' => 'Lesotho',

            ],
            [
                'name' => 'Liberia',

            ],
            [
                'name' => 'Libya',

            ],
            [
                'name' => 'Liechtenstein',

            ],
            [
                'name' => 'Lithuania',

            ],
            [
                'name' => 'Luxembourg',

            ],
            [
                'name' => 'Macau S.A.R.',

            ],
            [
                'name' => 'Macedonia',

            ],
            [
                'name' => 'Madagascar',

            ],
            [
                'name' => 'Malawi',

            ],
            [
                'name' => 'Malaysia',

            ],
            [
                'name' => 'Maldives',

            ],
            [
                'name' => 'Mali',

            ],
            [
                'name' => 'Malta',

            ],
            [
                'name' => 'Man (Isle of)',

            ],
            [
                'name' => 'Marshall Islands',

            ],
            [
                'name' => 'Martinique',

            ],
            [
                'name' => 'Mauritania',

            ],
            [
                'name' => 'Mauritius',

            ],
            [
                'name' => 'Mayotte',

            ],
            [
                'name' => 'Mexico',

            ],
            [
                'name' => 'Micronesia',

            ],
            [
                'name' => 'Moldova',

            ],
            [
                'name' => 'Monaco',

            ],
            [
                'name' => 'Mongolia',

            ],
            [
                'name' => 'Montserrat',

            ],
            [
                'name' => 'Morocco',

            ],
            [
                'name' => 'Mozambique',

            ],
            [
                'name' => 'Myanmar',

            ],
            [
                'name' => 'Namibia',

            ],
            [
                'name' => 'Nauru',

            ],
            [
                'name' => 'Nepal',

            ],
            [
                'name' => 'Netherlands Antilles',

            ],
            [
                'name' => 'Netherlands The',

            ],
            [
                'name' => 'New Caledonia',

            ],
            [
                'name' => 'New Zealand',

            ],
            [
                'name' => 'Nicaragua',

            ],
            [
                'name' => 'Niger',

            ],
            [
                'name' => 'Nigeria',

            ],
            [
                'name' => 'Niue',

            ],
            [
                'name' => 'Norfolk Island',

            ],
            [
                'name' => 'Northern Mariana Islands',

            ],
            [
                'name' => 'Norway',

            ],
            [
                'name' => 'Oman',

            ],
            [
                'name' => 'Pakistan',

            ],
            [
                'name' => 'Palau',

            ],
            [
                'name' => 'Palestinian Territory Occupied',

            ],
            [
                'name' => 'Panama',

            ],
            [
                'name' => 'Papua new Guinea',

            ],
            [
                'name' => 'Paraguay',

            ],
            [
                'name' => 'Peru',

            ],
            [
                'name' => 'Philippines',

            ],
            [
                'name' => 'Pitcairn Island',

            ],
            [
                'name' => 'Poland',

            ],
            [
                'name' => 'Portugal',

            ],
            [
                'name' => 'Puerto Rico',

            ],
            [
                'name' => 'Qatar',

            ],
            [
                'name' => 'Reunion',

            ],
            [
                'name' => 'Romania',

            ],
            [
                'name' => 'Russia',

            ],
            [
                'name' => 'Rwanda',

            ],
            [
                'name' => 'Saint Helena',

            ],
            [
                'name' => 'Saint Kitts And Nevis',

            ],
            [
                'name' => 'Saint Lucia',

            ],
            [
                'name' => 'Saint Pierre and Miquelon',

            ],
            [
                'name' => 'Saint Vincent And The Grenadines',

            ],
            [
                'name' => 'Samoa',

            ],
            [
                'name' => 'San Marino',

            ],
            [
                'name' => 'Sao Tome and Principe',

            ],
            [
                'name' => 'Saudi Arabia',

            ],
            [
                'name' => 'Senegal',

            ],
            [
                'name' => 'Serbia',

            ],
            [
                'name' => 'Seychelles',

            ],
            [
                'name' => 'Sierra Leone',

            ],
            [
                'name' => 'Singapore',

            ],
            [
                'name' => 'Slovakia',

            ],
            [
                'name' => 'Slovenia',

            ],
            [
                'name' => 'Smaller Territories of the UK',

            ],
            [
                'name' => 'Solomon Islands',

            ],
            [
                'name' => 'Somalia',

            ],
            [
                'name' => 'South Africa',

            ],
            [
                'name' => 'South Georgia',

            ],
            [
                'name' => 'South Sudan',

            ],
            [
                'name' => 'Spain',

            ],
            [
                'name' => 'Sri Lanka',

            ],
            [
                'name' => 'Sudan',

            ],
            [
                'name' => 'Suricountry_name',

            ],
            [
                'name' => 'Svalbard And Jan Mayen Islands',

            ],
            [
                'name' => 'Swaziland',

            ],
            [
                'name' => 'Sweden',

            ],
            [
                'name' => 'Switzerland',

            ],
            [
                'name' => 'Syria',

            ],
            [
                'name' => 'Taiwan',

            ],
            [
                'name' => 'Tajikistan',

            ],
            [
                'name' => 'Tanzania',

            ],
            [
                'name' => 'Thailand',

            ],
            [
                'name' => 'Togo',

            ],
            [
                'name' => 'Tokelau',

            ],
            [
                'name' => 'Tonga',

            ],
            [
                'name' => 'Trincountry_idad And Tobago',

            ],
            [
                'name' => 'Tunisia',

            ],
            [
                'name' => 'Turkey',

            ],
            [
                'name' => 'Turkmenistan',

            ],
            [
                'name' => 'Turks And Caicos Islands',

            ],
            [
                'name' => 'Tuvalu',

            ],
            [
                'name' => 'Uganda',

            ],
            [
                'name' => 'Ukraine',

            ],
            [
                'name' => 'United Arab Emirates',

            ],
            [
                'name' => 'United Kingdom',

            ],
            [
                'name' => 'United States',

            ],
            [
                'name' => 'United States Minor Outlying Islands',

            ],
            [
                'name' => 'Uruguay',

            ],
            [
                'name' => 'Uzbekistan',

            ],
            [
                'name' => 'Vanuatu',

            ],
            [
                'name' => 'Vatican City State (Holy See)',

            ],
            [
                'name' => 'Venezuela',

            ],
            [
                'name' => 'Vietnam',

            ],
            [
                'name' => 'Virgin Islands (British)',

            ],
            [
                'name' => 'Virgin Islands (US)',

            ],
            [
                'name' => 'Wallis And Futuna Islands',

            ],
            [
                'name' => 'Western Sahara',

            ],
            [
                'name' => 'Yemen',

            ],
            [
                'name' => 'Yugoslavia',

            ],
            [
                'name' => 'Zambia',

            ],
            [
                'name' => 'Zimbabwe',
            ],
        ];
        // Country::insert($countries);

        // Room::factory(20)->create();

        // Post::factory(20)->create();





        // Post::create([
        //     'title' => 'First',
        //     'slug' => 'first',
        //     'excerpt' => 'jasjkldflkasjdf aksl;djf ;alksjdf',
        //     'body' => 'JSdhauiskghf oaiudshfuasdhgf ucasngdvfcuayseihfcvgbasdyifgv aouisdhf cnuyiasgf asdf uashdfikgasbd kjfgvaskduhjf g',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'SECOND',
        //     'slug' => 'SECOND',
        //     'excerpt' => 'jasjkldflkasjdf aksl;djf ;alksjdf',
        //     'body' => 'JSdhauiskghf oaiudshfuasdhgf ucasngdvfcuayseihfcvgbasdyifgv aouisdhf cnuyiasgf asdf uashdfikgasbd kjfgvaskduhjf g',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);
        // Post::create([
        //     'title' => 'THIRD',
        //     'slug' => 'THIRD',
        //     'excerpt' => 'jasjkldflkasjdf aksl;djf ;alksjdf',
        //     'body' => 'JSdhauiskghf oaiudshfuasdhgf ucasngdvfcuayseihfcvgbasdyifgv aouisdhf cnuyiasgf asdf uashdfikgasbd kjfgvaskduhjf g',
        //     'category_id' => 2,
        //     'user_id' => 1,
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',

    }
}
