#!/bin/bash

imagereduce()
{
	for file in *;
	do
		# lets ignore any placeholder images and images that have already been re-sized
		if [[ ( $file != sm_* ) && ( $file != lg_*) && ( $file != *placeholder* ) ]]
			then
			# let's only traverse through image files
			if [[ ( $file == *.jpeg ) || ( $file == *.JPEG ) || ( $file == *.jpg ) || ( $file == *.JPG ) || ( $file == *.png ) || ( $file == '*.PNG' ) ]]
				then
				# make re-size twice and then we remove the original file
				convert "$file" -resize "$LARGE" "lg_$file" && convert "$file" -resize "$SMALL" "sm_$file" && rm "$file"
			fi
		fi
	done
}

PROFILE_DIRECTORY="public/user-profile/image/"
PROJECT_DIRECTORY="public/imgs/projects/"
LARGE="200x200"
SMALL="50x50"
echo "cd into $PROFILE_DIRECTORY"
cd $PROFILE_DIRECTORY
echo "inside $PROFILE_DIRECTORY"
imagereduce
echo "finished"
cd ../../../
LARGE="200x175"
SMALL="150x150"
echo "cd into $PROJECT_DIRECTORY"
cd $PROJECT_DIRECTORY
echo "inside $PROJECT_DIRECTORY"
imagereduce
echo "finished"

