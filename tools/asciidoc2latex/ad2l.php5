<?php  
//check commandline for input file and output (optional)

$progname="ad2l";
$deleteline=array();

if($argc<2||$argc>3){
  usage();
  exit;
}

$fin=$argv[1];
$fout=($argc==3)?$argv[2]:null;

//check for fin
if(!file_exists($fin)){
	fwrite(STDERR,"\n\n");
	fwrite(STDERR,"{$progname}: file not found <{$fin}>");
	fwrite(STDERR,"\n\n");
	exit;
}

//fin/fout are set, read the file into an array
$ad=file($fin, FILE_USE_INCLUDE_PATH | FILE_TEXT | FILE_IGNORE_NEW_LINES);

//we got the file, let's see if we can transform it
$_keys=array_keys($ad);
$_size=count($_keys);
for($i=0;$i<$_size;$i++){

  //Two line titles
  // + lookup: line is same length as previous line and contains heading character only
  //     -> Level 0 (top level):     ======================
  //     -> Level 1:                 ----------------------
  //     -> Level 2:                 ~~~~~~~~~~~~~~~~~~~~~~
  //     -> Level 3:                 ^^^^^^^^^^^^^^^^^^^^^^
  //     -> Level 4 (bottom level):  ++++++++++++++++++++++
  if(strlen(str_replace(array("=","-","~","^","+"),"",$ad[$i]))==0&&strlen($ad[$i])>0&&strlen($ad[$i])==strlen($ad[$i-1])){
  	//we have a two line title, now do the transformation
  	$ad[$i-1]="\\skbinput{".$ad[$i-1]."}";
    $deleteline[]=$i;
    continue;
  }

  //Single line titles
  //lookup: start (and optional end) of line with specific character set (x time =)
  //     -> ===== Section title (level 4) =====
  //     -> ==== Section title (level 3) ====
  //     -> === Section title (level 2) ===
  //     -> == Section title (level 1) ==
  //     -> = Document Title (level 0) =
  if(strstr($ad[$i], "===== ", true)!==false){
  	$ad[$i]="\\skbinput{".trim(str_replace("=====", "" , $ad[$i]))."}";
  	continue;
  }
  if(strstr($ad[$i], "==== ", true)!==false){
    $ad[$i]="\\skbinput{".trim(str_replace("====", "" , $ad[$i]))."}";
    continue;
  }
  if(strstr($ad[$i], "=== ", true)!==false){
    $ad[$i]="\\skbinput{".trim(str_replace("===", "" , $ad[$i]))."}";
    continue;
  }
  if(strstr($ad[$i], "== ", true)!==false){
    $ad[$i]="\\skbinput{".trim(str_replace("==", "" , $ad[$i]))."}";
    continue;
  }
  if(strstr($ad[$i], "= ", true)!==false){
    $ad[$i]="\\skbinput{".trim(str_replace("=", "" , $ad[$i]))."}";
    continue;
  }

  //predefined delimited blocks (pdm) with long delimiters (>9)
  // + lookup: specific patterns at begin and end of block
  //     -> CommentBlock:     //////////////////////////
  //     -> PassthroughBlock: ++++++++++++++++++++++++++
  //     -> ListingBlock:     --------------------------
  //     -> LiteralBlock:     ..........................
  //     -> SidebarBlock:     **************************
  //     -> QuoteBlock:       __________________________
  //     -> ExampleBlock:     ==========================
  //     -> OpenBlock:        --
  if(strlen(str_replace(array("/","+","-",".","*","_","="),"",$ad[$i]))==0&&strlen($ad[$i])>2){
  	//comment block
    //     -> CommentBlock:     //////////////////////////
 		if(strpos($ad[$i], "//////////")!==false){
 			$deleteline[]=$i;
 			for($k=$i+1;$k<$_size;$k++){
 				if(strpos($ad[$k], "//////////")!==false){
 					$deleteline[]=$k;
 					$i=$k;
 					break;
 				}
 				else
 					$ad[$k]="% ".$ad[$k];
 			}
 			continue;
 		}
  	//pass through block
  	//     -> PassthroughBlock: ++++++++++++++++++++++++++
 		if(strpos($ad[$i], "++++++++++")!==false){
 			$deleteline[]=$i;
 			for($k=$i+1;$k<$_size;$k++){
 				if(strpos($ad[$k], "++++++++++")!==false){
 					$deleteline[]=$k;
 					$i=$k;
 					break;
 				}
 			}
 			continue;
 		}
  	//listing block
  	//     -> ListingBlock:     --------------------------
 		if(strpos($ad[$i], "----------")!==false){
 			$ad[$i]="\\begin{listing}";
 			for($k=$i+1;$k<$_size;$k++){
 				if(strpos($ad[$k], "----------")!==false){
 					$ad[$k]="\\end{listing}";
 					$i=$k;
 					break;
 				}
 			}
 			continue;
 		}
  	//literal block
  	//     -> LiteralBlock:     ..........................
 		if(strpos($ad[$i], "..........")!==false){
 			$ad[$i]="\\begin{verbatim}";
 			for($k=$i+1;$k<$_size;$k++){
 				if(strpos($ad[$k], "..........")!==false){
 					$ad[$k]="\\end{verbatim}";
 					$i=$k;
 					break;
 				}
 			}
 			continue;
 		}
  	//sidebar block
  	//     -> SidebarBlock:     **************************
 		if(strpos($ad[$i], "**********")!==false){
 			$ad[$i]="\\begin{SIDEBAR}";
 			for($k=$i+1;$k<$_size;$k++){
 				if(strpos($ad[$k], "**********")!==false){
 					$ad[$k]="\\end{SIDEBAR}";
 					$i=$k;
 					break;
 				}
 			}
 			continue;
 		}
  	//qoute block
  	//     -> QuoteBlock:       __________________________
 		if(strpos($ad[$i], "__________")!==false){
 			$ad[$i]="\\begin{qoute}";
 			for($k=$i+1;$k<$_size;$k++){
 				if(strpos($ad[$k], "__________")!==false){
 					$ad[$k]="\\end{qoute}";
 					$i=$k;
 					break;
 				}
 			}
 			continue;
 		}
  	//example block
  	//     -> ExampleBlock:     ==========================
 		if(strpos($ad[$i], "==========")!==false){
 			$ad[$i]="\\begin{EXAMPLE}";
 			for($k=$i+1;$k<$_size;$k++){
 				if(strpos($ad[$k], "==========")!==false){
 					$ad[$k]="\\end{EXAMPLE}";
 					$i=$k;
 					break;
 				}
 			}
 			continue;
 		}
  }

  //predefined delimited blocks (pdm) with short delimiters (==2)
  // + lookup: specific patterns at begin and end of block
  //     -> OpenBlock:        --
  if(strlen(str_replace("-","",$ad[$i]))==0&&strlen($ad[$i])==2){
    //open block
 		if(strpos($ad[$i], "--")!==false){
 			$ad[$i]="\\begin{OPEN BLOCK}";
 			for($k=$i+1;$k<$_size;$k++){
 				if(strpos($ad[$k], "--")!==false){
 					$ad[$k]="\\end{OPEN BLOCK}";
 					$i=$k;
 					break;
 				}
 			}
 			continue;
 		}
  }

  //bullet lists
  // + lookup: empty line followed by list or empty lines and no paragraph, header or list block (open block)
  // +         indent is non-critical
  //     -> - List item.
  //     -> * List item.
  //     -> ** List item.
  //     -> *** List item.
  //     -> **** List item.
  //     -> ***** List item.
  $line=trim($ad[$i]);
  if(strlen($line)>2&&($line[0]=='-'||$line[0]=='*')){
  	//entry, we have a new list opening
    $ad[$i-1]="\begin{itemize}";
    $ad[$i]="\\item ".$ad[$i];
		for($k=$i+1;$k<$_size;$k++){
			if(strlen($ad[$k])==0)
			  continue;
      if(strlen($ad[$k])>1&&substr($ad[$k],0,1)=="-")
			  continue; //ADD LIST CHECK
      if(strlen($ad[$k])>1&&substr($ad[$k],0,1)=="*")
			  continue; //ADD LIST CHECK

      if(strlen($ad[$k])==2&&substr($ad[$k],0,2)=="--"){
      	$i=$k;
			  break; //ADD INSERT \end{itemize}
			}
      if(strlen($ad[$k])>1&&substr($ad[$k],0,1)=="."){
      	$i=$k;
			  break; //ADD INSERT \end{itemize}
			}
		}
		continue;
  }

}

//remove all lines we marked for delete
array_unique($deleteline);
foreach($deleteline as $key => $value){
  unset($ad[$value]);
}


print_r($ad);

function usage(){
	fwrite(STDOUT,"\n\n");
	fwrite(STDOUT,"{$progname} - a small and simple AsciiDoc to (SKB) LaTeX translator\n\n");
	fwrite(STDOUT,"usage: {$progname} inputfile [outputfile]\n");
	fwrite(STDOUT,"  inputfile: the AsciiDoc input file, we assume UTF-8 encoding,\n");
	fwrite(STDOUT,"             include path used for search\n");
	fwrite(STDOUT,"  outputfile: file to write the translation to, stdout if not set\n");
	fwrite(STDOUT,"\n\n");
}



?>