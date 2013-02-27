Git repo by igab
 Automatically generated on Ven  7 oct 2011 09:42:01 CEST

# Description

This little php application allow you to create :
	- a monster,
	- a family,
	- a world

A monster has :
	- a name,
	- a family which depends on the family named before,
	- a photo (that the user can upload via a form),
	- a default photo if the user does not upload a photo,
	- some settings of your choice (hair colors, skin type, blood type, teeth, etc...)
	
A family has :
	- a name,
	- they belong to a word,
	- they have a photo that we can add (same as for monsters)
	- they have a maximum number

A world has :
	- a name,
	- multiple family,
	- an image that you will show to the user as a background
	

In the admin panel, I or any user should be able to :

	- add a monster, give him a name, a family, a photo, and some settings of your choice (think it as checkbox ?)
	- add a family with the description I've made before. This family should be present in the family choice for the monster
	- add a world where we can put families, a name for this world and an image has background
	
In the front (what the user see) you should have :
	- a page to select a world
	- a world page that fetch all the families and thus the monsters and bring them to the user grouped by families.
	- clicking on a monster allow the user to see detailed information about his family, his world, and his settings.
	
	
This could seems complicated but most of the work should have already be seen in classroom. For photo upload you can look and search about file upload, on "le site du zero" or on github.
Idea is not to make the whole app but to go as far as possible with each of the module you deliver, and should be complet.


#Workflow

You will use git as version control.

You should first FORK (see the fork button on this webpage : https://github.com/gabrielstuff/Pocket-monster)

This means you will follow this step to get the repository.
http://help.github.com/win-set-up-git/ (available also for Mac, and Linux)

And you should :
git add -A
git commit -am "i just create a class"
git push

Once you finished you have to make a pull request in order for me to get your code.

Actually all of this step ar fairly explain in the github website and you should be able to understand them.

Thank you
