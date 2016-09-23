#!/bin/bash

PREFIX=Third
NEWPREF=Fifth

for f in `ls ${PREFIX}*`;
do
	NEWNAME=`echo $f | sed -e "s/$PREFIX/$NEWPREF/g"`
	cp $f $NEWNAME
done
