Hello!

there google doc for the project is here:
https://docs.google.com/document/d/1yXPzCBiviHJ_LrmkqZPKYJ5Z86LAYoulCcYuPzOJFC0/edit?usp=sharing


here is the link of some information like user name, password to DB ect:
https://docs.google.com/document/d/1GJCNGOxUa985oAC3a8P_bKijgDska0vPYD658yM2FGc/edit?usp=sharing

here is the link for the draw.io ER diagram
https://app.diagrams.net/#G1MmI8C_7Q-2503YxB6PDP-jt49HvIlX1b

link for draw.io web UI is here
https://drive.google.com/file/d/1qNHYXzzhp25ghCvP23WsKFIwacZWkKkN/view?usp=sharing

shortcut:

-----------loging in to database:
mysql -h tvc353.encs.concordia.ca -u tvc353_4 -p tvc353_4
password: ad2020hd

-----------loging in to website:
The base URL for your web pages is  	https://tvc353.encs.concordia.ca/ 
The User ID  for web access is		tvc353_4
The password for web access is 		ad2020hd

----------directory of where the files are that are presented to the website directly:
 /www/groups/t/tv_comp353_4

the ER model is trough the email Tooba sent us in draw io

--------- temporary DB being used while the school is closed:

http://www.phpmyadmin.co/
Server: 	sql9.freemysqlhosting.net
Name: 		sql9328338
Username: 	sql9328338
Password: 	ZbhYnScRnZ
Port number: 	3306

---- setup before transfering project to concordia database and server

the database we will be working on will be on phpadmin above
we can use xampp as server, wich apache and mySQL modules
and we can test our work individually on our own computer (local host) from a branch, then merge our work back into github main repository

the reason we are using not working on concordias server and database directly is because
school is closed untill the end of the month and computer unacessible, and using puTTY ssh tunnelling forces us to use prompt commands
to edit/create folders, wich would take forever.