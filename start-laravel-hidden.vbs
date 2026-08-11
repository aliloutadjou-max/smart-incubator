Set WshShell = CreateObject("WScript.Shell")

WshShell.Run "cmd /c ""C:\Users\hp\Music\Nouveau dossier\Nouveau dossier\Nouveau dossier\SmartIncubator Original\start-laravel.bat""", 0, False

WScript.Sleep 5000

WshShell.Run "http://127.0.0.1:8000", 1, False