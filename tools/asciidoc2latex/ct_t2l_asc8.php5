<?php
/*
 * [The BSD License, http://www.opensource.org/licenses/bsd-license.php]
 * Copyright (c) 2007-2011, Sven van der Meer <sven@vandermeer.de>
 * All rights reserved.
 *
 * Redistribution  and  use  in  source  and  binary  forms,  with  or  without
 * modification, are permitted provided that the following conditions are met:
 * 
 *     + Redistributions of source code must retain the above copyright notice,
 *       this list of conditions and the following disclaimer.
 *     + Redistributions  in binary  form must  reproduce the  above copyright
 *       notice, this list  of conditions and  the following disclaimer  in the
 *       documentation and/or other materials provided with the distribution.
 *     + Neither the name of the the author nor the names of its contributors
 *       may be used to endorse or promote products derived from this software
 *       without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS  IS"
 * AND ANY EXPRESS  OR IMPLIED WARRANTIES,  INCLUDING, BUT NOT  LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY  AND FITNESS FOR A  PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN  NO EVENT SHALL  THE COPYRIGHT HOLDER  OR CONTRIBUTORS BE
 * LIABLE  FOR  ANY  DIRECT,  INDIRECT,  INCIDENTAL,  SPECIAL,  EXEMPLARY,   OR
 * CONSEQUENTIAL  DAMAGES  (INCLUDING,  BUT  NOT  LIMITED  TO,  PROCUREMENT  OF
 * SUBSTITUTE GOODS  OR SERVICES;  LOSS OF  USE, DATA,  OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER  CAUSED AND  ON ANY  THEORY OF  LIABILITY, WHETHER  IN
 * CONTRACT,  STRICT LIABILITY,  OR TORT  (INCLUDING NEGLIGENCE  OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE  USE OF THIS SOFTWARE, EVEN IF ADVISED  OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

  $conversion_table=array(

  //ascii characters
    '#'  => '\#',
    '$'  => '\$',
    '%'  => '\%',
    '&'  => '\&',
    '*'  => '\textasteriskcentered',
    '<'  => '\textless',
    '>'  => '\textgreater',
    '['  => '\[',
    '\\' => '\textbackslash',
    ']'  => '\]',
    '^'  => '\textasciicircum',
    '_'  => '\_',
    '{'  => '\{',
    '|'  => '\textbar',
    '}'  => '\}',
    '~'  => '\textasciitilde',

  //html-named ascii characters
    '&' => ,
    '<' => ,
    '>' => ,
    '^' => ,
    '~' => ,

  //punctuation, qoutes

  //accents grave
    'À' => '\\`{A}', // À
    'à' => '\\`{a}', // à
    'È' => '\\`{E}', // È
    'è' => '\\`{e}', // è
    'Ì' => '\\`{I}', // Ì
    'ì' => '\\`{i}', // ì
    'Ò' => '\\`{O}', // Ò
    'ò' => '\\`{o}', // ò
    'Ù' => '\\`{U}', // Ù
    'ù' => '\\`{u}', // ù

  //accents acute
    'Á' => '\\\'{A}', // Á
    'á' => '\\\'{a}', // á
    'É' => '\\\'{E}', // É
    'é' => '\\\'{e}', // é
    'Í' => '\\\'{I}', // Í
    'í' => '\\\'{i}', // í
    'Ó' => '\\\'{O}', // Ó
    'ó' => '\\\'{o}', // ó
    'Ú' => '\\\'{U}', // Ú
    'ú' => '\\\'{u}', // ú
    'İ' => '\\\'{Y}', // İ
    'ı' => '\\\'{y}', // ı

  //accents circumflex
    'Â'  => '\\^{A}', // Â
    'â'  => '\\^{a}', // â
    'Ê'  => '\\^{E}', // Ê
    'ê'  => '\\^{e}', // ê
    'Î'  => '\\^{I}', // Î
    'î'  => '\\^{i}', // î
    'Ô'  => '\\^{O}', // Ô
    'ô'  => '\\^{o}', // ô
    'Û'  => '\\^{U}', // Û
    'û'  => '\\^{u}', // û

  //accents tilde
    'Ã' => '\\~{A}', // Ã
    'ã' => '\\~{a}', // ã
    'Ñ' => '\\~{E}', // Ñ
    'ñ' => '\\~{e}', // ñ
    'Õ' => '\\~{O}', // Õ
    'õ' => '\\~{o}', // õ

  //accents umlaut
    'Ä' => '\\"{A}', // Ä
    'ä' => '\\"{a}', // ä
    'Ë' => '\\"{E}', // Ë
    'ë' => '\\"{e}', // ë
    'Ï' => '\\"{I}', // Ï
    'ï' => '\\"{i}', // ï
    'Ö' => '\\"{O}', // Ö
    'ö' => '\\"{o}', // ö
    'Ü' => '\\"{U}', // Ü
    'ü' => '\\"{u}', // ü
    'Ÿ' => '\\"{U}', // Ÿ
    'ÿ' => '\\"{u}', // ÿ

  //accents ring
    'Å' => '\\AA', // Å
    'å' => '\\aa', // å

    'Æ' => '\\AE', // Æ
    'æ' => '\\ae', // æ
    'Œ' => '\\OE', // Œ
    'œ' => '\\oe', // œ

    'Ç' => '\\c{C}', // Ç
    'ç' => '\\c{c}', // ç

    'Ğ' => '\\DH', // Ğ
    'ğ' => '\\dh', // ğ

    'Ø' => '\\O', // Ø
    'ø' => '\\o', // ø

    'Ş' => '\\TH', // Ş
    'ş' => '\\th', // ş 

    'ß' => '\\ss', // ß

//    '&LLL;' => '\\L', // L-
//    '&lll;' => '\\l', // l-

    'Š' => '\\v{S}', // Š
    'š' => '\\v{s}', // š

//    'ƒ' => ,

    '¡' => '\\textexclamdown',   // ¡
    '¢' => '\\cent',             // ¢
    '£' => '{\\pounds}',         // £
    '¤' => '\\currency',         // ¤
//    '¥' => ,
//    '¦' => ,
    '§' => '{\\S}',              // §
//    '¨' => ,
    '©' => '{\\copyright}',      // © -- alternative: {\textcopyright}
    'ª' => '\\textordfeminine',  // ª                                 
//    '«' => ,
//    '¬' => ,
//    '­' => ,
    '®' => '{\\textregistered}', // ®
//    '¯' => ,
//    '°' => ,
//    '±' => ,
//    '²' => ,
//    '³' => ,
//    '´' => ,
    'µ' => '\P',                // ¶
//    '¶' => ,
//    '·' => ,
//    '¸' => ,
//    '¹' => ,
    'º' => '\\textordmasculine', // º
//    '»' => ,
//    '¼' => ,
//    '½' => ,
//    '¾' => ,
    '¿' => '\\textquestiondown', // ¿
//    '×' => ,
//    '÷' => ,

   //technical symbols

    //arrow symbols

    //symbols misc
//    "•" => ,
//    "'" => ,
    '™' => '{\texttrademark}', // ™
    '€' => '{\euro}',          // €

    //punctation
    '–' => '--',      // –
    '—' => '---',     // —
    '†' => '\dag',    // †
    '‡' => '\ddag',   // ‡
    '…' => '{\dots}', // …
//    '‰' => '',        // ‰

    //mathematical signs

    //greek characters

  );

?>