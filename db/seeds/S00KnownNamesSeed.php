<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

use Phinx\Seed\AbstractSeed;

class S00KnownNamesSeed extends AbstractSeed {
    public function run() {
        $data = [
            [
                'name'        => 'Adam Levine',
                'type'        => 'celebrity',
                'soundex'     => 'A354',
                'metaphone'   => 'ATMLFN',
                'dmetaphone1' => 'ATMLFN',
                'dmetaphone2' => 'ATMLFN'
            ],
            [
                'name'        => 'Alexander Skarsgard',
                'type'        => 'celebrity',
                'soundex'     => 'A425',
                'metaphone'   => 'ALKSNTRSKRSKRT',
                'dmetaphone1' => 'ALKSNTRSKRSKRT',
                'dmetaphone2' => 'ALKSNTRSKRSKRT'
            ],
            [
                'name'        => 'Ali Larter',
                'type'        => 'celebrity',
                'soundex'     => 'A446',
                'metaphone'   => 'ALLRTR',
                'dmetaphone1' => 'ALLRTR',
                'dmetaphone2' => 'ALLRTR'
            ],
            [
                'name'        => 'Alicia Keys',
                'type'        => 'celebrity',
                'soundex'     => 'A422',
                'metaphone'   => 'ALXKS',
                'dmetaphone1' => 'ALSKS',
                'dmetaphone2' => 'ALXKS'
            ],
            [
                'name'        => 'Amanda Bynes',
                'type'        => 'celebrity',
                'soundex'     => 'A553',
                'metaphone'   => 'AMNTBNS',
                'dmetaphone1' => 'AMNTPNS',
                'dmetaphone2' => 'AMNTPNS'
            ],
            [
                'name'        => 'Amanda Seyfried',
                'type'        => 'celebrity',
                'soundex'     => 'A553',
                'metaphone'   => 'AMNTSFRT',
                'dmetaphone1' => 'AMNTSFRT',
                'dmetaphone2' => 'AMNTSFRT'
            ],
            [
                'name'        => 'America Ferrera',
                'type'        => 'celebrity',
                'soundex'     => 'A562',
                'metaphone'   => 'AMRKFRR',
                'dmetaphone1' => 'AMRKFRR',
                'dmetaphone2' => 'AMRKFRR'
            ],
            [
                'name'        => 'Amy Adams',
                'type'        => 'celebrity',
                'soundex'     => 'A535',
                'metaphone'   => 'AMTMS',
                'dmetaphone1' => 'AMTMS',
                'dmetaphone2' => 'AMTMS'
            ],
            [
                'name'        => 'Amy Winehouse',
                'type'        => 'celebrity',
                'soundex'     => 'A552',
                'metaphone'   => 'AMWNHS',
                'dmetaphone1' => 'AMNHS',
                'dmetaphone2' => 'AMNHS'
            ],
            [
                'name'        => 'Andrew Garfield',
                'type'        => 'celebrity',
                'soundex'     => 'A536',
                'metaphone'   => 'ANTRKRFLT',
                'dmetaphone1' => 'ANTRKRFLT',
                'dmetaphone2' => 'ANTRKRFLT'
            ],
            [
                'name'        => 'Angelina Jolie',
                'type'        => 'celebrity',
                'soundex'     => 'A524',
                'metaphone'   => 'ANJLNJL',
                'dmetaphone1' => 'ANJLNJL',
                'dmetaphone2' => 'ANKLNJL'
            ],
            [
                'name'        => 'Anna Nicole Smith',
                'type'        => 'celebrity',
                'soundex'     => 'A552',
                'metaphone'   => 'ANNKLSM0',
                'dmetaphone1' => 'ANNKLSM0',
                'dmetaphone2' => 'ANNKLSMT'
            ],
            [
                'name'        => 'Anna Paquin',
                'type'        => 'celebrity',
                'soundex'     => 'A512',
                'metaphone'   => 'ANPKN',
                'dmetaphone1' => 'ANPKN',
                'dmetaphone2' => 'ANPKN'
            ],
            [
                'name'        => 'Anne Hathaway',
                'type'        => 'celebrity',
                'soundex'     => 'A530',
                'metaphone'   => 'ANH0W',
                'dmetaphone1' => 'AN0',
                'dmetaphone2' => 'ANT'
            ],
            [
                'name'        => 'Ashlee Simpson',
                'type'        => 'celebrity',
                'soundex'     => 'A242',
                'metaphone'   => 'AXLSMPSN',
                'dmetaphone1' => 'AXLSMPSN',
                'dmetaphone2' => 'AXLSMPSN'
            ],
            [
                'name'        => 'Ashley Greene',
                'type'        => 'celebrity',
                'soundex'     => 'A242',
                'metaphone'   => 'AXLKRN',
                'dmetaphone1' => 'AXLKRN',
                'dmetaphone2' => 'AXLKRN'
            ],
            [
                'name'        => 'Ashley Olsen',
                'type'        => 'celebrity',
                'soundex'     => 'A244',
                'metaphone'   => 'AXLLSN',
                'dmetaphone1' => 'AXLLSN',
                'dmetaphone2' => 'AXLLSN'
            ],
            [
                'name'        => 'Ashley Tisdale',
                'type'        => 'celebrity',
                'soundex'     => 'A243',
                'metaphone'   => 'AXLTSTL',
                'dmetaphone1' => 'AXLTSTL',
                'dmetaphone2' => 'AXLTSTL'
            ],
            [
                'name'        => 'Ashton Kutcher',
                'type'        => 'celebrity',
                'soundex'     => 'A235',
                'metaphone'   => 'AXTNKXR',
                'dmetaphone1' => 'AXTNKXR',
                'dmetaphone2' => 'AXTNKXR'
            ],
            [
                'name'        => 'Audrina Patridge',
                'type'        => 'celebrity',
                'soundex'     => 'A365',
                'metaphone'   => 'ATRNPTRJ',
                'dmetaphone1' => 'ATRNPTRJ',
                'dmetaphone2' => 'ATRNPTRJ'
            ],
            [
                'name'        => 'Avril Lavigne',
                'type'        => 'celebrity',
                'soundex'     => 'A164',
                'metaphone'   => 'AFRLLFKN',
                'dmetaphone1' => 'AFRLLFN',
                'dmetaphone2' => 'AFRLLFKN'
            ],
            [
                'name'        => 'Ben Affleck',
                'type'        => 'celebrity',
                'soundex'     => 'B514',
                'metaphone'   => 'BNFLK',
                'dmetaphone1' => 'PNFLK',
                'dmetaphone2' => 'PNFLK'
            ],
            [
                'name'        => 'Bethenny Frankel',
                'type'        => 'celebrity',
                'soundex'     => 'B351',
                'metaphone'   => 'B0NFRNKL',
                'dmetaphone1' => 'P0NFRNKL',
                'dmetaphone2' => 'PTNFRNKL'
            ],
            [
                'name'        => 'Beyonce Knowles',
                'type'        => 'celebrity',
                'soundex'     => 'B522',
                'metaphone'   => 'BYNSKNLS',
                'dmetaphone1' => 'PNSKNLS',
                'dmetaphone2' => 'PNSKNLS'
            ],
            [
                'name'        => 'Beyoncé Knowles',
                'type'        => 'celebrity',
                'soundex'     => 'B525',
                'metaphone'   => 'BYNKKNLS',
                'dmetaphone1' => 'PNKKNLS',
                'dmetaphone2' => 'PNKKNLS'
            ],
            [
                'name'        => 'Blake Lively',
                'type'        => 'celebrity',
                'soundex'     => 'B424',
                'metaphone'   => 'BLKLFL',
                'dmetaphone1' => 'PLKLFL',
                'dmetaphone2' => 'PLKLFL'
            ],
            [
                'name'        => 'Blake Shelton',
                'type'        => 'celebrity',
                'soundex'     => 'B422',
                'metaphone'   => 'BLKXLTN',
                'dmetaphone1' => 'PLKXLTN',
                'dmetaphone2' => 'PLKXLTN'
            ],
            [
                'name'        => 'Bon Jovi',
                'type'        => 'celebrity',
                'soundex'     => 'B521',
                'metaphone'   => 'BNJF',
                'dmetaphone1' => 'PNJF',
                'dmetaphone2' => 'PNJF'
            ],
            [
                'name'        => 'Brad Paisley',
                'type'        => 'celebrity',
                'soundex'     => 'B631',
                'metaphone'   => 'BRTPSL',
                'dmetaphone1' => 'PRTPL',
                'dmetaphone2' => 'PRTPL'
            ],
            [
                'name'        => 'Brad Pitt',
                'type'        => 'celebrity',
                'soundex'     => 'B631',
                'metaphone'   => 'BRTPT',
                'dmetaphone1' => 'PRTPT',
                'dmetaphone2' => 'PRTPT'
            ],
            [
                'name'        => 'Bradley Cooper',
                'type'        => 'celebrity',
                'soundex'     => 'B634',
                'metaphone'   => 'BRTLKPR',
                'dmetaphone1' => 'PRTLKPR',
                'dmetaphone2' => 'PRTLKPR'
            ],
            [
                'name'        => 'Britney Spears',
                'type'        => 'celebrity',
                'soundex'     => 'B635',
                'metaphone'   => 'BRTNSPRS',
                'dmetaphone1' => 'PRTNSPRS',
                'dmetaphone2' => 'PRTNSPRS'
            ],
            [
                'name'        => 'Brody Jenner',
                'type'        => 'celebrity',
                'soundex'     => 'B632',
                'metaphone'   => 'BRTJNR',
                'dmetaphone1' => 'PRTJNR',
                'dmetaphone2' => 'PRTJNR'
            ],
            [
                'name'        => 'Brooke Shields',
                'type'        => 'celebrity',
                'soundex'     => 'B622',
                'metaphone'   => 'BRKXLTS',
                'dmetaphone1' => 'PRKXLTS',
                'dmetaphone2' => 'PRKXLTS'
            ],
            [
                'name'        => 'Bruce Springsteen',
                'type'        => 'celebrity',
                'soundex'     => 'B622',
                'metaphone'   => 'BRSSPRNKSTN',
                'dmetaphone1' => 'PRSSPRNKSTN',
                'dmetaphone2' => 'PRSSPRNKSTN'
            ],
            [
                'name'        => 'Bruce Willis',
                'type'        => 'celebrity',
                'soundex'     => 'B624',
                'metaphone'   => 'BRSWLS',
                'dmetaphone1' => 'PRSLS',
                'dmetaphone2' => 'PRSLS'
            ],
            [
                'name'        => 'Bruno Mars',
                'type'        => 'celebrity',
                'soundex'     => 'B655',
                'metaphone'   => 'BRNMRS',
                'dmetaphone1' => 'PRNMRS',
                'dmetaphone2' => 'PRNMRS'
            ],
            [
                'name'        => 'Bryan Cranston',
                'type'        => 'celebrity',
                'soundex'     => 'B652',
                'metaphone'   => 'BRYNKRNSTN',
                'dmetaphone1' => 'PRNKRNSTN',
                'dmetaphone2' => 'PRNKRNSTN'
            ],
            [
                'name'        => 'Calvin Harris',
                'type'        => 'celebrity',
                'soundex'     => 'C415',
                'metaphone'   => 'KLFNHRS',
                'dmetaphone1' => 'KLFNRS',
                'dmetaphone2' => 'KLFNRS'
            ],
            [
                'name'        => 'Cameron Diaz',
                'type'        => 'celebrity',
                'soundex'     => 'C565',
                'metaphone'   => 'KMRNTS',
                'dmetaphone1' => 'KMRNTS',
                'dmetaphone2' => 'KMRNTS'
            ],
            [
                'name'        => 'Carmen Electra',
                'type'        => 'celebrity',
                'soundex'     => 'C655',
                'metaphone'   => 'KRMNLKTR',
                'dmetaphone1' => 'KRMNLKTR',
                'dmetaphone2' => 'KRMNLKTR'
            ],
            [
                'name'        => 'Carrie Underwood',
                'type'        => 'celebrity',
                'soundex'     => 'C653',
                'metaphone'   => 'KRNTRWT',
                'dmetaphone1' => 'KRNTRT',
                'dmetaphone2' => 'KRNTRT'
            ],
            [
                'name'        => 'Cate Blanchett',
                'type'        => 'celebrity',
                'soundex'     => 'C314',
                'metaphone'   => 'KTBLNXT',
                'dmetaphone1' => 'KTPLNXT',
                'dmetaphone2' => 'KTPLNKT'
            ],
            [
                'name'        => 'Catherine Zeta-Jones',
                'type'        => 'celebrity',
                'soundex'     => 'C365',
                'metaphone'   => 'K0RNSTJNS',
                'dmetaphone1' => 'K0RNSTJNS',
                'dmetaphone2' => 'KTRNSTJNS'
            ],
            [
                'name'        => 'Chace Crawford',
                'type'        => 'celebrity',
                'soundex'     => 'C226',
                'metaphone'   => 'XSKRFRT',
                'dmetaphone1' => 'XSKRFRT',
                'dmetaphone2' => 'XSKRFRT'
            ],
            [
                'name'        => 'Channing Tatum',
                'type'        => 'celebrity',
                'soundex'     => 'C552',
                'metaphone'   => 'XNNKTTM',
                'dmetaphone1' => 'XNNKTTM',
                'dmetaphone2' => 'XNNKTTM'
            ],
            [
                'name'        => 'Charlie Sheen',
                'type'        => 'celebrity',
                'soundex'     => 'C642',
                'metaphone'   => 'XRLXN',
                'dmetaphone1' => 'XRLXN',
                'dmetaphone2' => 'XRLXN'
            ],
            [
                'name'        => 'Charlize Theron',
                'type'        => 'celebrity',
                'soundex'     => 'C642',
                'metaphone'   => 'XRLS0RN',
                'dmetaphone1' => 'XRLS0RN',
                'dmetaphone2' => 'XRLSTRN'
            ],
            [
                'name'        => 'Cheryl Burke',
                'type'        => 'celebrity',
                'soundex'     => 'C641',
                'metaphone'   => 'XRLBRK',
                'dmetaphone1' => 'XRLPRK',
                'dmetaphone2' => 'XRLPRK'
            ],
            [
                'name'        => 'Chris Brown',
                'type'        => 'celebrity',
                'soundex'     => 'C621',
                'metaphone'   => 'XRSBRN',
                'dmetaphone1' => 'KRSPRN',
                'dmetaphone2' => 'KRSPRN'
            ],
            [
                'name'        => 'Chris Hemsworth',
                'type'        => 'celebrity',
                'soundex'     => 'C625',
                'metaphone'   => 'XRSHMSWR0',
                'dmetaphone1' => 'KRSMSR0',
                'dmetaphone2' => 'KRSMSRT'
            ],
            [
                'name'        => 'Chris Pine',
                'type'        => 'celebrity',
                'soundex'     => 'C621',
                'metaphone'   => 'XRSPN',
                'dmetaphone1' => 'KRSPN',
                'dmetaphone2' => 'KRSPN'
            ],
            [
                'name'        => 'Christian Bale',
                'type'        => 'celebrity',
                'soundex'     => 'C623',
                'metaphone'   => 'XRSXNBL',
                'dmetaphone1' => 'KRSXNPL',
                'dmetaphone2' => 'KRSXNPL'
            ],
            [
                'name'        => 'Christina Aguilera',
                'type'        => 'celebrity',
                'soundex'     => 'C623',
                'metaphone'   => 'XRSTNKLR',
                'dmetaphone1' => 'KRSTNKLR',
                'dmetaphone2' => 'KRSTNKLR'
            ],
            [
                'name'        => 'Christina Applegate',
                'type'        => 'celebrity',
                'soundex'     => 'C623',
                'metaphone'   => 'XRSTNPLKT',
                'dmetaphone1' => 'KRSTNPLKT',
                'dmetaphone2' => 'KRSTNPLKT'
            ],
            [
                'name'        => 'Claire Danes',
                'type'        => 'celebrity',
                'soundex'     => 'C463',
                'metaphone'   => 'KLRTNS',
                'dmetaphone1' => 'KLRTNS',
                'dmetaphone2' => 'KLRTNS'
            ],
            [
                'name'        => 'Clay Aiken',
                'type'        => 'celebrity',
                'soundex'     => 'C425',
                'metaphone'   => 'KLKN',
                'dmetaphone1' => 'KLKN',
                'dmetaphone2' => 'KLKN'
            ],
            [
                'name'        => 'Colin Farrell',
                'type'        => 'celebrity',
                'soundex'     => 'C451',
                'metaphone'   => 'KLNFRL',
                'dmetaphone1' => 'KLNFRL',
                'dmetaphone2' => 'KLNFRL'
            ],
            [
                'name'        => 'Colin Firth',
                'type'        => 'celebrity',
                'soundex'     => 'C451',
                'metaphone'   => 'KLNFR0',
                'dmetaphone1' => 'KLNFR0',
                'dmetaphone2' => 'KLNFRT'
            ],
            [
                'name'        => 'Corbin Bleu',
                'type'        => 'celebrity',
                'soundex'     => 'C615',
                'metaphone'   => 'KRBNBL',
                'dmetaphone1' => 'KRPNPL',
                'dmetaphone2' => 'KRPNPL'
            ],
            [
                'name'        => 'Cory Monteith',
                'type'        => 'celebrity',
                'soundex'     => 'C655',
                'metaphone'   => 'KRMNT0',
                'dmetaphone1' => 'KRMNT0',
                'dmetaphone2' => 'KRMNTT'
            ],
            [
                'name'        => 'Courteney Cox',
                'type'        => 'celebrity',
                'soundex'     => 'C635',
                'metaphone'   => 'KRTNKKS',
                'dmetaphone1' => 'KRTNKKS',
                'dmetaphone2' => 'KRTNKKS'
            ],
            [
                'name'        => 'Cristiano Ronaldo',
                'type'        => 'celebrity',
                'soundex'     => 'C623',
                'metaphone'   => 'KRSXNRNLT',
                'dmetaphone1' => 'KRSXNRNLT',
                'dmetaphone2' => 'KRSXNRNLT'
            ],
            [
                'name'        => 'Céline Dion',
                'type'        => 'celebrity',
                'soundex'     => 'C453',
                'metaphone'   => 'KLNTN',
                'dmetaphone1' => 'KLNTN',
                'dmetaphone2' => 'KLNTN'
            ],
            [
                'name'        => 'Dakota Fanning',
                'type'        => 'celebrity',
                'soundex'     => 'D231',
                'metaphone'   => 'TKTFNNK',
                'dmetaphone1' => 'TKTFNNK',
                'dmetaphone2' => 'TKTFNNK'
            ],
            [
                'name'        => 'Dan Brown',
                'type'        => 'celebrity',
                'soundex'     => 'D516',
                'metaphone'   => 'TNBRN',
                'dmetaphone1' => 'TNPRN',
                'dmetaphone2' => 'TNPRN'
            ],
            [
                'name'        => 'Daniel Craig',
                'type'        => 'celebrity',
                'soundex'     => 'D542',
                'metaphone'   => 'TNLKRK',
                'dmetaphone1' => 'TNLKRK',
                'dmetaphone2' => 'TNLKRK'
            ],
            [
                'name'        => 'Daniel Radcliffe',
                'type'        => 'celebrity',
                'soundex'     => 'D546',
                'metaphone'   => 'TNLRTKLF',
                'dmetaphone1' => 'TNLRTKLF',
                'dmetaphone2' => 'TNLRTKLF'
            ],
            [
                'name'        => 'David Archuleta',
                'type'        => 'celebrity',
                'soundex'     => 'D136',
                'metaphone'   => 'TFTRXLT',
                'dmetaphone1' => 'TFTRXLT',
                'dmetaphone2' => 'TFTRKLT'
            ],
            [
                'name'        => 'David Beckham',
                'type'        => 'celebrity',
                'soundex'     => 'D131',
                'metaphone'   => 'TFTBKHM',
                'dmetaphone1' => 'TFTPKM',
                'dmetaphone2' => 'TFTPKM'
            ],
            [
                'name'        => 'David Cook',
                'type'        => 'celebrity',
                'soundex'     => 'D132',
                'metaphone'   => 'TFTKK',
                'dmetaphone1' => 'TFTKK',
                'dmetaphone2' => 'TFTKK'
            ],
            [
                'name'        => 'Demi Lovato',
                'type'        => 'celebrity',
                'soundex'     => 'D541',
                'metaphone'   => 'TMLFT',
                'dmetaphone1' => 'TMLFT',
                'dmetaphone2' => 'TMLFT'
            ],
            [
                'name'        => 'Demi Moore',
                'type'        => 'celebrity',
                'soundex'     => 'D556',
                'metaphone'   => 'TMMR',
                'dmetaphone1' => 'TMMR',
                'dmetaphone2' => 'TMMR'
            ],
            [
                'name'        => 'Denise Richards',
                'type'        => 'celebrity',
                'soundex'     => 'D526',
                'metaphone'   => 'TNSRXRTS',
                'dmetaphone1' => 'TNSRXRTS',
                'dmetaphone2' => 'TNSRKRTS'
            ],
            [
                'name'        => 'Denzel Washington',
                'type'        => 'celebrity',
                'soundex'     => 'D524',
                'metaphone'   => 'TNSLWXNKTN',
                'dmetaphone1' => 'TNSLXNKTN',
                'dmetaphone2' => 'TNTSLXNKTN'
            ],
            [
                'name'        => 'Dr. Dre',
                'type'        => 'celebrity',
                'soundex'     => 'D636',
                'metaphone'   => 'TRTR',
                'dmetaphone1' => 'TRTR',
                'dmetaphone2' => 'TRTR'
            ],
            [
                'name'        => 'Dr. Phil McGraw',
                'type'        => 'celebrity',
                'soundex'     => 'D614',
                'metaphone'   => 'TRFLMKKR',
                'dmetaphone1' => 'TRFLMKR',
                'dmetaphone2' => 'TRFLMKRF'
            ],
            [
                'name'        => 'Drew Barrymore',
                'type'        => 'celebrity',
                'soundex'     => 'D616',
                'metaphone'   => 'TRBRMR',
                'dmetaphone1' => 'TRPRMR',
                'dmetaphone2' => 'TRPRMR'
            ],
            [
                'name'        => 'Dwayne Johnson',
                'type'        => 'celebrity',
                'soundex'     => 'D525',
                'metaphone'   => 'TWNJNSN',
                'dmetaphone1' => 'TNJNSN',
                'dmetaphone2' => 'TNJNSN'
            ],
            [
                'name'        => 'Dwyane Wade',
                'type'        => 'celebrity',
                'soundex'     => 'D530',
                'metaphone'   => 'TYNWT',
                'dmetaphone1' => 'TNT',
                'dmetaphone2' => 'TNT'
            ],
            [
                'name'        => 'Ed Westwick',
                'type'        => 'celebrity',
                'soundex'     => 'E323',
                'metaphone'   => 'ETWSTWK',
                'dmetaphone1' => 'ATSTK',
                'dmetaphone2' => 'ATSTK'
            ],
            [
                'name'        => 'Elin Nordegren',
                'type'        => 'celebrity',
                'soundex'     => 'E456',
                'metaphone'   => 'ELNNRTKRN',
                'dmetaphone1' => 'ALNNRTKRN',
                'dmetaphone2' => 'ALNNRTKRN'
            ],
            [
                'name'        => 'Elisabeth Hasselbeck',
                'type'        => 'celebrity',
                'soundex'     => 'E421',
                'metaphone'   => 'ELSB0HSLBK',
                'dmetaphone1' => 'ALSP0SLPK',
                'dmetaphone2' => 'ALSPTSLPK'
            ],
            [
                'name'        => 'Elizabeth Taylor',
                'type'        => 'celebrity',
                'soundex'     => 'E421',
                'metaphone'   => 'ELSB0TLR',
                'dmetaphone1' => 'ALSP0TLR',
                'dmetaphone2' => 'ALSPTTLR'
            ],
            [
                'name'        => 'Ellen DeGeneres',
                'type'        => 'celebrity',
                'soundex'     => 'E453',
                'metaphone'   => 'ELNTJNRS',
                'dmetaphone1' => 'ALNTJNRS',
                'dmetaphone2' => 'ALNTKNRS'
            ],
            [
                'name'        => 'Ellen Pompeo',
                'type'        => 'celebrity',
                'soundex'     => 'E451',
                'metaphone'   => 'ELNPMP',
                'dmetaphone1' => 'ALNPMP',
                'dmetaphone2' => 'ALNPMP'
            ],
            [
                'name'        => 'Emily Blunt',
                'type'        => 'celebrity',
                'soundex'     => 'E541',
                'metaphone'   => 'EMLBLNT',
                'dmetaphone1' => 'AMLPLNT',
                'dmetaphone2' => 'AMLPLNT'
            ],
            [
                'name'        => 'Emma Roberts',
                'type'        => 'celebrity',
                'soundex'     => 'E561',
                'metaphone'   => 'EMRBRTS',
                'dmetaphone1' => 'AMRPRTS',
                'dmetaphone2' => 'AMRPRTS'
            ],
            [
                'name'        => 'Emma Stone',
                'type'        => 'celebrity',
                'soundex'     => 'E523',
                'metaphone'   => 'EMSTN',
                'dmetaphone1' => 'AMSTN',
                'dmetaphone2' => 'AMSTN'
            ],
            [
                'name'        => 'Emma Watson',
                'type'        => 'celebrity',
                'soundex'     => 'E532',
                'metaphone'   => 'EMWTSN',
                'dmetaphone1' => 'AMTSN',
                'dmetaphone2' => 'AMTSN'
            ],
            [
                'name'        => 'Eva Longoria',
                'type'        => 'celebrity',
                'soundex'     => 'E145',
                'metaphone'   => 'EFLNKR',
                'dmetaphone1' => 'AFLNKR',
                'dmetaphone2' => 'AFLNKR'
            ],
            [
                'name'        => 'Eva Mendes',
                'type'        => 'celebrity',
                'soundex'     => 'E155',
                'metaphone'   => 'EFMNTS',
                'dmetaphone1' => 'AFMNTS',
                'dmetaphone2' => 'AFMNTS'
            ],
            [
                'name'        => 'Evan Rachel Wood',
                'type'        => 'celebrity',
                'soundex'     => 'E156',
                'metaphone'   => 'EFNRXLWT',
                'dmetaphone1' => 'AFNRXLT',
                'dmetaphone2' => 'AFNRKLT'
            ],
            [
                'name'        => 'Evangeline Lilly',
                'type'        => 'celebrity',
                'soundex'     => 'E152',
                'metaphone'   => 'EFNJLNLL',
                'dmetaphone1' => 'AFNJLNLL',
                'dmetaphone2' => 'AFNKLNLL'
            ],
            [
                'name'        => 'Faith Hill',
                'type'        => 'celebrity',
                'soundex'     => 'F340',
                'metaphone'   => 'F0HL',
                'dmetaphone1' => 'F0L',
                'dmetaphone2' => 'FTL'
            ],
            [
                'name'        => 'Farrah Fawcett',
                'type'        => 'celebrity',
                'soundex'     => 'F612',
                'metaphone'   => 'FRFST',
                'dmetaphone1' => 'FRFST',
                'dmetaphone2' => 'FRFST'
            ],
            [
                'name'        => 'Floyd Mayweather',
                'type'        => 'celebrity',
                'soundex'     => 'F435',
                'metaphone'   => 'FLTMW0R',
                'dmetaphone1' => 'FLTM0R',
                'dmetaphone2' => 'FLTMTR'
            ],
            [
                'name'        => 'George Clooney',
                'type'        => 'celebrity',
                'soundex'     => 'G622',
                'metaphone'   => 'JRJKLN',
                'dmetaphone1' => 'JRJKLN',
                'dmetaphone2' => 'KRKKLN'
            ],
            [
                'name'        => 'Gerard Butler',
                'type'        => 'celebrity',
                'soundex'     => 'G663',
                'metaphone'   => 'JRRTBTLR',
                'dmetaphone1' => 'KRRTPTLR',
                'dmetaphone2' => 'JRRTPTLR'
            ],
            [
                'name'        => 'Gisele Bundchen',
                'type'        => 'celebrity',
                'soundex'     => 'G241',
                'metaphone'   => 'JSLBNTXN',
                'dmetaphone1' => 'JSLPNTXN',
                'dmetaphone2' => 'KSLPNTKN'
            ],
            [
                'name'        => 'Gisele Bündchen',
                'type'        => 'celebrity',
                'soundex'     => 'G241',
                'metaphone'   => 'JSLBNTXN',
                'dmetaphone1' => 'JSLPNTXN',
                'dmetaphone2' => 'KSLPNTKN'
            ],
            [
                'name'        => 'Glenn Beck',
                'type'        => 'celebrity',
                'soundex'     => 'G451',
                'metaphone'   => 'KLNBK',
                'dmetaphone1' => 'KLNPK',
                'dmetaphone2' => 'KLNPK'
            ],
            [
                'name'        => 'Gordon Ramsay',
                'type'        => 'celebrity',
                'soundex'     => 'G635',
                'metaphone'   => 'KRTNRMS',
                'dmetaphone1' => 'KRTNRMS',
                'dmetaphone2' => 'KRTNRMS'
            ],
            [
                'name'        => 'Gwen Stefani',
                'type'        => 'celebrity',
                'soundex'     => 'G523',
                'metaphone'   => 'KWNSTFN',
                'dmetaphone1' => 'KNSTFN',
                'dmetaphone2' => 'KNSTFN'
            ],
            [
                'name'        => 'Gwyneth Paltrow',
                'type'        => 'celebrity',
                'soundex'     => 'G531',
                'metaphone'   => 'KN0PLTR',
                'dmetaphone1' => 'KN0PLTR',
                'dmetaphone2' => 'KNTPLTRF'
            ],
            [
                'name'        => 'Halle Berry',
                'type'        => 'celebrity',
                'soundex'     => 'H416',
                'metaphone'   => 'HLBR',
                'dmetaphone1' => 'HLPR',
                'dmetaphone2' => 'HLPR'
            ],
            [
                'name'        => 'Hayden Panettiere',
                'type'        => 'celebrity',
                'soundex'     => 'H351',
                'metaphone'   => 'HTNPNTR',
                'dmetaphone1' => 'HTNPNTR',
                'dmetaphone2' => 'HTNPNTR'
            ],
            [
                'name'        => 'Heath Ledger',
                'type'        => 'celebrity',
                'soundex'     => 'H343',
                'metaphone'   => 'H0LJR',
                'dmetaphone1' => 'H0LJR',
                'dmetaphone2' => 'HTLJR'
            ],
            [
                'name'        => 'Heather Locklear',
                'type'        => 'celebrity',
                'soundex'     => 'H364',
                'metaphone'   => 'H0RLKLR',
                'dmetaphone1' => 'H0RLKLR',
                'dmetaphone2' => 'HTRLKLR'
            ],
            [
                'name'        => 'Heidi Klum',
                'type'        => 'celebrity',
                'soundex'     => 'H324',
                'metaphone'   => 'HTKLM',
                'dmetaphone1' => 'HTKLM',
                'dmetaphone2' => 'HTKLM'
            ],
            [
                'name'        => 'Heidi Montag',
                'type'        => 'celebrity',
                'soundex'     => 'H355',
                'metaphone'   => 'HTMNTK',
                'dmetaphone1' => 'HTMNTK',
                'dmetaphone2' => 'HTMNTK'
            ],
            [
                'name'        => 'Hilary Duff',
                'type'        => 'celebrity',
                'soundex'     => 'H463',
                'metaphone'   => 'HLRTF',
                'dmetaphone1' => 'HLRTF',
                'dmetaphone2' => 'HLRTF'
            ],
            [
                'name'        => 'Howard Stern',
                'type'        => 'celebrity',
                'soundex'     => 'H632',
                'metaphone'   => 'HWRTSTRN',
                'dmetaphone1' => 'HRTSTRN',
                'dmetaphone2' => 'HRTSTRN'
            ],
            [
                'name'        => 'Hugh Jackman',
                'type'        => 'celebrity',
                'soundex'     => 'H222',
                'metaphone'   => 'HFJKMN',
                'dmetaphone1' => 'HJKMN',
                'dmetaphone2' => 'HJKMN'
            ],
            [
                'name'        => 'Isla Fisher',
                'type'        => 'celebrity',
                'soundex'     => 'I241',
                'metaphone'   => 'ISLFXR',
                'dmetaphone1' => 'ALFXR',
                'dmetaphone2' => 'ALFXR'
            ],
            [
                'name'        => 'J.J. Abrams',
                'type'        => 'celebrity',
                'soundex'     => 'J165',
                'metaphone'   => 'JJBRMS',
                'dmetaphone1' => 'JJPRMS',
                'dmetaphone2' => 'AJPRMS'
            ],
            [
                'name'        => 'J.K. Rowling',
                'type'        => 'celebrity',
                'soundex'     => 'J645',
                'metaphone'   => 'JKRLNK',
                'dmetaphone1' => 'JKRLNK',
                'dmetaphone2' => 'AKRLNK'
            ],
            [
                'name'        => 'Jake Gyllenhaal',
                'type'        => 'celebrity',
                'soundex'     => 'J224',
                'metaphone'   => 'JKJLNHL',
                'dmetaphone1' => 'JKKLNL',
                'dmetaphone2' => 'AKJLNL'
            ],
            [
                'name'        => 'James Franco',
                'type'        => 'celebrity',
                'soundex'     => 'J521',
                'metaphone'   => 'JMSFRNK',
                'dmetaphone1' => 'JMSFRNK',
                'dmetaphone2' => 'AMSFRNK'
            ],
            [
                'name'        => 'James Patterson',
                'type'        => 'celebrity',
                'soundex'     => 'J521',
                'metaphone'   => 'JMSPTRSN',
                'dmetaphone1' => 'JMSPTRSN',
                'dmetaphone2' => 'AMSPTRSN'
            ],
            [
                'name'        => 'Jamie Lynn Spears',
                'type'        => 'celebrity',
                'soundex'     => 'J545',
                'metaphone'   => 'JMLNSPRS',
                'dmetaphone1' => 'JMLNSPRS',
                'dmetaphone2' => 'AMLNSPRS'
            ],
            [
                'name'        => 'Janet Jackson',
                'type'        => 'celebrity',
                'soundex'     => 'J532',
                'metaphone'   => 'JNTJKSN',
                'dmetaphone1' => 'JNTJKSN',
                'dmetaphone2' => 'ANTJKSN'
            ],
            [
                'name'        => 'January Jones',
                'type'        => 'celebrity',
                'soundex'     => 'J562',
                'metaphone'   => 'JNRJNS',
                'dmetaphone1' => 'JNRJNS',
                'dmetaphone2' => 'ANRJNS'
            ],
            [
                'name'        => 'Jay Z',
                'type'        => 'celebrity',
                'soundex'     => 'J200',
                'metaphone'   => 'JS',
                'dmetaphone1' => 'JS',
                'dmetaphone2' => 'AS'
            ],
            [
                'name'        => 'Jennifer Aniston',
                'type'        => 'celebrity',
                'soundex'     => 'J516',
                'metaphone'   => 'JNFRNSTN',
                'dmetaphone1' => 'JNFRNSTN',
                'dmetaphone2' => 'ANFRNSTN'
            ],
            [
                'name'        => 'Jennifer Garner',
                'type'        => 'celebrity',
                'soundex'     => 'J516',
                'metaphone'   => 'JNFRKRNR',
                'dmetaphone1' => 'JNFRKRNR',
                'dmetaphone2' => 'ANFRKRNR'
            ],
            [
                'name'        => 'Jennifer Hudson',
                'type'        => 'celebrity',
                'soundex'     => 'J516',
                'metaphone'   => 'JNFRHTSN',
                'dmetaphone1' => 'JNFRTSN',
                'dmetaphone2' => 'ANFRTSN'
            ],
            [
                'name'        => 'Jennifer Lawrence',
                'type'        => 'celebrity',
                'soundex'     => 'J516',
                'metaphone'   => 'JNFRLRNS',
                'dmetaphone1' => 'JNFRLRNS',
                'dmetaphone2' => 'ANFRLRNS'
            ],
            [
                'name'        => 'Jennifer Lopez',
                'type'        => 'celebrity',
                'soundex'     => 'J516',
                'metaphone'   => 'JNFRLPS',
                'dmetaphone1' => 'JNFRLPS',
                'dmetaphone2' => 'ANFRLPS'
            ],
            [
                'name'        => 'Jenny McCarthy',
                'type'        => 'celebrity',
                'soundex'     => 'J552',
                'metaphone'   => 'JNMKKR0',
                'dmetaphone1' => 'JNMKR0',
                'dmetaphone2' => 'ANMKRT'
            ],
            [
                'name'        => 'Jessica Alba',
                'type'        => 'celebrity',
                'soundex'     => 'J224',
                'metaphone'   => 'JSKLB',
                'dmetaphone1' => 'JSKLP',
                'dmetaphone2' => 'ASKLP'
            ],
            [
                'name'        => 'Jessica Biel',
                'type'        => 'celebrity',
                'soundex'     => 'J221',
                'metaphone'   => 'JSKBL',
                'dmetaphone1' => 'JSKPL',
                'dmetaphone2' => 'ASKPL'
            ],
            [
                'name'        => 'Jessica Chastain',
                'type'        => 'celebrity',
                'soundex'     => 'J222',
                'metaphone'   => 'JSKXSTN',
                'dmetaphone1' => 'JSKXSTN',
                'dmetaphone2' => 'ASKKSTN'
            ],
            [
                'name'        => 'Jessica Simpson',
                'type'        => 'celebrity',
                'soundex'     => 'J222',
                'metaphone'   => 'JSKSMPSN',
                'dmetaphone1' => 'JSKSMPSN',
                'dmetaphone2' => 'ASKSMPSN'
            ],
            [
                'name'        => 'Jessica Szohr',
                'type'        => 'celebrity',
                'soundex'     => 'J222',
                'metaphone'   => 'JSKSSR',
                'dmetaphone1' => 'JSKSR',
                'dmetaphone2' => 'ASKXR'
            ],
            [
                'name'        => 'Jimmy Fallon',
                'type'        => 'celebrity',
                'soundex'     => 'J514',
                'metaphone'   => 'JMFLN',
                'dmetaphone1' => 'JMFLN',
                'dmetaphone2' => 'AMFLN'
            ],
            [
                'name'        => 'Joan Rivers',
                'type'        => 'celebrity',
                'soundex'     => 'J561',
                'metaphone'   => 'JNRFRS',
                'dmetaphone1' => 'JNRFRS',
                'dmetaphone2' => 'ANRFRS'
            ],
            [
                'name'        => 'Joe Jonas',
                'type'        => 'celebrity',
                'soundex'     => 'J252',
                'metaphone'   => 'JJNS',
                'dmetaphone1' => 'JJNS',
                'dmetaphone2' => 'AJNS'
            ],
            [
                'name'        => 'Joel Madden',
                'type'        => 'celebrity',
                'soundex'     => 'J453',
                'metaphone'   => 'JLMTN',
                'dmetaphone1' => 'JLMTN',
                'dmetaphone2' => 'ALMTN'
            ],
            [
                'name'        => 'John Green',
                'type'        => 'celebrity',
                'soundex'     => 'J526',
                'metaphone'   => 'JNKRN',
                'dmetaphone1' => 'JNKRN',
                'dmetaphone2' => 'ANKRN'
            ],
            [
                'name'        => 'John Krasinski',
                'type'        => 'celebrity',
                'soundex'     => 'J526',
                'metaphone'   => 'JNKRSNSK',
                'dmetaphone1' => 'JNKRSNSK',
                'dmetaphone2' => 'ANKRSNSK'
            ],
            [
                'name'        => 'John Mayer',
                'type'        => 'celebrity',
                'soundex'     => 'J560',
                'metaphone'   => 'JNMYR',
                'dmetaphone1' => 'JNMR',
                'dmetaphone2' => 'ANMR'
            ],
            [
                'name'        => 'John Travolta',
                'type'        => 'celebrity',
                'soundex'     => 'J536',
                'metaphone'   => 'JNTRFLT',
                'dmetaphone1' => 'JNTRFLT',
                'dmetaphone2' => 'ANTRFLT'
            ],
            [
                'name'        => 'Johnny Depp',
                'type'        => 'celebrity',
                'soundex'     => 'J531',
                'metaphone'   => 'JNTP',
                'dmetaphone1' => 'JNTP',
                'dmetaphone2' => 'ANTP'
            ],
            [
                'name'        => 'Jon Hamm',
                'type'        => 'celebrity',
                'soundex'     => 'J550',
                'metaphone'   => 'JNHM',
                'dmetaphone1' => 'JNM',
                'dmetaphone2' => 'ANM'
            ],
            [
                'name'        => 'Jon Stewart',
                'type'        => 'celebrity',
                'soundex'     => 'J523',
                'metaphone'   => 'JNSTWRT',
                'dmetaphone1' => 'JNSTRT',
                'dmetaphone2' => 'ANSTRT'
            ],
            [
                'name'        => 'Jonas Brothers',
                'type'        => 'celebrity',
                'soundex'     => 'J521',
                'metaphone'   => 'JNSBR0RS',
                'dmetaphone1' => 'JNSPR0RS',
                'dmetaphone2' => 'ANSPRTRS'
            ],
            [
                'name'        => 'Jordin Sparks',
                'type'        => 'celebrity',
                'soundex'     => 'J635',
                'metaphone'   => 'JRTNSPRKS',
                'dmetaphone1' => 'JRTNSPRKS',
                'dmetaphone2' => 'ARTNSPRKS'
            ],
            [
                'name'        => 'Josh Duhamel',
                'type'        => 'celebrity',
                'soundex'     => 'J235',
                'metaphone'   => 'JXTHML',
                'dmetaphone1' => 'JXTHML',
                'dmetaphone2' => 'AXTHML'
            ],
            [
                'name'        => 'Josh Hartnett',
                'type'        => 'celebrity',
                'soundex'     => 'J263',
                'metaphone'   => 'JXHRTNT',
                'dmetaphone1' => 'JXRTNT',
                'dmetaphone2' => 'AXRTNT'
            ],
            [
                'name'        => 'Josh Hutcherson',
                'type'        => 'celebrity',
                'soundex'     => 'J232',
                'metaphone'   => 'JXHXRSN',
                'dmetaphone1' => 'JXXRSN',
                'dmetaphone2' => 'AXXRSN'
            ],
            [
                'name'        => 'Joss Whedon',
                'type'        => 'celebrity',
                'soundex'     => 'J235',
                'metaphone'   => 'JSHTN',
                'dmetaphone1' => 'JSTN',
                'dmetaphone2' => 'ASTN'
            ],
            [
                'name'        => 'Jude Law',
                'type'        => 'celebrity',
                'soundex'     => 'J340',
                'metaphone'   => 'JTL',
                'dmetaphone1' => 'JTL',
                'dmetaphone2' => 'ATLF'
            ],
            [
                'name'        => 'Julia Louis-Dreyfus',
                'type'        => 'celebrity',
                'soundex'     => 'J442',
                'metaphone'   => 'JLLSTRFS',
                'dmetaphone1' => 'JLLSTRFS',
                'dmetaphone2' => 'ALLSTRFS'
            ],
            [
                'name'        => 'Julia Roberts',
                'type'        => 'celebrity',
                'soundex'     => 'J461',
                'metaphone'   => 'JLRBRTS',
                'dmetaphone1' => 'JLRPRTS',
                'dmetaphone2' => 'ALRPRTS'
            ],
            [
                'name'        => 'Julianne Hough',
                'type'        => 'celebrity',
                'soundex'     => 'J452',
                'metaphone'   => 'JLNH',
                'dmetaphone1' => 'JLN',
                'dmetaphone2' => 'ALN'
            ],
            [
                'name'        => 'Justin Bieber',
                'type'        => 'celebrity',
                'soundex'     => 'J235',
                'metaphone'   => 'JSTNBBR',
                'dmetaphone1' => 'JSTNPPR',
                'dmetaphone2' => 'ASTNPPR'
            ],
            [
                'name'        => 'Justin Timberlake',
                'type'        => 'celebrity',
                'soundex'     => 'J235',
                'metaphone'   => 'JSTNTMRLK',
                'dmetaphone1' => 'JSTNTMPRLK',
                'dmetaphone2' => 'ASTNTMPRLK'
            ],
            [
                'name'        => 'Kaley Cuoco',
                'type'        => 'celebrity',
                'soundex'     => 'K422',
                'metaphone'   => 'KLKK',
                'dmetaphone1' => 'KLKK',
                'dmetaphone2' => 'KLKK'
            ],
            [
                'name'        => 'Kanye West',
                'type'        => 'celebrity',
                'soundex'     => 'K523',
                'metaphone'   => 'KNYWST',
                'dmetaphone1' => 'KNST',
                'dmetaphone2' => 'KNST'
            ],
            [
                'name'        => 'Kate Beckinsale',
                'type'        => 'celebrity',
                'soundex'     => 'K312',
                'metaphone'   => 'KTBKNSL',
                'dmetaphone1' => 'KTPKNSL',
                'dmetaphone2' => 'KTPKNSL'
            ],
            [
                'name'        => 'Kate Bosworth',
                'type'        => 'celebrity',
                'soundex'     => 'K312',
                'metaphone'   => 'KTBSWR0',
                'dmetaphone1' => 'KTPSR0',
                'dmetaphone2' => 'KTPSRT'
            ],
            [
                'name'        => 'Kate Gosselin',
                'type'        => 'celebrity',
                'soundex'     => 'K322',
                'metaphone'   => 'KTKSLN',
                'dmetaphone1' => 'KTKSLN',
                'dmetaphone2' => 'KTKSLN'
            ],
            [
                'name'        => 'Kate Hudson',
                'type'        => 'celebrity',
                'soundex'     => 'K332',
                'metaphone'   => 'KTHTSN',
                'dmetaphone1' => 'KTTSN',
                'dmetaphone2' => 'KTTSN'
            ],
            [
                'name'        => 'Kate Middleton',
                'type'        => 'celebrity',
                'soundex'     => 'K353',
                'metaphone'   => 'KTMTLTN',
                'dmetaphone1' => 'KTMTLTN',
                'dmetaphone2' => 'KTMTLTN'
            ],
            [
                'name'        => 'Kate Moss',
                'type'        => 'celebrity',
                'soundex'     => 'K352',
                'metaphone'   => 'KTMS',
                'dmetaphone1' => 'KTMS',
                'dmetaphone2' => 'KTMS'
            ],
            [
                'name'        => 'Kate Upton',
                'type'        => 'celebrity',
                'soundex'     => 'K313',
                'metaphone'   => 'KTPTN',
                'dmetaphone1' => 'KTPTN',
                'dmetaphone2' => 'KTPTN'
            ],
            [
                'name'        => 'Kate Walsh',
                'type'        => 'celebrity',
                'soundex'     => 'K342',
                'metaphone'   => 'KTWLX',
                'dmetaphone1' => 'KTLX',
                'dmetaphone2' => 'KTLX'
            ],
            [
                'name'        => 'Kate Winslet',
                'type'        => 'celebrity',
                'soundex'     => 'K352',
                'metaphone'   => 'KTWNSLT',
                'dmetaphone1' => 'KTNSLT',
                'dmetaphone2' => 'KTNSLT'
            ],
            [
                'name'        => 'Katharine McPhee',
                'type'        => 'celebrity',
                'soundex'     => 'K365',
                'metaphone'   => 'K0RNMKF',
                'dmetaphone1' => 'K0RNMKF',
                'dmetaphone2' => 'KTRNMKF'
            ],
            [
                'name'        => 'Katherine Heigl',
                'type'        => 'celebrity',
                'soundex'     => 'K365',
                'metaphone'   => 'K0RNHKL',
                'dmetaphone1' => 'K0RNKL',
                'dmetaphone2' => 'KTRNKL'
            ],
            [
                'name'        => 'Katie Holmes',
                'type'        => 'celebrity',
                'soundex'     => 'K345',
                'metaphone'   => 'KTHLMS',
                'dmetaphone1' => 'KTLMS',
                'dmetaphone2' => 'KTLMS'
            ],
            [
                'name'        => 'Katy Perry',
                'type'        => 'celebrity',
                'soundex'     => 'K316',
                'metaphone'   => 'KTPR',
                'dmetaphone1' => 'KTPR',
                'dmetaphone2' => 'KTPR'
            ],
            [
                'name'        => 'Keanu Reeves',
                'type'        => 'celebrity',
                'soundex'     => 'K561',
                'metaphone'   => 'KNRFS',
                'dmetaphone1' => 'KNRFS',
                'dmetaphone2' => 'KNRFS'
            ],
            [
                'name'        => 'Keira Knightley',
                'type'        => 'celebrity',
                'soundex'     => 'K625',
                'metaphone'   => 'KRKNFTL',
                'dmetaphone1' => 'KRKNTL',
                'dmetaphone2' => 'KRKNTL'
            ],
            [
                'name'        => 'Keith Urban',
                'type'        => 'celebrity',
                'soundex'     => 'K361',
                'metaphone'   => 'K0RBN',
                'dmetaphone1' => 'K0RPN',
                'dmetaphone2' => 'KTRPN'
            ],
            [
                'name'        => 'Kellan Lutz',
                'type'        => 'celebrity',
                'soundex'     => 'K454',
                'metaphone'   => 'KLNLTS',
                'dmetaphone1' => 'KLNLTS',
                'dmetaphone2' => 'KLNLTS'
            ],
            [
                'name'        => 'Kellie Pickler',
                'type'        => 'celebrity',
                'soundex'     => 'K412',
                'metaphone'   => 'KLPKLR',
                'dmetaphone1' => 'KLPKLR',
                'dmetaphone2' => 'KLPKLR'
            ],
            [
                'name'        => 'Kelly Clarkson',
                'type'        => 'celebrity',
                'soundex'     => 'K424',
                'metaphone'   => 'KLKLRKSN',
                'dmetaphone1' => 'KLKLRKSN',
                'dmetaphone2' => 'KLKLRKSN'
            ],
            [
                'name'        => 'Kelly Ripa',
                'type'        => 'celebrity',
                'soundex'     => 'K461',
                'metaphone'   => 'KLRP',
                'dmetaphone1' => 'KLRP',
                'dmetaphone2' => 'KLRP'
            ],
            [
                'name'        => 'Kendra Wilkinson',
                'type'        => 'celebrity',
                'soundex'     => 'K536',
                'metaphone'   => 'KNTRWLKNSN',
                'dmetaphone1' => 'KNTRLKNSN',
                'dmetaphone2' => 'KNTRLKNSN'
            ],
            [
                'name'        => 'Kenny Chesney',
                'type'        => 'celebrity',
                'soundex'     => 'K522',
                'metaphone'   => 'KNXSN',
                'dmetaphone1' => 'KNXSN',
                'dmetaphone2' => 'KNKSN'
            ],
            [
                'name'        => 'Keri Russell',
                'type'        => 'celebrity',
                'soundex'     => 'K662',
                'metaphone'   => 'KRRSL',
                'dmetaphone1' => 'KRRSL',
                'dmetaphone2' => 'KRRSL'
            ],
            [
                'name'        => 'Kerry Washington',
                'type'        => 'celebrity',
                'soundex'     => 'K625',
                'metaphone'   => 'KRWXNKTN',
                'dmetaphone1' => 'KRXNKTN',
                'dmetaphone2' => 'KRXNKTN'
            ],
            [
                'name'        => 'Kevin Durant',
                'type'        => 'celebrity',
                'soundex'     => 'K153',
                'metaphone'   => 'KFNTRNT',
                'dmetaphone1' => 'KFNTRNT',
                'dmetaphone2' => 'KFNTRNT'
            ],
            [
                'name'        => 'Kevin Federline',
                'type'        => 'celebrity',
                'soundex'     => 'K151',
                'metaphone'   => 'KFNFTRLN',
                'dmetaphone1' => 'KFNFTRLN',
                'dmetaphone2' => 'KFNFTRLN'
            ],
            [
                'name'        => 'Kevin Spacey',
                'type'        => 'celebrity',
                'soundex'     => 'K152',
                'metaphone'   => 'KFNSPS',
                'dmetaphone1' => 'KFNSPS',
                'dmetaphone2' => 'KFNSPS'
            ],
            [
                'name'        => 'Khloé Kardashian',
                'type'        => 'celebrity',
                'soundex'     => 'K426',
                'metaphone'   => 'KLKRTXN',
                'dmetaphone1' => 'KLKRTXN',
                'dmetaphone2' => 'KLKRTXN'
            ],
            [
                'name'        => 'Kim Kardashian',
                'type'        => 'celebrity',
                'soundex'     => 'K526',
                'metaphone'   => 'KMKRTXN',
                'dmetaphone1' => 'KMKRTXN',
                'dmetaphone2' => 'KMKRTXN'
            ],
            [
                'name'        => 'Kirsten Dunst',
                'type'        => 'celebrity',
                'soundex'     => 'K623',
                'metaphone'   => 'KRSTNTNST',
                'dmetaphone1' => 'KRSTNTNST',
                'dmetaphone2' => 'KRSTNTNST'
            ],
            [
                'name'        => 'Kirstie Alley',
                'type'        => 'celebrity',
                'soundex'     => 'K623',
                'metaphone'   => 'KRSTL',
                'dmetaphone1' => 'KRSTL',
                'dmetaphone2' => 'KRSTL'
            ],
            [
                'name'        => 'Kobe Bryant',
                'type'        => 'celebrity',
                'soundex'     => 'K116',
                'metaphone'   => 'KBBRYNT',
                'dmetaphone1' => 'KPPRNT',
                'dmetaphone2' => 'KPPRNT'
            ],
            [
                'name'        => 'Kourtney Kardashian',
                'type'        => 'celebrity',
                'soundex'     => 'K635',
                'metaphone'   => 'KRTNKRTXN',
                'dmetaphone1' => 'KRTNKRTXN',
                'dmetaphone2' => 'KRTNKRTXN'
            ],
            [
                'name'        => 'Kris Allen',
                'type'        => 'celebrity',
                'soundex'     => 'K624',
                'metaphone'   => 'KRSLN',
                'dmetaphone1' => 'KRSLN',
                'dmetaphone2' => 'KRSLN'
            ],
            [
                'name'        => 'Kristen Bell',
                'type'        => 'celebrity',
                'soundex'     => 'K623',
                'metaphone'   => 'KRSTNBL',
                'dmetaphone1' => 'KRSTNPL',
                'dmetaphone2' => 'KRSTNPL'
            ],
            [
                'name'        => 'Kristen Stewart',
                'type'        => 'celebrity',
                'soundex'     => 'K623',
                'metaphone'   => 'KRSTNSTWRT',
                'dmetaphone1' => 'KRSTNSTRT',
                'dmetaphone2' => 'KRSTNSTRT'
            ],
            [
                'name'        => 'Kristin Cavallari',
                'type'        => 'celebrity',
                'soundex'     => 'K623',
                'metaphone'   => 'KRSTNKFLR',
                'dmetaphone1' => 'KRSTNKFLR',
                'dmetaphone2' => 'KRSTNKFLR'
            ],
            [
                'name'        => 'Lady Gaga',
                'type'        => 'celebrity',
                'soundex'     => 'L322',
                'metaphone'   => 'LTKK',
                'dmetaphone1' => 'LTKK',
                'dmetaphone2' => 'LTKK'
            ],
            [
                'name'        => 'Lauren Bacall',
                'type'        => 'celebrity',
                'soundex'     => 'L651',
                'metaphone'   => 'LRNBKL',
                'dmetaphone1' => 'LRNPKL',
                'dmetaphone2' => 'LRNPKL'
            ],
            [
                'name'        => 'Lauren Conrad',
                'type'        => 'celebrity',
                'soundex'     => 'L652',
                'metaphone'   => 'LRNKNRT',
                'dmetaphone1' => 'LRNKNRT',
                'dmetaphone2' => 'LRNKNRT'
            ],
            [
                'name'        => 'Lea Michele',
                'type'        => 'celebrity',
                'soundex'     => 'L524',
                'metaphone'   => 'LMXL',
                'dmetaphone1' => 'LMXL',
                'dmetaphone2' => 'LMKL'
            ],
            [
                'name'        => 'LeAnn Rimes',
                'type'        => 'celebrity',
                'soundex'     => 'L565',
                'metaphone'   => 'LNRMS',
                'dmetaphone1' => 'LNRMS',
                'dmetaphone2' => 'LNRMS'
            ],
            [
                'name'        => 'LeBron James',
                'type'        => 'celebrity',
                'soundex'     => 'L165',
                'metaphone'   => 'LBRNJMS',
                'dmetaphone1' => 'LPRNJMS',
                'dmetaphone2' => 'LPRNJMS'
            ],
            [
                'name'        => 'Leighton Meester',
                'type'        => 'celebrity',
                'soundex'     => 'L235',
                'metaphone'   => 'LFTNMSTR',
                'dmetaphone1' => 'LTNMSTR',
                'dmetaphone2' => 'LTNMSTR'
            ],
            [
                'name'        => 'Lena Dunham',
                'type'        => 'celebrity',
                'soundex'     => 'L535',
                'metaphone'   => 'LNTNHM',
                'dmetaphone1' => 'LNTNM',
                'dmetaphone2' => 'LNTNM'
            ],
            [
                'name'        => 'Leonardo DiCaprio',
                'type'        => 'celebrity',
                'soundex'     => 'L563',
                'metaphone'   => 'LNRTTKPR',
                'dmetaphone1' => 'LNRTTKPR',
                'dmetaphone2' => 'LNRTTKPR'
            ],
            [
                'name'        => 'Li Na',
                'type'        => 'celebrity',
                'soundex'     => 'L500',
                'metaphone'   => 'LN',
                'dmetaphone1' => 'LN',
                'dmetaphone2' => 'LN'
            ],
            [
                'name'        => 'Liam Hemsworth',
                'type'        => 'celebrity',
                'soundex'     => 'L552',
                'metaphone'   => 'LMHMSWR0',
                'dmetaphone1' => 'LMMSR0',
                'dmetaphone2' => 'LMMSRT'
            ],
            [
                'name'        => 'Lindsay Lohan',
                'type'        => 'celebrity',
                'soundex'     => 'L532',
                'metaphone'   => 'LNTSLHN',
                'dmetaphone1' => 'LNTSLHN',
                'dmetaphone2' => 'LNTSLHN'
            ],
            [
                'name'        => 'Lionel Messi',
                'type'        => 'celebrity',
                'soundex'     => 'L545',
                'metaphone'   => 'LNLMS',
                'dmetaphone1' => 'LNLMS',
                'dmetaphone2' => 'LNLMS'
            ],
            [
                'name'        => 'Liv Tyler',
                'type'        => 'celebrity',
                'soundex'     => 'L134',
                'metaphone'   => 'LFTLR',
                'dmetaphone1' => 'LFTLR',
                'dmetaphone2' => 'LFTLR'
            ],
            [
                'name'        => 'Lucy Liu',
                'type'        => 'celebrity',
                'soundex'     => 'L240',
                'metaphone'   => 'LSL',
                'dmetaphone1' => 'LSL',
                'dmetaphone2' => 'LSL'
            ],
            [
                'name'        => 'Maggie Gyllenhaal',
                'type'        => 'celebrity',
                'soundex'     => 'M224',
                'metaphone'   => 'MKJLNHL',
                'dmetaphone1' => 'MJKLNL',
                'dmetaphone2' => 'MKJLNL'
            ],
            [
                'name'        => 'Mandy Moore',
                'type'        => 'celebrity',
                'soundex'     => 'M535',
                'metaphone'   => 'MNTMR',
                'dmetaphone1' => 'MNTMR',
                'dmetaphone2' => 'MNTMR'
            ],
            [
                'name'        => 'Maria Sharapova',
                'type'        => 'celebrity',
                'soundex'     => 'M626',
                'metaphone'   => 'MRXRPF',
                'dmetaphone1' => 'MRXRPF',
                'dmetaphone2' => 'MRXRPF'
            ],
            [
                'name'        => 'Mariah Carey',
                'type'        => 'celebrity',
                'soundex'     => 'M626',
                'metaphone'   => 'MRKR',
                'dmetaphone1' => 'MRKR',
                'dmetaphone2' => 'MRKR'
            ],
            [
                'name'        => 'Mario Lopez',
                'type'        => 'celebrity',
                'soundex'     => 'M641',
                'metaphone'   => 'MRLPS',
                'dmetaphone1' => 'MRLPS',
                'dmetaphone2' => 'MRLPS'
            ],
            [
                'name'        => 'Mark Ballas',
                'type'        => 'celebrity',
                'soundex'     => 'M621',
                'metaphone'   => 'MRKBLS',
                'dmetaphone1' => 'MRKPLS',
                'dmetaphone2' => 'MRKPLS'
            ],
            [
                'name'        => 'Mark Burnett',
                'type'        => 'celebrity',
                'soundex'     => 'M621',
                'metaphone'   => 'MRKBRNT',
                'dmetaphone1' => 'MRKPRNT',
                'dmetaphone2' => 'MRKPRNT'
            ],
            [
                'name'        => 'Mark Wahlberg',
                'type'        => 'celebrity',
                'soundex'     => 'M624',
                'metaphone'   => 'MRKWLBRK',
                'dmetaphone1' => 'MRKLPRK',
                'dmetaphone2' => 'MRKLPRK'
            ],
            [
                'name'        => 'Mary-Kate Olsen',
                'type'        => 'celebrity',
                'soundex'     => 'M623',
                'metaphone'   => 'MRKTLSN',
                'dmetaphone1' => 'MRKTLSN',
                'dmetaphone2' => 'MRKTLSN'
            ],
            [
                'name'        => 'Matt Damon',
                'type'        => 'celebrity',
                'soundex'     => 'M355',
                'metaphone'   => 'MTTMN',
                'dmetaphone1' => 'MTTMN',
                'dmetaphone2' => 'MTTMN'
            ],
            [
                'name'        => 'Matthew McConaughey',
                'type'        => 'celebrity',
                'soundex'     => 'M352',
                'metaphone'   => 'MTMKKNF',
                'dmetaphone1' => 'M0MKNK',
                'dmetaphone2' => 'MTMKNK'
            ],
            [
                'name'        => 'Megan Fox',
                'type'        => 'celebrity',
                'soundex'     => 'M251',
                'metaphone'   => 'MKNFKS',
                'dmetaphone1' => 'MKNFKS',
                'dmetaphone2' => 'MKNFKS'
            ],
            [
                'name'        => 'Meryl Streep',
                'type'        => 'celebrity',
                'soundex'     => 'M642',
                'metaphone'   => 'MRLSTRP',
                'dmetaphone1' => 'MRLSTRP',
                'dmetaphone2' => 'MRLSTRP'
            ],
            [
                'name'        => 'Michael Bay',
                'type'        => 'celebrity',
                'soundex'     => 'M241',
                'metaphone'   => 'MXLB',
                'dmetaphone1' => 'MKLP',
                'dmetaphone2' => 'MXLP'
            ],
            [
                'name'        => 'Michael Jackson',
                'type'        => 'celebrity',
                'soundex'     => 'M242',
                'metaphone'   => 'MXLJKSN',
                'dmetaphone1' => 'MKLJKSN',
                'dmetaphone2' => 'MXLJKSN'
            ],
            [
                'name'        => 'Michelle Obama',
                'type'        => 'celebrity',
                'soundex'     => 'M241',
                'metaphone'   => 'MXLBM',
                'dmetaphone1' => 'MXLPM',
                'dmetaphone2' => 'MKLPM'
            ],
            [
                'name'        => 'Michelle Williams',
                'type'        => 'celebrity',
                'soundex'     => 'M244',
                'metaphone'   => 'MXLWLMS',
                'dmetaphone1' => 'MXLLMS',
                'dmetaphone2' => 'MKLLMS'
            ],
            [
                'name'        => 'Mila Kunis',
                'type'        => 'celebrity',
                'soundex'     => 'M425',
                'metaphone'   => 'MLKNS',
                'dmetaphone1' => 'MLKNS',
                'dmetaphone2' => 'MLKNS'
            ],
            [
                'name'        => 'Miley Cyrus',
                'type'        => 'celebrity',
                'soundex'     => 'M426',
                'metaphone'   => 'MLSRS',
                'dmetaphone1' => 'MLSRS',
                'dmetaphone2' => 'MLSRS'
            ],
            [
                'name'        => 'Milo Ventimiglia',
                'type'        => 'celebrity',
                'soundex'     => 'M415',
                'metaphone'   => 'MLFNTMKL',
                'dmetaphone1' => 'MLFNTMKL',
                'dmetaphone2' => 'MLFNTML'
            ],
            [
                'name'        => 'Miranda Kerr',
                'type'        => 'celebrity',
                'soundex'     => 'M653',
                'metaphone'   => 'MRNTKR',
                'dmetaphone1' => 'MRNTKR',
                'dmetaphone2' => 'MRNTKR'
            ],
            [
                'name'        => 'Miranda Lambert',
                'type'        => 'celebrity',
                'soundex'     => 'M653',
                'metaphone'   => 'MRNTLMRT',
                'dmetaphone1' => 'MRNTLMPRT',
                'dmetaphone2' => 'MRNTLMPRT'
            ],
            [
                'name'        => 'Mischa Barton',
                'type'        => 'celebrity',
                'soundex'     => 'M216',
                'metaphone'   => 'MSXBRTN',
                'dmetaphone1' => 'MXPRTN',
                'dmetaphone2' => 'MXPRTN'
            ],
            [
                'name'        => 'Naomi Campbell',
                'type'        => 'celebrity',
                'soundex'     => 'N525',
                'metaphone'   => 'NMKMPBL',
                'dmetaphone1' => 'NMKMPL',
                'dmetaphone2' => 'NMKMPL'
            ],
            [
                'name'        => 'Naomi Watts',
                'type'        => 'celebrity',
                'soundex'     => 'N532',
                'metaphone'   => 'NMWTS',
                'dmetaphone1' => 'NMTS',
                'dmetaphone2' => 'NMTS'
            ],
            [
                'name'        => 'Natalie Portman',
                'type'        => 'celebrity',
                'soundex'     => 'N341',
                'metaphone'   => 'NTLPRTMN',
                'dmetaphone1' => 'NTLPRTMN',
                'dmetaphone2' => 'NTLPRTMN'
            ],
            [
                'name'        => 'Natasha Richardson',
                'type'        => 'celebrity',
                'soundex'     => 'N326',
                'metaphone'   => 'NTXRXRTSN',
                'dmetaphone1' => 'NTXRXRTSN',
                'dmetaphone2' => 'NTXRKRTSN'
            ],
            [
                'name'        => 'Neil Patrick Harris',
                'type'        => 'celebrity',
                'soundex'     => 'N413',
                'metaphone'   => 'NLPTRKHRS',
                'dmetaphone1' => 'NLPTRKRS',
                'dmetaphone2' => 'NLPTRKRS'
            ],
            [
                'name'        => 'Nelson Mandela',
                'type'        => 'celebrity',
                'soundex'     => 'N425',
                'metaphone'   => 'NLSNMNTL',
                'dmetaphone1' => 'NLSNMNTL',
                'dmetaphone2' => 'NLSNMNTL'
            ],
            [
                'name'        => 'Nick Lachey',
                'type'        => 'celebrity',
                'soundex'     => 'N242',
                'metaphone'   => 'NKLX',
                'dmetaphone1' => 'NKLX',
                'dmetaphone2' => 'NKLK'
            ],
            [
                'name'        => 'Nicole Kidman',
                'type'        => 'celebrity',
                'soundex'     => 'N242',
                'metaphone'   => 'NKLKTMN',
                'dmetaphone1' => 'NKLKTMN',
                'dmetaphone2' => 'NKLKTMN'
            ],
            [
                'name'        => 'Nicole Richie',
                'type'        => 'celebrity',
                'soundex'     => 'N246',
                'metaphone'   => 'NKLRX',
                'dmetaphone1' => 'NKLRX',
                'dmetaphone2' => 'NKLRK'
            ],
            [
                'name'        => 'Novak Djokovic',
                'type'        => 'celebrity',
                'soundex'     => 'N123',
                'metaphone'   => 'NFKTJKFK',
                'dmetaphone1' => 'NFKTJKFK',
                'dmetaphone2' => 'NFKTJKFK'
            ],
            [
                'name'        => 'Olivia Wilde',
                'type'        => 'celebrity',
                'soundex'     => 'O414',
                'metaphone'   => 'OLFWLT',
                'dmetaphone1' => 'ALFLT',
                'dmetaphone2' => 'ALFLT'
            ],
            [
                'name'        => 'One Direction',
                'type'        => 'celebrity',
                'soundex'     => 'O536',
                'metaphone'   => 'ONTRKXN',
                'dmetaphone1' => 'ANTRKXN',
                'dmetaphone2' => 'ANTRKXN'
            ],
            [
                'name'        => 'Oprah Winfrey',
                'type'        => 'celebrity',
                'soundex'     => 'O165',
                'metaphone'   => 'OPRWNFR',
                'dmetaphone1' => 'APRNFR',
                'dmetaphone2' => 'APRNFR'
            ],
            [
                'name'        => 'Orlando Bloom',
                'type'        => 'celebrity',
                'soundex'     => 'O645',
                'metaphone'   => 'ORLNTBLM',
                'dmetaphone1' => 'ARLNTPLM',
                'dmetaphone2' => 'ARLNTPLM'
            ],
            [
                'name'        => 'Owen Wilson',
                'type'        => 'celebrity',
                'soundex'     => 'O542',
                'metaphone'   => 'OWNWLSN',
                'dmetaphone1' => 'ANLSN',
                'dmetaphone2' => 'ANLSN'
            ],
            [
                'name'        => 'Pamela Anderson',
                'type'        => 'celebrity',
                'soundex'     => 'P545',
                'metaphone'   => 'PMLNTRSN',
                'dmetaphone1' => 'PMLNTRSN',
                'dmetaphone2' => 'PMLNTRSN'
            ],
            [
                'name'        => 'Paris Hilton',
                'type'        => 'celebrity',
                'soundex'     => 'P624',
                'metaphone'   => 'PRSHLTN',
                'dmetaphone1' => 'PRSLTN',
                'dmetaphone2' => 'PRSLTN'
            ],
            [
                'name'        => 'Patrick Dempsey',
                'type'        => 'celebrity',
                'soundex'     => 'P362',
                'metaphone'   => 'PTRKTMPS',
                'dmetaphone1' => 'PTRKTMPS',
                'dmetaphone2' => 'PTRKTMPS'
            ],
            [
                'name'        => 'Patrick Swayze',
                'type'        => 'celebrity',
                'soundex'     => 'P362',
                'metaphone'   => 'PTRKSWS',
                'dmetaphone1' => 'PTRKSS',
                'dmetaphone2' => 'PTRKSTS'
            ],
            [
                'name'        => 'Paul McCartney',
                'type'        => 'celebrity',
                'soundex'     => 'P452',
                'metaphone'   => 'PLMKKRTN',
                'dmetaphone1' => 'PLMKRTN',
                'dmetaphone2' => 'PLMKRTN'
            ],
            [
                'name'        => 'Paul Newman',
                'type'        => 'celebrity',
                'soundex'     => 'P455',
                'metaphone'   => 'PLNMN',
                'dmetaphone1' => 'PLNMN',
                'dmetaphone2' => 'PLNMN'
            ],
            [
                'name'        => 'Paul Walker',
                'type'        => 'celebrity',
                'soundex'     => 'P442',
                'metaphone'   => 'PLWLKR',
                'dmetaphone1' => 'PLLKR',
                'dmetaphone2' => 'PLLKR'
            ],
            [
                'name'        => 'Paula Abdul',
                'type'        => 'celebrity',
                'soundex'     => 'P413',
                'metaphone'   => 'PLBTL',
                'dmetaphone1' => 'PLPTL',
                'dmetaphone2' => 'PLPTL'
            ],
            [
                'name'        => 'Penn Badgley',
                'type'        => 'celebrity',
                'soundex'     => 'P513',
                'metaphone'   => 'PNBTKL',
                'dmetaphone1' => 'PNPTKL',
                'dmetaphone2' => 'PNPTKL'
            ],
            [
                'name'        => 'Penélope Cruz',
                'type'        => 'celebrity',
                'soundex'     => 'P541',
                'metaphone'   => 'PNLPKRS',
                'dmetaphone1' => 'PNLPKRS',
                'dmetaphone2' => 'PNLPKRS'
            ],
            [
                'name'        => 'Pete Wentz',
                'type'        => 'celebrity',
                'soundex'     => 'P353',
                'metaphone'   => 'PTWNTS',
                'dmetaphone1' => 'PTNTS',
                'dmetaphone2' => 'PTNTS'
            ],
            [
                'name'        => 'Peter Jackson',
                'type'        => 'celebrity',
                'soundex'     => 'P362',
                'metaphone'   => 'PTRJKSN',
                'dmetaphone1' => 'PTRJKSN',
                'dmetaphone2' => 'PTRJKSN'
            ],
            [
                'name'        => 'Peyton Manning',
                'type'        => 'celebrity',
                'soundex'     => 'P355',
                'metaphone'   => 'PTNMNNK',
                'dmetaphone1' => 'PTNMNNK',
                'dmetaphone2' => 'PTNMNNK'
            ],
            [
                'name'        => 'Pharrell Williams',
                'type'        => 'celebrity',
                'soundex'     => 'P644',
                'metaphone'   => 'FRLWLMS',
                'dmetaphone1' => 'FRLLMS',
                'dmetaphone2' => 'FRLLMS'
            ],
            [
                'name'        => 'Phil Mickelson',
                'type'        => 'celebrity',
                'soundex'     => 'P452',
                'metaphone'   => 'FLMKLSN',
                'dmetaphone1' => 'FLMKLSN',
                'dmetaphone2' => 'FLMKLSN'
            ],
            [
                'name'        => 'Philip Seymour Hoffman',
                'type'        => 'celebrity',
                'soundex'     => 'P412',
                'metaphone'   => 'FLPSMRHFMN',
                'dmetaphone1' => 'FLPSMRFMN',
                'dmetaphone2' => 'FLPSMRFMN'
            ],
            [
                'name'        => 'Pippa Middleton',
                'type'        => 'celebrity',
                'soundex'     => 'P153',
                'metaphone'   => 'PPMTLTN',
                'dmetaphone1' => 'PPMTLTN',
                'dmetaphone2' => 'PPMTLTN'
            ],
            [
                'name'        => 'Prince Harry',
                'type'        => 'celebrity',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSHR',
                'dmetaphone1' => 'PRNSR',
                'dmetaphone2' => 'PRNSR'
            ],
            [
                'name'        => 'Prince William',
                'type'        => 'celebrity',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSWLM',
                'dmetaphone1' => 'PRNSLM',
                'dmetaphone2' => 'PRNSLM'
            ],
            [
                'name'        => 'Princess Diana',
                'type'        => 'celebrity',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSSTN',
                'dmetaphone1' => 'PRNSSTN',
                'dmetaphone2' => 'PRNSSTN'
            ],
            [
                'name'        => 'Queen Latifah',
                'type'        => 'celebrity',
                'soundex'     => 'Q543',
                'metaphone'   => 'KNLTF',
                'dmetaphone1' => 'KNLTF',
                'dmetaphone2' => 'KNLTF'
            ],
            [
                'name'        => 'Rachael Ray',
                'type'        => 'celebrity',
                'soundex'     => 'R246',
                'metaphone'   => 'RXLR',
                'dmetaphone1' => 'RKLR',
                'dmetaphone2' => 'RKLR'
            ],
            [
                'name'        => 'Rachel Bilson',
                'type'        => 'celebrity',
                'soundex'     => 'R241',
                'metaphone'   => 'RXLBLSN',
                'dmetaphone1' => 'RXLPLSN',
                'dmetaphone2' => 'RKLPLSN'
            ],
            [
                'name'        => 'Rachel McAdams',
                'type'        => 'celebrity',
                'soundex'     => 'R245',
                'metaphone'   => 'RXLMKTMS',
                'dmetaphone1' => 'RXLMKTMS',
                'dmetaphone2' => 'RKLMKTMS'
            ],
            [
                'name'        => 'Rafael Nadal',
                'type'        => 'celebrity',
                'soundex'     => 'R145',
                'metaphone'   => 'RFLNTL',
                'dmetaphone1' => 'RFLNTL',
                'dmetaphone2' => 'RFLNTL'
            ],
            [
                'name'        => 'Rebecca Romijn',
                'type'        => 'celebrity',
                'soundex'     => 'R126',
                'metaphone'   => 'RBKKRMJN',
                'dmetaphone1' => 'RPKRMN',
                'dmetaphone2' => 'RPKRMN'
            ],
            [
                'name'        => 'Reese Witherspoon',
                'type'        => 'celebrity',
                'soundex'     => 'R236',
                'metaphone'   => 'RSW0RSPN',
                'dmetaphone1' => 'RS0RSPN',
                'dmetaphone2' => 'RSTRSPN'
            ],
            [
                'name'        => 'Renée Zellweger',
                'type'        => 'celebrity',
                'soundex'     => 'R524',
                'metaphone'   => 'RNSLWJR',
                'dmetaphone1' => 'RNSLJR',
                'dmetaphone2' => 'RNTSLKR'
            ],
            [
                'name'        => 'Rihanna',
                'type'        => 'celebrity',
                'soundex'     => 'R500',
                'metaphone'   => 'RHN',
                'dmetaphone1' => 'RHN',
                'dmetaphone2' => 'RHN'
            ],
            [
                'name'        => 'Robert Downey Jr',
                'type'        => 'celebrity',
                'soundex'     => 'R163',
                'metaphone'   => 'RBRTTNJR',
                'dmetaphone1' => 'RPRTTNJR',
                'dmetaphone2' => 'RPRTTNJR'
            ],
            [
                'name'        => 'Robert Downey Jr',
                'type'        => 'celebrity',
                'soundex'     => 'R163',
                'metaphone'   => 'RBRTTNJR',
                'dmetaphone1' => 'RPRTTNJR',
                'dmetaphone2' => 'RPRTTNJR'
            ],
            [
                'name'        => 'Robert Pattinson',
                'type'        => 'celebrity',
                'soundex'     => 'R163',
                'metaphone'   => 'RBRTPTNSN',
                'dmetaphone1' => 'RPRTPTNSN',
                'dmetaphone2' => 'RPRTPTNSN'
            ],
            [
                'name'        => 'Robin Williams',
                'type'        => 'celebrity',
                'soundex'     => 'R154',
                'metaphone'   => 'RBNWLMS',
                'dmetaphone1' => 'RPNLMS',
                'dmetaphone2' => 'RPNLMS'
            ],
            [
                'name'        => 'Roger Federer',
                'type'        => 'celebrity',
                'soundex'     => 'R261',
                'metaphone'   => 'RJRFTRR',
                'dmetaphone1' => 'RKRFTRR',
                'dmetaphone2' => 'RJRFTRR'
            ],
            [
                'name'        => 'Rooney Mara',
                'type'        => 'celebrity',
                'soundex'     => 'R556',
                'metaphone'   => 'RNMR',
                'dmetaphone1' => 'RNMR',
                'dmetaphone2' => 'RNMR'
            ],
            [
                'name'        => 'Rosario Dawson',
                'type'        => 'celebrity',
                'soundex'     => 'R263',
                'metaphone'   => 'RSRTSN',
                'dmetaphone1' => 'RSRTSN',
                'dmetaphone2' => 'RSRTSN'
            ],
            [
                'name'        => 'Rosie O\'Donnell',
                'type'        => 'celebrity',
                'soundex'     => 'R235',
                'metaphone'   => 'RSTNL',
                'dmetaphone1' => 'RSTNL',
                'dmetaphone2' => 'RSTNL'
            ],
            [
                'name'        => 'Rumer Willis',
                'type'        => 'celebrity',
                'soundex'     => 'R564',
                'metaphone'   => 'RMRWLS',
                'dmetaphone1' => 'RMRLS',
                'dmetaphone2' => 'RMRLS'
            ],
            [
                'name'        => 'Rush Limbaugh',
                'type'        => 'celebrity',
                'soundex'     => 'R245',
                'metaphone'   => 'RXLM',
                'dmetaphone1' => 'RXLMP',
                'dmetaphone2' => 'RXLMP'
            ],
            [
                'name'        => 'Ryan Gosling',
                'type'        => 'celebrity',
                'soundex'     => 'R522',
                'metaphone'   => 'RYNKSLNK',
                'dmetaphone1' => 'RNKSLNK',
                'dmetaphone2' => 'RNKSLNK'
            ],
            [
                'name'        => 'Ryan Phillippe',
                'type'        => 'celebrity',
                'soundex'     => 'R514',
                'metaphone'   => 'RYNFLP',
                'dmetaphone1' => 'RNFLP',
                'dmetaphone2' => 'RNFLP'
            ],
            [
                'name'        => 'Ryan Reynolds',
                'type'        => 'celebrity',
                'soundex'     => 'R565',
                'metaphone'   => 'RYNRNLTS',
                'dmetaphone1' => 'RNRNLTS',
                'dmetaphone2' => 'RNRNLTS'
            ],
            [
                'name'        => 'Ryan Seacrest',
                'type'        => 'celebrity',
                'soundex'     => 'R522',
                'metaphone'   => 'RYNSKRST',
                'dmetaphone1' => 'RNSKRST',
                'dmetaphone2' => 'RNSKRST'
            ],
            [
                'name'        => 'Salma Hayek',
                'type'        => 'celebrity',
                'soundex'     => 'S452',
                'metaphone'   => 'SLMHYK',
                'dmetaphone1' => 'SLMK',
                'dmetaphone2' => 'SLMK'
            ],
            [
                'name'        => 'Sandra Bullock',
                'type'        => 'celebrity',
                'soundex'     => 'S536',
                'metaphone'   => 'SNTRBLK',
                'dmetaphone1' => 'SNTRPLK',
                'dmetaphone2' => 'SNTRPLK'
            ],
            [
                'name'        => 'Sandra Oh',
                'type'        => 'celebrity',
                'soundex'     => 'S536',
                'metaphone'   => 'SNTR',
                'dmetaphone1' => 'SNTR',
                'dmetaphone2' => 'SNTR'
            ],
            [
                'name'        => 'Sarah Jessica Parker',
                'type'        => 'celebrity',
                'soundex'     => 'S622',
                'metaphone'   => 'SRJSKPRKR',
                'dmetaphone1' => 'SRJSKPRKR',
                'dmetaphone2' => 'SRJSKPRKR'
            ],
            [
                'name'        => 'Sarah Michelle Gellar',
                'type'        => 'celebrity',
                'soundex'     => 'S652',
                'metaphone'   => 'SRMXLJLR',
                'dmetaphone1' => 'SRMXLJLR',
                'dmetaphone2' => 'SRMKLKLR'
            ],
            [
                'name'        => 'Scarlett Johansson',
                'type'        => 'celebrity',
                'soundex'     => 'S643',
                'metaphone'   => 'SKRLTJHNSN',
                'dmetaphone1' => 'SKRLTJHNSN',
                'dmetaphone2' => 'SKRLTJHNSN'
            ],
            [
                'name'        => 'Sean "Diddy" Combs',
                'type'        => 'celebrity',
                'soundex'     => 'S533',
                'metaphone'   => 'SNTTKMS',
                'dmetaphone1' => 'SNTTKMPS',
                'dmetaphone2' => 'SNTTKMPS'
            ],
            [
                'name'        => 'Sean Hannity',
                'type'        => 'celebrity',
                'soundex'     => 'S553',
                'metaphone'   => 'SNHNT',
                'dmetaphone1' => 'SNNT',
                'dmetaphone2' => 'SNNT'
            ],
            [
                'name'        => 'Selena Gomez',
                'type'        => 'celebrity',
                'soundex'     => 'S452',
                'metaphone'   => 'SLNKMS',
                'dmetaphone1' => 'SLNKMS',
                'dmetaphone2' => 'SLNKMS'
            ],
            [
                'name'        => 'Serena Williams',
                'type'        => 'celebrity',
                'soundex'     => 'S654',
                'metaphone'   => 'SRNWLMS',
                'dmetaphone1' => 'SRNLMS',
                'dmetaphone2' => 'SRNLMS'
            ],
            [
                'name'        => 'Seth MacFarlane',
                'type'        => 'celebrity',
                'soundex'     => 'S352',
                'metaphone'   => 'S0MKFRLN',
                'dmetaphone1' => 'S0MKFRLN',
                'dmetaphone2' => 'STMKFRLN'
            ],
            [
                'name'        => 'Shania Twain',
                'type'        => 'celebrity',
                'soundex'     => 'S535',
                'metaphone'   => 'XNTWN',
                'dmetaphone1' => 'XNTN',
                'dmetaphone2' => 'XNTN'
            ],
            [
                'name'        => 'Sheryl Crow',
                'type'        => 'celebrity',
                'soundex'     => 'S642',
                'metaphone'   => 'XRLKR',
                'dmetaphone1' => 'XRLKR',
                'dmetaphone2' => 'XRLKRF'
            ],
            [
                'name'        => 'Shia LaBeouf',
                'type'        => 'celebrity',
                'soundex'     => 'S411',
                'metaphone'   => 'XLBF',
                'dmetaphone1' => 'XLPF',
                'dmetaphone2' => 'XLPF'
            ],
            [
                'name'        => 'Shirley Temple',
                'type'        => 'celebrity',
                'soundex'     => 'S643',
                'metaphone'   => 'XRLTMPL',
                'dmetaphone1' => 'XRLTMPL',
                'dmetaphone2' => 'XRLTMPL'
            ],
            [
                'name'        => 'Sienna Miller',
                'type'        => 'celebrity',
                'soundex'     => 'S554',
                'metaphone'   => 'SNMLR',
                'dmetaphone1' => 'SNMLR',
                'dmetaphone2' => 'SNMLR'
            ],
            [
                'name'        => 'Simon Cowell',
                'type'        => 'celebrity',
                'soundex'     => 'S552',
                'metaphone'   => 'SMNKWL',
                'dmetaphone1' => 'SMNKL',
                'dmetaphone2' => 'SMNKL'
            ],
            [
                'name'        => 'Sofia Vergara',
                'type'        => 'celebrity',
                'soundex'     => 'S116',
                'metaphone'   => 'SFFRKR',
                'dmetaphone1' => 'SFFRKR',
                'dmetaphone2' => 'SFFRKR'
            ],
            [
                'name'        => 'Stephen King',
                'type'        => 'celebrity',
                'soundex'     => 'S315',
                'metaphone'   => 'STFNKNK',
                'dmetaphone1' => 'STFNKNK',
                'dmetaphone2' => 'STFNKNK'
            ],
            [
                'name'        => 'Steve Jobs',
                'type'        => 'celebrity',
                'soundex'     => 'S312',
                'metaphone'   => 'STFJBS',
                'dmetaphone1' => 'STFJPS',
                'dmetaphone2' => 'STFJPS'
            ],
            [
                'name'        => 'Steven Spielberg',
                'type'        => 'celebrity',
                'soundex'     => 'S315',
                'metaphone'   => 'STFNSPLBRK',
                'dmetaphone1' => 'STFNSPLPRK',
                'dmetaphone2' => 'STFNSPLPRK'
            ],
            [
                'name'        => 'Taylor Hicks',
                'type'        => 'celebrity',
                'soundex'     => 'T462',
                'metaphone'   => 'TLRHKS',
                'dmetaphone1' => 'TLRKS',
                'dmetaphone2' => 'TLRKS'
            ],
            [
                'name'        => 'Taylor Lautner',
                'type'        => 'celebrity',
                'soundex'     => 'T464',
                'metaphone'   => 'TLRLTNR',
                'dmetaphone1' => 'TLRLTNR',
                'dmetaphone2' => 'TLRLTNR'
            ],
            [
                'name'        => 'Taylor Momsen',
                'type'        => 'celebrity',
                'soundex'     => 'T465',
                'metaphone'   => 'TLRMMSN',
                'dmetaphone1' => 'TLRMMSN',
                'dmetaphone2' => 'TLRMMSN'
            ],
            [
                'name'        => 'Taylor Swift',
                'type'        => 'celebrity',
                'soundex'     => 'T462',
                'metaphone'   => 'TLRSWFT',
                'dmetaphone1' => 'TLRSFT',
                'dmetaphone2' => 'TLRSFT'
            ],
            [
                'name'        => 'Teri Hatcher',
                'type'        => 'celebrity',
                'soundex'     => 'T632',
                'metaphone'   => 'TRHXR',
                'dmetaphone1' => 'TRXR',
                'dmetaphone2' => 'TRXR'
            ],
            [
                'name'        => 'Tiger Woods',
                'type'        => 'celebrity',
                'soundex'     => 'T263',
                'metaphone'   => 'TJRWTS',
                'dmetaphone1' => 'TJRTS',
                'dmetaphone2' => 'TKRTS'
            ],
            [
                'name'        => 'Tim McGraw',
                'type'        => 'celebrity',
                'soundex'     => 'T526',
                'metaphone'   => 'TMMKKR',
                'dmetaphone1' => 'TMMKR',
                'dmetaphone2' => 'TMMKRF'
            ],
            [
                'name'        => 'Tina Fey',
                'type'        => 'celebrity',
                'soundex'     => 'T510',
                'metaphone'   => 'TNF',
                'dmetaphone1' => 'TNF',
                'dmetaphone2' => 'TNF'
            ],
            [
                'name'        => 'Toby Keith',
                'type'        => 'celebrity',
                'soundex'     => 'T123',
                'metaphone'   => 'TBK0',
                'dmetaphone1' => 'TPK0',
                'dmetaphone2' => 'TPKT'
            ],
            [
                'name'        => 'Tom Brady',
                'type'        => 'celebrity',
                'soundex'     => 'T516',
                'metaphone'   => 'TMBRT',
                'dmetaphone1' => 'TMPRT',
                'dmetaphone2' => 'TMPRT'
            ],
            [
                'name'        => 'Tom Cruise',
                'type'        => 'celebrity',
                'soundex'     => 'T526',
                'metaphone'   => 'TMKRS',
                'dmetaphone1' => 'TMKRS',
                'dmetaphone2' => 'TMKRS'
            ],
            [
                'name'        => 'Tori Spelling',
                'type'        => 'celebrity',
                'soundex'     => 'T621',
                'metaphone'   => 'TRSPLNK',
                'dmetaphone1' => 'TRSPLNK',
                'dmetaphone2' => 'TRSPLNK'
            ],
            [
                'name'        => 'Tyler Perry',
                'type'        => 'celebrity',
                'soundex'     => 'T461',
                'metaphone'   => 'TLRPR',
                'dmetaphone1' => 'TLRPR',
                'dmetaphone2' => 'TLRPR'
            ],
            [
                'name'        => 'Tyra Banks',
                'type'        => 'celebrity',
                'soundex'     => 'T615',
                'metaphone'   => 'TRBNKS',
                'dmetaphone1' => 'TRPNKS',
                'dmetaphone2' => 'TRPNKS'
            ],
            [
                'name'        => 'Vanessa Hudgens',
                'type'        => 'celebrity',
                'soundex'     => 'V523',
                'metaphone'   => 'FNSHJNS',
                'dmetaphone1' => 'FNSJNS',
                'dmetaphone2' => 'FNSJNS'
            ],
            [
                'name'        => 'Vanessa Minnillo',
                'type'        => 'celebrity',
                'soundex'     => 'V525',
                'metaphone'   => 'FNSMNL',
                'dmetaphone1' => 'FNSMNL',
                'dmetaphone2' => 'FNSMN'
            ],
            [
                'name'        => 'Vanessa Williams',
                'type'        => 'celebrity',
                'soundex'     => 'V524',
                'metaphone'   => 'FNSWLMS',
                'dmetaphone1' => 'FNSLMS',
                'dmetaphone2' => 'FNSLMS'
            ],
            [
                'name'        => 'Veronica Roth',
                'type'        => 'celebrity',
                'soundex'     => 'V652',
                'metaphone'   => 'FRNKR0',
                'dmetaphone1' => 'FRNKR0',
                'dmetaphone2' => 'FRNKRT'
            ],
            [
                'name'        => 'Victoria Beckham',
                'type'        => 'celebrity',
                'soundex'     => 'V236',
                'metaphone'   => 'FKTRBKHM',
                'dmetaphone1' => 'FKTRPKM',
                'dmetaphone2' => 'FKTRPKM'
            ],
            [
                'name'        => 'Vin Diesel',
                'type'        => 'celebrity',
                'soundex'     => 'V532',
                'metaphone'   => 'FNTSL',
                'dmetaphone1' => 'FNTSL',
                'dmetaphone2' => 'FNTSL'
            ],
            [
                'name'        => 'Vince Vaughn',
                'type'        => 'celebrity',
                'soundex'     => 'V521',
                'metaphone'   => 'FNSFFN',
                'dmetaphone1' => 'FNSFKN',
                'dmetaphone2' => 'FNSFKN'
            ],
            [
                'name'        => 'Whitney Houston',
                'type'        => 'celebrity',
                'soundex'     => 'W352',
                'metaphone'   => 'WTNHSTN',
                'dmetaphone1' => 'ATNSTN',
                'dmetaphone2' => 'ATNSTN'
            ],
            [
                'name'        => 'Whitney Port',
                'type'        => 'celebrity',
                'soundex'     => 'W351',
                'metaphone'   => 'WTNPRT',
                'dmetaphone1' => 'ATNPRT',
                'dmetaphone2' => 'ATNPRT'
            ],
            [
                'name'        => 'Will Smith',
                'type'        => 'celebrity',
                'soundex'     => 'W425',
                'metaphone'   => 'WLSM0',
                'dmetaphone1' => 'ALSM0',
                'dmetaphone2' => 'FLSMT'
            ],
            [
                'name'        => 'Winona Ryder',
                'type'        => 'celebrity',
                'soundex'     => 'W556',
                'metaphone'   => 'WNNRTR',
                'dmetaphone1' => 'ANNRTR',
                'dmetaphone2' => 'FNNRTR'
            ],
            [
                'name'        => 'Zac Efron',
                'type'        => 'celebrity',
                'soundex'     => 'Z216',
                'metaphone'   => 'SKFRN',
                'dmetaphone1' => 'SKFRN',
                'dmetaphone2' => 'SKFRN'
            ],
            [
                'name'        => 'Zooey Deschanel',
                'type'        => 'celebrity',
                'soundex'     => 'Z325',
                'metaphone'   => 'STSXNL',
                'dmetaphone1' => 'STXNL',
                'dmetaphone2' => 'STXNL'
            ],
            [
                'name'        => 'Zoë Saldana',
                'type'        => 'celebrity',
                'soundex'     => 'Z243',
                'metaphone'   => 'SSLTN',
                'dmetaphone1' => 'SSLTN',
                'dmetaphone2' => 'SSLTN'
            ],
            [
                'name'        => 'A. Ness',
                'type'        => 'silly',
                'soundex'     => 'A520',
                'metaphone'   => 'ANS',
                'dmetaphone1' => 'ANS',
                'dmetaphone2' => 'ANS'
            ],
            [
                'name'        => 'Aaron Ottix',
                'type'        => 'silly',
                'soundex'     => 'A653',
                'metaphone'   => 'ARNTKS',
                'dmetaphone1' => 'ARNTKS',
                'dmetaphone2' => 'ARNTKS'
            ],
            [
                'name'        => 'Aaron Spacemuseum',
                'type'        => 'silly',
                'soundex'     => 'A652',
                'metaphone'   => 'ARNSPSMSM',
                'dmetaphone1' => 'ARNSPSMSM',
                'dmetaphone2' => 'ARNSPSMSM'
            ],
            [
                'name'        => 'Abel Body',
                'type'        => 'silly',
                'soundex'     => 'A141',
                'metaphone'   => 'ABLBT',
                'dmetaphone1' => 'APLPT',
                'dmetaphone2' => 'APLPT'
            ],
            [
                'name'        => 'Adam Baum',
                'type'        => 'silly',
                'soundex'     => 'A351',
                'metaphone'   => 'ATMBM',
                'dmetaphone1' => 'ATMPM',
                'dmetaphone2' => 'ATMPM'
            ],
            [
                'name'        => 'Adam Up',
                'type'        => 'silly',
                'soundex'     => 'A351',
                'metaphone'   => 'ATMP',
                'dmetaphone1' => 'ATMP',
                'dmetaphone2' => 'ATMP'
            ],
            [
                'name'        => 'Adam Zapel',
                'type'        => 'silly',
                'soundex'     => 'A352',
                'metaphone'   => 'ATMSPL',
                'dmetaphone1' => 'ATMSPL',
                'dmetaphone2' => 'ATMSPL'
            ],
            [
                'name'        => 'Adam Zapple',
                'type'        => 'silly',
                'soundex'     => 'A352',
                'metaphone'   => 'ATMSPL',
                'dmetaphone1' => 'ATMSPL',
                'dmetaphone2' => 'ATMSPL'
            ],
            [
                'name'        => 'Ahmed Adoodie',
                'type'        => 'silly',
                'soundex'     => 'A533',
                'metaphone'   => 'AMTTT',
                'dmetaphone1' => 'AMTTT',
                'dmetaphone2' => 'AMTTT'
            ],
            [
                'name'        => 'Al Acart',
                'type'        => 'silly',
                'soundex'     => 'A426',
                'metaphone'   => 'ALKRT',
                'dmetaphone1' => 'ALKRT',
                'dmetaphone2' => 'ALKRT'
            ],
            [
                'name'        => 'Al Bino',
                'type'        => 'silly',
                'soundex'     => 'A415',
                'metaphone'   => 'ALBN',
                'dmetaphone1' => 'ALPN',
                'dmetaphone2' => 'ALPN'
            ],
            [
                'name'        => 'Al Brakyonek',
                'type'        => 'silly',
                'soundex'     => 'A416',
                'metaphone'   => 'ALBRKYNK',
                'dmetaphone1' => 'ALPRKNK',
                'dmetaphone2' => 'ALPRKNK'
            ],
            [
                'name'        => 'Al Coholic',
                'type'        => 'silly',
                'soundex'     => 'A424',
                'metaphone'   => 'ALKHLK',
                'dmetaphone1' => 'ALKHLK',
                'dmetaphone2' => 'ALKHLK'
            ],
            [
                'name'        => 'Al Dente',
                'type'        => 'silly',
                'soundex'     => 'A435',
                'metaphone'   => 'ALTNT',
                'dmetaphone1' => 'ALTNT',
                'dmetaphone2' => 'ALTNT'
            ],
            [
                'name'        => 'Al Depanzyu',
                'type'        => 'silly',
                'soundex'     => 'A431',
                'metaphone'   => 'ALTPNSY',
                'dmetaphone1' => 'ALTPNS',
                'dmetaphone2' => 'ALTPNS'
            ],
            [
                'name'        => 'Al Fredo',
                'type'        => 'silly',
                'soundex'     => 'A416',
                'metaphone'   => 'ALFRT',
                'dmetaphone1' => 'ALFRT',
                'dmetaphone2' => 'ALFRT'
            ],
            [
                'name'        => 'Al Fresco',
                'type'        => 'silly',
                'soundex'     => 'A416',
                'metaphone'   => 'ALFRSK',
                'dmetaphone1' => 'ALFRSK',
                'dmetaphone2' => 'ALFRSK'
            ],
            [
                'name'        => 'Al K. Seltzer',
                'type'        => 'silly',
                'soundex'     => 'A424',
                'metaphone'   => 'ALKSLTSR',
                'dmetaphone1' => 'ALKSLTSR',
                'dmetaphone2' => 'ALKSLTSR'
            ],
            [
                'name'        => 'Al Kaseltzer',
                'type'        => 'silly',
                'soundex'     => 'A422',
                'metaphone'   => 'ALKSLTSR',
                'dmetaphone1' => 'ALKSLTSR',
                'dmetaphone2' => 'ALKSLTSR'
            ],
            [
                'name'        => 'Al Killeu',
                'type'        => 'silly',
                'soundex'     => 'A424',
                'metaphone'   => 'ALKL',
                'dmetaphone1' => 'ALKL',
                'dmetaphone2' => 'ALKL'
            ],
            [
                'name'        => 'Al Knockerup',
                'type'        => 'silly',
                'soundex'     => 'A425',
                'metaphone'   => 'ALKNKRP',
                'dmetaphone1' => 'ALKNKRP',
                'dmetaphone2' => 'ALKNKRP'
            ],
            [
                'name'        => 'Al Kykyoraz',
                'type'        => 'silly',
                'soundex'     => 'A422',
                'metaphone'   => 'ALKKYRS',
                'dmetaphone1' => 'ALKKRS',
                'dmetaphone2' => 'ALKKRTS'
            ],
            [
                'name'        => 'Al Rappu',
                'type'        => 'silly',
                'soundex'     => 'A461',
                'metaphone'   => 'ALRP',
                'dmetaphone1' => 'ALRP',
                'dmetaphone2' => 'ALRP'
            ],
            [
                'name'        => 'Al Toesacks',
                'type'        => 'silly',
                'soundex'     => 'A432',
                'metaphone'   => 'ALTSKS',
                'dmetaphone1' => 'ALTSKS',
                'dmetaphone2' => 'ALTSKS'
            ],
            [
                'name'        => 'Alf A. Romeo',
                'type'        => 'silly',
                'soundex'     => 'A416',
                'metaphone'   => 'ALFRM',
                'dmetaphone1' => 'ALFRM',
                'dmetaphone2' => 'ALFRM'
            ],
            [
                'name'        => 'Ali Gaither',
                'type'        => 'silly',
                'soundex'     => 'A423',
                'metaphone'   => 'ALK0R',
                'dmetaphone1' => 'ALK0R',
                'dmetaphone2' => 'ALKTR'
            ],
            [
                'name'        => 'Ali Katt',
                'type'        => 'silly',
                'soundex'     => 'A423',
                'metaphone'   => 'ALKT',
                'dmetaphone1' => 'ALKT',
                'dmetaphone2' => 'ALKT'
            ],
            [
                'name'        => 'Amanda Huggenkiss',
                'type'        => 'silly',
                'soundex'     => 'A553',
                'metaphone'   => 'AMNTHKNKS',
                'dmetaphone1' => 'AMNTKNKS',
                'dmetaphone2' => 'AMNTKNKS'
            ],
            [
                'name'        => 'Amanda Lay',
                'type'        => 'silly',
                'soundex'     => 'A553',
                'metaphone'   => 'AMNTL',
                'dmetaphone1' => 'AMNTL',
                'dmetaphone2' => 'AMNTL'
            ],
            [
                'name'        => 'Amanda Lynn',
                'type'        => 'silly',
                'soundex'     => 'A553',
                'metaphone'   => 'AMNTLN',
                'dmetaphone1' => 'AMNTLN',
                'dmetaphone2' => 'AMNTLN'
            ],
            [
                'name'        => 'Amber Alert',
                'type'        => 'silly',
                'soundex'     => 'A516',
                'metaphone'   => 'AMRLRT',
                'dmetaphone1' => 'AMPRLRT',
                'dmetaphone2' => 'AMPRLRT'
            ],
            [
                'name'        => 'Amber Green',
                'type'        => 'silly',
                'soundex'     => 'A516',
                'metaphone'   => 'AMRKRN',
                'dmetaphone1' => 'AMPRKRN',
                'dmetaphone2' => 'AMPRKRN'
            ],
            [
                'name'        => 'Andy Friese',
                'type'        => 'silly',
                'soundex'     => 'A531',
                'metaphone'   => 'ANTFRS',
                'dmetaphone1' => 'ANTFRS',
                'dmetaphone2' => 'ANTFRS'
            ],
            [
                'name'        => 'Angie O. Plasty',
                'type'        => 'silly',
                'soundex'     => 'A521',
                'metaphone'   => 'ANJPLST',
                'dmetaphone1' => 'ANJPLST',
                'dmetaphone2' => 'ANKPLST'
            ],
            [
                'name'        => 'Anita Bath',
                'type'        => 'silly',
                'soundex'     => 'A531',
                'metaphone'   => 'ANTB0',
                'dmetaphone1' => 'ANTP0',
                'dmetaphone2' => 'ANTPT'
            ],
            [
                'name'        => 'Anita Bohn',
                'type'        => 'silly',
                'soundex'     => 'A531',
                'metaphone'   => 'ANTBN',
                'dmetaphone1' => 'ANTPN',
                'dmetaphone2' => 'ANTPN'
            ],
            [
                'name'        => 'Anita Dick',
                'type'        => 'silly',
                'soundex'     => 'A533',
                'metaphone'   => 'ANTTK',
                'dmetaphone1' => 'ANTTK',
                'dmetaphone2' => 'ANTTK'
            ],
            [
                'name'        => 'Anita Friske',
                'type'        => 'silly',
                'soundex'     => 'A531',
                'metaphone'   => 'ANTFRSK',
                'dmetaphone1' => 'ANTFRSK',
                'dmetaphone2' => 'ANTFRSK'
            ],
            [
                'name'        => 'Anita Goodman',
                'type'        => 'silly',
                'soundex'     => 'A532',
                'metaphone'   => 'ANTKTMN',
                'dmetaphone1' => 'ANTKTMN',
                'dmetaphone2' => 'ANTKTMN'
            ],
            [
                'name'        => 'Anita Hanke',
                'type'        => 'silly',
                'soundex'     => 'A535',
                'metaphone'   => 'ANTHNK',
                'dmetaphone1' => 'ANTNK',
                'dmetaphone2' => 'ANTNK'
            ],
            [
                'name'        => 'Anita Hoare',
                'type'        => 'silly',
                'soundex'     => 'A536',
                'metaphone'   => 'ANTHR',
                'dmetaphone1' => 'ANTR',
                'dmetaphone2' => 'ANTR'
            ],
            [
                'name'        => 'Anita Job',
                'type'        => 'silly',
                'soundex'     => 'A532',
                'metaphone'   => 'ANTJB',
                'dmetaphone1' => 'ANTJP',
                'dmetaphone2' => 'ANTJP'
            ],
            [
                'name'        => 'Anita Knapp',
                'type'        => 'silly',
                'soundex'     => 'A532',
                'metaphone'   => 'ANTKNP',
                'dmetaphone1' => 'ANTKNP',
                'dmetaphone2' => 'ANTKNP'
            ],
            [
                'name'        => 'Anita Krapp',
                'type'        => 'silly',
                'soundex'     => 'A532',
                'metaphone'   => 'ANTKRP',
                'dmetaphone1' => 'ANTKRP',
                'dmetaphone2' => 'ANTKRP'
            ],
            [
                'name'        => 'Anita Lay',
                'type'        => 'silly',
                'soundex'     => 'A534',
                'metaphone'   => 'ANTL',
                'dmetaphone1' => 'ANTL',
                'dmetaphone2' => 'ANTL'
            ],
            [
                'name'        => 'Anita Little',
                'type'        => 'silly',
                'soundex'     => 'A534',
                'metaphone'   => 'ANTLTL',
                'dmetaphone1' => 'ANTLTL',
                'dmetaphone2' => 'ANTLTL'
            ],
            [
                'name'        => 'Anita Mandalay',
                'type'        => 'silly',
                'soundex'     => 'A535',
                'metaphone'   => 'ANTMNTL',
                'dmetaphone1' => 'ANTMNTL',
                'dmetaphone2' => 'ANTMNTL'
            ],
            [
                'name'        => 'Anita Mann',
                'type'        => 'silly',
                'soundex'     => 'A535',
                'metaphone'   => 'ANTMN',
                'dmetaphone1' => 'ANTMN',
                'dmetaphone2' => 'ANTMN'
            ],
            [
                'name'        => 'Anita Plummer',
                'type'        => 'silly',
                'soundex'     => 'A531',
                'metaphone'   => 'ANTPLMR',
                'dmetaphone1' => 'ANTPLMR',
                'dmetaphone2' => 'ANTPLMR'
            ],
            [
                'name'        => 'Anita Shower',
                'type'        => 'silly',
                'soundex'     => 'A532',
                'metaphone'   => 'ANTXWR',
                'dmetaphone1' => 'ANTXR',
                'dmetaphone2' => 'ANTXR'
            ],
            [
                'name'        => 'Anna Conda',
                'type'        => 'silly',
                'soundex'     => 'A525',
                'metaphone'   => 'ANKNT',
                'dmetaphone1' => 'ANKNT',
                'dmetaphone2' => 'ANKNT'
            ],
            [
                'name'        => 'Anna Fender',
                'type'        => 'silly',
                'soundex'     => 'A515',
                'metaphone'   => 'ANFNTR',
                'dmetaphone1' => 'ANFNTR',
                'dmetaphone2' => 'ANFNTR'
            ],
            [
                'name'        => 'Anna Graham',
                'type'        => 'silly',
                'soundex'     => 'A526',
                'metaphone'   => 'ANKRHM',
                'dmetaphone1' => 'ANKRHM',
                'dmetaphone2' => 'ANKRHM'
            ],
            [
                'name'        => 'Anna Lytics',
                'type'        => 'silly',
                'soundex'     => 'A543',
                'metaphone'   => 'ANLTKS',
                'dmetaphone1' => 'ANLTKS',
                'dmetaphone2' => 'ANLTKS'
            ],
            [
                'name'        => 'Anna Mull',
                'type'        => 'silly',
                'soundex'     => 'A554',
                'metaphone'   => 'ANML',
                'dmetaphone1' => 'ANML',
                'dmetaphone2' => 'ANML'
            ],
            [
                'name'        => 'Anna Prentice',
                'type'        => 'silly',
                'soundex'     => 'A516',
                'metaphone'   => 'ANPRNTS',
                'dmetaphone1' => 'ANPRNTS',
                'dmetaphone2' => 'ANPRNTS'
            ],
            [
                'name'        => 'Anna Recksiek',
                'type'        => 'silly',
                'soundex'     => 'A562',
                'metaphone'   => 'ANRKSK',
                'dmetaphone1' => 'ANRKSK',
                'dmetaphone2' => 'ANRKSK'
            ],
            [
                'name'        => 'Anna Rexia',
                'type'        => 'silly',
                'soundex'     => 'A562',
                'metaphone'   => 'ANRKS',
                'dmetaphone1' => 'ANRKS',
                'dmetaphone2' => 'ANRKS'
            ],
            [
                'name'        => 'Anna Sasin',
                'type'        => 'silly',
                'soundex'     => 'A522',
                'metaphone'   => 'ANSSN',
                'dmetaphone1' => 'ANSSN',
                'dmetaphone2' => 'ANSSN'
            ],
            [
                'name'        => 'Anna Sthesia',
                'type'        => 'silly',
                'soundex'     => 'A523',
                'metaphone'   => 'ANS0X',
                'dmetaphone1' => 'ANS0S',
                'dmetaphone2' => 'ANSTX'
            ],
            [
                'name'        => 'Anne Fibbiyon',
                'type'        => 'silly',
                'soundex'     => 'A511',
                'metaphone'   => 'ANFBYN',
                'dmetaphone1' => 'ANFPN',
                'dmetaphone2' => 'ANFPN'
            ],
            [
                'name'        => 'Anne Teak',
                'type'        => 'silly',
                'soundex'     => 'A532',
                'metaphone'   => 'ANTK',
                'dmetaphone1' => 'ANTK',
                'dmetaphone2' => 'ANTK'
            ],
            [
                'name'        => 'Annette Curtain',
                'type'        => 'silly',
                'soundex'     => 'A532',
                'metaphone'   => 'ANTKRTN',
                'dmetaphone1' => 'ANTKRTN',
                'dmetaphone2' => 'ANTKRTN'
            ],
            [
                'name'        => 'Annie Howe',
                'type'        => 'silly',
                'soundex'     => 'A500',
                'metaphone'   => 'ANHW',
                'dmetaphone1' => 'AN',
                'dmetaphone2' => 'AN'
            ],
            [
                'name'        => 'Annie Matter',
                'type'        => 'silly',
                'soundex'     => 'A553',
                'metaphone'   => 'ANMTR',
                'dmetaphone1' => 'ANMTR',
                'dmetaphone2' => 'ANMTR'
            ],
            [
                'name'        => 'April Furst',
                'type'        => 'silly',
                'soundex'     => 'A164',
                'metaphone'   => 'APRLFRST',
                'dmetaphone1' => 'APRLFRST',
                'dmetaphone2' => 'APRLFRST'
            ],
            [
                'name'        => 'April May',
                'type'        => 'silly',
                'soundex'     => 'A164',
                'metaphone'   => 'APRLM',
                'dmetaphone1' => 'APRLM',
                'dmetaphone2' => 'APRLM'
            ],
            [
                'name'        => 'April Schauer',
                'type'        => 'silly',
                'soundex'     => 'A164',
                'metaphone'   => 'APRLSXR',
                'dmetaphone1' => 'APRLXR',
                'dmetaphone2' => 'APRLXR'
            ],
            [
                'name'        => 'Aretha Holly',
                'type'        => 'silly',
                'soundex'     => 'A634',
                'metaphone'   => 'AR0HL',
                'dmetaphone1' => 'AR0L',
                'dmetaphone2' => 'ARTL'
            ],
            [
                'name'        => 'Armand Hammer',
                'type'        => 'silly',
                'soundex'     => 'A655',
                'metaphone'   => 'ARMNTHMR',
                'dmetaphone1' => 'ARMNTMR',
                'dmetaphone2' => 'ARMNTMR'
            ],
            [
                'name'        => 'Art Major',
                'type'        => 'silly',
                'soundex'     => 'A635',
                'metaphone'   => 'ARTMJR',
                'dmetaphone1' => 'ARTMJR',
                'dmetaphone2' => 'ARTMHR'
            ],
            [
                'name'        => 'Art Painter',
                'type'        => 'silly',
                'soundex'     => 'A631',
                'metaphone'   => 'ARTPNTR',
                'dmetaphone1' => 'ARTPNTR',
                'dmetaphone2' => 'ARTPNTR'
            ],
            [
                'name'        => 'Art Sellers',
                'type'        => 'silly',
                'soundex'     => 'A632',
                'metaphone'   => 'ARTSLRS',
                'dmetaphone1' => 'ARTSLRS',
                'dmetaphone2' => 'ARTSLRS'
            ],
            [
                'name'        => 'Arthur Itis',
                'type'        => 'silly',
                'soundex'     => 'A636',
                'metaphone'   => 'AR0RTS',
                'dmetaphone1' => 'AR0RTS',
                'dmetaphone2' => 'ARTRTS'
            ],
            [
                'name'        => 'Artie Choke',
                'type'        => 'silly',
                'soundex'     => 'A632',
                'metaphone'   => 'ARTXK',
                'dmetaphone1' => 'ARTXK',
                'dmetaphone2' => 'ARTKK'
            ],
            [
                'name'        => 'Arty Ficial',
                'type'        => 'silly',
                'soundex'     => 'A631',
                'metaphone'   => 'ARTFXL',
                'dmetaphone1' => 'ARTFSL',
                'dmetaphone2' => 'ARTFXL'
            ],
            [
                'name'        => 'Ash Wednesday',
                'type'        => 'silly',
                'soundex'     => 'A235',
                'metaphone'   => 'AXWTNST',
                'dmetaphone1' => 'AXTNST',
                'dmetaphone2' => 'AXTNST'
            ],
            [
                'name'        => 'B.A. Ware',
                'type'        => 'silly',
                'soundex'     => 'B600',
                'metaphone'   => 'BWR',
                'dmetaphone1' => 'PR',
                'dmetaphone2' => 'PR'
            ],
            [
                'name'        => 'Barb Ackue',
                'type'        => 'silly',
                'soundex'     => 'B612',
                'metaphone'   => 'BRBK',
                'dmetaphone1' => 'PRPK',
                'dmetaphone2' => 'PRPK'
            ],
            [
                'name'        => 'Barb Dwyer',
                'type'        => 'silly',
                'soundex'     => 'B613',
                'metaphone'   => 'BRBTYR',
                'dmetaphone1' => 'PRPTR',
                'dmetaphone2' => 'PRPTR'
            ],
            [
                'name'        => 'Barb E. Dahl',
                'type'        => 'silly',
                'soundex'     => 'B613',
                'metaphone'   => 'BRBTL',
                'dmetaphone1' => 'PRPTL',
                'dmetaphone2' => 'PRPTL'
            ],
            [
                'name'        => 'Barbara Seville',
                'type'        => 'silly',
                'soundex'     => 'B616',
                'metaphone'   => 'BRBRSFL',
                'dmetaphone1' => 'PRPRSFL',
                'dmetaphone2' => 'PRPRSFL'
            ],
            [
                'name'        => 'Barney Cull',
                'type'        => 'silly',
                'soundex'     => 'B652',
                'metaphone'   => 'BRNKL',
                'dmetaphone1' => 'PRNKL',
                'dmetaphone2' => 'PRNKL'
            ],
            [
                'name'        => 'Barry Cade',
                'type'        => 'silly',
                'soundex'     => 'B623',
                'metaphone'   => 'BRKT',
                'dmetaphone1' => 'PRKT',
                'dmetaphone2' => 'PRKT'
            ],
            [
                'name'        => 'Barry Cuda',
                'type'        => 'silly',
                'soundex'     => 'B623',
                'metaphone'   => 'BRKT',
                'dmetaphone1' => 'PRKT',
                'dmetaphone2' => 'PRKT'
            ],
            [
                'name'        => 'Barry Dalive',
                'type'        => 'silly',
                'soundex'     => 'B634',
                'metaphone'   => 'BRTLF',
                'dmetaphone1' => 'PRTLF',
                'dmetaphone2' => 'PRTLF'
            ],
            [
                'name'        => 'Barry McCockiner',
                'type'        => 'silly',
                'soundex'     => 'B652',
                'metaphone'   => 'BRMKKKNR',
                'dmetaphone1' => 'PRMKKNR',
                'dmetaphone2' => 'PRMKKNR'
            ],
            [
                'name'        => 'Barry Wine',
                'type'        => 'silly',
                'soundex'     => 'B650',
                'metaphone'   => 'BRWN',
                'dmetaphone1' => 'PRN',
                'dmetaphone2' => 'PRN'
            ],
            [
                'name'        => 'Bart Ender',
                'type'        => 'silly',
                'soundex'     => 'B635',
                'metaphone'   => 'BRTNTR',
                'dmetaphone1' => 'PRTNTR',
                'dmetaphone2' => 'PRTNTR'
            ],
            [
                'name'        => 'Bea Lowe',
                'type'        => 'silly',
                'soundex'     => 'B400',
                'metaphone'   => 'BLW',
                'dmetaphone1' => 'PL',
                'dmetaphone2' => 'PL'
            ],
            [
                'name'        => 'Bea Minor',
                'type'        => 'silly',
                'soundex'     => 'B556',
                'metaphone'   => 'BMNR',
                'dmetaphone1' => 'PMNR',
                'dmetaphone2' => 'PMNR'
            ],
            [
                'name'        => 'Bea Minor and Dee Major',
                'type'        => 'silly',
                'soundex'     => 'B556',
                'metaphone'   => 'BMNRNTTMJR',
                'dmetaphone1' => 'PMNRNTTMJR',
                'dmetaphone2' => 'PMNRNTTMHR'
            ],
            [
                'name'        => 'Bea O\'Problem',
                'type'        => 'silly',
                'soundex'     => 'B161',
                'metaphone'   => 'BPRBLM',
                'dmetaphone1' => 'PPRPLM',
                'dmetaphone2' => 'PPRPLM'
            ],
            [
                'name'        => 'Bea Ware',
                'type'        => 'silly',
                'soundex'     => 'B600',
                'metaphone'   => 'BWR',
                'dmetaphone1' => 'PR',
                'dmetaphone2' => 'PR'
            ],
            [
                'name'        => 'Beau Archer',
                'type'        => 'silly',
                'soundex'     => 'B626',
                'metaphone'   => 'BRXR',
                'dmetaphone1' => 'PRXR',
                'dmetaphone2' => 'PRKR'
            ],
            [
                'name'        => 'Beau Tie',
                'type'        => 'silly',
                'soundex'     => 'B300',
                'metaphone'   => 'BT',
                'dmetaphone1' => 'PT',
                'dmetaphone2' => 'PT'
            ],
            [
                'name'        => 'Beau Tye',
                'type'        => 'silly',
                'soundex'     => 'B300',
                'metaphone'   => 'BTY',
                'dmetaphone1' => 'PT',
                'dmetaphone2' => 'PT'
            ],
            [
                'name'        => 'Bella Ruse',
                'type'        => 'silly',
                'soundex'     => 'B462',
                'metaphone'   => 'BLRS',
                'dmetaphone1' => 'PLRS',
                'dmetaphone2' => 'PLRS'
            ],
            [
                'name'        => 'Ben Debanana',
                'type'        => 'silly',
                'soundex'     => 'B531',
                'metaphone'   => 'BNTBNN',
                'dmetaphone1' => 'PNTPNN',
                'dmetaphone2' => 'PNTPNN'
            ],
            [
                'name'        => 'Ben Dover',
                'type'        => 'silly',
                'soundex'     => 'B531',
                'metaphone'   => 'BNTFR',
                'dmetaphone1' => 'PNTFR',
                'dmetaphone2' => 'PNTFR'
            ],
            [
                'name'        => 'Ben Down',
                'type'        => 'silly',
                'soundex'     => 'B535',
                'metaphone'   => 'BNTN',
                'dmetaphone1' => 'PNTN',
                'dmetaphone2' => 'PNTN'
            ],
            [
                'name'        => 'Ben Effit',
                'type'        => 'silly',
                'soundex'     => 'B513',
                'metaphone'   => 'BNFT',
                'dmetaphone1' => 'PNFT',
                'dmetaphone2' => 'PNFT'
            ],
            [
                'name'        => 'Ben Marcata',
                'type'        => 'silly',
                'soundex'     => 'B562',
                'metaphone'   => 'BNMRKT',
                'dmetaphone1' => 'PNMRKT',
                'dmetaphone2' => 'PNMRKT'
            ],
            [
                'name'        => 'Benny Ficial',
                'type'        => 'silly',
                'soundex'     => 'B512',
                'metaphone'   => 'BNFXL',
                'dmetaphone1' => 'PNFSL',
                'dmetaphone2' => 'PNFXL'
            ],
            [
                'name'        => 'Bess Eaton',
                'type'        => 'silly',
                'soundex'     => 'B235',
                'metaphone'   => 'BSTN',
                'dmetaphone1' => 'PSTN',
                'dmetaphone2' => 'PSTN'
            ],
            [
                'name'        => 'Biff Wellington',
                'type'        => 'silly',
                'soundex'     => 'B145',
                'metaphone'   => 'BFWLNKTN',
                'dmetaphone1' => 'PFLNKTN',
                'dmetaphone2' => 'PFLNKTN'
            ],
            [
                'name'        => 'Bill Board',
                'type'        => 'silly',
                'soundex'     => 'B416',
                'metaphone'   => 'BLBRT',
                'dmetaphone1' => 'PLPRT',
                'dmetaphone2' => 'PLPRT'
            ],
            [
                'name'        => 'Bill Dabear',
                'type'        => 'silly',
                'soundex'     => 'B431',
                'metaphone'   => 'BLTBR',
                'dmetaphone1' => 'PLTPR',
                'dmetaphone2' => 'PLTPR'
            ],
            [
                'name'        => 'Bill Ding',
                'type'        => 'silly',
                'soundex'     => 'B435',
                'metaphone'   => 'BLTNK',
                'dmetaphone1' => 'PLTNK',
                'dmetaphone2' => 'PLTNK'
            ],
            [
                'name'        => 'Bill Dollar',
                'type'        => 'silly',
                'soundex'     => 'B434',
                'metaphone'   => 'BLTLR',
                'dmetaphone1' => 'PLTLR',
                'dmetaphone2' => 'PLTLR'
            ],
            [
                'name'        => 'Bill Emia',
                'type'        => 'silly',
                'soundex'     => 'B450',
                'metaphone'   => 'BLM',
                'dmetaphone1' => 'PLM',
                'dmetaphone2' => 'PLM'
            ],
            [
                'name'        => 'Bill Foldes',
                'type'        => 'silly',
                'soundex'     => 'B414',
                'metaphone'   => 'BLFLTS',
                'dmetaphone1' => 'PLFLTS',
                'dmetaphone2' => 'PLFLTS'
            ],
            [
                'name'        => 'Bill Loney',
                'type'        => 'silly',
                'soundex'     => 'B450',
                'metaphone'   => 'BLLN',
                'dmetaphone1' => 'PLLN',
                'dmetaphone2' => 'PLLN'
            ],
            [
                'name'        => 'Bill Loni',
                'type'        => 'silly',
                'soundex'     => 'B450',
                'metaphone'   => 'BLLN',
                'dmetaphone1' => 'PLLN',
                'dmetaphone2' => 'PLLN'
            ],
            [
                'name'        => 'Bill Yerds',
                'type'        => 'silly',
                'soundex'     => 'B463',
                'metaphone'   => 'BLYRTS',
                'dmetaphone1' => 'PLRTS',
                'dmetaphone2' => 'PLRTS'
            ],
            [
                'name'        => 'Billy McGuire',
                'type'        => 'silly',
                'soundex'     => 'B452',
                'metaphone'   => 'BLMKKR',
                'dmetaphone1' => 'PLMKR',
                'dmetaphone2' => 'PLMKR'
            ],
            [
                'name'        => 'Billy Rubin',
                'type'        => 'silly',
                'soundex'     => 'B461',
                'metaphone'   => 'BLRBN',
                'dmetaphone1' => 'PLRPN',
                'dmetaphone2' => 'PLRPN'
            ],
            [
                'name'        => 'Bob Apple',
                'type'        => 'silly',
                'soundex'     => 'B114',
                'metaphone'   => 'BBPL',
                'dmetaphone1' => 'PPPL',
                'dmetaphone2' => 'PPPL'
            ],
            [
                'name'        => 'Bob Frapples',
                'type'        => 'silly',
                'soundex'     => 'B161',
                'metaphone'   => 'BBFRPLS',
                'dmetaphone1' => 'PPFRPLS',
                'dmetaphone2' => 'PPFRPLS'
            ],
            [
                'name'        => 'Bob Katz',
                'type'        => 'silly',
                'soundex'     => 'B123',
                'metaphone'   => 'BBKTS',
                'dmetaphone1' => 'PPKTS',
                'dmetaphone2' => 'PPKTS'
            ],
            [
                'name'        => 'Bob Wire',
                'type'        => 'silly',
                'soundex'     => 'B160',
                'metaphone'   => 'BBWR',
                'dmetaphone1' => 'PPR',
                'dmetaphone2' => 'PPR'
            ],
            [
                'name'        => 'Bobby Pin',
                'type'        => 'silly',
                'soundex'     => 'B115',
                'metaphone'   => 'BBPN',
                'dmetaphone1' => 'PPPN',
                'dmetaphone2' => 'PPPN'
            ],
            [
                'name'        => 'Bonnie Ann Clyde',
                'type'        => 'silly',
                'soundex'     => 'B552',
                'metaphone'   => 'BNNKLT',
                'dmetaphone1' => 'PNNKLT',
                'dmetaphone2' => 'PNNKLT'
            ],
            [
                'name'        => 'Bonnie Beaver',
                'type'        => 'silly',
                'soundex'     => 'B511',
                'metaphone'   => 'BNBFR',
                'dmetaphone1' => 'PNPFR',
                'dmetaphone2' => 'PNPFR'
            ],
            [
                'name'        => 'Brad Hammer',
                'type'        => 'silly',
                'soundex'     => 'B635',
                'metaphone'   => 'BRTHMR',
                'dmetaphone1' => 'PRTMR',
                'dmetaphone2' => 'PRTMR'
            ],
            [
                'name'        => 'Brandon Cattell',
                'type'        => 'silly',
                'soundex'     => 'B653',
                'metaphone'   => 'BRNTNKTL',
                'dmetaphone1' => 'PRNTNKTL',
                'dmetaphone2' => 'PRNTNKTL'
            ],
            [
                'name'        => 'Brandon Irons',
                'type'        => 'silly',
                'soundex'     => 'B653',
                'metaphone'   => 'BRNTNRNS',
                'dmetaphone1' => 'PRNTNRNS',
                'dmetaphone2' => 'PRNTNRNS'
            ],
            [
                'name'        => 'Brandy Anne Koch',
                'type'        => 'silly',
                'soundex'     => 'B653',
                'metaphone'   => 'BRNTNKX',
                'dmetaphone1' => 'PRNTNKK',
                'dmetaphone2' => 'PRNTNKK'
            ],
            [
                'name'        => 'Brandy D. Cantor',
                'type'        => 'silly',
                'soundex'     => 'B653',
                'metaphone'   => 'BRNTTKNTR',
                'dmetaphone1' => 'PRNTTKNTR',
                'dmetaphone2' => 'PRNTTKNTR'
            ],
            [
                'name'        => 'Brighton Early',
                'type'        => 'silly',
                'soundex'     => 'B623',
                'metaphone'   => 'BRTNRL',
                'dmetaphone1' => 'PRTNRL',
                'dmetaphone2' => 'PRTNRL'
            ],
            [
                'name'        => 'Brock Lee',
                'type'        => 'silly',
                'soundex'     => 'B624',
                'metaphone'   => 'BRKL',
                'dmetaphone1' => 'PRKL',
                'dmetaphone2' => 'PRKL'
            ],
            [
                'name'        => 'Brooke Trout',
                'type'        => 'silly',
                'soundex'     => 'B623',
                'metaphone'   => 'BRKTRT',
                'dmetaphone1' => 'PRKTRT',
                'dmetaphone2' => 'PRKTRT'
            ],
            [
                'name'        => 'Buck Kinnear',
                'type'        => 'silly',
                'soundex'     => 'B256',
                'metaphone'   => 'BKKNR',
                'dmetaphone1' => 'PKKNR',
                'dmetaphone2' => 'PKKNR'
            ],
            [
                'name'        => 'Bud Jet',
                'type'        => 'silly',
                'soundex'     => 'B323',
                'metaphone'   => 'BTJT',
                'dmetaphone1' => 'PTJT',
                'dmetaphone2' => 'PTJT'
            ],
            [
                'name'        => 'Bud Light',
                'type'        => 'silly',
                'soundex'     => 'B342',
                'metaphone'   => 'BTLFT',
                'dmetaphone1' => 'PTLT',
                'dmetaphone2' => 'PTLT'
            ],
            [
                'name'        => 'Bud Wieser',
                'type'        => 'silly',
                'soundex'     => 'B326',
                'metaphone'   => 'BTWSR',
                'dmetaphone1' => 'PTSR',
                'dmetaphone2' => 'PTSR'
            ],
            [
                'name'        => 'Bud Wiser',
                'type'        => 'silly',
                'soundex'     => 'B326',
                'metaphone'   => 'BTWSR',
                'dmetaphone1' => 'PTSR',
                'dmetaphone2' => 'PTSR'
            ],
            [
                'name'        => 'Buster Cherry',
                'type'        => 'silly',
                'soundex'     => 'B236',
                'metaphone'   => 'BSTRXR',
                'dmetaphone1' => 'PSTRXR',
                'dmetaphone2' => 'PSTRKR'
            ],
            [
                'name'        => 'Buster Hyman',
                'type'        => 'silly',
                'soundex'     => 'B236',
                'metaphone'   => 'BSTRMN',
                'dmetaphone1' => 'PSTRMN',
                'dmetaphone2' => 'PSTRMN'
            ],
            [
                'name'        => 'Butchie Pantsdown',
                'type'        => 'silly',
                'soundex'     => 'B321',
                'metaphone'   => 'BXPNTSTN',
                'dmetaphone1' => 'PXPNTSTN',
                'dmetaphone2' => 'PXPNTSTN'
            ],
            [
                'name'        => 'C. Good',
                'type'        => 'silly',
                'soundex'     => 'C300',
                'metaphone'   => 'KKT',
                'dmetaphone1' => 'KKT',
                'dmetaphone2' => 'KKT'
            ],
            [
                'name'        => 'C. Senor',
                'type'        => 'silly',
                'soundex'     => 'C560',
                'metaphone'   => 'KSNR',
                'dmetaphone1' => 'KSNR',
                'dmetaphone2' => 'KSNR'
            ],
            [
                'name'        => 'C. Worthy',
                'type'        => 'silly',
                'soundex'     => 'C630',
                'metaphone'   => 'KWR0',
                'dmetaphone1' => 'KR0',
                'dmetaphone2' => 'KRT'
            ],
            [
                'name'        => 'C. Write',
                'type'        => 'silly',
                'soundex'     => 'C630',
                'metaphone'   => 'KRT',
                'dmetaphone1' => 'KRT',
                'dmetaphone2' => 'KRT'
            ],
            [
                'name'        => 'Caire Innet',
                'type'        => 'silly',
                'soundex'     => 'C653',
                'metaphone'   => 'KRNT',
                'dmetaphone1' => 'KRNT',
                'dmetaphone2' => 'KRNT'
            ],
            [
                'name'        => 'Cal Orie',
                'type'        => 'silly',
                'soundex'     => 'C460',
                'metaphone'   => 'KLR',
                'dmetaphone1' => 'KLR',
                'dmetaphone2' => 'KLR'
            ],
            [
                'name'        => 'Cal Q. Later',
                'type'        => 'silly',
                'soundex'     => 'C424',
                'metaphone'   => 'KLKLTR',
                'dmetaphone1' => 'KLKLTR',
                'dmetaphone2' => 'KLKLTR'
            ],
            [
                'name'        => 'Cam L. Toe',
                'type'        => 'silly',
                'soundex'     => 'C543',
                'metaphone'   => 'KMLT',
                'dmetaphone1' => 'KMLT',
                'dmetaphone2' => 'KMLT'
            ],
            [
                'name'        => 'Cam Payne',
                'type'        => 'silly',
                'soundex'     => 'C515',
                'metaphone'   => 'KMPN',
                'dmetaphone1' => 'KMPN',
                'dmetaphone2' => 'KMPN'
            ],
            [
                'name'        => 'Candace Spencer',
                'type'        => 'silly',
                'soundex'     => 'C532',
                'metaphone'   => 'KNTSSPNSR',
                'dmetaphone1' => 'KNTSSPNSR',
                'dmetaphone2' => 'KNTSSPNSR'
            ],
            [
                'name'        => 'Candy Barr',
                'type'        => 'silly',
                'soundex'     => 'C531',
                'metaphone'   => 'KNTBR',
                'dmetaphone1' => 'KNTPR',
                'dmetaphone2' => 'KNTPR'
            ],
            [
                'name'        => 'Candy Baskett',
                'type'        => 'silly',
                'soundex'     => 'C531',
                'metaphone'   => 'KNTBSKT',
                'dmetaphone1' => 'KNTPSKT',
                'dmetaphone2' => 'KNTPSKT'
            ],
            [
                'name'        => 'Candy Kane',
                'type'        => 'silly',
                'soundex'     => 'C532',
                'metaphone'   => 'KNTKN',
                'dmetaphone1' => 'KNTKN',
                'dmetaphone2' => 'KNTKN'
            ],
            [
                'name'        => 'Candy Sweet',
                'type'        => 'silly',
                'soundex'     => 'C532',
                'metaphone'   => 'KNTSWT',
                'dmetaphone1' => 'KNTST',
                'dmetaphone2' => 'KNTST'
            ],
            [
                'name'        => 'Cara Larm',
                'type'        => 'silly',
                'soundex'     => 'C646',
                'metaphone'   => 'KRLRM',
                'dmetaphone1' => 'KRLRM',
                'dmetaphone2' => 'KRLRM'
            ],
            [
                'name'        => 'Cara Sterio',
                'type'        => 'silly',
                'soundex'     => 'C623',
                'metaphone'   => 'KRSTR',
                'dmetaphone1' => 'KRSTR',
                'dmetaphone2' => 'KRSTR'
            ],
            [
                'name'        => 'Cara Van',
                'type'        => 'silly',
                'soundex'     => 'C615',
                'metaphone'   => 'KRFN',
                'dmetaphone1' => 'KRFN',
                'dmetaphone2' => 'KRFN'
            ],
            [
                'name'        => 'Carol Sell',
                'type'        => 'silly',
                'soundex'     => 'C642',
                'metaphone'   => 'KRLSL',
                'dmetaphone1' => 'KRLSL',
                'dmetaphone2' => 'KRLSL'
            ],
            [
                'name'        => 'Carrie Dababi',
                'type'        => 'silly',
                'soundex'     => 'C631',
                'metaphone'   => 'KRTBB',
                'dmetaphone1' => 'KRTPP',
                'dmetaphone2' => 'KRTPP'
            ],
            [
                'name'        => 'Carrie Oakey',
                'type'        => 'silly',
                'soundex'     => 'C620',
                'metaphone'   => 'KRK',
                'dmetaphone1' => 'KRK',
                'dmetaphone2' => 'KRK'
            ],
            [
                'name'        => 'Carrie R. Pigeon',
                'type'        => 'silly',
                'soundex'     => 'C661',
                'metaphone'   => 'KRRPJN',
                'dmetaphone1' => 'KRRPJN',
                'dmetaphone2' => 'KRRPKN'
            ],
            [
                'name'        => 'Casey Macy',
                'type'        => 'silly',
                'soundex'     => 'C252',
                'metaphone'   => 'KSMS',
                'dmetaphone1' => 'KSMS',
                'dmetaphone2' => 'KSMS'
            ],
            [
                'name'        => 'Cathy Derr',
                'type'        => 'silly',
                'soundex'     => 'C336',
                'metaphone'   => 'K0TR',
                'dmetaphone1' => 'K0TR',
                'dmetaphone2' => 'KTTR'
            ],
            [
                'name'        => 'Charity Case',
                'type'        => 'silly',
                'soundex'     => 'C632',
                'metaphone'   => 'XRTKS',
                'dmetaphone1' => 'XRTKS',
                'dmetaphone2' => 'XRTKS'
            ],
            [
                'name'        => 'Cheri Pitts',
                'type'        => 'silly',
                'soundex'     => 'C613',
                'metaphone'   => 'XRPTS',
                'dmetaphone1' => 'XRPTS',
                'dmetaphone2' => 'XRPTS'
            ],
            [
                'name'        => 'Chip Munk',
                'type'        => 'silly',
                'soundex'     => 'C155',
                'metaphone'   => 'XPMNK',
                'dmetaphone1' => 'XPMNK',
                'dmetaphone2' => 'XPMNK'
            ],
            [
                'name'        => 'Chip Stone',
                'type'        => 'silly',
                'soundex'     => 'C123',
                'metaphone'   => 'XPSTN',
                'dmetaphone1' => 'XPSTN',
                'dmetaphone2' => 'XPSTN'
            ],
            [
                'name'        => 'Chip Zinsalsa',
                'type'        => 'silly',
                'soundex'     => 'C125',
                'metaphone'   => 'XPSNSLS',
                'dmetaphone1' => 'XPSNSLS',
                'dmetaphone2' => 'XPSNSLS'
            ],
            [
                'name'        => 'Chris Coe',
                'type'        => 'silly',
                'soundex'     => 'C620',
                'metaphone'   => 'XRSK',
                'dmetaphone1' => 'KRSK',
                'dmetaphone2' => 'KRSK'
            ],
            [
                'name'        => 'Chris Cross',
                'type'        => 'silly',
                'soundex'     => 'C626',
                'metaphone'   => 'XRSKRS',
                'dmetaphone1' => 'KRSKRS',
                'dmetaphone2' => 'KRSKRS'
            ],
            [
                'name'        => 'Chris P. Bacon',
                'type'        => 'silly',
                'soundex'     => 'C621',
                'metaphone'   => 'XRSPBKN',
                'dmetaphone1' => 'KRSPPKN',
                'dmetaphone2' => 'KRSPPKN'
            ],
            [
                'name'        => 'Chris P. Cream',
                'type'        => 'silly',
                'soundex'     => 'C621',
                'metaphone'   => 'XRSPKRM',
                'dmetaphone1' => 'KRSPKRM',
                'dmetaphone2' => 'KRSPKRM'
            ],
            [
                'name'        => 'Christian Mingle',
                'type'        => 'silly',
                'soundex'     => 'C623',
                'metaphone'   => 'XRSXNMNKL',
                'dmetaphone1' => 'KRSXNMNKL',
                'dmetaphone2' => 'KRSXNMNKL'
            ],
            [
                'name'        => 'Chuck U. Farley',
                'type'        => 'silly',
                'soundex'     => 'C216',
                'metaphone'   => 'XKFRL',
                'dmetaphone1' => 'XKFRL',
                'dmetaphone2' => 'XKFRL'
            ],
            [
                'name'        => 'Chuck Waggon',
                'type'        => 'silly',
                'soundex'     => 'C225',
                'metaphone'   => 'XKWKN',
                'dmetaphone1' => 'XKKN',
                'dmetaphone2' => 'XKKN'
            ],
            [
                'name'        => 'Claire Annette Reed',
                'type'        => 'silly',
                'soundex'     => 'C465',
                'metaphone'   => 'KLRNTRT',
                'dmetaphone1' => 'KLRNTRT',
                'dmetaphone2' => 'KLRNTRT'
            ],
            [
                'name'        => 'Claire Voyant',
                'type'        => 'silly',
                'soundex'     => 'C461',
                'metaphone'   => 'KLRFYNT',
                'dmetaphone1' => 'KLRFNT',
                'dmetaphone2' => 'KLRFNT'
            ],
            [
                'name'        => 'Clara Fication',
                'type'        => 'silly',
                'soundex'     => 'C461',
                'metaphone'   => 'KLRFKXN',
                'dmetaphone1' => 'KLRFKXN',
                'dmetaphone2' => 'KLRFKXN'
            ],
            [
                'name'        => 'Cliff Diver',
                'type'        => 'silly',
                'soundex'     => 'C413',
                'metaphone'   => 'KLFTFR',
                'dmetaphone1' => 'KLFTFR',
                'dmetaphone2' => 'KLFTFR'
            ],
            [
                'name'        => 'Cliff Hanger',
                'type'        => 'silly',
                'soundex'     => 'C415',
                'metaphone'   => 'KLFHNJR',
                'dmetaphone1' => 'KLFNKR',
                'dmetaphone2' => 'KLFNJR'
            ],
            [
                'name'        => 'Cliff Mountain',
                'type'        => 'silly',
                'soundex'     => 'C415',
                'metaphone'   => 'KLFMNTN',
                'dmetaphone1' => 'KLFMNTN',
                'dmetaphone2' => 'KLFMNTN'
            ],
            [
                'name'        => 'Clint Torres',
                'type'        => 'silly',
                'soundex'     => 'C453',
                'metaphone'   => 'KLNTTRS',
                'dmetaphone1' => 'KLNTTRS',
                'dmetaphone2' => 'KLNTTRS'
            ],
            [
                'name'        => 'Cody Pendant',
                'type'        => 'silly',
                'soundex'     => 'C315',
                'metaphone'   => 'KTPNTNT',
                'dmetaphone1' => 'KTPNTNT',
                'dmetaphone2' => 'KTPNTNT'
            ],
            [
                'name'        => 'Cole Kutz',
                'type'        => 'silly',
                'soundex'     => 'C423',
                'metaphone'   => 'KLKTS',
                'dmetaphone1' => 'KLKTS',
                'dmetaphone2' => 'KLKTS'
            ],
            [
                'name'        => 'Cole Slaw',
                'type'        => 'silly',
                'soundex'     => 'C424',
                'metaphone'   => 'KLSL',
                'dmetaphone1' => 'KLSL',
                'dmetaphone2' => 'KLSLF'
            ],
            [
                'name'        => 'Colin Derr',
                'type'        => 'silly',
                'soundex'     => 'C453',
                'metaphone'   => 'KLNTR',
                'dmetaphone1' => 'KLNTR',
                'dmetaphone2' => 'KLNTR'
            ],
            [
                'name'        => 'Colin O\'Scopy',
                'type'        => 'silly',
                'soundex'     => 'C452',
                'metaphone'   => 'KLNSKP',
                'dmetaphone1' => 'KLNSKP',
                'dmetaphone2' => 'KLNSKP'
            ],
            [
                'name'        => 'Colin Oscopy',
                'type'        => 'silly',
                'soundex'     => 'C452',
                'metaphone'   => 'KLNSKP',
                'dmetaphone1' => 'KLNSKP',
                'dmetaphone2' => 'KLNSKP'
            ],
            [
                'name'        => 'Connie Lingus',
                'type'        => 'silly',
                'soundex'     => 'C545',
                'metaphone'   => 'KNLNKS',
                'dmetaphone1' => 'KNLNKS',
                'dmetaphone2' => 'KNLNKS'
            ],
            [
                'name'        => 'Constance Noring',
                'type'        => 'silly',
                'soundex'     => 'C523',
                'metaphone'   => 'KNSTNSNRNK',
                'dmetaphone1' => 'KNSTNSNRNK',
                'dmetaphone2' => 'KNSTNSNRNK'
            ],
            [
                'name'        => 'Cooke Edoh',
                'type'        => 'silly',
                'soundex'     => 'C230',
                'metaphone'   => 'KKT',
                'dmetaphone1' => 'KKT',
                'dmetaphone2' => 'KKT'
            ],
            [
                'name'        => 'Corey Ander',
                'type'        => 'silly',
                'soundex'     => 'C653',
                'metaphone'   => 'KRNTR',
                'dmetaphone1' => 'KRNTR',
                'dmetaphone2' => 'KRNTR'
            ],
            [
                'name'        => 'Corey O. Graff',
                'type'        => 'silly',
                'soundex'     => 'C626',
                'metaphone'   => 'KRKRF',
                'dmetaphone1' => 'KRKRF',
                'dmetaphone2' => 'KRKRF'
            ],
            [
                'name'        => 'Cory Ander',
                'type'        => 'silly',
                'soundex'     => 'C653',
                'metaphone'   => 'KRNTR',
                'dmetaphone1' => 'KRNTR',
                'dmetaphone2' => 'KRNTR'
            ],
            [
                'name'        => 'Count Dunn',
                'type'        => 'silly',
                'soundex'     => 'C535',
                'metaphone'   => 'KNTTN',
                'dmetaphone1' => 'KNTTN',
                'dmetaphone2' => 'KNTTN'
            ],
            [
                'name'        => 'Count Orff',
                'type'        => 'silly',
                'soundex'     => 'C536',
                'metaphone'   => 'KNTRF',
                'dmetaphone1' => 'KNTRF',
                'dmetaphone2' => 'KNTRF'
            ],
            [
                'name'        => 'Coyne Flatt',
                'type'        => 'silly',
                'soundex'     => 'C514',
                'metaphone'   => 'KNFLT',
                'dmetaphone1' => 'KNFLT',
                'dmetaphone2' => 'KNFLT'
            ],
            [
                'name'        => 'Craven Bacon',
                'type'        => 'silly',
                'soundex'     => 'C615',
                'metaphone'   => 'KRFNBKN',
                'dmetaphone1' => 'KRFNPKN',
                'dmetaphone2' => 'KRFNPKN'
            ],
            [
                'name'        => 'Craven Moorehead',
                'type'        => 'silly',
                'soundex'     => 'C615',
                'metaphone'   => 'KRFNMRHT',
                'dmetaphone1' => 'KRFNMRHT',
                'dmetaphone2' => 'KRFNMRHT'
            ],
            [
                'name'        => 'Crystal Ball',
                'type'        => 'silly',
                'soundex'     => 'C623',
                'metaphone'   => 'KRSTLBL',
                'dmetaphone1' => 'KRSTLPL',
                'dmetaphone2' => 'KRSTLPL'
            ],
            [
                'name'        => 'Crystal Claire Waters',
                'type'        => 'silly',
                'soundex'     => 'C623',
                'metaphone'   => 'KRSTLKLRWTRS',
                'dmetaphone1' => 'KRSTLKLRTRS',
                'dmetaphone2' => 'KRSTLKLRTRS'
            ],
            [
                'name'        => 'Crystal Glass',
                'type'        => 'silly',
                'soundex'     => 'C623',
                'metaphone'   => 'KRSTLKLS',
                'dmetaphone1' => 'KRSTLKLS',
                'dmetaphone2' => 'KRSTLKLS'
            ],
            [
                'name'        => 'Crystal Meth',
                'type'        => 'silly',
                'soundex'     => 'C623',
                'metaphone'   => 'KRSTLM0',
                'dmetaphone1' => 'KRSTLM0',
                'dmetaphone2' => 'KRSTLMT'
            ],
            [
                'name'        => 'Crystal Metheney',
                'type'        => 'silly',
                'soundex'     => 'C623',
                'metaphone'   => 'KRSTLM0N',
                'dmetaphone1' => 'KRSTLM0N',
                'dmetaphone2' => 'KRSTLMTN'
            ],
            [
                'name'        => 'Crystal Snow',
                'type'        => 'silly',
                'soundex'     => 'C623',
                'metaphone'   => 'KRSTLSN',
                'dmetaphone1' => 'KRSTLSN',
                'dmetaphone2' => 'KRSTLSNF'
            ],
            [
                'name'        => 'Curt N. Call',
                'type'        => 'silly',
                'soundex'     => 'C635',
                'metaphone'   => 'KRTNKL',
                'dmetaphone1' => 'KRTNKL',
                'dmetaphone2' => 'KRTNKL'
            ],
            [
                'name'        => 'Curtis E. Flush',
                'type'        => 'silly',
                'soundex'     => 'C632',
                'metaphone'   => 'KRTSFLX',
                'dmetaphone1' => 'KRTSFLX',
                'dmetaphone2' => 'KRTSFLX'
            ],
            [
                'name'        => 'Dan Deline',
                'type'        => 'silly',
                'soundex'     => 'D534',
                'metaphone'   => 'TNTLN',
                'dmetaphone1' => 'TNTLN',
                'dmetaphone2' => 'TNTLN'
            ],
            [
                'name'        => 'Dan Delion',
                'type'        => 'silly',
                'soundex'     => 'D534',
                'metaphone'   => 'TNTLN',
                'dmetaphone1' => 'TNTLN',
                'dmetaphone2' => 'TNTLN'
            ],
            [
                'name'        => 'Dan Druff',
                'type'        => 'silly',
                'soundex'     => 'D536',
                'metaphone'   => 'TNTRF',
                'dmetaphone1' => 'TNTRF',
                'dmetaphone2' => 'TNTRF'
            ],
            [
                'name'        => 'Dan Saul Knight',
                'type'        => 'silly',
                'soundex'     => 'D524',
                'metaphone'   => 'TNSLKNFT',
                'dmetaphone1' => 'TNSLKNT',
                'dmetaphone2' => 'TNSLKNT'
            ],
            [
                'name'        => 'Dante Sinferno',
                'type'        => 'silly',
                'soundex'     => 'D532',
                'metaphone'   => 'TNTSNFRN',
                'dmetaphone1' => 'TNTSNFRN',
                'dmetaphone2' => 'TNTSNFRN'
            ],
            [
                'name'        => 'Darren Deeds',
                'type'        => 'silly',
                'soundex'     => 'D653',
                'metaphone'   => 'TRNTTS',
                'dmetaphone1' => 'TRNTTS',
                'dmetaphone2' => 'TRNTTS'
            ],
            [
                'name'        => 'Daryl Rhea',
                'type'        => 'silly',
                'soundex'     => 'D646',
                'metaphone'   => 'TRLRH',
                'dmetaphone1' => 'TRLR',
                'dmetaphone2' => 'TRLR'
            ],
            [
                'name'        => 'Deb Utant',
                'type'        => 'silly',
                'soundex'     => 'D135',
                'metaphone'   => 'TBTNT',
                'dmetaphone1' => 'TPTNT',
                'dmetaphone2' => 'TPTNT'
            ],
            [
                'name'        => 'Dee Kay',
                'type'        => 'silly',
                'soundex'     => 'D200',
                'metaphone'   => 'TK',
                'dmetaphone1' => 'TK',
                'dmetaphone2' => 'TK'
            ],
            [
                'name'        => 'Dee Liver',
                'type'        => 'silly',
                'soundex'     => 'D416',
                'metaphone'   => 'TLFR',
                'dmetaphone1' => 'TLFR',
                'dmetaphone2' => 'TLFR'
            ],
            [
                'name'        => 'Dee Major',
                'type'        => 'silly',
                'soundex'     => 'D526',
                'metaphone'   => 'TMJR',
                'dmetaphone1' => 'TMJR',
                'dmetaphone2' => 'TMHR'
            ],
            [
                'name'        => 'Dick Bender',
                'type'        => 'silly',
                'soundex'     => 'D215',
                'metaphone'   => 'TKBNTR',
                'dmetaphone1' => 'TKPNTR',
                'dmetaphone2' => 'TKPNTR'
            ],
            [
                'name'        => 'Dick Burns',
                'type'        => 'silly',
                'soundex'     => 'D216',
                'metaphone'   => 'TKBRNS',
                'dmetaphone1' => 'TKPRNS',
                'dmetaphone2' => 'TKPRNS'
            ],
            [
                'name'        => 'Dick Bush',
                'type'        => 'silly',
                'soundex'     => 'D212',
                'metaphone'   => 'TKBX',
                'dmetaphone1' => 'TKPX',
                'dmetaphone2' => 'TKPX'
            ],
            [
                'name'        => 'Dick Face',
                'type'        => 'silly',
                'soundex'     => 'D212',
                'metaphone'   => 'TKFS',
                'dmetaphone1' => 'TKFS',
                'dmetaphone2' => 'TKFS'
            ],
            [
                'name'        => 'Dick Finder',
                'type'        => 'silly',
                'soundex'     => 'D215',
                'metaphone'   => 'TKFNTR',
                'dmetaphone1' => 'TKFNTR',
                'dmetaphone2' => 'TKFNTR'
            ],
            [
                'name'        => 'Dick Head',
                'type'        => 'silly',
                'soundex'     => 'D230',
                'metaphone'   => 'TKHT',
                'dmetaphone1' => 'TKT',
                'dmetaphone2' => 'TKT'
            ],
            [
                'name'        => 'Dick Hertz',
                'type'        => 'silly',
                'soundex'     => 'D263',
                'metaphone'   => 'TKHRTS',
                'dmetaphone1' => 'TKRTS',
                'dmetaphone2' => 'TKRTS'
            ],
            [
                'name'        => 'Dick Hunter',
                'type'        => 'silly',
                'soundex'     => 'D253',
                'metaphone'   => 'TKHNTR',
                'dmetaphone1' => 'TKNTR',
                'dmetaphone2' => 'TKNTR'
            ],
            [
                'name'        => 'Dick Hyman',
                'type'        => 'silly',
                'soundex'     => 'D255',
                'metaphone'   => 'TKMN',
                'dmetaphone1' => 'TKMN',
                'dmetaphone2' => 'TKMN'
            ],
            [
                'name'        => 'Dick Johnson',
                'type'        => 'silly',
                'soundex'     => 'D252',
                'metaphone'   => 'TKJNSN',
                'dmetaphone1' => 'TKJNSN',
                'dmetaphone2' => 'TKJNSN'
            ],
            [
                'name'        => 'Dick Long',
                'type'        => 'silly',
                'soundex'     => 'D245',
                'metaphone'   => 'TKLNK',
                'dmetaphone1' => 'TKLNK',
                'dmetaphone2' => 'TKLNK'
            ],
            [
                'name'        => 'Dick Mussell',
                'type'        => 'silly',
                'soundex'     => 'D252',
                'metaphone'   => 'TKMSL',
                'dmetaphone1' => 'TKMSL',
                'dmetaphone2' => 'TKMSL'
            ],
            [
                'name'        => 'Dick Pole',
                'type'        => 'silly',
                'soundex'     => 'D214',
                'metaphone'   => 'TKPL',
                'dmetaphone1' => 'TKPL',
                'dmetaphone2' => 'TKPL'
            ],
            [
                'name'        => 'Dick Pound',
                'type'        => 'silly',
                'soundex'     => 'D215',
                'metaphone'   => 'TKPNT',
                'dmetaphone1' => 'TKPNT',
                'dmetaphone2' => 'TKPNT'
            ],
            [
                'name'        => 'Dick Rasch',
                'type'        => 'silly',
                'soundex'     => 'D262',
                'metaphone'   => 'TKRSX',
                'dmetaphone1' => 'TKRX',
                'dmetaphone2' => 'TKRX'
            ],
            [
                'name'        => 'Dick Swett',
                'type'        => 'silly',
                'soundex'     => 'D230',
                'metaphone'   => 'TKSWT',
                'dmetaphone1' => 'TKST',
                'dmetaphone2' => 'TKST'
            ],
            [
                'name'        => 'Dick Tator',
                'type'        => 'silly',
                'soundex'     => 'D233',
                'metaphone'   => 'TKTTR',
                'dmetaphone1' => 'TKTTR',
                'dmetaphone2' => 'TKTTR'
            ],
            [
                'name'        => 'Dick Trickle',
                'type'        => 'silly',
                'soundex'     => 'D236',
                'metaphone'   => 'TKTRKL',
                'dmetaphone1' => 'TKTRKL',
                'dmetaphone2' => 'TKTRKL'
            ],
            [
                'name'        => 'Dick Wood',
                'type'        => 'silly',
                'soundex'     => 'D230',
                'metaphone'   => 'TKWT',
                'dmetaphone1' => 'TKT',
                'dmetaphone2' => 'TKT'
            ],
            [
                'name'        => 'Dick Yamidda',
                'type'        => 'silly',
                'soundex'     => 'D253',
                'metaphone'   => 'TKYMT',
                'dmetaphone1' => 'TKMT',
                'dmetaphone2' => 'TKMT'
            ],
            [
                'name'        => 'Dickson Yamada',
                'type'        => 'silly',
                'soundex'     => 'D255',
                'metaphone'   => 'TKSNYMT',
                'dmetaphone1' => 'TKSNMT',
                'dmetaphone2' => 'TKSNMT'
            ],
            [
                'name'        => 'Dilbert Pickles',
                'type'        => 'silly',
                'soundex'     => 'D416',
                'metaphone'   => 'TLBRTPKLS',
                'dmetaphone1' => 'TLPRTPKLS',
                'dmetaphone2' => 'TLPRTPKLS'
            ],
            [
                'name'        => 'Dinah Soares',
                'type'        => 'silly',
                'soundex'     => 'D526',
                'metaphone'   => 'TNSRS',
                'dmetaphone1' => 'TNSRS',
                'dmetaphone2' => 'TNSRS'
            ],
            [
                'name'        => 'Dom Inate',
                'type'        => 'silly',
                'soundex'     => 'D553',
                'metaphone'   => 'TMNT',
                'dmetaphone1' => 'TMNT',
                'dmetaphone2' => 'TMNT'
            ],
            [
                'name'        => 'Don Key',
                'type'        => 'silly',
                'soundex'     => 'D520',
                'metaphone'   => 'TNK',
                'dmetaphone1' => 'TNK',
                'dmetaphone2' => 'TNK'
            ],
            [
                'name'        => 'Don Stairs',
                'type'        => 'silly',
                'soundex'     => 'D523',
                'metaphone'   => 'TNSTRS',
                'dmetaphone1' => 'TNSTRS',
                'dmetaphone2' => 'TNSTRS'
            ],
            [
                'name'        => 'Donald Duck',
                'type'        => 'silly',
                'soundex'     => 'D543',
                'metaphone'   => 'TNLTTK',
                'dmetaphone1' => 'TNLTTK',
                'dmetaphone2' => 'TNLTTK'
            ],
            [
                'name'        => 'Donatella Nobatti',
                'type'        => 'silly',
                'soundex'     => 'D534',
                'metaphone'   => 'TNTLNBT',
                'dmetaphone1' => 'TNTLNPT',
                'dmetaphone2' => 'TNTLNPT'
            ],
            [
                'name'        => 'Donny Brook',
                'type'        => 'silly',
                'soundex'     => 'D516',
                'metaphone'   => 'TNBRK',
                'dmetaphone1' => 'TNPRK',
                'dmetaphone2' => 'TNPRK'
            ],
            [
                'name'        => 'Doris Schutt',
                'type'        => 'silly',
                'soundex'     => 'D623',
                'metaphone'   => 'TRSSXT',
                'dmetaphone1' => 'TRSXT',
                'dmetaphone2' => 'TRSXT'
            ],
            [
                'name'        => 'Doug Graves',
                'type'        => 'silly',
                'soundex'     => 'D261',
                'metaphone'   => 'TKKRFS',
                'dmetaphone1' => 'TKKRFS',
                'dmetaphone2' => 'TKKRFS'
            ],
            [
                'name'        => 'Doug Hole',
                'type'        => 'silly',
                'soundex'     => 'D240',
                'metaphone'   => 'TKHL',
                'dmetaphone1' => 'TKL',
                'dmetaphone2' => 'TKL'
            ],
            [
                'name'        => 'Doug Lee Duckling',
                'type'        => 'silly',
                'soundex'     => 'D243',
                'metaphone'   => 'TKLTKLNK',
                'dmetaphone1' => 'TKLTKLNK',
                'dmetaphone2' => 'TKLTKLNK'
            ],
            [
                'name'        => 'Doug Out',
                'type'        => 'silly',
                'soundex'     => 'D230',
                'metaphone'   => 'TKT',
                'dmetaphone1' => 'TKT',
                'dmetaphone2' => 'TKT'
            ],
            [
                'name'        => 'Doug Updegrave',
                'type'        => 'silly',
                'soundex'     => 'D213',
                'metaphone'   => 'TKPTKRF',
                'dmetaphone1' => 'TKPTKRF',
                'dmetaphone2' => 'TKPTKRF'
            ],
            [
                'name'        => 'Doug Witherspoon',
                'type'        => 'silly',
                'soundex'     => 'D236',
                'metaphone'   => 'TKW0RSPN',
                'dmetaphone1' => 'TK0RSPN',
                'dmetaphone2' => 'TKTRSPN'
            ],
            [
                'name'        => 'Douglas Furr',
                'type'        => 'silly',
                'soundex'     => 'D242',
                'metaphone'   => 'TKLSFR',
                'dmetaphone1' => 'TKLSFR',
                'dmetaphone2' => 'TKLSFR'
            ],
            [
                'name'        => 'Drew P. Wiener',
                'type'        => 'silly',
                'soundex'     => 'D615',
                'metaphone'   => 'TRPWNR',
                'dmetaphone1' => 'TRPNR',
                'dmetaphone2' => 'TRPNR'
            ],
            [
                'name'        => 'Drew Peacock',
                'type'        => 'silly',
                'soundex'     => 'D612',
                'metaphone'   => 'TRPKK',
                'dmetaphone1' => 'TRPKK',
                'dmetaphone2' => 'TRPKK'
            ],
            [
                'name'        => 'Duane Pipe',
                'type'        => 'silly',
                'soundex'     => 'D511',
                'metaphone'   => 'TNPP',
                'dmetaphone1' => 'TNPP',
                'dmetaphone2' => 'TNPP'
            ],
            [
                'name'        => 'Dusty Carr',
                'type'        => 'silly',
                'soundex'     => 'D232',
                'metaphone'   => 'TSTKR',
                'dmetaphone1' => 'TSTKR',
                'dmetaphone2' => 'TSTKR'
            ],
            [
                'name'        => 'Dusty Rhodes',
                'type'        => 'silly',
                'soundex'     => 'D236',
                'metaphone'   => 'TSTRHTS',
                'dmetaphone1' => 'TSTRTS',
                'dmetaphone2' => 'TSTRTS'
            ],
            [
                'name'        => 'Dusty Sandmann',
                'type'        => 'silly',
                'soundex'     => 'D232',
                'metaphone'   => 'TSTSNTMN',
                'dmetaphone1' => 'TSTSNTMN',
                'dmetaphone2' => 'TSTSNTMN'
            ],
            [
                'name'        => 'Dusty Storm',
                'type'        => 'silly',
                'soundex'     => 'D232',
                'metaphone'   => 'TSTSTRM',
                'dmetaphone1' => 'TSTSTRM',
                'dmetaphone2' => 'TSTSTRM'
            ],
            [
                'name'        => 'Earl E. Bird',
                'type'        => 'silly',
                'soundex'     => 'E641',
                'metaphone'   => 'ERLBRT',
                'dmetaphone1' => 'ARLPRT',
                'dmetaphone2' => 'ARLPRT'
            ],
            [
                'name'        => 'Earl E. Riser',
                'type'        => 'silly',
                'soundex'     => 'E646',
                'metaphone'   => 'ERLRSR',
                'dmetaphone1' => 'ARLRSR',
                'dmetaphone2' => 'ARLRSR'
            ],
            [
                'name'        => 'Earl Lee Riser',
                'type'        => 'silly',
                'soundex'     => 'E646',
                'metaphone'   => 'ERLLRSR',
                'dmetaphone1' => 'ARLLRSR',
                'dmetaphone2' => 'ARLLRSR'
            ],
            [
                'name'        => 'Easton West',
                'type'        => 'silly',
                'soundex'     => 'E235',
                'metaphone'   => 'ESTNWST',
                'dmetaphone1' => 'ASTNST',
                'dmetaphone2' => 'ASTNST'
            ],
            [
                'name'        => 'Eaton Wright',
                'type'        => 'silly',
                'soundex'     => 'E356',
                'metaphone'   => 'ETNRFT',
                'dmetaphone1' => 'ATNRT',
                'dmetaphone2' => 'ATNRT'
            ],
            [
                'name'        => 'Ed Itorial',
                'type'        => 'silly',
                'soundex'     => 'E336',
                'metaphone'   => 'ETTRL',
                'dmetaphone1' => 'ATTRL',
                'dmetaphone2' => 'ATTRL'
            ],
            [
                'name'        => 'Ed U. Cation',
                'type'        => 'silly',
                'soundex'     => 'E323',
                'metaphone'   => 'ETKXN',
                'dmetaphone1' => 'ATKXN',
                'dmetaphone2' => 'ATKXN'
            ],
            [
                'name'        => 'Ed Zupp',
                'type'        => 'silly',
                'soundex'     => 'E321',
                'metaphone'   => 'ETSP',
                'dmetaphone1' => 'ATSP',
                'dmetaphone2' => 'ATSP'
            ],
            [
                'name'        => 'Eda Torial',
                'type'        => 'silly',
                'soundex'     => 'E336',
                'metaphone'   => 'ETTRL',
                'dmetaphone1' => 'ATTRL',
                'dmetaphone2' => 'ATTRL'
            ],
            [
                'name'        => 'Eddie Bull',
                'type'        => 'silly',
                'soundex'     => 'E314',
                'metaphone'   => 'ETBL',
                'dmetaphone1' => 'ATPL',
                'dmetaphone2' => 'ATPL'
            ],
            [
                'name'        => 'Eddy Kitt',
                'type'        => 'silly',
                'soundex'     => 'E323',
                'metaphone'   => 'ETKT',
                'dmetaphone1' => 'ATKT',
                'dmetaphone2' => 'ATKT'
            ],
            [
                'name'        => 'Eileen Dover',
                'type'        => 'silly',
                'soundex'     => 'E453',
                'metaphone'   => 'ELNTFR',
                'dmetaphone1' => 'ALNTFR',
                'dmetaphone2' => 'ALNTFR'
            ],
            [
                'name'        => 'Ella Vader',
                'type'        => 'silly',
                'soundex'     => 'E413',
                'metaphone'   => 'ELFTR',
                'dmetaphone1' => 'ALFTR',
                'dmetaphone2' => 'ALFTR'
            ],
            [
                'name'        => 'Ella Vator',
                'type'        => 'silly',
                'soundex'     => 'E413',
                'metaphone'   => 'ELFTR',
                'dmetaphone1' => 'ALFTR',
                'dmetaphone2' => 'ALFTR'
            ],
            [
                'name'        => 'Elle Bowdrop',
                'type'        => 'silly',
                'soundex'     => 'E413',
                'metaphone'   => 'ELBTRP',
                'dmetaphone1' => 'ALPTRP',
                'dmetaphone2' => 'ALPTRP'
            ],
            [
                'name'        => 'Ellis Dee',
                'type'        => 'silly',
                'soundex'     => 'E423',
                'metaphone'   => 'ELST',
                'dmetaphone1' => 'ALST',
                'dmetaphone2' => 'ALST'
            ],
            [
                'name'        => 'Emma Royds',
                'type'        => 'silly',
                'soundex'     => 'E563',
                'metaphone'   => 'EMRTS',
                'dmetaphone1' => 'AMRTS',
                'dmetaphone2' => 'AMRTS'
            ],
            [
                'name'        => 'Eric Shinn',
                'type'        => 'silly',
                'soundex'     => 'E625',
                'metaphone'   => 'ERKXN',
                'dmetaphone1' => 'ARKXN',
                'dmetaphone2' => 'ARKXN'
            ],
            [
                'name'        => 'Eric Shun',
                'type'        => 'silly',
                'soundex'     => 'E625',
                'metaphone'   => 'ERKXN',
                'dmetaphone1' => 'ARKXN',
                'dmetaphone2' => 'ARKXN'
            ],
            [
                'name'        => 'Estelle Hertz',
                'type'        => 'silly',
                'soundex'     => 'E234',
                'metaphone'   => 'ESTLHRTS',
                'dmetaphone1' => 'ASTLRTS',
                'dmetaphone2' => 'ASTLRTS'
            ],
            [
                'name'        => 'Eura Snotball',
                'type'        => 'silly',
                'soundex'     => 'E625',
                'metaphone'   => 'ERSNTBL',
                'dmetaphone1' => 'ARSNTPL',
                'dmetaphone2' => 'ARSNTPL'
            ],
            [
                'name'        => 'Evan Keel',
                'type'        => 'silly',
                'soundex'     => 'E152',
                'metaphone'   => 'EFNKL',
                'dmetaphone1' => 'AFNKL',
                'dmetaphone2' => 'AFNKL'
            ],
            [
                'name'        => 'Evan Shlee',
                'type'        => 'silly',
                'soundex'     => 'E152',
                'metaphone'   => 'EFNXL',
                'dmetaphone1' => 'AFNXL',
                'dmetaphone2' => 'AFNXL'
            ],
            [
                'name'        => 'Faith Christian',
                'type'        => 'silly',
                'soundex'     => 'F326',
                'metaphone'   => 'F0XRSXN',
                'dmetaphone1' => 'F0XRSXN',
                'dmetaphone2' => 'FTKRSXN'
            ],
            [
                'name'        => 'Fanny O\'Rear',
                'type'        => 'silly',
                'soundex'     => 'F566',
                'metaphone'   => 'FNRR',
                'dmetaphone1' => 'FNRR',
                'dmetaphone2' => 'FNRR'
            ],
            [
                'name'        => 'Farrah Moan',
                'type'        => 'silly',
                'soundex'     => 'F655',
                'metaphone'   => 'FRMN',
                'dmetaphone1' => 'FRMN',
                'dmetaphone2' => 'FRMN'
            ],
            [
                'name'        => 'Father A. Long',
                'type'        => 'silly',
                'soundex'     => 'F364',
                'metaphone'   => 'F0RLNK',
                'dmetaphone1' => 'F0RLNK',
                'dmetaphone2' => 'FTRLNK'
            ],
            [
                'name'        => 'Faye Daway',
                'type'        => 'silly',
                'soundex'     => 'F300',
                'metaphone'   => 'FYTW',
                'dmetaphone1' => 'FT',
                'dmetaphone2' => 'FT'
            ],
            [
                'name'        => 'Faye Sbook',
                'type'        => 'silly',
                'soundex'     => 'F212',
                'metaphone'   => 'FYSBK',
                'dmetaphone1' => 'FSPK',
                'dmetaphone2' => 'FSPK'
            ],
            [
                'name'        => 'Ferris Wheeler',
                'type'        => 'silly',
                'soundex'     => 'F624',
                'metaphone'   => 'FRSHLR',
                'dmetaphone1' => 'FRSLR',
                'dmetaphone2' => 'FRSLR'
            ],
            [
                'name'        => 'Flint Sparks',
                'type'        => 'silly',
                'soundex'     => 'F453',
                'metaphone'   => 'FLNTSPRKS',
                'dmetaphone1' => 'FLNTSPRKS',
                'dmetaphone2' => 'FLNTSPRKS'
            ],
            [
                'name'        => 'Fonda Dicks',
                'type'        => 'silly',
                'soundex'     => 'F533',
                'metaphone'   => 'FNTTKS',
                'dmetaphone1' => 'FNTTKS',
                'dmetaphone2' => 'FNTTKS'
            ],
            [
                'name'        => 'Ford Parker',
                'type'        => 'silly',
                'soundex'     => 'F631',
                'metaphone'   => 'FRTPRKR',
                'dmetaphone1' => 'FRTPRKR',
                'dmetaphone2' => 'FRTPRKR'
            ],
            [
                'name'        => 'Forrest Green',
                'type'        => 'silly',
                'soundex'     => 'F623',
                'metaphone'   => 'FRSTKRN',
                'dmetaphone1' => 'FRSTKRN',
                'dmetaphone2' => 'FRSTKRN'
            ],
            [
                'name'        => 'Foster Child',
                'type'        => 'silly',
                'soundex'     => 'F236',
                'metaphone'   => 'FSTRXLT',
                'dmetaphone1' => 'FSTRXLT',
                'dmetaphone2' => 'FSTRKLT'
            ],
            [
                'name'        => 'Frank Enstein',
                'type'        => 'silly',
                'soundex'     => 'F652',
                'metaphone'   => 'FRNKNSTN',
                'dmetaphone1' => 'FRNKNSTN',
                'dmetaphone2' => 'FRNKNSTN'
            ],
            [
                'name'        => 'Frank Furter',
                'type'        => 'silly',
                'soundex'     => 'F652',
                'metaphone'   => 'FRNKFRTR',
                'dmetaphone1' => 'FRNKFRTR',
                'dmetaphone2' => 'FRNKFRTR'
            ],
            [
                'name'        => 'Frank N. Stein',
                'type'        => 'silly',
                'soundex'     => 'F652',
                'metaphone'   => 'FRNKNSTN',
                'dmetaphone1' => 'FRNKNSTN',
                'dmetaphone2' => 'FRNKNSTN'
            ],
            [
                'name'        => 'Frank Senbeans',
                'type'        => 'silly',
                'soundex'     => 'F652',
                'metaphone'   => 'FRNKSNBNS',
                'dmetaphone1' => 'FRNKSNPNS',
                'dmetaphone2' => 'FRNKSNPNS'
            ],
            [
                'name'        => 'Fred Attchini',
                'type'        => 'silly',
                'soundex'     => 'F633',
                'metaphone'   => 'FRTTXN',
                'dmetaphone1' => 'FRTTXN',
                'dmetaphone2' => 'FRTTKN'
            ],
            [
                'name'        => 'Fred Audster',
                'type'        => 'silly',
                'soundex'     => 'F633',
                'metaphone'   => 'FRTTSTR',
                'dmetaphone1' => 'FRTTSTR',
                'dmetaphone2' => 'FRTTSTR'
            ],
            [
                'name'        => 'Gabe Lackmen',
                'type'        => 'silly',
                'soundex'     => 'G142',
                'metaphone'   => 'KBLKMN',
                'dmetaphone1' => 'KPLKMN',
                'dmetaphone2' => 'KPLKMN'
            ],
            [
                'name'        => 'Gae Hooker',
                'type'        => 'silly',
                'soundex'     => 'G260',
                'metaphone'   => 'KHKR',
                'dmetaphone1' => 'KKR',
                'dmetaphone2' => 'KKR'
            ],
            [
                'name'        => 'Gail Force',
                'type'        => 'silly',
                'soundex'     => 'G416',
                'metaphone'   => 'KLFRS',
                'dmetaphone1' => 'KLFRS',
                'dmetaphone2' => 'KLFRS'
            ],
            [
                'name'        => 'Gail Forcewind',
                'type'        => 'silly',
                'soundex'     => 'G416',
                'metaphone'   => 'KLFRSWNT',
                'dmetaphone1' => 'KLFRSNT',
                'dmetaphone2' => 'KLFRSNT'
            ],
            [
                'name'        => 'Gail Storm',
                'type'        => 'silly',
                'soundex'     => 'G423',
                'metaphone'   => 'KLSTRM',
                'dmetaphone1' => 'KLSTRM',
                'dmetaphone2' => 'KLSTRM'
            ],
            [
                'name'        => 'Gaye Barr',
                'type'        => 'silly',
                'soundex'     => 'G160',
                'metaphone'   => 'KYBR',
                'dmetaphone1' => 'KPR',
                'dmetaphone2' => 'KPR'
            ],
            [
                'name'        => 'Gaye Jolly',
                'type'        => 'silly',
                'soundex'     => 'G240',
                'metaphone'   => 'KYJL',
                'dmetaphone1' => 'KJL',
                'dmetaphone2' => 'KJL'
            ],
            [
                'name'        => 'Gene Jacket',
                'type'        => 'silly',
                'soundex'     => 'G522',
                'metaphone'   => 'JNJKT',
                'dmetaphone1' => 'JNJKT',
                'dmetaphone2' => 'KNJKT'
            ],
            [
                'name'        => 'Gene Poole',
                'type'        => 'silly',
                'soundex'     => 'G514',
                'metaphone'   => 'JNPL',
                'dmetaphone1' => 'JNPL',
                'dmetaphone2' => 'KNPL'
            ],
            [
                'name'        => 'Gene Therapy',
                'type'        => 'silly',
                'soundex'     => 'G536',
                'metaphone'   => 'JN0RP',
                'dmetaphone1' => 'JN0RP',
                'dmetaphone2' => 'KNTRP'
            ],
            [
                'name'        => 'Genie Inabottle',
                'type'        => 'silly',
                'soundex'     => 'G551',
                'metaphone'   => 'JNNBTL',
                'dmetaphone1' => 'JNNPTL',
                'dmetaphone2' => 'KNNPTL'
            ],
            [
                'name'        => 'Gerry Atric',
                'type'        => 'silly',
                'soundex'     => 'G636',
                'metaphone'   => 'JRTRK',
                'dmetaphone1' => 'KRTRK',
                'dmetaphone2' => 'JRTRK'
            ],
            [
                'name'        => 'Gil Fish',
                'type'        => 'silly',
                'soundex'     => 'G412',
                'metaphone'   => 'JLFX',
                'dmetaphone1' => 'KLFX',
                'dmetaphone2' => 'JLFX'
            ],
            [
                'name'        => 'Ginger Rayl',
                'type'        => 'silly',
                'soundex'     => 'G526',
                'metaphone'   => 'JNJRRL',
                'dmetaphone1' => 'KNKRRL',
                'dmetaphone2' => 'JNJRRL'
            ],
            [
                'name'        => 'Ginger Snapp',
                'type'        => 'silly',
                'soundex'     => 'G526',
                'metaphone'   => 'JNJRSNP',
                'dmetaphone1' => 'KNKRSNP',
                'dmetaphone2' => 'JNJRSNP'
            ],
            [
                'name'        => 'Ginger Vitus',
                'type'        => 'silly',
                'soundex'     => 'G526',
                'metaphone'   => 'JNJRFTS',
                'dmetaphone1' => 'KNKRFTS',
                'dmetaphone2' => 'JNJRFTS'
            ],
            [
                'name'        => 'Gio Metric',
                'type'        => 'silly',
                'soundex'     => 'G536',
                'metaphone'   => 'JMTRK',
                'dmetaphone1' => 'JMTRK',
                'dmetaphone2' => 'KMTRK'
            ],
            [
                'name'        => 'Graham Cracker',
                'type'        => 'silly',
                'soundex'     => 'G652',
                'metaphone'   => 'KRHMKRKR',
                'dmetaphone1' => 'KRHMKRKR',
                'dmetaphone2' => 'KRHMKRKR'
            ],
            [
                'name'        => 'Greta Life',
                'type'        => 'silly',
                'soundex'     => 'G634',
                'metaphone'   => 'KRTLF',
                'dmetaphone1' => 'KRTLF',
                'dmetaphone2' => 'KRTLF'
            ],
            [
                'name'        => 'Gustav Wind',
                'type'        => 'silly',
                'soundex'     => 'G231',
                'metaphone'   => 'KSTFWNT',
                'dmetaphone1' => 'KSTFNT',
                'dmetaphone2' => 'KSTFNT'
            ],
            [
                'name'        => 'Hal Appeno',
                'type'        => 'silly',
                'soundex'     => 'H415',
                'metaphone'   => 'HLPN',
                'dmetaphone1' => 'HLPN',
                'dmetaphone2' => 'HLPN'
            ],
            [
                'name'        => 'Hal Jalykakik',
                'type'        => 'silly',
                'soundex'     => 'H424',
                'metaphone'   => 'HLJLKKK',
                'dmetaphone1' => 'HLJLKKK',
                'dmetaphone2' => 'HLJLKKK'
            ],
            [
                'name'        => 'Ham Burger',
                'type'        => 'silly',
                'soundex'     => 'H516',
                'metaphone'   => 'HMBRJR',
                'dmetaphone1' => 'HMPRKR',
                'dmetaphone2' => 'HMPRJR'
            ],
            [
                'name'        => 'Hamilton Burger',
                'type'        => 'silly',
                'soundex'     => 'H543',
                'metaphone'   => 'HMLTNBRJR',
                'dmetaphone1' => 'HMLTNPRKR',
                'dmetaphone2' => 'HMLTNPRJR'
            ],
            [
                'name'        => 'Hank Deshank',
                'type'        => 'silly',
                'soundex'     => 'H523',
                'metaphone'   => 'HNKTXNK',
                'dmetaphone1' => 'HNKTXNK',
                'dmetaphone2' => 'HNKTXNK'
            ],
            [
                'name'        => 'Hans Olo',
                'type'        => 'silly',
                'soundex'     => 'H524',
                'metaphone'   => 'HNSL',
                'dmetaphone1' => 'HNSL',
                'dmetaphone2' => 'HNSL'
            ],
            [
                'name'        => 'Hap E. Birthday',
                'type'        => 'silly',
                'soundex'     => 'H116',
                'metaphone'   => 'HPBR0T',
                'dmetaphone1' => 'HPPR0T',
                'dmetaphone2' => 'HPPRTT'
            ],
            [
                'name'        => 'Harden Thicke',
                'type'        => 'silly',
                'soundex'     => 'H635',
                'metaphone'   => 'HRTN0K',
                'dmetaphone1' => 'HRTN0K',
                'dmetaphone2' => 'HRTNTK'
            ],
            [
                'name'        => 'Harold Assman',
                'type'        => 'silly',
                'soundex'     => 'H643',
                'metaphone'   => 'HRLTSMN',
                'dmetaphone1' => 'HRLTSMN',
                'dmetaphone2' => 'HRLTSMN'
            ],
            [
                'name'        => 'Harry Armand Bach',
                'type'        => 'silly',
                'soundex'     => 'H665',
                'metaphone'   => 'HRRMNTBX',
                'dmetaphone1' => 'HRRMNTPK',
                'dmetaphone2' => 'HRRMNTPK'
            ],
            [
                'name'        => 'Harry Baals',
                'type'        => 'silly',
                'soundex'     => 'H614',
                'metaphone'   => 'HRBLS',
                'dmetaphone1' => 'HRPLS',
                'dmetaphone2' => 'HRPLS'
            ],
            [
                'name'        => 'Harry Balls',
                'type'        => 'silly',
                'soundex'     => 'H614',
                'metaphone'   => 'HRBLS',
                'dmetaphone1' => 'HRPLS',
                'dmetaphone2' => 'HRPLS'
            ],
            [
                'name'        => 'Harry Beard',
                'type'        => 'silly',
                'soundex'     => 'H616',
                'metaphone'   => 'HRBRT',
                'dmetaphone1' => 'HRPRT',
                'dmetaphone2' => 'HRPRT'
            ],
            [
                'name'        => 'Harry Beaver',
                'type'        => 'silly',
                'soundex'     => 'H611',
                'metaphone'   => 'HRBFR',
                'dmetaphone1' => 'HRPFR',
                'dmetaphone2' => 'HRPFR'
            ],
            [
                'name'        => 'Harry Chest',
                'type'        => 'silly',
                'soundex'     => 'H622',
                'metaphone'   => 'HRXST',
                'dmetaphone1' => 'HRXST',
                'dmetaphone2' => 'HRKST'
            ],
            [
                'name'        => 'Harry Cox',
                'type'        => 'silly',
                'soundex'     => 'H622',
                'metaphone'   => 'HRKKS',
                'dmetaphone1' => 'HRKKS',
                'dmetaphone2' => 'HRKKS'
            ],
            [
                'name'        => 'Harry Dangler',
                'type'        => 'silly',
                'soundex'     => 'H635',
                'metaphone'   => 'HRTNKLR',
                'dmetaphone1' => 'HRTNKLR',
                'dmetaphone2' => 'HRTNKLR'
            ],
            [
                'name'        => 'Harry Hooker',
                'type'        => 'silly',
                'soundex'     => 'H626',
                'metaphone'   => 'HRHKR',
                'dmetaphone1' => 'HRKR',
                'dmetaphone2' => 'HRKR'
            ],
            [
                'name'        => 'Harry Johnson',
                'type'        => 'silly',
                'soundex'     => 'H625',
                'metaphone'   => 'HRJNSN',
                'dmetaphone1' => 'HRJNSN',
                'dmetaphone2' => 'HRJNSN'
            ],
            [
                'name'        => 'Harry Legg',
                'type'        => 'silly',
                'soundex'     => 'H642',
                'metaphone'   => 'HRLK',
                'dmetaphone1' => 'HRLK',
                'dmetaphone2' => 'HRLK'
            ],
            [
                'name'        => 'Harry Lipp',
                'type'        => 'silly',
                'soundex'     => 'H641',
                'metaphone'   => 'HRLP',
                'dmetaphone1' => 'HRLP',
                'dmetaphone2' => 'HRLP'
            ],
            [
                'name'        => 'Harry P. Ness',
                'type'        => 'silly',
                'soundex'     => 'H615',
                'metaphone'   => 'HRPNS',
                'dmetaphone1' => 'HRPNS',
                'dmetaphone2' => 'HRPNS'
            ],
            [
                'name'        => 'Harry Peters',
                'type'        => 'silly',
                'soundex'     => 'H613',
                'metaphone'   => 'HRPTRS',
                'dmetaphone1' => 'HRPTRS',
                'dmetaphone2' => 'HRPTRS'
            ],
            [
                'name'        => 'Harry Pitts',
                'type'        => 'silly',
                'soundex'     => 'H613',
                'metaphone'   => 'HRPTS',
                'dmetaphone1' => 'HRPTS',
                'dmetaphone2' => 'HRPTS'
            ],
            [
                'name'        => 'Harry R. M. Pitts',
                'type'        => 'silly',
                'soundex'     => 'H665',
                'metaphone'   => 'HRRMPTS',
                'dmetaphone1' => 'HRRMPTS',
                'dmetaphone2' => 'HRRMPTS'
            ],
            [
                'name'        => 'Harry Rump',
                'type'        => 'silly',
                'soundex'     => 'H665',
                'metaphone'   => 'HRRMP',
                'dmetaphone1' => 'HRRMP',
                'dmetaphone2' => 'HRRMP'
            ],
            [
                'name'        => 'Harry Sachs',
                'type'        => 'silly',
                'soundex'     => 'H622',
                'metaphone'   => 'HRSXS',
                'dmetaphone1' => 'HRSKS',
                'dmetaphone2' => 'HRSKS'
            ],
            [
                'name'        => 'Hazle Nutt',
                'type'        => 'silly',
                'soundex'     => 'H245',
                'metaphone'   => 'HSLNT',
                'dmetaphone1' => 'HSLNT',
                'dmetaphone2' => 'HSLNT'
            ],
            [
                'name'        => 'Heidi Clare',
                'type'        => 'silly',
                'soundex'     => 'H324',
                'metaphone'   => 'HTKLR',
                'dmetaphone1' => 'HTKLR',
                'dmetaphone2' => 'HTKLR'
            ],
            [
                'name'        => 'Helen Back',
                'type'        => 'silly',
                'soundex'     => 'H451',
                'metaphone'   => 'HLNBK',
                'dmetaphone1' => 'HLNPK',
                'dmetaphone2' => 'HLNPK'
            ],
            [
                'name'        => 'Helen Fry',
                'type'        => 'silly',
                'soundex'     => 'H451',
                'metaphone'   => 'HLNFR',
                'dmetaphone1' => 'HLNFR',
                'dmetaphone2' => 'HLNFR'
            ],
            [
                'name'        => 'Helen Highwater',
                'type'        => 'silly',
                'soundex'     => 'H452',
                'metaphone'   => 'HLNHFWTR',
                'dmetaphone1' => 'HLNTR',
                'dmetaphone2' => 'HLNTR'
            ],
            [
                'name'        => 'Helen Waite',
                'type'        => 'silly',
                'soundex'     => 'H453',
                'metaphone'   => 'HLNWT',
                'dmetaphone1' => 'HLNT',
                'dmetaphone2' => 'HLNT'
            ],
            [
                'name'        => 'Helen Wiells',
                'type'        => 'silly',
                'soundex'     => 'H454',
                'metaphone'   => 'HLNWLS',
                'dmetaphone1' => 'HLNLS',
                'dmetaphone2' => 'HLNLS'
            ],
            [
                'name'        => 'Herb Farmer',
                'type'        => 'silly',
                'soundex'     => 'H616',
                'metaphone'   => 'HRBFRMR',
                'dmetaphone1' => 'HRPFRMR',
                'dmetaphone2' => 'HRPFRMR'
            ],
            [
                'name'        => 'Herb Rice',
                'type'        => 'silly',
                'soundex'     => 'H616',
                'metaphone'   => 'HRBRS',
                'dmetaphone1' => 'HRPRS',
                'dmetaphone2' => 'HRPRS'
            ],
            [
                'name'        => 'Heywood U. Cuddleme',
                'type'        => 'silly',
                'soundex'     => 'H323',
                'metaphone'   => 'HWTKTLM',
                'dmetaphone1' => 'HTKTLM',
                'dmetaphone2' => 'HTKTLM'
            ],
            [
                'name'        => 'Holland Oats',
                'type'        => 'silly',
                'soundex'     => 'H453',
                'metaphone'   => 'HLNTTS',
                'dmetaphone1' => 'HLNTTS',
                'dmetaphone2' => 'HLNTTS'
            ],
            [
                'name'        => 'Holly Day',
                'type'        => 'silly',
                'soundex'     => 'H430',
                'metaphone'   => 'HLT',
                'dmetaphone1' => 'HLT',
                'dmetaphone2' => 'HLT'
            ],
            [
                'name'        => 'Holly Graham',
                'type'        => 'silly',
                'soundex'     => 'H426',
                'metaphone'   => 'HLKRHM',
                'dmetaphone1' => 'HLKRHM',
                'dmetaphone2' => 'HLKRHM'
            ],
            [
                'name'        => 'Holly McRell',
                'type'        => 'silly',
                'soundex'     => 'H452',
                'metaphone'   => 'HLMKRL',
                'dmetaphone1' => 'HLMKRL',
                'dmetaphone2' => 'HLMKRL'
            ],
            [
                'name'        => 'Holly Wood',
                'type'        => 'silly',
                'soundex'     => 'H430',
                'metaphone'   => 'HLWT',
                'dmetaphone1' => 'HLT',
                'dmetaphone2' => 'HLT'
            ],
            [
                'name'        => 'Homer Sexual',
                'type'        => 'silly',
                'soundex'     => 'H562',
                'metaphone'   => 'HMRSKSL',
                'dmetaphone1' => 'HMRSKSL',
                'dmetaphone2' => 'HMRSKSL'
            ],
            [
                'name'        => 'Howie Doohan',
                'type'        => 'silly',
                'soundex'     => 'H350',
                'metaphone'   => 'HWTHN',
                'dmetaphone1' => 'HTHN',
                'dmetaphone2' => 'HTHN'
            ],
            [
                'name'        => 'Hugh Briss',
                'type'        => 'silly',
                'soundex'     => 'H216',
                'metaphone'   => 'HFBRS',
                'dmetaphone1' => 'HPRS',
                'dmetaphone2' => 'HPRS'
            ],
            [
                'name'        => 'Hugh Douche',
                'type'        => 'silly',
                'soundex'     => 'H232',
                'metaphone'   => 'HFTX',
                'dmetaphone1' => 'HTX',
                'dmetaphone2' => 'HTK'
            ],
            [
                'name'        => 'Hugh Duct',
                'type'        => 'silly',
                'soundex'     => 'H232',
                'metaphone'   => 'HFTKT',
                'dmetaphone1' => 'HTKT',
                'dmetaphone2' => 'HTKT'
            ],
            [
                'name'        => 'Hugh Jass',
                'type'        => 'silly',
                'soundex'     => 'H222',
                'metaphone'   => 'HFJS',
                'dmetaphone1' => 'HJS',
                'dmetaphone2' => 'HJS'
            ],
            [
                'name'        => 'Hugh Jorgan',
                'type'        => 'silly',
                'soundex'     => 'H226',
                'metaphone'   => 'HFJRKN',
                'dmetaphone1' => 'HJRKN',
                'dmetaphone2' => 'HJRKN'
            ],
            [
                'name'        => 'Hugh Miliation',
                'type'        => 'silly',
                'soundex'     => 'H254',
                'metaphone'   => 'HFMLXN',
                'dmetaphone1' => 'HMLXN',
                'dmetaphone2' => 'HMLXN'
            ],
            [
                'name'        => 'Hugh Morris',
                'type'        => 'silly',
                'soundex'     => 'H256',
                'metaphone'   => 'HFMRS',
                'dmetaphone1' => 'HMRS',
                'dmetaphone2' => 'HMRS'
            ],
            [
                'name'        => 'Hugo Slavia',
                'type'        => 'silly',
                'soundex'     => 'H224',
                'metaphone'   => 'HKSLF',
                'dmetaphone1' => 'HKSLF',
                'dmetaphone2' => 'HKSLF'
            ],
            [
                'name'        => 'Hy Ball',
                'type'        => 'silly',
                'soundex'     => 'H140',
                'metaphone'   => 'BL',
                'dmetaphone1' => 'HPL',
                'dmetaphone2' => 'HPL'
            ],
            [
                'name'        => 'Hy Lowe, Bea Lowe',
                'type'        => 'silly',
                'soundex'     => 'H414',
                'metaphone'   => 'LWBLW',
                'dmetaphone1' => 'HLPL',
                'dmetaphone2' => 'HLPL'
            ],
            [
                'name'        => 'Hy Marx',
                'type'        => 'silly',
                'soundex'     => 'H562',
                'metaphone'   => 'MRKS',
                'dmetaphone1' => 'HMRKS',
                'dmetaphone2' => 'HMRKS'
            ],
            [
                'name'        => 'Hy Price',
                'type'        => 'silly',
                'soundex'     => 'H162',
                'metaphone'   => 'PRS',
                'dmetaphone1' => 'HPRS',
                'dmetaphone2' => 'HPRS'
            ],
            [
                'name'        => 'Hyma Domi',
                'type'        => 'silly',
                'soundex'     => 'H535',
                'metaphone'   => 'MTM',
                'dmetaphone1' => 'HMTM',
                'dmetaphone2' => 'HMTM'
            ],
            [
                'name'        => 'I. Lasch',
                'type'        => 'silly',
                'soundex'     => 'I420',
                'metaphone'   => 'ILSX',
                'dmetaphone1' => 'ALX',
                'dmetaphone2' => 'ALX'
            ],
            [
                'name'        => 'I. Pullem',
                'type'        => 'silly',
                'soundex'     => 'I145',
                'metaphone'   => 'IPLM',
                'dmetaphone1' => 'APLM',
                'dmetaphone2' => 'APLM'
            ],
            [
                'name'        => 'I.D. Clair',
                'type'        => 'silly',
                'soundex'     => 'I324',
                'metaphone'   => 'ITKLR',
                'dmetaphone1' => 'ATKLR',
                'dmetaphone2' => 'ATKLR'
            ],
            [
                'name'        => 'I.M. Boring',
                'type'        => 'silly',
                'soundex'     => 'I516',
                'metaphone'   => 'IMBRNK',
                'dmetaphone1' => 'AMPRNK',
                'dmetaphone2' => 'AMPRNK'
            ],
            [
                'name'        => 'I.P. Daly',
                'type'        => 'silly',
                'soundex'     => 'I134',
                'metaphone'   => 'IPTL',
                'dmetaphone1' => 'APTL',
                'dmetaphone2' => 'APTL'
            ],
            [
                'name'        => 'I.P. Freely',
                'type'        => 'silly',
                'soundex'     => 'I164',
                'metaphone'   => 'IPFRL',
                'dmetaphone1' => 'APFRL',
                'dmetaphone2' => 'APFRL'
            ],
            [
                'name'        => 'Ileane Wright',
                'type'        => 'silly',
                'soundex'     => 'I456',
                'metaphone'   => 'ILNRFT',
                'dmetaphone1' => 'ALNRT',
                'dmetaphone2' => 'ALNRT'
            ],
            [
                'name'        => 'Ilene South',
                'type'        => 'silly',
                'soundex'     => 'I452',
                'metaphone'   => 'ILNS0',
                'dmetaphone1' => 'ALNS0',
                'dmetaphone2' => 'ALNST'
            ],
            [
                'name'        => 'Ima Hogg',
                'type'        => 'silly',
                'soundex'     => 'I520',
                'metaphone'   => 'IMHK',
                'dmetaphone1' => 'AMK',
                'dmetaphone2' => 'AMK'
            ],
            [
                'name'        => 'Indy Nile',
                'type'        => 'silly',
                'soundex'     => 'I535',
                'metaphone'   => 'INTNL',
                'dmetaphone1' => 'ANTNL',
                'dmetaphone2' => 'ANTNL'
            ],
            [
                'name'        => 'Iona Corolla',
                'type'        => 'silly',
                'soundex'     => 'I526',
                'metaphone'   => 'INKRL',
                'dmetaphone1' => 'ANKRL',
                'dmetaphone2' => 'ANKRL'
            ],
            [
                'name'        => 'Iona Ford',
                'type'        => 'silly',
                'soundex'     => 'I516',
                'metaphone'   => 'INFRT',
                'dmetaphone1' => 'ANFRT',
                'dmetaphone2' => 'ANFRT'
            ],
            [
                'name'        => 'Iona Frisbee',
                'type'        => 'silly',
                'soundex'     => 'I516',
                'metaphone'   => 'INFRSB',
                'dmetaphone1' => 'ANFRSP',
                'dmetaphone2' => 'ANFRSP'
            ],
            [
                'name'        => 'Iona Stonehouse',
                'type'        => 'silly',
                'soundex'     => 'I523',
                'metaphone'   => 'INSTNHS',
                'dmetaphone1' => 'ANSTNHS',
                'dmetaphone2' => 'ANSTNHS'
            ],
            [
                'name'        => 'Ira Membrit',
                'type'        => 'silly',
                'soundex'     => 'I655',
                'metaphone'   => 'IRMMRT',
                'dmetaphone1' => 'ARMMPRT',
                'dmetaphone2' => 'ARMMPRT'
            ],
            [
                'name'        => 'Ivan Oder',
                'type'        => 'silly',
                'soundex'     => 'I153',
                'metaphone'   => 'IFNTR',
                'dmetaphone1' => 'AFNTR',
                'dmetaphone2' => 'AFNTR'
            ],
            [
                'name'        => 'Ivana Mandic',
                'type'        => 'silly',
                'soundex'     => 'I155',
                'metaphone'   => 'IFNMNTK',
                'dmetaphone1' => 'AFNMNTK',
                'dmetaphone2' => 'AFNMNTK'
            ],
            [
                'name'        => 'Ivana Tinkle',
                'type'        => 'silly',
                'soundex'     => 'I153',
                'metaphone'   => 'IFNTNKL',
                'dmetaphone1' => 'AFNTNKL',
                'dmetaphone2' => 'AFNTNKL'
            ],
            [
                'name'        => 'Ivy Leage',
                'type'        => 'silly',
                'soundex'     => 'I142',
                'metaphone'   => 'IFLJ',
                'dmetaphone1' => 'AFLJ',
                'dmetaphone2' => 'AFLK'
            ],
            [
                'name'        => 'Izzy Cumming',
                'type'        => 'silly',
                'soundex'     => 'I225',
                'metaphone'   => 'ISKMNK',
                'dmetaphone1' => 'ASKMNK',
                'dmetaphone2' => 'ASKMNK'
            ],
            [
                'name'        => 'Jack Dup',
                'type'        => 'silly',
                'soundex'     => 'J231',
                'metaphone'   => 'JKTP',
                'dmetaphone1' => 'JKTP',
                'dmetaphone2' => 'AKTP'
            ],
            [
                'name'        => 'Jack E. Sack',
                'type'        => 'silly',
                'soundex'     => 'J222',
                'metaphone'   => 'JKSK',
                'dmetaphone1' => 'JKSK',
                'dmetaphone2' => 'AKSK'
            ],
            [
                'name'        => 'Jack Goff',
                'type'        => 'silly',
                'soundex'     => 'J210',
                'metaphone'   => 'JKKF',
                'dmetaphone1' => 'JKKF',
                'dmetaphone2' => 'AKKF'
            ],
            [
                'name'        => 'Jack Haas',
                'type'        => 'silly',
                'soundex'     => 'J220',
                'metaphone'   => 'JKHS',
                'dmetaphone1' => 'JKS',
                'dmetaphone2' => 'AKS'
            ],
            [
                'name'        => 'Jack Hammer',
                'type'        => 'silly',
                'soundex'     => 'J256',
                'metaphone'   => 'JKHMR',
                'dmetaphone1' => 'JKMR',
                'dmetaphone2' => 'AKMR'
            ],
            [
                'name'        => 'Jack Hoff',
                'type'        => 'silly',
                'soundex'     => 'J210',
                'metaphone'   => 'JKHF',
                'dmetaphone1' => 'JKF',
                'dmetaphone2' => 'AKF'
            ],
            [
                'name'        => 'Jack Knoff',
                'type'        => 'silly',
                'soundex'     => 'J251',
                'metaphone'   => 'JKKNF',
                'dmetaphone1' => 'JKKNF',
                'dmetaphone2' => 'AKKNF'
            ],
            [
                'name'        => 'Jack Pott',
                'type'        => 'silly',
                'soundex'     => 'J213',
                'metaphone'   => 'JKPT',
                'dmetaphone1' => 'JKPT',
                'dmetaphone2' => 'AKPT'
            ],
            [
                'name'        => 'Jack Tupp',
                'type'        => 'silly',
                'soundex'     => 'J231',
                'metaphone'   => 'JKTP',
                'dmetaphone1' => 'JKTP',
                'dmetaphone2' => 'AKTP'
            ],
            [
                'name'        => 'Jacklyn Hyde',
                'type'        => 'silly',
                'soundex'     => 'J245',
                'metaphone'   => 'JKLNT',
                'dmetaphone1' => 'JKLNT',
                'dmetaphone2' => 'AKLNT'
            ],
            [
                'name'        => 'Jacques Strap',
                'type'        => 'silly',
                'soundex'     => 'J223',
                'metaphone'   => 'JKKSSTRP',
                'dmetaphone1' => 'JKSSTRP',
                'dmetaphone2' => 'AKSSTRP'
            ],
            [
                'name'        => 'Jane Doe',
                'type'        => 'silly',
                'soundex'     => 'J530',
                'metaphone'   => 'JNT',
                'dmetaphone1' => 'JNT',
                'dmetaphone2' => 'ANT'
            ],
            [
                'name'        => 'Jane Roe',
                'type'        => 'silly',
                'soundex'     => 'J560',
                'metaphone'   => 'JNR',
                'dmetaphone1' => 'JNR',
                'dmetaphone2' => 'ANR'
            ],
            [
                'name'        => 'Janie Doe',
                'type'        => 'silly',
                'soundex'     => 'J530',
                'metaphone'   => 'JNT',
                'dmetaphone1' => 'JNT',
                'dmetaphone2' => 'ANT'
            ],
            [
                'name'        => 'Jaques Amole',
                'type'        => 'silly',
                'soundex'     => 'J225',
                'metaphone'   => 'JKSML',
                'dmetaphone1' => 'JKSML',
                'dmetaphone2' => 'AKSML'
            ],
            [
                'name'        => 'Jasmine Rice',
                'type'        => 'silly',
                'soundex'     => 'J255',
                'metaphone'   => 'JSMNRS',
                'dmetaphone1' => 'JSMNRS',
                'dmetaphone2' => 'ASMNRS'
            ],
            [
                'name'        => 'Javy Cado',
                'type'        => 'silly',
                'soundex'     => 'J123',
                'metaphone'   => 'JFKT',
                'dmetaphone1' => 'JFKT',
                'dmetaphone2' => 'AFKT'
            ],
            [
                'name'        => 'Jay Walker',
                'type'        => 'silly',
                'soundex'     => 'J426',
                'metaphone'   => 'JWLKR',
                'dmetaphone1' => 'JLKR',
                'dmetaphone2' => 'ALKR'
            ],
            [
                'name'        => 'Jean Poole',
                'type'        => 'silly',
                'soundex'     => 'J514',
                'metaphone'   => 'JNPL',
                'dmetaphone1' => 'JNPL',
                'dmetaphone2' => 'ANPL'
            ],
            [
                'name'        => 'Jed Dye',
                'type'        => 'silly',
                'soundex'     => 'J300',
                'metaphone'   => 'JTTY',
                'dmetaphone1' => 'JTT',
                'dmetaphone2' => 'ATT'
            ],
            [
                'name'        => 'Jed Dye (Jedi',
                'type'        => 'silly',
                'soundex'     => 'J323',
                'metaphone'   => 'JTTYJT',
                'dmetaphone1' => 'JTTJT',
                'dmetaphone2' => 'ATTJT'
            ],
            [
                'name'        => 'Jen Trification',
                'type'        => 'silly',
                'soundex'     => 'J536',
                'metaphone'   => 'JNTRFKXN',
                'dmetaphone1' => 'JNTRFKXN',
                'dmetaphone2' => 'ANTRFKXN'
            ],
            [
                'name'        => 'Jen Youfelct',
                'type'        => 'silly',
                'soundex'     => 'J514',
                'metaphone'   => 'JNYFLKT',
                'dmetaphone1' => 'JNFLKT',
                'dmetaphone2' => 'ANFLKT'
            ],
            [
                'name'        => 'Jenna Side',
                'type'        => 'silly',
                'soundex'     => 'J523',
                'metaphone'   => 'JNST',
                'dmetaphone1' => 'JNST',
                'dmetaphone2' => 'ANST'
            ],
            [
                'name'        => 'Jenny Tull',
                'type'        => 'silly',
                'soundex'     => 'J534',
                'metaphone'   => 'JNTL',
                'dmetaphone1' => 'JNTL',
                'dmetaphone2' => 'ANTL'
            ],
            [
                'name'        => 'Jerry Atrick',
                'type'        => 'silly',
                'soundex'     => 'J636',
                'metaphone'   => 'JRTRK',
                'dmetaphone1' => 'JRTRK',
                'dmetaphone2' => 'ARTRK'
            ],
            [
                'name'        => 'Jess Thetip',
                'type'        => 'silly',
                'soundex'     => 'J233',
                'metaphone'   => 'JS0TP',
                'dmetaphone1' => 'JS0TP',
                'dmetaphone2' => 'ASTTP'
            ],
            [
                'name'        => 'Jim Laucher',
                'type'        => 'silly',
                'soundex'     => 'J542',
                'metaphone'   => 'JMLXR',
                'dmetaphone1' => 'JMLXR',
                'dmetaphone2' => 'AMLKR'
            ],
            [
                'name'        => 'Jim Nasium',
                'type'        => 'silly',
                'soundex'     => 'J525',
                'metaphone'   => 'JMNSM',
                'dmetaphone1' => 'JMNSM',
                'dmetaphone2' => 'AMNSM'
            ],
            [
                'name'        => 'Jim Shorts',
                'type'        => 'silly',
                'soundex'     => 'J526',
                'metaphone'   => 'JMXRTS',
                'dmetaphone1' => 'JMXRTS',
                'dmetaphone2' => 'AMXRTS'
            ],
            [
                'name'        => 'Jim Shu',
                'type'        => 'silly',
                'soundex'     => 'J520',
                'metaphone'   => 'JMX',
                'dmetaphone1' => 'JMX',
                'dmetaphone2' => 'AMX'
            ],
            [
                'name'        => 'Jim Sox',
                'type'        => 'silly',
                'soundex'     => 'J522',
                'metaphone'   => 'JMSKS',
                'dmetaphone1' => 'JMSKS',
                'dmetaphone2' => 'AMSKS'
            ],
            [
                'name'        => 'Jimmy Changa',
                'type'        => 'silly',
                'soundex'     => 'J525',
                'metaphone'   => 'JMXNK',
                'dmetaphone1' => 'JMXNK',
                'dmetaphone2' => 'AMKNK'
            ],
            [
                'name'        => 'Jo King',
                'type'        => 'silly',
                'soundex'     => 'J252',
                'metaphone'   => 'JKNK',
                'dmetaphone1' => 'JKNK',
                'dmetaphone2' => 'AKNK'
            ],
            [
                'name'        => 'Joe Dildo',
                'type'        => 'silly',
                'soundex'     => 'J343',
                'metaphone'   => 'JTLT',
                'dmetaphone1' => 'JTLT',
                'dmetaphone2' => 'ATLT'
            ],
            [
                'name'        => 'Joe Hardern',
                'type'        => 'silly',
                'soundex'     => 'J636',
                'metaphone'   => 'JHRTRN',
                'dmetaphone1' => 'JRTRN',
                'dmetaphone2' => 'ARTRN'
            ],
            [
                'name'        => 'Joe Kerr',
                'type'        => 'silly',
                'soundex'     => 'J260',
                'metaphone'   => 'JKR',
                'dmetaphone1' => 'JKR',
                'dmetaphone2' => 'AKR'
            ],
            [
                'name'        => 'Joe Mama',
                'type'        => 'silly',
                'soundex'     => 'J550',
                'metaphone'   => 'JMM',
                'dmetaphone1' => 'JMM',
                'dmetaphone2' => 'AMM'
            ],
            [
                'name'        => 'Joe Thyme',
                'type'        => 'silly',
                'soundex'     => 'J350',
                'metaphone'   => 'J0M',
                'dmetaphone1' => 'J0M',
                'dmetaphone2' => 'ATM'
            ],
            [
                'name'        => 'John Doe',
                'type'        => 'silly',
                'soundex'     => 'J530',
                'metaphone'   => 'JNT',
                'dmetaphone1' => 'JNT',
                'dmetaphone2' => 'ANT'
            ],
            [
                'name'        => 'John Withawind',
                'type'        => 'silly',
                'soundex'     => 'J535',
                'metaphone'   => 'JNW0WNT',
                'dmetaphone1' => 'JN0NT',
                'dmetaphone2' => 'ANTNT'
            ],
            [
                'name'        => 'Johnnie Doe',
                'type'        => 'silly',
                'soundex'     => 'J530',
                'metaphone'   => 'JNT',
                'dmetaphone1' => 'JNT',
                'dmetaphone2' => 'ANT'
            ],
            [
                'name'        => 'Jordan Rivers',
                'type'        => 'silly',
                'soundex'     => 'J635',
                'metaphone'   => 'JRTNRFRS',
                'dmetaphone1' => 'JRTNRFRS',
                'dmetaphone2' => 'ARTNRFRS'
            ],
            [
                'name'        => 'Joy Kil',
                'type'        => 'silly',
                'soundex'     => 'J240',
                'metaphone'   => 'JKL',
                'dmetaphone1' => 'JKL',
                'dmetaphone2' => 'AKL'
            ],
            [
                'name'        => 'Joy Rider',
                'type'        => 'silly',
                'soundex'     => 'J636',
                'metaphone'   => 'JRTR',
                'dmetaphone1' => 'JRTR',
                'dmetaphone2' => 'ARTR'
            ],
            [
                'name'        => 'Joyce Tick',
                'type'        => 'silly',
                'soundex'     => 'J232',
                'metaphone'   => 'JSTK',
                'dmetaphone1' => 'JSTK',
                'dmetaphone2' => 'ASTK'
            ],
            [
                'name'        => 'Juan Annatoo',
                'type'        => 'silly',
                'soundex'     => 'J553',
                'metaphone'   => 'JNNT',
                'dmetaphone1' => 'JNNT',
                'dmetaphone2' => 'ANNT'
            ],
            [
                'name'        => 'Juan Soponatime',
                'type'        => 'silly',
                'soundex'     => 'J521',
                'metaphone'   => 'JNSPNTM',
                'dmetaphone1' => 'JNSPNTM',
                'dmetaphone2' => 'ANSPNTM'
            ],
            [
                'name'        => 'June Bugg',
                'type'        => 'silly',
                'soundex'     => 'J512',
                'metaphone'   => 'JNBK',
                'dmetaphone1' => 'JNPK',
                'dmetaphone2' => 'ANPK'
            ],
            [
                'name'        => 'Justin Case',
                'type'        => 'silly',
                'soundex'     => 'J235',
                'metaphone'   => 'JSTNKS',
                'dmetaphone1' => 'JSTNKS',
                'dmetaphone2' => 'ASTNKS'
            ],
            [
                'name'        => 'Justin Casey Howells',
                'type'        => 'silly',
                'soundex'     => 'J235',
                'metaphone'   => 'JSTNKSHWLS',
                'dmetaphone1' => 'JSTNKSLS',
                'dmetaphone2' => 'ASTNKSLS'
            ],
            [
                'name'        => 'Justin Hale',
                'type'        => 'silly',
                'soundex'     => 'J235',
                'metaphone'   => 'JSTNHL',
                'dmetaphone1' => 'JSTNL',
                'dmetaphone2' => 'ASTNL'
            ],
            [
                'name'        => 'Justin Inch',
                'type'        => 'silly',
                'soundex'     => 'J235',
                'metaphone'   => 'JSTNNX',
                'dmetaphone1' => 'JSTNNX',
                'dmetaphone2' => 'ASTNNK'
            ],
            [
                'name'        => 'Justin Miles North',
                'type'        => 'silly',
                'soundex'     => 'J235',
                'metaphone'   => 'JSTNMLSNR0',
                'dmetaphone1' => 'JSTNMLSNR0',
                'dmetaphone2' => 'ASTNMLSNRT'
            ],
            [
                'name'        => 'Justin Sane',
                'type'        => 'silly',
                'soundex'     => 'J235',
                'metaphone'   => 'JSTNSN',
                'dmetaphone1' => 'JSTNSN',
                'dmetaphone2' => 'ASTNSN'
            ],
            [
                'name'        => 'Justin Time',
                'type'        => 'silly',
                'soundex'     => 'J235',
                'metaphone'   => 'JSTNTM',
                'dmetaphone1' => 'JSTNTM',
                'dmetaphone2' => 'ASTNTM'
            ],
            [
                'name'        => 'Kandi Apple',
                'type'        => 'silly',
                'soundex'     => 'K531',
                'metaphone'   => 'KNTPL',
                'dmetaphone1' => 'KNTPL',
                'dmetaphone2' => 'KNTPL'
            ],
            [
                'name'        => 'Kat E. Gory',
                'type'        => 'silly',
                'soundex'     => 'K326',
                'metaphone'   => 'KTKR',
                'dmetaphone1' => 'KTKR',
                'dmetaphone2' => 'KTKR'
            ],
            [
                'name'        => 'Kay Bull',
                'type'        => 'silly',
                'soundex'     => 'K140',
                'metaphone'   => 'KBL',
                'dmetaphone1' => 'KPL',
                'dmetaphone2' => 'KPL'
            ],
            [
                'name'        => 'Keelan Early',
                'type'        => 'silly',
                'soundex'     => 'K456',
                'metaphone'   => 'KLNRL',
                'dmetaphone1' => 'KLNRL',
                'dmetaphone2' => 'KLNRL'
            ],
            [
                'name'        => 'Kelly Green',
                'type'        => 'silly',
                'soundex'     => 'K426',
                'metaphone'   => 'KLKRN',
                'dmetaphone1' => 'KLKRN',
                'dmetaphone2' => 'KLKRN'
            ],
            [
                'name'        => 'Ken Dahl',
                'type'        => 'silly',
                'soundex'     => 'K534',
                'metaphone'   => 'KNTL',
                'dmetaphone1' => 'KNTL',
                'dmetaphone2' => 'KNTL'
            ],
            [
                'name'        => 'Ken Tucky',
                'type'        => 'silly',
                'soundex'     => 'K532',
                'metaphone'   => 'KNTK',
                'dmetaphone1' => 'KNTK',
                'dmetaphone2' => 'KNTK'
            ],
            [
                'name'        => 'Kenny Penny',
                'type'        => 'silly',
                'soundex'     => 'K515',
                'metaphone'   => 'KNPN',
                'dmetaphone1' => 'KNPN',
                'dmetaphone2' => 'KNPN'
            ],
            [
                'name'        => 'Kent C. Strait',
                'type'        => 'silly',
                'soundex'     => 'K532',
                'metaphone'   => 'KNTKSTRT',
                'dmetaphone1' => 'KNTKSTRT',
                'dmetaphone2' => 'KNTKSTRT'
            ],
            [
                'name'        => 'Kenya Dewit',
                'type'        => 'silly',
                'soundex'     => 'K533',
                'metaphone'   => 'KNYTWT',
                'dmetaphone1' => 'KNTT',
                'dmetaphone2' => 'KNTT'
            ],
            [
                'name'        => 'Kerry Oaky',
                'type'        => 'silly',
                'soundex'     => 'K620',
                'metaphone'   => 'KRK',
                'dmetaphone1' => 'KRK',
                'dmetaphone2' => 'KRK'
            ],
            [
                'name'        => 'Kerry Oki',
                'type'        => 'silly',
                'soundex'     => 'K620',
                'metaphone'   => 'KRK',
                'dmetaphone1' => 'KRK',
                'dmetaphone2' => 'KRK'
            ],
            [
                'name'        => 'King Queene',
                'type'        => 'silly',
                'soundex'     => 'K525',
                'metaphone'   => 'KNKKN',
                'dmetaphone1' => 'KNKKN',
                'dmetaphone2' => 'KNKKN'
            ],
            [
                'name'        => 'Kitty Carr',
                'type'        => 'silly',
                'soundex'     => 'K326',
                'metaphone'   => 'KTKR',
                'dmetaphone1' => 'KTKR',
                'dmetaphone2' => 'KTKR'
            ],
            [
                'name'        => 'Kitty Katz',
                'type'        => 'silly',
                'soundex'     => 'K323',
                'metaphone'   => 'KTKTS',
                'dmetaphone1' => 'KTKTS',
                'dmetaphone2' => 'KTKTS'
            ],
            [
                'name'        => 'Lake Speed',
                'type'        => 'silly',
                'soundex'     => 'L221',
                'metaphone'   => 'LKSPT',
                'dmetaphone1' => 'LKSPT',
                'dmetaphone2' => 'LKSPT'
            ],
            [
                'name'        => 'Lance Boyle',
                'type'        => 'silly',
                'soundex'     => 'L521',
                'metaphone'   => 'LNSBL',
                'dmetaphone1' => 'LNSPL',
                'dmetaphone2' => 'LNSPL'
            ],
            [
                'name'        => 'Lance Butts',
                'type'        => 'silly',
                'soundex'     => 'L521',
                'metaphone'   => 'LNSBTS',
                'dmetaphone1' => 'LNSPTS',
                'dmetaphone2' => 'LNSPTS'
            ],
            [
                'name'        => 'Lance Dorporal',
                'type'        => 'silly',
                'soundex'     => 'L523',
                'metaphone'   => 'LNSTRPRL',
                'dmetaphone1' => 'LNSTRPRL',
                'dmetaphone2' => 'LNSTRPRL'
            ],
            [
                'name'        => 'Laura Lynne Hardy',
                'type'        => 'silly',
                'soundex'     => 'L645',
                'metaphone'   => 'LRLNHRT',
                'dmetaphone1' => 'LRLNRT',
                'dmetaphone2' => 'LRLNRT'
            ],
            [
                'name'        => 'Laura Norder',
                'type'        => 'silly',
                'soundex'     => 'L656',
                'metaphone'   => 'LRNRTR',
                'dmetaphone1' => 'LRNRTR',
                'dmetaphone2' => 'LRNRTR'
            ],
            [
                'name'        => 'Laurel Ann Hardy',
                'type'        => 'silly',
                'soundex'     => 'L645',
                'metaphone'   => 'LRLNHRT',
                'dmetaphone1' => 'LRLNRT',
                'dmetaphone2' => 'LRLNRT'
            ],
            [
                'name'        => 'Laurence Getzoff',
                'type'        => 'silly',
                'soundex'     => 'L652',
                'metaphone'   => 'LRNSJTSF',
                'dmetaphone1' => 'LRNSKTSF',
                'dmetaphone2' => 'LRNSKTSF'
            ],
            [
                'name'        => 'Leigh King',
                'type'        => 'silly',
                'soundex'     => 'L225',
                'metaphone'   => 'LFKNK',
                'dmetaphone1' => 'LKNK',
                'dmetaphone2' => 'LKNK'
            ],
            [
                'name'        => 'Les Moore',
                'type'        => 'silly',
                'soundex'     => 'L256',
                'metaphone'   => 'LSMR',
                'dmetaphone1' => 'LSMR',
                'dmetaphone2' => 'LSMR'
            ],
            [
                'name'        => 'Les Payne',
                'type'        => 'silly',
                'soundex'     => 'L215',
                'metaphone'   => 'LSPN',
                'dmetaphone1' => 'LSPN',
                'dmetaphone2' => 'LSPN'
            ],
            [
                'name'        => 'Levon Coates',
                'type'        => 'silly',
                'soundex'     => 'L152',
                'metaphone'   => 'LFNKTS',
                'dmetaphone1' => 'LFNKTS',
                'dmetaphone2' => 'LFNKTS'
            ],
            [
                'name'        => 'Lewis N. Clark',
                'type'        => 'silly',
                'soundex'     => 'L252',
                'metaphone'   => 'LWSNKLRK',
                'dmetaphone1' => 'LSNKLRK',
                'dmetaphone2' => 'LSNKLRK'
            ],
            [
                'name'        => 'Lily Pond',
                'type'        => 'silly',
                'soundex'     => 'L415',
                'metaphone'   => 'LLPNT',
                'dmetaphone1' => 'LLPNT',
                'dmetaphone2' => 'LLPNT'
            ],
            [
                'name'        => 'Lina Ginster',
                'type'        => 'silly',
                'soundex'     => 'L525',
                'metaphone'   => 'LNJNSTR',
                'dmetaphone1' => 'LNJNSTR',
                'dmetaphone2' => 'LNKNSTR'
            ],
            [
                'name'        => 'Lindsay Doyle',
                'type'        => 'silly',
                'soundex'     => 'L532',
                'metaphone'   => 'LNTSTL',
                'dmetaphone1' => 'LNTSTL',
                'dmetaphone2' => 'LNTSTL'
            ],
            [
                'name'        => 'Lisa Carr',
                'type'        => 'silly',
                'soundex'     => 'L226',
                'metaphone'   => 'LSKR',
                'dmetaphone1' => 'LSKR',
                'dmetaphone2' => 'LSKR'
            ],
            [
                'name'        => 'Lisa Ford',
                'type'        => 'silly',
                'soundex'     => 'L216',
                'metaphone'   => 'LSFRT',
                'dmetaphone1' => 'LSFRT',
                'dmetaphone2' => 'LSFRT'
            ],
            [
                'name'        => 'Lisa Honda',
                'type'        => 'silly',
                'soundex'     => 'L253',
                'metaphone'   => 'LSHNT',
                'dmetaphone1' => 'LSNT',
                'dmetaphone2' => 'LSNT'
            ],
            [
                'name'        => 'Lisa May Boyle',
                'type'        => 'silly',
                'soundex'     => 'L251',
                'metaphone'   => 'LSMBL',
                'dmetaphone1' => 'LSMPL',
                'dmetaphone2' => 'LSMPL'
            ],
            [
                'name'        => 'Lisa May Dye',
                'type'        => 'silly',
                'soundex'     => 'L253',
                'metaphone'   => 'LSMTY',
                'dmetaphone1' => 'LSMT',
                'dmetaphone2' => 'LSMT'
            ],
            [
                'name'        => 'Liv Good',
                'type'        => 'silly',
                'soundex'     => 'L123',
                'metaphone'   => 'LFKT',
                'dmetaphone1' => 'LFKT',
                'dmetaphone2' => 'LFKT'
            ],
            [
                'name'        => 'Lois Price',
                'type'        => 'silly',
                'soundex'     => 'L216',
                'metaphone'   => 'LSPRS',
                'dmetaphone1' => 'LSPRS',
                'dmetaphone2' => 'LSPRS'
            ],
            [
                'name'        => 'Lou Kout',
                'type'        => 'silly',
                'soundex'     => 'L230',
                'metaphone'   => 'LKT',
                'dmetaphone1' => 'LKT',
                'dmetaphone2' => 'LKT'
            ],
            [
                'name'        => 'Lou Ow',
                'type'        => 'silly',
                'soundex'     => 'L000',
                'metaphone'   => 'L',
                'dmetaphone1' => 'L',
                'dmetaphone2' => 'LF'
            ],
            [
                'name'        => 'Lou Pole',
                'type'        => 'silly',
                'soundex'     => 'L140',
                'metaphone'   => 'LPL',
                'dmetaphone1' => 'LPL',
                'dmetaphone2' => 'LPL'
            ],
            [
                'name'        => 'Lou Sinclark',
                'type'        => 'silly',
                'soundex'     => 'L252',
                'metaphone'   => 'LSNKLRK',
                'dmetaphone1' => 'LSNKLRK',
                'dmetaphone2' => 'LSNKLRK'
            ],
            [
                'name'        => 'Lou Tenant',
                'type'        => 'silly',
                'soundex'     => 'L355',
                'metaphone'   => 'LTNNT',
                'dmetaphone1' => 'LTNNT',
                'dmetaphone2' => 'LTNNT'
            ],
            [
                'name'        => 'Lou Zar',
                'type'        => 'silly',
                'soundex'     => 'L260',
                'metaphone'   => 'LSR',
                'dmetaphone1' => 'LSR',
                'dmetaphone2' => 'LSR'
            ],
            [
                'name'        => 'Lou Zing',
                'type'        => 'silly',
                'soundex'     => 'L252',
                'metaphone'   => 'LSNK',
                'dmetaphone1' => 'LSNK',
                'dmetaphone2' => 'LSNK'
            ],
            [
                'name'        => 'Louie Z. Ana',
                'type'        => 'silly',
                'soundex'     => 'L250',
                'metaphone'   => 'LSN',
                'dmetaphone1' => 'LSN',
                'dmetaphone2' => 'LSN'
            ],
            [
                'name'        => 'Louis Ville',
                'type'        => 'silly',
                'soundex'     => 'L214',
                'metaphone'   => 'LSFL',
                'dmetaphone1' => 'LSFL',
                'dmetaphone2' => 'LSFL'
            ],
            [
                'name'        => 'Lucy Fer',
                'type'        => 'silly',
                'soundex'     => 'L216',
                'metaphone'   => 'LSFR',
                'dmetaphone1' => 'LSFR',
                'dmetaphone2' => 'LSFR'
            ],
            [
                'name'        => 'Lucy Tania',
                'type'        => 'silly',
                'soundex'     => 'L235',
                'metaphone'   => 'LSTN',
                'dmetaphone1' => 'LSTN',
                'dmetaphone2' => 'LSTN'
            ],
            [
                'name'        => 'Luke Warm',
                'type'        => 'silly',
                'soundex'     => 'L265',
                'metaphone'   => 'LKWRM',
                'dmetaphone1' => 'LKRM',
                'dmetaphone2' => 'LKRM'
            ],
            [
                'name'        => 'Lynn C. Doyle',
                'type'        => 'silly',
                'soundex'     => 'L523',
                'metaphone'   => 'LNKTL',
                'dmetaphone1' => 'LNKTL',
                'dmetaphone2' => 'LNKTL'
            ],
            [
                'name'        => 'Lynn Guini',
                'type'        => 'silly',
                'soundex'     => 'L525',
                'metaphone'   => 'LNKN',
                'dmetaphone1' => 'LNKN',
                'dmetaphone2' => 'LNKN'
            ],
            [
                'name'        => 'Lynn O. Liam',
                'type'        => 'silly',
                'soundex'     => 'L545',
                'metaphone'   => 'LNLM',
                'dmetaphone1' => 'LNLM',
                'dmetaphone2' => 'LNLM'
            ],
            [
                'name'        => 'M. Balmer',
                'type'        => 'silly',
                'soundex'     => 'M145',
                'metaphone'   => 'MBLMR',
                'dmetaphone1' => 'MPLMR',
                'dmetaphone2' => 'MPLMR'
            ],
            [
                'name'        => 'Mack Adamia',
                'type'        => 'silly',
                'soundex'     => 'M235',
                'metaphone'   => 'MKTM',
                'dmetaphone1' => 'MKTM',
                'dmetaphone2' => 'MKTM'
            ],
            [
                'name'        => 'Macon Paine',
                'type'        => 'silly',
                'soundex'     => 'M251',
                'metaphone'   => 'MKNPN',
                'dmetaphone1' => 'MKNPN',
                'dmetaphone2' => 'MKNPN'
            ],
            [
                'name'        => 'Mae O\'Nayse',
                'type'        => 'silly',
                'soundex'     => 'M520',
                'metaphone'   => 'MNS',
                'dmetaphone1' => 'MNS',
                'dmetaphone2' => 'MNS'
            ],
            [
                'name'        => 'Mal Practice',
                'type'        => 'silly',
                'soundex'     => 'M416',
                'metaphone'   => 'MLPRKTS',
                'dmetaphone1' => 'MLPRKTS',
                'dmetaphone2' => 'MLPRKTS'
            ],
            [
                'name'        => 'Manny Kinn',
                'type'        => 'silly',
                'soundex'     => 'M525',
                'metaphone'   => 'MNKN',
                'dmetaphone1' => 'MNKN',
                'dmetaphone2' => 'MNKN'
            ],
            [
                'name'        => 'Manny Petty',
                'type'        => 'silly',
                'soundex'     => 'M513',
                'metaphone'   => 'MNPT',
                'dmetaphone1' => 'MNPT',
                'dmetaphone2' => 'MNPT'
            ],
            [
                'name'        => 'Manuel Labor',
                'type'        => 'silly',
                'soundex'     => 'M541',
                'metaphone'   => 'MNLLBR',
                'dmetaphone1' => 'MNLLPR',
                'dmetaphone2' => 'MNLLPR'
            ],
            [
                'name'        => 'Marcus Down',
                'type'        => 'silly',
                'soundex'     => 'M622',
                'metaphone'   => 'MRKSTN',
                'dmetaphone1' => 'MRKSTN',
                'dmetaphone2' => 'MRKSTN'
            ],
            [
                'name'        => 'Marge Arin',
                'type'        => 'silly',
                'soundex'     => 'M626',
                'metaphone'   => 'MRJRN',
                'dmetaphone1' => 'MRJRN',
                'dmetaphone2' => 'MRKRN'
            ],
            [
                'name'        => 'Marge Arita',
                'type'        => 'silly',
                'soundex'     => 'M626',
                'metaphone'   => 'MRJRT',
                'dmetaphone1' => 'MRJRT',
                'dmetaphone2' => 'MRKRT'
            ],
            [
                'name'        => 'Mario Speedwagon',
                'type'        => 'silly',
                'soundex'     => 'M621',
                'metaphone'   => 'MRSPTWKN',
                'dmetaphone1' => 'MRSPTKN',
                'dmetaphone2' => 'MRSPTKN'
            ],
            [
                'name'        => 'Marion Gaze',
                'type'        => 'silly',
                'soundex'     => 'M652',
                'metaphone'   => 'MRNKS',
                'dmetaphone1' => 'MRNKS',
                'dmetaphone2' => 'MRNKS'
            ],
            [
                'name'        => 'Mark Ette',
                'type'        => 'silly',
                'soundex'     => 'M623',
                'metaphone'   => 'MRKT',
                'dmetaphone1' => 'MRKT',
                'dmetaphone2' => 'MRKT'
            ],
            [
                'name'        => 'Mark Key',
                'type'        => 'silly',
                'soundex'     => 'M620',
                'metaphone'   => 'MRKK',
                'dmetaphone1' => 'MRKK',
                'dmetaphone2' => 'MRKK'
            ],
            [
                'name'        => 'Mark Miewords',
                'type'        => 'silly',
                'soundex'     => 'M625',
                'metaphone'   => 'MRKMWRTS',
                'dmetaphone1' => 'MRKMRTS',
                'dmetaphone2' => 'MRKMRTS'
            ],
            [
                'name'        => 'Mark Skid',
                'type'        => 'silly',
                'soundex'     => 'M623',
                'metaphone'   => 'MRKSKT',
                'dmetaphone1' => 'MRKSKT',
                'dmetaphone2' => 'MRKSKT'
            ],
            [
                'name'        => 'Marlon Fisher',
                'type'        => 'silly',
                'soundex'     => 'M645',
                'metaphone'   => 'MRLNFXR',
                'dmetaphone1' => 'MRLNFXR',
                'dmetaphone2' => 'MRLNFXR'
            ],
            [
                'name'        => 'Marsha Dimes',
                'type'        => 'silly',
                'soundex'     => 'M623',
                'metaphone'   => 'MRXTMS',
                'dmetaphone1' => 'MRXTMS',
                'dmetaphone2' => 'MRXTMS'
            ],
            [
                'name'        => 'Marsha Mello',
                'type'        => 'silly',
                'soundex'     => 'M625',
                'metaphone'   => 'MRXML',
                'dmetaphone1' => 'MRXML',
                'dmetaphone2' => 'MRXML'
            ],
            [
                'name'        => 'Marsha Mellow',
                'type'        => 'silly',
                'soundex'     => 'M625',
                'metaphone'   => 'MRXML',
                'dmetaphone1' => 'MRXML',
                'dmetaphone2' => 'MRXMLF'
            ],
            [
                'name'        => 'Marshall Law',
                'type'        => 'silly',
                'soundex'     => 'M624',
                'metaphone'   => 'MRXLL',
                'dmetaphone1' => 'MRXLL',
                'dmetaphone2' => 'MRXLLF'
            ],
            [
                'name'        => 'Marty Cone',
                'type'        => 'silly',
                'soundex'     => 'M632',
                'metaphone'   => 'MRTKN',
                'dmetaphone1' => 'MRTKN',
                'dmetaphone2' => 'MRTKN'
            ],
            [
                'name'        => 'Marty Graw',
                'type'        => 'silly',
                'soundex'     => 'M632',
                'metaphone'   => 'MRTKR',
                'dmetaphone1' => 'MRTKR',
                'dmetaphone2' => 'MRTKRF'
            ],
            [
                'name'        => 'Marv Ellis',
                'type'        => 'silly',
                'soundex'     => 'M614',
                'metaphone'   => 'MRFLS',
                'dmetaphone1' => 'MRFLS',
                'dmetaphone2' => 'MRFLS'
            ],
            [
                'name'        => 'Marvin Gardens',
                'type'        => 'silly',
                'soundex'     => 'M615',
                'metaphone'   => 'MRFNKRTNS',
                'dmetaphone1' => 'MRFNKRTNS',
                'dmetaphone2' => 'MRFNKRTNS'
            ],
            [
                'name'        => 'Mary A. Richman',
                'type'        => 'silly',
                'soundex'     => 'M662',
                'metaphone'   => 'MRRXMN',
                'dmetaphone1' => 'MRRXMN',
                'dmetaphone2' => 'MRRKMN'
            ],
            [
                'name'        => 'Mary Achi',
                'type'        => 'silly',
                'soundex'     => 'M620',
                'metaphone'   => 'MRX',
                'dmetaphone1' => 'MRX',
                'dmetaphone2' => 'MRK'
            ],
            [
                'name'        => 'Mary Annette Woodin',
                'type'        => 'silly',
                'soundex'     => 'M653',
                'metaphone'   => 'MRNTWTN',
                'dmetaphone1' => 'MRNTTN',
                'dmetaphone2' => 'MRNTTN'
            ],
            [
                'name'        => 'Mary Christmas',
                'type'        => 'silly',
                'soundex'     => 'M626',
                'metaphone'   => 'MRXRSTMS',
                'dmetaphone1' => 'MRXRSTMS',
                'dmetaphone2' => 'MRKRSTMS'
            ],
            [
                'name'        => 'Mary Goround',
                'type'        => 'silly',
                'soundex'     => 'M626',
                'metaphone'   => 'MRKRNT',
                'dmetaphone1' => 'MRKRNT',
                'dmetaphone2' => 'MRKRNT'
            ],
            [
                'name'        => 'Mary Nara',
                'type'        => 'silly',
                'soundex'     => 'M656',
                'metaphone'   => 'MRNR',
                'dmetaphone1' => 'MRNR',
                'dmetaphone2' => 'MRNR'
            ],
            [
                'name'        => 'Mason Protesters',
                'type'        => 'silly',
                'soundex'     => 'M251',
                'metaphone'   => 'MSNPRTSTRS',
                'dmetaphone1' => 'MSNPRTSTRS',
                'dmetaphone2' => 'MSNPRTSTRS'
            ],
            [
                'name'        => 'Matt Innae',
                'type'        => 'silly',
                'soundex'     => 'M350',
                'metaphone'   => 'MTN',
                'dmetaphone1' => 'MTN',
                'dmetaphone2' => 'MTN'
            ],
            [
                'name'        => 'Matt Schtick',
                'type'        => 'silly',
                'soundex'     => 'M323',
                'metaphone'   => 'MTSXTK',
                'dmetaphone1' => 'MTXTK',
                'dmetaphone2' => 'MTXTK'
            ],
            [
                'name'        => 'Matt Tress',
                'type'        => 'silly',
                'soundex'     => 'M362',
                'metaphone'   => 'MTTRS',
                'dmetaphone1' => 'MTTRS',
                'dmetaphone2' => 'MTTRS'
            ],
            [
                'name'        => 'Matt Uhrafact',
                'type'        => 'silly',
                'soundex'     => 'M361',
                'metaphone'   => 'MTRFKT',
                'dmetaphone1' => 'MTRFKT',
                'dmetaphone2' => 'MTRFKT'
            ],
            [
                'name'        => 'Max Emum',
                'type'        => 'silly',
                'soundex'     => 'M255',
                'metaphone'   => 'MKSMM',
                'dmetaphone1' => 'MKSMM',
                'dmetaphone2' => 'MKSMM'
            ],
            [
                'name'        => 'Max Little',
                'type'        => 'silly',
                'soundex'     => 'M243',
                'metaphone'   => 'MKSLTL',
                'dmetaphone1' => 'MKSLTL',
                'dmetaphone2' => 'MKSLTL'
            ],
            [
                'name'        => 'Max Power',
                'type'        => 'silly',
                'soundex'     => 'M216',
                'metaphone'   => 'MKSPWR',
                'dmetaphone1' => 'MKSPR',
                'dmetaphone2' => 'MKSPR'
            ],
            [
                'name'        => 'May Day',
                'type'        => 'silly',
                'soundex'     => 'M300',
                'metaphone'   => 'MT',
                'dmetaphone1' => 'MT',
                'dmetaphone2' => 'MT'
            ],
            [
                'name'        => 'May Furst',
                'type'        => 'silly',
                'soundex'     => 'M162',
                'metaphone'   => 'MFRST',
                'dmetaphone1' => 'MFRST',
                'dmetaphone2' => 'MFRST'
            ],
            [
                'name'        => 'Maya Buttreeks',
                'type'        => 'silly',
                'soundex'     => 'M136',
                'metaphone'   => 'MYBTRKS',
                'dmetaphone1' => 'MPTRKS',
                'dmetaphone2' => 'MPTRKS'
            ],
            [
                'name'        => 'Maya Didas',
                'type'        => 'silly',
                'soundex'     => 'M332',
                'metaphone'   => 'MYTTS',
                'dmetaphone1' => 'MTTS',
                'dmetaphone2' => 'MTTS'
            ],
            [
                'name'        => 'Maya Normousbutt',
                'type'        => 'silly',
                'soundex'     => 'M565',
                'metaphone'   => 'MYNRMSBT',
                'dmetaphone1' => 'MNRMSPT',
                'dmetaphone2' => 'MNRMSPT'
            ],
            [
                'name'        => 'Mel Anoma',
                'type'        => 'silly',
                'soundex'     => 'M455',
                'metaphone'   => 'MLNM',
                'dmetaphone1' => 'MLNM',
                'dmetaphone2' => 'MLNM'
            ],
            [
                'name'        => 'Mel Loewe',
                'type'        => 'silly',
                'soundex'     => 'M400',
                'metaphone'   => 'MLLW',
                'dmetaphone1' => 'MLL',
                'dmetaphone2' => 'MLL'
            ],
            [
                'name'        => 'Melba Crisp',
                'type'        => 'silly',
                'soundex'     => 'M412',
                'metaphone'   => 'MLBKRSP',
                'dmetaphone1' => 'MLPKRSP',
                'dmetaphone2' => 'MLPKRSP'
            ],
            [
                'name'        => 'Melody Music',
                'type'        => 'silly',
                'soundex'     => 'M435',
                'metaphone'   => 'MLTMSK',
                'dmetaphone1' => 'MLTMSK',
                'dmetaphone2' => 'MLTMSK'
            ],
            [
                'name'        => 'Mick Donalds',
                'type'        => 'silly',
                'soundex'     => 'M235',
                'metaphone'   => 'MKTNLTS',
                'dmetaphone1' => 'MKTNLTS',
                'dmetaphone2' => 'MKTNLTS'
            ],
            [
                'name'        => 'Mick Rib',
                'type'        => 'silly',
                'soundex'     => 'M261',
                'metaphone'   => 'MKRB',
                'dmetaphone1' => 'MKRP',
                'dmetaphone2' => 'MKRP'
            ],
            [
                'name'        => 'Midge Itz',
                'type'        => 'silly',
                'soundex'     => 'M323',
                'metaphone'   => 'MJTS',
                'dmetaphone1' => 'MJTS',
                'dmetaphone2' => 'MJTS'
            ],
            [
                'name'        => 'Mike Easter',
                'type'        => 'silly',
                'soundex'     => 'M223',
                'metaphone'   => 'MKSTR',
                'dmetaphone1' => 'MKSTR',
                'dmetaphone2' => 'MKSTR'
            ],
            [
                'name'        => 'Mike Hunt',
                'type'        => 'silly',
                'soundex'     => 'M253',
                'metaphone'   => 'MKHNT',
                'dmetaphone1' => 'MKNT',
                'dmetaphone2' => 'MKNT'
            ],
            [
                'name'        => 'Mike Ockhurts',
                'type'        => 'silly',
                'soundex'     => 'M226',
                'metaphone'   => 'MKKHRTS',
                'dmetaphone1' => 'MKKRTS',
                'dmetaphone2' => 'MKKRTS'
            ],
            [
                'name'        => 'Mike Ocksmall',
                'type'        => 'silly',
                'soundex'     => 'M225',
                'metaphone'   => 'MKKSML',
                'dmetaphone1' => 'MKKSML',
                'dmetaphone2' => 'MKKSML'
            ],
            [
                'name'        => 'Mike Raffone',
                'type'        => 'silly',
                'soundex'     => 'M261',
                'metaphone'   => 'MKRFN',
                'dmetaphone1' => 'MKRFN',
                'dmetaphone2' => 'MKRFN'
            ],
            [
                'name'        => 'Mike Reinhart',
                'type'        => 'silly',
                'soundex'     => 'M265',
                'metaphone'   => 'MKRNHRT',
                'dmetaphone1' => 'MKRNRT',
                'dmetaphone2' => 'MKRNRT'
            ],
            [
                'name'        => 'Mike Roscope',
                'type'        => 'silly',
                'soundex'     => 'M262',
                'metaphone'   => 'MKRSKP',
                'dmetaphone1' => 'MKRSKP',
                'dmetaphone2' => 'MKRSKP'
            ],
            [
                'name'        => 'Mike Rotch',
                'type'        => 'silly',
                'soundex'     => 'M263',
                'metaphone'   => 'MKRX',
                'dmetaphone1' => 'MKRX',
                'dmetaphone2' => 'MKRX'
            ],
            [
                'name'        => 'Mike Stand',
                'type'        => 'silly',
                'soundex'     => 'M223',
                'metaphone'   => 'MKSTNT',
                'dmetaphone1' => 'MKSTNT',
                'dmetaphone2' => 'MKSTNT'
            ],
            [
                'name'        => 'Mike Sweeney',
                'type'        => 'silly',
                'soundex'     => 'M225',
                'metaphone'   => 'MKSWN',
                'dmetaphone1' => 'MKSN',
                'dmetaphone2' => 'MKSN'
            ],
            [
                'name'        => 'Mike Unstinks',
                'type'        => 'silly',
                'soundex'     => 'M252',
                'metaphone'   => 'MKNSTNKS',
                'dmetaphone1' => 'MKNSTNKS',
                'dmetaphone2' => 'MKNSTNKS'
            ],
            [
                'name'        => 'Milly Graham',
                'type'        => 'silly',
                'soundex'     => 'M426',
                'metaphone'   => 'MLKRHM',
                'dmetaphone1' => 'MLKRHM',
                'dmetaphone2' => 'MLKRHM'
            ],
            [
                'name'        => 'Minnie Mum',
                'type'        => 'silly',
                'soundex'     => 'M555',
                'metaphone'   => 'MNMM',
                'dmetaphone1' => 'MNMM',
                'dmetaphone2' => 'MNMM'
            ],
            [
                'name'        => 'Minnie Strone',
                'type'        => 'silly',
                'soundex'     => 'M523',
                'metaphone'   => 'MNSTRN',
                'dmetaphone1' => 'MNSTRN',
                'dmetaphone2' => 'MNSTRN'
            ],
            [
                'name'        => 'Minny van Gogh',
                'type'        => 'silly',
                'soundex'     => 'M515',
                'metaphone'   => 'MNFNKF',
                'dmetaphone1' => 'MNFNKK',
                'dmetaphone2' => 'MNFNKK'
            ],
            [
                'name'        => 'Missy Sippy',
                'type'        => 'silly',
                'soundex'     => 'M221',
                'metaphone'   => 'MSSP',
                'dmetaphone1' => 'MSSP',
                'dmetaphone2' => 'MSSP'
            ],
            [
                'name'        => 'Mister Bates',
                'type'        => 'silly',
                'soundex'     => 'M236',
                'metaphone'   => 'MSTRBTS',
                'dmetaphone1' => 'MSTRPTS',
                'dmetaphone2' => 'MSTRPTS'
            ],
            [
                'name'        => 'Misty C. Shore',
                'type'        => 'silly',
                'soundex'     => 'M232',
                'metaphone'   => 'MSTKXR',
                'dmetaphone1' => 'MSTKXR',
                'dmetaphone2' => 'MSTKXR'
            ],
            [
                'name'        => 'Misty Waters',
                'type'        => 'silly',
                'soundex'     => 'M233',
                'metaphone'   => 'MSTWTRS',
                'dmetaphone1' => 'MSTTRS',
                'dmetaphone2' => 'MSTTRS'
            ],
            [
                'name'        => 'Mo Lestor',
                'type'        => 'silly',
                'soundex'     => 'M423',
                'metaphone'   => 'MLSTR',
                'dmetaphone1' => 'MLSTR',
                'dmetaphone2' => 'MLSTR'
            ],
            [
                'name'        => 'Moe B. Dick',
                'type'        => 'silly',
                'soundex'     => 'M132',
                'metaphone'   => 'MBTK',
                'dmetaphone1' => 'MPTK',
                'dmetaphone2' => 'MPTK'
            ],
            [
                'name'        => 'Moe Fugga',
                'type'        => 'silly',
                'soundex'     => 'M120',
                'metaphone'   => 'MFK',
                'dmetaphone1' => 'MFK',
                'dmetaphone2' => 'MFK'
            ],
            [
                'name'        => 'Moe Thegrass',
                'type'        => 'silly',
                'soundex'     => 'M326',
                'metaphone'   => 'M0KRS',
                'dmetaphone1' => 'M0KRS',
                'dmetaphone2' => 'MTKRS'
            ],
            [
                'name'        => 'Molly Kuehl',
                'type'        => 'silly',
                'soundex'     => 'M424',
                'metaphone'   => 'MLKL',
                'dmetaphone1' => 'MLKL',
                'dmetaphone2' => 'MLKL'
            ],
            [
                'name'        => 'Mona Lisa',
                'type'        => 'silly',
                'soundex'     => 'M542',
                'metaphone'   => 'MNLS',
                'dmetaphone1' => 'MNLS',
                'dmetaphone2' => 'MNLS'
            ],
            [
                'name'        => 'Mona Lott',
                'type'        => 'silly',
                'soundex'     => 'M543',
                'metaphone'   => 'MNLT',
                'dmetaphone1' => 'MNLT',
                'dmetaphone2' => 'MNLT'
            ],
            [
                'name'        => 'Monty Carlo',
                'type'        => 'silly',
                'soundex'     => 'M532',
                'metaphone'   => 'MNTKRL',
                'dmetaphone1' => 'MNTKRL',
                'dmetaphone2' => 'MNTKRL'
            ],
            [
                'name'        => 'Morey Bund',
                'type'        => 'silly',
                'soundex'     => 'M615',
                'metaphone'   => 'MRBNT',
                'dmetaphone1' => 'MRPNT',
                'dmetaphone2' => 'MRPNT'
            ],
            [
                'name'        => 'Mort Adella',
                'type'        => 'silly',
                'soundex'     => 'M633',
                'metaphone'   => 'MRTTL',
                'dmetaphone1' => 'MRTTL',
                'dmetaphone2' => 'MRTTL'
            ],
            [
                'name'        => 'Mort Ission',
                'type'        => 'silly',
                'soundex'     => 'M632',
                'metaphone'   => 'MRTSN',
                'dmetaphone1' => 'MRTSN',
                'dmetaphone2' => 'MRTSN'
            ],
            [
                'name'        => 'Muddy Waters',
                'type'        => 'silly',
                'soundex'     => 'M336',
                'metaphone'   => 'MTWTRS',
                'dmetaphone1' => 'MTTRS',
                'dmetaphone2' => 'MTTRS'
            ],
            [
                'name'        => 'Myles Long',
                'type'        => 'silly',
                'soundex'     => 'M424',
                'metaphone'   => 'MLSLNK',
                'dmetaphone1' => 'MLSLNK',
                'dmetaphone2' => 'MLSLNK'
            ],
            [
                'name'        => 'Nancy Ann Cianci',
                'type'        => 'silly',
                'soundex'     => 'N525',
                'metaphone'   => 'NNSNXNS',
                'dmetaphone1' => 'NNSNSNS',
                'dmetaphone2' => 'NNSNXNS'
            ],
            [
                'name'        => 'Nat Sass',
                'type'        => 'silly',
                'soundex'     => 'N322',
                'metaphone'   => 'NTSS',
                'dmetaphone1' => 'NTSS',
                'dmetaphone2' => 'NTSS'
            ],
            [
                'name'        => 'Neil Crouch',
                'type'        => 'silly',
                'soundex'     => 'N426',
                'metaphone'   => 'NLKRX',
                'dmetaphone1' => 'NLKRK',
                'dmetaphone2' => 'NLKRK'
            ],
            [
                'name'        => 'Neil Down',
                'type'        => 'silly',
                'soundex'     => 'N435',
                'metaphone'   => 'NLTN',
                'dmetaphone1' => 'NLTN',
                'dmetaphone2' => 'NLTN'
            ],
            [
                'name'        => 'Neil McNeil',
                'type'        => 'silly',
                'soundex'     => 'N452',
                'metaphone'   => 'NLMKNL',
                'dmetaphone1' => 'NLMKNL',
                'dmetaphone2' => 'NLMKNL'
            ],
            [
                'name'        => 'Nick Knack',
                'type'        => 'silly',
                'soundex'     => 'N252',
                'metaphone'   => 'NKKNK',
                'dmetaphone1' => 'NKKNK',
                'dmetaphone2' => 'NKKNK'
            ],
            [
                'name'        => 'Nick O. Time',
                'type'        => 'silly',
                'soundex'     => 'N235',
                'metaphone'   => 'NKTM',
                'dmetaphone1' => 'NKTM',
                'dmetaphone2' => 'NKTM'
            ],
            [
                'name'        => 'Nick R. Bocker',
                'type'        => 'silly',
                'soundex'     => 'N261',
                'metaphone'   => 'NKRBKR',
                'dmetaphone1' => 'NKRPKR',
                'dmetaphone2' => 'NKRPKR'
            ],
            [
                'name'        => 'Noah Lott',
                'type'        => 'silly',
                'soundex'     => 'N430',
                'metaphone'   => 'NLT',
                'dmetaphone1' => 'NLT',
                'dmetaphone2' => 'NLT'
            ],
            [
                'name'        => 'Noah Riddle',
                'type'        => 'silly',
                'soundex'     => 'N634',
                'metaphone'   => 'NRTL',
                'dmetaphone1' => 'NRTL',
                'dmetaphone2' => 'NRTL'
            ],
            [
                'name'        => 'Norma Leigh Lucid',
                'type'        => 'silly',
                'soundex'     => 'N654',
                'metaphone'   => 'NRMLFLST',
                'dmetaphone1' => 'NRMLLST',
                'dmetaphone2' => 'NRMLLST'
            ],
            [
                'name'        => 'Olav Myfriendsaregay',
                'type'        => 'silly',
                'soundex'     => 'O415',
                'metaphone'   => 'OLFMFRNTSRK',
                'dmetaphone1' => 'ALFMFRNTSRK',
                'dmetaphone2' => 'ALFMFRNTSRK'
            ],
            [
                'name'        => 'Olive Branch',
                'type'        => 'silly',
                'soundex'     => 'O411',
                'metaphone'   => 'OLFBRNX',
                'dmetaphone1' => 'ALFPRNX',
                'dmetaphone2' => 'ALFPRNK'
            ],
            [
                'name'        => 'Olive Green',
                'type'        => 'silly',
                'soundex'     => 'O412',
                'metaphone'   => 'OLFKRN',
                'dmetaphone1' => 'ALFKRN',
                'dmetaphone2' => 'ALFKRN'
            ],
            [
                'name'        => 'Olive Hoyl',
                'type'        => 'silly',
                'soundex'     => 'O414',
                'metaphone'   => 'OLFHL',
                'dmetaphone1' => 'ALFL',
                'dmetaphone2' => 'ALFL'
            ],
            [
                'name'        => 'Olive Yew',
                'type'        => 'silly',
                'soundex'     => 'O410',
                'metaphone'   => 'OLFY',
                'dmetaphone1' => 'ALF',
                'dmetaphone2' => 'ALFF'
            ],
            [
                'name'        => 'Olive Yu',
                'type'        => 'silly',
                'soundex'     => 'O410',
                'metaphone'   => 'OLFY',
                'dmetaphone1' => 'ALF',
                'dmetaphone2' => 'ALF'
            ],
            [
                'name'        => 'Oliver Clothesoff',
                'type'        => 'silly',
                'soundex'     => 'O416',
                'metaphone'   => 'OLFRKL0SF',
                'dmetaphone1' => 'ALFRKL0SF',
                'dmetaphone2' => 'ALFRKLTSF'
            ],
            [
                'name'        => 'Oliver Sutton',
                'type'        => 'silly',
                'soundex'     => 'O416',
                'metaphone'   => 'OLFRSTN',
                'dmetaphone1' => 'ALFRSTN',
                'dmetaphone2' => 'ALFRSTN'
            ],
            [
                'name'        => 'Tim Mara',
                'type'        => 'silly',
                'soundex'     => 'T560',
                'metaphone'   => 'TMMR',
                'dmetaphone1' => 'TMMR',
                'dmetaphone2' => 'TMMR'
            ],
            [
                'name'        => 'Ollie Tabooger',
                'type'        => 'silly',
                'soundex'     => 'O431',
                'metaphone'   => 'OLTBJR',
                'dmetaphone1' => 'ALTPKR',
                'dmetaphone2' => 'ALTPJR'
            ],
            [
                'name'        => 'Ophelia Payne',
                'type'        => 'silly',
                'soundex'     => 'O141',
                'metaphone'   => 'OFLPN',
                'dmetaphone1' => 'AFLPN',
                'dmetaphone2' => 'AFLPN'
            ],
            [
                'name'        => 'Oren Jellow',
                'type'        => 'silly',
                'soundex'     => 'O652',
                'metaphone'   => 'ORNJL',
                'dmetaphone1' => 'ARNJL',
                'dmetaphone2' => 'ARNJLF'
            ],
            [
                'name'        => 'Orson Carte',
                'type'        => 'silly',
                'soundex'     => 'O625',
                'metaphone'   => 'ORSNKRT',
                'dmetaphone1' => 'ARSNKRT',
                'dmetaphone2' => 'ARSNKRT'
            ],
            [
                'name'        => 'Oscar Ruitt',
                'type'        => 'silly',
                'soundex'     => 'O263',
                'metaphone'   => 'OSKRRT',
                'dmetaphone1' => 'ASKRRT',
                'dmetaphone2' => 'ASKRRT'
            ],
            [
                'name'        => 'Otto Carr',
                'type'        => 'silly',
                'soundex'     => 'O326',
                'metaphone'   => 'OTKR',
                'dmetaphone1' => 'ATKR',
                'dmetaphone2' => 'ATKR'
            ],
            [
                'name'        => 'Otto Graf',
                'type'        => 'silly',
                'soundex'     => 'O326',
                'metaphone'   => 'OTKRF',
                'dmetaphone1' => 'ATKRF',
                'dmetaphone2' => 'ATKRF'
            ],
            [
                'name'        => 'Otto Matic',
                'type'        => 'silly',
                'soundex'     => 'O353',
                'metaphone'   => 'OTMTK',
                'dmetaphone1' => 'ATMTK',
                'dmetaphone2' => 'ATMTK'
            ],
            [
                'name'        => 'Owen Bigg',
                'type'        => 'silly',
                'soundex'     => 'O512',
                'metaphone'   => 'OWNBK',
                'dmetaphone1' => 'ANPK',
                'dmetaphone2' => 'ANPK'
            ],
            [
                'name'        => 'Owen Cash',
                'type'        => 'silly',
                'soundex'     => 'O522',
                'metaphone'   => 'OWNKX',
                'dmetaphone1' => 'ANKX',
                'dmetaphone2' => 'ANKX'
            ],
            [
                'name'        => 'Owen Moore',
                'type'        => 'silly',
                'soundex'     => 'O560',
                'metaphone'   => 'OWNMR',
                'dmetaphone1' => 'ANMR',
                'dmetaphone2' => 'ANMR'
            ],
            [
                'name'        => 'P. Brain',
                'type'        => 'silly',
                'soundex'     => 'P650',
                'metaphone'   => 'PBRN',
                'dmetaphone1' => 'PPRN',
                'dmetaphone2' => 'PPRN'
            ],
            [
                'name'        => 'P. Ness',
                'type'        => 'silly',
                'soundex'     => 'P520',
                'metaphone'   => 'PNS',
                'dmetaphone1' => 'PNS',
                'dmetaphone2' => 'PNS'
            ],
            [
                'name'        => 'Paige Turner',
                'type'        => 'silly',
                'soundex'     => 'P236',
                'metaphone'   => 'PJTRNR',
                'dmetaphone1' => 'PJTRNR',
                'dmetaphone2' => 'PKTRNR'
            ],
            [
                'name'        => 'Park A. Studebaker',
                'type'        => 'silly',
                'soundex'     => 'P622',
                'metaphone'   => 'PRKSTTBKR',
                'dmetaphone1' => 'PRKSTTPKR',
                'dmetaphone2' => 'PRKSTTPKR'
            ],
            [
                'name'        => 'Parker Carr',
                'type'        => 'silly',
                'soundex'     => 'P626',
                'metaphone'   => 'PRKRKR',
                'dmetaphone1' => 'PRKRKR',
                'dmetaphone2' => 'PRKRKR'
            ],
            [
                'name'        => 'Pat Agonia',
                'type'        => 'silly',
                'soundex'     => 'P325',
                'metaphone'   => 'PTKN',
                'dmetaphone1' => 'PTKN',
                'dmetaphone2' => 'PTKN'
            ],
            [
                'name'        => 'Pat Downe',
                'type'        => 'silly',
                'soundex'     => 'P350',
                'metaphone'   => 'PTTN',
                'dmetaphone1' => 'PTTN',
                'dmetaphone2' => 'PTTN'
            ],
            [
                'name'        => 'Pat Ernity',
                'type'        => 'silly',
                'soundex'     => 'P365',
                'metaphone'   => 'PTRNT',
                'dmetaphone1' => 'PTRNT',
                'dmetaphone2' => 'PTRNT'
            ],
            [
                'name'        => 'Pat Hiscock',
                'type'        => 'silly',
                'soundex'     => 'P322',
                'metaphone'   => 'PTHSKK',
                'dmetaphone1' => 'PTSKK',
                'dmetaphone2' => 'PTSKK'
            ],
            [
                'name'        => 'Pat McCann',
                'type'        => 'silly',
                'soundex'     => 'P352',
                'metaphone'   => 'PTMKKN',
                'dmetaphone1' => 'PTMKN',
                'dmetaphone2' => 'PTMKN'
            ],
            [
                'name'        => 'Patience Wait',
                'type'        => 'silly',
                'soundex'     => 'P352',
                'metaphone'   => 'PTNSWT',
                'dmetaphone1' => 'PTNST',
                'dmetaphone2' => 'PTNST'
            ],
            [
                'name'        => 'Patty Whack',
                'type'        => 'silly',
                'soundex'     => 'P320',
                'metaphone'   => 'PTHK',
                'dmetaphone1' => 'PTK',
                'dmetaphone2' => 'PTK'
            ],
            [
                'name'        => 'Paul Issy',
                'type'        => 'silly',
                'soundex'     => 'P420',
                'metaphone'   => 'PLS',
                'dmetaphone1' => 'PLS',
                'dmetaphone2' => 'PLS'
            ],
            [
                'name'        => 'Paul Itician',
                'type'        => 'silly',
                'soundex'     => 'P432',
                'metaphone'   => 'PLTXN',
                'dmetaphone1' => 'PLTSN',
                'dmetaphone2' => 'PLTXN'
            ],
            [
                'name'        => 'Paul Misunday',
                'type'        => 'silly',
                'soundex'     => 'P452',
                'metaphone'   => 'PLMSNT',
                'dmetaphone1' => 'PLMSNT',
                'dmetaphone2' => 'PLMSNT'
            ],
            [
                'name'        => 'Paul Molive',
                'type'        => 'silly',
                'soundex'     => 'P454',
                'metaphone'   => 'PLMLF',
                'dmetaphone1' => 'PLMLF',
                'dmetaphone2' => 'PLMLF'
            ],
            [
                'name'        => 'Paul Samic',
                'type'        => 'silly',
                'soundex'     => 'P425',
                'metaphone'   => 'PLSMK',
                'dmetaphone1' => 'PLSMK',
                'dmetaphone2' => 'PLSMK'
            ],
            [
                'name'        => 'Pearl Button',
                'type'        => 'silly',
                'soundex'     => 'P641',
                'metaphone'   => 'PRLBTN',
                'dmetaphone1' => 'PRLPTN',
                'dmetaphone2' => 'PRLPTN'
            ],
            [
                'name'        => 'Pearl E. Gates',
                'type'        => 'silly',
                'soundex'     => 'P642',
                'metaphone'   => 'PRLKTS',
                'dmetaphone1' => 'PRLKTS',
                'dmetaphone2' => 'PRLKTS'
            ],
            [
                'name'        => 'Pearl E. White',
                'type'        => 'silly',
                'soundex'     => 'P643',
                'metaphone'   => 'PRLHT',
                'dmetaphone1' => 'PRLT',
                'dmetaphone2' => 'PRLT'
            ],
            [
                'name'        => 'Peg Leg',
                'type'        => 'silly',
                'soundex'     => 'P242',
                'metaphone'   => 'PKLK',
                'dmetaphone1' => 'PKLK',
                'dmetaphone2' => 'PKLK'
            ],
            [
                'name'        => 'Peg Legge',
                'type'        => 'silly',
                'soundex'     => 'P242',
                'metaphone'   => 'PKLK',
                'dmetaphone1' => 'PKLK',
                'dmetaphone2' => 'PKLK'
            ],
            [
                'name'        => 'Penny Dollar',
                'type'        => 'silly',
                'soundex'     => 'P534',
                'metaphone'   => 'PNTLR',
                'dmetaphone1' => 'PNTLR',
                'dmetaphone2' => 'PNTLR'
            ],
            [
                'name'        => 'Penny Lane',
                'type'        => 'silly',
                'soundex'     => 'P545',
                'metaphone'   => 'PNLN',
                'dmetaphone1' => 'PNLN',
                'dmetaphone2' => 'PNLN'
            ],
            [
                'name'        => 'Penny Nichols',
                'type'        => 'silly',
                'soundex'     => 'P552',
                'metaphone'   => 'PNNXLS',
                'dmetaphone1' => 'PNNXLS',
                'dmetaphone2' => 'PNNKLS'
            ],
            [
                'name'        => 'Penny Profit',
                'type'        => 'silly',
                'soundex'     => 'P516',
                'metaphone'   => 'PNPRFT',
                'dmetaphone1' => 'PNPRFT',
                'dmetaphone2' => 'PNPRFT'
            ],
            [
                'name'        => 'Penny Trate',
                'type'        => 'silly',
                'soundex'     => 'P536',
                'metaphone'   => 'PNTRT',
                'dmetaphone1' => 'PNTRT',
                'dmetaphone2' => 'PNTRT'
            ],
            [
                'name'        => 'Penny Tration',
                'type'        => 'silly',
                'soundex'     => 'P536',
                'metaphone'   => 'PNTRXN',
                'dmetaphone1' => 'PNTRXN',
                'dmetaphone2' => 'PNTRXN'
            ],
            [
                'name'        => 'Penny Wise',
                'type'        => 'silly',
                'soundex'     => 'P520',
                'metaphone'   => 'PNWS',
                'dmetaphone1' => 'PNS',
                'dmetaphone2' => 'PNS'
            ],
            [
                'name'        => 'Pepe Roni',
                'type'        => 'silly',
                'soundex'     => 'P165',
                'metaphone'   => 'PPRN',
                'dmetaphone1' => 'PPRN',
                'dmetaphone2' => 'PPRN'
            ],
            [
                'name'        => 'Pete Moss',
                'type'        => 'silly',
                'soundex'     => 'P352',
                'metaphone'   => 'PTMS',
                'dmetaphone1' => 'PTMS',
                'dmetaphone2' => 'PTMS'
            ],
            [
                'name'        => 'Pete Sariya',
                'type'        => 'silly',
                'soundex'     => 'P326',
                'metaphone'   => 'PTSRY',
                'dmetaphone1' => 'PTSR',
                'dmetaphone2' => 'PTSR'
            ],
            [
                'name'        => 'Peter Johnson',
                'type'        => 'silly',
                'soundex'     => 'P362',
                'metaphone'   => 'PTRJNSN',
                'dmetaphone1' => 'PTRJNSN',
                'dmetaphone2' => 'PTRJNSN'
            ],
            [
                'name'        => 'Peter Pants',
                'type'        => 'silly',
                'soundex'     => 'P361',
                'metaphone'   => 'PTRPNTS',
                'dmetaphone1' => 'PTRPNTS',
                'dmetaphone2' => 'PTRPNTS'
            ],
            [
                'name'        => 'Peter Peed',
                'type'        => 'silly',
                'soundex'     => 'P361',
                'metaphone'   => 'PTRPT',
                'dmetaphone1' => 'PTRPT',
                'dmetaphone2' => 'PTRPT'
            ],
            [
                'name'        => 'Petey Atricks',
                'type'        => 'silly',
                'soundex'     => 'P336',
                'metaphone'   => 'PTTRKS',
                'dmetaphone1' => 'PTTRKS',
                'dmetaphone2' => 'PTTRKS'
            ],
            [
                'name'        => 'Petey Cruiser',
                'type'        => 'silly',
                'soundex'     => 'P326',
                'metaphone'   => 'PTKRSR',
                'dmetaphone1' => 'PTKRSR',
                'dmetaphone2' => 'PTKRSR'
            ],
            [
                'name'        => 'Phil Anderer',
                'type'        => 'silly',
                'soundex'     => 'P453',
                'metaphone'   => 'FLNTRR',
                'dmetaphone1' => 'FLNTRR',
                'dmetaphone2' => 'FLNTRR'
            ],
            [
                'name'        => 'Phil Anthropist',
                'type'        => 'silly',
                'soundex'     => 'P453',
                'metaphone'   => 'FLN0RPST',
                'dmetaphone1' => 'FLN0RPST',
                'dmetaphone2' => 'FLNTRPST'
            ],
            [
                'name'        => 'Phil Bowles',
                'type'        => 'silly',
                'soundex'     => 'P414',
                'metaphone'   => 'FLBLS',
                'dmetaphone1' => 'FLPLS',
                'dmetaphone2' => 'FLPLS'
            ],
            [
                'name'        => 'Phil Degrave',
                'type'        => 'silly',
                'soundex'     => 'P432',
                'metaphone'   => 'FLTKRF',
                'dmetaphone1' => 'FLTKRF',
                'dmetaphone2' => 'FLTKRF'
            ],
            [
                'name'        => 'Phil Erup',
                'type'        => 'silly',
                'soundex'     => 'P461',
                'metaphone'   => 'FLRP',
                'dmetaphone1' => 'FLRP',
                'dmetaphone2' => 'FLRP'
            ],
            [
                'name'        => 'Phil Graves',
                'type'        => 'silly',
                'soundex'     => 'P426',
                'metaphone'   => 'FLKRFS',
                'dmetaphone1' => 'FLKRFS',
                'dmetaphone2' => 'FLKRFS'
            ],
            [
                'name'        => 'Phil Harmonic',
                'type'        => 'silly',
                'soundex'     => 'P465',
                'metaphone'   => 'FLHRMNK',
                'dmetaphone1' => 'FLRMNK',
                'dmetaphone2' => 'FLRMNK'
            ],
            [
                'name'        => 'Phil Lacio',
                'type'        => 'silly',
                'soundex'     => 'P420',
                'metaphone'   => 'FLLS',
                'dmetaphone1' => 'FLLS',
                'dmetaphone2' => 'FLLX'
            ],
            [
                'name'        => 'Phil Miaz',
                'type'        => 'silly',
                'soundex'     => 'P452',
                'metaphone'   => 'FLMS',
                'dmetaphone1' => 'FLMS',
                'dmetaphone2' => 'FLMS'
            ],
            [
                'name'        => 'Phil Mypockets',
                'type'        => 'silly',
                'soundex'     => 'P451',
                'metaphone'   => 'FLMPKTS',
                'dmetaphone1' => 'FLMPKTS',
                'dmetaphone2' => 'FLMPKTS'
            ],
            [
                'name'        => 'Phil Rupp',
                'type'        => 'silly',
                'soundex'     => 'P461',
                'metaphone'   => 'FLRP',
                'dmetaphone1' => 'FLRP',
                'dmetaphone2' => 'FLRP'
            ],
            [
                'name'        => 'Phil Updegrave',
                'type'        => 'silly',
                'soundex'     => 'P413',
                'metaphone'   => 'FLPTKRF',
                'dmetaphone1' => 'FLPTKRF',
                'dmetaphone2' => 'FLPTKRF'
            ],
            [
                'name'        => 'Phil Wright',
                'type'        => 'silly',
                'soundex'     => 'P462',
                'metaphone'   => 'FLRFT',
                'dmetaphone1' => 'FLRT',
                'dmetaphone2' => 'FLRT'
            ],
            [
                'name'        => 'Phillip D. Bagg',
                'type'        => 'silly',
                'soundex'     => 'P413',
                'metaphone'   => 'FLPTBK',
                'dmetaphone1' => 'FLPTPK',
                'dmetaphone2' => 'FLPTPK'
            ],
            [
                'name'        => 'Pierce Cox',
                'type'        => 'silly',
                'soundex'     => 'P622',
                'metaphone'   => 'PRSKKS',
                'dmetaphone1' => 'PRSKKS',
                'dmetaphone2' => 'PRSKKS'
            ],
            [
                'name'        => 'Pierce Deere',
                'type'        => 'silly',
                'soundex'     => 'P623',
                'metaphone'   => 'PRSTR',
                'dmetaphone1' => 'PRSTR',
                'dmetaphone2' => 'PRSTR'
            ],
            [
                'name'        => 'Pierce Hart',
                'type'        => 'silly',
                'soundex'     => 'P626',
                'metaphone'   => 'PRSHRT',
                'dmetaphone1' => 'PRSRT',
                'dmetaphone2' => 'PRSRT'
            ],
            [
                'name'        => 'Polly Ester',
                'type'        => 'silly',
                'soundex'     => 'P423',
                'metaphone'   => 'PLSTR',
                'dmetaphone1' => 'PLSTR',
                'dmetaphone2' => 'PLSTR'
            ],
            [
                'name'        => 'Polly Science',
                'type'        => 'silly',
                'soundex'     => 'P425',
                'metaphone'   => 'PLSNS',
                'dmetaphone1' => 'PLSNS',
                'dmetaphone2' => 'PLSNS'
            ],
            [
                'name'        => 'Polly Tech',
                'type'        => 'silly',
                'soundex'     => 'P432',
                'metaphone'   => 'PLTX',
                'dmetaphone1' => 'PLTK',
                'dmetaphone2' => 'PLTK'
            ],
            [
                'name'        => 'Poncho Mouf',
                'type'        => 'silly',
                'soundex'     => 'P525',
                'metaphone'   => 'PNXMF',
                'dmetaphone1' => 'PNXMF',
                'dmetaphone2' => 'PNKMF'
            ],
            [
                'name'        => 'Poppa Cherry',
                'type'        => 'silly',
                'soundex'     => 'P126',
                'metaphone'   => 'PPXR',
                'dmetaphone1' => 'PPXR',
                'dmetaphone2' => 'PPKR'
            ],
            [
                'name'        => 'Post Mark',
                'type'        => 'silly',
                'soundex'     => 'P235',
                'metaphone'   => 'PSTMRK',
                'dmetaphone1' => 'PSTMRK',
                'dmetaphone2' => 'PSTMRK'
            ],
            [
                'name'        => 'Price Wright',
                'type'        => 'silly',
                'soundex'     => 'P626',
                'metaphone'   => 'PRSRFT',
                'dmetaphone1' => 'PRSRT',
                'dmetaphone2' => 'PRSRT'
            ],
            [
                'name'        => 'Priti Manek',
                'type'        => 'silly',
                'soundex'     => 'P635',
                'metaphone'   => 'PRTMNK',
                'dmetaphone1' => 'PRTMNK',
                'dmetaphone2' => 'PRTMNK'
            ],
            [
                'name'        => 'R. M. Pitt',
                'type'        => 'silly',
                'soundex'     => 'R513',
                'metaphone'   => 'RMPT',
                'dmetaphone1' => 'RMPT',
                'dmetaphone2' => 'RMPT'
            ],
            [
                'name'        => 'R. Sitch',
                'type'        => 'silly',
                'soundex'     => 'R232',
                'metaphone'   => 'RSX',
                'dmetaphone1' => 'RSX',
                'dmetaphone2' => 'RSX'
            ],
            [
                'name'        => 'R. Slicker',
                'type'        => 'silly',
                'soundex'     => 'R242',
                'metaphone'   => 'RSLKR',
                'dmetaphone1' => 'RSLKR',
                'dmetaphone2' => 'RSLKR'
            ],
            [
                'name'        => 'Rachel Slurs',
                'type'        => 'silly',
                'soundex'     => 'R242',
                'metaphone'   => 'RXLSLRS',
                'dmetaphone1' => 'RXLSLRS',
                'dmetaphone2' => 'RKLSLRS'
            ],
            [
                'name'        => 'Randy Guy',
                'type'        => 'silly',
                'soundex'     => 'R532',
                'metaphone'   => 'RNTK',
                'dmetaphone1' => 'RNTK',
                'dmetaphone2' => 'RNTK'
            ],
            [
                'name'        => 'Randy Lover',
                'type'        => 'silly',
                'soundex'     => 'R534',
                'metaphone'   => 'RNTLFR',
                'dmetaphone1' => 'RNTLFR',
                'dmetaphone2' => 'RNTLFR'
            ],
            [
                'name'        => 'Raney Schauer',
                'type'        => 'silly',
                'soundex'     => 'R526',
                'metaphone'   => 'RNSXR',
                'dmetaphone1' => 'RNXR',
                'dmetaphone2' => 'RNXR'
            ],
            [
                'name'        => 'Ray Cyst',
                'type'        => 'silly',
                'soundex'     => 'R223',
                'metaphone'   => 'RSST',
                'dmetaphone1' => 'RSST',
                'dmetaphone2' => 'RSST'
            ],
            [
                'name'        => 'Ray Diation',
                'type'        => 'silly',
                'soundex'     => 'R335',
                'metaphone'   => 'RTXN',
                'dmetaphone1' => 'RTXN',
                'dmetaphone2' => 'RTXN'
            ],
            [
                'name'        => 'Ray Gunn',
                'type'        => 'silly',
                'soundex'     => 'R250',
                'metaphone'   => 'RKN',
                'dmetaphone1' => 'RKN',
                'dmetaphone2' => 'RKN'
            ],
            [
                'name'        => 'Ray Volver',
                'type'        => 'silly',
                'soundex'     => 'R141',
                'metaphone'   => 'RFLFR',
                'dmetaphone1' => 'RFLFR',
                'dmetaphone2' => 'RFLFR'
            ],
            [
                'name'        => 'Ray Zenz',
                'type'        => 'silly',
                'soundex'     => 'R252',
                'metaphone'   => 'RSNS',
                'dmetaphone1' => 'RSNS',
                'dmetaphone2' => 'RSNS'
            ],
            [
                'name'        => 'Ray Zindaroof',
                'type'        => 'silly',
                'soundex'     => 'R253',
                'metaphone'   => 'RSNTRF',
                'dmetaphone1' => 'RSNTRF',
                'dmetaphone2' => 'RSNTRF'
            ],
            [
                'name'        => 'Raynor Schein',
                'type'        => 'silly',
                'soundex'     => 'R562',
                'metaphone'   => 'RNRSXN',
                'dmetaphone1' => 'RNRXN',
                'dmetaphone2' => 'RNRXN'
            ],
            [
                'name'        => 'Reanne Carnation',
                'type'        => 'silly',
                'soundex'     => 'R526',
                'metaphone'   => 'RNKRNXN',
                'dmetaphone1' => 'RNKRNXN',
                'dmetaphone2' => 'RNKRNXN'
            ],
            [
                'name'        => 'Reed Iculous',
                'type'        => 'silly',
                'soundex'     => 'R324',
                'metaphone'   => 'RTKLS',
                'dmetaphone1' => 'RTKLS',
                'dmetaphone2' => 'RTKLS'
            ],
            [
                'name'        => 'Reggie Stration',
                'type'        => 'silly',
                'soundex'     => 'R223',
                'metaphone'   => 'RKSTRXN',
                'dmetaphone1' => 'RKSTRXN',
                'dmetaphone2' => 'RKSTRXN'
            ],
            [
                'name'        => 'Reid Enright',
                'type'        => 'silly',
                'soundex'     => 'R356',
                'metaphone'   => 'RTNRFT',
                'dmetaphone1' => 'RTNRT',
                'dmetaphone2' => 'RTNRT'
            ],
            [
                'name'        => 'Reuben Sandwich',
                'type'        => 'silly',
                'soundex'     => 'R152',
                'metaphone'   => 'RBNSNTWX',
                'dmetaphone1' => 'RPNSNTX',
                'dmetaphone2' => 'RPNSNTK'
            ],
            [
                'name'        => 'Rex Easley',
                'type'        => 'silly',
                'soundex'     => 'R224',
                'metaphone'   => 'RKSSL',
                'dmetaphone1' => 'RKSSL',
                'dmetaphone2' => 'RKSSL'
            ],
            [
                'name'        => 'Rhea Curran',
                'type'        => 'silly',
                'soundex'     => 'R265',
                'metaphone'   => 'RHKRN',
                'dmetaphone1' => 'RKRN',
                'dmetaphone2' => 'RKRN'
            ],
            [
                'name'        => 'Rhoda Booke',
                'type'        => 'silly',
                'soundex'     => 'R312',
                'metaphone'   => 'RHTBK',
                'dmetaphone1' => 'RTPK',
                'dmetaphone2' => 'RTPK'
            ],
            [
                'name'        => 'Rich Feller',
                'type'        => 'silly',
                'soundex'     => 'R214',
                'metaphone'   => 'RXFLR',
                'dmetaphone1' => 'RXFLR',
                'dmetaphone2' => 'RKFLR'
            ],
            [
                'name'        => 'Rich Guy',
                'type'        => 'silly',
                'soundex'     => 'R220',
                'metaphone'   => 'RXK',
                'dmetaphone1' => 'RXK',
                'dmetaphone2' => 'RKK'
            ],
            [
                'name'        => 'Rich Kidd',
                'type'        => 'silly',
                'soundex'     => 'R223',
                'metaphone'   => 'RXKT',
                'dmetaphone1' => 'RXKT',
                'dmetaphone2' => 'RKKT'
            ],
            [
                'name'        => 'Rich Mann',
                'type'        => 'silly',
                'soundex'     => 'R255',
                'metaphone'   => 'RXMN',
                'dmetaphone1' => 'RXMN',
                'dmetaphone2' => 'RKMN'
            ],
            [
                'name'        => 'Richard Chopp',
                'type'        => 'silly',
                'soundex'     => 'R263',
                'metaphone'   => 'RXRTXP',
                'dmetaphone1' => 'RXRTXP',
                'dmetaphone2' => 'RKRTKP'
            ],
            [
                'name'        => 'Richard P. Cox',
                'type'        => 'silly',
                'soundex'     => 'R263',
                'metaphone'   => 'RXRTPKKS',
                'dmetaphone1' => 'RXRTPKKS',
                'dmetaphone2' => 'RKRTPKKS'
            ],
            [
                'name'        => 'Rick O\'Shea',
                'type'        => 'silly',
                'soundex'     => 'R220',
                'metaphone'   => 'RKX',
                'dmetaphone1' => 'RKX',
                'dmetaphone2' => 'RKX'
            ],
            [
                'name'        => 'Rick Shaw',
                'type'        => 'silly',
                'soundex'     => 'R200',
                'metaphone'   => 'RKX',
                'dmetaphone1' => 'RKX',
                'dmetaphone2' => 'RKXF'
            ],
            [
                'name'        => 'Rip Torn',
                'type'        => 'silly',
                'soundex'     => 'R136',
                'metaphone'   => 'RPTRN',
                'dmetaphone1' => 'RPTRN',
                'dmetaphone2' => 'RPTRN'
            ],
            [
                'name'        => 'Rita Booke',
                'type'        => 'silly',
                'soundex'     => 'R312',
                'metaphone'   => 'RTBK',
                'dmetaphone1' => 'RTPK',
                'dmetaphone2' => 'RTPK'
            ],
            [
                'name'        => 'Rita Buch',
                'type'        => 'silly',
                'soundex'     => 'R312',
                'metaphone'   => 'RTBX',
                'dmetaphone1' => 'RTPK',
                'dmetaphone2' => 'RTPK'
            ],
            [
                'name'        => 'Rita Story',
                'type'        => 'silly',
                'soundex'     => 'R323',
                'metaphone'   => 'RTSTR',
                'dmetaphone1' => 'RTSTR',
                'dmetaphone2' => 'RTSTR'
            ],
            [
                'name'        => 'Rob Banks',
                'type'        => 'silly',
                'soundex'     => 'R152',
                'metaphone'   => 'RBBNKS',
                'dmetaphone1' => 'RPPNKS',
                'dmetaphone2' => 'RPPNKS'
            ],
            [
                'name'        => 'Robin Andis Merryman',
                'type'        => 'silly',
                'soundex'     => 'R155',
                'metaphone'   => 'RBNNTSMRMN',
                'dmetaphone1' => 'RPNNTSMRMN',
                'dmetaphone2' => 'RPNNTSMRMN'
            ],
            [
                'name'        => 'Robin Banks',
                'type'        => 'silly',
                'soundex'     => 'R151',
                'metaphone'   => 'RBNBNKS',
                'dmetaphone1' => 'RPNPNKS',
                'dmetaphone2' => 'RPNPNKS'
            ],
            [
                'name'        => 'Robin Feathers',
                'type'        => 'silly',
                'soundex'     => 'R151',
                'metaphone'   => 'RBNF0RS',
                'dmetaphone1' => 'RPNF0RS',
                'dmetaphone2' => 'RPNFTRS'
            ],
            [
                'name'        => 'Robin Money',
                'type'        => 'silly',
                'soundex'     => 'R155',
                'metaphone'   => 'RBNMN',
                'dmetaphone1' => 'RPNMN',
                'dmetaphone2' => 'RPNMN'
            ],
            [
                'name'        => 'Rock Bottoms',
                'type'        => 'silly',
                'soundex'     => 'R213',
                'metaphone'   => 'RKBTMS',
                'dmetaphone1' => 'RKPTMS',
                'dmetaphone2' => 'RKPTMS'
            ],
            [
                'name'        => 'Rock Pounder',
                'type'        => 'silly',
                'soundex'     => 'R215',
                'metaphone'   => 'RKPNTR',
                'dmetaphone1' => 'RKPNTR',
                'dmetaphone2' => 'RKPNTR'
            ],
            [
                'name'        => 'Rock Stone',
                'type'        => 'silly',
                'soundex'     => 'R235',
                'metaphone'   => 'RKSTN',
                'dmetaphone1' => 'RKSTN',
                'dmetaphone2' => 'RKSTN'
            ],
            [
                'name'        => 'Rocky Beach',
                'type'        => 'silly',
                'soundex'     => 'R212',
                'metaphone'   => 'RKBX',
                'dmetaphone1' => 'RKPK',
                'dmetaphone2' => 'RKPK'
            ],
            [
                'name'        => 'Rocky Mountain',
                'type'        => 'silly',
                'soundex'     => 'R255',
                'metaphone'   => 'RKMNTN',
                'dmetaphone1' => 'RKMNTN',
                'dmetaphone2' => 'RKMNTN'
            ],
            [
                'name'        => 'Rocky Rhoades',
                'type'        => 'silly',
                'soundex'     => 'R263',
                'metaphone'   => 'RKRHTS',
                'dmetaphone1' => 'RKRTS',
                'dmetaphone2' => 'RKRTS'
            ],
            [
                'name'        => 'Rocky Shore',
                'type'        => 'silly',
                'soundex'     => 'R226',
                'metaphone'   => 'RKXR',
                'dmetaphone1' => 'RKXR',
                'dmetaphone2' => 'RKXR'
            ],
            [
                'name'        => 'Rod N. Reel',
                'type'        => 'silly',
                'soundex'     => 'R356',
                'metaphone'   => 'RTNRL',
                'dmetaphone1' => 'RTNRL',
                'dmetaphone2' => 'RTNRL'
            ],
            [
                'name'        => 'Roman Holiday',
                'type'        => 'silly',
                'soundex'     => 'R554',
                'metaphone'   => 'RMNHLT',
                'dmetaphone1' => 'RMNLT',
                'dmetaphone2' => 'RMNLT'
            ],
            [
                'name'        => 'Rory Storm',
                'type'        => 'silly',
                'soundex'     => 'R623',
                'metaphone'   => 'RRSTRM',
                'dmetaphone1' => 'RRSTRM',
                'dmetaphone2' => 'RRSTRM'
            ],
            [
                'name'        => 'Rose Bush',
                'type'        => 'silly',
                'soundex'     => 'R212',
                'metaphone'   => 'RSBX',
                'dmetaphone1' => 'RSPX',
                'dmetaphone2' => 'RSPX'
            ],
            [
                'name'        => 'Rose Gardner',
                'type'        => 'silly',
                'soundex'     => 'R226',
                'metaphone'   => 'RSKRTNR',
                'dmetaphone1' => 'RSKRTNR',
                'dmetaphone2' => 'RSKRTNR'
            ],
            [
                'name'        => 'Rowan Boatman',
                'type'        => 'silly',
                'soundex'     => 'R513',
                'metaphone'   => 'RWNBTMN',
                'dmetaphone1' => 'RNPTMN',
                'dmetaphone2' => 'RNPTMN'
            ],
            [
                'name'        => 'Royal Payne',
                'type'        => 'silly',
                'soundex'     => 'R415',
                'metaphone'   => 'RYLPN',
                'dmetaphone1' => 'RLPN',
                'dmetaphone2' => 'RLPN'
            ],
            [
                'name'        => 'Rufus Leakin',
                'type'        => 'silly',
                'soundex'     => 'R124',
                'metaphone'   => 'RFSLKN',
                'dmetaphone1' => 'RFSLKN',
                'dmetaphone2' => 'RFSLKN'
            ],
            [
                'name'        => 'Russell Leeves',
                'type'        => 'silly',
                'soundex'     => 'R241',
                'metaphone'   => 'RSLLFS',
                'dmetaphone1' => 'RSLLFS',
                'dmetaphone2' => 'RSLLFS'
            ],
            [
                'name'        => 'Russell Sprout',
                'type'        => 'silly',
                'soundex'     => 'R242',
                'metaphone'   => 'RSLSPRT',
                'dmetaphone1' => 'RSLSPRT',
                'dmetaphone2' => 'RSLSPRT'
            ],
            [
                'name'        => 'Rusty Blades',
                'type'        => 'silly',
                'soundex'     => 'R231',
                'metaphone'   => 'RSTBLTS',
                'dmetaphone1' => 'RSTPLTS',
                'dmetaphone2' => 'RSTPLTS'
            ],
            [
                'name'        => 'Rusty Bridges',
                'type'        => 'silly',
                'soundex'     => 'R231',
                'metaphone'   => 'RSTBRJS',
                'dmetaphone1' => 'RSTPRJS',
                'dmetaphone2' => 'RSTPRJS'
            ],
            [
                'name'        => 'Rusty Carr',
                'type'        => 'silly',
                'soundex'     => 'R232',
                'metaphone'   => 'RSTKR',
                'dmetaphone1' => 'RSTKR',
                'dmetaphone2' => 'RSTKR'
            ],
            [
                'name'        => 'Rusty Dorr',
                'type'        => 'silly',
                'soundex'     => 'R233',
                'metaphone'   => 'RSTTR',
                'dmetaphone1' => 'RSTTR',
                'dmetaphone2' => 'RSTTR'
            ],
            [
                'name'        => 'Rusty Fender',
                'type'        => 'silly',
                'soundex'     => 'R231',
                'metaphone'   => 'RSTFNTR',
                'dmetaphone1' => 'RSTFNTR',
                'dmetaphone2' => 'RSTFNTR'
            ],
            [
                'name'        => 'Rusty Fossat',
                'type'        => 'silly',
                'soundex'     => 'R231',
                'metaphone'   => 'RSTFST',
                'dmetaphone1' => 'RSTFST',
                'dmetaphone2' => 'RSTFST'
            ],
            [
                'name'        => 'Rusty Irons',
                'type'        => 'silly',
                'soundex'     => 'R236',
                'metaphone'   => 'RSTRNS',
                'dmetaphone1' => 'RSTRNS',
                'dmetaphone2' => 'RSTRNS'
            ],
            [
                'name'        => 'Rusty Keyes',
                'type'        => 'silly',
                'soundex'     => 'R232',
                'metaphone'   => 'RSTKYS',
                'dmetaphone1' => 'RSTKS',
                'dmetaphone2' => 'RSTKS'
            ],
            [
                'name'        => 'Rusty Nail',
                'type'        => 'silly',
                'soundex'     => 'R235',
                'metaphone'   => 'RSTNL',
                'dmetaphone1' => 'RSTNL',
                'dmetaphone2' => 'RSTNL'
            ],
            [
                'name'        => 'Rusty Pipes',
                'type'        => 'silly',
                'soundex'     => 'R231',
                'metaphone'   => 'RSTPPS',
                'dmetaphone1' => 'RSTPPS',
                'dmetaphone2' => 'RSTPPS'
            ],
            [
                'name'        => 'Rusty Steele',
                'type'        => 'silly',
                'soundex'     => 'R232',
                'metaphone'   => 'RSTSTL',
                'dmetaphone1' => 'RSTSTL',
                'dmetaphone2' => 'RSTSTL'
            ],
            [
                'name'        => 'Ryan Carnation',
                'type'        => 'silly',
                'soundex'     => 'R526',
                'metaphone'   => 'RYNKRNXN',
                'dmetaphone1' => 'RNKRNXN',
                'dmetaphone2' => 'RNKRNXN'
            ],
            [
                'name'        => 'Ryan Coke',
                'type'        => 'silly',
                'soundex'     => 'R522',
                'metaphone'   => 'RYNKK',
                'dmetaphone1' => 'RNKK',
                'dmetaphone2' => 'RNKK'
            ],
            [
                'name'        => 'Sal A. Mander',
                'type'        => 'silly',
                'soundex'     => 'S455',
                'metaphone'   => 'SLMNTR',
                'dmetaphone1' => 'SLMNTR',
                'dmetaphone2' => 'SLMNTR'
            ],
            [
                'name'        => 'Sal Ami',
                'type'        => 'silly',
                'soundex'     => 'S450',
                'metaphone'   => 'SLM',
                'dmetaphone1' => 'SLM',
                'dmetaphone2' => 'SLM'
            ],
            [
                'name'        => 'Sal Lami',
                'type'        => 'silly',
                'soundex'     => 'S450',
                'metaphone'   => 'SLLM',
                'dmetaphone1' => 'SLLM',
                'dmetaphone2' => 'SLLM'
            ],
            [
                'name'        => 'Sal Minella',
                'type'        => 'silly',
                'soundex'     => 'S455',
                'metaphone'   => 'SLMNL',
                'dmetaphone1' => 'SLMNL',
                'dmetaphone2' => 'SLMNL'
            ],
            [
                'name'        => 'Sal Monella',
                'type'        => 'silly',
                'soundex'     => 'S455',
                'metaphone'   => 'SLMNL',
                'dmetaphone1' => 'SLMNL',
                'dmetaphone2' => 'SLMNL'
            ],
            [
                'name'        => 'Sal Vidge',
                'type'        => 'silly',
                'soundex'     => 'S413',
                'metaphone'   => 'SLFJ',
                'dmetaphone1' => 'SLFJ',
                'dmetaphone2' => 'SLFJ'
            ],
            [
                'name'        => 'Sally Forth',
                'type'        => 'silly',
                'soundex'     => 'S416',
                'metaphone'   => 'SLFR0',
                'dmetaphone1' => 'SLFR0',
                'dmetaphone2' => 'SLFRT'
            ],
            [
                'name'        => 'Sam Buca',
                'type'        => 'silly',
                'soundex'     => 'S512',
                'metaphone'   => 'SMBK',
                'dmetaphone1' => 'SMPK',
                'dmetaphone2' => 'SMPK'
            ],
            [
                'name'        => 'Sam Manilla',
                'type'        => 'silly',
                'soundex'     => 'S554',
                'metaphone'   => 'SMMNL',
                'dmetaphone1' => 'SMMNL',
                'dmetaphone2' => 'SMMN'
            ],
            [
                'name'        => 'Sam Owen',
                'type'        => 'silly',
                'soundex'     => 'S550',
                'metaphone'   => 'SMWN',
                'dmetaphone1' => 'SMN',
                'dmetaphone2' => 'SMN'
            ],
            [
                'name'        => 'Sandy Banks',
                'type'        => 'silly',
                'soundex'     => 'S531',
                'metaphone'   => 'SNTBNKS',
                'dmetaphone1' => 'SNTPNKS',
                'dmetaphone2' => 'SNTPNKS'
            ],
            [
                'name'        => 'Sandy Beach',
                'type'        => 'silly',
                'soundex'     => 'S531',
                'metaphone'   => 'SNTBX',
                'dmetaphone1' => 'SNTPK',
                'dmetaphone2' => 'SNTPK'
            ],
            [
                'name'        => 'Sandy Beech',
                'type'        => 'silly',
                'soundex'     => 'S531',
                'metaphone'   => 'SNTBX',
                'dmetaphone1' => 'SNTPK',
                'dmetaphone2' => 'SNTPK'
            ],
            [
                'name'        => 'Sandy Brown',
                'type'        => 'silly',
                'soundex'     => 'S531',
                'metaphone'   => 'SNTBRN',
                'dmetaphone1' => 'SNTPRN',
                'dmetaphone2' => 'SNTPRN'
            ],
            [
                'name'        => 'Sandy C. Shore',
                'type'        => 'silly',
                'soundex'     => 'S532',
                'metaphone'   => 'SNTKXR',
                'dmetaphone1' => 'SNTKXR',
                'dmetaphone2' => 'SNTKXR'
            ],
            [
                'name'        => 'Sandy Spring',
                'type'        => 'silly',
                'soundex'     => 'S532',
                'metaphone'   => 'SNTSPRNK',
                'dmetaphone1' => 'SNTSPRNK',
                'dmetaphone2' => 'SNTSPRNK'
            ],
            [
                'name'        => 'Sara Bellum',
                'type'        => 'silly',
                'soundex'     => 'S614',
                'metaphone'   => 'SRBLM',
                'dmetaphone1' => 'SRPLM',
                'dmetaphone2' => 'SRPLM'
            ],
            [
                'name'        => 'Sarah Bellum',
                'type'        => 'silly',
                'soundex'     => 'S614',
                'metaphone'   => 'SRBLM',
                'dmetaphone1' => 'SRPLM',
                'dmetaphone2' => 'SRPLM'
            ],
            [
                'name'        => 'Sarah Yevo',
                'type'        => 'silly',
                'soundex'     => 'S610',
                'metaphone'   => 'SRYF',
                'dmetaphone1' => 'SRF',
                'dmetaphone2' => 'SRF'
            ],
            [
                'name'        => 'Saul T. Balls',
                'type'        => 'silly',
                'soundex'     => 'S431',
                'metaphone'   => 'SLTBLS',
                'dmetaphone1' => 'SLTPLS',
                'dmetaphone2' => 'SLTPLS'
            ],
            [
                'name'        => 'Sawyer B. Hind',
                'type'        => 'silly',
                'soundex'     => 'S615',
                'metaphone'   => 'SYRBHNT',
                'dmetaphone1' => 'SRPNT',
                'dmetaphone2' => 'SRPNT'
            ],
            [
                'name'        => 'Sawyer Dickey',
                'type'        => 'silly',
                'soundex'     => 'S632',
                'metaphone'   => 'SYRTK',
                'dmetaphone1' => 'SRTK',
                'dmetaphone2' => 'SRTK'
            ],
            [
                'name'        => 'Scott Schtape',
                'type'        => 'silly',
                'soundex'     => 'S323',
                'metaphone'   => 'SKTSXTP',
                'dmetaphone1' => 'SKTXTP',
                'dmetaphone2' => 'SKTXTP'
            ],
            [
                'name'        => 'Serj Protector',
                'type'        => 'silly',
                'soundex'     => 'S621',
                'metaphone'   => 'SRJPRTKTR',
                'dmetaphone1' => 'SRJPRTKTR',
                'dmetaphone2' => 'SRJPRTKTR'
            ],
            [
                'name'        => 'Seth Poole',
                'type'        => 'silly',
                'soundex'     => 'S314',
                'metaphone'   => 'S0PL',
                'dmetaphone1' => 'S0PL',
                'dmetaphone2' => 'STPL'
            ],
            [
                'name'        => 'Seymour Bush',
                'type'        => 'silly',
                'soundex'     => 'S561',
                'metaphone'   => 'SMRBX',
                'dmetaphone1' => 'SMRPX',
                'dmetaphone2' => 'SMRPX'
            ],
            [
                'name'        => 'Seymour Butts',
                'type'        => 'silly',
                'soundex'     => 'S561',
                'metaphone'   => 'SMRBTS',
                'dmetaphone1' => 'SMRPTS',
                'dmetaphone2' => 'SMRPTS'
            ],
            [
                'name'        => 'Seymour Butz',
                'type'        => 'silly',
                'soundex'     => 'S561',
                'metaphone'   => 'SMRBTS',
                'dmetaphone1' => 'SMRPTS',
                'dmetaphone2' => 'SMRPTS'
            ],
            [
                'name'        => 'Seymour Wiener',
                'type'        => 'silly',
                'soundex'     => 'S565',
                'metaphone'   => 'SMRWNR',
                'dmetaphone1' => 'SMRNR',
                'dmetaphone2' => 'SMRNR'
            ],
            [
                'name'        => 'Shanda Lear',
                'type'        => 'silly',
                'soundex'     => 'S534',
                'metaphone'   => 'XNTLR',
                'dmetaphone1' => 'XNTLR',
                'dmetaphone2' => 'XNTLR'
            ],
            [
                'name'        => 'Sharon A. Burger',
                'type'        => 'silly',
                'soundex'     => 'S651',
                'metaphone'   => 'XRNBRJR',
                'dmetaphone1' => 'XRNPRKR',
                'dmetaphone2' => 'XRNPRJR'
            ],
            [
                'name'        => 'Sharon Fillerup',
                'type'        => 'silly',
                'soundex'     => 'S651',
                'metaphone'   => 'XRNFLRP',
                'dmetaphone1' => 'XRNFLRP',
                'dmetaphone2' => 'XRNFLRP'
            ],
            [
                'name'        => 'Sharon Needles',
                'type'        => 'silly',
                'soundex'     => 'S653',
                'metaphone'   => 'XRNNTLS',
                'dmetaphone1' => 'XRNNTLS',
                'dmetaphone2' => 'XRNNTLS'
            ],
            [
                'name'        => 'Sharon Weed',
                'type'        => 'silly',
                'soundex'     => 'S653',
                'metaphone'   => 'XRNWT',
                'dmetaphone1' => 'XRNT',
                'dmetaphone2' => 'XRNT'
            ],
            [
                'name'        => 'Sheila Blige',
                'type'        => 'silly',
                'soundex'     => 'S414',
                'metaphone'   => 'XLBLJ',
                'dmetaphone1' => 'XLPLJ',
                'dmetaphone2' => 'XLPLK'
            ],
            [
                'name'        => 'Shonda Leer',
                'type'        => 'silly',
                'soundex'     => 'S534',
                'metaphone'   => 'XNTLR',
                'dmetaphone1' => 'XNTLR',
                'dmetaphone2' => 'XNTLR'
            ],
            [
                'name'        => 'Sid Down',
                'type'        => 'silly',
                'soundex'     => 'S350',
                'metaphone'   => 'STTN',
                'dmetaphone1' => 'STTN',
                'dmetaphone2' => 'STTN'
            ],
            [
                'name'        => 'Sil Antro',
                'type'        => 'silly',
                'soundex'     => 'S453',
                'metaphone'   => 'SLNTR',
                'dmetaphone1' => 'SLNTR',
                'dmetaphone2' => 'SLNTR'
            ],
            [
                'name'        => 'Sir Kim Scision',
                'type'        => 'silly',
                'soundex'     => 'S625',
                'metaphone'   => 'SRKMSXN',
                'dmetaphone1' => 'SRKMSSN',
                'dmetaphone2' => 'SRKMSSN'
            ],
            [
                'name'        => 'Skip Dover',
                'type'        => 'silly',
                'soundex'     => 'S131',
                'metaphone'   => 'SKPTFR',
                'dmetaphone1' => 'SKPTFR',
                'dmetaphone2' => 'SKPTFR'
            ],
            [
                'name'        => 'Skip Roper',
                'type'        => 'silly',
                'soundex'     => 'S161',
                'metaphone'   => 'SKPRPR',
                'dmetaphone1' => 'SKPRPR',
                'dmetaphone2' => 'SKPRPR'
            ],
            [
                'name'        => 'Skip Stone',
                'type'        => 'silly',
                'soundex'     => 'S123',
                'metaphone'   => 'SKPSTN',
                'dmetaphone1' => 'SKPSTN',
                'dmetaphone2' => 'SKPSTN'
            ],
            [
                'name'        => 'Sno White',
                'type'        => 'silly',
                'soundex'     => 'S530',
                'metaphone'   => 'SNHT',
                'dmetaphone1' => 'SNT',
                'dmetaphone2' => 'XNT'
            ],
            [
                'name'        => 'Sonny Day',
                'type'        => 'silly',
                'soundex'     => 'S530',
                'metaphone'   => 'SNT',
                'dmetaphone1' => 'SNT',
                'dmetaphone2' => 'SNT'
            ],
            [
                'name'        => 'Stan DePain',
                'type'        => 'silly',
                'soundex'     => 'S353',
                'metaphone'   => 'STNTPN',
                'dmetaphone1' => 'STNTPN',
                'dmetaphone2' => 'STNTPN'
            ],
            [
                'name'        => 'Stan Dup',
                'type'        => 'silly',
                'soundex'     => 'S353',
                'metaphone'   => 'STNTP',
                'dmetaphone1' => 'STNTP',
                'dmetaphone2' => 'STNTP'
            ],
            [
                'name'        => 'Stan Still',
                'type'        => 'silly',
                'soundex'     => 'S352',
                'metaphone'   => 'STNSTL',
                'dmetaphone1' => 'STNSTL',
                'dmetaphone2' => 'STNSTL'
            ],
            [
                'name'        => 'Stanley Cupp',
                'type'        => 'silly',
                'soundex'     => 'S354',
                'metaphone'   => 'STNLKP',
                'dmetaphone1' => 'STNLKP',
                'dmetaphone2' => 'STNLKP'
            ],
            [
                'name'        => 'Stew Gots',
                'type'        => 'silly',
                'soundex'     => 'S323',
                'metaphone'   => 'STKTS',
                'dmetaphone1' => 'STKTS',
                'dmetaphone2' => 'STKTS'
            ],
            [
                'name'        => 'Stu Peit',
                'type'        => 'silly',
                'soundex'     => 'S313',
                'metaphone'   => 'STPT',
                'dmetaphone1' => 'STPT',
                'dmetaphone2' => 'STPT'
            ],
            [
                'name'        => 'Sue Flay',
                'type'        => 'silly',
                'soundex'     => 'S140',
                'metaphone'   => 'SFL',
                'dmetaphone1' => 'SFL',
                'dmetaphone2' => 'SFL'
            ],
            [
                'name'        => 'Sue Jeu',
                'type'        => 'silly',
                'soundex'     => 'S200',
                'metaphone'   => 'SJ',
                'dmetaphone1' => 'SJ',
                'dmetaphone2' => 'SJ'
            ],
            [
                'name'        => 'Sue Ridge',
                'type'        => 'silly',
                'soundex'     => 'S632',
                'metaphone'   => 'SRJ',
                'dmetaphone1' => 'SRJ',
                'dmetaphone2' => 'SRJ'
            ],
            [
                'name'        => 'Sue Shee',
                'type'        => 'silly',
                'soundex'     => 'S200',
                'metaphone'   => 'SX',
                'dmetaphone1' => 'SX',
                'dmetaphone2' => 'SX'
            ],
            [
                'name'        => 'Sue Vaneer',
                'type'        => 'silly',
                'soundex'     => 'S156',
                'metaphone'   => 'SFNR',
                'dmetaphone1' => 'SFNR',
                'dmetaphone2' => 'SFNR'
            ],
            [
                'name'        => 'Sue Yu',
                'type'        => 'silly',
                'soundex'     => 'S000',
                'metaphone'   => 'SY',
                'dmetaphone1' => 'S',
                'dmetaphone2' => 'S'
            ],
            [
                'name'        => 'Sue Yu, Sue Jeu',
                'type'        => 'silly',
                'soundex'     => 'S220',
                'metaphone'   => 'SYSJ',
                'dmetaphone1' => 'SSJ',
                'dmetaphone2' => 'SSJ'
            ],
            [
                'name'        => 'Summer Camp',
                'type'        => 'silly',
                'soundex'     => 'S562',
                'metaphone'   => 'SMRKMP',
                'dmetaphone1' => 'SMRKMP',
                'dmetaphone2' => 'SMRKMP'
            ],
            [
                'name'        => 'Summer Day',
                'type'        => 'silly',
                'soundex'     => 'S563',
                'metaphone'   => 'SMRT',
                'dmetaphone1' => 'SMRT',
                'dmetaphone2' => 'SMRT'
            ],
            [
                'name'        => 'Summer Greene',
                'type'        => 'silly',
                'soundex'     => 'S562',
                'metaphone'   => 'SMRKRN',
                'dmetaphone1' => 'SMRKRN',
                'dmetaphone2' => 'SMRKRN'
            ],
            [
                'name'        => 'Summer Holiday',
                'type'        => 'silly',
                'soundex'     => 'S564',
                'metaphone'   => 'SMRHLT',
                'dmetaphone1' => 'SMRLT',
                'dmetaphone2' => 'SMRLT'
            ],
            [
                'name'        => 'Sven Gineer',
                'type'        => 'silly',
                'soundex'     => 'S152',
                'metaphone'   => 'SFNJNR',
                'dmetaphone1' => 'SFNJNR',
                'dmetaphone2' => 'SFNKNR'
            ],
            [
                'name'        => 'Sy Burnette',
                'type'        => 'silly',
                'soundex'     => 'S165',
                'metaphone'   => 'SBRNT',
                'dmetaphone1' => 'SPRNT',
                'dmetaphone2' => 'SPRNT'
            ],
            [
                'name'        => 'Tad Moore',
                'type'        => 'silly',
                'soundex'     => 'T356',
                'metaphone'   => 'TTMR',
                'dmetaphone1' => 'TTMR',
                'dmetaphone2' => 'TTMR'
            ],
            [
                'name'        => 'Tad Pohl',
                'type'        => 'silly',
                'soundex'     => 'T314',
                'metaphone'   => 'TTPL',
                'dmetaphone1' => 'TTPL',
                'dmetaphone2' => 'TTPL'
            ],
            [
                'name'        => 'Tanya Hyde',
                'type'        => 'silly',
                'soundex'     => 'T530',
                'metaphone'   => 'TNYT',
                'dmetaphone1' => 'TNT',
                'dmetaphone2' => 'TNT'
            ],
            [
                'name'        => 'Tara Cherry',
                'type'        => 'silly',
                'soundex'     => 'T626',
                'metaphone'   => 'TRXR',
                'dmetaphone1' => 'TRXR',
                'dmetaphone2' => 'TRKR'
            ],
            [
                'name'        => 'Tara Misu',
                'type'        => 'silly',
                'soundex'     => 'T652',
                'metaphone'   => 'TRMS',
                'dmetaphone1' => 'TRMS',
                'dmetaphone2' => 'TRMS'
            ],
            [
                'name'        => 'Tara Zona',
                'type'        => 'silly',
                'soundex'     => 'T625',
                'metaphone'   => 'TRSN',
                'dmetaphone1' => 'TRSN',
                'dmetaphone2' => 'TRSN'
            ],
            [
                'name'        => 'Ted E. Baer',
                'type'        => 'silly',
                'soundex'     => 'T316',
                'metaphone'   => 'TTBR',
                'dmetaphone1' => 'TTPR',
                'dmetaphone2' => 'TTPR'
            ],
            [
                'name'        => 'Teresa Green',
                'type'        => 'silly',
                'soundex'     => 'T622',
                'metaphone'   => 'TRSKRN',
                'dmetaphone1' => 'TRSKRN',
                'dmetaphone2' => 'TRSKRN'
            ],
            [
                'name'        => 'Terry Achey',
                'type'        => 'silly',
                'soundex'     => 'T620',
                'metaphone'   => 'TRX',
                'dmetaphone1' => 'TRX',
                'dmetaphone2' => 'TRK'
            ],
            [
                'name'        => 'Terry Aki',
                'type'        => 'silly',
                'soundex'     => 'T620',
                'metaphone'   => 'TRK',
                'dmetaphone1' => 'TRK',
                'dmetaphone2' => 'TRK'
            ],
            [
                'name'        => 'Terry Bull',
                'type'        => 'silly',
                'soundex'     => 'T614',
                'metaphone'   => 'TRBL',
                'dmetaphone1' => 'TRPL',
                'dmetaphone2' => 'TRPL'
            ],
            [
                'name'        => 'Terry Torial',
                'type'        => 'silly',
                'soundex'     => 'T636',
                'metaphone'   => 'TRTRL',
                'dmetaphone1' => 'TRTRL',
                'dmetaphone2' => 'TRTRL'
            ],
            [
                'name'        => 'Tess Steckle',
                'type'        => 'silly',
                'soundex'     => 'T232',
                'metaphone'   => 'TSSTKL',
                'dmetaphone1' => 'TSSTKL',
                'dmetaphone2' => 'TSSTKL'
            ],
            [
                'name'        => 'Theo Retical',
                'type'        => 'silly',
                'soundex'     => 'T632',
                'metaphone'   => '0RTKL',
                'dmetaphone1' => '0RTKL',
                'dmetaphone2' => 'TRTKL'
            ],
            [
                'name'        => 'Therese R. Green',
                'type'        => 'silly',
                'soundex'     => 'T626',
                'metaphone'   => '0RSRKRN',
                'dmetaphone1' => '0RSRKRN',
                'dmetaphone2' => 'TRSRKRN'
            ],
            [
                'name'        => 'Thomas Richard Harry',
                'type'        => 'silly',
                'soundex'     => 'T526',
                'metaphone'   => '0MSRXRTHR',
                'dmetaphone1' => 'TMSRXRTR',
                'dmetaphone2' => 'TMSRKRTR'
            ],
            [
                'name'        => 'Tim Burr',
                'type'        => 'silly',
                'soundex'     => 'T516',
                'metaphone'   => 'TMBR',
                'dmetaphone1' => 'TMPR',
                'dmetaphone2' => 'TMPR'
            ],
            [
                'name'        => 'Tish Hughes',
                'type'        => 'silly',
                'soundex'     => 'T222',
                'metaphone'   => 'TXHS',
                'dmetaphone1' => 'TXS',
                'dmetaphone2' => 'TXS'
            ],
            [
                'name'        => 'Tom A. Toe',
                'type'        => 'silly',
                'soundex'     => 'T530',
                'metaphone'   => 'TMT',
                'dmetaphone1' => 'TMT',
                'dmetaphone2' => 'TMT'
            ],
            [
                'name'        => 'Tom Atoe',
                'type'        => 'silly',
                'soundex'     => 'T530',
                'metaphone'   => 'TMT',
                'dmetaphone1' => 'TMT',
                'dmetaphone2' => 'TMT'
            ],
            [
                'name'        => 'Tom Foolery',
                'type'        => 'silly',
                'soundex'     => 'T514',
                'metaphone'   => 'TMFLR',
                'dmetaphone1' => 'TMFLR',
                'dmetaphone2' => 'TMFLR'
            ],
            [
                'name'        => 'Tom Katt',
                'type'        => 'silly',
                'soundex'     => 'T523',
                'metaphone'   => 'TMKT',
                'dmetaphone1' => 'TMKT',
                'dmetaphone2' => 'TMKT'
            ],
            [
                'name'        => 'Tom Katz',
                'type'        => 'silly',
                'soundex'     => 'T523',
                'metaphone'   => 'TMKTS',
                'dmetaphone1' => 'TMKTS',
                'dmetaphone2' => 'TMKTS'
            ],
            [
                'name'        => 'Tom Morrow',
                'type'        => 'silly',
                'soundex'     => 'T560',
                'metaphone'   => 'TMMR',
                'dmetaphone1' => 'TMMR',
                'dmetaphone2' => 'TMMRF'
            ],
            [
                'name'        => 'Tom Ollie',
                'type'        => 'silly',
                'soundex'     => 'T540',
                'metaphone'   => 'TML',
                'dmetaphone1' => 'TML',
                'dmetaphone2' => 'TML'
            ],
            [
                'name'        => 'Tommy Gunn',
                'type'        => 'silly',
                'soundex'     => 'T525',
                'metaphone'   => 'TMKN',
                'dmetaphone1' => 'TMKN',
                'dmetaphone2' => 'TMKN'
            ],
            [
                'name'        => 'Tommy Hawk',
                'type'        => 'silly',
                'soundex'     => 'T520',
                'metaphone'   => 'TMHK',
                'dmetaphone1' => 'TMK',
                'dmetaphone2' => 'TMK'
            ],
            [
                'name'        => 'Travis Tee',
                'type'        => 'silly',
                'soundex'     => 'T612',
                'metaphone'   => 'TRFST',
                'dmetaphone1' => 'TRFST',
                'dmetaphone2' => 'TRFST'
            ],
            [
                'name'        => 'Trina Forest',
                'type'        => 'silly',
                'soundex'     => 'T651',
                'metaphone'   => 'TRNFRST',
                'dmetaphone1' => 'TRNFRST',
                'dmetaphone2' => 'TRNFRST'
            ],
            [
                'name'        => 'Trina Woods',
                'type'        => 'silly',
                'soundex'     => 'T653',
                'metaphone'   => 'TRNWTS',
                'dmetaphone1' => 'TRNTS',
                'dmetaphone2' => 'TRNTS'
            ],
            [
                'name'        => 'Tucker Doubt',
                'type'        => 'silly',
                'soundex'     => 'T263',
                'metaphone'   => 'TKRTBT',
                'dmetaphone1' => 'TKRTPT',
                'dmetaphone2' => 'TKRTPT'
            ],
            [
                'name'        => 'Ty Ballgame',
                'type'        => 'silly',
                'soundex'     => 'T142',
                'metaphone'   => 'TBLKM',
                'dmetaphone1' => 'TPLKM',
                'dmetaphone2' => 'TPLKM'
            ],
            [
                'name'        => 'Ty Coon',
                'type'        => 'silly',
                'soundex'     => 'T250',
                'metaphone'   => 'TKN',
                'dmetaphone1' => 'TKN',
                'dmetaphone2' => 'TKN'
            ],
            [
                'name'        => 'Ty Knotts',
                'type'        => 'silly',
                'soundex'     => 'T253',
                'metaphone'   => 'TKNTS',
                'dmetaphone1' => 'TKNTS',
                'dmetaphone2' => 'TKNTS'
            ],
            [
                'name'        => 'Ty Pryder',
                'type'        => 'silly',
                'soundex'     => 'T163',
                'metaphone'   => 'TPRTR',
                'dmetaphone1' => 'TPRTR',
                'dmetaphone2' => 'TPRTR'
            ],
            [
                'name'        => 'Ty Tanic',
                'type'        => 'silly',
                'soundex'     => 'T352',
                'metaphone'   => 'TTNK',
                'dmetaphone1' => 'TTNK',
                'dmetaphone2' => 'TTNK'
            ],
            [
                'name'        => 'U. O. Money',
                'type'        => 'silly',
                'soundex'     => 'U550',
                'metaphone'   => 'UMN',
                'dmetaphone1' => 'AMN',
                'dmetaphone2' => 'AMN'
            ],
            [
                'name'        => 'Urich Hunt',
                'type'        => 'silly',
                'soundex'     => 'U625',
                'metaphone'   => 'URXHNT',
                'dmetaphone1' => 'ARXNT',
                'dmetaphone2' => 'ARKNT'
            ],
            [
                'name'        => 'Val Adictorian',
                'type'        => 'silly',
                'soundex'     => 'V432',
                'metaphone'   => 'FLTKTRN',
                'dmetaphone1' => 'FLTKTRN',
                'dmetaphone2' => 'FLTKTRN'
            ],
            [
                'name'        => 'Vic Tory',
                'type'        => 'silly',
                'soundex'     => 'V236',
                'metaphone'   => 'FKTR',
                'dmetaphone1' => 'FKTR',
                'dmetaphone2' => 'FKTR'
            ],
            [
                'name'        => 'Vinny Gret',
                'type'        => 'silly',
                'soundex'     => 'V526',
                'metaphone'   => 'FNKRT',
                'dmetaphone1' => 'FNKRT',
                'dmetaphone2' => 'FNKRT'
            ],
            [
                'name'        => 'Viola Solo',
                'type'        => 'silly',
                'soundex'     => 'V424',
                'metaphone'   => 'FLSL',
                'dmetaphone1' => 'FLSL',
                'dmetaphone2' => 'FLSL'
            ],
            [
                'name'        => 'Virginia Beach',
                'type'        => 'silly',
                'soundex'     => 'V625',
                'metaphone'   => 'FRJNBX',
                'dmetaphone1' => 'FRJNPK',
                'dmetaphone2' => 'FRKNPK'
            ],
            [
                'name'        => 'Walter Melon',
                'type'        => 'silly',
                'soundex'     => 'W436',
                'metaphone'   => 'WLTRMLN',
                'dmetaphone1' => 'ALTRMLN',
                'dmetaphone2' => 'FLTRMLN'
            ],
            [
                'name'        => 'Wanda Rinn',
                'type'        => 'silly',
                'soundex'     => 'W536',
                'metaphone'   => 'WNTRN',
                'dmetaphone1' => 'ANTRN',
                'dmetaphone2' => 'FNTRN'
            ],
            [
                'name'        => 'Wanna Hickey',
                'type'        => 'silly',
                'soundex'     => 'W520',
                'metaphone'   => 'WNHK',
                'dmetaphone1' => 'ANK',
                'dmetaphone2' => 'FNK'
            ],
            [
                'name'        => 'Warren Peace',
                'type'        => 'silly',
                'soundex'     => 'W651',
                'metaphone'   => 'WRNPS',
                'dmetaphone1' => 'ARNPS',
                'dmetaphone2' => 'FRNPS'
            ],
            [
                'name'        => 'Warren T',
                'type'        => 'silly',
                'soundex'     => 'W653',
                'metaphone'   => 'WRNT',
                'dmetaphone1' => 'ARNT',
                'dmetaphone2' => 'FRNT'
            ],
            [
                'name'        => 'Wendy Storm',
                'type'        => 'silly',
                'soundex'     => 'W532',
                'metaphone'   => 'WNTSTRM',
                'dmetaphone1' => 'ANTSTRM',
                'dmetaphone2' => 'FNTSTRM'
            ],
            [
                'name'        => 'Weston East',
                'type'        => 'silly',
                'soundex'     => 'W235',
                'metaphone'   => 'WSTNST',
                'dmetaphone1' => 'ASTNST',
                'dmetaphone2' => 'FSTNST'
            ],
            [
                'name'        => 'Will Power',
                'type'        => 'silly',
                'soundex'     => 'W416',
                'metaphone'   => 'WLPWR',
                'dmetaphone1' => 'ALPR',
                'dmetaphone2' => 'FLPR'
            ],
            [
                'name'        => 'Will Race',
                'type'        => 'silly',
                'soundex'     => 'W462',
                'metaphone'   => 'WLRS',
                'dmetaphone1' => 'ALRS',
                'dmetaphone2' => 'FLRS'
            ],
            [
                'name'        => 'Will Wynn',
                'type'        => 'silly',
                'soundex'     => 'W450',
                'metaphone'   => 'WLN',
                'dmetaphone1' => 'ALN',
                'dmetaphone2' => 'FLN'
            ],
            [
                'name'        => 'Willie B. Hardigan',
                'type'        => 'silly',
                'soundex'     => 'W416',
                'metaphone'   => 'WLBHRTKN',
                'dmetaphone1' => 'ALPRTKN',
                'dmetaphone2' => 'FLPRTKN'
            ],
            [
                'name'        => 'Willie Doit',
                'type'        => 'silly',
                'soundex'     => 'W433',
                'metaphone'   => 'WLTT',
                'dmetaphone1' => 'ALTT',
                'dmetaphone2' => 'FLTT'
            ],
            [
                'name'        => 'Willie Facker',
                'type'        => 'silly',
                'soundex'     => 'W412',
                'metaphone'   => 'WLFKR',
                'dmetaphone1' => 'ALFKR',
                'dmetaphone2' => 'FLFKR'
            ],
            [
                'name'        => 'Willie Faggo',
                'type'        => 'silly',
                'soundex'     => 'W412',
                'metaphone'   => 'WLFK',
                'dmetaphone1' => 'ALFK',
                'dmetaphone2' => 'FLFK'
            ],
            [
                'name'        => 'Willie Leak',
                'type'        => 'silly',
                'soundex'     => 'W442',
                'metaphone'   => 'WLLK',
                'dmetaphone1' => 'ALLK',
                'dmetaphone2' => 'FLLK'
            ],
            [
                'name'        => 'Willie Stroker',
                'type'        => 'silly',
                'soundex'     => 'W423',
                'metaphone'   => 'WLSTRKR',
                'dmetaphone1' => 'ALSTRKR',
                'dmetaphone2' => 'FLSTRKR'
            ],
            [
                'name'        => 'Willie Waite',
                'type'        => 'silly',
                'soundex'     => 'W430',
                'metaphone'   => 'WLWT',
                'dmetaphone1' => 'ALT',
                'dmetaphone2' => 'FLT'
            ],
            [
                'name'        => 'Willy Etter',
                'type'        => 'silly',
                'soundex'     => 'W436',
                'metaphone'   => 'WLTR',
                'dmetaphone1' => 'ALTR',
                'dmetaphone2' => 'FLTR'
            ],
            [
                'name'        => 'Wilma Mumduya',
                'type'        => 'silly',
                'soundex'     => 'W455',
                'metaphone'   => 'WLMMMTY',
                'dmetaphone1' => 'ALMMMT',
                'dmetaphone2' => 'FLMMMT'
            ],
            [
                'name'        => 'Winsom Cash',
                'type'        => 'silly',
                'soundex'     => 'W525',
                'metaphone'   => 'WNSMKX',
                'dmetaphone1' => 'ANSMKX',
                'dmetaphone2' => 'FNSMKX'
            ],
            [
                'name'        => 'Woody Forrest',
                'type'        => 'silly',
                'soundex'     => 'W316',
                'metaphone'   => 'WTFRST',
                'dmetaphone1' => 'ATFRST',
                'dmetaphone2' => 'FTFRST'
            ],
            [
                'name'        => 'X. Benedict',
                'type'        => 'silly',
                'soundex'     => 'X153',
                'metaphone'   => 'SBNTKT',
                'dmetaphone1' => 'SPNTKT',
                'dmetaphone2' => 'SPNTKT'
            ],
            [
                'name'        => 'Yu Tube',
                'type'        => 'silly',
                'soundex'     => 'Y310',
                'metaphone'   => 'YTB',
                'dmetaphone1' => 'ATP',
                'dmetaphone2' => 'ATP'
            ],
            [
                'name'        => 'Yuri thra',
                'type'        => 'silly',
                'soundex'     => 'Y636',
                'metaphone'   => 'YR0R',
                'dmetaphone1' => 'AR0R',
                'dmetaphone2' => 'ARTR'
            ],
            [
                'name'        => 'Zack Lee',
                'type'        => 'silly',
                'soundex'     => 'Z240',
                'metaphone'   => 'SKL',
                'dmetaphone1' => 'SKL',
                'dmetaphone2' => 'SKL'
            ],
            [
                'name'        => 'Abby Mallard',
                'type'        => 'fantasy',
                'soundex'     => 'A154',
                'metaphone'   => 'ABMLRT',
                'dmetaphone1' => 'APMLRT',
                'dmetaphone2' => 'APMLRT'
            ],
            [
                'name'        => 'Abigail Gabble',
                'type'        => 'fantasy',
                'soundex'     => 'A124',
                'metaphone'   => 'ABKLKBL',
                'dmetaphone1' => 'APKLKPL',
                'dmetaphone2' => 'APKLKPL'
            ],
            [
                'name'        => 'Abis Mal',
                'type'        => 'fantasy',
                'soundex'     => 'A125',
                'metaphone'   => 'ABSML',
                'dmetaphone1' => 'APSML',
                'dmetaphone2' => 'APSML'
            ],
            [
                'name'        => 'Agent Wendy Pleakley',
                'type'        => 'fantasy',
                'soundex'     => 'A253',
                'metaphone'   => 'AJNTWNTPLKL',
                'dmetaphone1' => 'AJNTNTPLKL',
                'dmetaphone2' => 'AKNTNTPLKL'
            ],
            [
                'name'        => 'Ajax the Gorilla',
                'type'        => 'fantasy',
                'soundex'     => 'A223',
                'metaphone'   => 'AJKS0KRL',
                'dmetaphone1' => 'AJKS0KRL',
                'dmetaphone2' => 'AHKSTKR'
            ],
            [
                'name'        => 'Al the Alligator',
                'type'        => 'fantasy',
                'soundex'     => 'A434',
                'metaphone'   => 'AL0LKTR',
                'dmetaphone1' => 'AL0LKTR',
                'dmetaphone2' => 'ALTLKTR'
            ],
            [
                'name'        => 'Alameda Slim',
                'type'        => 'fantasy',
                'soundex'     => 'A453',
                'metaphone'   => 'ALMTSLM',
                'dmetaphone1' => 'ALMTSLM',
                'dmetaphone2' => 'ALMTSLM'
            ],
            [
                'name'        => 'Alan Roberts',
                'type'        => 'fantasy',
                'soundex'     => 'A456',
                'metaphone'   => 'ALNRBRTS',
                'dmetaphone1' => 'ALNRPRTS',
                'dmetaphone2' => 'ALNRPRTS'
            ],
            [
                'name'        => 'Alex D. Linz',
                'type'        => 'fantasy',
                'soundex'     => 'A423',
                'metaphone'   => 'ALKSTLNS',
                'dmetaphone1' => 'ALKSTLNS',
                'dmetaphone2' => 'ALKSTLNS'
            ],
            [
                'name'        => 'Alexander Gould',
                'type'        => 'fantasy',
                'soundex'     => 'A425',
                'metaphone'   => 'ALKSNTRKLT',
                'dmetaphone1' => 'ALKSNTRKLT',
                'dmetaphone2' => 'ALKSNTRKLT'
            ],
            [
                'name'        => 'Alice Bluebonnet',
                'type'        => 'fantasy',
                'soundex'     => 'A421',
                'metaphone'   => 'ALSBLBNT',
                'dmetaphone1' => 'ALSPLPNT',
                'dmetaphone2' => 'ALSPLPNT'
            ],
            [
                'name'        => 'Amelia Gabble',
                'type'        => 'fantasy',
                'soundex'     => 'A542',
                'metaphone'   => 'AMLKBL',
                'dmetaphone1' => 'AMLKPL',
                'dmetaphone2' => 'AMLKPL'
            ],
            [
                'name'        => 'Amos Slade',
                'type'        => 'fantasy',
                'soundex'     => 'A524',
                'metaphone'   => 'AMSSLT',
                'dmetaphone1' => 'AMSSLT',
                'dmetaphone2' => 'AMSSLT'
            ],
            [
                'name'        => 'Anastasia Tremaine',
                'type'        => 'fantasy',
                'soundex'     => 'A523',
                'metaphone'   => 'ANSTXTRMN',
                'dmetaphone1' => 'ANSTSTRMN',
                'dmetaphone2' => 'ANSTXTRMN'
            ],
            [
                'name'        => 'Angelica Pickles',
                'type'        => 'fantasy',
                'soundex'     => 'A524',
                'metaphone'   => 'ANJLKPKLS',
                'dmetaphone1' => 'ANJLKPKLS',
                'dmetaphone2' => 'ANKLKPKLS'
            ],
            [
                'name'        => 'Angus MacBadger',
                'type'        => 'fantasy',
                'soundex'     => 'A522',
                'metaphone'   => 'ANKSMKBJR',
                'dmetaphone1' => 'ANKSMKPJR',
                'dmetaphone2' => 'ANKSMKPJR'
            ],
            [
                'name'        => 'Anita Radcliffe',
                'type'        => 'fantasy',
                'soundex'     => 'A536',
                'metaphone'   => 'ANTRTKLF',
                'dmetaphone1' => 'ANTRTKLF',
                'dmetaphone2' => 'ANTRTKLF'
            ],
            [
                'name'        => 'Ann Gillis',
                'type'        => 'fantasy',
                'soundex'     => 'A524',
                'metaphone'   => 'ANJLS',
                'dmetaphone1' => 'ANJLS',
                'dmetaphone2' => 'ANKLS'
            ],
            [
                'name'        => 'April Duck',
                'type'        => 'fantasy',
                'soundex'     => 'A164',
                'metaphone'   => 'APRLTK',
                'dmetaphone1' => 'APRLTK',
                'dmetaphone2' => 'APRLTK'
            ],
            [
                'name'        => 'Aracuan Bird',
                'type'        => 'fantasy',
                'soundex'     => 'A625',
                'metaphone'   => 'ARKNBRT',
                'dmetaphone1' => 'ARKNPRT',
                'dmetaphone2' => 'ARKNPRT'
            ],
            [
                'name'        => 'Archimedes Q. Porter',
                'type'        => 'fantasy',
                'soundex'     => 'A625',
                'metaphone'   => 'ARXMTSKPRTR',
                'dmetaphone1' => 'ARXMTSKPRTR',
                'dmetaphone2' => 'ARKMTSKPRTR'
            ],
            [
                'name'        => 'Atom Ant',
                'type'        => 'fantasy',
                'soundex'     => 'A355',
                'metaphone'   => 'ATMNT',
                'dmetaphone1' => 'ATMNT',
                'dmetaphone2' => 'ATMNT'
            ],
            [
                'name'        => 'Audrey Ramirez',
                'type'        => 'fantasy',
                'soundex'     => 'A366',
                'metaphone'   => 'ATRRMRS',
                'dmetaphone1' => 'ATRRMRS',
                'dmetaphone2' => 'ATRRMRS'
            ],
            [
                'name'        => 'Audrey the Chicken',
                'type'        => 'fantasy',
                'soundex'     => 'A363',
                'metaphone'   => 'ATR0XKN',
                'dmetaphone1' => 'ATR0XKN',
                'dmetaphone2' => 'ATRTKKN'
            ],
            [
                'name'        => 'Aunt Sarah',
                'type'        => 'fantasy',
                'soundex'     => 'A532',
                'metaphone'   => 'ANTSR',
                'dmetaphone1' => 'ANTSR',
                'dmetaphone2' => 'ANTSR'
            ],
            [
                'name'        => 'Aunt Siqiniq',
                'type'        => 'fantasy',
                'soundex'     => 'A532',
                'metaphone'   => 'ANTSKNK',
                'dmetaphone1' => 'ANTSKNK',
                'dmetaphone2' => 'ANTSKNK'
            ],
            [
                'name'        => 'Aunt Taqqiq',
                'type'        => 'fantasy',
                'soundex'     => 'A532',
                'metaphone'   => 'ANTTKK',
                'dmetaphone1' => 'ANTTKK',
                'dmetaphone2' => 'ANTTKK'
            ],
            [
                'name'        => 'Baby Herman',
                'type'        => 'fantasy',
                'soundex'     => 'B165',
                'metaphone'   => 'BBHRMN',
                'dmetaphone1' => 'PPRMN',
                'dmetaphone2' => 'PPRMN'
            ],
            [
                'name'        => 'Baby Red Bird',
                'type'        => 'fantasy',
                'soundex'     => 'B163',
                'metaphone'   => 'BBRTBRT',
                'dmetaphone1' => 'PPRTPRT',
                'dmetaphone2' => 'PPRTPRT'
            ],
            [
                'name'        => 'Babyface Beagle',
                'type'        => 'fantasy',
                'soundex'     => 'B112',
                'metaphone'   => 'BBFSBKL',
                'dmetaphone1' => 'PPFSPKL',
                'dmetaphone2' => 'PPFSPKL'
            ],
            [
                'name'        => 'Backwoods Beagle',
                'type'        => 'fantasy',
                'soundex'     => 'B232',
                'metaphone'   => 'BKWTSBKL',
                'dmetaphone1' => 'PKTSPKL',
                'dmetaphone2' => 'PKTSPKL'
            ],
            [
                'name'        => 'Bacon Beagle',
                'type'        => 'fantasy',
                'soundex'     => 'B251',
                'metaphone'   => 'BKNBKL',
                'dmetaphone1' => 'PKNPKL',
                'dmetaphone2' => 'PKNPKL'
            ],
            [
                'name'        => 'Baggy Beagle',
                'type'        => 'fantasy',
                'soundex'     => 'B212',
                'metaphone'   => 'BKBKL',
                'dmetaphone1' => 'PKPKL',
                'dmetaphone2' => 'PKPKL'
            ],
            [
                'name'        => 'Baloo Bear',
                'type'        => 'fantasy',
                'soundex'     => 'B416',
                'metaphone'   => 'BLBR',
                'dmetaphone1' => 'PLPR',
                'dmetaphone2' => 'PLPR'
            ],
            [
                'name'        => 'Bankjob Beagle',
                'type'        => 'fantasy',
                'soundex'     => 'B521',
                'metaphone'   => 'BNKJBBKL',
                'dmetaphone1' => 'PNKPPKL',
                'dmetaphone2' => 'PNKPPKL'
            ],
            [
                'name'        => 'Barney Rubble',
                'type'        => 'fantasy',
                'soundex'     => 'B656',
                'metaphone'   => 'BRNRBL',
                'dmetaphone1' => 'PRNRPL',
                'dmetaphone2' => 'PRNRPL'
            ],
            [
                'name'        => 'Bart Simpson',
                'type'        => 'fantasy',
                'soundex'     => 'B632',
                'metaphone'   => 'BRTSMPSN',
                'dmetaphone1' => 'PRTSMPSN',
                'dmetaphone2' => 'PRTSMPSN'
            ],
            [
                'name'        => 'Beary Barrington',
                'type'        => 'fantasy',
                'soundex'     => 'B616',
                'metaphone'   => 'BRBRNKTN',
                'dmetaphone1' => 'PRPRNKTN',
                'dmetaphone2' => 'PRPRNKTN'
            ],
            [
                'name'        => 'Beavis & Butt-Head',
                'type'        => 'fantasy',
                'soundex'     => 'B121',
                'metaphone'   => 'BFSBTHT',
                'dmetaphone1' => 'PFSPTT',
                'dmetaphone2' => 'PFSPTT'
            ],
            [
                'name'        => 'Beetle Baily',
                'type'        => 'fantasy',
                'soundex'     => 'B341',
                'metaphone'   => 'BTLBL',
                'dmetaphone1' => 'PTLPL',
                'dmetaphone2' => 'PTLPL'
            ],
            [
                'name'        => 'Ben Ali Gator',
                'type'        => 'fantasy',
                'soundex'     => 'B542',
                'metaphone'   => 'BNLKTR',
                'dmetaphone1' => 'PNLKTR',
                'dmetaphone2' => 'PNLKTR'
            ],
            [
                'name'        => 'Benny the Cab',
                'type'        => 'fantasy',
                'soundex'     => 'B532',
                'metaphone'   => 'BN0KB',
                'dmetaphone1' => 'PN0KP',
                'dmetaphone2' => 'PNTKP'
            ],
            [
                'name'        => 'Bent-Tail Junior',
                'type'        => 'fantasy',
                'soundex'     => 'B534',
                'metaphone'   => 'BNTTLJNR',
                'dmetaphone1' => 'PNTTLJNR',
                'dmetaphone2' => 'PNTTLJNR'
            ],
            [
                'name'        => 'Bent-Tail the Coyote',
                'type'        => 'fantasy',
                'soundex'     => 'B534',
                'metaphone'   => 'BNTTL0KYT',
                'dmetaphone1' => 'PNTTL0KT',
                'dmetaphone2' => 'PNTTLTKT'
            ],
            [
                'name'        => 'Bentina Beakley',
                'type'        => 'fantasy',
                'soundex'     => 'B535',
                'metaphone'   => 'BNTNBKL',
                'dmetaphone1' => 'PNTNPKL',
                'dmetaphone2' => 'PNTNPKL'
            ],
            [
                'name'        => 'Beret Girl',
                'type'        => 'fantasy',
                'soundex'     => 'B632',
                'metaphone'   => 'BRTJRL',
                'dmetaphone1' => 'PRTJRL',
                'dmetaphone2' => 'PRTKRL'
            ],
            [
                'name'        => 'Betty Boop',
                'type'        => 'fantasy',
                'soundex'     => 'B311',
                'metaphone'   => 'BTBP',
                'dmetaphone1' => 'PTPP',
                'dmetaphone2' => 'PTPP'
            ],
            [
                'name'        => 'Big Al',
                'type'        => 'fantasy',
                'soundex'     => 'B240',
                'metaphone'   => 'BKL',
                'dmetaphone1' => 'PKL',
                'dmetaphone2' => 'PKL'
            ],
            [
                'name'        => 'Big Bad Wolf',
                'type'        => 'fantasy',
                'soundex'     => 'B213',
                'metaphone'   => 'BKBTWLF',
                'dmetaphone1' => 'PKPTLF',
                'dmetaphone2' => 'PKPTLF'
            ],
            [
                'name'        => 'Big Mama',
                'type'        => 'fantasy',
                'soundex'     => 'B255',
                'metaphone'   => 'BKMM',
                'dmetaphone1' => 'PKMM',
                'dmetaphone2' => 'PKMM'
            ],
            [
                'name'        => 'Bigtime Beagle',
                'type'        => 'fantasy',
                'soundex'     => 'B235',
                'metaphone'   => 'BKTMBKL',
                'dmetaphone1' => 'PKTMPKL',
                'dmetaphone2' => 'PKTMPKL'
            ],
            [
                'name'        => 'Bill Farmer',
                'type'        => 'fantasy',
                'soundex'     => 'B416',
                'metaphone'   => 'BLFRMR',
                'dmetaphone1' => 'PLFRMR',
                'dmetaphone2' => 'PLFRMR'
            ],
            [
                'name'        => 'Bill the Lizard',
                'type'        => 'fantasy',
                'soundex'     => 'B434',
                'metaphone'   => 'BL0LSRT',
                'dmetaphone1' => 'PL0LSRT',
                'dmetaphone2' => 'PLTLSRT'
            ],
            [
                'name'        => 'Billy Bass',
                'type'        => 'fantasy',
                'soundex'     => 'B412',
                'metaphone'   => 'BLBS',
                'dmetaphone1' => 'PLPS',
                'dmetaphone2' => 'PLPS'
            ],
            [
                'name'        => 'Billy Bones',
                'type'        => 'fantasy',
                'soundex'     => 'B415',
                'metaphone'   => 'BLBNS',
                'dmetaphone1' => 'PLPNS',
                'dmetaphone2' => 'PLPNS'
            ],
            [
                'name'        => 'Binkie Muddlefoot',
                'type'        => 'fantasy',
                'soundex'     => 'B525',
                'metaphone'   => 'BNKMTLFT',
                'dmetaphone1' => 'PNKMTLFT',
                'dmetaphone2' => 'PNKMTLFT'
            ],
            [
                'name'        => 'Binky Beagle',
                'type'        => 'fantasy',
                'soundex'     => 'B521',
                'metaphone'   => 'BNKBKL',
                'dmetaphone1' => 'PNKPKL',
                'dmetaphone2' => 'PNKPKL'
            ],
            [
                'name'        => 'Black Bart',
                'type'        => 'fantasy',
                'soundex'     => 'B421',
                'metaphone'   => 'BLKBRT',
                'dmetaphone1' => 'PLKPRT',
                'dmetaphone2' => 'PLKPRT'
            ],
            [
                'name'        => 'Blue Fairy',
                'type'        => 'fantasy',
                'soundex'     => 'B416',
                'metaphone'   => 'BLFR',
                'dmetaphone1' => 'PLFR',
                'dmetaphone2' => 'PLFR'
            ],
            [
                'name'        => 'Bomber Beagle',
                'type'        => 'fantasy',
                'soundex'     => 'B516',
                'metaphone'   => 'BMRBKL',
                'dmetaphone1' => 'PMPRPKL',
                'dmetaphone2' => 'PMPRPKL'
            ],
            [
                'name'        => 'Bonkers D. Bobcat',
                'type'        => 'fantasy',
                'soundex'     => 'B526',
                'metaphone'   => 'BNKRSTBBKT',
                'dmetaphone1' => 'PNKRSTPPKT',
                'dmetaphone2' => 'PNKRSTPPKT'
            ],
            [
                'name'        => 'Boo Berry',
                'type'        => 'fantasy',
                'soundex'     => 'B160',
                'metaphone'   => 'BBR',
                'dmetaphone1' => 'PPR',
                'dmetaphone2' => 'PPR'
            ],
            [
                'name'        => 'Boo Boo',
                'type'        => 'fantasy',
                'soundex'     => 'B100',
                'metaphone'   => 'BB',
                'dmetaphone1' => 'PP',
                'dmetaphone2' => 'PP'
            ],
            [
                'name'        => 'Boris Badenov',
                'type'        => 'fantasy',
                'soundex'     => 'B621',
                'metaphone'   => 'BRSBTNF',
                'dmetaphone1' => 'PRSPTNF',
                'dmetaphone2' => 'PRSPTNF'
            ],
            [
                'name'        => 'Boss Beaver',
                'type'        => 'fantasy',
                'soundex'     => 'B211',
                'metaphone'   => 'BSBFR',
                'dmetaphone1' => 'PSPFR',
                'dmetaphone2' => 'PSPFR'
            ],
            [
                'name'        => 'Bouncer Beagle',
                'type'        => 'fantasy',
                'soundex'     => 'B526',
                'metaphone'   => 'BNSRBKL',
                'dmetaphone1' => 'PNSRPKL',
                'dmetaphone2' => 'PNSRPKL'
            ],
            [
                'name'        => 'Bowler Hat Guy',
                'type'        => 'fantasy',
                'soundex'     => 'B463',
                'metaphone'   => 'BLRHTK',
                'dmetaphone1' => 'PLRTK',
                'dmetaphone2' => 'PLRTK'
            ],
            [
                'name'        => 'Br\'er Bear',
                'type'        => 'fantasy',
                'soundex'     => 'B661',
                'metaphone'   => 'BRRBR',
                'dmetaphone1' => 'PRRPR',
                'dmetaphone2' => 'PRRPR'
            ],
            [
                'name'        => 'Br\'er Fox',
                'type'        => 'fantasy',
                'soundex'     => 'B661',
                'metaphone'   => 'BRRFKS',
                'dmetaphone1' => 'PRRFKS',
                'dmetaphone2' => 'PRRFKS'
            ],
            [
                'name'        => 'Br\'er Rabbit',
                'type'        => 'fantasy',
                'soundex'     => 'B661',
                'metaphone'   => 'BRRRBT',
                'dmetaphone1' => 'PRRRPT',
                'dmetaphone2' => 'PRRRPT'
            ],
            [
                'name'        => 'Brad Caleb Kane',
                'type'        => 'fantasy',
                'soundex'     => 'B632',
                'metaphone'   => 'BRTKLBKN',
                'dmetaphone1' => 'PRTKLPKN',
                'dmetaphone2' => 'PRTKLPKN'
            ],
            [
                'name'        => 'Bradley Uppercrust III',
                'type'        => 'fantasy',
                'soundex'     => 'B634',
                'metaphone'   => 'BRTLPRKRST',
                'dmetaphone1' => 'PRTLPRKRST',
                'dmetaphone2' => 'PRTLPRKRST'
            ],
            [
                'name'        => 'Bret Iwan',
                'type'        => 'fantasy',
                'soundex'     => 'B635',
                'metaphone'   => 'BRTWN',
                'dmetaphone1' => 'PRTN',
                'dmetaphone2' => 'PRTN'
            ],
            [
                'name'        => 'Brian Cummings',
                'type'        => 'fantasy',
                'soundex'     => 'B652',
                'metaphone'   => 'BRNKMNKS',
                'dmetaphone1' => 'PRNKMNKS',
                'dmetaphone2' => 'PRNKMNKS'
            ],
            [
                'name'        => 'Bruno the Dog',
                'type'        => 'fantasy',
                'soundex'     => 'B653',
                'metaphone'   => 'BRN0TK',
                'dmetaphone1' => 'PRN0TK',
                'dmetaphone2' => 'PRNTTK'
            ],
            [
                'name'        => 'Brutus and Nero',
                'type'        => 'fantasy',
                'soundex'     => 'B632',
                'metaphone'   => 'BRTSNTNR',
                'dmetaphone1' => 'PRTSNTNR',
                'dmetaphone2' => 'PRTSNTNR'
            ],
            [
                'name'        => 'Buck Cluck',
                'type'        => 'fantasy',
                'soundex'     => 'B242',
                'metaphone'   => 'BKKLK',
                'dmetaphone1' => 'PKKLK',
                'dmetaphone2' => 'PKKLK'
            ],
            [
                'name'        => 'Bucky Bug',
                'type'        => 'fantasy',
                'soundex'     => 'B212',
                'metaphone'   => 'BKBK',
                'dmetaphone1' => 'PKPK',
                'dmetaphone2' => 'PKPK'
            ],
            [
                'name'        => 'Bucky the Squirrel',
                'type'        => 'fantasy',
                'soundex'     => 'B232',
                'metaphone'   => 'BK0SKRL',
                'dmetaphone1' => 'PK0SKRL',
                'dmetaphone2' => 'PKTSKRL'
            ],
            [
                'name'        => 'Buford the Cook',
                'type'        => 'fantasy',
                'soundex'     => 'B163',
                'metaphone'   => 'BFRT0KK',
                'dmetaphone1' => 'PFRT0KK',
                'dmetaphone2' => 'PFRTTKK'
            ],
            [
                'name'        => 'Bugle Beagle',
                'type'        => 'fantasy',
                'soundex'     => 'B241',
                'metaphone'   => 'BKLBKL',
                'dmetaphone1' => 'PKLPKL',
                'dmetaphone2' => 'PKLPKL'
            ],
            [
                'name'        => 'Bugs Bunny',
                'type'        => 'fantasy',
                'soundex'     => 'B215',
                'metaphone'   => 'BKSBN',
                'dmetaphone1' => 'PKSPN',
                'dmetaphone2' => 'PKSPN'
            ],
            [
                'name'        => 'Burger Beagle',
                'type'        => 'fantasy',
                'soundex'     => 'B626',
                'metaphone'   => 'BRJRBKL',
                'dmetaphone1' => 'PRKRPKL',
                'dmetaphone2' => 'PRJRPKL'
            ],
            [
                'name'        => 'Butch the Bulldog',
                'type'        => 'fantasy',
                'soundex'     => 'B323',
                'metaphone'   => 'BX0BLTK',
                'dmetaphone1' => 'PX0PLTK',
                'dmetaphone2' => 'PXTPLTK'
            ],
            [
                'name'        => 'Buzzie the Vulture',
                'type'        => 'fantasy',
                'soundex'     => 'B231',
                'metaphone'   => 'BS0FLTR',
                'dmetaphone1' => 'PS0FLTR',
                'dmetaphone2' => 'PTSTFLTR'
            ],
            [
                'name'        => 'Capn Crunch',
                'type'        => 'fantasy',
                'soundex'     => 'C152',
                'metaphone'   => 'KPNKRNX',
                'dmetaphone1' => 'KPNKRNX',
                'dmetaphone2' => 'KPNKRNK'
            ],
            [
                'name'        => 'Captain Amelia',
                'type'        => 'fantasy',
                'soundex'     => 'C135',
                'metaphone'   => 'KPTNML',
                'dmetaphone1' => 'KPTNML',
                'dmetaphone2' => 'KPTNML'
            ],
            [
                'name'        => 'Captain America',
                'type'        => 'fantasy',
                'soundex'     => 'C135',
                'metaphone'   => 'KPTNMRK',
                'dmetaphone1' => 'KPTNMRK',
                'dmetaphone2' => 'KPTNMRK'
            ],
            [
                'name'        => 'Captain Crunch',
                'type'        => 'fantasy',
                'soundex'     => 'C135',
                'metaphone'   => 'KPTNKRNX',
                'dmetaphone1' => 'KPTNKRNX',
                'dmetaphone2' => 'KPTNKRNK'
            ],
            [
                'name'        => 'Captain Gantu',
                'type'        => 'fantasy',
                'soundex'     => 'C135',
                'metaphone'   => 'KPTNKNT',
                'dmetaphone1' => 'KPTNKNT',
                'dmetaphone2' => 'KPTNKNT'
            ],
            [
                'name'        => 'Captain Hook',
                'type'        => 'fantasy',
                'soundex'     => 'C135',
                'metaphone'   => 'KPTNHK',
                'dmetaphone1' => 'KPTNK',
                'dmetaphone2' => 'KPTNK'
            ],
            [
                'name'        => 'Captain John Smith',
                'type'        => 'fantasy',
                'soundex'     => 'C135',
                'metaphone'   => 'KPTNJNSM0',
                'dmetaphone1' => 'KPTNJNSM0',
                'dmetaphone2' => 'KPTNJNSMT'
            ],
            [
                'name'        => 'Captain Phoebus',
                'type'        => 'fantasy',
                'soundex'     => 'C135',
                'metaphone'   => 'KPTNFBS',
                'dmetaphone1' => 'KPTNFPS',
                'dmetaphone2' => 'KPTNFPS'
            ],
            [
                'name'        => 'Carl the Robot',
                'type'        => 'fantasy',
                'soundex'     => 'C643',
                'metaphone'   => 'KRL0RBT',
                'dmetaphone1' => 'KRL0RPT',
                'dmetaphone2' => 'KRLTRPT'
            ],
            [
                'name'        => 'Carlos Alazraqui',
                'type'        => 'fantasy',
                'soundex'     => 'C642',
                'metaphone'   => 'KRLSLSRK',
                'dmetaphone1' => 'KRLSLSRK',
                'dmetaphone2' => 'KRLSLSRK'
            ],
            [
                'name'        => 'Carlotta the Maid',
                'type'        => 'fantasy',
                'soundex'     => 'C643',
                'metaphone'   => 'KRLT0MT',
                'dmetaphone1' => 'KRLT0MT',
                'dmetaphone2' => 'KRLTTMT'
            ],
            [
                'name'        => 'Carolyn Hennesy',
                'type'        => 'fantasy',
                'soundex'     => 'C645',
                'metaphone'   => 'KRLNHNS',
                'dmetaphone1' => 'KRLNNS',
                'dmetaphone2' => 'KRLNNS'
            ],
            [
                'name'        => 'Casey Junior',
                'type'        => 'fantasy',
                'soundex'     => 'C225',
                'metaphone'   => 'KSJNR',
                'dmetaphone1' => 'KSJNR',
                'dmetaphone2' => 'KSJNR'
            ],
            [
                'name'        => 'Casper the Friendly Ghost',
                'type'        => 'fantasy',
                'soundex'     => 'C216',
                'metaphone'   => 'KSPR0FRNTLFST',
                'dmetaphone1' => 'KSPR0FRNTLKST',
                'dmetaphone2' => 'KSPRTFRNTLKST'
            ],
            [
                'name'        => 'Cat in the Hat',
                'type'        => 'fantasy',
                'soundex'     => 'C353',
                'metaphone'   => 'KTN0HT',
                'dmetaphone1' => 'KTN0T',
                'dmetaphone2' => 'KTNTT'
            ],
            [
                'name'        => 'Catty the Elephant',
                'type'        => 'fantasy',
                'soundex'     => 'C334',
                'metaphone'   => 'KT0LFNT',
                'dmetaphone1' => 'KT0LFNT',
                'dmetaphone2' => 'KTTLFNT'
            ],
            [
                'name'        => 'Cecil the Vulture',
                'type'        => 'fantasy',
                'soundex'     => 'C243',
                'metaphone'   => 'SSL0FLTR',
                'dmetaphone1' => 'SSL0FLTR',
                'dmetaphone2' => 'SSLTFLTR'
            ],
            [
                'name'        => 'Cedric the Sorcerer',
                'type'        => 'fantasy',
                'soundex'     => 'C362',
                'metaphone'   => 'STRK0SRSRR',
                'dmetaphone1' => 'STRK0SRSRR',
                'dmetaphone2' => 'STRKTSRSRR'
            ],
            [
                'name'        => 'Chair Mouse',
                'type'        => 'fantasy',
                'soundex'     => 'C652',
                'metaphone'   => 'XRMS',
                'dmetaphone1' => 'XRMS',
                'dmetaphone2' => 'XRMS'
            ],
            [
                'name'        => 'Charlie Brown',
                'type'        => 'fantasy',
                'soundex'     => 'C641',
                'metaphone'   => 'XRLBRN',
                'dmetaphone1' => 'XRLPRN',
                'dmetaphone2' => 'XRLPRN'
            ],
            [
                'name'        => 'Charlie Tuna',
                'type'        => 'fantasy',
                'soundex'     => 'C643',
                'metaphone'   => 'XRLTN',
                'dmetaphone1' => 'XRLTN',
                'dmetaphone2' => 'XRLTN'
            ],
            [
                'name'        => 'Charlotte La Bouff',
                'type'        => 'fantasy',
                'soundex'     => 'C643',
                'metaphone'   => 'XRLTLBF',
                'dmetaphone1' => 'XRLTLPF',
                'dmetaphone2' => 'XRLTLPF'
            ],
            [
                'name'        => 'Cheetata and Cheetato',
                'type'        => 'fantasy',
                'soundex'     => 'C335',
                'metaphone'   => 'XTTNTXTT',
                'dmetaphone1' => 'XTTNTXTT',
                'dmetaphone2' => 'XTTNTKTT'
            ],
            [
                'name'        => 'Chef Bouche',
                'type'        => 'fantasy',
                'soundex'     => 'C120',
                'metaphone'   => 'XFBX',
                'dmetaphone1' => 'XFPX',
                'dmetaphone2' => 'XFPK'
            ],
            [
                'name'        => 'Chef Louis',
                'type'        => 'fantasy',
                'soundex'     => 'C142',
                'metaphone'   => 'XFLS',
                'dmetaphone1' => 'XFLS',
                'dmetaphone2' => 'XFLS'
            ],
            [
                'name'        => 'Cheshire Cat',
                'type'        => 'fantasy',
                'soundex'     => 'C262',
                'metaphone'   => 'XXRKT',
                'dmetaphone1' => 'XXRKT',
                'dmetaphone2' => 'XXRKT'
            ],
            [
                'name'        => 'Chester Cheetah',
                'type'        => 'fantasy',
                'soundex'     => 'C236',
                'metaphone'   => 'XSTRXT',
                'dmetaphone1' => 'XSTRXT',
                'dmetaphone2' => 'XSTRKT'
            ],
            [
                'name'        => 'Chicken Little',
                'type'        => 'fantasy',
                'soundex'     => 'C254',
                'metaphone'   => 'XKNLTL',
                'dmetaphone1' => 'XKNLTL',
                'dmetaphone2' => 'XKNLTL'
            ],
            [
                'name'        => 'Chief Powhatan',
                'type'        => 'fantasy',
                'soundex'     => 'C135',
                'metaphone'   => 'XFPHTN',
                'dmetaphone1' => 'XFPTN',
                'dmetaphone2' => 'XFPTN'
            ],
            [
                'name'        => 'Chilly Willy',
                'type'        => 'fantasy',
                'soundex'     => 'C440',
                'metaphone'   => 'XLWL',
                'dmetaphone1' => 'XLL',
                'dmetaphone2' => 'XLL'
            ],
            [
                'name'        => 'Chip and Dale',
                'type'        => 'fantasy',
                'soundex'     => 'C153',
                'metaphone'   => 'XPNTTL',
                'dmetaphone1' => 'XPNTTL',
                'dmetaphone2' => 'XPNTTL'
            ],
            [
                'name'        => 'Chip Potts',
                'type'        => 'fantasy',
                'soundex'     => 'C132',
                'metaphone'   => 'XPPTS',
                'dmetaphone1' => 'XPPTS',
                'dmetaphone2' => 'XPPTS'
            ],
            [
                'name'        => 'Christopher Robin',
                'type'        => 'fantasy',
                'soundex'     => 'C623',
                'metaphone'   => 'XRSTFRRBN',
                'dmetaphone1' => 'KRSTFRRPN',
                'dmetaphone2' => 'KRSTFRRPN'
            ],
            [
                'name'        => 'Circus Animals',
                'type'        => 'fantasy',
                'soundex'     => 'C622',
                'metaphone'   => 'SRKSNMLS',
                'dmetaphone1' => 'SRKSNMLS',
                'dmetaphone2' => 'SRKSNMLS'
            ],
            [
                'name'        => 'Clara Cluck',
                'type'        => 'fantasy',
                'soundex'     => 'C462',
                'metaphone'   => 'KLRKLK',
                'dmetaphone1' => 'KLRKLK',
                'dmetaphone2' => 'KLRKLK'
            ],
            [
                'name'        => 'Clarabelle Cow',
                'type'        => 'fantasy',
                'soundex'     => 'C461',
                'metaphone'   => 'KLRBLK',
                'dmetaphone1' => 'KLRPLK',
                'dmetaphone2' => 'KLRPLKF'
            ],
            [
                'name'        => 'Clifford the Big Red Dog',
                'type'        => 'fantasy',
                'soundex'     => 'C416',
                'metaphone'   => 'KLFRT0BKRTTK',
                'dmetaphone1' => 'KLFRT0PKRTTK',
                'dmetaphone2' => 'KLFRTTPKRTTK'
            ],
            [
                'name'        => 'Clopin Trouillefou',
                'type'        => 'fantasy',
                'soundex'     => 'C415',
                'metaphone'   => 'KLPNTRLF',
                'dmetaphone1' => 'KLPNTRLF',
                'dmetaphone2' => 'KLPNTRLF'
            ],
            [
                'name'        => 'Cobra Bubbles',
                'type'        => 'fantasy',
                'soundex'     => 'C161',
                'metaphone'   => 'KBRBBLS',
                'dmetaphone1' => 'KPRPPLS',
                'dmetaphone2' => 'KPRPPLS'
            ],
            [
                'name'        => 'Colonel Hathi',
                'type'        => 'fantasy',
                'soundex'     => 'C454',
                'metaphone'   => 'KLNLH0',
                'dmetaphone1' => 'KLNL0',
                'dmetaphone2' => 'KLNLT'
            ],
            [
                'name'        => 'Commander Lyle Rourke',
                'type'        => 'fantasy',
                'soundex'     => 'C553',
                'metaphone'   => 'KMNTRLLRRK',
                'dmetaphone1' => 'KMNTRLLRRK',
                'dmetaphone2' => 'KMNTRLLRRK'
            ],
            [
                'name'        => 'Corey Burton',
                'type'        => 'fantasy',
                'soundex'     => 'C616',
                'metaphone'   => 'KRBRTN',
                'dmetaphone1' => 'KRPRTN',
                'dmetaphone2' => 'KRPRTN'
            ],
            [
                'name'        => 'Cornelius Robinson',
                'type'        => 'fantasy',
                'soundex'     => 'C654',
                'metaphone'   => 'KRNLSRBNSN',
                'dmetaphone1' => 'KRNLSRPNSN',
                'dmetaphone2' => 'KRNLSRPNSN'
            ],
            [
                'name'        => 'Count Chocula',
                'type'        => 'fantasy',
                'soundex'     => 'C532',
                'metaphone'   => 'KNTXKL',
                'dmetaphone1' => 'KNTXKL',
                'dmetaphone2' => 'KNTKKL'
            ],
            [
                'name'        => 'Cousin Randy',
                'type'        => 'fantasy',
                'soundex'     => 'C256',
                'metaphone'   => 'KSNRNT',
                'dmetaphone1' => 'KSNRNT',
                'dmetaphone2' => 'KSNRNT'
            ],
            [
                'name'        => 'Cruella De Vil',
                'type'        => 'fantasy',
                'soundex'     => 'C643',
                'metaphone'   => 'KRLTFL',
                'dmetaphone1' => 'KRLTFL',
                'dmetaphone2' => 'KRLTFL'
            ],
            [
                'name'        => 'Cruella de Vil',
                'type'        => 'fantasy',
                'soundex'     => 'C643',
                'metaphone'   => 'KRLTFL',
                'dmetaphone1' => 'KRLTFL',
                'dmetaphone2' => 'KRLTFL'
            ],
            [
                'name'        => 'Curious George',
                'type'        => 'fantasy',
                'soundex'     => 'C626',
                'metaphone'   => 'KRSJRJ',
                'dmetaphone1' => 'KRSJRJ',
                'dmetaphone2' => 'KRSKRK'
            ],
            [
                'name'        => 'Cyril Proudbottom',
                'type'        => 'fantasy',
                'soundex'     => 'C641',
                'metaphone'   => 'SRLPRTBTM',
                'dmetaphone1' => 'SRLPRTPTM',
                'dmetaphone2' => 'SRLPRTPTM'
            ],
            [
                'name'        => 'Daffy Duck',
                'type'        => 'fantasy',
                'soundex'     => 'D132',
                'metaphone'   => 'TFTK',
                'dmetaphone1' => 'TFTK',
                'dmetaphone2' => 'TFTK'
            ],
            [
                'name'        => 'Daisy Duck',
                'type'        => 'fantasy',
                'soundex'     => 'D232',
                'metaphone'   => 'TSTK',
                'dmetaphone1' => 'TSTK',
                'dmetaphone2' => 'TSTK'
            ],
            [
                'name'        => 'Dave Thomas',
                'type'        => 'fantasy',
                'soundex'     => 'D135',
                'metaphone'   => 'TF0MS',
                'dmetaphone1' => 'TFTMS',
                'dmetaphone2' => 'TFTMS'
            ],
            [
                'name'        => 'David Kawena',
                'type'        => 'fantasy',
                'soundex'     => 'D132',
                'metaphone'   => 'TFTKWN',
                'dmetaphone1' => 'TFTKN',
                'dmetaphone2' => 'TFTKN'
            ],
            [
                'name'        => 'Darkwing Duck',
                'type'        => 'fantasy',
                'soundex'     => 'D625',
                'metaphone'   => 'TRKWNKTK',
                'dmetaphone1' => 'TRKNKTK',
                'dmetaphone2' => 'TRKNKTK'
            ],
            [
                'name'        => 'Dennis the Menace',
                'type'        => 'fantasy',
                'soundex'     => 'D523',
                'metaphone'   => 'TNS0MNS',
                'dmetaphone1' => 'TNS0MNS',
                'dmetaphone2' => 'TNSTMNS'
            ],
            [
                'name'        => 'Derek Blunt',
                'type'        => 'fantasy',
                'soundex'     => 'D621',
                'metaphone'   => 'TRKBLNT',
                'dmetaphone1' => 'TRKPLNT',
                'dmetaphone2' => 'TRKPLNT'
            ],
            [
                'name'        => 'Dex Barrington',
                'type'        => 'fantasy',
                'soundex'     => 'D216',
                'metaphone'   => 'TKSBRNKTN',
                'dmetaphone1' => 'TKSPRNKTN',
                'dmetaphone2' => 'TKSPRNKTN'
            ],
            [
                'name'        => 'Dick Tracy',
                'type'        => 'fantasy',
                'soundex'     => 'D236',
                'metaphone'   => 'TKTRS',
                'dmetaphone1' => 'TKTRS',
                'dmetaphone2' => 'TKTRS'
            ],
            [
                'name'        => 'Digger the Mole',
                'type'        => 'fantasy',
                'soundex'     => 'D263',
                'metaphone'   => 'TKR0ML',
                'dmetaphone1' => 'TKR0ML',
                'dmetaphone2' => 'TKRTML'
            ],
            [
                'name'        => 'Dijon the Thief',
                'type'        => 'fantasy',
                'soundex'     => 'D253',
                'metaphone'   => 'TJN00F',
                'dmetaphone1' => 'TJN00F',
                'dmetaphone2' => 'THNTTF'
            ],
            [
                'name'        => 'Dinah the Cat',
                'type'        => 'fantasy',
                'soundex'     => 'D532',
                'metaphone'   => 'TN0KT',
                'dmetaphone1' => 'TN0KT',
                'dmetaphone2' => 'TNTKT'
            ],
            [
                'name'        => 'Dinah the Dachshund',
                'type'        => 'fantasy',
                'soundex'     => 'D533',
                'metaphone'   => 'TN0TXXNT',
                'dmetaphone1' => 'TN0TKXNT',
                'dmetaphone2' => 'TNTTKXNT'
            ],
            [
                'name'        => 'Dizzie the Vulture',
                'type'        => 'fantasy',
                'soundex'     => 'D231',
                'metaphone'   => 'TS0FLTR',
                'dmetaphone1' => 'TS0FLTR',
                'dmetaphone2' => 'TTSTFLTR'
            ],
            [
                'name'        => 'Doctor Mouse',
                'type'        => 'fantasy',
                'soundex'     => 'D236',
                'metaphone'   => 'TKTRMS',
                'dmetaphone1' => 'TKTRMS',
                'dmetaphone2' => 'TKTRMS'
            ],
            [
                'name'        => 'Don Karnage',
                'type'        => 'fantasy',
                'soundex'     => 'D526',
                'metaphone'   => 'TNKRNJ',
                'dmetaphone1' => 'TNKRNJ',
                'dmetaphone2' => 'TNKRNK'
            ],
            [
                'name'        => 'Donald Duck',
                'type'        => 'fantasy',
                'soundex'     => 'D543',
                'metaphone'   => 'TNLTTK',
                'dmetaphone1' => 'TNLTTK',
                'dmetaphone2' => 'TNLTTK'
            ],
            [
                'name'        => 'Doofus Drake',
                'type'        => 'fantasy',
                'soundex'     => 'D123',
                'metaphone'   => 'TFSTRK',
                'dmetaphone1' => 'TFSTRK',
                'dmetaphone2' => 'TFSTRK'
            ],
            [
                'name'        => 'Dora the Explorer',
                'type'        => 'fantasy',
                'soundex'     => 'D632',
                'metaphone'   => 'TR0KSPLRR',
                'dmetaphone1' => 'TR0KSPLRR',
                'dmetaphone2' => 'TRTKSPLRR'
            ],
            [
                'name'        => 'Dori Whittaker',
                'type'        => 'fantasy',
                'soundex'     => 'D632',
                'metaphone'   => 'TRHTKR',
                'dmetaphone1' => 'TRTKR',
                'dmetaphone2' => 'TRTKR'
            ],
            [
                'name'        => 'Dot Warner',
                'type'        => 'fantasy',
                'soundex'     => 'D365',
                'metaphone'   => 'TTWRNR',
                'dmetaphone1' => 'TTRNR',
                'dmetaphone2' => 'TTRNR'
            ],
            [
                'name'        => 'Dr. Calico',
                'type'        => 'fantasy',
                'soundex'     => 'D624',
                'metaphone'   => 'TRKLK',
                'dmetaphone1' => 'TRKLK',
                'dmetaphone2' => 'TRKLK'
            ],
            [
                'name'        => 'Dr. David Q. Dawson',
                'type'        => 'fantasy',
                'soundex'     => 'D631',
                'metaphone'   => 'TRTFTKTSN',
                'dmetaphone1' => 'TRTFTKTSN',
                'dmetaphone2' => 'TRTFTKTSN'
            ],
            [
                'name'        => 'Dr. Doppler',
                'type'        => 'fantasy',
                'soundex'     => 'D631',
                'metaphone'   => 'TRTPLR',
                'dmetaphone1' => 'TRTPLR',
                'dmetaphone2' => 'TRTPLR'
            ],
            [
                'name'        => 'Dr. Facilier',
                'type'        => 'fantasy',
                'soundex'     => 'D612',
                'metaphone'   => 'TRFSLR',
                'dmetaphone1' => 'TRFSL',
                'dmetaphone2' => 'TRFSLR'
            ],
            [
                'name'        => 'Dr. Forrester',
                'type'        => 'fantasy',
                'soundex'     => 'D616',
                'metaphone'   => 'TRFRSTR',
                'dmetaphone1' => 'TRFRSTR',
                'dmetaphone2' => 'TRFRSTR'
            ],
            [
                'name'        => 'Dr. Jacques von Hamsterviel',
                'type'        => 'fantasy',
                'soundex'     => 'D622',
                'metaphone'   => 'TRJKKSFNHMSTRFL',
                'dmetaphone1' => 'TRJKSFNMSTRFL',
                'dmetaphone2' => 'TRJKSFNMSTRFL'
            ],
            [
                'name'        => 'Dr. Joshua Sweet',
                'type'        => 'fantasy',
                'soundex'     => 'D622',
                'metaphone'   => 'TRJXSWT',
                'dmetaphone1' => 'TRJXST',
                'dmetaphone2' => 'TRJXST'
            ],
            [
                'name'        => 'Dr. Jumba Jookiba',
                'type'        => 'fantasy',
                'soundex'     => 'D625',
                'metaphone'   => 'TRJMJKB',
                'dmetaphone1' => 'TRJMPJKP',
                'dmetaphone2' => 'TRJMPJKP'
            ],
            [
                'name'        => 'Dr. Reginald Bushroot',
                'type'        => 'fantasy',
                'soundex'     => 'D625',
                'metaphone'   => 'TRRJNLTBXRT',
                'dmetaphone1' => 'TRRJNLTPXRT',
                'dmetaphone2' => 'TRRKNLTPXRT'
            ],
            [
                'name'        => 'Drake Mallard',
                'type'        => 'fantasy',
                'soundex'     => 'D625',
                'metaphone'   => 'TRKMLRT',
                'dmetaphone1' => 'TRKMLRT',
                'dmetaphone2' => 'TRKMLRT'
            ],
            [
                'name'        => 'Drizella Tremaine',
                'type'        => 'fantasy',
                'soundex'     => 'D624',
                'metaphone'   => 'TRSLTRMN',
                'dmetaphone1' => 'TRSLTRMN',
                'dmetaphone2' => 'TRSLTRMN'
            ],
            [
                'name'        => 'Droopy Dog',
                'type'        => 'fantasy',
                'soundex'     => 'D613',
                'metaphone'   => 'TRPTK',
                'dmetaphone1' => 'TRPTK',
                'dmetaphone2' => 'TRPTK'
            ],
            [
                'name'        => 'Dudley Dooright',
                'type'        => 'fantasy',
                'soundex'     => 'D343',
                'metaphone'   => 'TTLTRFT',
                'dmetaphone1' => 'TTLTRT',
                'dmetaphone2' => 'TTLTRT'
            ],
            [
                'name'        => 'Duke of Weselton',
                'type'        => 'fantasy',
                'soundex'     => 'D212',
                'metaphone'   => 'TKFWSLTN',
                'dmetaphone1' => 'TKFSLTN',
                'dmetaphone2' => 'TKFSLTN'
            ],
            [
                'name'        => 'Eddie Carroll',
                'type'        => 'fantasy',
                'soundex'     => 'E326',
                'metaphone'   => 'ETKRL',
                'dmetaphone1' => 'ATKRL',
                'dmetaphone2' => 'ATKRL'
            ],
            [
                'name'        => 'Edgar Balthazar the Butler',
                'type'        => 'fantasy',
                'soundex'     => 'E326',
                'metaphone'   => 'ETKRBL0SR0BTLR',
                'dmetaphone1' => 'ATKRPL0SR0PTLR',
                'dmetaphone2' => 'ATKRPLTSRTPTLR'
            ],
            [
                'name'        => 'El Capitan',
                'type'        => 'fantasy',
                'soundex'     => 'E421',
                'metaphone'   => 'ELKPTN',
                'dmetaphone1' => 'ALKPTN',
                'dmetaphone2' => 'ALKPTN'
            ],
            [
                'name'        => 'Eli "Big Daddy" La Bouff',
                'type'        => 'fantasy',
                'soundex'     => 'E412',
                'metaphone'   => 'ELBKTTLBF',
                'dmetaphone1' => 'ALPKTTLPF',
                'dmetaphone2' => 'ALPKTTLPF'
            ],
            [
                'name'        => 'Ellie Mae',
                'type'        => 'fantasy',
                'soundex'     => 'E450',
                'metaphone'   => 'ELM',
                'dmetaphone1' => 'ALM',
                'dmetaphone2' => 'ALM'
            ],
            [
                'name'        => 'Elmer Elephant',
                'type'        => 'fantasy',
                'soundex'     => 'E456',
                'metaphone'   => 'ELMRLFNT',
                'dmetaphone1' => 'ALMRLFNT',
                'dmetaphone2' => 'ALMRLFNT'
            ],
            [
                'name'        => 'Elmer Fudd',
                'type'        => 'fantasy',
                'soundex'     => 'E456',
                'metaphone'   => 'ELMRFT',
                'dmetaphone1' => 'ALMRFT',
                'dmetaphone2' => 'ALMRFT'
            ],
            [
                'name'        => 'Elroy Jetson',
                'type'        => 'fantasy',
                'soundex'     => 'E462',
                'metaphone'   => 'ELRJTSN',
                'dmetaphone1' => 'ALRJTSN',
                'dmetaphone2' => 'ALRJTSN'
            ],
            [
                'name'        => 'Emperor of China',
                'type'        => 'fantasy',
                'soundex'     => 'E516',
                'metaphone'   => 'EMPRRFXN',
                'dmetaphone1' => 'AMPRRFXN',
                'dmetaphone2' => 'AMPRRFKN'
            ],
            [
                'name'        => 'Evan Dunn',
                'type'        => 'fantasy',
                'soundex'     => 'E153',
                'metaphone'   => 'EFNTN',
                'dmetaphone1' => 'AFNTN',
                'dmetaphone2' => 'AFNTN'
            ],
            [
                'name'        => 'Fa Li',
                'type'        => 'fantasy',
                'soundex'     => 'F400',
                'metaphone'   => 'FL',
                'dmetaphone1' => 'FL',
                'dmetaphone2' => 'FL'
            ],
            [
                'name'        => 'Fa Zhou',
                'type'        => 'fantasy',
                'soundex'     => 'F200',
                'metaphone'   => 'FSH',
                'dmetaphone1' => 'FJ',
                'dmetaphone2' => 'FJ'
            ],
            [
                'name'        => 'Fairy Godmother',
                'type'        => 'fantasy',
                'soundex'     => 'F623',
                'metaphone'   => 'FRKTM0R',
                'dmetaphone1' => 'FRKTM0R',
                'dmetaphone2' => 'FRKTMTR'
            ],
            [
                'name'        => 'Fairy Mary',
                'type'        => 'fantasy',
                'soundex'     => 'F656',
                'metaphone'   => 'FRMR',
                'dmetaphone1' => 'FRMR',
                'dmetaphone2' => 'FRMR'
            ],
            [
                'name'        => 'Fall-Apart Rabbit',
                'type'        => 'fantasy',
                'soundex'     => 'F416',
                'metaphone'   => 'FLPRTRBT',
                'dmetaphone1' => 'FLPRTRPT',
                'dmetaphone2' => 'FLPRTRPT'
            ],
            [
                'name'        => 'Fat Albert',
                'type'        => 'fantasy',
                'soundex'     => 'F341',
                'metaphone'   => 'FTLBRT',
                'dmetaphone1' => 'FTLPRT',
                'dmetaphone2' => 'FTLPRT'
            ],
            [
                'name'        => 'Fat Cat',
                'type'        => 'fantasy',
                'soundex'     => 'F323',
                'metaphone'   => 'FTKT',
                'dmetaphone1' => 'FTKT',
                'dmetaphone2' => 'FTKT'
            ],
            [
                'name'        => 'Father Wolf',
                'type'        => 'fantasy',
                'soundex'     => 'F364',
                'metaphone'   => 'F0RWLF',
                'dmetaphone1' => 'F0RLF',
                'dmetaphone2' => 'FTRLF'
            ],
            [
                'name'        => 'Felicia the Cat',
                'type'        => 'fantasy',
                'soundex'     => 'F423',
                'metaphone'   => 'FLX0KT',
                'dmetaphone1' => 'FLS0KT',
                'dmetaphone2' => 'FLXTKT'
            ],
            [
                'name'        => 'Felix the Cat',
                'type'        => 'fantasy',
                'soundex'     => 'F423',
                'metaphone'   => 'FLKS0KT',
                'dmetaphone1' => 'FLKS0KT',
                'dmetaphone2' => 'FLKSTKT'
            ],
            [
                'name'        => 'Fenton Crackshell',
                'type'        => 'fantasy',
                'soundex'     => 'F535',
                'metaphone'   => 'FNTNKRKXL',
                'dmetaphone1' => 'FNTNKRKXL',
                'dmetaphone2' => 'FNTNKRKXL'
            ],
            [
                'name'        => 'Fenton Q. Harcourt',
                'type'        => 'fantasy',
                'soundex'     => 'F535',
                'metaphone'   => 'FNTNKHRKRT',
                'dmetaphone1' => 'FNTNKRKRT',
                'dmetaphone2' => 'FNTNKRKRT'
            ],
            [
                'name'        => 'Ferdie Fieldmouse',
                'type'        => 'fantasy',
                'soundex'     => 'F631',
                'metaphone'   => 'FRTFLTMS',
                'dmetaphone1' => 'FRTFLTMS',
                'dmetaphone2' => 'FRTFLTMS'
            ],
            [
                'name'        => 'Ferdinand the Bull',
                'type'        => 'fantasy',
                'soundex'     => 'F635',
                'metaphone'   => 'FRTNNT0BL',
                'dmetaphone1' => 'FRTNNT0PL',
                'dmetaphone2' => 'FRTNNTTPL'
            ],
            [
                'name'        => 'Fflewddur Fflam',
                'type'        => 'fantasy',
                'soundex'     => 'F436',
                'metaphone'   => 'FLTRFLM',
                'dmetaphone1' => 'FLTRFLM',
                'dmetaphone2' => 'FLTRFLM'
            ],
            [
                'name'        => 'Fiddler Pig',
                'type'        => 'fantasy',
                'soundex'     => 'F346',
                'metaphone'   => 'FTLRPK',
                'dmetaphone1' => 'FTLRPK',
                'dmetaphone2' => 'FTLRPK'
            ],
            [
                'name'        => 'Fife the Piccolo',
                'type'        => 'fantasy',
                'soundex'     => 'F131',
                'metaphone'   => 'FF0PKKL',
                'dmetaphone1' => 'FF0PKL',
                'dmetaphone2' => 'FFTPKL'
            ],
            [
                'name'        => 'Fifer Pig',
                'type'        => 'fantasy',
                'soundex'     => 'F161',
                'metaphone'   => 'FFRPK',
                'dmetaphone1' => 'FFRPK',
                'dmetaphone2' => 'FFRPK'
            ],
            [
                'name'        => 'Fifi the Featherduster',
                'type'        => 'fantasy',
                'soundex'     => 'F131',
                'metaphone'   => 'FF0F0RTSTR',
                'dmetaphone1' => 'FF0F0RTSTR',
                'dmetaphone2' => 'FFTFTRTSTR'
            ],
            [
                'name'        => 'Figaro the Cat',
                'type'        => 'fantasy',
                'soundex'     => 'F263',
                'metaphone'   => 'FKR0KT',
                'dmetaphone1' => 'FKR0KT',
                'dmetaphone2' => 'FKRTKT'
            ],
            [
                'name'        => 'First Ancestor Fa',
                'type'        => 'fantasy',
                'soundex'     => 'F623',
                'metaphone'   => 'FRSTNSSTRF',
                'dmetaphone1' => 'FRSTNSSTRF',
                'dmetaphone2' => 'FRSTNSSTRF'
            ],
            [
                'name'        => 'Fish Out of Water',
                'type'        => 'fantasy',
                'soundex'     => 'F231',
                'metaphone'   => 'FXTFWTR',
                'dmetaphone1' => 'FXTFTR',
                'dmetaphone2' => 'FXTFTR'
            ],
            [
                'name'        => 'Fix-It Felix, Jr',
                'type'        => 'fantasy',
                'soundex'     => 'F231',
                'metaphone'   => 'FKSTFLKSJR',
                'dmetaphone1' => 'FKSTFLKSJR',
                'dmetaphone2' => 'FKSTFLKSJR'
            ],
            [
                'name'        => 'Flaps the Vulture',
                'type'        => 'fantasy',
                'soundex'     => 'F412',
                'metaphone'   => 'FLPS0FLTR',
                'dmetaphone1' => 'FLPS0FLTR',
                'dmetaphone2' => 'FLPSTFLTR'
            ],
            [
                'name'        => 'Flintheart Glomgold',
                'type'        => 'fantasy',
                'soundex'     => 'F453',
                'metaphone'   => 'FLN0RTKLMKLT',
                'dmetaphone1' => 'FLN0RTKLMKLT',
                'dmetaphone2' => 'FLNTRTKLMKLT'
            ],
            [
                'name'        => 'Flotsam and Jetsam',
                'type'        => 'fantasy',
                'soundex'     => 'F432',
                'metaphone'   => 'FLTSMNTJTSM',
                'dmetaphone1' => 'FLTSMNTJTSM',
                'dmetaphone2' => 'FLTSMNTJTSM'
            ],
            [
                'name'        => 'Flunkey the Baboon',
                'type'        => 'fantasy',
                'soundex'     => 'F452',
                'metaphone'   => 'FLNK0BBN',
                'dmetaphone1' => 'FLNK0PPN',
                'dmetaphone2' => 'FLNKTPPN'
            ],
            [
                'name'        => 'Flynn Rider',
                'type'        => 'fantasy',
                'soundex'     => 'F456',
                'metaphone'   => 'FLNRTR',
                'dmetaphone1' => 'FLNRTR',
                'dmetaphone2' => 'FLNRTR'
            ],
            [
                'name'        => 'Foghorn Leghorn',
                'type'        => 'fantasy',
                'soundex'     => 'F265',
                'metaphone'   => 'FFRNLFRN',
                'dmetaphone1' => 'FKRNLKRN',
                'dmetaphone2' => 'FKRNLKRN'
            ],
            [
                'name'        => 'Forte the Pipe Organ',
                'type'        => 'fantasy',
                'soundex'     => 'F633',
                'metaphone'   => 'FRT0PPRKN',
                'dmetaphone1' => 'FRT0PPRKN',
                'dmetaphone2' => 'FRTTPPRKN'
            ],
            [
                'name'        => 'Foxy Loxy',
                'type'        => 'fantasy',
                'soundex'     => 'F242',
                'metaphone'   => 'FKSLKS',
                'dmetaphone1' => 'FKSLKS',
                'dmetaphone2' => 'FKSLKS'
            ],
            [
                'name'        => 'Frank and Earnest',
                'type'        => 'fantasy',
                'soundex'     => 'F652',
                'metaphone'   => 'FRNKNTRNST',
                'dmetaphone1' => 'FRNKNTRNST',
                'dmetaphone2' => 'FRNKNTRNST'
            ],
            [
                'name'        => 'Frank Welker',
                'type'        => 'fantasy',
                'soundex'     => 'F652',
                'metaphone'   => 'FRNKWLKR',
                'dmetaphone1' => 'FRNKLKR',
                'dmetaphone2' => 'FRNKLKR'
            ],
            [
                'name'        => 'Frankie the Frog',
                'type'        => 'fantasy',
                'soundex'     => 'F652',
                'metaphone'   => 'FRNK0FRK',
                'dmetaphone1' => 'FRNK0FRK',
                'dmetaphone2' => 'FRNKTFRK'
            ],
            [
                'name'        => 'Franny Robinson',
                'type'        => 'fantasy',
                'soundex'     => 'F656',
                'metaphone'   => 'FRNRBNSN',
                'dmetaphone1' => 'FRNRPNSN',
                'dmetaphone2' => 'FRNRPNSN'
            ],
            [
                'name'        => 'Fred Flintstone',
                'type'        => 'fantasy',
                'soundex'     => 'F631',
                'metaphone'   => 'FRTFLNTSTN',
                'dmetaphone1' => 'FRTFLNTSTN',
                'dmetaphone2' => 'FRTFLNTSTN'
            ],
            [
                'name'        => 'Friar Tuck',
                'type'        => 'fantasy',
                'soundex'     => 'F663',
                'metaphone'   => 'FRRTK',
                'dmetaphone1' => 'FRRTK',
                'dmetaphone2' => 'FRRTK'
            ],
            [
                'name'        => 'Friend Owl',
                'type'        => 'fantasy',
                'soundex'     => 'F653',
                'metaphone'   => 'FRNTL',
                'dmetaphone1' => 'FRNTL',
                'dmetaphone2' => 'FRNTL'
            ],
            [
                'name'        => 'Frosty the Snowman',
                'type'        => 'fantasy',
                'soundex'     => 'F623',
                'metaphone'   => 'FRST0SNMN',
                'dmetaphone1' => 'FRST0SNMN',
                'dmetaphone2' => 'FRSTTSNMN'
            ],
            [
                'name'        => 'Gadget Hackwrench',
                'type'        => 'fantasy',
                'soundex'     => 'G323',
                'metaphone'   => 'KJTHKRNX',
                'dmetaphone1' => 'KJTKRNX',
                'dmetaphone2' => 'KJTKRNK'
            ],
            [
                'name'        => 'Gaetan "Mole" Moliére',
                'type'        => 'fantasy',
                'soundex'     => 'G354',
                'metaphone'   => 'KTNMLMLR',
                'dmetaphone1' => 'KTNMLMLR',
                'dmetaphone2' => 'KTNMLMLR'
            ],
            [
                'name'        => 'Garfield the Cat',
                'type'        => 'fantasy',
                'soundex'     => 'G614',
                'metaphone'   => 'KRFLT0KT',
                'dmetaphone1' => 'KRFLT0KT',
                'dmetaphone2' => 'KRFLTTKT'
            ],
            [
                'name'        => 'General Hologram',
                'type'        => 'fantasy',
                'soundex'     => 'G564',
                'metaphone'   => 'JNRLHLKRM',
                'dmetaphone1' => 'JNRLLKRM',
                'dmetaphone2' => 'KNRLLKRM'
            ],
            [
                'name'        => 'General Li',
                'type'        => 'fantasy',
                'soundex'     => 'G564',
                'metaphone'   => 'JNRLL',
                'dmetaphone1' => 'JNRLL',
                'dmetaphone2' => 'KNRLL'
            ],
            [
                'name'        => 'George Darling',
                'type'        => 'fantasy',
                'soundex'     => 'G623',
                'metaphone'   => 'JRJTRLNK',
                'dmetaphone1' => 'JRJTRLNK',
                'dmetaphone2' => 'KRKTRLNK'
            ],
            [
                'name'        => 'George of the Jungle',
                'type'        => 'fantasy',
                'soundex'     => 'G621',
                'metaphone'   => 'JRJF0JNKL',
                'dmetaphone1' => 'JRJF0JNKL',
                'dmetaphone2' => 'KRKFTJNKL'
            ],
            [
                'name'        => 'Georges Hautecourt',
                'type'        => 'fantasy',
                'soundex'     => 'G622',
                'metaphone'   => 'JRJSHTKRT',
                'dmetaphone1' => 'JRJSTKRT',
                'dmetaphone2' => 'KRKSTKRT'
            ],
            [
                'name'        => 'Giddy the Elephant',
                'type'        => 'fantasy',
                'soundex'     => 'G334',
                'metaphone'   => 'JT0LFNT',
                'dmetaphone1' => 'JT0LFNT',
                'dmetaphone2' => 'KTTLFNT'
            ],
            [
                'name'        => 'Gladstone Gander',
                'type'        => 'fantasy',
                'soundex'     => 'G432',
                'metaphone'   => 'KLTSTNKNTR',
                'dmetaphone1' => 'KLTSTNKNTR',
                'dmetaphone2' => 'KLTSTNKNTR'
            ],
            [
                'name'        => 'Glittering Goldie',
                'type'        => 'fantasy',
                'soundex'     => 'G436',
                'metaphone'   => 'KLTRNKKLT',
                'dmetaphone1' => 'KLTRNKKLT',
                'dmetaphone2' => 'LTRNKKLT'
            ],
            [
                'name'        => 'Gloria Blondell',
                'type'        => 'fantasy',
                'soundex'     => 'G461',
                'metaphone'   => 'KLRBLNTL',
                'dmetaphone1' => 'KLRPLNTL',
                'dmetaphone2' => 'KLRPLNTL'
            ],
            [
                'name'        => 'Goosey Loosey',
                'type'        => 'fantasy',
                'soundex'     => 'G242',
                'metaphone'   => 'KSLS',
                'dmetaphone1' => 'KSLS',
                'dmetaphone2' => 'KSLS'
            ],
            [
                'name'        => 'Gosalyn Mallard',
                'type'        => 'fantasy',
                'soundex'     => 'G245',
                'metaphone'   => 'KSLNMLRT',
                'dmetaphone1' => 'KSLNMLRT',
                'dmetaphone2' => 'KSLNMLRT'
            ],
            [
                'name'        => 'Governor John Ratcliffe',
                'type'        => 'fantasy',
                'soundex'     => 'G165',
                'metaphone'   => 'KFRNRJNRTKLF',
                'dmetaphone1' => 'KFRNRJNRTKLF',
                'dmetaphone2' => 'KFRNRJNRTKLF'
            ],
            [
                'name'        => 'Grand Councilwoman',
                'type'        => 'fantasy',
                'soundex'     => 'G653',
                'metaphone'   => 'KRNTKNSLWMN',
                'dmetaphone1' => 'KRNTKNSLMN',
                'dmetaphone2' => 'KRNTKNSLMN'
            ],
            [
                'name'        => 'Grandma Duck',
                'type'        => 'fantasy',
                'soundex'     => 'G653',
                'metaphone'   => 'KRNTMTK',
                'dmetaphone1' => 'KRNTMTK',
                'dmetaphone2' => 'KRNTMTK'
            ],
            [
                'name'        => 'Grandmother Fa',
                'type'        => 'fantasy',
                'soundex'     => 'G653',
                'metaphone'   => 'KRNTM0RF',
                'dmetaphone1' => 'KRNTM0RF',
                'dmetaphone2' => 'KRNTMTRF'
            ],
            [
                'name'        => 'Grandmother Willow',
                'type'        => 'fantasy',
                'soundex'     => 'G653',
                'metaphone'   => 'KRNTM0RWL',
                'dmetaphone1' => 'KRNTM0RL',
                'dmetaphone2' => 'KRNTMTRLF'
            ],
            [
                'name'        => 'Granny Rose',
                'type'        => 'fantasy',
                'soundex'     => 'G656',
                'metaphone'   => 'KRNRS',
                'dmetaphone1' => 'KRNRS',
                'dmetaphone2' => 'KRNRS'
            ],
            [
                'name'        => 'Grape Ape',
                'type'        => 'fantasy',
                'soundex'     => 'G611',
                'metaphone'   => 'KRPP',
                'dmetaphone1' => 'KRPP',
                'dmetaphone2' => 'KRPP'
            ],
            [
                'name'        => 'Greasy the Weasel',
                'type'        => 'fantasy',
                'soundex'     => 'G623',
                'metaphone'   => 'KRS0WSL',
                'dmetaphone1' => 'KRS0SL',
                'dmetaphone2' => 'KRSTSL'
            ],
            [
                'name'        => 'Great Prince of the Forest',
                'type'        => 'fantasy',
                'soundex'     => 'G631',
                'metaphone'   => 'KRTPRNSF0FRST',
                'dmetaphone1' => 'KRTPRNSF0FRST',
                'dmetaphone2' => 'KRTPRNSFTFRST'
            ],
            [
                'name'        => 'Green Giant',
                'type'        => 'fantasy',
                'soundex'     => 'G652',
                'metaphone'   => 'KRNJNT',
                'dmetaphone1' => 'KRNJNT',
                'dmetaphone2' => 'KRNKNT'
            ],
            [
                'name'        => 'Groovy Goolies',
                'type'        => 'fantasy',
                'soundex'     => 'G612',
                'metaphone'   => 'KRFKLS',
                'dmetaphone1' => 'KRFKLS',
                'dmetaphone2' => 'KRFKLS'
            ],
            [
                'name'        => 'Gus Goose',
                'type'        => 'fantasy',
                'soundex'     => 'G220',
                'metaphone'   => 'KSKS',
                'dmetaphone1' => 'KSKS',
                'dmetaphone2' => 'KSKS'
            ],
            [
                'name'        => 'Gus Lollygagger',
                'type'        => 'fantasy',
                'soundex'     => 'G244',
                'metaphone'   => 'KSLLKKR',
                'dmetaphone1' => 'KSLLKKR',
                'dmetaphone2' => 'KSLLKKR'
            ],
            [
                'name'        => 'Gyro Gearloose',
                'type'        => 'fantasy',
                'soundex'     => 'G626',
                'metaphone'   => 'JRJRLS',
                'dmetaphone1' => 'KRJRLS',
                'dmetaphone2' => 'JRKRLS'
            ],
            [
                'name'        => 'Hagar the Horrible',
                'type'        => 'fantasy',
                'soundex'     => 'H263',
                'metaphone'   => 'HKR0HRBL',
                'dmetaphone1' => 'HKR0RPL',
                'dmetaphone2' => 'HKRTRPL'
            ],
            [
                'name'        => 'Hardie Albright',
                'type'        => 'fantasy',
                'soundex'     => 'H634',
                'metaphone'   => 'HRTLBRT',
                'dmetaphone1' => 'HRTLPRT',
                'dmetaphone2' => 'HRTLPRT'
            ],
            [
                'name'        => 'Harold the Seahorse',
                'type'        => 'fantasy',
                'soundex'     => 'H643',
                'metaphone'   => 'HRLT0SHRS',
                'dmetaphone1' => 'HRLT0SHRS',
                'dmetaphone2' => 'HRLTTSHRS'
            ],
            [
                'name'        => 'Haroud Hazi Bin',
                'type'        => 'fantasy',
                'soundex'     => 'H632',
                'metaphone'   => 'HRTHSBN',
                'dmetaphone1' => 'HRTSPN',
                'dmetaphone2' => 'HRTSPN'
            ],
            [
                'name'        => 'Harvey Fenner',
                'type'        => 'fantasy',
                'soundex'     => 'H611',
                'metaphone'   => 'HRFFNR',
                'dmetaphone1' => 'HRFFNR',
                'dmetaphone2' => 'HRFFNR'
            ],
            [
                'name'        => 'Headless Horseman',
                'type'        => 'fantasy',
                'soundex'     => 'H342',
                'metaphone'   => 'HTLSHRSMN',
                'dmetaphone1' => 'HTLSRSMN',
                'dmetaphone2' => 'HTLSRSMN'
            ],
            [
                'name'        => 'Heckle and Jeckle',
                'type'        => 'fantasy',
                'soundex'     => 'H245',
                'metaphone'   => 'HKLNTJKL',
                'dmetaphone1' => 'HKLNTJKL',
                'dmetaphone2' => 'HKLNTJKL'
            ],
            [
                'name'        => 'Helga Sinclair',
                'type'        => 'fantasy',
                'soundex'     => 'H422',
                'metaphone'   => 'HLKSNKLR',
                'dmetaphone1' => 'HLKSNKLR',
                'dmetaphone2' => 'HLKSNKLR'
            ],
            [
                'name'        => 'Hello Kitty',
                'type'        => 'fantasy',
                'soundex'     => 'H423',
                'metaphone'   => 'HLKT',
                'dmetaphone1' => 'HLKT',
                'dmetaphone2' => 'HLKT'
            ],
            [
                'name'        => 'Hen Wen',
                'type'        => 'fantasy',
                'soundex'     => 'H550',
                'metaphone'   => 'HNWN',
                'dmetaphone1' => 'HNN',
                'dmetaphone2' => 'HNN'
            ],
            [
                'name'        => 'Henry Fenner',
                'type'        => 'fantasy',
                'soundex'     => 'H561',
                'metaphone'   => 'HNRFNR',
                'dmetaphone1' => 'HNRFNR',
                'dmetaphone2' => 'HNRFNR'
            ],
            [
                'name'        => 'Herb Muddlefoot',
                'type'        => 'fantasy',
                'soundex'     => 'H615',
                'metaphone'   => 'HRBMTLFT',
                'dmetaphone1' => 'HRPMTLFT',
                'dmetaphone2' => 'HRPMTLFT'
            ],
            [
                'name'        => 'Hiram Flaversham',
                'type'        => 'fantasy',
                'soundex'     => 'H651',
                'metaphone'   => 'HRMFLFRXM',
                'dmetaphone1' => 'HRMFLFRXM',
                'dmetaphone2' => 'HRMFLFRXM'
            ],
            [
                'name'        => 'Hit Cat the English Cat',
                'type'        => 'fantasy',
                'soundex'     => 'H323',
                'metaphone'   => 'HTKT0NKLXKT',
                'dmetaphone1' => 'HTKT0NKLXKT',
                'dmetaphone2' => 'HTKTTNLXKT'
            ],
            [
                'name'        => 'Homer Simpson',
                'type'        => 'fantasy',
                'soundex'     => 'H562',
                'metaphone'   => 'HMRSMPSN',
                'dmetaphone1' => 'HMRSMPSN',
                'dmetaphone2' => 'HMRSMPSN'
            ],
            [
                'name'        => 'Hong Kong Phooey',
                'type'        => 'fantasy',
                'soundex'     => 'H525',
                'metaphone'   => 'HNKKNKF',
                'dmetaphone1' => 'HNKKNKF',
                'dmetaphone2' => 'HNKKNKF'
            ],
            [
                'name'        => 'Honker Muddlefoot',
                'type'        => 'fantasy',
                'soundex'     => 'H526',
                'metaphone'   => 'HNKRMTLFT',
                'dmetaphone1' => 'HNKRMTLFT',
                'dmetaphone2' => 'HNKRMTLFT'
            ],
            [
                'name'        => 'Hook Hand',
                'type'        => 'fantasy',
                'soundex'     => 'H253',
                'metaphone'   => 'HKHNT',
                'dmetaphone1' => 'HKNT',
                'dmetaphone2' => 'HKNT'
            ],
            [
                'name'        => 'Horace & Jasper Badun',
                'type'        => 'fantasy',
                'soundex'     => 'H622',
                'metaphone'   => 'HRSJSPRBTN',
                'dmetaphone1' => 'HRSJSPRPTN',
                'dmetaphone2' => 'HRSJSPRPTN'
            ],
            [
                'name'        => 'Horace Horsecollar',
                'type'        => 'fantasy',
                'soundex'     => 'H626',
                'metaphone'   => 'HRSHRSKLR',
                'dmetaphone1' => 'HRSRSKLR',
                'dmetaphone2' => 'HRSRSKLR'
            ],
            [
                'name'        => 'Hot Stuff',
                'type'        => 'fantasy',
                'soundex'     => 'H323',
                'metaphone'   => 'HTSTF',
                'dmetaphone1' => 'HTSTF',
                'dmetaphone2' => 'HTSTF'
            ],
            [
                'name'        => 'Huckleberry Hound',
                'type'        => 'fantasy',
                'soundex'     => 'H241',
                'metaphone'   => 'HKLBRHNT',
                'dmetaphone1' => 'HKLPRNT',
                'dmetaphone2' => 'HKLPRNT'
            ],
            [
                'name'        => 'Humbert the Huntsman',
                'type'        => 'fantasy',
                'soundex'     => 'H516',
                'metaphone'   => 'HMRT0HNTSMN',
                'dmetaphone1' => 'HMRT0NTSMN',
                'dmetaphone2' => 'HMRTTNTSMN'
            ],
            [
                'name'        => 'Humphrey the Bear',
                'type'        => 'fantasy',
                'soundex'     => 'H516',
                'metaphone'   => 'HMFR0BR',
                'dmetaphone1' => 'HMFR0PR',
                'dmetaphone2' => 'HMFRTPR'
            ],
            [
                'name'        => 'Hyacinth Hippo',
                'type'        => 'fantasy',
                'soundex'     => 'H253',
                'metaphone'   => 'YSN0HP',
                'dmetaphone1' => 'HSN0P',
                'dmetaphone2' => 'HSNTP'
            ],
            [
                'name'        => 'Ian the Alligator',
                'type'        => 'fantasy',
                'soundex'     => 'I534',
                'metaphone'   => 'IN0LKTR',
                'dmetaphone1' => 'AN0LKTR',
                'dmetaphone2' => 'ANTLKTR'
            ],
            [
                'name'        => 'Ichabod Crane',
                'type'        => 'fantasy',
                'soundex'     => 'I213',
                'metaphone'   => 'IXBTKRN',
                'dmetaphone1' => 'AXPTKRN',
                'dmetaphone2' => 'AKPTKRN'
            ],
            [
                'name'        => 'J. Audubon Woodlore',
                'type'        => 'fantasy',
                'soundex'     => 'J315',
                'metaphone'   => 'JTBNWTLR',
                'dmetaphone1' => 'JTPNTLR',
                'dmetaphone2' => 'ATPNTLR'
            ],
            [
                'name'        => 'J. Gander Hooter',
                'type'        => 'fantasy',
                'soundex'     => 'J536',
                'metaphone'   => 'JKNTRHTR',
                'dmetaphone1' => 'JKNTRTR',
                'dmetaphone2' => 'AKNTRTR'
            ],
            [
                'name'        => 'J. Pat O\'Malley',
                'type'        => 'fantasy',
                'soundex'     => 'J135',
                'metaphone'   => 'JPTML',
                'dmetaphone1' => 'JPTML',
                'dmetaphone2' => 'APTML'
            ],
            [
                'name'        => 'J. Thaddeus Toad',
                'type'        => 'fantasy',
                'soundex'     => 'J332',
                'metaphone'   => 'J0TSTT',
                'dmetaphone1' => 'J0TSTT',
                'dmetaphone2' => 'ATTSTT'
            ],
            [
                'name'        => 'J. Worthington Foulfellow',
                'type'        => 'fantasy',
                'soundex'     => 'J635',
                'metaphone'   => 'JWR0NKTNFLFL',
                'dmetaphone1' => 'JR0NKTNFLFL',
                'dmetaphone2' => 'ARTNKTNFLFLF'
            ],
            [
                'name'        => 'Jackson "Jaq" Hopscotch',
                'type'        => 'fantasy',
                'soundex'     => 'J252',
                'metaphone'   => 'JKSNJKHPSKX',
                'dmetaphone1' => 'JKSNJKPSKX',
                'dmetaphone2' => 'AKSNJKPSKX'
            ],
            [
                'name'        => 'Jane Porter',
                'type'        => 'fantasy',
                'soundex'     => 'J516',
                'metaphone'   => 'JNPRTR',
                'dmetaphone1' => 'JNPRTR',
                'dmetaphone2' => 'ANPRTR'
            ],
            [
                'name'        => 'Jason Marsden',
                'type'        => 'fantasy',
                'soundex'     => 'J256',
                'metaphone'   => 'JSNMRSTN',
                'dmetaphone1' => 'JSNMRSTN',
                'dmetaphone2' => 'ASNMRSTN'
            ],
            [
                'name'        => 'Jeb the Goat',
                'type'        => 'fantasy',
                'soundex'     => 'J132',
                'metaphone'   => 'JB0KT',
                'dmetaphone1' => 'JP0KT',
                'dmetaphone2' => 'APTKT'
            ],
            [
                'name'        => 'Jennifer "Jenny" Foxworth',
                'type'        => 'fantasy',
                'soundex'     => 'J516',
                'metaphone'   => 'JNFRJNFKSWR0',
                'dmetaphone1' => 'JNFRJNFKSR0',
                'dmetaphone2' => 'ANFRJNFKSRT'
            ],
            [
                'name'        => 'Jennifer Lien',
                'type'        => 'fantasy',
                'soundex'     => 'J516',
                'metaphone'   => 'JNFRLN',
                'dmetaphone1' => 'JNFRLN',
                'dmetaphone2' => 'ANFRLN'
            ],
            [
                'name'        => 'Jenny Wren',
                'type'        => 'fantasy',
                'soundex'     => 'J565',
                'metaphone'   => 'JNRN',
                'dmetaphone1' => 'JNRN',
                'dmetaphone2' => 'ANRN'
            ],
            [
                'name'        => 'Jessica Rabbit',
                'type'        => 'fantasy',
                'soundex'     => 'J226',
                'metaphone'   => 'JSKRBT',
                'dmetaphone1' => 'JSKRPT',
                'dmetaphone2' => 'ASKRPT'
            ],
            [
                'name'        => 'Jim Crow',
                'type'        => 'fantasy',
                'soundex'     => 'J526',
                'metaphone'   => 'JMKR',
                'dmetaphone1' => 'JMKR',
                'dmetaphone2' => 'AMKRF'
            ],
            [
                'name'        => 'Jim Cummings',
                'type'        => 'fantasy',
                'soundex'     => 'J525',
                'metaphone'   => 'JMKMNKS',
                'dmetaphone1' => 'JMKMNKS',
                'dmetaphone2' => 'AMKMNKS'
            ],
            [
                'name'        => 'Jim Dear',
                'type'        => 'fantasy',
                'soundex'     => 'J536',
                'metaphone'   => 'JMTR',
                'dmetaphone1' => 'JMTR',
                'dmetaphone2' => 'AMTR'
            ],
            [
                'name'        => 'Jim Hawkins',
                'type'        => 'fantasy',
                'soundex'     => 'J525',
                'metaphone'   => 'JMHKNS',
                'dmetaphone1' => 'JMKNS',
                'dmetaphone2' => 'AMKNS'
            ],
            [
                'name'        => 'Jiminy Cricket',
                'type'        => 'fantasy',
                'soundex'     => 'J552',
                'metaphone'   => 'JMNKRKT',
                'dmetaphone1' => 'JMNKRKT',
                'dmetaphone2' => 'AMNKRKT'
            ],
            [
                'name'        => 'Jimmy MacDonald',
                'type'        => 'fantasy',
                'soundex'     => 'J552',
                'metaphone'   => 'JMMKTNLT',
                'dmetaphone1' => 'JMMKTNLT',
                'dmetaphone2' => 'AMMKTNLT'
            ],
            [
                'name'        => 'Jobless Joe',
                'type'        => 'fantasy',
                'soundex'     => 'J142',
                'metaphone'   => 'JBLSJ',
                'dmetaphone1' => 'JPLSJ',
                'dmetaphone2' => 'APLSJ'
            ],
            [
                'name'        => 'Joe Camel',
                'type'        => 'fantasy',
                'soundex'     => 'J254',
                'metaphone'   => 'JKML',
                'dmetaphone1' => 'JKML',
                'dmetaphone2' => 'AKML'
            ],
            [
                'name'        => 'Joe Giraffe',
                'type'        => 'fantasy',
                'soundex'     => 'J261',
                'metaphone'   => 'JJRF',
                'dmetaphone1' => 'JJRF',
                'dmetaphone2' => 'AKRF'
            ],
            [
                'name'        => 'Joey Hippo',
                'type'        => 'fantasy',
                'soundex'     => 'J100',
                'metaphone'   => 'JHP',
                'dmetaphone1' => 'JP',
                'dmetaphone2' => 'AP'
            ],
            [
                'name'        => 'John Darling',
                'type'        => 'fantasy',
                'soundex'     => 'J536',
                'metaphone'   => 'JNTRLNK',
                'dmetaphone1' => 'JNTRLNK',
                'dmetaphone2' => 'ANTRLNK'
            ],
            [
                'name'        => 'John O\'Hurley',
                'type'        => 'fantasy',
                'soundex'     => 'J564',
                'metaphone'   => 'JNHRL',
                'dmetaphone1' => 'JNRL',
                'dmetaphone2' => 'ANRL'
            ],
            [
                'name'        => 'John Silver',
                'type'        => 'fantasy',
                'soundex'     => 'J524',
                'metaphone'   => 'JNSLFR',
                'dmetaphone1' => 'JNSLFR',
                'dmetaphone2' => 'ANSLFR'
            ],
            [
                'name'        => 'Johnny Appleseed',
                'type'        => 'fantasy',
                'soundex'     => 'J514',
                'metaphone'   => 'JNPLST',
                'dmetaphone1' => 'JNPLST',
                'dmetaphone2' => 'ANPLST'
            ],
            [
                'name'        => 'Johnny Quest',
                'type'        => 'fantasy',
                'soundex'     => 'J522',
                'metaphone'   => 'JNKST',
                'dmetaphone1' => 'JNKST',
                'dmetaphone2' => 'ANKST'
            ],
            [
                'name'        => 'Jon Walmsley',
                'type'        => 'fantasy',
                'soundex'     => 'J545',
                'metaphone'   => 'JNWLMSL',
                'dmetaphone1' => 'JNLMSL',
                'dmetaphone2' => 'ANLMSL'
            ],
            [
                'name'        => 'Joshua Keaton',
                'type'        => 'fantasy',
                'soundex'     => 'J223',
                'metaphone'   => 'JXKTN',
                'dmetaphone1' => 'JXKTN',
                'dmetaphone2' => 'AXKTN'
            ],
            [
                'name'        => 'Josie and the Pussycats',
                'type'        => 'fantasy',
                'soundex'     => 'J253',
                'metaphone'   => 'JSNT0PSKTS',
                'dmetaphone1' => 'JSNT0PSKTS',
                'dmetaphone2' => 'ASNTTPSKTS'
            ],
            [
                'name'        => 'José Carioca',
                'type'        => 'fantasy',
                'soundex'     => 'J262',
                'metaphone'   => 'JSKRK',
                'dmetaphone1' => 'JSKRK',
                'dmetaphone2' => 'ASKRK'
            ],
            [
                'name'        => 'Judge Claude Frollo',
                'type'        => 'fantasy',
                'soundex'     => 'J322',
                'metaphone'   => 'JJKLTFRL',
                'dmetaphone1' => 'JJKLTFRL',
                'dmetaphone2' => 'AJKLTFRL'
            ],
            [
                'name'        => 'Judge Doom',
                'type'        => 'fantasy',
                'soundex'     => 'J323',
                'metaphone'   => 'JJTM',
                'dmetaphone1' => 'JJTM',
                'dmetaphone2' => 'AJTM'
            ],
            [
                'name'        => 'Judy Jetson',
                'type'        => 'fantasy',
                'soundex'     => 'J323',
                'metaphone'   => 'JTJTSN',
                'dmetaphone1' => 'JTJTSN',
                'dmetaphone2' => 'ATJTSN'
            ],
            [
                'name'        => 'Judy Kuhn',
                'type'        => 'fantasy',
                'soundex'     => 'J325',
                'metaphone'   => 'JTKN',
                'dmetaphone1' => 'JTKN',
                'dmetaphone2' => 'ATKN'
            ],
            [
                'name'        => 'June Duck',
                'type'        => 'fantasy',
                'soundex'     => 'J532',
                'metaphone'   => 'JNTK',
                'dmetaphone1' => 'JNTK',
                'dmetaphone2' => 'ANTK'
            ],
            [
                'name'        => 'Junior the Buffalo',
                'type'        => 'fantasy',
                'soundex'     => 'J563',
                'metaphone'   => 'JNR0BFL',
                'dmetaphone1' => 'JNR0PFL',
                'dmetaphone2' => 'ANRTPFL'
            ],
            [
                'name'        => 'Katrina Van Tassel',
                'type'        => 'fantasy',
                'soundex'     => 'K365',
                'metaphone'   => 'KTRNFNTSL',
                'dmetaphone1' => 'KTRNFNTSL',
                'dmetaphone2' => 'KTRNFNTSL'
            ],
            [
                'name'        => 'Kekata the Medicine man',
                'type'        => 'fantasy',
                'soundex'     => 'K233',
                'metaphone'   => 'KKT0MTSNMN',
                'dmetaphone1' => 'KKT0MTSNMN',
                'dmetaphone2' => 'KKTTMTSNMN'
            ],
            [
                'name'        => 'Kevin Lima',
                'type'        => 'fantasy',
                'soundex'     => 'K154',
                'metaphone'   => 'KFNLM',
                'dmetaphone1' => 'KFNLM',
                'dmetaphone2' => 'KFNLM'
            ],
            [
                'name'        => 'King Candy/Turbo',
                'type'        => 'fantasy',
                'soundex'     => 'K525',
                'metaphone'   => 'KNKKNTTRB',
                'dmetaphone1' => 'KNKKNTTRP',
                'dmetaphone2' => 'KNKKNTTRP'
            ],
            [
                'name'        => 'King Eidilleg',
                'type'        => 'fantasy',
                'soundex'     => 'K523',
                'metaphone'   => 'KNKTLK',
                'dmetaphone1' => 'KNKTLK',
                'dmetaphone2' => 'KNKTLK'
            ],
            [
                'name'        => 'King Hubert',
                'type'        => 'fantasy',
                'soundex'     => 'K521',
                'metaphone'   => 'KNKHBRT',
                'dmetaphone1' => 'KNKPRT',
                'dmetaphone2' => 'KNKPRT'
            ],
            [
                'name'        => 'King Kashekim Nedakh',
                'type'        => 'fantasy',
                'soundex'     => 'K522',
                'metaphone'   => 'KNKKXKMNTK',
                'dmetaphone1' => 'KNKKXKMNTK',
                'dmetaphone2' => 'KNKKXKMNTK'
            ],
            [
                'name'        => 'King Leonidas',
                'type'        => 'fantasy',
                'soundex'     => 'K524',
                'metaphone'   => 'KNKLNTS',
                'dmetaphone1' => 'KNKLNTS',
                'dmetaphone2' => 'KNKLNTS'
            ],
            [
                'name'        => 'King Louie',
                'type'        => 'fantasy',
                'soundex'     => 'K524',
                'metaphone'   => 'KNKL',
                'dmetaphone1' => 'KNKL',
                'dmetaphone2' => 'KNKL'
            ],
            [
                'name'        => 'King Richard',
                'type'        => 'fantasy',
                'soundex'     => 'K526',
                'metaphone'   => 'KNKRXRT',
                'dmetaphone1' => 'KNKRXRT',
                'dmetaphone2' => 'KNKRKRT'
            ],
            [
                'name'        => 'King Roland II',
                'type'        => 'fantasy',
                'soundex'     => 'K526',
                'metaphone'   => 'KNKRLNT',
                'dmetaphone1' => 'KNKRLNT',
                'dmetaphone2' => 'KNKRLNT'
            ],
            [
                'name'        => 'King Stefan',
                'type'        => 'fantasy',
                'soundex'     => 'K523',
                'metaphone'   => 'KNKSTFN',
                'dmetaphone1' => 'KNKSTFN',
                'dmetaphone2' => 'KNKSTFN'
            ],
            [
                'name'        => 'King Triton',
                'type'        => 'fantasy',
                'soundex'     => 'K523',
                'metaphone'   => 'KNKTRTN',
                'dmetaphone1' => 'KNKTRTN',
                'dmetaphone2' => 'KNKTRTN'
            ],
            [
                'name'        => 'Kit Cloudkicker',
                'type'        => 'fantasy',
                'soundex'     => 'K324',
                'metaphone'   => 'KTKLTKKR',
                'dmetaphone1' => 'KTKLTKKR',
                'dmetaphone2' => 'KTKLTKKR'
            ],
            [
                'name'        => 'Kronk Pepikrankenitz',
                'type'        => 'fantasy',
                'soundex'     => 'K652',
                'metaphone'   => 'KRNKPPKRNKNTS',
                'dmetaphone1' => 'KRNKPPKRNKNTS',
                'dmetaphone2' => 'KRNKPPKRNKNTS'
            ],
            [
                'name'        => 'Kurt Russell',
                'type'        => 'fantasy',
                'soundex'     => 'K636',
                'metaphone'   => 'KRTRSL',
                'dmetaphone1' => 'KRTRSL',
                'dmetaphone2' => 'KRTRSL'
            ],
            [
                'name'        => 'Lady DeBurne',
                'type'        => 'fantasy',
                'soundex'     => 'L331',
                'metaphone'   => 'LTTBRN',
                'dmetaphone1' => 'LTTPRN',
                'dmetaphone2' => 'LTTPRN'
            ],
            [
                'name'        => 'Lady Kluck',
                'type'        => 'fantasy',
                'soundex'     => 'L324',
                'metaphone'   => 'LTKLK',
                'dmetaphone1' => 'LTKLK',
                'dmetaphone2' => 'LTKLK'
            ],
            [
                'name'        => 'Lady Mouse',
                'type'        => 'fantasy',
                'soundex'     => 'L352',
                'metaphone'   => 'LTMS',
                'dmetaphone1' => 'LTMS',
                'dmetaphone2' => 'LTMS'
            ],
            [
                'name'        => 'Lady Tremaine',
                'type'        => 'fantasy',
                'soundex'     => 'L336',
                'metaphone'   => 'LTTRMN',
                'dmetaphone1' => 'LTTRMN',
                'dmetaphone2' => 'LTTRMN'
            ],
            [
                'name'        => 'Lafayette the Basset Hound',
                'type'        => 'fantasy',
                'soundex'     => 'L133',
                'metaphone'   => 'LFYT0BSTHNT',
                'dmetaphone1' => 'LFT0PSTNT',
                'dmetaphone2' => 'LFTTPSTNT'
            ],
            [
                'name'        => 'Larry the Duck',
                'type'        => 'fantasy',
                'soundex'     => 'L633',
                'metaphone'   => 'LR0TK',
                'dmetaphone1' => 'LR0TK',
                'dmetaphone2' => 'LRTTK'
            ],
            [
                'name'        => 'Launchpad McQuack',
                'type'        => 'fantasy',
                'soundex'     => 'L521',
                'metaphone'   => 'LNXPTMKKK',
                'dmetaphone1' => 'LNXPTMKK',
                'dmetaphone2' => 'LNKPTMKK'
            ],
            [
                'name'        => 'Lawrence the Valet',
                'type'        => 'fantasy',
                'soundex'     => 'L652',
                'metaphone'   => 'LRNS0FLT',
                'dmetaphone1' => 'LRNS0FLT',
                'dmetaphone2' => 'LRNSTFLT'
            ],
            [
                'name'        => 'Le Fou',
                'type'        => 'fantasy',
                'soundex'     => 'L100',
                'metaphone'   => 'LF',
                'dmetaphone1' => 'LF',
                'dmetaphone2' => 'LF'
            ],
            [
                'name'        => 'Le Plufme',
                'type'        => 'fantasy',
                'soundex'     => 'L141',
                'metaphone'   => 'LPLFM',
                'dmetaphone1' => 'LPLFM',
                'dmetaphone2' => 'LPLFM'
            ],
            [
                'name'        => 'Lea Salonga',
                'type'        => 'fantasy',
                'soundex'     => 'L245',
                'metaphone'   => 'LSLNK',
                'dmetaphone1' => 'LSLNK',
                'dmetaphone2' => 'LSLNK'
            ],
            [
                'name'        => 'Li Shang',
                'type'        => 'fantasy',
                'soundex'     => 'L252',
                'metaphone'   => 'LXNK',
                'dmetaphone1' => 'LXNK',
                'dmetaphone2' => 'LXNK'
            ],
            [
                'name'        => 'Lil Bad Wolf',
                'type'        => 'fantasy',
                'soundex'     => 'L413',
                'metaphone'   => 'LLBTWLF',
                'dmetaphone1' => 'LLPTLF',
                'dmetaphone2' => 'LLPTLF'
            ],
            [
                'name'        => 'Liliana Mumy',
                'type'        => 'fantasy',
                'soundex'     => 'L455',
                'metaphone'   => 'LLNMM',
                'dmetaphone1' => 'LLNMM',
                'dmetaphone2' => 'LLNMM'
            ],
            [
                'name'        => 'Lilo Pelekai',
                'type'        => 'fantasy',
                'soundex'     => 'L414',
                'metaphone'   => 'LLPLK',
                'dmetaphone1' => 'LLPLK',
                'dmetaphone2' => 'LLPLK'
            ],
            [
                'name'        => 'Lil\' Abner',
                'type'        => 'fantasy',
                'soundex'     => 'L415',
                'metaphone'   => 'LLBNR',
                'dmetaphone1' => 'LLPNR',
                'dmetaphone2' => 'LLPNR'
            ],
            [
                'name'        => 'Little John',
                'type'        => 'fantasy',
                'soundex'     => 'L342',
                'metaphone'   => 'LTLJN',
                'dmetaphone1' => 'LTLJN',
                'dmetaphone2' => 'LTLJN'
            ],
            [
                'name'        => 'Little Toot',
                'type'        => 'fantasy',
                'soundex'     => 'L343',
                'metaphone'   => 'LTLTT',
                'dmetaphone1' => 'LTLTT',
                'dmetaphone2' => 'LTLTT'
            ],
            [
                'name'        => 'Lizzy Griffths',
                'type'        => 'fantasy',
                'soundex'     => 'L226',
                'metaphone'   => 'LSKRF0S',
                'dmetaphone1' => 'LSKRF0S',
                'dmetaphone2' => 'LSKRFTS'
            ],
            [
                'name'        => 'Lou Hirsch',
                'type'        => 'fantasy',
                'soundex'     => 'L620',
                'metaphone'   => 'LHRSX',
                'dmetaphone1' => 'LRX',
                'dmetaphone2' => 'LRX'
            ],
            [
                'name'        => 'Louie the Hot Dog Man',
                'type'        => 'fantasy',
                'soundex'     => 'L332',
                'metaphone'   => 'L0HTTKMN',
                'dmetaphone1' => 'L0TTKMN',
                'dmetaphone2' => 'LTTTKMN'
            ],
            [
                'name'        => 'Louis the Alligator',
                'type'        => 'fantasy',
                'soundex'     => 'L234',
                'metaphone'   => 'LS0LKTR',
                'dmetaphone1' => 'LS0LKTR',
                'dmetaphone2' => 'LSTLKTR'
            ],
            [
                'name'        => 'Lucifer the Cat',
                'type'        => 'fantasy',
                'soundex'     => 'L216',
                'metaphone'   => 'LSFR0KT',
                'dmetaphone1' => 'LSFR0KT',
                'dmetaphone2' => 'LSFRTKT'
            ],
            [
                'name'        => 'Lucille Krunklehorn',
                'type'        => 'fantasy',
                'soundex'     => 'L242',
                'metaphone'   => 'LSLKRNKLHRN',
                'dmetaphone1' => 'LSLKRNKLHRN',
                'dmetaphone2' => 'LSLKRNKLHRN'
            ],
            [
                'name'        => 'Lucky Jack',
                'type'        => 'fantasy',
                'soundex'     => 'L222',
                'metaphone'   => 'LKJK',
                'dmetaphone1' => 'LKJK',
                'dmetaphone2' => 'LKJK'
            ],
            [
                'name'        => 'Ludwig Von Drake',
                'type'        => 'fantasy',
                'soundex'     => 'L321',
                'metaphone'   => 'LTWKFNTRK',
                'dmetaphone1' => 'LTKFNTRK',
                'dmetaphone2' => 'LTKFNTRK'
            ],
            [
                'name'        => 'Lumpy the Heffalump',
                'type'        => 'fantasy',
                'soundex'     => 'L513',
                'metaphone'   => 'LMP0HFLMP',
                'dmetaphone1' => 'LMP0FLMP',
                'dmetaphone2' => 'LMPTFLMP'
            ],
            [
                'name'        => 'Ma Beagle',
                'type'        => 'fantasy',
                'soundex'     => 'M124',
                'metaphone'   => 'MBKL',
                'dmetaphone1' => 'MPKL',
                'dmetaphone2' => 'MPKL'
            ],
            [
                'name'        => 'Mad Hatter',
                'type'        => 'fantasy',
                'soundex'     => 'M336',
                'metaphone'   => 'MTHTR',
                'dmetaphone1' => 'MTTR',
                'dmetaphone2' => 'MTTR'
            ],
            [
                'name'        => 'Madam Mim',
                'type'        => 'fantasy',
                'soundex'     => 'M355',
                'metaphone'   => 'MTMMM',
                'dmetaphone1' => 'MTMMM',
                'dmetaphone2' => 'MTMMM'
            ],
            [
                'name'        => 'Madame Adelaide Bonfamille',
                'type'        => 'fantasy',
                'soundex'     => 'M353',
                'metaphone'   => 'MTMTLTBNFML',
                'dmetaphone1' => 'MTMTLTPNFML',
                'dmetaphone2' => 'MTMTLTPNFML'
            ],
            [
                'name'        => 'Madame Medusa',
                'type'        => 'fantasy',
                'soundex'     => 'M355',
                'metaphone'   => 'MTMMTS',
                'dmetaphone1' => 'MTMMTS',
                'dmetaphone2' => 'MTMMTS'
            ],
            [
                'name'        => 'Madame Upanova',
                'type'        => 'fantasy',
                'soundex'     => 'M351',
                'metaphone'   => 'MTMPNF',
                'dmetaphone1' => 'MTMPNF',
                'dmetaphone2' => 'MTMPNF'
            ],
            [
                'name'        => 'Magic Carpet',
                'type'        => 'fantasy',
                'soundex'     => 'M226',
                'metaphone'   => 'MJKKRPT',
                'dmetaphone1' => 'MJKRPT',
                'dmetaphone2' => 'MKKRPT'
            ],
            [
                'name'        => 'Magica De Spell',
                'type'        => 'fantasy',
                'soundex'     => 'M223',
                'metaphone'   => 'MJKTSPL',
                'dmetaphone1' => 'MJKTSPL',
                'dmetaphone2' => 'MKKTSPL'
            ],
            [
                'name'        => 'Magilla Gorilla',
                'type'        => 'fantasy',
                'soundex'     => 'M242',
                'metaphone'   => 'MJLKRL',
                'dmetaphone1' => 'MJLKRL',
                'dmetaphone2' => 'MKLKR'
            ],
            [
                'name'        => 'Mahra the Baboon',
                'type'        => 'fantasy',
                'soundex'     => 'M631',
                'metaphone'   => 'MR0BBN',
                'dmetaphone1' => 'MR0PPN',
                'dmetaphone2' => 'MRTPPN'
            ],
            [
                'name'        => 'Maid Marian',
                'type'        => 'fantasy',
                'soundex'     => 'M356',
                'metaphone'   => 'MTMRN',
                'dmetaphone1' => 'MTMRN',
                'dmetaphone2' => 'MTMRN'
            ],
            [
                'name'        => 'Major the Horse',
                'type'        => 'fantasy',
                'soundex'     => 'M263',
                'metaphone'   => 'MJR0HRS',
                'dmetaphone1' => 'MJR0RS',
                'dmetaphone2' => 'MHRTRS'
            ],
            [
                'name'        => 'Mama Odie',
                'type'        => 'fantasy',
                'soundex'     => 'M530',
                'metaphone'   => 'MMT',
                'dmetaphone1' => 'MMT',
                'dmetaphone2' => 'MMT'
            ],
            [
                'name'        => 'Man the Hunter',
                'type'        => 'fantasy',
                'soundex'     => 'M535',
                'metaphone'   => 'MN0HNTR',
                'dmetaphone1' => 'MN0NTR',
                'dmetaphone2' => 'MNTNTR'
            ],
            [
                'name'        => 'Marcellite Garner',
                'type'        => 'fantasy',
                'soundex'     => 'M624',
                'metaphone'   => 'MRSLTKRNR',
                'dmetaphone1' => 'MRSLTKRNR',
                'dmetaphone2' => 'MRSLTKRNR'
            ],
            [
                'name'        => 'March Hare',
                'type'        => 'fantasy',
                'soundex'     => 'M626',
                'metaphone'   => 'MRXHR',
                'dmetaphone1' => 'MRXR',
                'dmetaphone2' => 'MRKR'
            ],
            [
                'name'        => 'Marlon the Alligator',
                'type'        => 'fantasy',
                'soundex'     => 'M645',
                'metaphone'   => 'MRLN0LKTR',
                'dmetaphone1' => 'MRLN0LKTR',
                'dmetaphone2' => 'MRLNTLKTR'
            ],
            [
                'name'        => 'Marvin the Martain',
                'type'        => 'fantasy',
                'soundex'     => 'M615',
                'metaphone'   => 'MRFN0MRTN',
                'dmetaphone1' => 'MRFN0MRTN',
                'dmetaphone2' => 'MRFNTMRTN'
            ],
            [
                'name'        => 'Mary Darling',
                'type'        => 'fantasy',
                'soundex'     => 'M636',
                'metaphone'   => 'MRTRLNK',
                'dmetaphone1' => 'MRTRLNK',
                'dmetaphone2' => 'MRTRLNK'
            ],
            [
                'name'        => 'Matt Frewer',
                'type'        => 'fantasy',
                'soundex'     => 'M316',
                'metaphone'   => 'MTFRWR',
                'dmetaphone1' => 'MTFRR',
                'dmetaphone2' => 'MTFRR'
            ],
            [
                'name'        => 'Matthew Broderick',
                'type'        => 'fantasy',
                'soundex'     => 'M316',
                'metaphone'   => 'MTBRTRK',
                'dmetaphone1' => 'M0PRTRK',
                'dmetaphone2' => 'MTPRTRK'
            ],
            [
                'name'        => 'Matthew Joston',
                'type'        => 'fantasy',
                'soundex'     => 'M322',
                'metaphone'   => 'MTJSTN',
                'dmetaphone1' => 'M0JSTN',
                'dmetaphone2' => 'MTJSTN'
            ],
            [
                'name'        => 'Max Goof',
                'type'        => 'fantasy',
                'soundex'     => 'M210',
                'metaphone'   => 'MKSKF',
                'dmetaphone1' => 'MKSKF',
                'dmetaphone2' => 'MKSKF'
            ],
            [
                'name'        => 'Max Hare',
                'type'        => 'fantasy',
                'soundex'     => 'M260',
                'metaphone'   => 'MKSHR',
                'dmetaphone1' => 'MKSR',
                'dmetaphone2' => 'MKSR'
            ],
            [
                'name'        => 'Max the Sheepdog',
                'type'        => 'fantasy',
                'soundex'     => 'M232',
                'metaphone'   => 'MKS0XPTK',
                'dmetaphone1' => 'MKS0XPTK',
                'dmetaphone2' => 'MKSTXPTK'
            ],
            [
                'name'        => 'May Duck',
                'type'        => 'fantasy',
                'soundex'     => 'M320',
                'metaphone'   => 'MTK',
                'dmetaphone1' => 'MTK',
                'dmetaphone2' => 'MTK'
            ],
            [
                'name'        => 'Megabyte Beagle',
                'type'        => 'fantasy',
                'soundex'     => 'M213',
                'metaphone'   => 'MKBTBKL',
                'dmetaphone1' => 'MKPTPKL',
                'dmetaphone2' => 'MKPTPKL'
            ],
            [
                'name'        => 'Merlock the Magician',
                'type'        => 'fantasy',
                'soundex'     => 'M642',
                'metaphone'   => 'MRLK0MJXN',
                'dmetaphone1' => 'MRLK0MJSN',
                'dmetaphone2' => 'MRLKTMKXN'
            ],
            [
                'name'        => 'Michael Darling',
                'type'        => 'fantasy',
                'soundex'     => 'M243',
                'metaphone'   => 'MXLTRLNK',
                'dmetaphone1' => 'MKLTRLNK',
                'dmetaphone2' => 'MXLTRLNK'
            ],
            [
                'name'        => 'Michael Gough',
                'type'        => 'fantasy',
                'soundex'     => 'M242',
                'metaphone'   => 'MXLKF',
                'dmetaphone1' => 'MKLKF',
                'dmetaphone2' => 'MXLKF'
            ],
            [
                'name'        => 'Mickey Mouse',
                'type'        => 'fantasy',
                'soundex'     => 'M252',
                'metaphone'   => 'MKMS',
                'dmetaphone1' => 'MKMS',
                'dmetaphone2' => 'MKMS'
            ],
            [
                'name'        => 'Mickey Rooney',
                'type'        => 'fantasy',
                'soundex'     => 'M265',
                'metaphone'   => 'MKRN',
                'dmetaphone1' => 'MKRN',
                'dmetaphone2' => 'MKRN'
            ],
            [
                'name'        => 'Mighty Mouse',
                'type'        => 'fantasy',
                'soundex'     => 'M235',
                'metaphone'   => 'MFTMS',
                'dmetaphone1' => 'MTMS',
                'dmetaphone2' => 'MTMS'
            ],
            [
                'name'        => 'Mike the Microphone',
                'type'        => 'fantasy',
                'soundex'     => 'M235',
                'metaphone'   => 'MK0MKRFN',
                'dmetaphone1' => 'MK0MKRFN',
                'dmetaphone2' => 'MKTMKRFN'
            ],
            [
                'name'        => 'Milo Thatch',
                'type'        => 'fantasy',
                'soundex'     => 'M433',
                'metaphone'   => 'ML0X',
                'dmetaphone1' => 'ML0X',
                'dmetaphone2' => 'MLTX'
            ],
            [
                'name'        => 'Minnie Mouse',
                'type'        => 'fantasy',
                'soundex'     => 'M552',
                'metaphone'   => 'MNMS',
                'dmetaphone1' => 'MNMS',
                'dmetaphone2' => 'MNMS'
            ],
            [
                'name'        => 'Miranda Wright',
                'type'        => 'fantasy',
                'soundex'     => 'M653',
                'metaphone'   => 'MRNTRFT',
                'dmetaphone1' => 'MRNTRT',
                'dmetaphone2' => 'MRNTRT'
            ],
            [
                'name'        => 'Miss Bianca',
                'type'        => 'fantasy',
                'soundex'     => 'M215',
                'metaphone'   => 'MSBNK',
                'dmetaphone1' => 'MSPNK',
                'dmetaphone2' => 'MSPNK'
            ],
            [
                'name'        => 'Miss Kitty',
                'type'        => 'fantasy',
                'soundex'     => 'M230',
                'metaphone'   => 'MSKT',
                'dmetaphone1' => 'MSKT',
                'dmetaphone2' => 'MSKT'
            ],
            [
                'name'        => 'Miss Nettle',
                'type'        => 'fantasy',
                'soundex'     => 'M253',
                'metaphone'   => 'MSNTL',
                'dmetaphone1' => 'MSNTL',
                'dmetaphone2' => 'MSNTL'
            ],
            [
                'name'        => 'Mona Marshall',
                'type'        => 'fantasy',
                'soundex'     => 'M556',
                'metaphone'   => 'MNMRXL',
                'dmetaphone1' => 'MNMRXL',
                'dmetaphone2' => 'MNMRXL'
            ],
            [
                'name'        => 'Monsieur D\'Arque',
                'type'        => 'fantasy',
                'soundex'     => 'M526',
                'metaphone'   => 'MNSRTRK',
                'dmetaphone1' => 'MNSRTRK',
                'dmetaphone2' => 'MNSRTRK'
            ],
            [
                'name'        => 'Monterey Jack',
                'type'        => 'fantasy',
                'soundex'     => 'M536',
                'metaphone'   => 'MNTRJK',
                'dmetaphone1' => 'MNTRJK',
                'dmetaphone2' => 'MNTRJK'
            ],
            [
                'name'        => 'Morcupine Porcupine',
                'type'        => 'fantasy',
                'soundex'     => 'M621',
                'metaphone'   => 'MRKPNPRKPN',
                'dmetaphone1' => 'MRKPNPRKPN',
                'dmetaphone2' => 'MRKPNPRKPN'
            ],
            [
                'name'        => 'Morgana McCawber',
                'type'        => 'fantasy',
                'soundex'     => 'M625',
                'metaphone'   => 'MRKNMKKBR',
                'dmetaphone1' => 'MRKNMKPR',
                'dmetaphone2' => 'MRKNMKPR'
            ],
            [
                'name'        => 'Mortimer Mouse',
                'type'        => 'fantasy',
                'soundex'     => 'M635',
                'metaphone'   => 'MRTMRMS',
                'dmetaphone1' => 'MRTMRMS',
                'dmetaphone2' => 'MRTMRMS'
            ],
            [
                'name'        => 'Morty Fieldmouse',
                'type'        => 'fantasy',
                'soundex'     => 'M631',
                'metaphone'   => 'MRTFLTMS',
                'dmetaphone1' => 'MRTFLTMS',
                'dmetaphone2' => 'MRTFLTMS'
            ],
            [
                'name'        => 'Mother Gothel',
                'type'        => 'fantasy',
                'soundex'     => 'M362',
                'metaphone'   => 'M0RK0L',
                'dmetaphone1' => 'M0RK0L',
                'dmetaphone2' => 'MTRKTL'
            ],
            [
                'name'        => 'Mother Rabbit',
                'type'        => 'fantasy',
                'soundex'     => 'M361',
                'metaphone'   => 'M0RRBT',
                'dmetaphone1' => 'M0RRPT',
                'dmetaphone2' => 'MTRRPT'
            ],
            [
                'name'        => 'Mr. Arrow',
                'type'        => 'fantasy',
                'soundex'     => 'M660',
                'metaphone'   => 'MRR',
                'dmetaphone1' => 'MRR',
                'dmetaphone2' => 'MRRF'
            ],
            [
                'name'        => 'Mr. Kool-Aid',
                'type'        => 'fantasy',
                'soundex'     => 'M624',
                'metaphone'   => 'MRKLT',
                'dmetaphone1' => 'MRKLT',
                'dmetaphone2' => 'MRKLT'
            ],
            [
                'name'        => 'Mr. Litwak',
                'type'        => 'fantasy',
                'soundex'     => 'M643',
                'metaphone'   => 'MRLTWK',
                'dmetaphone1' => 'MRLTK',
                'dmetaphone2' => 'MRLTK'
            ],
            [
                'name'        => 'Mr. Magoo',
                'type'        => 'fantasy',
                'soundex'     => 'M652',
                'metaphone'   => 'MRMK',
                'dmetaphone1' => 'MRMK',
                'dmetaphone2' => 'MRMK'
            ],
            [
                'name'        => 'Mr. Pettibone',
                'type'        => 'fantasy',
                'soundex'     => 'M613',
                'metaphone'   => 'MRPTBN',
                'dmetaphone1' => 'MRPTPN',
                'dmetaphone2' => 'MRPTPN'
            ],
            [
                'name'        => 'Mr. Smee',
                'type'        => 'fantasy',
                'soundex'     => 'M625',
                'metaphone'   => 'MRSM',
                'dmetaphone1' => 'MRSM',
                'dmetaphone2' => 'MRSM'
            ],
            [
                'name'        => 'Mr. Snoops',
                'type'        => 'fantasy',
                'soundex'     => 'M625',
                'metaphone'   => 'MRSNPS',
                'dmetaphone1' => 'MRSNPS',
                'dmetaphone2' => 'MRSNPS'
            ],
            [
                'name'        => 'Mr. Stork',
                'type'        => 'fantasy',
                'soundex'     => 'M623',
                'metaphone'   => 'MRSTRK',
                'dmetaphone1' => 'MRSTRK',
                'dmetaphone2' => 'MRSTRK'
            ],
            [
                'name'        => 'Mr. Willerstein',
                'type'        => 'fantasy',
                'soundex'     => 'M646',
                'metaphone'   => 'MRWLRSTN',
                'dmetaphone1' => 'MRLRSTN',
                'dmetaphone2' => 'MRLRSTN'
            ],
            [
                'name'        => 'Mr. Woolensworth',
                'type'        => 'fantasy',
                'soundex'     => 'M645',
                'metaphone'   => 'MRWLNSWR0',
                'dmetaphone1' => 'MRLNSR0',
                'dmetaphone2' => 'MRLNSRT'
            ],
            [
                'name'        => 'Mrs. Calloway',
                'type'        => 'fantasy',
                'soundex'     => 'M624',
                'metaphone'   => 'MRSKLW',
                'dmetaphone1' => 'MRSKL',
                'dmetaphone2' => 'MRSKL'
            ],
            [
                'name'        => 'Mrs. Featherby',
                'type'        => 'fantasy',
                'soundex'     => 'M621',
                'metaphone'   => 'MRSF0RB',
                'dmetaphone1' => 'MRSF0RP',
                'dmetaphone2' => 'MRSFTRP'
            ],
            [
                'name'        => 'Mrs. Hasagawa',
                'type'        => 'fantasy',
                'soundex'     => 'M622',
                'metaphone'   => 'MRSHSKW',
                'dmetaphone1' => 'MRSSK',
                'dmetaphone2' => 'MRSSK'
            ],
            [
                'name'        => 'Mrs. Judson',
                'type'        => 'fantasy',
                'soundex'     => 'M623',
                'metaphone'   => 'MRSJTSN',
                'dmetaphone1' => 'MRSJTSN',
                'dmetaphone2' => 'MRSJTSN'
            ],
            [
                'name'        => 'Mrs. Jumbo',
                'type'        => 'fantasy',
                'soundex'     => 'M625',
                'metaphone'   => 'MRSJM',
                'dmetaphone1' => 'MRSJMP',
                'dmetaphone2' => 'MRSJMP'
            ],
            [
                'name'        => 'Mrs. Possum',
                'type'        => 'fantasy',
                'soundex'     => 'M621',
                'metaphone'   => 'MRSPSM',
                'dmetaphone1' => 'MRSPSM',
                'dmetaphone2' => 'MRSPSM'
            ],
            [
                'name'        => 'Mrs. Potts',
                'type'        => 'fantasy',
                'soundex'     => 'M621',
                'metaphone'   => 'MRSPTS',
                'dmetaphone1' => 'MRSPTS',
                'dmetaphone2' => 'MRSPTS'
            ],
            [
                'name'        => 'Mrs. Quail',
                'type'        => 'fantasy',
                'soundex'     => 'M624',
                'metaphone'   => 'MRSKL',
                'dmetaphone1' => 'MRSKL',
                'dmetaphone2' => 'MRSKL'
            ],
            [
                'name'        => 'Myrtle Edmonds',
                'type'        => 'fantasy',
                'soundex'     => 'M634',
                'metaphone'   => 'MRTLTMNTS',
                'dmetaphone1' => 'MRTLTMNTS',
                'dmetaphone2' => 'MRTLTMNTS'
            ],
            [
                'name'        => 'Nancy Tremaine',
                'type'        => 'fantasy',
                'soundex'     => 'N523',
                'metaphone'   => 'NNSTRMN',
                'dmetaphone1' => 'NNSTRMN',
                'dmetaphone2' => 'NNSTRMN'
            ],
            [
                'name'        => 'Nani Pelekai',
                'type'        => 'fantasy',
                'soundex'     => 'N514',
                'metaphone'   => 'NNPLK',
                'dmetaphone1' => 'NNPLK',
                'dmetaphone2' => 'NNPLK'
            ],
            [
                'name'        => 'Napoleon the Bloodhound',
                'type'        => 'fantasy',
                'soundex'     => 'N145',
                'metaphone'   => 'NPLN0BLTHNT',
                'dmetaphone1' => 'NPLN0PLTNT',
                'dmetaphone2' => 'NPLNTPLTNT'
            ],
            [
                'name'        => 'Natasha Fatale',
                'type'        => 'fantasy',
                'soundex'     => 'N321',
                'metaphone'   => 'NTXFTL',
                'dmetaphone1' => 'NTXFTL',
                'dmetaphone2' => 'NTXFTL'
            ],
            [
                'name'        => 'Ned the Baboon',
                'type'        => 'fantasy',
                'soundex'     => 'N311',
                'metaphone'   => 'NT0BBN',
                'dmetaphone1' => 'NT0PPN',
                'dmetaphone2' => 'NTTPPN'
            ],
            [
                'name'        => 'Neve Campbell',
                'type'        => 'fantasy',
                'soundex'     => 'N125',
                'metaphone'   => 'NFKMPBL',
                'dmetaphone1' => 'NFKMPL',
                'dmetaphone2' => 'NFKMPL'
            ],
            [
                'name'        => 'Niketa Calame',
                'type'        => 'fantasy',
                'soundex'     => 'N232',
                'metaphone'   => 'NKTKLM',
                'dmetaphone1' => 'NKTKLM',
                'dmetaphone2' => 'NKTKLM'
            ],
            [
                'name'        => 'Norville Rogers',
                'type'        => 'fantasy',
                'soundex'     => 'N614',
                'metaphone'   => 'NRFLRJRS',
                'dmetaphone1' => 'NRFLRKRS',
                'dmetaphone2' => 'NRFLRJRS'
            ],
            [
                'name'        => 'Nurse Mouse',
                'type'        => 'fantasy',
                'soundex'     => 'N625',
                'metaphone'   => 'NRSMS',
                'dmetaphone1' => 'NRSMS',
                'dmetaphone2' => 'NRSMS'
            ],
            [
                'name'        => 'Nutsy the Vulture',
                'type'        => 'fantasy',
                'soundex'     => 'N323',
                'metaphone'   => 'NTS0FLTR',
                'dmetaphone1' => 'NTS0FLTR',
                'dmetaphone2' => 'NTSTFLTR'
            ],
            [
                'name'        => 'Olive Oyl',
                'type'        => 'fantasy',
                'soundex'     => 'O414',
                'metaphone'   => 'OLFL',
                'dmetaphone1' => 'ALFL',
                'dmetaphone2' => 'ALFL'
            ],
            [
                'name'        => 'Olivia Flaversham',
                'type'        => 'fantasy',
                'soundex'     => 'O411',
                'metaphone'   => 'OLFFLFRXM',
                'dmetaphone1' => 'ALFFLFRXM',
                'dmetaphone2' => 'ALFFLFRXM'
            ],
            [
                'name'        => 'Ollie the Pig',
                'type'        => 'fantasy',
                'soundex'     => 'O431',
                'metaphone'   => 'OL0PK',
                'dmetaphone1' => 'AL0PK',
                'dmetaphone2' => 'ALTPK'
            ],
            [
                'name'        => 'Oswald the Lucky Rabbit',
                'type'        => 'fantasy',
                'soundex'     => 'O243',
                'metaphone'   => 'OSWLT0LKRBT',
                'dmetaphone1' => 'ASLT0LKRPT',
                'dmetaphone2' => 'ASLTTLKRPT'
            ],
            [
                'name'        => 'Pain and Panic',
                'type'        => 'fantasy',
                'soundex'     => 'P553',
                'metaphone'   => 'PNNTPNK',
                'dmetaphone1' => 'PNNTPNK',
                'dmetaphone2' => 'PNNTPNK'
            ],
            [
                'name'        => 'Panchito Pistoles',
                'type'        => 'fantasy',
                'soundex'     => 'P523',
                'metaphone'   => 'PNXTPSTLS',
                'dmetaphone1' => 'PNXTPSTLS',
                'dmetaphone2' => 'PNKTPSTLS'
            ],
            [
                'name'        => 'Patrick Star',
                'type'        => 'fantasy',
                'soundex'     => 'P362',
                'metaphone'   => 'PTRKSTR',
                'dmetaphone1' => 'PTRKSTR',
                'dmetaphone2' => 'PTRKSTR'
            ],
            [
                'name'        => 'Pearl Gesner',
                'type'        => 'fantasy',
                'soundex'     => 'P642',
                'metaphone'   => 'PRLJSNR',
                'dmetaphone1' => 'PRLJSNR',
                'dmetaphone2' => 'PRLKSNR'
            ],
            [
                'name'        => 'Peg Pete',
                'type'        => 'fantasy',
                'soundex'     => 'P213',
                'metaphone'   => 'PKPT',
                'dmetaphone1' => 'PKPT',
                'dmetaphone2' => 'PKPT'
            ],
            [
                'name'        => 'Penelope Pitstop',
                'type'        => 'fantasy',
                'soundex'     => 'P541',
                'metaphone'   => 'PNLPPTSTP',
                'dmetaphone1' => 'PNLPPTSTP',
                'dmetaphone2' => 'PNLPPTSTP'
            ],
            [
                'name'        => 'Penny\'s Mom',
                'type'        => 'fantasy',
                'soundex'     => 'P525',
                'metaphone'   => 'PNSMM',
                'dmetaphone1' => 'PNSMM',
                'dmetaphone2' => 'PNSMM'
            ],
            [
                'name'        => 'Pepe Le Pew',
                'type'        => 'fantasy',
                'soundex'     => 'P141',
                'metaphone'   => 'PPLP',
                'dmetaphone1' => 'PPLP',
                'dmetaphone2' => 'PPLPF'
            ],
            [
                'name'        => 'Pepper Ann Pearson',
                'type'        => 'fantasy',
                'soundex'     => 'P165',
                'metaphone'   => 'PPRNPRSN',
                'dmetaphone1' => 'PPRNPRSN',
                'dmetaphone2' => 'PPRNPRSN'
            ],
            [
                'name'        => 'Peppo the Italian Cat',
                'type'        => 'fantasy',
                'soundex'     => 'P133',
                'metaphone'   => 'PP0TLNKT',
                'dmetaphone1' => 'PP0TLNKT',
                'dmetaphone2' => 'PPTTLNKT'
            ],
            [
                'name'        => 'Percival C. McLeach',
                'type'        => 'fantasy',
                'soundex'     => 'P621',
                'metaphone'   => 'PRSFLKMKLX',
                'dmetaphone1' => 'PRSFLKMKLK',
                'dmetaphone2' => 'PRSFLKMKLK'
            ],
            [
                'name'        => 'Pete Junior',
                'type'        => 'fantasy',
                'soundex'     => 'P325',
                'metaphone'   => 'PTJNR',
                'dmetaphone1' => 'PTJNR',
                'dmetaphone2' => 'PTJNR'
            ],
            [
                'name'        => 'Peter Pan',
                'type'        => 'fantasy',
                'soundex'     => 'P361',
                'metaphone'   => 'PTRPN',
                'dmetaphone1' => 'PTRPN',
                'dmetaphone2' => 'PTRPN'
            ],
            [
                'name'        => 'Peter Pig',
                'type'        => 'fantasy',
                'soundex'     => 'P361',
                'metaphone'   => 'PTRPK',
                'dmetaphone1' => 'PTRPK',
                'dmetaphone2' => 'PTRPK'
            ],
            [
                'name'        => 'Philippe the Horse',
                'type'        => 'fantasy',
                'soundex'     => 'P413',
                'metaphone'   => 'FLP0HRS',
                'dmetaphone1' => 'FLP0RS',
                'dmetaphone2' => 'FLPTRS'
            ],
            [
                'name'        => 'Pink Panther',
                'type'        => 'fantasy',
                'soundex'     => 'P521',
                'metaphone'   => 'PNKPN0R',
                'dmetaphone1' => 'PNKPN0R',
                'dmetaphone2' => 'PNKPNTR'
            ],
            [
                'name'        => 'Pistol Pete',
                'type'        => 'fantasy',
                'soundex'     => 'P234',
                'metaphone'   => 'PSTLPT',
                'dmetaphone1' => 'PSTLPT',
                'dmetaphone2' => 'PSTLPT'
            ],
            [
                'name'        => 'Poe De Spell',
                'type'        => 'fantasy',
                'soundex'     => 'P321',
                'metaphone'   => 'PTSPL',
                'dmetaphone1' => 'PTSPL',
                'dmetaphone2' => 'PTSPL'
            ],
            [
                'name'        => 'Porky Pig',
                'type'        => 'fantasy',
                'soundex'     => 'P621',
                'metaphone'   => 'PRKPK',
                'dmetaphone1' => 'PRKPK',
                'dmetaphone2' => 'PRKPK'
            ],
            [
                'name'        => 'Practical Pig',
                'type'        => 'fantasy',
                'soundex'     => 'P623',
                'metaphone'   => 'PRKTKLPK',
                'dmetaphone1' => 'PRKTKLPK',
                'dmetaphone2' => 'PRKTKLPK'
            ],
            [
                'name'        => 'Preston B. Whitmore',
                'type'        => 'fantasy',
                'soundex'     => 'P623',
                'metaphone'   => 'PRSTNBHTMR',
                'dmetaphone1' => 'PRSTNPTMR',
                'dmetaphone2' => 'PRSTNPTMR'
            ],
            [
                'name'        => 'Prince Charming',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSXRMNK',
                'dmetaphone1' => 'PRNSXRMNK',
                'dmetaphone2' => 'PRNSKRMNK'
            ],
            [
                'name'        => 'Prince Edward',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSTWRT',
                'dmetaphone1' => 'PRNSTRT',
                'dmetaphone2' => 'PRNSTRT'
            ],
            [
                'name'        => 'Prince Eric',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSRK',
                'dmetaphone1' => 'PRNSRK',
                'dmetaphone2' => 'PRNSRK'
            ],
            [
                'name'        => 'Prince Hans',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSHNS',
                'dmetaphone1' => 'PRNSNS',
                'dmetaphone2' => 'PRNSNS'
            ],
            [
                'name'        => 'Prince James',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSJMS',
                'dmetaphone1' => 'PRNSJMS',
                'dmetaphone2' => 'PRNSJMS'
            ],
            [
                'name'        => 'Prince John',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSJN',
                'dmetaphone1' => 'PRNSJN',
                'dmetaphone2' => 'PRNSJN'
            ],
            [
                'name'        => 'Prince Naveen',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSNFN',
                'dmetaphone1' => 'PRNSNFN',
                'dmetaphone2' => 'PRNSNFN'
            ],
            [
                'name'        => 'Prince Phillip',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSFLP',
                'dmetaphone1' => 'PRNSFLP',
                'dmetaphone2' => 'PRNSFLP'
            ],
            [
                'name'        => 'Princess Amber',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSSMR',
                'dmetaphone1' => 'PRNSSMPR',
                'dmetaphone2' => 'PRNSSMPR'
            ],
            [
                'name'        => 'Princess Eilonwy',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSSLN',
                'dmetaphone1' => 'PRNSSLN',
                'dmetaphone2' => 'PRNSSLN'
            ],
            [
                'name'        => 'Princess Jasmine',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSSJSMN',
                'dmetaphone1' => 'PRNSSJSMN',
                'dmetaphone2' => 'PRNSSJSMN'
            ],
            [
                'name'        => 'Princess Kidagakash',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSSKTKKX',
                'dmetaphone1' => 'PRNSSKTKKX',
                'dmetaphone2' => 'PRNSSKTKKX'
            ],
            [
                'name'        => 'Princess Sofia',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSSSF',
                'dmetaphone1' => 'PRNSSSF',
                'dmetaphone2' => 'PRNSSSF'
            ],
            [
                'name'        => 'Principal Mazur',
                'type'        => 'fantasy',
                'soundex'     => 'P652',
                'metaphone'   => 'PRNSPLMSR',
                'dmetaphone1' => 'PRNSPLMSR',
                'dmetaphone2' => 'PRNSPLMSR'
            ],
            [
                'name'        => 'Prissy the Elephant',
                'type'        => 'fantasy',
                'soundex'     => 'P623',
                'metaphone'   => 'PRS0LFNT',
                'dmetaphone1' => 'PRS0LFNT',
                'dmetaphone2' => 'PRSTLFNT'
            ],
            [
                'name'        => 'Professor Norton Nimnul',
                'type'        => 'fantasy',
                'soundex'     => 'P612',
                'metaphone'   => 'PRFSRNRTNNMNL',
                'dmetaphone1' => 'PRFSRNRTNNMNL',
                'dmetaphone2' => 'PRFSRNRTNNMNL'
            ],
            [
                'name'        => 'Professor Ratigan',
                'type'        => 'fantasy',
                'soundex'     => 'P612',
                'metaphone'   => 'PRFSRRTKN',
                'dmetaphone1' => 'PRFSRRTKN',
                'dmetaphone2' => 'PRFSRRTKN'
            ],
            [
                'name'        => 'Psycho the Weasel',
                'type'        => 'fantasy',
                'soundex'     => 'P223',
                'metaphone'   => 'PSX0WSL',
                'dmetaphone1' => 'SX0SL',
                'dmetaphone2' => 'SKTSL'
            ],
            [
                'name'        => 'Queen Athena',
                'type'        => 'fantasy',
                'soundex'     => 'Q535',
                'metaphone'   => 'KN0N',
                'dmetaphone1' => 'KN0N',
                'dmetaphone2' => 'KNTN'
            ],
            [
                'name'        => 'Queen Clarion',
                'type'        => 'fantasy',
                'soundex'     => 'Q524',
                'metaphone'   => 'KNKLRN',
                'dmetaphone1' => 'KNKLRN',
                'dmetaphone2' => 'KNKLRN'
            ],
            [
                'name'        => 'Queen Grimhilde',
                'type'        => 'fantasy',
                'soundex'     => 'Q526',
                'metaphone'   => 'KNKRMHLT',
                'dmetaphone1' => 'KNKRMLT',
                'dmetaphone2' => 'KNKRMLT'
            ],
            [
                'name'        => 'Queen Leah',
                'type'        => 'fantasy',
                'soundex'     => 'Q540',
                'metaphone'   => 'KNL',
                'dmetaphone1' => 'KNL',
                'dmetaphone2' => 'KNL'
            ],
            [
                'name'        => 'Queen Miranda',
                'type'        => 'fantasy',
                'soundex'     => 'Q565',
                'metaphone'   => 'KNMRNT',
                'dmetaphone1' => 'KNMRNT',
                'dmetaphone2' => 'KNMRNT'
            ],
            [
                'name'        => 'Queen Mousetoria',
                'type'        => 'fantasy',
                'soundex'     => 'Q523',
                'metaphone'   => 'KNMSTR',
                'dmetaphone1' => 'KNMSTR',
                'dmetaphone2' => 'KNMSTR'
            ],
            [
                'name'        => 'Queen Narissa',
                'type'        => 'fantasy',
                'soundex'     => 'Q562',
                'metaphone'   => 'KNNRS',
                'dmetaphone1' => 'KNNRS',
                'dmetaphone2' => 'KNNRS'
            ],
            [
                'name'        => 'Ray the Firefly',
                'type'        => 'fantasy',
                'soundex'     => 'R316',
                'metaphone'   => 'R0FRFL',
                'dmetaphone1' => 'R0FRFL',
                'dmetaphone2' => 'RTFRFL'
            ],
            [
                'name'        => 'Red Hot',
                'type'        => 'fantasy',
                'soundex'     => 'R330',
                'metaphone'   => 'RTHT',
                'dmetaphone1' => 'RTT',
                'dmetaphone2' => 'RTT'
            ],
            [
                'name'        => 'Ren and Stimpy',
                'type'        => 'fantasy',
                'soundex'     => 'R553',
                'metaphone'   => 'RNNTSTMP',
                'dmetaphone1' => 'RNNTSTMP',
                'dmetaphone2' => 'RNNTSTMP'
            ],
            [
                'name'        => 'Rhoda Dendron',
                'type'        => 'fantasy',
                'soundex'     => 'R335',
                'metaphone'   => 'RHTTNTRN',
                'dmetaphone1' => 'RTTNTRN',
                'dmetaphone2' => 'RTTNTRN'
            ],
            [
                'name'        => 'Richard Reitherman',
                'type'        => 'fantasy',
                'soundex'     => 'R263',
                'metaphone'   => 'RXRTR0RMN',
                'dmetaphone1' => 'RXRTR0RMN',
                'dmetaphone2' => 'RKRTRTRMN'
            ],
            [
                'name'        => 'Richie Rich',
                'type'        => 'fantasy',
                'soundex'     => 'R262',
                'metaphone'   => 'RXRX',
                'dmetaphone1' => 'RXRX',
                'dmetaphone2' => 'RKRK'
            ],
            [
                'name'        => 'Road Runner',
                'type'        => 'fantasy',
                'soundex'     => 'R365',
                'metaphone'   => 'RTRNR',
                'dmetaphone1' => 'RTRNR',
                'dmetaphone2' => 'RTRNR'
            ],
            [
                'name'        => 'Rob Paulsen',
                'type'        => 'fantasy',
                'soundex'     => 'R142',
                'metaphone'   => 'RBPLSN',
                'dmetaphone1' => 'RPPLSN',
                'dmetaphone2' => 'RPPLSN'
            ],
            [
                'name'        => 'Robert "Bobby" Zimmeruski',
                'type'        => 'fantasy',
                'soundex'     => 'R163',
                'metaphone'   => 'RBRTBBSMRSK',
                'dmetaphone1' => 'RPRTPPSMRSK',
                'dmetaphone2' => 'RPRTPPTSMRSK'
            ],
            [
                'name'        => 'Robert Reitherman',
                'type'        => 'fantasy',
                'soundex'     => 'R163',
                'metaphone'   => 'RBRTR0RMN',
                'dmetaphone1' => 'RPRTR0RMN',
                'dmetaphone2' => 'RPRTRTRMN'
            ],
            [
                'name'        => 'Robin Hood',
                'type'        => 'fantasy',
                'soundex'     => 'R153',
                'metaphone'   => 'RBNHT',
                'dmetaphone1' => 'RPNT',
                'dmetaphone2' => 'RPNT'
            ],
            [
                'name'        => 'Roger Rabbit',
                'type'        => 'fantasy',
                'soundex'     => 'R261',
                'metaphone'   => 'RJRRBT',
                'dmetaphone1' => 'RKRRPT',
                'dmetaphone2' => 'RJRRPT'
            ],
            [
                'name'        => 'Roger Radcliffe',
                'type'        => 'fantasy',
                'soundex'     => 'R263',
                'metaphone'   => 'RJRRTKLF',
                'dmetaphone1' => 'RKRRTKLF',
                'dmetaphone2' => 'RJRRTKLF'
            ],
            [
                'name'        => 'Roquefort the Mouse',
                'type'        => 'fantasy',
                'soundex'     => 'R216',
                'metaphone'   => 'RKFRT0MS',
                'dmetaphone1' => 'RKFRT0MS',
                'dmetaphone2' => 'RKFRTTMS'
            ],
            [
                'name'        => 'Runt of the Litter',
                'type'        => 'fantasy',
                'soundex'     => 'R531',
                'metaphone'   => 'RNTF0LTR',
                'dmetaphone1' => 'RNTF0LTR',
                'dmetaphone2' => 'RNTFTLTR'
            ],
            [
                'name'        => 'Russi Taylor',
                'type'        => 'fantasy',
                'soundex'     => 'R234',
                'metaphone'   => 'RSTLR',
                'dmetaphone1' => 'RSTLR',
                'dmetaphone2' => 'RSTLR'
            ],
            [
                'name'        => 'Rusty the Dog',
                'type'        => 'fantasy',
                'soundex'     => 'R233',
                'metaphone'   => 'RST0TK',
                'dmetaphone1' => 'RST0TK',
                'dmetaphone2' => 'RSTTTK'
            ],
            [
                'name'        => 'Rutt and Tuke',
                'type'        => 'fantasy',
                'soundex'     => 'R353',
                'metaphone'   => 'RTNTTK',
                'dmetaphone1' => 'RTNTTK',
                'dmetaphone2' => 'RTNTTK'
            ],
            [
                'name'        => 'Sad Sack',
                'type'        => 'fantasy',
                'soundex'     => 'S322',
                'metaphone'   => 'STSK',
                'dmetaphone1' => 'STSK',
                'dmetaphone2' => 'STSK'
            ],
            [
                'name'        => 'Sam Edwards',
                'type'        => 'fantasy',
                'soundex'     => 'S536',
                'metaphone'   => 'SMTWRTS',
                'dmetaphone1' => 'SMTRTS',
                'dmetaphone2' => 'SMTRTS'
            ],
            [
                'name'        => 'Sam Flynn',
                'type'        => 'fantasy',
                'soundex'     => 'S514',
                'metaphone'   => 'SMFLN',
                'dmetaphone1' => 'SMFLN',
                'dmetaphone2' => 'SMFLN'
            ],
            [
                'name'        => 'Sam the Sheriff',
                'type'        => 'fantasy',
                'soundex'     => 'S532',
                'metaphone'   => 'SM0XRF',
                'dmetaphone1' => 'SM0XRF',
                'dmetaphone2' => 'SMTXRF'
            ],
            [
                'name'        => 'Sarah Hawkins',
                'type'        => 'fantasy',
                'soundex'     => 'S625',
                'metaphone'   => 'SRHKNS',
                'dmetaphone1' => 'SRKNS',
                'dmetaphone2' => 'SRKNS'
            ],
            [
                'name'        => 'Scat Cat',
                'type'        => 'fantasy',
                'soundex'     => 'S323',
                'metaphone'   => 'SKTKT',
                'dmetaphone1' => 'SKTKT',
                'dmetaphone2' => 'SKTKT'
            ],
            [
                'name'        => 'Scooby Doo',
                'type'        => 'fantasy',
                'soundex'     => 'S130',
                'metaphone'   => 'SKBT',
                'dmetaphone1' => 'SKPT',
                'dmetaphone2' => 'SKPT'
            ],
            [
                'name'        => 'Scrooge McDuck',
                'type'        => 'fantasy',
                'soundex'     => 'S625',
                'metaphone'   => 'SKRJMKTK',
                'dmetaphone1' => 'SKJMKTK',
                'dmetaphone2' => 'SKKMKTK'
            ],
            [
                'name'        => 'Secret Squirrel',
                'type'        => 'fantasy',
                'soundex'     => 'S263',
                'metaphone'   => 'SKRTSKRL',
                'dmetaphone1' => 'SKRTSKRL',
                'dmetaphone2' => 'SKRTSKRL'
            ],
            [
                'name'        => 'Secretary Bird',
                'type'        => 'fantasy',
                'soundex'     => 'S263',
                'metaphone'   => 'SKRTRBRT',
                'dmetaphone1' => 'SKRTRPRT',
                'dmetaphone2' => 'SKRTRPRT'
            ],
            [
                'name'        => 'Sergeant Calhoun',
                'type'        => 'fantasy',
                'soundex'     => 'S625',
                'metaphone'   => 'SRJNTKLHN',
                'dmetaphone1' => 'SRJNTKLN',
                'dmetaphone2' => 'SRKNTKLN'
            ],
            [
                'name'        => 'Sgt. Tibbs',
                'type'        => 'fantasy',
                'soundex'     => 'S312',
                'metaphone'   => 'SKTTBS',
                'dmetaphone1' => 'SKTTPS',
                'dmetaphone2' => 'SKTTPS'
            ],
            [
                'name'        => 'Shan Yu',
                'type'        => 'fantasy',
                'soundex'     => 'S500',
                'metaphone'   => 'XNY',
                'dmetaphone1' => 'XN',
                'dmetaphone2' => 'XN'
            ],
            [
                'name'        => 'Sheldon Plankton',
                'type'        => 'fantasy',
                'soundex'     => 'S435',
                'metaphone'   => 'XLTNPLNKTN',
                'dmetaphone1' => 'XLTNPLNKTN',
                'dmetaphone2' => 'XLTNPLNKTN'
            ],
            [
                'name'        => 'Shere Khan',
                'type'        => 'fantasy',
                'soundex'     => 'S625',
                'metaphone'   => 'XRKHN',
                'dmetaphone1' => 'XRKN',
                'dmetaphone2' => 'XRKN'
            ],
            [
                'name'        => 'Sheriff of Nottingham',
                'type'        => 'fantasy',
                'soundex'     => 'S611',
                'metaphone'   => 'XRFFNTNFM',
                'dmetaphone1' => 'XRFFNTNKM',
                'dmetaphone2' => 'XRFFNTNKM'
            ],
            [
                'name'        => 'Shun Gon the Chinese Cat',
                'type'        => 'fantasy',
                'soundex'     => 'S525',
                'metaphone'   => 'XNKN0XNSKT',
                'dmetaphone1' => 'XNKN0XNSKT',
                'dmetaphone2' => 'XNKNTKNSKT'
            ],
            [
                'name'        => 'Si & Am',
                'type'        => 'fantasy',
                'soundex'     => 'S500',
                'metaphone'   => 'SM',
                'dmetaphone1' => 'SM',
                'dmetaphone2' => 'SM'
            ],
            [
                'name'        => 'Sir Ector',
                'type'        => 'fantasy',
                'soundex'     => 'S623',
                'metaphone'   => 'SRKTR',
                'dmetaphone1' => 'SRKTR',
                'dmetaphone2' => 'SRKTR'
            ],
            [
                'name'        => 'Sir Giles',
                'type'        => 'fantasy',
                'soundex'     => 'S624',
                'metaphone'   => 'SRJLS',
                'dmetaphone1' => 'SRJLS',
                'dmetaphone2' => 'SRKLS'
            ],
            [
                'name'        => 'Sir Hiss',
                'type'        => 'fantasy',
                'soundex'     => 'S620',
                'metaphone'   => 'SRHS',
                'dmetaphone1' => 'SRS',
                'dmetaphone2' => 'SRS'
            ],
            [
                'name'        => 'Sir Kay',
                'type'        => 'fantasy',
                'soundex'     => 'S620',
                'metaphone'   => 'SRK',
                'dmetaphone1' => 'SRK',
                'dmetaphone2' => 'SRK'
            ],
            [
                'name'        => 'Sir Pellinore',
                'type'        => 'fantasy',
                'soundex'     => 'S614',
                'metaphone'   => 'SRPLNR',
                'dmetaphone1' => 'SRPLNR',
                'dmetaphone2' => 'SRPLNR'
            ],
            [
                'name'        => 'Sis Bunny',
                'type'        => 'fantasy',
                'soundex'     => 'S215',
                'metaphone'   => 'SSBN',
                'dmetaphone1' => 'SSPN',
                'dmetaphone2' => 'SSPN'
            ],
            [
                'name'        => 'Skippy Bunny',
                'type'        => 'fantasy',
                'soundex'     => 'S115',
                'metaphone'   => 'SKPBN',
                'dmetaphone1' => 'SKPPN',
                'dmetaphone2' => 'SKPPN'
            ],
            [
                'name'        => 'Smarty the Weasel',
                'type'        => 'fantasy',
                'soundex'     => 'S563',
                'metaphone'   => 'SMRT0WSL',
                'dmetaphone1' => 'SMRT0SL',
                'dmetaphone2' => 'XMRTTSL'
            ],
            [
                'name'        => 'Smolder the Bear',
                'type'        => 'fantasy',
                'soundex'     => 'S543',
                'metaphone'   => 'SMLTR0BR',
                'dmetaphone1' => 'SMLTR0PR',
                'dmetaphone2' => 'XMLTRTPR'
            ],
            [
                'name'        => 'Snap, Crackle and Pop',
                'type'        => 'fantasy',
                'soundex'     => 'S512',
                'metaphone'   => 'SNPKRKLNTPP',
                'dmetaphone1' => 'SNPKRKLNTPP',
                'dmetaphone2' => 'XNPKRKLNTPP'
            ],
            [
                'name'        => 'Snidely Whiplash',
                'type'        => 'fantasy',
                'soundex'     => 'S534',
                'metaphone'   => 'SNTLHPLX',
                'dmetaphone1' => 'SNTLPLX',
                'dmetaphone2' => 'XNTLPLX'
            ],
            [
                'name'        => 'Snow White',
                'type'        => 'fantasy',
                'soundex'     => 'S530',
                'metaphone'   => 'SNHT',
                'dmetaphone1' => 'SNT',
                'dmetaphone2' => 'XNT'
            ],
            [
                'name'        => 'Sour Bill',
                'type'        => 'fantasy',
                'soundex'     => 'S614',
                'metaphone'   => 'SRBL',
                'dmetaphone1' => 'SRPL',
                'dmetaphone2' => 'SRPL'
            ],
            [
                'name'        => 'Speed Buggy',
                'type'        => 'fantasy',
                'soundex'     => 'S131',
                'metaphone'   => 'SPTBK',
                'dmetaphone1' => 'SPTPK',
                'dmetaphone2' => 'SPTPK'
            ],
            [
                'name'        => 'Speed Racer',
                'type'        => 'fantasy',
                'soundex'     => 'S136',
                'metaphone'   => 'SPTRSR',
                'dmetaphone1' => 'SPTRSR',
                'dmetaphone2' => 'SPTRSR'
            ],
            [
                'name'        => 'Speedy Gonzales',
                'type'        => 'fantasy',
                'soundex'     => 'S132',
                'metaphone'   => 'SPTKNSLS',
                'dmetaphone1' => 'SPTKNSLS',
                'dmetaphone2' => 'SPTKNSLS'
            ],
            [
                'name'        => 'Speedy the Snail',
                'type'        => 'fantasy',
                'soundex'     => 'S133',
                'metaphone'   => 'SPT0SNL',
                'dmetaphone1' => 'SPT0SNL',
                'dmetaphone2' => 'SPTTSNL'
            ],
            [
                'name'        => 'SpongeBob SquarePants',
                'type'        => 'fantasy',
                'soundex'     => 'S152',
                'metaphone'   => 'SPNJBBSKRPNTS',
                'dmetaphone1' => 'SPNJPPSKRPNTS',
                'dmetaphone2' => 'SPNKPPSKRPNTS'
            ],
            [
                'name'        => 'Spring Sprite',
                'type'        => 'fantasy',
                'soundex'     => 'S165',
                'metaphone'   => 'SPRNKSPRT',
                'dmetaphone1' => 'SPRNKSPRT',
                'dmetaphone2' => 'SPRNKSPRT'
            ],
            [
                'name'        => 'Squeaks the Caterpillar',
                'type'        => 'fantasy',
                'soundex'     => 'S232',
                'metaphone'   => 'SKKS0KTRPLR',
                'dmetaphone1' => 'SKKS0KTRPLR',
                'dmetaphone2' => 'SKKSTKTRPLR'
            ],
            [
                'name'        => 'Squiddly Diddly',
                'type'        => 'fantasy',
                'soundex'     => 'S343',
                'metaphone'   => 'SKTLTTL',
                'dmetaphone1' => 'SKTLTTL',
                'dmetaphone2' => 'SKTLTTL'
            ],
            [
                'name'        => 'Squidward Tentacles',
                'type'        => 'fantasy',
                'soundex'     => 'S363',
                'metaphone'   => 'SKTWRTTNTKLS',
                'dmetaphone1' => 'SKTRTTNTKLS',
                'dmetaphone2' => 'SKTRTTNTKLS'
            ],
            [
                'name'        => 'Stabbington Brothers',
                'type'        => 'fantasy',
                'soundex'     => 'S315',
                'metaphone'   => 'STBNKTNBR0RS',
                'dmetaphone1' => 'STPNKTNPR0RS',
                'dmetaphone2' => 'STPNKTNPRTRS'
            ],
            [
                'name'        => 'Sterling Holloway',
                'type'        => 'fantasy',
                'soundex'     => 'S364',
                'metaphone'   => 'STRLNKHLW',
                'dmetaphone1' => 'STRLNKL',
                'dmetaphone2' => 'STRLNKL'
            ],
            [
                'name'        => 'Strawberry Shortcake',
                'type'        => 'fantasy',
                'soundex'     => 'S361',
                'metaphone'   => 'STRBRXRTKK',
                'dmetaphone1' => 'STRPRXRTKK',
                'dmetaphone2' => 'STRPRXRTKK'
            ],
            [
                'name'        => 'Stupid the Weasel',
                'type'        => 'fantasy',
                'soundex'     => 'S313',
                'metaphone'   => 'STPT0WSL',
                'dmetaphone1' => 'STPT0SL',
                'dmetaphone2' => 'STPTTSL'
            ],
            [
                'name'        => 'Sultan the Footstool',
                'type'        => 'fantasy',
                'soundex'     => 'S435',
                'metaphone'   => 'SLTN0FTSTL',
                'dmetaphone1' => 'SLTN0FTSTL',
                'dmetaphone2' => 'SLTNTFTSTL'
            ],
            [
                'name'        => 'Susanne Blakeslee',
                'type'        => 'fantasy',
                'soundex'     => 'S251',
                'metaphone'   => 'SSNBLKSL',
                'dmetaphone1' => 'SSNPLKSL',
                'dmetaphone2' => 'SSNPLKSL'
            ],
            [
                'name'        => 'Sweet Pea',
                'type'        => 'fantasy',
                'soundex'     => 'S310',
                'metaphone'   => 'SWTP',
                'dmetaphone1' => 'STP',
                'dmetaphone2' => 'XTP'
            ],
            [
                'name'        => 'Sylvia Marpole',
                'type'        => 'fantasy',
                'soundex'     => 'S415',
                'metaphone'   => 'SLFMRPL',
                'dmetaphone1' => 'SLFMRPL',
                'dmetaphone2' => 'SLFMRPL'
            ],
            [
                'name'        => 'Tadashi Hamada',
                'type'        => 'fantasy',
                'soundex'     => 'T325',
                'metaphone'   => 'TTXHMT',
                'dmetaphone1' => 'TTXMT',
                'dmetaphone2' => 'TTXMT'
            ],
            [
                'name'        => 'Taffyta Muttonfudge',
                'type'        => 'fantasy',
                'soundex'     => 'T135',
                'metaphone'   => 'TFTMTNFJ',
                'dmetaphone1' => 'TFTMTNFJ',
                'dmetaphone2' => 'TFTMTNFJ'
            ],
            [
                'name'        => 'Tagalong Bunny',
                'type'        => 'fantasy',
                'soundex'     => 'T245',
                'metaphone'   => 'TKLNKBN',
                'dmetaphone1' => 'TKLNKPN',
                'dmetaphone2' => 'TKLNKPN'
            ],
            [
                'name'        => 'Tank Muddlefoot',
                'type'        => 'fantasy',
                'soundex'     => 'T525',
                'metaphone'   => 'TNKMTLFT',
                'dmetaphone1' => 'TNKMTLFT',
                'dmetaphone2' => 'TNKMTLFT'
            ],
            [
                'name'        => 'Tasmanian Devil',
                'type'        => 'fantasy',
                'soundex'     => 'T255',
                'metaphone'   => 'TSMNNTFL',
                'dmetaphone1' => 'TSMNNTFL',
                'dmetaphone2' => 'TSMNNTFL'
            ],
            [
                'name'        => 'Taurus Bulba',
                'type'        => 'fantasy',
                'soundex'     => 'T621',
                'metaphone'   => 'TRSBLB',
                'dmetaphone1' => 'TRSPLP',
                'dmetaphone2' => 'TRSPLP'
            ],
            [
                'name'        => 'Ted Betterhead',
                'type'        => 'fantasy',
                'soundex'     => 'T313',
                'metaphone'   => 'TTBTRHT',
                'dmetaphone1' => 'TTPTRT',
                'dmetaphone2' => 'TTPTRT'
            ],
            [
                'name'        => 'The Agent',
                'type'        => 'fantasy',
                'soundex'     => 'T253',
                'metaphone'   => '0JNT',
                'dmetaphone1' => '0JNT',
                'dmetaphone2' => 'TKNT'
            ],
            [
                'name'        => 'The Archdeacon',
                'type'        => 'fantasy',
                'soundex'     => 'T623',
                'metaphone'   => '0RXTKN',
                'dmetaphone1' => '0RXTKN',
                'dmetaphone2' => 'TRKTKN'
            ],
            [
                'name'        => 'The Captain',
                'type'        => 'fantasy',
                'soundex'     => 'T213',
                'metaphone'   => '0KPTN',
                'dmetaphone1' => '0KPTN',
                'dmetaphone2' => 'TKPTN'
            ],
            [
                'name'        => 'The Carpenter',
                'type'        => 'fantasy',
                'soundex'     => 'T261',
                'metaphone'   => '0KRPNTR',
                'dmetaphone1' => '0KRPNTR',
                'dmetaphone2' => 'TKRPNTR'
            ],
            [
                'name'        => 'The Caterpillar',
                'type'        => 'fantasy',
                'soundex'     => 'T236',
                'metaphone'   => '0KTRPLR',
                'dmetaphone1' => '0KTRPLR',
                'dmetaphone2' => 'TKTRPLR'
            ],
            [
                'name'        => 'The Coachman',
                'type'        => 'fantasy',
                'soundex'     => 'T225',
                'metaphone'   => '0KXMN',
                'dmetaphone1' => '0KKMN',
                'dmetaphone2' => 'TKKMN'
            ],
            [
                'name'        => 'The Colonel',
                'type'        => 'fantasy',
                'soundex'     => 'T245',
                'metaphone'   => '0KLNL',
                'dmetaphone1' => '0KLNL',
                'dmetaphone2' => 'TKLNL'
            ],
            [
                'name'        => 'The Director',
                'type'        => 'fantasy',
                'soundex'     => 'T362',
                'metaphone'   => '0TRKTR',
                'dmetaphone1' => '0TRKTR',
                'dmetaphone2' => 'TTRKTR'
            ],
            [
                'name'        => 'The Dodo',
                'type'        => 'fantasy',
                'soundex'     => 'T330',
                'metaphone'   => '0TT',
                'dmetaphone1' => '0TT',
                'dmetaphone2' => 'TTT'
            ],
            [
                'name'        => 'The Dog Catcher',
                'type'        => 'fantasy',
                'soundex'     => 'T323',
                'metaphone'   => '0TKKXR',
                'dmetaphone1' => '0TKKXR',
                'dmetaphone2' => 'TTKKXR'
            ],
            [
                'name'        => 'The Doorknob',
                'type'        => 'fantasy',
                'soundex'     => 'T362',
                'metaphone'   => '0TRKNB',
                'dmetaphone1' => '0TRKNP',
                'dmetaphone2' => 'TTRKNP'
            ],
            [
                'name'        => 'The Doorman',
                'type'        => 'fantasy',
                'soundex'     => 'T365',
                'metaphone'   => '0TRMN',
                'dmetaphone1' => '0TRMN',
                'dmetaphone2' => 'TTRMN'
            ],
            [
                'name'        => 'The Dormouse',
                'type'        => 'fantasy',
                'soundex'     => 'T365',
                'metaphone'   => '0TRMS',
                'dmetaphone1' => '0TRMS',
                'dmetaphone2' => 'TTRMS'
            ],
            [
                'name'        => 'The Enchantress',
                'type'        => 'fantasy',
                'soundex'     => 'T525',
                'metaphone'   => '0NXNTRS',
                'dmetaphone1' => '0NXNTRS',
                'dmetaphone2' => 'TNKNTRS'
            ],
            [
                'name'        => 'The Firebird',
                'type'        => 'fantasy',
                'soundex'     => 'T161',
                'metaphone'   => '0FRBRT',
                'dmetaphone1' => '0FRPRT',
                'dmetaphone2' => 'TFRPRT'
            ],
            [
                'name'        => 'The Grand Duke',
                'type'        => 'fantasy',
                'soundex'     => 'T265',
                'metaphone'   => '0KRNTTK',
                'dmetaphone1' => '0KRNTTK',
                'dmetaphone2' => 'TKRNTTK'
            ],
            [
                'name'        => 'The Great Gazoo',
                'type'        => 'fantasy',
                'soundex'     => 'T263',
                'metaphone'   => '0KRTKS',
                'dmetaphone1' => '0KRTKS',
                'dmetaphone2' => 'TKRTKS'
            ],
            [
                'name'        => 'The Groundhog',
                'type'        => 'fantasy',
                'soundex'     => 'T265',
                'metaphone'   => '0KRNTHK',
                'dmetaphone1' => '0KRNTK',
                'dmetaphone2' => 'TKRNTK'
            ],
            [
                'name'        => 'The Horned King',
                'type'        => 'fantasy',
                'soundex'     => 'T653',
                'metaphone'   => '0HRNTKNK',
                'dmetaphone1' => '0RNTKNK',
                'dmetaphone2' => 'TRNTKNK'
            ],
            [
                'name'        => 'The Indian Chief',
                'type'        => 'fantasy',
                'soundex'     => 'T535',
                'metaphone'   => '0NTNXF',
                'dmetaphone1' => '0NTNXF',
                'dmetaphone2' => 'TNTNKF'
            ],
            [
                'name'        => 'The King',
                'type'        => 'fantasy',
                'soundex'     => 'T252',
                'metaphone'   => '0KNK',
                'dmetaphone1' => '0KNK',
                'dmetaphone2' => 'TKNK'
            ],
            [
                'name'        => 'The King of Hearts',
                'type'        => 'fantasy',
                'soundex'     => 'T252',
                'metaphone'   => '0KNKFHRTS',
                'dmetaphone1' => '0KNKFRTS',
                'dmetaphone2' => 'TKNKFRTS'
            ],
            [
                'name'        => 'The Liquidator',
                'type'        => 'fantasy',
                'soundex'     => 'T423',
                'metaphone'   => '0LKTTR',
                'dmetaphone1' => '0LKTTR',
                'dmetaphone2' => 'TLKTTR'
            ],
            [
                'name'        => 'The Magic Mirror',
                'type'        => 'fantasy',
                'soundex'     => 'T522',
                'metaphone'   => '0MJKMRR',
                'dmetaphone1' => '0MJKMRR',
                'dmetaphone2' => 'TMKKMRR'
            ],
            [
                'name'        => 'The Matchmaker',
                'type'        => 'fantasy',
                'soundex'     => 'T532',
                'metaphone'   => '0MXMKR',
                'dmetaphone1' => '0MXMKR',
                'dmetaphone2' => 'TMXMKR'
            ],
            [
                'name'        => 'The Octopus',
                'type'        => 'fantasy',
                'soundex'     => 'T231',
                'metaphone'   => '0KTPS',
                'dmetaphone1' => '0KTPS',
                'dmetaphone2' => 'TKTPS'
            ],
            [
                'name'        => 'The Phantom Blot',
                'type'        => 'fantasy',
                'soundex'     => 'T153',
                'metaphone'   => '0FNTMBLT',
                'dmetaphone1' => '0FNTMPLT',
                'dmetaphone2' => 'TFNTMPLT'
            ],
            [
                'name'        => 'The Professor',
                'type'        => 'fantasy',
                'soundex'     => 'T161',
                'metaphone'   => '0PRFSR',
                'dmetaphone1' => '0PRFSR',
                'dmetaphone2' => 'TPRFSR'
            ],
            [
                'name'        => 'The Queen of Hearts',
                'type'        => 'fantasy',
                'soundex'     => 'T251',
                'metaphone'   => '0KNFHRTS',
                'dmetaphone1' => '0KNFRTS',
                'dmetaphone2' => 'TKNFRTS'
            ],
            [
                'name'        => 'The Ringmaster',
                'type'        => 'fantasy',
                'soundex'     => 'T652',
                'metaphone'   => '0RNKMSTR',
                'dmetaphone1' => '0RNKMSTR',
                'dmetaphone2' => 'TRNKMSTR'
            ],
            [
                'name'        => 'The Rose',
                'type'        => 'fantasy',
                'soundex'     => 'T620',
                'metaphone'   => '0RS',
                'dmetaphone1' => '0RS',
                'dmetaphone2' => 'TRS'
            ],
            [
                'name'        => 'The Sultan',
                'type'        => 'fantasy',
                'soundex'     => 'T243',
                'metaphone'   => '0SLTN',
                'dmetaphone1' => '0SLTN',
                'dmetaphone2' => 'TSLTN'
            ],
            [
                'name'        => 'The Walrus',
                'type'        => 'fantasy',
                'soundex'     => 'T462',
                'metaphone'   => '0WLRS',
                'dmetaphone1' => '0LRS',
                'dmetaphone2' => 'TLRS'
            ],
            [
                'name'        => 'Thomas O'Malley',
                'type'        => 'fantasy',
                'soundex'     => 'T525',
                'metaphone'   => '0MSML',
                'dmetaphone1' => 'TMSML',
                'dmetaphone2' => 'TMSML'
            ],
            [
                'name'        => 'Thumper's Mother',
                'type'        => 'fantasy',
                'soundex'     => 'T516',
                'metaphone'   => '0MPRSM0R',
                'dmetaphone1' => '0MPRSM0R',
                'dmetaphone2' => 'TMPRSMTR'
            ],
            [
                'name'        => 'Tick Tock',
                'type'        => 'fantasy',
                'soundex'     => 'T232',
                'metaphone'   => 'TKTK',
                'dmetaphone1' => 'TKTK',
                'dmetaphone2' => 'TKTK'
            ],
            [
                'name'        => 'Tiger Lily',
                'type'        => 'fantasy',
                'soundex'     => 'T264',
                'metaphone'   => 'TJRLL',
                'dmetaphone1' => 'TJRLL',
                'dmetaphone2' => 'TKRLL'
            ],
            [
                'name'        => 'Tillie Tiger',
                'type'        => 'fantasy',
                'soundex'     => 'T432',
                'metaphone'   => 'TLTJR',
                'dmetaphone1' => 'TLTJR',
                'dmetaphone2' => 'TLTKR'
            ],
            [
                'name'        => 'Timon\'s Mother',
                'type'        => 'fantasy',
                'soundex'     => 'T552',
                'metaphone'   => 'TMNSM0R',
                'dmetaphone1' => 'TMNSM0R',
                'dmetaphone2' => 'TMNSMTR'
            ],
            [
                'name'        => 'Timothy Q. Mouse',
                'type'        => 'fantasy',
                'soundex'     => 'T532',
                'metaphone'   => 'TM0KMS',
                'dmetaphone1' => 'TM0KMS',
                'dmetaphone2' => 'TMTKMS'
            ],
            [
                'name'        => 'Timothy Turner',
                'type'        => 'fantasy',
                'soundex'     => 'T533',
                'metaphone'   => 'TM0TRNR',
                'dmetaphone1' => 'TM0TRNR',
                'dmetaphone2' => 'TMTTRNR'
            ],
            [
                'name'        => 'Tinker Bell',
                'type'        => 'fantasy',
                'soundex'     => 'T526',
                'metaphone'   => 'TNKRBL',
                'dmetaphone1' => 'TNKRPL',
                'dmetaphone2' => 'TNKRPL'
            ],
            [
                'name'        => 'Tino Tonitini',
                'type'        => 'fantasy',
                'soundex'     => 'T535',
                'metaphone'   => 'TNTNTN',
                'dmetaphone1' => 'TNTNTN',
                'dmetaphone2' => 'TNTNTN'
            ],
            [
                'name'        => 'Tobias the Reluctant Dragon',
                'type'        => 'fantasy',
                'soundex'     => 'T123',
                'metaphone'   => 'TBS0RLKTNTTRKN',
                'dmetaphone1' => 'TPS0RLKTNTTRKN',
                'dmetaphone2' => 'TPSTRLKTNTTRKN'
            ],
            [
                'name'        => 'Toby the Dog',
                'type'        => 'fantasy',
                'soundex'     => 'T133',
                'metaphone'   => 'TB0TK',
                'dmetaphone1' => 'TP0TK',
                'dmetaphone2' => 'TPTTK'
            ],
            [
                'name'        => 'Toby Tortoise',
                'type'        => 'fantasy',
                'soundex'     => 'T136',
                'metaphone'   => 'TBTRTS',
                'dmetaphone1' => 'TPTRTS',
                'dmetaphone2' => 'TPTRTS'
            ],
            [
                'name'        => 'Toby Turtle',
                'type'        => 'fantasy',
                'soundex'     => 'T136',
                'metaphone'   => 'TBTRTL',
                'dmetaphone1' => 'TPTRTL',
                'dmetaphone2' => 'TPTRTL'
            ],
            [
                'name'        => 'Tom and Jerry',
                'type'        => 'fantasy',
                'soundex'     => 'T553',
                'metaphone'   => 'TMNTJR',
                'dmetaphone1' => 'TMNTJR',
                'dmetaphone2' => 'TMNTJR'
            ],
            [
                'name'        => 'Tom Terrific',
                'type'        => 'fantasy',
                'soundex'     => 'T536',
                'metaphone'   => 'TMTRFK',
                'dmetaphone1' => 'TMTRFK',
                'dmetaphone2' => 'TMTRFK'
            ],
            [
                'name'        => 'Tony Anselmo',
                'type'        => 'fantasy',
                'soundex'     => 'T552',
                'metaphone'   => 'TNNSLM',
                'dmetaphone1' => 'TNNSLM',
                'dmetaphone2' => 'TNNSLM'
            ],
            [
                'name'        => 'Tony Tiger',
                'type'        => 'fantasy',
                'soundex'     => 'T532',
                'metaphone'   => 'TNTJR',
                'dmetaphone1' => 'TNTJR',
                'dmetaphone2' => 'TNTKR'
            ],
            [
                'name'        => 'Toucan Sam',
                'type'        => 'fantasy',
                'soundex'     => 'T252',
                'metaphone'   => 'TKNSM',
                'dmetaphone1' => 'TKNSM',
                'dmetaphone2' => 'TKNSM'
            ],
            [
                'name'        => 'Trigger the Vulture',
                'type'        => 'fantasy',
                'soundex'     => 'T626',
                'metaphone'   => 'TRKR0FLTR',
                'dmetaphone1' => 'TRKR0FLTR',
                'dmetaphone2' => 'TRKRTFLTR'
            ],
            [
                'name'        => 'Turkey Lurkey',
                'type'        => 'fantasy',
                'soundex'     => 'T624',
                'metaphone'   => 'TRKLRK',
                'dmetaphone1' => 'TRKLRK',
                'dmetaphone2' => 'TRKLRK'
            ],
            [
                'name'        => 'Tweedledum and Tweedledee',
                'type'        => 'fantasy',
                'soundex'     => 'T343',
                'metaphone'   => 'TWTLTMNTTWTLT',
                'dmetaphone1' => 'TTLTMNTTTLT',
                'dmetaphone2' => 'TTLTMNTTTLT'
            ],
            [
                'name'        => 'Tweety Bird',
                'type'        => 'fantasy',
                'soundex'     => 'T316',
                'metaphone'   => 'TWTBRT',
                'dmetaphone1' => 'TTPRT',
                'dmetaphone2' => 'TTPRT'
            ],
            [
                'name'        => 'Two Fingers',
                'type'        => 'fantasy',
                'soundex'     => 'T152',
                'metaphone'   => 'TWFNJRS',
                'dmetaphone1' => 'TFNKRS',
                'dmetaphone2' => 'TFNJRS'
            ],
            [
                'name'        => 'Uncle Art',
                'type'        => 'fantasy',
                'soundex'     => 'U524',
                'metaphone'   => 'UNKLRT',
                'dmetaphone1' => 'ANKLRT',
                'dmetaphone2' => 'ANKLRT'
            ],
            [
                'name'        => 'Uncle Max',
                'type'        => 'fantasy',
                'soundex'     => 'U524',
                'metaphone'   => 'UNKLMKS',
                'dmetaphone1' => 'ANKLMKS',
                'dmetaphone2' => 'ANKLMKS'
            ],
            [
                'name'        => 'Uncle Waldo',
                'type'        => 'fantasy',
                'soundex'     => 'U524',
                'metaphone'   => 'UNKLWLT',
                'dmetaphone1' => 'ANKLLT',
                'dmetaphone2' => 'ANKLLT'
            ],
            [
                'name'        => 'Vanellope von Schweetz',
                'type'        => 'fantasy',
                'soundex'     => 'V541',
                'metaphone'   => 'FNLPFNSXWTS',
                'dmetaphone1' => 'FNLPFNXTS',
                'dmetaphone2' => 'FNLPFNXTS'
            ],
            [
                'name'        => 'Veteran Cat',
                'type'        => 'fantasy',
                'soundex'     => 'V365',
                'metaphone'   => 'FTRNKT',
                'dmetaphone1' => 'FTRNKT',
                'dmetaphone2' => 'FTRNKT'
            ],
            [
                'name'        => 'Vincenzo "Vinny" Santorini',
                'type'        => 'fantasy',
                'soundex'     => 'V525',
                'metaphone'   => 'FNSNSFNSNTRN',
                'dmetaphone1' => 'FNSNSFNSNTRN',
                'dmetaphone2' => 'FNSNSFNSNTRN'
            ],
            [
                'name'        => 'Vladimir Goudenov Grizzlikof',
                'type'        => 'fantasy',
                'soundex'     => 'V435',
                'metaphone'   => 'FLTMRKTNFKRSLKF',
                'dmetaphone1' => 'FLTMRKTNFKRSLKF',
                'dmetaphone2' => 'FLTMRKTNFKRTSLKF'
            ],
            [
                'name'        => 'Vulture Police',
                'type'        => 'fantasy',
                'soundex'     => 'V436',
                'metaphone'   => 'FLTRPLS',
                'dmetaphone1' => 'FLTRPLS',
                'dmetaphone2' => 'FLTRPLS'
            ],
            [
                'name'        => 'Wakko Warner',
                'type'        => 'fantasy',
                'soundex'     => 'W265',
                'metaphone'   => 'WKWRNR',
                'dmetaphone1' => 'AKRNR',
                'dmetaphone2' => 'FKRNR'
            ],
            [
                'name'        => 'Wayne Allwine',
                'type'        => 'fantasy',
                'soundex'     => 'W545',
                'metaphone'   => 'WNLWN',
                'dmetaphone1' => 'ANLN',
                'dmetaphone2' => 'FNLN'
            ],
            [
                'name'        => 'Webby Vanderquack',
                'type'        => 'fantasy',
                'soundex'     => 'W115',
                'metaphone'   => 'WBFNTRKK',
                'dmetaphone1' => 'APFNTRKK',
                'dmetaphone2' => 'FPFNTRKK'
            ],
            [
                'name'        => 'Wendy Darling',
                'type'        => 'fantasy',
                'soundex'     => 'W533',
                'metaphone'   => 'WNTTRLNK',
                'dmetaphone1' => 'ANTTRLNK',
                'dmetaphone2' => 'FNTTRLNK'
            ],
            [
                'name'        => 'Wheezy the Weasel',
                'type'        => 'fantasy',
                'soundex'     => 'W232',
                'metaphone'   => 'WS0WSL',
                'dmetaphone1' => 'AS0SL',
                'dmetaphone2' => 'ATSTSL'
            ],
            [
                'name'        => 'White Rabbit',
                'type'        => 'fantasy',
                'soundex'     => 'W361',
                'metaphone'   => 'WTRBT',
                'dmetaphone1' => 'ATRPT',
                'dmetaphone2' => 'ATRPT'
            ],
            [
                'name'        => 'Widow Tweed',
                'type'        => 'fantasy',
                'soundex'     => 'W333',
                'metaphone'   => 'WTTWT',
                'dmetaphone1' => 'ATTT',
                'dmetaphone2' => 'FTTT'
            ],
            [
                'name'        => 'Wilbur Robinson',
                'type'        => 'fantasy',
                'soundex'     => 'W416',
                'metaphone'   => 'WLBRRBNSN',
                'dmetaphone1' => 'ALPRRPNSN',
                'dmetaphone2' => 'FLPRRPNSN'
            ],
            [
                'name'        => 'Wile E. Coyote',
                'type'        => 'fantasy',
                'soundex'     => 'W423',
                'metaphone'   => 'WLKYT',
                'dmetaphone1' => 'ALKT',
                'dmetaphone2' => 'FLKT'
            ],
            [
                'name'        => 'Wilhelmina Packard',
                'type'        => 'fantasy',
                'soundex'     => 'W445',
                'metaphone'   => 'WLHLMNPKRT',
                'dmetaphone1' => 'ALLMNPKRT',
                'dmetaphone2' => 'FLLMNPKRT'
            ],
            [
                'name'        => 'Willie the Giant',
                'type'        => 'fantasy',
                'soundex'     => 'W432',
                'metaphone'   => 'WL0JNT',
                'dmetaphone1' => 'AL0JNT',
                'dmetaphone2' => 'FLTKNT'
            ],
            [
                'name'        => 'Winifred the Elephant',
                'type'        => 'fantasy',
                'soundex'     => 'W516',
                'metaphone'   => 'WNFRT0LFNT',
                'dmetaphone1' => 'ANFRT0LFNT',
                'dmetaphone2' => 'FNFRTTLFNT'
            ],
            [
                'name'        => 'Winkie the Barman',
                'type'        => 'fantasy',
                'soundex'     => 'W523',
                'metaphone'   => 'WNK0BRMN',
                'dmetaphone1' => 'ANK0PRMN',
                'dmetaphone2' => 'FNKTPRMN'
            ],
            [
                'name'        => 'Winnie the Pooh',
                'type'        => 'fantasy',
                'soundex'     => 'W531',
                'metaphone'   => 'WN0P',
                'dmetaphone1' => 'AN0P',
                'dmetaphone2' => 'FNTP'
            ],
            [
                'name'        => 'Wonder Woman',
                'type'        => 'fantasy',
                'soundex'     => 'W536',
                'metaphone'   => 'WNTRWMN',
                'dmetaphone1' => 'ANTRMN',
                'dmetaphone2' => 'FNTRMN'
            ],
            [
                'name'        => 'Woody Woodpecker',
                'type'        => 'fantasy',
                'soundex'     => 'W331',
                'metaphone'   => 'WTWTPKR',
                'dmetaphone1' => 'ATTPKR',
                'dmetaphone2' => 'FTTPKR'
            ],
            [
                'name'        => 'Wormwood the Raven',
                'type'        => 'fantasy',
                'soundex'     => 'W653',
                'metaphone'   => 'WRMWT0RFN',
                'dmetaphone1' => 'ARMT0RFN',
                'dmetaphone2' => 'FRMTTRFN'
            ],
            [
                'name'        => 'Wreck-It Ralph',
                'type'        => 'fantasy',
                'soundex'     => 'W623',
                'metaphone'   => 'RKTRLF',
                'dmetaphone1' => 'RKTRLF',
                'dmetaphone2' => 'RKTRLF'
            ],
            [
                'name'        => 'Yakko Warner',
                'type'        => 'fantasy',
                'soundex'     => 'Y265',
                'metaphone'   => 'YKWRNR',
                'dmetaphone1' => 'AKRNR',
                'dmetaphone2' => 'AKRNR'
            ],
            [
                'name'        => 'Yen Sid',
                'type'        => 'fantasy',
                'soundex'     => 'Y523',
                'metaphone'   => 'YNST',
                'dmetaphone1' => 'ANST',
                'dmetaphone2' => 'ANST'
            ],
            [
                'name'        => 'Yogi Bear',
                'type'        => 'fantasy',
                'soundex'     => 'Y216',
                'metaphone'   => 'YJBR',
                'dmetaphone1' => 'AJPR',
                'dmetaphone2' => 'AKPR'
            ],
            [
                'name'        => 'Yosemite Sam',
                'type'        => 'fantasy',
                'soundex'     => 'Y253',
                'metaphone'   => 'YSMTSM',
                'dmetaphone1' => 'ASMTSM',
                'dmetaphone2' => 'ASMTSM'
            ],
            [
                'name'        => 'Ziggy the Vulture',
                'type'        => 'fantasy',
                'soundex'     => 'Z231',
                'metaphone'   => 'SK0FLTR',
                'dmetaphone1' => 'SK0FLTR',
                'dmetaphone2' => 'SKTFLTR'
            ],
            [
                'name'        => 'Adolf Hitler',
                'type'        => 'celebrity',
                'soundex'     => 'A341',
                'metaphone'   => 'ATLFHTLR',
                'dmetaphone1' => 'ATLFTLR',
                'dmetaphone2' => 'ATLFTLR'
            ],
            [
                'name'        => 'Alan Turing',
                'type'        => 'celebrity',
                'soundex'     => 'A453',
                'metaphone'   => 'ALNTRNK',
                'dmetaphone1' => 'ALNTRNK',
                'dmetaphone2' => 'ALNTRNK'
            ],
            [
                'name'        => 'Albert Einstein',
                'type'        => 'celebrity',
                'soundex'     => 'A416',
                'metaphone'   => 'ALBRTNSTN',
                'dmetaphone1' => 'ALPRTNSTN',
                'dmetaphone2' => 'ALPRTNSTN'
            ],
            [
                'name'        => 'Amy Whinehouse',
                'type'        => 'celebrity',
                'soundex'     => 'A552',
                'metaphone'   => 'AMHNHS',
                'dmetaphone1' => 'AMNHS',
                'dmetaphone2' => 'AMNHS'
            ],
            [
                'name'        => 'Andrew Wood',
                'type'        => 'celebrity',
                'soundex'     => 'A536',
                'metaphone'   => 'ANTRWT',
                'dmetaphone1' => 'ANTRT',
                'dmetaphone2' => 'ANTRT'
            ],
            [
                'name'        => 'Andy Ginn',
                'type'        => 'celebrity',
                'soundex'     => 'A532',
                'metaphone'   => 'ANTJN',
                'dmetaphone1' => 'ANTJN',
                'dmetaphone2' => 'ANTKN'
            ],
            [
                'name'        => 'Anne Frank',
                'type'        => 'celebrity',
                'soundex'     => 'A516',
                'metaphone'   => 'ANFRNK',
                'dmetaphone1' => 'ANFRNK',
                'dmetaphone2' => 'ANFRNK'
            ],
            [
                'name'        => 'Barry White',
                'type'        => 'celebrity',
                'soundex'     => 'B630',
                'metaphone'   => 'BRHT',
                'dmetaphone1' => 'PRT',
                'dmetaphone2' => 'PRT'
            ],
            [
                'name'        => 'Bob Marley',
                'type'        => 'celebrity',
                'soundex'     => 'B156',
                'metaphone'   => 'BBMRL',
                'dmetaphone1' => 'PPMRL',
                'dmetaphone2' => 'PPMRL'
            ],
            [
                'name'        => 'Bon Scott',
                'type'        => 'celebrity',
                'soundex'     => 'B523',
                'metaphone'   => 'BNSKT',
                'dmetaphone1' => 'PNSKT',
                'dmetaphone2' => 'PNSKT'
            ],
            [
                'name'        => 'Bradley Nowell',
                'type'        => 'celebrity',
                'soundex'     => 'B634',
                'metaphone'   => 'BRTLNWL',
                'dmetaphone1' => 'PRTLNL',
                'dmetaphone2' => 'PRTLNL'
            ],
            [
                'name'        => 'Brandon Lee',
                'type'        => 'celebrity',
                'soundex'     => 'B653',
                'metaphone'   => 'BRNTNL',
                'dmetaphone1' => 'PRNTNL',
                'dmetaphone2' => 'PRNTNL'
            ],
            [
                'name'        => 'Brian Jones',
                'type'        => 'celebrity',
                'soundex'     => 'B652',
                'metaphone'   => 'BRNJNS',
                'dmetaphone1' => 'PRNJNS',
                'dmetaphone2' => 'PRNJNS'
            ],
            [
                'name'        => 'Brittany Murphy',
                'type'        => 'celebrity',
                'soundex'     => 'B635',
                'metaphone'   => 'BRTNMRF',
                'dmetaphone1' => 'PRTNMRF',
                'dmetaphone2' => 'PRTNMRF'
            ],
            [
                'name'        => 'Bruce Lee',
                'type'        => 'celebrity',
                'soundex'     => 'B624',
                'metaphone'   => 'BRSL',
                'dmetaphone1' => 'PRSL',
                'dmetaphone2' => 'PRSL'
            ],
            [
                'name'        => 'Buddy Holly',
                'type'        => 'celebrity',
                'soundex'     => 'B340',
                'metaphone'   => 'BTHL',
                'dmetaphone1' => 'PTL',
                'dmetaphone2' => 'PTL'
            ],
            [
                'name'        => 'Charlie Parker',
                'type'        => 'celebrity',
                'soundex'     => 'C641',
                'metaphone'   => 'XRLPRKR',
                'dmetaphone1' => 'XRLPRKR',
                'dmetaphone2' => 'XRLPRKR'
            ],
            [
                'name'        => 'Che Guevara',
                'type'        => 'celebrity',
                'soundex'     => 'C216',
                'metaphone'   => 'XKFR',
                'dmetaphone1' => 'XKFR',
                'dmetaphone2' => 'XKFR'
            ],
            [
                'name'        => 'Chris Farley',
                'type'        => 'celebrity',
                'soundex'     => 'C621',
                'metaphone'   => 'XRSFRL',
                'dmetaphone1' => 'KRSFRL',
                'dmetaphone2' => 'KRSFRL'
            ],
            [
                'name'        => 'Cliff Burton',
                'type'        => 'celebrity',
                'soundex'     => 'C416',
                'metaphone'   => 'KLFBRTN',
                'dmetaphone1' => 'KLFPRTN',
                'dmetaphone2' => 'KLFPRTN'
            ],
            [
                'name'        => 'Dee Dee Ramone',
                'type'        => 'celebrity',
                'soundex'     => 'D365',
                'metaphone'   => 'TTRMN',
                'dmetaphone1' => 'TTRMN',
                'dmetaphone2' => 'TTRMN'
            ],
            [
                'name'        => 'Dennis Wilson',
                'type'        => 'celebrity',
                'soundex'     => 'D524',
                'metaphone'   => 'TNSWLSN',
                'dmetaphone1' => 'TNSLSN',
                'dmetaphone2' => 'TNSLSN'
            ],
            [
                'name'        => 'Diana, Princess of Wales',
                'type'        => 'celebrity',
                'soundex'     => 'D516',
                'metaphone'   => 'TNPRNSSFWLS',
                'dmetaphone1' => 'TNPRNSSFLS',
                'dmetaphone2' => 'TNPRNSSFLS'
            ],
            [
                'name'        => 'Dimebag Darrell',
                'type'        => 'celebrity',
                'soundex'     => 'D512',
                'metaphone'   => 'TMBKTRL',
                'dmetaphone1' => 'TMPKTRL',
                'dmetaphone2' => 'TMPKTRL'
            ],
            [
                'name'        => 'Donna Summer',
                'type'        => 'celebrity',
                'soundex'     => 'D525',
                'metaphone'   => 'TNSMR',
                'dmetaphone1' => 'TNSMR',
                'dmetaphone2' => 'TNSMR'
            ],
            [
                'name'        => 'Duanie Allman',
                'type'        => 'celebrity',
                'soundex'     => 'D545',
                'metaphone'   => 'TNLMN',
                'dmetaphone1' => 'TNLMN',
                'dmetaphone2' => 'TNLMN'
            ],
            [
                'name'        => 'Eddie Cochran',
                'type'        => 'celebrity',
                'soundex'     => 'E322',
                'metaphone'   => 'ETKXRN',
                'dmetaphone1' => 'ATKKRN',
                'dmetaphone2' => 'ATKKRN'
            ],
            [
                'name'        => 'Elvis Presley',
                'type'        => 'celebrity',
                'soundex'     => 'E412',
                'metaphone'   => 'ELFSPRSL',
                'dmetaphone1' => 'ALFSPRSL',
                'dmetaphone2' => 'ALFSPRSL'
            ],
            [
                'name'        => 'Eric Carr',
                'type'        => 'celebrity',
                'soundex'     => 'E626',
                'metaphone'   => 'ERKKR',
                'dmetaphone1' => 'ARKR',
                'dmetaphone2' => 'ARKR'
            ],
            [
                'name'        => 'Etta James',
                'type'        => 'celebrity',
                'soundex'     => 'E325',
                'metaphone'   => 'ETJMS',
                'dmetaphone1' => 'ATJMS',
                'dmetaphone2' => 'ATJMS'
            ],
            [
                'name'        => 'Eva Perón',
                'type'        => 'celebrity',
                'soundex'     => 'E116',
                'metaphone'   => 'EFPRN',
                'dmetaphone1' => 'AFPRN',
                'dmetaphone2' => 'AFPRN'
            ],
            [
                'name'        => 'Fats Waller',
                'type'        => 'celebrity',
                'soundex'     => 'F324',
                'metaphone'   => 'FTSWLR',
                'dmetaphone1' => 'FTSLR',
                'dmetaphone2' => 'FTSLR'
            ],
            [
                'name'        => 'Felix Mendelssohn-Bartholdy',
                'type'        => 'celebrity',
                'soundex'     => 'F425',
                'metaphone'   => 'FLKSMNTLSNBR0LT',
                'dmetaphone1' => 'FLKSMNTLSNPR0LT',
                'dmetaphone2' => 'FLKSMNTLSNPRTLT'
            ],
            [
                'name'        => 'Frank Zappa',
                'type'        => 'celebrity',
                'soundex'     => 'F652',
                'metaphone'   => 'FRNKSP',
                'dmetaphone1' => 'FRNKSP',
                'dmetaphone2' => 'FRNKTSP'
            ],
            [
                'name'        => 'Franz Schubert',
                'type'        => 'celebrity',
                'soundex'     => 'F652',
                'metaphone'   => 'FRNSSXBRT',
                'dmetaphone1' => 'FRNSXPRT',
                'dmetaphone2' => 'FRNSXPRT'
            ],
            [
                'name'        => 'Freddie Mercury',
                'type'        => 'celebrity',
                'soundex'     => 'F635',
                'metaphone'   => 'FRTMRKR',
                'dmetaphone1' => 'FRTMRKR',
                'dmetaphone2' => 'FRTMRKR'
            ],
            [
                'name'        => 'Frédéric Chopin',
                'type'        => 'celebrity',
                'soundex'     => 'F636',
                'metaphone'   => 'FRTRKXPN',
                'dmetaphone1' => 'FRTRKPN',
                'dmetaphone2' => 'FRTRKPN'
            ],
            [
                'name'        => 'Genghis Khan',
                'type'        => 'celebrity',
                'soundex'     => 'G522',
                'metaphone'   => 'JNFSKHN',
                'dmetaphone1' => 'JNKSKN',
                'dmetaphone2' => 'KNKSKN'
            ],
            [
                'name'        => 'George Gershwin',
                'type'        => 'celebrity',
                'soundex'     => 'G622',
                'metaphone'   => 'JRJJRXWN',
                'dmetaphone1' => 'JRJKRXN',
                'dmetaphone2' => 'KRKJRXN'
            ],
            [
                'name'        => 'George Harrison',
                'type'        => 'celebrity',
                'soundex'     => 'G626',
                'metaphone'   => 'JRJHRSN',
                'dmetaphone1' => 'JRJRSN',
                'dmetaphone2' => 'KRKRSN'
            ],
            [
                'name'        => 'George Orwell',
                'type'        => 'celebrity',
                'soundex'     => 'G626',
                'metaphone'   => 'JRJRWL',
                'dmetaphone1' => 'JRJRL',
                'dmetaphone2' => 'KRKRL'
            ],
            [
                'name'        => 'Gram Parsons',
                'type'        => 'celebrity',
                'soundex'     => 'G651',
                'metaphone'   => 'KRMPRSNS',
                'dmetaphone1' => 'KRMPRSNS',
                'dmetaphone2' => 'KRMPRSNS'
            ],
            [
                'name'        => 'Hank Williams',
                'type'        => 'celebrity',
                'soundex'     => 'H524',
                'metaphone'   => 'HNKWLMS',
                'dmetaphone1' => 'HNKLMS',
                'dmetaphone2' => 'HNKLMS'
            ],
            [
                'name'        => 'Heinrich Himmler',
                'type'        => 'celebrity',
                'soundex'     => 'H562',
                'metaphone'   => 'HNRXHMLR',
                'dmetaphone1' => 'HNRXMLR',
                'dmetaphone2' => 'HNRKMLR'
            ],
            [
                'name'        => 'Ian Curtis',
                'type'        => 'celebrity',
                'soundex'     => 'I526',
                'metaphone'   => 'INKRTS',
                'dmetaphone1' => 'ANKRTS',
                'dmetaphone2' => 'ANKRTS'
            ],
            [
                'name'        => 'James Brown',
                'type'        => 'celebrity',
                'soundex'     => 'J521',
                'metaphone'   => 'JMSBRN',
                'dmetaphone1' => 'JMSPRN',
                'dmetaphone2' => 'AMSPRN'
            ],
            [
                'name'        => 'James Dean',
                'type'        => 'celebrity',
                'soundex'     => 'J523',
                'metaphone'   => 'JMSTN',
                'dmetaphone1' => 'JMSTN',
                'dmetaphone2' => 'AMSTN'
            ],
            [
                'name'        => 'Janis Joplin',
                'type'        => 'celebrity',
                'soundex'     => 'J521',
                'metaphone'   => 'JNSJPLN',
                'dmetaphone1' => 'JNSJPLN',
                'dmetaphone2' => 'ANSJPLN'
            ],
            [
                'name'        => 'Jason Mizel',
                'type'        => 'celebrity',
                'soundex'     => 'J252',
                'metaphone'   => 'JSNMSL',
                'dmetaphone1' => 'JSNMSL',
                'dmetaphone2' => 'ASNMSL'
            ],
            [
                'name'        => 'Jayne Mansfield',
                'type'        => 'celebrity',
                'soundex'     => 'J555',
                'metaphone'   => 'JNMNSFLT',
                'dmetaphone1' => 'JNMNSFLT',
                'dmetaphone2' => 'ANMNSFLT'
            ],
            [
                'name'        => 'Jeff Buckley',
                'type'        => 'celebrity',
                'soundex'     => 'J124',
                'metaphone'   => 'JFBKL',
                'dmetaphone1' => 'JFPKL',
                'dmetaphone2' => 'AFPKL'
            ],
            [
                'name'        => 'Jeff Hanneman',
                'type'        => 'celebrity',
                'soundex'     => 'J155',
                'metaphone'   => 'JFHNMN',
                'dmetaphone1' => 'JFNMN',
                'dmetaphone2' => 'AFNMN'
            ],
            [
                'name'        => 'Jesus Christ',
                'type'        => 'celebrity',
                'soundex'     => 'J226',
                'metaphone'   => 'JSSXRST',
                'dmetaphone1' => 'JSSXRST',
                'dmetaphone2' => 'ASSKRST'
            ],
            [
                'name'        => 'Jim Croce',
                'type'        => 'celebrity',
                'soundex'     => 'J526',
                'metaphone'   => 'JMKRS',
                'dmetaphone1' => 'JMKRS',
                'dmetaphone2' => 'AMKRS'
            ],
            [
                'name'        => 'Jim Morrison',
                'type'        => 'celebrity',
                'soundex'     => 'J562',
                'metaphone'   => 'JMMRSN',
                'dmetaphone1' => 'JMMRSN',
                'dmetaphone2' => 'AMMRSN'
            ],
            [
                'name'        => 'Jimi Hendrix',
                'type'        => 'celebrity',
                'soundex'     => 'J553',
                'metaphone'   => 'JMHNTRKS',
                'dmetaphone1' => 'JMNTRKS',
                'dmetaphone2' => 'AMNTRKS'
            ],
            [
                'name'        => 'Joey Ramone',
                'type'        => 'celebrity',
                'soundex'     => 'J655',
                'metaphone'   => 'JRMN',
                'dmetaphone1' => 'JRMN',
                'dmetaphone2' => 'ARMN'
            ],
            [
                'name'        => 'John Belushi',
                'type'        => 'celebrity',
                'soundex'     => 'J514',
                'metaphone'   => 'JNBLX',
                'dmetaphone1' => 'JNPLX',
                'dmetaphone2' => 'ANPLX'
            ],
            [
                'name'        => 'John Bonham',
                'type'        => 'celebrity',
                'soundex'     => 'J515',
                'metaphone'   => 'JNBNHM',
                'dmetaphone1' => 'JNPNM',
                'dmetaphone2' => 'ANPNM'
            ],
            [
                'name'        => 'John Candy',
                'type'        => 'celebrity',
                'soundex'     => 'J525',
                'metaphone'   => 'JNKNT',
                'dmetaphone1' => 'JNKNT',
                'dmetaphone2' => 'ANKNT'
            ],
            [
                'name'        => 'John Coltrane',
                'type'        => 'celebrity',
                'soundex'     => 'J524',
                'metaphone'   => 'JNKLTRN',
                'dmetaphone1' => 'JNKLTRN',
                'dmetaphone2' => 'ANKLTRN'
            ],
            [
                'name'        => 'John F. Kennedy',
                'type'        => 'celebrity',
                'soundex'     => 'J512',
                'metaphone'   => 'JNFKNT',
                'dmetaphone1' => 'JNFKNT',
                'dmetaphone2' => 'ANFKNT'
            ],
            [
                'name'        => 'John Keats',
                'type'        => 'celebrity',
                'soundex'     => 'J523',
                'metaphone'   => 'JNKTS',
                'dmetaphone1' => 'JNKTS',
                'dmetaphone2' => 'ANKTS'
            ],
            [
                'name'        => 'John Lee Hooker',
                'type'        => 'celebrity',
                'soundex'     => 'J542',
                'metaphone'   => 'JNLHKR',
                'dmetaphone1' => 'JNLKR',
                'dmetaphone2' => 'ANLKR'
            ],
            [
                'name'        => 'John Lennon',
                'type'        => 'celebrity',
                'soundex'     => 'J545',
                'metaphone'   => 'JNLNN',
                'dmetaphone1' => 'JNLNN',
                'dmetaphone2' => 'ANLNN'
            ],
            [
                'name'        => 'Jonny Ramone',
                'type'        => 'celebrity',
                'soundex'     => 'J565',
                'metaphone'   => 'JNRMN',
                'dmetaphone1' => 'JNRMN',
                'dmetaphone2' => 'ANRMN'
            ],
            [
                'name'        => 'Karen Carpenter',
                'type'        => 'celebrity',
                'soundex'     => 'K652',
                'metaphone'   => 'KRNKRPNTR',
                'dmetaphone1' => 'KRNKRPNTR',
                'dmetaphone2' => 'KRNKRPNTR'
            ],
            [
                'name'        => 'Keith Moon',
                'type'        => 'celebrity',
                'soundex'     => 'K355',
                'metaphone'   => 'K0MN',
                'dmetaphone1' => 'K0MN',
                'dmetaphone2' => 'KTMN'
            ],
            [
                'name'        => 'Kurt Kobain',
                'type'        => 'celebrity',
                'soundex'     => 'K632',
                'metaphone'   => 'KRTKBN',
                'dmetaphone1' => 'KRTKPN',
                'dmetaphone2' => 'KRTKPN'
            ],
            [
                'name'        => 'Layne Staley',
                'type'        => 'celebrity',
                'soundex'     => 'L523',
                'metaphone'   => 'LNSTL',
                'dmetaphone1' => 'LNSTL',
                'dmetaphone2' => 'LNSTL'
            ],
            [
                'name'        => 'Lou Reed',
                'type'        => 'celebrity',
                'soundex'     => 'L630',
                'metaphone'   => 'LRT',
                'dmetaphone1' => 'LRT',
                'dmetaphone2' => 'LRT'
            ],
            [
                'name'        => 'Luciano Pavarotti',
                'type'        => 'celebrity',
                'soundex'     => 'L251',
                'metaphone'   => 'LXNPFRT',
                'dmetaphone1' => 'LSNPFRT',
                'dmetaphone2' => 'LXNPFRT'
            ],
            [
                'name'        => 'Marc Bolan',
                'type'        => 'celebrity',
                'soundex'     => 'M621',
                'metaphone'   => 'MRKBLN',
                'dmetaphone1' => 'MRKPLN',
                'dmetaphone2' => 'MRKPLN'
            ],
            [
                'name'        => 'Marilyn Monroe',
                'type'        => 'celebrity',
                'soundex'     => 'M645',
                'metaphone'   => 'MRLNMNR',
                'dmetaphone1' => 'MRLNMNR',
                'dmetaphone2' => 'MRLNMNR'
            ],
            [
                'name'        => 'Martin Luther King',
                'type'        => 'celebrity',
                'soundex'     => 'M635',
                'metaphone'   => 'MRTNL0RKNK',
                'dmetaphone1' => 'MRTNL0RKNK',
                'dmetaphone2' => 'MRTNLTRKNK'
            ],
            [
                'name'        => 'Marvin Gaye',
                'type'        => 'celebrity',
                'soundex'     => 'M615',
                'metaphone'   => 'MRFNKY',
                'dmetaphone1' => 'MRFNK',
                'dmetaphone2' => 'MRFNK'
            ],
            [
                'name'        => 'Michael Hutchence',
                'type'        => 'celebrity',
                'soundex'     => 'M243',
                'metaphone'   => 'MXLHXNS',
                'dmetaphone1' => 'MKLXNS',
                'dmetaphone2' => 'MXLXNS'
            ],
            [
                'name'        => 'Michal Jackson',
                'type'        => 'celebrity',
                'soundex'     => 'M242',
                'metaphone'   => 'MXLJKSN',
                'dmetaphone1' => 'MXLJKSN',
                'dmetaphone2' => 'MKLJKSN'
            ],
            [
                'name'        => 'Nat King Cole',
                'type'        => 'celebrity',
                'soundex'     => 'N325',
                'metaphone'   => 'NTKNKKL',
                'dmetaphone1' => 'NTKNKKL',
                'dmetaphone2' => 'NTKNKKL'
            ],
            [
                'name'        => 'Oscar Wilde',
                'type'        => 'celebrity',
                'soundex'     => 'O264',
                'metaphone'   => 'OSKRWLT',
                'dmetaphone1' => 'ASKRLT',
                'dmetaphone2' => 'ASKRLT'
            ],
            [
                'name'        => 'Otis Redding',
                'type'        => 'celebrity',
                'soundex'     => 'O326',
                'metaphone'   => 'OTSRTNK',
                'dmetaphone1' => 'ATSRTNK',
                'dmetaphone2' => 'ATSRTNK'
            ],
            [
                'name'        => 'Patsy Cline',
                'type'        => 'celebrity',
                'soundex'     => 'P322',
                'metaphone'   => 'PTSKLN',
                'dmetaphone1' => 'PTSKLN',
                'dmetaphone2' => 'PTSKLN'
            ],
            [
                'name'        => 'Peter Ham',
                'type'        => 'celebrity',
                'soundex'     => 'P365',
                'metaphone'   => 'PTRHM',
                'dmetaphone1' => 'PTRM',
                'dmetaphone2' => 'PTRM'
            ],
            [
                'name'        => 'Randy Rhoads',
                'type'        => 'celebrity',
                'soundex'     => 'R536',
                'metaphone'   => 'RNTRHTS',
                'dmetaphone1' => 'RNTRTS',
                'dmetaphone2' => 'RNTRTS'
            ],
            [
                'name'        => 'Richard Wright',
                'type'        => 'celebrity',
                'soundex'     => 'R263',
                'metaphone'   => 'RXRTRFT',
                'dmetaphone1' => 'RXRTRT',
                'dmetaphone2' => 'RKRTRT'
            ],
            [
                'name'        => 'Ricky Wilson',
                'type'        => 'celebrity',
                'soundex'     => 'R242',
                'metaphone'   => 'RKWLSN',
                'dmetaphone1' => 'RKLSN',
                'dmetaphone2' => 'RKLSN'
            ],
            [
                'name'        => 'Ritchie Valens',
                'type'        => 'celebrity',
                'soundex'     => 'R321',
                'metaphone'   => 'RXFLNS',
                'dmetaphone1' => 'RXFLNS',
                'dmetaphone2' => 'RXFLNS'
            ],
            [
                'name'        => 'River Phoenix',
                'type'        => 'celebrity',
                'soundex'     => 'R161',
                'metaphone'   => 'RFRFNKS',
                'dmetaphone1' => 'RFRFNKS',
                'dmetaphone2' => 'RFRFNKS'
            ],
            [
                'name'        => 'Robert Johnson',
                'type'        => 'celebrity',
                'soundex'     => 'R163',
                'metaphone'   => 'RBRTJNSN',
                'dmetaphone1' => 'RPRTJNSN',
                'dmetaphone2' => 'RPRTJNSN'
            ],
            [
                'name'        => 'Robert Wadlow',
                'type'        => 'celebrity',
                'soundex'     => 'R163',
                'metaphone'   => 'RBRTWTL',
                'dmetaphone1' => 'RPRTTL',
                'dmetaphone2' => 'RPRTTLF'
            ],
            [
                'name'        => 'Robin Gibb',
                'type'        => 'celebrity',
                'soundex'     => 'R152',
                'metaphone'   => 'RBNJB',
                'dmetaphone1' => 'RPNJP',
                'dmetaphone2' => 'RPNKP'
            ],
            [
                'name'        => 'Ronnie James Dio',
                'type'        => 'celebrity',
                'soundex'     => 'R525',
                'metaphone'   => 'RNJMST',
                'dmetaphone1' => 'RNJMST',
                'dmetaphone2' => 'RNJMST'
            ],
            [
                'name'        => 'Roy Orbison',
                'type'        => 'celebrity',
                'soundex'     => 'R612',
                'metaphone'   => 'RRBSN',
                'dmetaphone1' => 'RRPSN',
                'dmetaphone2' => 'RRPSN'
            ],
            [
                'name'        => 'Rudolph Valentino',
                'type'        => 'celebrity',
                'soundex'     => 'R341',
                'metaphone'   => 'RTLFFLNTN',
                'dmetaphone1' => 'RTLFFLNTN',
                'dmetaphone2' => 'RTLFFLNTN'
            ],
            [
                'name'        => 'Ryan Dunn',
                'type'        => 'celebrity',
                'soundex'     => 'R535',
                'metaphone'   => 'RYNTN',
                'dmetaphone1' => 'RNTN',
                'dmetaphone2' => 'RNTN'
            ],
            [
                'name'        => 'Sam Cooke',
                'type'        => 'celebrity',
                'soundex'     => 'S522',
                'metaphone'   => 'SMKK',
                'dmetaphone1' => 'SMKK',
                'dmetaphone2' => 'SMKK'
            ],
            [
                'name'        => 'Shannon Hoon',
                'type'        => 'celebrity',
                'soundex'     => 'S555',
                'metaphone'   => 'XNNHN',
                'dmetaphone1' => 'XNNN',
                'dmetaphone2' => 'XNNN'
            ],
            [
                'name'        => 'Sid Vicious',
                'type'        => 'celebrity',
                'soundex'     => 'S312',
                'metaphone'   => 'STFSS',
                'dmetaphone1' => 'STFSS',
                'dmetaphone2' => 'STFXS'
            ],
            [
                'name'        => 'Steve Clark',
                'type'        => 'celebrity',
                'soundex'     => 'S312',
                'metaphone'   => 'STFKLRK',
                'dmetaphone1' => 'STFKLRK',
                'dmetaphone2' => 'STFKLRK'
            ],
            [
                'name'        => 'Steve Irwin',
                'type'        => 'celebrity',
                'soundex'     => 'S316',
                'metaphone'   => 'STFRWN',
                'dmetaphone1' => 'STFRN',
                'dmetaphone2' => 'STFRN'
            ],
            [
                'name'        => 'Steve McQueen',
                'type'        => 'celebrity',
                'soundex'     => 'S315',
                'metaphone'   => 'STFMKKN',
                'dmetaphone1' => 'STFMKN',
                'dmetaphone2' => 'STFMKN'
            ],
            [
                'name'        => 'Stevie Ray Vaughan',
                'type'        => 'celebrity',
                'soundex'     => 'S316',
                'metaphone'   => 'STFRFFN',
                'dmetaphone1' => 'STFRFKN',
                'dmetaphone2' => 'STFRFKN'
            ],
            [
                'name'        => 'Tami Terell',
                'type'        => 'celebrity',
                'soundex'     => 'T536',
                'metaphone'   => 'TMTRL',
                'dmetaphone1' => 'TMTRL',
                'dmetaphone2' => 'TMTRL'
            ],
            [
                'name'        => 'Notorious B.I.G',
                'type'        => 'celebrity',
                'soundex'     => 'N362',
                'metaphone'   => 'NTRSBK',
                'dmetaphone1' => 'NTRSPK',
                'dmetaphone2' => 'NTRSPK'
            ],
            [
                'name'        => 'Tim Buckley',
                'type'        => 'celebrity',
                'soundex'     => 'T512',
                'metaphone'   => 'TMBKL',
                'dmetaphone1' => 'TMPKL',
                'dmetaphone2' => 'TMPKL'
            ],
            [
                'name'        => 'Tony Sly',
                'type'        => 'celebrity',
                'soundex'     => 'T524',
                'metaphone'   => 'TNSL',
                'dmetaphone1' => 'TNSL',
                'dmetaphone2' => 'TNSL'
            ],
            [
                'name'        => 'Tupac Shakur',
                'type'        => 'celebrity',
                'soundex'     => 'T122',
                'metaphone'   => 'TPKXKR',
                'dmetaphone1' => 'TPKXKR',
                'dmetaphone2' => 'TPKXKR'
            ],
            [
                'name'        => 'Van Gogh',
                'type'        => 'celebrity',
                'soundex'     => 'V522',
                'metaphone'   => 'FNKF',
                'dmetaphone1' => 'FNKK',
                'dmetaphone2' => 'FNKK'
            ],
            [
                'name'        => 'Wolfgang Amadeus Mozart',
                'type'        => 'celebrity',
                'soundex'     => 'W412',
                'metaphone'   => 'WLFKNKMTSMSRT',
                'dmetaphone1' => 'ALFKNKMTSMSRT',
                'dmetaphone2' => 'FLFKNKMTSMTSRT'
            ],
            [
                'name'        => 'Yuri Gagarin',
                'type'        => 'celebrity',
                'soundex'     => 'Y622',
                'metaphone'   => 'YRKKRN',
                'dmetaphone1' => 'ARKKRN',
                'dmetaphone2' => 'ARKKRN'
            ]
        ];

        $knownNames = $this->table('known_names');
        $knownNames
            ->insert($data)
            ->save();
    }
}
