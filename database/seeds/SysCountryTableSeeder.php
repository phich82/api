<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SysCountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->countries() as $id => $row) {
            DB::table('sys_country')->insert([
                'country_id' => $id,
                'country_name_en' => $row[0],
                'country_name_jp' => $row[1],
                'create_time' => date('YmdHis'),
                'create_user' => array_random(range(1, 100))
            ]);
        }
    }

    private function countries()
    {
        return [
            'AFG' => ['Afghanistan', 'アフガニスタン'],
            'ALB' => ['Albania', 'アルバニア'],
            'DZA' => ['Algeria', 'アルジェリア'],
            'ASM' => ['American Samoa', 'アメリカ領サモア'],
            'AND' => ['Andorra', 'アンドラ'],
            'AGO' => ['Angola', 'アンゴラ'],
            'AIA' => ['Anguilla', 'アンギラ'],
            'ATA' => ['Antarctica', '南極大陸'],
            'ATG' => ['Antigua and Barbuda', 'アンティグアバーブーダ'],
            'ARG' => ['Argentina', 'アルゼンチン'],
            'ARM' => ['Armenia', 'アルメニア'],
            'ABW' => ['Aruba', 'アルバ'],
            'AUS' => ['Australia', 'オーストラリア'],
            'AUT' => ['Austria', 'オーストリア'],
            'AZE' => ['Azerbaijan', 'アゼルバイジャン'],
            'BHS' => ['Bahamas', 'バハマ'],
            'BHR' => ['Bahrain', 'バーレーン'],
            'BGD' => ['Bangladesh', 'バングラデシュ'],
            'BRB' => ['Barbados', 'バルバドス'],
            'BLR' => ['Belarus', 'ベラルーシ'],
            'BEL' => ['Belgium', 'ベルギー'],
            'BLZ' => ['Belize', 'ベリーズ'],
            'BEN' => ['Benin', 'ベニン'],
            'BMU' => ['Bermuda', 'バミューダ'],
            'BTN' => ['Bhutan', 'ブータン'],
            'BOL' => ['Bolivia', 'ボリビア'],
            'BES' => ['Bonaire', 'ボネール'],
            'BIH' => ['Bosnia and Herzegovina', 'ボスニア・ヘルツェゴビナ'],
            'BWA' => ['Botswana', 'ボツワナ'],
            'BVT' => ['Bouvet Island', 'ブーベ島'],
            'BRA' => ['Brazil', 'ブラジル'],
            'IOT' => ['British Indian Ocean Territory', 'イギリス領インド洋地域'],
            'BRN' => ['Brunei Darussalam', 'ブルネイ・ダルサラーム国'],
            'BGR' => ['Bulgaria', 'ブルガリア'],
            'BFA' => ['Burkina Faso', 'ブルキナファソ'],
            'BDI' => ['Burundi', 'ブルンジ'],
            'KHM' => ['Cambodia', 'カンボジア'],
            'CMR' => ['Cameroon', 'カメルーン'],
            'CAN' => ['Canada', 'カナダ'],
            'CPV' => ['Cape Verde', 'カーボベルデ'],
            'CYM' => ['Cayman Islands', 'ケイマン諸島'],
            'CAF' => ['Central African Republic', '中央アフリカ共和国'],
            'TCD' => ['Chad', 'チャド'],
            'CHL' => ['Chile', 'チリ'],
            'CHN' => ['China', '中国'],
            'CXR' => ['Christmas Island', 'クリスマス島'],
            'CCK' => ['Cocos (Keeling) Islands', 'ココス諸島'],
            'COL' => ['Colombia', 'コロンビア'],
            'COM' => ['Comoros', 'コモロ'],
            'COG' => ['Congo', 'コンゴ'],
            'COD' => ['Democratic Republic of the Congo', 'コンゴ民主共和国'],
            'COK' => ['Cook Islands', 'クック諸島'],
            'CRI' => ['Costa Rica', 'コスタリカ'],
            'HRV' => ['Croatia', 'クロアチア'],
            'CUB' => ['Cuba', 'キューバ'],
            'CUW' => ['Curacao', 'キュラソー'],
            'CYP' => ['Cyprus', 'キプロス'],
            'CZE' => ['Czech Republic', 'チェコ共和国'],
            'CIV' => ['Cote d\'Ivoire', 'コートジボワール'],
            'DNK' => ['Denmark', 'デンマーク'],
            'DJI' => ['Djibouti', 'ジブチ'],
            'DMA' => ['Dominica', 'ドミニカ'],
            'DOM' => ['Dominican Republic', 'ドミニカ共和国'],
            'ECU' => ['Ecuador', 'エクアドル'],
            'EGY' => ['Egypt', 'エジプト'],
            'SLV' => ['El Salvador', 'エルサルバドル'],
            'GNQ' => ['Equatorial Guinea', '赤道ギニア'],
            'ERI' => ['Eritrea', 'エリトリア'],
            'EST' => ['Estonia', 'エストニア'],
            'ETH' => ['Ethiopia', 'エチオピア'],
            'FLK' => ['Falkland Islands (Malvinas)', 'フォークランド諸島（マルビナス）'],
            'FRO' => ['Faroe Islands', 'フェロー諸島'],
            'FJI' => ['Fiji', 'フィジー'],
            'FIN' => ['Finland', 'フィンランド'],
            'FRA' => ['France', 'フランス'],
            'GUF' => ['French Guiana', 'フランス領ギアナ'],
            'PYF' => ['French Polynesia', 'フランス領ポリネシア'],
            'ATF' => ['French Southern Territories', '南フランス領'],
            'GAB' => ['Gabon', 'ガボン'],
            'GMB' => ['Gambia', 'ガンビア'],
            'GEO' => ['Georgia', 'ジョージア'],
            'DEU' => ['Germany', 'ドイツ'],
            'GHA' => ['Ghana', 'ガーナ'],
            'GIB' => ['Gibraltar', 'ジブラルタル'],
            'GRC' => ['Greece', 'ギリシャ'],
            'GRL' => ['Greenland', 'グリーンランド'],
            'GRD' => ['Grenada', 'グレナダ'],
            'GLP' => ['Guadeloupe', 'グアドループ'],
            'GUM' => ['Guam', 'グアム'],
            'GTM' => ['Guatemala', 'グアテマラ'],
            'GGY' => ['Guernsey', 'ガーンジー'],
            'GIN' => ['Guinea', 'ギニア'],
            'GNB' => ['Guinea-Bissau', 'ギニアビサウ'],
            'GUY' => ['Guyana', 'ガイアナ'],
            'HTI' => ['Haiti', 'ハイチ'],
            'HMD' => ['Heard Island and McDonald Islands', 'ハード島とマクドナルド諸島'],
            'VAT' => ['Holy See (Vatican City State)', '聖座（バチカン市国）'],
            'HND' => ['Honduras', 'ホンジュラス'],
            'HKG' => ['Hong Kong', '香港'],
            'HUN' => ['Hungary', 'ハンガリー'],
            'ISL' => ['Iceland', 'アイスランド'],
            'IND' => ['India', 'インド'],
            'IDN' => ['Indonesia', 'インドネシア'],
            'IRN' => ['Iran, Islamic Republic of', 'イランイスラム共和国'],
            'IRQ' => ['Iraq', 'イラク'],
            'IRL' => ['Ireland', 'アイルランド'],
            'IMN' => ['Isle of Man', 'マン島'],
            'ISR' => ['Israel', 'イスラエル'],
            'ITA' => ['Italy', 'イタリア'],
            'JAM' => ['Jamaica', 'ジャマイカ'],
            'JPN' => ['Japan', '日本'],
            'JEY' => ['Jersey', 'ジャージー'],
            'JOR' => ['Jordan', 'ヨルダン'],
            'KAZ' => ['Kazakhstan', 'カザフスタン'],
            'KEN' => ['Kenya', 'ケニア'],
            'KIR' => ['Kiribati', 'キリバス'],
            'PRK' => ['Korea, Democratic People\'s Republic of', '朝鮮民主主義人民共和国'],
            'KOR' => ['Korea, Republic of', '大韓民国'],
            'KWT' => ['Kuwait', 'クウェート'],
            'KGZ' => ['Kyrgyzstan', 'キルギスタン'],
            'LAO' => ['Lao People\'s Democratic Republic', 'ラオス人民民主共和国'],
            'LVA' => ['Latvia', 'ラトビア'],
            'LBN' => ['Lebanon', 'レバノン'],
            'LSO' => ['Lesotho', 'レソト'],
            'LBR' => ['Liberia', 'リベリア'],
            'LBY' => ['Libya', 'リビア'],
            'LIE' => ['Liechtenstein', 'リヒテンシュタイン'],
            'LTU' => ['Lithuania', 'リトアニア'],
            'LUX' => ['Luxembourg', 'ルクセンブルク'],
            'MAC' => ['Macao', 'マカオ'],
            'MKD' => ['Macedonia, the Former Yugoslav Republic of', 'マケドニア、旧ユーゴスラビア共和国'],
            'MDG' => ['Madagascar', 'マダガスカル'],
            'MWI' => ['Malawi', 'マラウイ'],
            'MYS' => ['Malaysia', 'マレーシア'],
            'MDV' => ['Maldives', 'モルディブ'],
            'MLI' => ['Mali', 'マリ'],
            'MLT' => ['Malta', 'マルタ'],
            'MHL' => ['Marshall Islands', 'マーシャル諸島'],
            'MTQ' => ['Martinique', 'マルティニーク'],
            'MRT' => ['Mauritania', 'モーリタニア'],
            'MUS' => ['Mauritius', 'モーリシャス'],
            'MYT' => ['Mayotte', 'マヨット'],
            'MEX' => ['Mexico', 'メキシコ'],
            'FSM' => ['Micronesia, Federated States of', 'ミクロネシア、連邦'],
            'MDA' => ['Moldova, Republic of', 'モルドバ共和国'],
            'MCO' => ['Monaco', 'モナコ'],
            'MNG' => ['Mongolia', 'モンゴル'],
            'MNE' => ['Montenegro', 'モンテネグロ'],
            'MSR' => ['Montserrat', 'モントセラト'],
            'MAR' => ['Morocco', 'モロッコ'],
            'MOZ' => ['Mozambique', 'モザンビーク'],
            'MMR' => ['Myanmar', 'ミャンマー'],
            'NAM' => ['Namibia', 'ナミビア'],
            'NRU' => ['Nauru', 'ナウル'],
            'NPL' => ['Nepal', 'ネパール'],
            'NLD' => ['Netherlands', 'オランダ'],
            'NCL' => ['New Caledonia', 'ニューカレドニア'],
            'NZL' => ['New Zealand', 'ニュージーランド'],
            'NIC' => ['Nicaragua', 'ニカラグア'],
            'NER' => ['Niger', 'ニジェール'],
            'NGA' => ['Nigeria', 'ナイジェリア'],
            'NIU' => ['Niue', 'ニウエ'],
            'NFK' => ['Norfolk Island', 'ノーフォーク島'],
            'MNP' => ['Northern Mariana Islands', '北マリアナ諸島'],
            'NOR' => ['Norway', 'ノルウェー'],
            'OMN' => ['Oman', 'オマーン'],
            'PAK' => ['Pakistan', 'パキスタン'],
            'PLW' => ['Palau', 'パラオ'],
            'PSE' => ['Palestine, State of', 'パレスチナ、'],
            'PAN' => ['Panama', 'パナマ'],
            'PNG' => ['Papua New Guinea', 'パプアニューギニア'],
            'PRY' => ['Paraguay', 'パラグアイ'],
            'PER' => ['Peru', 'ペルー'],
            'PHL' => ['Philippines', 'フィリピン'],
            'PCN' => ['Pitcairn', 'ピトケアン'],
            'POL' => ['Poland', 'ポーランド'],
            'PRT' => ['Portugal', 'ポルトガル'],
            'PRI' => ['Puerto Rico', 'プエルトリコ'],
            'QAT' => ['Qatar', 'カタール'],
            'ROU' => ['Romania', 'ルーマニア'],
            'RUS' => ['Russian Federation', 'ロシア連邦'],
            'RWA' => ['Rwanda', 'ルワンダ'],
            'REU' => ['Reunion', '再会'],
            'BLM' => ['Saint Barthelemy', 'セントバーセレミー島'],
            'SHN' => ['Saint Helena', 'セントヘレナ'],
            'KNA' => ['Saint Kitts and Nevis', 'セントクリストファーネイビス'],
            'LCA' => ['Saint Lucia', 'セントルシア'],
            'MAF' => ['Saint Martin (French part)', 'セントマーチン（フランス語）'],
            'SPM' => ['Saint Pierre and Miquelon', 'サンピエールとミケロン'],
            'VCT' => ['Saint Vincent and the Grenadines', 'セントビンセント・グレナディーン諸島'],
            'WSM' => ['Samoa', 'サモア'],
            'SMR' => ['San Marino', 'サンマリノ'],
            'STP' => ['Sao Tome and Principe', 'サントメプリンシペ'],
            'SAU' => ['Saudi Arabia', 'サウジアラビア'],
            'SEN' => ['Senegal', 'セネガル'],
            'SRB' => ['Serbia', 'セルビア'],
            'SYC' => ['Seychelles', 'セイシェル'],
            'SLE' => ['Sierra Leone', 'シエラレオネ'],
            'SGP' => ['Singapore', 'シンガポール'],
            'SXM' => ['Sint Maarten (Dutch part)', 'シントマールテン島（オランダ領）'],
            'SVK' => ['Slovakia', 'スロバキア'],
            'SVN' => ['Slovenia', 'スロベニア'],
            'SLB' => ['Solomon Islands', 'ソロモン諸島'],
            'SOM' => ['Somalia', 'ソマリア'],
            'ZAF' => ['South Africa', '南アフリカ'],
            'SGS' => ['South Georgia and the South Sandwich Islands', 'サウスジョージアとサウスサンドウィッチ諸島'],
            'SSD' => ['South Sudan', '南スーダン'],
            'ESP' => ['Spain', 'スペイン'],
            'LKA' => ['Sri Lanka', 'スリランカ'],
            'SDN' => ['Sudan', 'スーダン'],
            'SUR' => ['Suriname', 'スリナム'],
            'SJM' => ['Svalbard and Jan Mayen', 'スバールバル諸島とヤンマイエン島'],
            'SWZ' => ['Swaziland', 'スワジランド'],
            'SWE' => ['Sweden', 'スウェーデン'],
            'CHE' => ['Switzerland', 'スイス'],
            'SYR' => ['Syrian Arab Republic', 'シリアアラブ共和国'],
            'TWN' => ['Taiwan', '台湾'],
            'TJK' => ['Tajikistan', 'タジキスタン'],
            'TZA' => ['United Republic of Tanzania', 'タンザニア連合共和国'],
            'THA' => ['Thailand', 'タイ'],
            'TLS' => ['Timor-Leste', '東ティモール'],
            'TGO' => ['Togo', '行く'],
            'TKL' => ['Tokelau', 'トケラウ諸島'],
            'TON' => ['Tonga', 'トンガ'],
            'TTO' => ['Trinidad and Tobago', 'トリニダード・トバゴ'],
            'TUN' => ['Tunisia', 'チュニジア'],
            'TUR' => ['Turkey', '七面鳥'],
            'TKM' => ['Turkmenistan', 'トルクメニスタン'],
            'TCA' => ['Turks and Caicos Islands', 'タークス諸島及びカイコス諸島'],
            'TUV' => ['Tuvalu', 'ツバル'],
            'UGA' => ['Uganda', 'ウガンダ'],
            'UKR' => ['Ukraine', 'ウクライナ'],
            'ARE' => ['United Arab Emirates', 'アラブ首長国連邦'],
            'GBR' => ['United Kingdom', 'イギリス'],
            'USA' => ['United States', 'アメリカ'],
            'UMI' => ['United States Minor Outlying Islands', 'アメリカ合衆国外諸島'],
            'URY' => ['Uruguay', 'ウルグアイ'],
            'UZB' => ['Uzbekistan', 'ウズベキスタン'],
            'VUT' => ['Vanuatu', 'バヌアツ'],
            'VEN' => ['Venezuela', 'ベネズエラ'],
            'VNM' => ['Viet Nam', 'ベトナム'],
            'VGB' => ['British Virgin Islands', 'イギリス領ヴァージン諸島'],
            'VIR' => ['US Virgin Islands', '米領バージン諸島'],
            'WLF' => ['Wallis and Futuna', 'ウォリス・フツナ'],
            'ESH' => ['Western Sahara', '西サハラ'],
            'YEM' => ['Yemen', 'イエメン'],
            'ZMB' => ['Zambia', 'ザンビア'],
            'ZWE' => ['Zimbabwe', 'ジンバブエ'],
        ];
    }
}
