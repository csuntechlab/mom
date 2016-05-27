#!/bin/bash

profilereduce()
{
	for file in *;
	do
		if [[ ( $file != sm_* ) && ( $file != lg_*) ]]
			then
			if [[ ( $file == *.jpg ) || ( $file == *.png ) || ( $ifle == *.JPG ) ]]
				then
				convert "$file" -resize "$LARGE" "lg_$file" && convert "$file" -resize "$SMALL" "sm_$file" && rm "$file"
			fi
		fi
	done
}

PROFILE_DIRECTORY="public/user-profile/image/"
PROJECT_DIRECTORY="public/imgs/projects/"
LARGE="200x175"
SMALL="150x150"
cd $PROFILE_DIRECTORY
profilereduce
cd ../
cd $PROJECT_DIRECTORY
imagereduce

