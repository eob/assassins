Assassins / Secret Santa Server
===============================

Who knew? It turns out Assassins and Secret Santa are the same game, with
slightly different rules.

This is the Assassins Server for CSAIL. Pardon the poor code quality; this was
written in a hurry.

Setting up a new game
---------------------

1. Clone this repository into a web folder somewhere on the CSAIL servers

2. Create a database and dbuser on [mysql.csail.mit.edu](mysql.csail.mit.edu)

3. Edit config.php to include your new database name, user, password, and game mode

Running the game
----------------

The game is managed in a rather low-tech way: by editing the source code.

Luckily all the edits you need to make are just variables in `config.php`

.. (TBD) ..

Code Organization
-----------------

For future CSAILors editing this code, the general principles for plug-and-go maintainability are:

*  The whole project should be runnable with only edits to `config.php`
*  All files in the root directory should be agnostic to game variant (assassins, santa)
*  Game variants should be kept in subdirectories
