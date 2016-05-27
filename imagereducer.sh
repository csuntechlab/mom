#!/bin/bash

imagereduce()
{
	for file in *;
	do
		if [[ ( $file == *.jpg ) || ( $file == *.png ) || ( $ifle == *.JPG ) || ( $file == *.PNG ) && ( $file != sm_* ) && ( $file != lg_* ) ]]
			then
				echo "$file"
				convert "$file" -resize "$LARGE" "lg_$file" && convert "$file" -resize "$SMALL" "sm_$file" && rm "$file"
		fi
	done
}

PROFILE_DIRECTORY="public/user-profile/image/"
LARGE="200x175"
SMALL="150x150"
cd $PROFILE_DIRECTORY
imagereduce

