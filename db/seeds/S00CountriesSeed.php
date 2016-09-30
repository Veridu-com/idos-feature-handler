<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

use Phinx\Seed\AbstractSeed;

class S00CountriesSeed extends AbstractSeed {
    public function run() {
        $data = [
            [
                'name' => 'Afghanistan',
                'name' => 'AF'
            ],
            [
                'name' => 'Åland Islands',
                'name' => 'AX'
            ],
            [
                'name' => 'Albania',
                'name' => 'AL'
            ],
            [
                'name' => 'Algeria',
                'name' => 'DZ'
            ],
            [
                'name' => 'American Samoa',
                'name' => 'AS'
            ],
            [
                'name' => 'Andorra',
                'name' => 'AD'
            ],
            [
                'name' => 'Angola',
                'name' => 'AO'
            ],
            [
                'name' => 'Anguilla',
                'name' => 'AI'
            ],
            [
                'name' => 'Antarctica',
                'name' => 'AQ'
            ],
            [
                'name' => 'Antigua and Barbuda',
                'name' => 'AG'
            ],
            [
                'name' => 'Argentina',
                'name' => 'AR'
            ],
            [
                'name' => 'Armenia',
                'name' => 'AM'
            ],
            [
                'name' => 'Aruba',
                'name' => 'AW'
            ],
            [
                'name' => 'Australia',
                'name' => 'AU'
            ],
            [
                'name' => 'Austria',
                'name' => 'AT'
            ],
            [
                'name' => 'Azerbaijan',
                'name' => 'AZ'
            ],
            [
                'name' => 'Bahamas',
                'name' => 'BS'
            ],
            [
                'name' => 'Bahrain',
                'name' => 'BH'
            ],
            [
                'name' => 'Bangladesh',
                'name' => 'BD'
            ],
            [
                'name' => 'Barbados',
                'name' => 'BB'
            ],
            [
                'name' => 'Belarus',
                'name' => 'BY'
            ],
            [
                'name' => 'Belgium',
                'name' => 'BE'
            ],
            [
                'name' => 'Belize',
                'name' => 'BZ'
            ],
            [
                'name' => 'Benin',
                'name' => 'BJ'
            ],
            [
                'name' => 'Bermuda',
                'name' => 'BM'
            ],
            [
                'name' => 'Bhutan',
                'name' => 'BT'
            ],
            [
                'name' => 'Plurinational State of Bolivia',
                'name' => 'BO'
            ],
            [
                'name' => 'Sint Eustatius and Saba Bonaire',
                'name' => 'BQ'
            ],
            [
                'name' => 'Bosnia and Herzegovina',
                'name' => 'BA'
            ],
            [
                'name' => 'Botswana',
                'name' => 'BW'
            ],
            [
                'name' => 'Bouvet Island',
                'name' => 'BV'
            ],
            [
                'name' => 'Brazil',
                'name' => 'BR'
            ],
            [
                'name' => 'British Indian Ocean Territory',
                'name' => 'IO'
            ],
            [
                'name' => 'Brunei Darussalam',
                'name' => 'BN'
            ],
            [
                'name' => 'Bulgaria',
                'name' => 'BG'
            ],
            [
                'name' => 'Burkina Faso',
                'name' => 'BF'
            ],
            [
                'name' => 'Burundi',
                'name' => 'BI'
            ],
            [
                'name' => 'Cambodia',
                'name' => 'KH'
            ],
            [
                'name' => 'Cameroon',
                'name' => 'CM'
            ],
            [
                'name' => 'Canada',
                'name' => 'CA'
            ],
            [
                'name' => 'Cape Verde',
                'name' => 'CV'
            ],
            [
                'name' => 'Cayman Islands',
                'name' => 'KY'
            ],
            [
                'name' => 'Central African Republic',
                'name' => 'CF'
            ],
            [
                'name' => 'Chad',
                'name' => 'TD'
            ],
            [
                'name' => 'Chile',
                'name' => 'CL'
            ],
            [
                'name' => 'China',
                'name' => 'CN'
            ],
            [
                'name' => 'Christmas Island',
                'name' => 'CX'
            ],
            [
                'name' => 'Cocos (Keeling) Islands',
                'name' => 'CC'
            ],
            [
                'name' => 'Colombia',
                'name' => 'CO'
            ],
            [
                'name' => 'Comoros',
                'name' => 'KM'
            ],
            [
                'name' => 'Congo',
                'name' => 'CG'
            ],
            [
                'name' => 'Democratic Republic of the Congo',
                'name' => 'CD'
            ],
            [
                'name' => 'Cook Islands',
                'name' => 'CK'
            ],
            [
                'name' => 'Costa Rica',
                'name' => 'CR'
            ],
            [
                'name' => 'Côte D\'Ivoire',
                'name' => 'CI'
            ],
            [
                'name' => 'Croatia',
                'name' => 'HR'
            ],
            [
                'name' => 'Cuba',
                'name' => 'CU'
            ],
            [
                'name' => 'Curaçao',
                'name' => 'CW'
            ],
            [
                'name' => 'Cyprus',
                'name' => 'CY'
            ],
            [
                'name' => 'Czech Republic',
                'name' => 'CZ'
            ],
            [
                'name' => 'Denmark',
                'name' => 'DK'
            ],
            [
                'name' => 'Djibouti',
                'name' => 'DJ'
            ],
            [
                'name' => 'Dominica',
                'name' => 'DM'
            ],
            [
                'name' => 'Dominican Republic',
                'name' => 'DO'
            ],
            [
                'name' => 'Ecuador',
                'name' => 'EC'
            ],
            [
                'name' => 'Egypt',
                'name' => 'EG'
            ],
            [
                'name' => 'El Salvador',
                'name' => 'SV'
            ],
            [
                'name' => 'Equatorial Guinea',
                'name' => 'GQ'
            ],
            [
                'name' => 'Eritrea',
                'name' => 'ER'
            ],
            [
                'name' => 'Estonia',
                'name' => 'EE'
            ],
            [
                'name' => 'Ethiopia',
                'name' => 'ET'
            ],
            [
                'name' => 'Falkland Islands (Malvinas)',
                'name' => 'FK'
            ],
            [
                'name' => 'Faroe Islands',
                'name' => 'FO'
            ],
            [
                'name' => 'Fiji',
                'name' => 'FJ'
            ],
            [
                'name' => 'Finland',
                'name' => 'FI'
            ],
            [
                'name' => 'France',
                'name' => 'FR'
            ],
            [
                'name' => 'French Guiana',
                'name' => 'GF'
            ],
            [
                'name' => 'French Polynesia',
                'name' => 'PF'
            ],
            [
                'name' => 'French Southern Territories',
                'name' => 'TF'
            ],
            [
                'name' => 'Gabon',
                'name' => 'GA'
            ],
            [
                'name' => 'Gambia',
                'name' => 'GM'
            ],
            [
                'name' => 'Georgia',
                'name' => 'GE'
            ],
            [
                'name' => 'Germany',
                'name' => 'DE'
            ],
            [
                'name' => 'Ghana',
                'name' => 'GH'
            ],
            [
                'name' => 'Gibraltar',
                'name' => 'GI'
            ],
            [
                'name' => 'Greece',
                'name' => 'GR'
            ],
            [
                'name' => 'Greenland',
                'name' => 'GL'
            ],
            [
                'name' => 'Grenada',
                'name' => 'GD'
            ],
            [
                'name' => 'Guadeloupe',
                'name' => 'GP'
            ],
            [
                'name' => 'Guam',
                'name' => 'GU'
            ],
            [
                'name' => 'Guatemala',
                'name' => 'GT'
            ],
            [
                'name' => 'Guernsey',
                'name' => 'GG'
            ],
            [
                'name' => 'Guinea',
                'name' => 'GN'
            ],
            [
                'name' => 'Guinea-Bissau',
                'name' => 'GW'
            ],
            [
                'name' => 'Guyana',
                'name' => 'GY'
            ],
            [
                'name' => 'Haiti',
                'name' => 'HT'
            ],
            [
                'name' => 'Heard Island and Mcdonald Islands',
                'name' => 'HM'
            ],
            [
                'name' => 'Holy See (Vatican City State)',
                'name' => 'VA'
            ],
            [
                'name' => 'Honduras',
                'name' => 'HN'
            ],
            [
                'name' => 'Hong Kong',
                'name' => 'HK'
            ],
            [
                'name' => 'Hungary',
                'name' => 'HU'
            ],
            [
                'name' => 'Iceland',
                'name' => 'IS'
            ],
            [
                'name' => 'India',
                'name' => 'IN'
            ],
            [
                'name' => 'Indonesia',
                'name' => 'ID'
            ],
            [
                'name' => 'Islamic Republic of Iran',
                'name' => 'IR'
            ],
            [
                'name' => 'Iraq',
                'name' => 'IQ'
            ],
            [
                'name' => 'Ireland',
                'name' => 'IE'
            ],
            [
                'name' => 'Isle of Man',
                'name' => 'IM'
            ],
            [
                'name' => 'Israel',
                'name' => 'IL'
            ],
            [
                'name' => 'Italy',
                'name' => 'IT'
            ],
            [
                'name' => 'Jamaica',
                'name' => 'JM'
            ],
            [
                'name' => 'Japan',
                'name' => 'JP'
            ],
            [
                'name' => 'Jersey',
                'name' => 'JE'
            ],
            [
                'name' => 'Jordan',
                'name' => 'JO'
            ],
            [
                'name' => 'Kazakhstan',
                'name' => 'KZ'
            ],
            [
                'name' => 'Kenya',
                'name' => 'KE'
            ],
            [
                'name' => 'Kiribati',
                'name' => 'KI'
            ],
            [
                'name' => 'Democratic People\'s Republic of Korea',
                'name' => 'KP'
            ],
            [
                'name' => 'Republic of Korea',
                'name' => 'KR'
            ],
            [
                'name' => 'Kuwait',
                'name' => 'KW'
            ],
            [
                'name' => 'Kyrgyzstan',
                'name' => 'KG'
            ],
            [
                'name' => 'Lao People\'s Democratic Republic',
                'name' => 'LA'
            ],
            [
                'name' => 'Latvia',
                'name' => 'LV'
            ],
            [
                'name' => 'Lebanon',
                'name' => 'LB'
            ],
            [
                'name' => 'Lesotho',
                'name' => 'LS'
            ],
            [
                'name' => 'Liberia',
                'name' => 'LR'
            ],
            [
                'name' => 'Libya',
                'name' => 'LY'
            ],
            [
                'name' => 'Liechtenstein',
                'name' => 'LI'
            ],
            [
                'name' => 'Lithuania',
                'name' => 'LT'
            ],
            [
                'name' => 'Luxembourg',
                'name' => 'LU'
            ],
            [
                'name' => 'Macao',
                'name' => 'MO'
            ],
            [
                'name' => 'Former Yugoslav Republic of Macedonia',
                'name' => 'MK'
            ],
            [
                'name' => 'Madagascar',
                'name' => 'MG'
            ],
            [
                'name' => 'Malawi',
                'name' => 'MW'
            ],
            [
                'name' => 'Malaysia',
                'name' => 'MY'
            ],
            [
                'name' => 'Maldives',
                'name' => 'MV'
            ],
            [
                'name' => 'Mali',
                'name' => 'ML'
            ],
            [
                'name' => 'Malta',
                'name' => 'MT'
            ],
            [
                'name' => 'Marshall Islands',
                'name' => 'MH'
            ],
            [
                'name' => 'Martinique',
                'name' => 'MQ'
            ],
            [
                'name' => 'Mauritania',
                'name' => 'MR'
            ],
            [
                'name' => 'Mauritius',
                'name' => 'MU'
            ],
            [
                'name' => 'Mayotte',
                'name' => 'YT'
            ],
            [
                'name' => 'Mexico',
                'name' => 'MX'
            ],
            [
                'name' => 'Federated States of Micronesia',
                'name' => 'FM'
            ],
            [
                'name' => 'Republic of Moldova',
                'name' => 'MD'
            ],
            [
                'name' => 'Monaco',
                'name' => 'MC'
            ],
            [
                'name' => 'Mongolia',
                'name' => 'MN'
            ],
            [
                'name' => 'Montenegro',
                'name' => 'ME'
            ],
            [
                'name' => 'Montserrat',
                'name' => 'MS'
            ],
            [
                'name' => 'Morocco',
                'name' => 'MA'
            ],
            [
                'name' => 'Mozambique',
                'name' => 'MZ'
            ],
            [
                'name' => 'Myanmar',
                'name' => 'MM'
            ],
            [
                'name' => 'Namibia',
                'name' => 'NA'
            ],
            [
                'name' => 'Nauru',
                'name' => 'NR'
            ],
            [
                'name' => 'Nepal',
                'name' => 'NP'
            ],
            [
                'name' => 'Netherlands',
                'name' => 'NL'
            ],
            [
                'name' => 'New Caledonia',
                'name' => 'NC'
            ],
            [
                'name' => 'New Zealand',
                'name' => 'NZ'
            ],
            [
                'name' => 'Nicaragua',
                'name' => 'NI'
            ],
            [
                'name' => 'Niger',
                'name' => 'NE'
            ],
            [
                'name' => 'Nigeria',
                'name' => 'NG'
            ],
            [
                'name' => 'Niue',
                'name' => 'NU'
            ],
            [
                'name' => 'Norfolk Island',
                'name' => 'NF'
            ],
            [
                'name' => 'Northern Mariana Islands',
                'name' => 'MP'
            ],
            [
                'name' => 'Norway',
                'name' => 'NO'
            ],
            [
                'name' => 'Oman',
                'name' => 'OM'
            ],
            [
                'name' => 'Pakistan',
                'name' => 'PK'
            ],
            [
                'name' => 'Palau',
                'name' => 'PW'
            ],
            [
                'name' => 'State of Palestine',
                'name' => 'PS'
            ],
            [
                'name' => 'Panama',
                'name' => 'PA'
            ],
            [
                'name' => 'Papua New Guinea',
                'name' => 'PG'
            ],
            [
                'name' => 'Paraguay',
                'name' => 'PY'
            ],
            [
                'name' => 'Peru',
                'name' => 'PE'
            ],
            [
                'name' => 'Philippines',
                'name' => 'PH'
            ],
            [
                'name' => 'Pitcairn',
                'name' => 'PN'
            ],
            [
                'name' => 'Poland',
                'name' => 'PL'
            ],
            [
                'name' => 'Portugal',
                'name' => 'PT'
            ],
            [
                'name' => 'Puerto Rico',
                'name' => 'PR'
            ],
            [
                'name' => 'Qatar',
                'name' => 'QA'
            ],
            [
                'name' => 'Réunion',
                'name' => 'RE'
            ],
            [
                'name' => 'Romania',
                'name' => 'RO'
            ],
            [
                'name' => 'Russian Federation',
                'name' => 'RU'
            ],
            [
                'name' => 'Rwanda',
                'name' => 'RW'
            ],
            [
                'name' => 'Saint Barthélemy',
                'name' => 'BL'
            ],
            [
                'name' => 'Ascension and Tristan Da Cunha Saint Helena',
                'name' => 'SH'
            ],
            [
                'name' => 'Saint Kitts and Nevis',
                'name' => 'KN'
            ],
            [
                'name' => 'Saint Lucia',
                'name' => 'LC'
            ],
            [
                'name' => 'Saint Martin (French Part)',
                'name' => 'MF'
            ],
            [
                'name' => 'Saint Pierre and Miquelon',
                'name' => 'PM'
            ],
            [
                'name' => 'Saint Vincent and the Grenadines',
                'name' => 'VC'
            ],
            [
                'name' => 'Samoa',
                'name' => 'WS'
            ],
            [
                'name' => 'San Marino',
                'name' => 'SM'
            ],
            [
                'name' => 'Sao Tome and Principe',
                'name' => 'ST'
            ],
            [
                'name' => 'Saudi Arabia',
                'name' => 'SA'
            ],
            [
                'name' => 'Senegal',
                'name' => 'SN'
            ],
            [
                'name' => 'Serbia',
                'name' => 'RS'
            ],
            [
                'name' => 'Seychelles',
                'name' => 'SC'
            ],
            [
                'name' => 'Sierra Leone',
                'name' => 'SL'
            ],
            [
                'name' => 'Singapore',
                'name' => 'SG'
            ],
            [
                'name' => 'Sint Maarten (Dutch Part)',
                'name' => 'SX'
            ],
            [
                'name' => 'Slovakia',
                'name' => 'SK'
            ],
            [
                'name' => 'Slovenia',
                'name' => 'SI'
            ],
            [
                'name' => 'Solomon Islands',
                'name' => 'SB'
            ],
            [
                'name' => 'Somalia',
                'name' => 'SO'
            ],
            [
                'name' => 'South Africa',
                'name' => 'ZA'
            ],
            [
                'name' => 'South Georgia and the South Sandwich Islands',
                'name' => 'GS'
            ],
            [
                'name' => 'South Sudan',
                'name' => 'SS'
            ],
            [
                'name' => 'Spain',
                'name' => 'ES'
            ],
            [
                'name' => 'Sri Lanka',
                'name' => 'LK'
            ],
            [
                'name' => 'Sudan',
                'name' => 'SD'
            ],
            [
                'name' => 'Suriname',
                'name' => 'SR'
            ],
            [
                'name' => 'Svalbard and Jan Mayen',
                'name' => 'SJ'
            ],
            [
                'name' => 'Swaziland',
                'name' => 'SZ'
            ],
            [
                'name' => 'Sweden',
                'name' => 'SE'
            ],
            [
                'name' => 'Switzerland',
                'name' => 'CH'
            ],
            [
                'name' => 'Syrian Arab Republic',
                'name' => 'SY'
            ],
            [
                'name' => 'Province of China Taiwan',
                'name' => 'TW'
            ],
            [
                'name' => 'Tajikistan',
                'name' => 'TJ'
            ],
            [
                'name' => 'United Republic of Tanzania',
                'name' => 'TZ'
            ],
            [
                'name' => 'Thailand',
                'name' => 'TH'
            ],
            [
                'name' => 'Timor-Leste',
                'name' => 'TL'
            ],
            [
                'name' => 'Togo',
                'name' => 'TG'
            ],
            [
                'name' => 'Tokelau',
                'name' => 'TK'
            ],
            [
                'name' => 'Tonga',
                'name' => 'TO'
            ],
            [
                'name' => 'Trinidad and Tobago',
                'name' => 'TT'
            ],
            [
                'name' => 'Tunisia',
                'name' => 'TN'
            ],
            [
                'name' => 'Turkey',
                'name' => 'TR'
            ],
            [
                'name' => 'Turkmenistan',
                'name' => 'TM'
            ],
            [
                'name' => 'Turks and Caicos Islands',
                'name' => 'TC'
            ],
            [
                'name' => 'Tuvalu',
                'name' => 'TV'
            ],
            [
                'name' => 'Uganda',
                'name' => 'UG'
            ],
            [
                'name' => 'Ukraine',
                'name' => 'UA'
            ],
            [
                'name' => 'United Arab Emirates',
                'name' => 'AE'
            ],
            [
                'name' => 'United Kingdom',
                'name' => 'GB'
            ],
            [
                'name' => 'United States',
                'name' => 'US'
            ],
            [
                'name' => 'United States Minor Outlying Islands',
                'name' => 'UM'
            ],
            [
                'name' => 'Uruguay',
                'name' => 'UY'
            ],
            [
                'name' => 'Uzbekistan',
                'name' => 'UZ'
            ],
            [
                'name' => 'Vanuatu',
                'name' => 'VU'
            ],
            [
                'name' => 'Bolivarian Republic of Venezuela',
                'name' => 'VE'
            ],
            [
                'name' => 'Viet Nam',
                'name' => 'VN'
            ],
            [
                'name' => 'British Virgin Islands',
                'name' => 'VG'
            ],
            [
                'name' => 'U.S. Virgin Islands',
                'name' => 'VI'
            ],
            [
                'name' => 'Wallis and Futuna',
                'name' => 'WF'
            ],
            [
                'name' => 'Western Sahara',
                'name' => 'EH'
            ],
            [
                'name' => 'Yemen',
                'name' => 'YE'
            ],
            [
                'name' => 'Zambia',
                'name' => 'ZM'
            ],
            [
                'name' => 'Zimbabwe',
                'name' => 'ZW'
            ]
        ];

        $countries = $this->table('countries');
        $countries
            ->insert($data)
            ->save();
    }
}
