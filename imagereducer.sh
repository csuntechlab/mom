#!/bin/bash

imagereduce()
{
	for file in *;
	do
		if [[ ( $file != sm_* ) && ( $file != lg_*) && ( $file != *placeholder* ) ]]
			then
			if [[ ( $file == *.jpeg ) || ( $ifle == *.JPEG ) || ( $file == *.jpg ) || ( $ifle == *.JPG ) || ( $file == *.png ) || ( $file == '*.PNG' ) ]]
				then
				# we are in the profile folder
				if($flag == "true")
					then
					convert "$file" -resize "$LARGE" "lg_$file" && convert "$file" -resize "$SMALL" "sm_$file" && rm "$file"
				# we are in the project folder
				else
					convert "$file" -resize "$LARGE" "lg_$file" && rm "$file"
				fi
			fi
		fi
	done
}

PROFILE_DIRECTORY="public/user-profile/image/"
PROJECT_DIRECTORY="public/imgs/projects/"
LARGE="200x175"
SMALL="150x150"
flag="true"
echo "cd into $PROFILE_DIRECTORY"
cd $PROFILE_DIRECTORY
echo "inside $PROFILE_DIRECTORY"
imagereduce $flag
echo "finished"
flag="false"
cd ../../../
echo "cd into $PROJECT_DIRECTORY"
cd $PROJECT_DIRECTORY
echo "inside $PROJECT_DIRECTORY"
imagereduce $flag
echo "finished"

