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
    '�' => '\\`{A}', // �
    '�' => '\\`{a}', // �
    '�' => '\\`{E}', // �
    '�' => '\\`{e}', // �
    '�' => '\\`{I}', // �
    '�' => '\\`{i}', // �
    '�' => '\\`{O}', // �
    '�' => '\\`{o}', // �
    '�' => '\\`{U}', // �
    '�' => '\\`{u}', // �

  //accents acute
    '�' => '\\\'{A}', // �
    '�' => '\\\'{a}', // �
    '�' => '\\\'{E}', // �
    '�' => '\\\'{e}', // �
    '�' => '\\\'{I}', // �
    '�' => '\\\'{i}', // �
    '�' => '\\\'{O}', // �
    '�' => '\\\'{o}', // �
    '�' => '\\\'{U}', // �
    '�' => '\\\'{u}', // �
    '�' => '\\\'{Y}', // �
    '�' => '\\\'{y}', // �

  //accents circumflex
    '�'  => '\\^{A}', // �
    '�'  => '\\^{a}', // �
    '�'  => '\\^{E}', // �
    '�'  => '\\^{e}', // �
    '�'  => '\\^{I}', // �
    '�'  => '\\^{i}', // �
    '�'  => '\\^{O}', // �
    '�'  => '\\^{o}', // �
    '�'  => '\\^{U}', // �
    '�'  => '\\^{u}', // �

  //accents tilde
    '�' => '\\~{A}', // �
    '�' => '\\~{a}', // �
    '�' => '\\~{E}', // �
    '�' => '\\~{e}', // �
    '�' => '\\~{O}', // �
    '�' => '\\~{o}', // �

  //accents umlaut
    '�' => '\\"{A}', // �
    '�' => '\\"{a}', // �
    '�' => '\\"{E}', // �
    '�' => '\\"{e}', // �
    '�' => '\\"{I}', // �
    '�' => '\\"{i}', // �
    '�' => '\\"{O}', // �
    '�' => '\\"{o}', // �
    '�' => '\\"{U}', // �
    '�' => '\\"{u}', // �
    '�' => '\\"{U}', // �
    '�' => '\\"{u}', // �

  //accents ring
    '�' => '\\AA', // �
    '�' => '\\aa', // �

    '�' => '\\AE', // �
    '�' => '\\ae', // �
    '�' => '\\OE', // �
    '�' => '\\oe', // �

    '�' => '\\c{C}', // �
    '�' => '\\c{c}', // �

    '�' => '\\DH', // �
    '�' => '\\dh', // �

    '�' => '\\O', // �
    '�' => '\\o', // �

    '�' => '\\TH', // �
    '�' => '\\th', // � 

    '�' => '\\ss', // �

//    '&LLL;' => '\\L', // L-
//    '&lll;' => '\\l', // l-

    '�' => '\\v{S}', // �
    '�' => '\\v{s}', // �

//    '�' => ,

    '�' => '\\textexclamdown',   // �
    '�' => '\\cent',             // �
    '�' => '{\\pounds}',         // �
    '�' => '\\currency',         // �
//    '�' => ,
//    '�' => ,
    '�' => '{\\S}',              // �
//    '�' => ,
    '�' => '{\\copyright}',      // � -- alternative: {\textcopyright}
    '�' => '\\textordfeminine',  // �                                 
//    '�' => ,
//    '�' => ,
//    '�' => ,
    '�' => '{\\textregistered}', // �
//    '�' => ,
//    '�' => ,
//    '�' => ,
//    '�' => ,
//    '�' => ,
//    '�' => ,
    '�' => '\P',                // �
//    '�' => ,
//    '�' => ,
//    '�' => ,
//    '�' => ,
    '�' => '\\textordmasculine', // �
//    '�' => ,
//    '�' => ,
//    '�' => ,
//    '�' => ,
    '�' => '\\textquestiondown', // �
//    '�' => ,
//    '�' => ,

   //technical symbols

    //arrow symbols

    //symbols misc
//    "�" => ,
//    "'" => ,
    '�' => '{\texttrademark}', // �
    '�' => '{\euro}',          // �

    //punctation
    '�' => '--',      // �
    '�' => '---',     // �
    '�' => '\dag',    // �
    '�' => '\ddag',   // �
    '�' => '{\dots}', // �
//    '�' => '',        // �

    //mathematical signs

    //greek characters

  );

?>