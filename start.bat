@echo off
REM for /f "tokens=1-2 delims=:" %%a in ('ipconfig^|find "IPv4"') do set ip=%%b
REM set ip=%ip:~1%
REM C:\xampp\php\php artisan serve --host %ip% --port 80
C:\xampp\php\php artisan serve
pause