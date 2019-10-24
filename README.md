# Hospital-Appointments-System--Laravel6.0
Hospital Appointments System -Laravel6.0
-----------------------------------------------------------------------
FEATURES:
1. Users registration
2. Database-based User Roles and permissions
3. hOSPITAL (+plus branches, health services offereable, doctors) rEGISTRATION
4. Appointments management -creation, edits, view, deletion
5. Inbuilt email service
6. Dashboard with cues, graphs
-----------------------------------------------------------------------

------------------------------------------------------------------------
INSTALLATION INSTRUCTIONS
------------------------------------------------------------------------
×
1. Extract the archive and put it in the folder you want

2. Run cp .env.example .env file to copy example file to .env
Then edit your .env file with DB credentials and other settings.

3. Run composer install command

4. Run php artisan migrate --seed command.
Notice: seed is important, because it will create the first admin user for you.

5. Run php artisan key:generate command.

6. Run php artisan storage:link command.

And that's it, go to your domain and login:

Username:	admin@admin.com
Password:	password

