#!/bin/bash

PREFIX=Is
NEWPREF=

NUMORIG='\[0\]'
NUMNEW='\[2\]'

for f in `ls ${PREFIX}*`;
do
	echo "Working on file $f..."
	NEWNAME=`echo $f | sed -e "s/$PREFIX/$NEWPREF/g"`
	cp $f $NEWNAME
	sed -i.bak -e "s/$PREFIX/$NEWPREF/g" $NEWNAME
	#sed -i.bak.bak -e "s/$NUMORIG/$NUMNEW/g" $NEWNAME
done
