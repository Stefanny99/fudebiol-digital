@echo off
for /f "tokens=1-2 delims=:" %%a in ('ipconfig^|find "IPv4"') do set ip=%%b
set ip=%ip:~1%
C:\xampp\php\php artisan serve --host %ip% --port 80
REM C:\xampp\php\php artisan serve
pause