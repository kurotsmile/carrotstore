Set WshShell = CreateObject("WScript.Shell")
WshShell.SendKeys(chr(&hB0)) 'change the chr argument by any hex to send keystrokes to the active window
Set WshShell = Nothing