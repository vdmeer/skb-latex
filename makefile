all:	run copy doc ug slides
doc:	doc/skb.pdf
ug:	doc/user-guide.pdf
slides:	uganim ugnoanim ugnnote


latextmpfiles = doc/*.aux doc/*.bbl doc/*.bib doc/*.idx doc/*.blg doc/*.dvi doc/*.log doc/*.out doc/*.toc doc/*.lof doc/*.lot doc/*.nav doc/*.snm doc/*.vrb doc/*.ps doc/*.glo doc/*.run.xml
clean:	
	rm -f run/skb.log
	rm -f ${latextmpfiles}


cleanall:
	rm -f doc/*.*
	rm -f run/*.*


runfiles = run/skb.cfg run/skb.sty run/*.cls
${runfiles}:	source/skb.dtx source/skb.ins
			cd run;latex ../source/skb.ins
			rm -f run/skb.log
run:	${runfiles}

doc/skb.pdf:	source/skb.dtx
	cd doc;pdflatex ../source/skb.dtx;bibtex skb;pdflatex ../source/skb.dtx;pdflatex ../source/skb.dtx


dbfiles = doc/user-guide/database/*.* doc/user-guide/database/bibtex/*.*
examplefiles = doc/user-guide/examples/*.tex
figfiles = doc/user-guide/figures/*/*.*
repfiles = doc/user-guide/repository/*.* doc/user-guide/repository/*/*.*
slifiles = doc/user-guide/slides/*.*

ugfiles = doc/user-guide/user-guide.tex doc/user-guide/user-guide-load.tex
ugnoanimfiles = doc/user-guide/ug-slides-load.tex doc/user-guide/ug-slides-noanim.tex
uganimfiles = doc/user-guide/ug-slides-load.tex doc/user-guide/ug-slides-anim.tex
ugnnotesfiles = doc/user-guide/ug-slides-load.tex doc/user-guide/ug-slides-notes.tex


doc/user-guide.pdf:	${runfiles} ${ugfiles} ${dbfiles} ${examplefiles} ${figfiles} ${repfiles}
										cd doc;pdflatex user-guide/user-guide;bibtex user-guide;pdflatex user-guide/user-guide;pdflatex user-guide/user-guide

ugnoanim:	doc/ug-slides-noanim.pdf
doc/ug-slides-noanim.pdf:	${runfiles} ${ugnoanimfiles} ${dbfiles} ${examplefiles} ${figfiles} ${repfiles} ${slifiles}
													cd doc;pdflatex user-guide/ug-slides-noanim;bibtex ug-slides-noanim;pdflatex user-guide/ug-slides-noanim;pdflatex user-guide/ug-slides-noanim

uganim:	doc/ug-slides-anim.pdf
doc/ug-slides-anim.pdf:	${runfiles} ${uganimfiles} ${dbfiles} ${examplefiles} ${figfiles} ${repfiles} ${slifiles}
												cd doc;pdflatex user-guide/ug-slides-anim;bibtex ug-slides-anim;pdflatex user-guide/ug-slides-anim;pdflatex user-guide/ug-slides-anim

ugnnote:	doc/ug-slides-notes.pdf
doc/ug-slides-notes.pdf:	doc/ug-slides-noanim.pdf ${runfiles} ${ugnnotesfiles} ${dbfiles} ${examplefiles} ${figfiles} ${repfiles} ${slifiles}
													cd doc;pdflatex user-guide/ug-slides-notes;bibtex ug-slides-notes;pdflatex user-guide/ug-slides-notes;pdflatex user-guide/ug-slides-notes


mystyles = ~/doc/styles/tex/latex/skb/skb.cfg ~/doc/styles/tex/latex/skb/skb.sty ~/doc/styles/tex/latex/skb/*.cls
copy:	${mystyles}
${mystyles}:	${runfiles}
		rm -f ~/doc/styles/tex/latex/skb/*;cp run/* ~/doc/styles/tex/latex/skb/


#sf:	run copy doc ug slides clean
#	cd ..;rm -r -f latex-skb;cp -r current latex-skb